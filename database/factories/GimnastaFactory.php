<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Gimnasta::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'apellidos' => $faker->lastName,
        'fecha_nacimiento' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = '-4 years', $timezone = null),
        'gimnasio_id' => factory('App\Models\Gimnasio')->create()->id,
        'nivel_id' => App\Models\Nivel::all()->random()->id,
        'rango_id' => App\Models\Rango::all()->random()->id,
        'competencia_general_id' => 1
    ];
});
