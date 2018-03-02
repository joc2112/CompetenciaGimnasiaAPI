<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use App\Models;

class Gimnasta extends Model
{
    use CrudTrait;
    /**
     * Campos disponibles para Mass Assigment
     */
    protected $fillable = ['nombre','apellidos','torneo_id','fecha_nacimiento','gimnasio_id','nivel_id','rango_id'];

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
     * Obtener los torneos de la gimnasta
     */
    public function torneos(){
        return $this->belongsToMany('App\Models\Torneo');
    }

    /**
     * Obtiene el link en html de las calificaciones
     */
    public function getResultadosLink() {
        return '<a href="'.url('resultados/'.$this->id).'" target="_blank">Resultados</a>';
    }

    /**
     * Obtiene las calificaciones promedio
     */
    public function promedios(){
        // Primero se obtienen todas las calificaciones agrupadas por disciplinas
        $calificaciones_disciplina = $this->calificaciones->groupBy('disciplina_id');

        // Resultados de cada disciplina
        $resultados = ["viga" => null, "piso" => null, "salto" => null, "barras" => null, "AA" => 0];
        $total = 0;
        foreach($calificaciones_disciplina as $disciplina_id => $calificaciones){
            $promedio = Models\Calificacion::promedio($calificaciones);
            $disciplina_nombre = Models\Disciplina::find($disciplina_id)->nombre;
            $resultados[$disciplina_nombre] = $promedio;
            $resultados["AA"] += $promedio;
        }
        // Regresar los datos de la gimnasta junto con las calificaciones
        return ["gimnasta" => $this, "gimnasio" => $this->gimnasio, "promedios" => $resultados];
    }
}
