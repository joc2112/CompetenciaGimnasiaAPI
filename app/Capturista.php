<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capturista extends Model
{
    /**
     * Obtener las mesa de la capturista
     */
    public function mesa_de_juicio()
    {
        return $this->hasMany('App\MesaDeJuicio');
    }
}
