<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Staff;
use App\Models\School;
use App\Models\Message;
use App\Models\Student;
use App\Models\Provider;
use App\Traits\ExtractsId;
use App\Traits\FormatDates;
use Illuminate\Support\Str;
use App\Models\StudentContact;
use Illuminate\Support\Facades\Storage;

class MessageIngestService
{
    use ExtractsId;
    use FormatDates;

    public function ingestFromJson(string $path): void
    {
        $raw = file_get_contents(storage_path($path));
        $messages = json_decode($raw, true);

        foreach ($messages as $data) {
            $schoolId = $this->extractId($data['webhook']);

            $school = School::firstOrCreate(
                ['school_id' => $schoolId],
                ['name' => 'School ' . $schoolId]
            );

            $provider = Provider::firstOrCreate(['name' => $data['extra']['provider']]);

            $student = Student::firstOrCreate([
                'school_id'     => $school->id,
                'student_id'  => $this->extractId($data['extra']['student_id']),
            ]);

            $staff = Staff::firstOrCreate([
                'school_id'  => $school->id,
                'staff_id' => $data['sender'],
            ]);

            $recipient = StudentContact::firstOrCreate([
                'student_id'    => $student->id,
                'phone_number' => $data['recipient'],
            ]);

            Message::updateOrCreate(
                ['msg_id' => $this->extractHexSuffix($data['id'])],
                [
                    'school_id'    => $school->id,
                    'student_id'   => $student->id,
                    'staff_id'     => $staff->id,
                    'student_contact_id' => $recipient->id,
                    'provider_id'  => $provider->id,
                    'webhook_url'  => $data['webhook'],
                    'subject'      => $data['subject'],
                    'message'      => $data['message'],
                    'sent_at'      => $this->toDateTimeString($data['timestamp']),
                    'status'       => $data['status'],
                ]
            );
        }
    }
}
