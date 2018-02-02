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
     * Show the application dashboard.
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
        return view('standings.resultados',["gimnasta" => $gimnasta]);
    }

    /**
     * Mostrar las calificaciones promedio de las gimnastas del nivel y rango dado
     *
     * @return \Illuminate\Http\Response
     */
    public function resultados_nivel_rango(Models\Nivel $nivel, Models\Rango $rango) {
        // Obtener todas las gimnastas del mismo rango y nivel
        $gimnastas = Models\Gimnasta::where('nivel_id',$nivel->id)->where('rango_id', $rango->id)->get();
        return view('standings.resultados_nivel_rango',["gimnastas" => $gimnastas, "nivel" => $nivel, "rango" => $rango]);;
    }
    
}
