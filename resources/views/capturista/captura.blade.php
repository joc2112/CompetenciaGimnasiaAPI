@extends('layouts.app')

@section('content')


<div class="container-fluid">
    <h1> Captura de Calificaciones </h3>
    <div class="box">
      <div class="box-header with-border">
        <!-- Jueces y Aparato -->
        <div class="row">
          <div class="col-xs-12 col-md-8">
            <div class="row">
              <div class="col-xs-6">
                <h3>Jueces</h3>
              </div>
              <div class="col-xs-2">
                <div class="box-header with-border">
                  <a href="http://localhost:8000/admin/gimnasta/create" class="btn btn-success ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-plus"></i> Añadir Juez</span></a>
                  <div id="datatable_button_stack" class="pull-right text-right"></div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-10">
                <span> Toy Ziemann Sr.	Schimmel </span>
              </div>
              <div class="col-xs-2">
                <a href="http://localhost:8000/admin/gimnasta/create" class="btn btn-danger btn-xs ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-minus"></i></span></a>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-10">
                <span> Bernard Sebastian </span>
              </div>
              <div class="col-xs-2">
                <a href="http://localhost:8000/admin/gimnasta/create" class="btn btn-danger btn-xs ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-minus"></i></span></a>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-10">
                <span> Toy Ziemann The Second </span>
              </div>
              <div class="col-xs-2">
                <a href="http://localhost:8000/admin/gimnasta/create" class="btn btn-danger btn-xs ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-minus"></i></span></a>
              </div>
            </div>
          </div>
          <div class="col-xs-6 col-md-4">
            <h3>Aparato</h3>
            <select class="form-control">
              <option>Piso</option>
              <option>Barra</option>
            </select>
          </div>
        </div>
        <hr>
        <!-- Participante/Gimansta -->
        <div class="row">
            <div class="col-xs-12">
              <h3>Participante</h3>
              <select class="form-control">
                <option>Pedrita Santita</option>
                <option>Leprina Sabrina</option>
              </select>
            </div>
        </div>
        <hr>
        <!-- Calificaciones -->
        <div class="row">
            <div class="col-xs-12">
            <table class="table table-striped">
              <thead>
                <th>Juez</th>
                <th>Calificacion</th>
              </thead>
              <tbody>
                <tr>
                  <td>Toy Ziemann Sr.	Schimmel</td>
                  <td>15</td>
                </tr>
                <tr>
                  <td>Bernard Sebastian</td>
                  <td>10</td>
                </tr>
                <tr>
                  <td>Toy Ziemann The Second</td>
                  <td>5</td>
                </tr>
              </tbody>
            </table>
            </div>
        </div>
        <div id="app">
          <ExampleComponent>
          </ExampleComponent>
        </div>
      </div>
    </div>

</div>
          

@endsection