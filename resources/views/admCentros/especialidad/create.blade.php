@extends('layouts.admin')
@section('contenido')

<section class="content-header">
  <h1 align="center">
    <b>ESPECIALIDAD</b>
  </h1>
  <br>
</section>
<section>
<div class="row">
  <div class="col-sm-12 col-xs-12">
    <div class="box box-success">
      <div class="box-header with-border">
          <h3 align="center">PANEL DE REGISTRO DE <span class="text-bold">ESPECIALIDADES</span></h3>

          <div class="panel-body">
            {!!Form::open(array('url'=>'adm/especialidad','method'=>'POST','autocomplete'=>'off'))!!}
  			    {{Form::token()}}

            <div class="row">
              <div class="form-group">
                <div class="col-lg-12 col-md-6 col-dm-6 col-xs-12">
                  <label for="form-field-24">
                    NOMBRE:
                  </label>
                  <textarea required="required" class="autosize form-control" id="form-field-24" name="nombre"></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-12 col-md-6 col-dm-6 col-xs-12">
                  <label for="form-field-24">
                    DESCRIPCION:
                  </label>
                  <textarea required="required" class="autosize form-control" id="form-field-24" name="descripcion"></textarea>
                </div>
              </div>
            </div>
            <br>
            <div class="col-sm-8 col-sm-offset-2" id="guardar">
             <div class="form-group">
               <button class="btn btn-primary btn-block" type="submit">
                 REGISTRAR ESPECIALIDAD <i class="fa fa-arrow-circle-right"></i>
               </button>
             </div>
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
