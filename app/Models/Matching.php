<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matching extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'match_with',
        'chat_id'
    ];

    public function chat(){
        return $this->belongsTo(Chat::class,'chat_id');
    }

    public function matchWith(){
        return $this->belongsTo(User::class,'match_with');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
