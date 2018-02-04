@extends('layouts.app')

@section('content')
<div id="app">
    <div class="container-fluid">
        <div class="row">
            <h2>Buscar resultados de la competencia</h2>
        </div>
        <div class="row">
            <div class="col-xs-6 col-md-4">
                <h3>Nivel</h3>
                <select class="form-control" name="nivel" id="nivel">
                    @foreach ($niveles as $nivel)
                        <option value="{{$nivel->id}}">{{$nivel->nivel}}</option>
                    @endforeach
                </select>
                <hr>
                <h3>Rango de edad</h3>
                <select class="form-control" name="rango" id="rango">
                    @foreach ($rangos as $rango)
                        <option value="{{$rango->id}}">{{$rango->rango}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <hr>
        <!-- Submit button -->
        <div class="row">
            <div class="col-xs-12">
                <a href="#">
                    <button type="button" onclick="goToLink()" class="btn btn-success btn-lg ladda-button">
                        <span class="ladda-label"><i class="fa fa-check"></i> Mostrar </span>
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function goToLink(){
        var nivel = document.getElementById("nivel").value;
        var rango = document.getElementById("rango").value;
        
        // Redirigir al dar click en boton
        window.location.replace("/resultados/" + nivel + "/" + rango);

        // similar behavior as clicking on a link
        // window.location.href = "/resultados/" + nivel + "/" + rango;
    }
</script>

@endsection