@extends('layouts.admin')
@section('contenido')

<section class="content-header">
  <h1 align="center">
    * * * * * <b>nombre: {{$centro->nombre}}</b> * * * * *
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
          <h3 align="center">Detalle del<span class="text-bold">Centro de Salud</span></h3>
          <br>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
              	<div class="form-group">
              	   <label for="id_red">Red:</label>
                   <p>{{$centro->nombreRed}}</p>
              	</div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
              	<div class="form-group">
              	   <label for="id_tiposervicio">Tipo de Servicio</label>
                   <p>{{$centro->nombreServicio}}</p>
              	</div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
              	<div class="form-group">
              	   <label for="id_zona">Zona:</label>
                   <p>{{$centro->nombreZona}}</p>
              	</div>
              </div>
              <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
              	<div class="form-group">
              	   <label for="id_nivel">Nivel: </label>
                   <p>{{$centro->nombreNivel}}</p>
              	</div>
              </div>
              <div class="form-group">
                <div class="col-lg-12 col-md-6 col-dm-6 col-xs-12">
                  <label for="form-field-24">
                    Descripcion:
                  </label>
                  <p>{{$centro->descripcion}}</p>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                  <label for="form-field-24">
                    Direccion del Centro:
                  </label>
                  <p>{{$centro->direccion}}</p>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                  <label for="form-field-24">
                    Nombre del Centro:
                  </label>
                  <p>{{$centro->nombre}}</p>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                  <label for="form-field-24">
                    Latitud:
                  </label>
                  <p>{{$centro->latitud}}</p>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-6 col-md-6 col-dm-6 col-xs-12">
                  <label for="form-field-24">
                    Longitud:
                  </label>
                  <p>{{$centro->longitud}}</p>
                </div>
              </div>
            </div>
            <br>
            <div class="panel panel-info">
              <div class="panel-heading">Detalle</div>
              <div class="panel-body">
          		<div class="col-lg-12 col-md-12 col-dm-12 col-xs-12">
          			  <div class="table-responsive">
          			<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
          			<thead style="background-color:#A9D0F5">
          				<th>Especialidad</th>
          			</thead>
          			<tbody>
                  @foreach($detalle as $var)
                      <tr>
                          <td class="center">{{$var -> nombre}}</td>
                      </tr>
                  @endforeach
                </tbody>
          			</table>
          			</div>
          		</div>
              </div>
             </div>
             <div class="col-sm-8 col-sm-offset-2">
               <div class="form-group">
               <a href="{{URL::action('LugarController@index')}}"><button class="btn btn-primary btn-block" type="submit">
                   <i class="fa fa-arrow-circle-left">Atras </i>
                 </button></a>
               </div>
             </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
@endsection
