<?php

namespace App;

use App\SASS\User\UserAttributes as HasAttributes;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, HasAttributes;

    static $roles = ['admin', 'secretary', 'tutor'];

    protected $fillable = [
        'first_name', 'last_name', 'password', 'email', 'role'
    ];

    protected $hidden = ['password', 'remember_token',];
}
