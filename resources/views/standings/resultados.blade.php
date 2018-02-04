@extends('layouts.app')

@section('content')


<div id="app">
<div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h2> Resultados de: {{$gimnasta->nombre}}</h2>
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
                        <tr is="resultados-component" :gimnasta="{{$gimnasta}} "></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
          

@endsection