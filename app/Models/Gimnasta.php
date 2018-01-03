<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Gimnasta extends Model
{
    use CrudTrait;
    /**
     * Campos disponibles para Mass Assigment
     */
    protected $fillable = ['nombre','apellidos','competencia_general_id','fecha_nacimiento','gimnasio_id','nivel_id','rango_id'];

    /**
     * Obtener el gimnasio de la participante
     */
    public function gimnasio(){
        return $this->belongsTo('App\Models\Gimnasio');
    }

    /**
     * Obtener el nivel de la gimnasta
     */
    public function nivel(){
        return $this->belongsTo('App\Models\Nivel');
    }

    /**
     * Obtener el Rango de Edad
     */
    public function rango(){
        return $this->belongsTo('App\Models\Rango');
    }

    /**
     * Obtener todas las calificaciones de esta gimnasta
     */
    public function calificaciones(){
        return $this->hasMany('App\Models\Calificacion');
    }
    /**
     * Obtener la competencia de la gimnasta
     */
    public function competencia(){
        return $this->belongsTo('App\Models\CompetenciaGeneral');
    }
}
