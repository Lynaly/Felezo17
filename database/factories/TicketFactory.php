<?php

use App\Models\Ticket;

$factory->define(Ticket::class, function (Faker\Generator $faker) {
    return [
        'name'              => $faker->name,
        'price'             => random_int(500, 5000),
        'amount'            => random_int(50, 1000)
    ];
});
