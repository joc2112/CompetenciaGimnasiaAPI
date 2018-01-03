<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Capturista extends Model
{
    use CrudTrait;
    /**
     * Campos disponibles para Mass Assigment
     */
    protected $fillable = ['nombre','apellidos'];
    
    /**
     * Obtener las mesa de la capturista
     */
    public function mesas_de_juicio()
    {
        return $this->hasMany('App\MesaDeJuicio');
    }
}
