<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class MesaDeJuicio extends Model
{
    use CrudTrait;
    /**
     * Campos disponibles para Mass Assigment
     */
    protected $fillable = ['disciplina_id','capturista_id'];

    /**
     * Obtener todos los jueces de esta mesa.
     * Esta es una relacion Many to Many, puesto
     * que mucho jueces pueden estar en diferentes
     * mesas, y una mesa tiene varios jueces.
     */
    public function jueces(){
        return $this->belongsToMany('App\Models\Juez','juez_mesa_juicio');
    }    
    
    /**
     * Obtener la capturista a la cual esta mesa pertence
     */
    public function capturista(){
        return $this->belongsTo('App\Models\Capturista');
    }
    
    /**
    * Obtener la disciplina de esta mesa
    */
    public function disciplina(){
        return $this->belongsTo('App\Models\Disciplina');
    } 
}
