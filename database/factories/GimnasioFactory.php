<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Gimnasio::class, function (Faker $faker) {
    return [
        'nombre' => $faker->streetName,
        'ciudad_id' => factory('App\Models\Ciudad')->create()->id,
    ];
});
