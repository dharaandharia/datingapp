<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id'
    ];

    protected $casts =[
        'information' => 'boolean',
        'profile_picture' => 'boolean',
        'tendencies' => 'boolean',
    ];
}
