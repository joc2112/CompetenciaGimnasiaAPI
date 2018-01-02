<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    /**
     * Obtener la lista de gimnastas de este nivel
     */
    public function gimnastas()
    {
        return $this->hasMany('App\Gimnasta');
    }
}
