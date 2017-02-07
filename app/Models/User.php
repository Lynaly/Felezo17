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
        return $this->belongsToMany('App\Models\Role');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission');
    }

    public function accounts()
    {
        return $this->belongsTo('App\Models\SocialAccount');
    }

    public function sch()
    {
        return $this->accounts()->where('provider', 'sch');
    }
}
