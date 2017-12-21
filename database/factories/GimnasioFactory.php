<?php

use Faker\Generator as Faker;

$factory->define(App\Gimnasio::class, function (Faker $faker) {
    return [
        'nombre' => $faker->streetName,
        'ciudad_id' => factory('App\Ciudad')->create()->id,
    ];
});
