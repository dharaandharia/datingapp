<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function information(){
        return $this->hasOne(ProfileInformation::class);
    }

    public function status(){
        return $this->hasOne(UserStatus::class);
    }

    public function Matches(){
        return $this->hasMany(Matching::class);
    }

    public function preferences(){
        return $this->hasMany(UserPreferences::class);
    }

    public function favoriteFoods(){
        return $this->hasMany(UserFavoriteFoods::class);
    }

    public function favoriteDrinks(){
        return $this->hasMany(UserFavoriteDrinks::class);
    }
}
