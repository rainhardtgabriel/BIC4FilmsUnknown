<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Actor;
use Faker\Generator as Faker;

$factory->define(Actor::class, function (Faker $faker) {
    return [
        'name' => $slug = $faker->company,
        'description' => $faker->paragraph,
        'film_id' => function () {
            return App\Film::inRandomOrder()->first();
        },
    ];
});
