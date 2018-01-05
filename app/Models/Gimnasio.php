<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Gimnasio extends Model
{
    use CrudTrait;
    /**
     * Campos disponibles para Mass Assigment
     */
    protected $fillable = ['nombre','ciudad_id'];
    

    /**
     * Obtener la lista de gimnastas de este gimnasio
     */
    public function gimnastas()
    {
        return $this->hasMany('App\Models\Gimnasta');
    }

    /**
     * Obtener la ciudad del gimnasio
     */
    public function ciudad()
    {
        return $this->belongsTo('App\Models\Ciudad');
    }
}
