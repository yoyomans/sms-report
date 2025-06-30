<?php

namespace App\Models;

use App\Models\Message;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = ['name'];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}

