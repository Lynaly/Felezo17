<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable, EntrustUserTrait;

    protected $table    = 'users';

    protected $fillable = [
        'name', 'email'
    ];

    protected $hidden   = [
        'password', 'remember_token',
    ];

    public function news()
    {
        return $this->hasMany('App\Models\News');
    }

    public function roles()
    {
        return $this->hasMany('App\Models\Role');
    }

    public function permissions()
    {
        return $this->hasMany('App\Models\Permission');
    }
}
