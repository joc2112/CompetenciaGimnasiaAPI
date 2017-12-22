<?php

use Illuminate\Http\Request;

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
    return App\Gimnasta::with(['Gimnasio.Ciudad','Nivel','Rango'])->get();
});

// Obtener una gimnasta en especifico con toda la informacion
Route::get('/gimnastas/{gimnasta}', function (App\Gimnasta $gimnasta) {
    return $gimnasta->load('gimnasio','nivel', 'rango');
});

// Registrar una nueva gimnasta
Route::post('/gimnastas', function (Request $request){
    $gimnasta = App\Gimnasta::firstOrCreate($request->all());
    return $gimnasta;
});

/** --- Gimnasios  --- */

// Obtener todas los gimnasios con las gimnastas de cada uno
Route::get('/gimnasios', function () {
    return App\Gimnasio::with(['Gimnastas'])->get();
});

// Obtener un gimnasio con sus gimnastas
Route::get('/gimnasios/{gimnasio}', function (App\Gimnasio $gimnasio) {
    return $gimnasio->load('Gimnastas');
});

/** --- Ciudades  --- */

// Obtener todas las ciudades con gimnasios
Route::get('/ciudades', function () {
    return App\Ciudad::with('gimnasios')->get();
});

// Obtener una ciudad con sus gimnasios y gimnastas
Route::get('/ciudades/{ciudad}', function (App\Ciudad $ciudad) {
    return $ciudad->load('gimnasios','gimnastas');
});

/** --- Niveles y Rangos de Edad  --- */

// Obtener todas las gimnastas de un nivel (1-10 inclusivo)
Route::get('/niveles/{nivel}', function (App\Nivel $nivel) {
    return $nivel->load('gimnastas');
});

// Obtener todas las gimnastas de un rango_de_edad_id (ver tabla de rangos)
Route::get('/rangos/{rango}', function (App\Rango $rango) {
    return $rango->load('gimnastas');
});

/** ------- COMPETENCIA  ------- */


/** --- Jueces --- */

// Obtener todos los jueces con las mesas a las que pertenecen
Route::get('/jueces', function () {
    return App\Juez::with('mesas_de_juicio')->get();
});

/** --- Capturistas --- */

// Obtener todas las capturistas con sus mesas
Route::get('/capturistas', function () {
    return App\Capturista::with('mesas_de_juicio')->get();
});


/** --- Mesas de Juicio --- */

// Obtener todas las mesas con sus jueces, disciplina y capturista
Route::get('/mesas', function () {
    return App\MesaDeJuicio::with('jueces', 'disciplina', 'capturista')->get();
});

/** --- Disciplinas --- */

// Obtener todas las mesas de una disciplina en especifico
Route::get('/disciplinas/{disciplina}', function (App\Disciplina $disciplina) {
    return $disciplina->load('mesas_de_juicio');
});

