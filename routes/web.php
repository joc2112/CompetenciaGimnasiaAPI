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
   CRUD::resource('gimnasio', 'GimnasioCrudController');
   CRUD::resource('ciudad', 'CiudadCrudController');
   CRUD::resource('juez', 'JuezCrudController');
   CRUD::resource('mesa', 'MesaDeJuicioCrudController');
   CRUD::resource('capturista', 'CapturistaCrudController');
});