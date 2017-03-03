<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';

    protected $fillable = [
        'name', 'price', 'amount', 'jug'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function scopeAvailable(Builder $query)
    {
        return $query->where(function(Builder $query) {
            $query->groupBy('id')->having('id', '<', 'amount');
        });
    }

    public static function Free()
    {
        return env('MAX_TICKETS') - Order::count();
    }
}