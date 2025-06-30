<?php

namespace App\Models;

use App\Models\School;
use App\Models\Message;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = ['school_id', 'staff_id'];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}

