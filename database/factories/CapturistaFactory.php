<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Capturista::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'apellidos' => $faker->lastName
    ];
});
