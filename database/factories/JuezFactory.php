<?php

use Faker\Generator as Faker;

$factory->define(App\Juez::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'apellidos' => $faker->lastName,
    ];
});
