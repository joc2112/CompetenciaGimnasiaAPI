<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Torneo extends Model
{
    use CrudTrait;
    /**
     * Obtener todas las gimnastas de este torneo
     */
    public function gimnastas(){
        return $this->belongsToMany('App\Models\Gimnasta');
    }

     /**
     * Obtener todos los jueces de este torneo
     */
    public function jueces(){
        return $this->hasMany('App\Models\Juez');
    }

    /**
     * Obtener todos los gimnacios participantes de este torneo
     *  a traves de las gimnastas registradas.
     */
    public function gimnasios(){
        return $this->hasManyThrough('App\Models\Gimnasio','App\Models\Gimnasta');
    }
}
