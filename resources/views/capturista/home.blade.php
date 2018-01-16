@extends('layouts.app')

@section('content')


<div class="container-fluid">
    <h1> Captura de Calificaciones </h3>
    <div class="box">
      <div class="box-header with-border">
        <div class="row">
          <div class="col-xs-12 col-md-8">
            <div class="row">
              <div class="col-xs-8">
                <h3>Jueces</h3>
              </div>
              <div class="col-xs-4">
                <div class="box-header with-border pull-right">
                  <a href="http://localhost:8000/admin/gimnasta/create" class="btn btn-success ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-plus"></i> Añadir Juez</span></a>
                  <div id="datatable_button_stack" class="pull-right text-right"></div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-8">
                <span> Toy Ziemann Sr.	Schimmel </span>
              </div>
              <div class="col-xs-4">
                <a href="http://localhost:8000/admin/gimnasta/create" class="btn btn-danger btn-xs ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-minus"></i></span></a>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-8">
                <span> Bernard Sebastian </span>
              </div>
              <div class="col-xs-4">
                <a href="http://localhost:8000/admin/gimnasta/create" class="btn btn-danger btn-xs ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-minus"></i></span></a>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-8">
                <span> Toy Ziemann The Second </span>
              </div>
              <div class="col-xs-4">
                <a href="http://localhost:8000/admin/gimnasta/create" class="btn btn-danger btn-xs ladda-button" data-style="zoom-in"><span class="ladda-label"><i class="fa fa-minus"></i></span></a>
              </div>
            </div>
          </div>
          <div class="col-xs-6 col-md-4">
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
          </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-12">
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat"
            </div>
        </div>
      </div>
    </div>

</div>
          

@endsection