<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Torneo extends Model
{
    use CrudTrait;
    /**
     * Obtener todas las gimnastas de este torneo
     */
    public function gimnastas(){
        return $this->belongsToMany('App\Models\Gimnasta');
    }
}
