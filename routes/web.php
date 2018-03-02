<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::group(['prefix' => 'admin', 'middleware' => ['admin'], 'namespace' => 'Admin'], function()
{
   CRUD::resource('tag', 'TagCrudController');
   CRUD::resource('gimnasta', 'GimnastaCrudController');
   CRUD::resource('calificacion', 'CalificacionCrudController');
   CRUD::resource('gimnasio', 'GimnasioCrudController');
   CRUD::resource('ciudad', 'CiudadCrudController');
   CRUD::resource('juez', 'JuezCrudController');
   CRUD::resource('mesa', 'MesaDeJuicioCrudController');
   CRUD::resource('capturista', 'CapturistaCrudController');

   // Ruta que muestra el formulario para crear un torneo
   Route::get('/torneo/select', 'TorneoController@index')->name('select_torneo');
});

Auth::routes();

Route::get('/' , ['middleware' => 'auth', function () {
    if(Auth::user()->hasRole("Admin")){
        return redirect('/resultados');
    }
    return redirect('/capturar');
    
}]);

Route::group(['middleware' => ['auth'], 'namespace' => 'Capturista'], function(){
    // Ruta principal de captura de calificaciones
    Route::get('/capturar', 'CapturaController@index')->name('home');
    // Real time standings
    Route::get('/monitor', 'CapturaController@standings')->name('monitor');
    // Ruta para los resultados de una gimnasta en especifico
    Route::get('/resultados/{gimnasta}', 'CapturaController@resultados')->name('resultados');
    // Ruta para resultados grupales
    Route::get('/resultados/{nivel}/{rango}', 'CapturaController@resultados_nivel_rango')->name('resultados_nivel_rango');
    // Ruta paa seleccionar el nivel y rango de edad de los resultados
    Route::get('/resultados', 'CapturaController@resultados_form')->name('resultados_form');
});

