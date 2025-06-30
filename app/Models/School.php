<?php

namespace App\Models;

use App\Models\Staff;
use App\Models\Message;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ['name', 'school_id'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function staff()
    {
        return $this->hasMany(Staff::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}

