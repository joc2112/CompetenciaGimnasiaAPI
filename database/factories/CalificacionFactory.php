<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Calificacion::class, function (Faker $faker) {
    // Generar calificacion de una gimnasta y juez random
    $gimnasta = App\Models\Gimnasta::all()->random();
    $juez = App\Models\Juez::all()->random();
    $calificacion = App\Models\Calificacion::generarCalificacionRandom($gimnasta);

    // Verificar que la calificacion sea valida
    if(App\Models\Calificacion::isValidCalificacion($gimnasta, $calificacion)){
        return [
            'gimnasta_id' => $gimnasta->id,
            'calificacion' => App\Models\Calificacion::generarCalificacionRandom($gimnasta),
            'disciplina_id' => rand(1,4), // Solo son 4 disciplinas posibles
            'juez_id' => $juez->id
        ];
    }
    echo "Calificacion generada no fue correcta";
    return [];
    
    
});
