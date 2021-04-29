<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable =[
        'last_message_by',
        'last_message',
        'number_of_messages',
        'seen'
    ];

    protected $casts =[
        'seen' => 'boolean',
    ];

    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function latest(){
        return $this->orderBy('created_at', 'desc');
    } 
}
