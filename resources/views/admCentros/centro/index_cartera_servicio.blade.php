@extends('layouts.admin')
@section('contenido')
 <section class="content-header">
   <h1 align="center">
       * * * * * <b>Cartera de Servicios del Centro: {{ $centro->nombre }}</b> * * * * *
   </h1>

 </section>
 <br>

 <section class="content">
   <div class="row">
     <div class="col-sm-12 col-xs-12">
       <div class="box box-primary">
       <div class="box-header with-border">
           <h3 align="center">Panel de Control <span class="text-bold">de Cartera de Servicios Registrados</span></h3>
       </div>
       <div class="box-body">
         @include('admCentros.centro.search_cartera_servicio')
         <table class="table table-bordered" style="border-top-color: #00AEFF">
           <thead>
           <tr>
             <th class="text-center">ID</th>
             <th class="text-center">Titulo</th>
             <th class="text-center">Mes</th>
             <th class="text-center">Anio</th>
             <th class="text-center">Estado</th>
             <th class="text-center">Opciones</th>
           </tr>
           </thead>
           <tbody>
             @foreach($cartera_servicios as $var)
                  <tr>
                    <td class="text-center">{{ $var->id }}</td>
                    <td class="text-center">{{ $var->titulo }}</td>
                    <td class="text-center">{{ $var->mes }}</td>
                    <td class="text-center">{{ $var->anio}}</td>
                    <td class="text-center">{{ $var->estado }}</td>
                    <td class="text-center">
                      <a href="" data-target="#modal-delete-{{$var->id}}" data-toggle="modal" class="btn btn-danger" data-placement="top" data-original-title="Remove"><i class="fa fa-times fa fa-white"></i></a>
                      <a href="{{ route('edit-cartera-servicio',[$var->id,$centro->id]) }}" class="btn btn-info" data-placement="top"><i class="fa fa-edit"></i></a>
                      <a href="{{ route('show-cartera-servicio', $var->id) }}" class="btn btn-success" data-placement="top" data-original-title="Ver Detalle de Orden de Produccion"><i class="fa fa-eye"></i></a>
                      <a href="{{ route('renovate-cartera-servicio',[$var->id,$centro->id] ) }}" class="btn btn-warning" data-placement="top"><i class="fa fa-refresh"></i></a>
                      <a href="{{ route('generar-excel-cartera-servicio',[$var->id,$centro->id] ) }}" class="btn btn-primary" data-placement="top"><i class="fa fa-download"></i></a>
                    </td>
                  </tr>
                  
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
