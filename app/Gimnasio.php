<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gimnasio extends Model
{
    /**
     * Campos disponibles para Mass Assigment
     */
    protected $fillable = ['nombre','ciudad_id'];
    

    /**
     * Obtener la lista de gimnastas de este gimnasio
     */
    public function gimnastas()
    {
        return $this->hasMany('App\Gimnasta');
    }

    /**
     * Obtener la ciudad del gimnasio
     */
    public function ciudad()
    {
        return $this->belongsTo('App\Ciudad');
    }
}
