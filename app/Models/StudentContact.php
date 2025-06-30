<?php

namespace App\Models;

use App\Models\School;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class StudentContact extends Model
{
    protected $fillable = ['student_id', 'phone_number'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}

