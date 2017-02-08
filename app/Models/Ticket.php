<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';

    protected $fillable = [
        'name', 'price', 'amount'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
}