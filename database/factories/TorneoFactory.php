<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Torneo::class, function (Faker $faker) {
    return [
        'nombre' => $faker->streetName(),
        'fecha' => date("Y-m-d"),
        'cede' => $faker->city(),
    ];
});
