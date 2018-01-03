<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Juez extends Model
{
    use CrudTrait;
    /**
     * Campos disponibles para Mass Assigment
     */
    protected $fillable = ['nombre','apellidos'];
    /**
     * Obtener las mesas del juez
     * Esta es una relacion Many to Many, puesto
     * que mucho jueces pueden estar en diferentes
     * mesas, y una mesa tiene varios jueces.
     */
    public function mesas_de_juicio()
    {
        return $this->belongsToMany('App\MesaDeJuicio', 'juez_mesa_juicio');
    }
}
