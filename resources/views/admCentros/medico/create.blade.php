@extends('layouts.admin')
@section('contenido')

<section class="content-header">
  <h1 align="center">
    * * * * * <b>Médicos</b> * * * * *
  </h1>
  <br>
</section>
<section>
<div class="row">
  <div class="col-sm-12 col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
          <h3 align="center">Panel de control de <span class="text-bold">Médicos</span></h3>

          <div class="panel-body">
            @include('alertas.request')
            {!!Form::open(array('url'=>'adm/medico','method'=>'POST','autocomplete'=>'off'))!!}
  			    {{Form::token()}} 

            <div class="row">
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
              	<div class="form-group">
              	   <label for="id_nivel">Nombre: </label>
                   <input required="required" name="nombre" id="nombre" class="autosize form-control" type="text">
                  </div> 
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
              	<div class="form-group">
              	   <label for="id_nivel">Apellido: </label>
                   <input required="required" name="apellido" id="apellido" class="autosize form-control" type="text">
              	</div>
              </div>
            </div>
            <br>

            <div class="row">
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
              	<div class="form-group">
              	   <label for="id_nivel">Telefono: </label>
                   <input required="required" name="telefono" id="telefono" class="autosize form-control" type="number">
                  </div> 
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
              	<div class="form-group">
              	   <label for="id_nivel">Correo: </label>
                   <input required="required" name="correo" id="correo" class="autosize form-control" type="mail">
              	</div>
              </div>
            </div>

            <br>

            <div class="row">
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
              	<div class="form-group">
              	   <label for="id_nivel">Direccion: </label>
                   <textarea required="required" class="autosize form-control" id="form-field-24" name="direccion"></textarea>
                  </div> 
              </div>
            </div>

            <br>
            <div class="col-sm-6 col-sm-offset-3" id="guardar">
             <div class="form-group">
               <button class="btn btn-primary btn-block" type="submit">
                 Registrar
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
