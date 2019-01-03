@extends('layouts.admin')
@section('contenido')

<section class="content-header">
  <h1 align="center">
    * * * * * <b>Niveles de Centros Medicos</b> * * * * *
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
  </ol>
</section>
<section>
<div class="row">
  <div class="col-sm-12 col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
          <h3 align="center">Panel de control de <span class="text-bold">Niveles</span></h3>

          <div class="panel-body">
            {!!Form::open(array('url'=>'adm/nivel','method'=>'POST','autocomplete'=>'off'))!!}
  			    {{Form::token()}}

            <div class="row">
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
              	<div class="form-group">
              	   <label for="id_nivel">Nombre: </label>
                   <textarea required="required" class="autosize form-control" id="form-field-24" name="nombre"></textarea>
              	</div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
              	<div class="form-group">
              	   <label for="id_nivel">Escriba una breve Descripcion: </label>
                   <textarea required="required" class="autosize form-control" id="form-field-24" name="descripcion"></textarea>
              	</div>
              </div>
            </div>
            <br>

            <br>
            <div class="col-sm-8 col-sm-offset-2" id="guardar">
             <div class="form-group">
               <button class="btn btn-primary btn-block" type="submit">
                 Registrar Nivel <i class="fa fa-arrow-circle-right"></i>
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
