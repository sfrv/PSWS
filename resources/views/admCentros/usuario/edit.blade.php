@extends('layouts.admin')
@section('contenido')

<section class="content-header">
  <h1 align="center">
    <b>USUARIO: {{$usuario->apellido}} {{$usuario->nombre}}</b>
  </h1>
  <br>
</section>
<section>
<div class="row">
  <div class="col-sm-12 col-xs-12">
    <div class="box box-success">
      <div class="box-header with-border">
          <h3 align="center">PANEL DE EDICION DE <span class="text-bold">USUARIO</span></h3>

          <div class="panel-body">
            @include('alertas.request')
            {!!Form::model($usuario,['method'=>'PATCH','route'=>['usuario.update',$usuario->id]])!!}
            {{Form::token()}}
              <div class="form-group">
                <label for="nombre">NOMBRE:</label>
                <input type="text" name="nombre" class="form-control" value="{{$usuario->nombre}}">
              </div>
              <div class="form-group">
                <label for="apellido">APELLIDO:</label>
                <input type="text" name="apellido" class="form-control" value="{{$usuario->apellido}}">
              </div>
              <div class="form-group">
                <label for="email">EMAIL:</label>
                <input type="email" name="email" class="form-control" value="{{$usuario->email}}">
              </div>
              	<div class="form-group">
                	<label for="name">NAME:</label>
                	<input type="text" name="name" class="form-control" value="{{$usuario->name}}">
              	</div>
              	<div class="form-group">
              	   	<label for="password_">CONFIRMAR: </label>
                   	<input placeholder="PASSWORD..."  name="password" id="password" class="autosize form-control" type="password">
              	</div>
              	<div class="form-group">
              	   	<label for="password_">CONFIRMAR PASSWORD: </label>
                   	<input placeholder="PASSWORD..." name="password_" id="password_" class="autosize form-control" type="password">
              	</div>
              	<div class="form-group">
	                <label for="tipo">TIPO DE USUARIO:</label>
	                <select name="tipo" id="tipo" class="form-control selectpicker">
	                  	@foreach($tipos_usuario as $var)
	                    	@if($var == $usuario->tipo)
	                      		<option value="{{$var}}" selected>{{$var}}</option>
	                    	@else
	                      		<option value="{{$var}}">{{$var}}</option>
	                    	@endif
	                  	@endforeach
	                </select>
	            </div>
	            <div class="form-group">
	                <label for="id_centro_medico">RED:</label>
	                <select name="id_centro_medico" id="id_centro_medico" class="form-control selectpicker">
	                  	@foreach($centros as $var)
	                    	@if($var->id == $usuario->id_centro_medico)
	                      		<option value="{{$var->id}}" selected>{{$var->nombre}}</option>
	                    	@else
	                      		<option value="{{$var->id}}">{{$var->nombre}}</option>
	                    	@endif
	                  	@endforeach
	                </select>
	            </div>
               <div class="form-group">
                <div class="col-sm-8 col-sm-offset-2">
                  <br>
                  <button class="btn btn-primary btn-block">
                    EDITAR USUARIO <i class="fa fa-arrow-circle-right"></i>
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
