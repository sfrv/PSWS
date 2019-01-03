@extends('layouts.admin')
@section('contenido')
 <section class="content-header">
   <h1 align="center">
       * * * * * <b>Centros Médicos</b> * * * * *
   </h1>
   <ol class="breadcrumb">
     <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
     <li><a href="#">index</a></li>
   </ol>
 </section>
 <br>

 <section class="content">
   <div class="row">
     <div class="col-sm-12 col-xs-12">
       <div class="box box-primary">
       <div class="box-header with-border">
           <h3 align="center">Panel de Control <span class="text-bold">de los Centros Médicos Registrados</span></h3>
       </div>
       <div class="box-body">
         @include('admCentros.centro.search')
         <table class="table table-bordered" style="border-top-color: #00AEFF">
           <thead>
           <tr>
             <th class="center">Nombre</th>
             <th class="center">Direccion</th>
             <th class="center">Lat|Long</th>
             <th class="center">Red</th>
             <th class="center">Servicio</th>
             <th class="center">Zona</th>
             <th class="center">Nivel</th>
             <th class="center">Opciones</th>
           </tr>
           </thead>
           <tbody>
             @foreach($lugares as $var)
                  <tr>
                    <td>{{ $var->nombre }}</td>
                    <td>{{ $var->direccion }}</td>
                    <td>{{ $var->latitud}}|{{ $var->longitud}}</td>
                    <td>{{ $var->id_red }}</td>
                    <td>{{ $var->id_tiposervicio }}</td>
                    <td>{{ $var->id_zona }}</td>
                    <td>{{ $var->id_nivel }}</td>
                    <td>
                      <a href="" data-target="#modal-delete-{{$var->id}}" data-toggle="modal" class="btn btn-danger" data-placement="top" data-original-title="Remove"><i class="fa fa-times fa fa-white"></i></a>
                      <a href="{{URL::action('LugarController@show',$var->id)}}" class="btn btn-info" data-placement="top" data-original-title="Ver Detalle de Orden de Produccion"><i class="fa fa-bars"></i></a>
                    </td>
                  </tr>
                  @include('admCentros.centro.modal')
              @endforeach
           </tbody>
         </table>
       </div>

     </div>
     </div>
   </div>
   <br>
 </section>
@endsection
