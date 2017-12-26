<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gimnasta extends Model
{
    /**
     * Campos disponibles para Mass Assigment
     */
    protected $fillable = ['nombre','apellidos','gimnasio_id','nivel_id','rango_id'];

    /**
     * Obtener el gimnasio de la participante
     */
    public function gimnasio(){
        return $this->belongsTo('App\Gimnasio');
    }

    /**
     * Obtener el nivel de la gimnasta
     */
    public function nivel(){
        return $this->belongsTo('App\Nivel');
    }

    /**
     * Obtener el Rango de Edad
     */
    public function rango(){
        return $this->belongsTo('App\Rango');
    }

    /**
     * Obtener el Rango de Edad
     */
    public function calificaciones(){
        return $this->hasMany('App\Calificacion');
    }
}
