@extends('layouts.admin')
@section('contenido')

<section class="content-header">
  <h1 align="center">
    <b>USUARIO</b>
  </h1>
  <br>
</section>
<section>
<div class="row">
  <div class="col-sm-12 col-xs-12">
    <div class="box box-success">
      <div class="box-header with-border">
          <h3 align="center">PANEL DE REGISTRO DE <span class="text-bold">USUARIOS</span></h3>
          <br>
          <div class="panel-body">
            @include('alertas.request')
            {!!Form::open(array('url'=>'adm/usuario','method'=>'POST','autocomplete'=>'off'))!!}
  			    {{Form::token()}} 

            <div class="row">
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
              	<div class="form-group">
              	   <label for="id_nivel">NOMBRE: </label>
                   <input placeholder="NOMBRE..." required="required" name="nombre" id="nombre" class="autosize form-control" type="text">
                  </div> 
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
              	<div class="form-group">
              	   <label for="id_nivel">APELLIDO: </label>
                   <input placeholder="APELLIDO..." required="required" name="apellido" id="apellido" class="autosize form-control" type="text">
              	</div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
              	<div class="form-group">
              	   <label for="id_nivel">EMAIL: </label>
                   <input placeholder="EMAIL..." required="required" name="email" id="email" class="autosize form-control" type="email">
                  </div> 
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
              	<div class="form-group">
              	   <label for="id_nivel">NAME: </label>
                   <input placeholder="NAME..." required="required" name="name" id="name" class="autosize form-control" type="mail">
              	</div>
              </div>
            </div>

            <div class="row">
              	<div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
	              <div class="form-group">
	                <label for="id_centro_medico">RED:</label>
	                <select name="id_centro_medico" id="id_centro_medico" class="form-control selectpicker">
		                @foreach($centros as $var)
		                  <option value="{{$var->id}}" selected>{{$var->nombre}}</option>
		                @endforeach
	                </select>
	              </div>
	            </div>
	            <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
		            <div class="form-group">
			            <label for="tipo">TIPO DE USUARIO:</label>
			            <select name="tipo" id="tipo" class="form-control selectpicker">
		                  <option value="USUARIO">USUARIO</option>
		                  <option value="ADMINISTRADOR">ADMINISTRADOR</option>
			            </select>
		            </div>
		        </div>
            </div>

            <div class="row">
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
              	<div class="form-group">
              	   <label for="password">PASSWORD: </label>
                   <input placeholder="PASSWORD..." required="required" name="password" id="password" class="autosize form-control" type="password">
                  </div> 
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
              	<div class="form-group">
              	   <label for="password_">CONFIRMAR PASSWORD: </label>
                   <input placeholder="PASSWORD..." required="required" name="password_" id="password_" class="autosize form-control" type="password">
              	</div>
              </div>
            </div>

            <br>
            <div class="col-sm-6 col-sm-offset-3" id="guardar">
             <div class="form-group">
               <button class="btn btn-primary btn-block" type="submit">
                 REGISTRAR USUARIO <i class="fa fa-arrow-circle-right"></i>
               </button>
             </div>
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
</section>
@endsection
