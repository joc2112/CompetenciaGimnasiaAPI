@extends('layouts.app')

@section('content')


<div id="app">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h2> Resultados grupales de:</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-2">
                <h3>Nivel: {{$nivel->nivel}}</h3>
            </div>
            <div class="col-xs-2">
            <h3>Rango de edad: {{$rango->rango}}</h3>
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
                            <hr>
                            <tr is="resultados-component" :gimnasta="{{$gimnasta}} "></tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
          

@endsection