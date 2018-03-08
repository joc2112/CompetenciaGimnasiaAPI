@extends('layouts.app')

@section('content')


<div id="app">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-9">
                <h1> Torneo <b>{{$torneo->nombre}}</b></h1>
                <h3>{{$torneo->cede}}</h3>
                <h3> {{$torneo->fecha}}</h3>
                <br>
            </div>
            <div class="col-xs-3">
                <h3>Nivel: <b>{{$nivel->nivel}}</b></h3>
                <h3>Rango de edad: <b>{{$rango->rango}}</b></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-striped">
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
                        @foreach ($gimnastas as $gimnasta)
                            <!-- Use "is" property to render Vue component -->
                            <tr is="resultados-component" :individual="false" :gimnasta="{{$gimnasta}} "></tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
          

@endsection