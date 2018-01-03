<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Disciplina extends Model
{
    use CrudTrait;
    /**
     * Obtener todas las mesas de juicio de esta disciplina
     */
    public function mesas_de_juicio(){
        return $this->hasMany('App\MesaDeJuicio');
    }

}
