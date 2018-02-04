@extends('layouts.app')

@section('content')


<div id="app">
<div class="container-fluid">
        <div class="row">
            <div class="col-xs-8">
                <h1><b><u>{{$gimnasta->nombre}}</b></u></h1>
                <h2>Nivel: <b><i>{{$gimnasta->nivel->nivel}}</b></i></h2>
                <h2>Rango de edad: <b><i>{{$gimnasta->rango->rango}}</b></i></h2>
            </div>
            <div class="col-xs-4">
                <h2> Competencia <b>{{$competencia->nombre}}</b></h2>
                <h3>{{$competencia->lugar}}</h3>
                <h3> {{$competencia->fecha}}</h3>
                <br>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-striped" style="font-size: 25px;">
                    <thead>
                        <th>Gimnasta</th>
                        <th>ID</th>
                        <th>Gimnasio</th>
                        <th>Viga</th>
                        <th>Piso</th>
                        <th>Salto</th>
                        <th>Barras</th>
                        <th>All Around</th>

                    </thead>
                    <tbody>
                        <tr is="resultados-component" :gimnasta="{{$gimnasta}} "></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
          

@endsection