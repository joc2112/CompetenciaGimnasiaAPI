<?php

use Faker\Generator as Faker;

$factory->define(App\MesaDeJuicio::class, function (Faker $faker) {
    return [
        'disciplina_id' => rand(1,4), // Solo son 4 disciplinas posibles
        'capturista_id' => factory('App\Capturista')->create()->id,
    ];
});
