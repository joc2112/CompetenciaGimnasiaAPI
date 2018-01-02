<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rango extends Model
{
    /**
     * Obtener la lista de gimnastas de este rango de edad
     */
    public function gimnastas()
    {
        return $this->hasMany('App\Gimnasta');
    }
}
