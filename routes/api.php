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

// Obtener todas las ciudades con gimnasios y gimnastas
Route::get('/ciudades', function () {
    return App\Ciudad::with('gimnasios','gimnastas')->get();
});


