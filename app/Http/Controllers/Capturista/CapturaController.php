<?php

namespace App\Http\Controllers\Capturista;

use Illuminate\Http\Request;
use App\Models;
class CapturaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostrar la pagina principal para capturar.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('capturista.captura');
    }

    /**
     * Mostrar los standings en tiempo real
     *
     * @return \Illuminate\Http\Response
     */
    public function standings()
    {
        return view('standings.realtime');
    }

    /**
     * Mostrar las calificaciones promedio de la gimnasta provided
     *
     * @return \Illuminate\Http\Response
     */
    public function resultados(Models\Gimnasta $gimnasta)
    {
        // Obtener datos del torneo
        $torneo = session('torneo_id', Models\Torneo::find(1));
        return view('standings.resultados',["gimnasta" => $gimnasta, "torneo" => $torneo]);
    }

    /**
     * Mostrar las calificaciones promedio de las gimnastas del nivel y rango dado
     * Y del torneo seleccionado en la session
     *
     * @return \Illuminate\Http\Response
     */
    public function resultados_nivel_rango(Models\Nivel $nivel, Models\Rango $rango) {
        
        // Obtener datos del torneo
        $torneo = session('torneo_id', Models\Torneo::find(1));

        // Obtener todas las gimnastas del mismo rango y nivel 
        
        $gimnastas = Models\Gimnasta::where('nivel_id',$nivel->id)
                                    ->where('rango_id', $rango->id)->get();
        
        // Filtrar solo las gimnastas registradas en en el torneo seleccionado
        $gimnastas_final = collect([]);
        foreach ($gimnastas as $gimnasta) {
            if($gimnasta->torneos->contains($torneo)){
                $gimnastas_final->push($gimnasta);
            }
        }
        $gimnastas = $gimnastas_final;
        return view('standings.resultados_nivel_rango',["gimnastas" => $gimnastas, "nivel" => $nivel, "rango" => $rango, "torneo" => $torneo]);;
    }
    
    
    /**
     * Mostrar el formulario para buscar los resultados
     *
     * @return \Illuminate\Http\Response
     */
    public function resultados_form()
    {
        $niveles = Models\Nivel::all();
        $rangos = Models\Rango::all();
        return view('standings.resultados_form',["niveles" => $niveles, "rangos" => $rangos]);
    }

}
