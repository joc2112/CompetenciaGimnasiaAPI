@extends('layouts.app')

@section('content')


<div id="app">
    <resultados-component :gimnasta="{{$gimnasta}} "></resultados-component>
</div>
          

@endsection