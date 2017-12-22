<?php

use Faker\Generator as Faker;

$factory->define(App\Capturista::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'apellidos' => $faker->lastName
    ];
});
