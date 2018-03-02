@extends('layouts.app')

@section('content')
<!-- Vue content is not used here -->
<div id="app">
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-4 col-md-offset-4">
            <h1>Seleccionar Torneo</h1>
            <select class="form-control lg" name="rango" id="rango">
                @foreach ($torneos as $torneo)
                    <option value="{{$torneo->id}}">{{$torneo->nombre}}</option>
                @endforeach
            </select>
            <hr>
            <!-- Submit button -->
            <div class="row">
                <div class="col-xs-12">
                    <a href="#">
                        <button type="button" onclick="goToLink()" class="btn btn-success btn-lg ladda-button">
                            <span class="ladda-label"><i class="fa fa-plus"></i> Ir </span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <hr>

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