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

// Obtener todas las gimnastas con toda la informacion
Route::get('/gimnastas', function () {
    return App\Gimnasta::with(['Gimnasio.Ciudad','Nivel','Rango'])->get();
});

// Obtener una gimnasta en especifico con toda la informacion
Route::get('/gimnastas/{gimnasta}', function (App\Gimnasta $gimnasta) {
    return $gimnasta->load('gimnasio','nivel', 'rango');
});

// Obtener todas los gimnasios con las gimnastas de cada uno
Route::get('/gimnasios', function () {
    return App\Gimnasio::with(['Gimnastas'])->get();
});

// Obtener un gimnasio con sus gimnastas
Route::get('/gimnasios/{gimnasio}', function (App\Gimnasio $gimnasio) {
    return $gimnasio->load('Gimnastas');
});

// Obtener todas las ciudades con gimnasios
Route::get('/ciudades', function () {
    return App\Ciudad::with('gimnasios')->get();
});

// Obtener una ciudad con sus gimnasios y gimnastas
Route::get('/ciudades/{ciudad}', function (App\Ciudad $ciudad) {
    return $ciudad->load('gimnasios','gimnastas');
});

