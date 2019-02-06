@extends('layouts.admin')
@section('contenido')

<section class="content-header">
  <h1 align="center">
    <b>RED: {{$red->nombre}}</b>
  </h1>
  <br>
</section>
<section>
<div class="row">
  <div class="col-sm-12 col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
          <h3 align="center">PANEL DE EDICION DE <span class="text-bold">REDES</span></h3>

          <div class="panel-body">
            {!!Form::model($red,['method'=>'PATCH','route'=>['red.update',$red->id]])!!}
            {{Form::token()}}
              <div class="form-group">
                <label for="nombre">NOMBRE:</label>
                <input type="text" name="nombre" class="form-control" value="{{$red->nombre}}">
              </div>
              <div class="form-group">
                <label for="nombre">DESCRIPCION:</label>
                <input type="text" name="descripcion" class="form-control" value="{{$red->descripcion}}">
              </div>
              <div class="form-group">
                <label for="nombre">IMAGEN:</label>
                <input type="text" name="image" class="form-control" value="{{$red->image}}">
              </div>

               <div class="form-group">
                <div class="col-sm-8 col-sm-offset-2">
                  <br>
                  <button class="btn btn-primary btn-block">
                    EDITAR RED <i class="fa fa-arrow-circle-right"></i>
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
