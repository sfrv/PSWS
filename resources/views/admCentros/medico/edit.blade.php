@extends('layouts.admin')
@section('contenido')

<section class="content-header">
  <h1 align="center">
    <b>MEDICO: {{$medico->apellido}} {{$medico->nombre}}</b>
  </h1>
  <br>
</section>
<section>
<div class="row">
  <div class="col-sm-12 col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
          <h3 align="center">PANEL DE EDICION DE <span class="text-bold">MEDICO</span></h3>

          <div class="panel-body">
            @include('alertas.request')
            {!!Form::model($medico,['method'=>'PATCH','route'=>['medico.update',$medico->id]])!!}
            {{Form::token()}}
              <div class="form-group">
                <label for="nombre">NOMBRE:</label>
                <input type="text" name="nombre" class="form-control" value="{{$medico->nombre}}">
              </div>
              <div class="form-group">
                <label for="apellido">APELLIDO:</label>
                <input type="text" name="apellido" class="form-control" value="{{$medico->apellido}}">
              </div>
              <div class="form-group">
                <label for="telefono">TELEFONO:</label>
                <input type="text" name="telefono" class="form-control" value="{{$medico->telefono}}">
              </div>
              <div class="form-group">
                <label for="correo">CORREO:</label>
                <input type="text" name="correo" class="form-control" value="{{$medico->correo}}">
              </div>
              <div class="form-group">
                <label for="direccion">DIRECCION:</label>
                <input type="text" name="direccion" class="form-control" value="{{$medico->direccion}}">
              </div>
               <div class="form-group">
                <div class="col-sm-8 col-sm-offset-2">
                  <br>
                  <button class="btn btn-primary btn-block">
                    EDITAR MEDICO <i class="fa fa-arrow-circle-right"></i>
                  </button>
                  <br>
                </div>
              </div>
            {!!Form::close()!!}
          </div>
      </div>
    </div>
  </div>
</div>
</section>
@endsection
