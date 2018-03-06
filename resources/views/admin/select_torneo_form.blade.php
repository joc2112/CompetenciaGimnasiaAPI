@extends('layouts.app')

@section('content')
<!-- Vue content is not used here -->
<div id="app">
</div>

<div class="container-fluid">
    <h2>
        <b> Torneo Actual: </b>  <i>{{ session('torneo_id', App\Models\Torneo::find(1))->nombre }} </i>
    </h2>
    <form method="POST" action="{{ route('torneo.select.post') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-xs-4 col-md-offset-4">
                <h1>Seleccionar Torneo</h1>
                <select class="form-control lg" name="torneo" id="torneo">
                    @foreach ($torneos as $torneo)
                        <option value="{{$torneo->id}}">{{$torneo->nombre}}</option>
                    @endforeach
                </select>
                <hr>
                <!-- Submit button -->
                <div class="row">
                    <div class="col-xs-12">
                            <button type="submit" onclick="goToLink()" class="btn btn-success btn-lg ladda-button">
                                <span class="ladda-label"><i class="fa fa-plus"></i> Ir </span>
                            </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
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