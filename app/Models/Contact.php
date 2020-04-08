<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'tb_contact';

    protected $fillable = [
        'name', 'email', 'phone_number', 'subject', 'message'
    ];

    protected $dates = ['created_at', 'updated_at'];
}
