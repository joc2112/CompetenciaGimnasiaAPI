<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompetenciaGeneral extends Model
{
    /**
     * Obtener todas las gimnastas de esta competencia
     */
    public function gimnastas(){
        return $this->hasMany('App\Gimnasta');
    }
}
