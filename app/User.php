<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    static $roles = ['admin', 'secretary', 'tutor'];

    protected $fillable = [
        'first_name', 'last_name', 'password', 'email', 'role'
    ];

    protected $hidden = ['password', 'remember_token',];
}
