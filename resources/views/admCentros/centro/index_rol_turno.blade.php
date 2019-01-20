@extends('layouts.admin')
@section('contenido')
 <section class="content-header">
   <h1 align="center">
       * * * * * <b>Rol de Turno del Centro: {{ $centro->nombre }}</b> * * * * *
   </h1>

 </section>
 <br>

 <section class="content">
   <div class="row">
     <div class="col-sm-12 col-xs-12">
       <div class="box box-primary">
       <div class="box-header with-border">
           <h3 align="center">Panel de Control <span class="text-bold">de Rol de Turno Registrados</span></h3>
       </div>
       <div class="box-body">
         @include('admCentros.centro.search_rol_turno')
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
             @foreach($rol_turnos as $var)
                  <tr>
                    <td>{{ $var->id }}</td>
                    <td>{{ $var->titulo }}</td>
                    <td>{{ $var->mes }}</td>
                    <td>{{ $var->anio}}</td>
                    <td>{{ $var->estado }}</td>
                    <td>
                      <a href="" data-target="#modal-delete-{{$var->id}}" data-toggle="modal" class="btn btn-danger" data-placement="top" data-original-title="Remove"><i class="fa fa-times fa fa-white"></i></a>
                      <a href="" class="btn btn-info" data-placement="top" data-original-title="Ver Detalle de Orden de Produccion"><i class="fa fa-edit"></i></a>
                      <a href="{{ route('show-rol-turno', $var->id) }}" class="btn btn-success" data-placement="top" data-original-title="Ver Detalle de Orden de Produccion"><i class="fa fa-eye"></i></a>
                      <a href="" class="btn btn-warning" data-placement="top" data-original-title="Ver Detalle de Orden de Produccion"><i class="fa fa-refresh"></i></a>
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
