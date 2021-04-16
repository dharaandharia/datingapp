<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Female extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'looking_for',
        'age',
        'from',
        'to'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function getUser(){
        return $this->belongsTo(User::class,'user_id');
    }
}
