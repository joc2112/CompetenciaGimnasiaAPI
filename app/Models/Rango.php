<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Rango extends Model
{
    use CrudTrait;
    /**
     * Obtener la lista de gimnastas de este rango de edad
     */
    public function gimnastas()
    {
        return $this->hasMany('App\Gimnasta');
    }
}
