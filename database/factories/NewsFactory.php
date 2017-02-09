<?php

use App\Models\News;
use App\Models\User;

$factory->define(News::class, function (Faker\Generator $faker) {
    return [
        'user_id'   => User::inRandomOrder()->firstOrFail()->id,
        'title'     => $faker->words(random_int(3, 5), true),
        'body'      => $faker->text(random_int(100, 1000))
    ];
});
