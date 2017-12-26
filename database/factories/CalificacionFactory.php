<?php

use Faker\Generator as Faker;

$factory->define(App\Calificacion::class, function (Faker $faker) {
    // Generar calificacion de una gimnasta y juez random
    $gimnasta = App\Gimnasta::all()->random();
    $juez = App\Juez::all()->random();
    $calificacion = App\Calificacion::generarCalificacionRandom($gimnasta);

    // Verificar que la calificacion sea valida
    if(App\Calificacion::isValidCalificacion($gimnasta, $calificacion)){
        return [
            'gimnasta_id' => $gimnasta->id,
            'calificacion' => App\Calificacion::generarCalificacionRandom($gimnasta),
            'disciplina_id' => rand(1,4), // Solo son 4 disciplinas posibles
            'juez_id' => $juez->id
        ];
    }
    echo "Calificacion generada no fue correcta";
    return [];
    
    
});
