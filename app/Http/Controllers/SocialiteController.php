<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\UserStatus;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SocialiteController extends Controller
{
    public function github(){
        return Socialite::driver('github')->redirect();
    }

    public function githubRedirect(){
        $USER = Socialite::driver('github')->user();

        $USER = User::firstOrCreate([
            'email' => $USER->email
        ],[
            'name' => $USER->nickname,
            'password' => Hash::make(Str::random(24)),

        ]);
        
        UserStatus::create([
            'user_id' => $USER->id
        ]);

        Schema::create($USER->id.'_likes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unqiue();
            $table->index(['user_id']);
        });

        Schema::create($USER->id.'_dislikes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unqiue();
            $table->index(['user_id']);
        });

        Schema::create($USER->id.'_fans', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unqiue();
            $table->index(['user_id']);
        });


        Auth::login($USER, true);

        return redirect('/dashboard');
    }
}
