<?php

use App\Models\Order;
use App\Models\Ticket;
use App\Models\User;

$factory->define(Order::class, function (Faker\Generator $faker) {
    return [
        'user_id'       => User::inRandomOrder()->firstOrFail()->id,
        'ticket_id'     => Ticket::inRandomOrder()->firstOrFail()->id,
        'jug_name'      => '',
        'comment'       => $faker->text(random_int(0, 1500)),
        'created_at'    => $faker->dateTimeBetween('-1 months', 'now')
    ];
});
