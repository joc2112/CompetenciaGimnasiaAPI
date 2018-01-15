<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Juez::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'apellidos' => $faker->lastName,
    ];
});
