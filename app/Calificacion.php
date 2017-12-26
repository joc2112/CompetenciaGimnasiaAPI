<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Faker as Faker;


class Calificacion extends Model
{
    /**
     * Obtener el juez de esta calificacion
     */
    public function juez(){
        return $this->belongsTo('App\Juez');
    }

    /**
     * Obtener la gimnasta de esta calificacion
     */
    public function gimnasta(){
        return $this->belongsTo('App\Gimnasta');
    }
    
    /**
     * Obtener la disciplina de la calificacion
     */
    public function disciplina(){
        return $this->belongsTo('App\Disciplina');
    }

    /**
     * Obtener una calificacion random dependiendo del nivel de la gimnasta
     * Rango es de 1 a base, la base depende del nivel.
     */
    public static function generarCalificacionRandom(Gimnasta $gimnasta){
        // Obtener la base del nivel de la gimnasta
        $faker = Faker\Factory::create();
        $base = $gimnasta->nivel->base;
        return $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = $base);
    }
        
}
