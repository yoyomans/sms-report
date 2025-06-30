<?php

namespace App\Models;

use App\Models\Staff;
use App\Models\School;
use App\Models\Student;
use App\Models\Provider;
use App\Models\StudentContact;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'msg_id',
        'school_id',
        'student_id',
        'staff_id',
        'student_contact_id',
        'provider_id',
        'webhook_url',
        'subject',
        'message',
        'sent_at',
        'status',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function contact()
    {
        return $this->belongsTo(StudentContact::class, 'student_contact_id');
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}

