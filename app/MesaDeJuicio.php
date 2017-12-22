<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MesaDeJuicio extends Model
{
    /**
     * Obtener todos los jueces de esta mesa.
     * Esta es una relacion Many to Many, puesto
     * que mucho jueces pueden estar en diferentes
     * mesas, y una mesa tiene varios jueces.
     */
    public function jueces(){
        return $this->belongsToMany('App\Juez','juez_mesa_juicio');
    }    
    
    /**
    * Obtener la capturista de esta mesa
    */
    public function capturista(){
        return $this->hasOne('App\Capturista');
    }
    
    /**
    * Obtener la disciplina de esta mesa
    */
    public function disciplina(){
        return $this->hasOne('App\Disciplina');
    } 
}
