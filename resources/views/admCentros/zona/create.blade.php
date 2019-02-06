@extends('layouts.admin')
@section('contenido')

<section class="content-header">
  <h1 align="center">
    <b>ZONA</b>
  </h1>
  <br>
</section>
<section>
<div class="row">
  <div class="col-sm-12 col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
          <h3 align="center">PANEL DE REGISTRO DE <span class="text-bold">ZONAS</span></h3>

          <div class="panel-body">
            @include('alertas.request')
            {!!Form::open(array('url'=>'adm/zona','method'=>'POST','autocomplete'=>'off'))!!}
  			    {{Form::token()}} 

            <div class="row">
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
              	<div class="form-group">
              	   <label for="id_nivel">NOMBRE: </label>
                   <textarea required="required" class="autosize form-control" id="form-field-24" name="nombre"></textarea>
              	</div> 
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
              	<div class="form-group">
              	   <label for="id_nivel">DESCRIPCION: </label>
                   <textarea required="required" class="autosize form-control" id="form-field-24" name="descripcion"></textarea>
              	</div>
              </div>
            </div>
            <br>

            <br>
            <div class="col-sm-8 col-sm-offset-2" id="guardar">
             <div class="form-group">
               <button class="btn btn-primary btn-block" type="submit">
                 REGISTRAR ZONA <i class="fa fa-arrow-circle-right"></i>
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
