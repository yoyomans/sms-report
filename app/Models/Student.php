<?php

namespace App\Models;

use App\Models\School;
use App\Models\Message;
use App\Models\StudentContact;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['school_id', 'student_id'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function contacts()
    {
        return $this->hasMany(StudentContact::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
