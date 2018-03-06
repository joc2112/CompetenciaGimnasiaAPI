<?php

use Illuminate\Http\Request;
use App\Events\CalificacionPosted;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/** --- Gimnastas --- */

// Obtener todas las gimnastas con toda la informacion
Route::get('/gimnastas', function () {
    return App\Models\Gimnasta::with(['Gimnasio.Ciudad','Nivel','Rango'])->get();
});

// Obtener una gimnasta en especifico con toda la informacion
Route::get('/gimnastas/{gimnasta}', function (App\Models\Gimnasta $gimnasta) {
    return $gimnasta->load('gimnasio','nivel', 'rango','torneos');
});

// Registrar una nueva gimnasta
Route::post('/gimnastas', function (Request $request){
    $gimnasta = App\Models\Gimnasta::firstOrCreate($request->all());
    return $gimnasta;
});

/** --- Gimnasios  --- */

// Obtener todas los gimnasios con las gimnastas de cada uno
Route::get('/gimnasios', function () {
    return App\Models\Gimnasio::with(['Gimnastas'])->get();
});

// Obtener un gimnasio con sus gimnastas
Route::get('/gimnasios/{gimnasio}', function (App\Models\Gimnasio $gimnasio) {
    return $gimnasio->load('Gimnastas');
});

// Registrar una nueva gimnasta
Route::post('/gimnasios', function (Request $request){
    $gimnasio = App\Models\Gimnasio::firstOrCreate($request->all());
    return $gimnasio;
});


/** --- Ciudades  --- */

// Obtener todas las ciudades con gimnasios
Route::get('/ciudades', function () {
    return App\Models\Ciudad::with('gimnasios')->get();
});

// Obtener una ciudad con sus gimnasios y gimnastas
Route::get('/ciudades/{ciudad}', function (App\Models\Ciudad $ciudad) {
    return $ciudad->load('gimnasios','gimnastas');
});

/** --- Niveles y Rangos de Edad  --- */

// Obtener todas las gimnastas de un nivel (1-10 inclusivo)
Route::get('/niveles/{nivel}', function (App\Models\Nivel $nivel) {
    return $nivel->load('gimnastas');
});

// Obtener todas las gimnastas de un rango_de_edad_id (ver tabla de rangos)
Route::get('/rangos/{rango}', function (App\Models\Rango $rango) {
    return $rango->load('gimnastas');
});

/** ------- COMPETENCIA  ------- */


/** --- Jueces --- */

// Obtener todos los jueces con las mesas a las que pertenecen
Route::get('/jueces', function () {
    return App\Models\Juez::with('mesas_de_juicio')->get();
});

// Registrar un nuevo juez
Route::post('/jueces', function (Request $request){
    $juez = App\Models\Juez::firstOrCreate($request->all());
    return $juez;
});

/** --- Capturistas --- */

// Obtener todas las capturistas con sus mesas
Route::get('/capturistas', function () {
    return App\Models\Capturista::with('mesas_de_juicio')->get();
});

// Registrar una nueva capturista
Route::post('/capturistas', function (Request $request){
    $capturista = App\Models\Capturista::firstOrCreate($request->all());
    return $capturista;
});

/** --- Mesas de Juicio --- */

// Obtener todas las mesas con sus jueces, disciplina y capturista
Route::get('/mesas', function () {
    return App\Models\MesaDeJuicio::with('jueces', 'disciplina', 'capturista')->get();
});

// Registrar una nueva mesa de juicio (Solo registra la disciplina y la capturista)
Route::post('/mesas', function (Request $request){
    $mesa = App\Models\MesaDeJuicio::firstOrCreate($request->all());
    return $mesa;
});

/** --- Disciplinas --- */

// Obtener todas las disciplinas
Route::get('/disciplinas', function () {
    return App\Models\Disciplina::all();
});

// Obtener todas las mesas de una disciplina en especifico
Route::get('/disciplinas/{disciplina}', function (App\Models\Disciplina $disciplina) {
    return $disciplina->load('mesas_de_juicio');
});

/** --- Calificaciones --- */

// Obtener todas las calificaciones sin agrupar promedios
Route::get('/calificaciones', function () {
    return App\Models\Calificacion::with('gimnasta')->get();
});


// Obtener todas las calificaciones de una gimnasta sin agrupar promedios
Route::get('/calificaciones/{gimnasta}', function (App\Models\Gimnasta $gimnasta) {
    return $gimnasta->calificaciones->load('juez');
});


// Insertar una nueva calificacion de una gimnasta
Route::post('/calificaciones', function (Request $request) {
    // Checar duplicados de calificaciones
    $calificacion = App\Models\Calificacion::where('juez_id',$request->juez_id)->where('gimnasta_id', $request->gimnasta_id)->where('disciplina_id',$request->disciplina_id)->get()->first();
    // Si no existe, entonces crear una nueva y notificar el evento
    if($calificacion == null){
        $calificacion = App\Models\Calificacion::firstOrCreate($request->all());
        event(new CalificacionPosted($calificacion));
        error_log('Calificacion registered');
    }
    return $calificacion;
});

// Obtener todas las calificaciones promedio de una gimnasta
Route::get('/calificaciones/{gimnasta}/promedio', function (App\Models\Gimnasta $gimnasta) {
    return $gimnasta->promedios();
});

// Obtener todas las calificaciones promedio de todas las gimnastas
// del mismo nivel y rango
Route::get('/calificaciones/{nivel}/{rango}/', function (App\Models\Nivel $nivel, App\Models\Rango $rango) {
    // Obtener todas las gimnastas del mismo rango y nivel
    $gimnastas = App\Models\Gimnasta::where('nivel_id',$nivel->id)->where('rango_id', $rango->id)->get();
    // Por cada una, calcular sus promedios de sus calificaciones
    $calificaciones = array();
    foreach($gimnastas as $gimnasta){
        array_push($calificaciones, $gimnasta->promedios());
    }
    return $gimnastas;
});
// Obtener los standings de las ultimas 10 calificaciones
Route::get('/standings', function () {
    $calificaciones = App\Models\Calificacion::with('gimnasta','disciplina')->orderByDesc('id')->get()->take(10);
    return $calificaciones;
});

// Obtener los standings de las ultimas n calificaciones
Route::get('/standings/{limit}', function ($limit) {
    $calificaciones = App\Models\Calificacion::with('gimnasta','disciplina')->orderByDesc('id')->get()->take($limit);
    return $calificaciones;
});



