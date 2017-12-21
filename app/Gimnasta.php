<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gimnasta extends Model
{
    /**
     * Obtener el gimnasio de la participante
     */
    public function gimnasio(){
        return $this->belongsTo('App\Gimnasio');
    }

    /**
     * Obtener el nivel de la gimnasta
     */
    public function nivel(){
        return $this->belongsTo('App\Nivel');
    }

    /**
     * Obtener el Rango de Edad
     */
    public function rango(){
        return $this->belongsTo('App\Rango');
    }
}
