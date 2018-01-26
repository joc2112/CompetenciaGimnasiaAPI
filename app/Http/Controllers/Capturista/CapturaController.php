<?php

namespace App\Http\Controllers\Capturista;

use Illuminate\Http\Request;
use App\Models\Gimnasta;
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
    public function resultados(Gimnasta $gimnasta)
    {
        return view('standings.resultados',["gimnasta" => $gimnasta]);
    }
}
