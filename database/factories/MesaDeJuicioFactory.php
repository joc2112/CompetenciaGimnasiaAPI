<?php

use Faker\Generator as Faker;

$factory->define(App\Models\MesaDeJuicio::class, function (Faker $faker) {
    return [
        'disciplina_id' => App\Models\Disciplina::all()->random()->id,
        'capturista_id' => factory('App\Models\Capturista')->create()->id,
        'torneo_id' => App\Models\Torneo::all()->random()->id,
    ];
});
