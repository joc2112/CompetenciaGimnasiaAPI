<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Ciudad extends Model
{
    use CrudTrait;
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
