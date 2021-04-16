<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'sex',
        'b_day',
        'country',
        'region',
        'city'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'b_day' => 'date'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
}
