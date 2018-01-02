<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    /**
     * Obtener todas las mesas de juicio de esta disciplina
     */
    public function mesas_de_juicio(){
        return $this->hasMany('App\MesaDeJuicio');
    }

}
