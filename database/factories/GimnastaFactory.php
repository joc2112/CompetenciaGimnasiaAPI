<?php

use Faker\Generator as Faker;

$factory->define(App\Gimnasta::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'apellidos' => $faker->lastName,
        'gimnasio_id' => factory('App\Gimnasio')->create()->id,
        'nivel_id' => rand(1,10),
        'rango_id' => rand(1,5)
    ];
});
