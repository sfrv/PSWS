@extends('layouts.admin')
@section('contenido')

<section class="content-header">
  <h1 align="center">
    * * * * * <b>Redes Urbanas</b> * * * * *
  </h1>
  <br>
  <ol class="breadcrumb">
    <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
  </ol>
</section>
<section>
<div class="row">
  <div class="col-sm-12 col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
          <h3 align="center">Panel de control de <span class="text-bold">Redes</span></h3>

          <div class="panel-body">
            {!!Form::model($red,['method'=>'PATCH','route'=>['red.update',$red->id]])!!}
            {{Form::token()}}
              <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control" value="{{$red->nombre}}">
              </div>
              <div class="form-group">
                <label for="nombre">Descripcion:</label>
                <input type="text" name="descripcion" class="form-control" value="{{$red->descripcion}}">
              </div>
              <div class="form-group">
                <label for="nombre">Image:</label>
                <input type="text" name="image" class="form-control" value="{{$red->image}}">
              </div>

               <div class="form-group">
                <div class="col-sm-8 col-sm-offset-2">
                  <br>
                  <button class="btn btn-primary btn-block">
                    Editar Red <i class="fa fa-arrow-circle-right"></i>
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
