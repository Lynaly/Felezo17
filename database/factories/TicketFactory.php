<?php

use App\Models\Ticket;

$factory->define(Ticket::class, function (Faker\Generator $faker) {
    return [
        'name'              => $faker->name,
        'price'             => random_int(500, 5000)
    ];
});
