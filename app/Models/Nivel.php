<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Nivel extends Model
{
    use CrudTrait;
    /**
     * Obtener la lista de gimnastas de este nivel
     */
    public function gimnastas()
    {
        return $this->hasMany('App\Models\Gimnasta');
    }
}
