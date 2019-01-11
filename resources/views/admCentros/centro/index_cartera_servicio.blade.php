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
         
         <table class="table table-bordered" style="border-top-color: #00AEFF">
           <thead>
           <tr>
             <th class="center">ID</th>
             <th class="center">Titulo</th>
             <th class="center">Mes</th>
             <th class="center">Anio</th>
             <th class="center">Estado</th>
             <th class="center">Opciones</th>
           </tr>
           </thead>
           <tbody>
             @foreach($cartera_servicios as $var)
                  <tr>
                    <td>{{ $var->id }}</td>
                    <td>{{ $var->titulo }}</td>
                    <td>{{ $var->mes }}</td>
                    <td>{{ $var->anio}}</td>
                    <td>{{ $var->estado }}</td>
                    <td>
                      <a href="" data-target="#modal-delete-{{$var->id}}" data-toggle="modal" class="btn btn-danger" data-placement="top" data-original-title="Remove"><i class="fa fa-times fa fa-white"></i></a>
                      <a href="{{ route('edit-cartera-servicio', $var->id) }}" class="btn btn-info" data-placement="top" data-original-title="Ver Detalle de Orden de Produccion"><i class="fa fa-edit"></i></a>
                      <a href="{{ route('show-cartera-servicio', $var->id) }}" class="btn btn-success" data-placement="top" data-original-title="Ver Detalle de Orden de Produccion"><i class="fa fa-eye"></i></a>
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
