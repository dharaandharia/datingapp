<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\UserStatus;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        $USER = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
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

        return $USER;
    }
}
