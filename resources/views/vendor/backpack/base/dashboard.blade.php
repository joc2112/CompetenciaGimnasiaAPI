@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        Panel de Administrador
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <div class="box-title">Bienvenido!</div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Introduccion</h2>
                            <p style="font-size:18px">
                                Si esta es la primera vez que visita su panel
                                de administrador, entonces se le sugiere seguir
                                los siguientes pasos.
                                <ol>
                                    <li> Registre las ciudades participantes, para tener un registro regional. </li>
                                    <li> Registre los gimnasios de las gimnastas y
                                         seleccione la ciudad a la que pertenecen. </li>
                                    <li> Registre las gimnastas a participar (por ahora solo se pueden registrar
                                         una por una, pero en el futuro se permitira registrar a traves de hojas 
                                         de Excel). </li>
                                </ol>
                                Para control de usuarios y jueces:
                                <ol>
                                    <li> Registre los jueces del torneo. </li>
                                    <li> Registre capturistas. Para eso debera crear nuevos usuarios y seleccionar
                                         el rol de capturista. </li>
                                    <li> Por ultimo, cree las mesas de juicio seleccionando los jueces
                                         y la capturista de cada una de las mesas. </li>
                                </ol>
                            </p>
                
                </div>
            </div>
        </div>
    </div>
@endsection
