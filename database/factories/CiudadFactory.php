<?php

use Faker\Generator as Faker;

$factory->define(App\Ciudad::class, function (Faker $faker) {
    return [
        'nombre' => $faker->city,
        'estado' => $faker->state,
    ];
});
