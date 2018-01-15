<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Ciudad::class, function (Faker $faker) {
    return [
        'ciudad' => $faker->city,
        'estado' => $faker->state,
    ];
});
