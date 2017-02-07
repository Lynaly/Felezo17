<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table    = 'users';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden   = [
        'password', 'remember_token',
    ];

    public function news()
    {
        return $this->hasMany('App\Models\News');
    }
}