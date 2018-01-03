<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Faker as Faker;
use Backpack\CRUD\CrudTrait;

class Calificacion extends Model
{
    use CrudTrait;
    /**
     * Campos disponibles para Mass Assigment
     */
    protected $fillable = ['juez_id', 'gimnasta_id', 'disciplina_id',
                         'calificacion', 'gimnasta'];
        
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
    /**
     * Checa que la calificacion dada sea valida.
     * La validez depende del rango del nivel de la gimnasta 
     */
    public static function isValidCalificacion(Gimnasta $gimnasta, $calificacion){
        return $calificacion >= 0 && $calificacion < $gimnasta->nivel->base;
    }

    /**
     * Genera el promedio de una lista de calificaciones de una disciplina
     * @param $calificacion: La lista de objectos de la clase Calificacion
     * @return: La calificacion promedio
     */
    public static function promedio($calificaciones){
        if(sizeof($calificaciones) <= 0) return 0;
        $suma = 0;
        foreach ($calificaciones as $calificacion) {
            $suma += $calificacion->calificacion;
        }
        return $suma / sizeof($calificaciones);
    }
        
}
