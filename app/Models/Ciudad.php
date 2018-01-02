<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    
    /**
     * Obtener la lista de gimnasios de esta ciudad
     */
    public function gimnasios()
    {
        return $this->hasMany('App\Gimnasio');
    }
    /**
     * Obtener la lista de participantes de una ciudad, a traves de los gimnasios
     */
    public function gimnastas()
    {
        return $this->hasManyThrough('App\Gimnasta', 'App\Gimnasio');
    }

}
