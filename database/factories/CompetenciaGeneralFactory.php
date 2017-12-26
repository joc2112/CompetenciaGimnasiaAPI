<?php

use Faker\Generator as Faker;

$factory->define(App\CompetenciaGeneral::class, function (Faker $faker) {
    return [
        
        'fecha' => date("Y-m-d"),
        'lugar' => $faker->address(),
    ];
});
