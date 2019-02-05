@extends('layouts.admin')
@section('contenido')
 <section class="content-header">
   <h1 align="center">
       <b>ROL DE TURNO DEL CENTRO: {{ $centro->nombre }}</b>
   </h1>

 </section>
 <br>

 <section class="content">
   <div class="row">
     <div class="col-sm-12 col-xs-12">
       <div class="box box-primary">
       <div class="box-header with-border">
           <h3 align="center">PANEL DE <span class="text-bold">ROL DE TURNO REGISTRADOS</span></h3>
       </div>
       <div class="box-body">
         @include('admCentros.centro.rol_turno.search_rol_turno')
         <table class="table table-bordered" style="border-top-color: #00AEFF">
           <thead>
           <tr>
             <th class="text-center">ID</th>
             <th class="text-center">TITULO</th>
             <th class="text-center">MES</th>
             <th class="text-center">ANIO</th>
             <th class="text-center">ESTADO</th>
             <th class="text-center">OPCIONES</th>
           </tr>
           </thead>
           <tbody>
             @foreach($rol_turnos as $var)
                  <tr>
                    <td class="text-center">{{ $var->id }}</td>
                    <td class="text-center">{{ $var->titulo }}</td>
                    <td class="text-center">{{ $var->mes }}</td>
                    <td class="text-center">{{ $var->anio}}</td>
                    <td class="text-center">{{ $var->estado }}</td>
                    <td class="text-center">
                      <a href="" data-target="#modal-delete-{{$var->id}}" data-toggle="modal" class="btn btn-danger" data-placement="top" data-original-title="Remove"><i class="fa fa-times fa fa-white"></i></a>
                      <a href="{{ route('edit-rol-turno', [$var->id,$centro->id]) }}" class="btn btn-info" data-placement="top"><i class="fa fa-edit"></i></a>
                      <a href="{{ route('show-rol-turno', [$var->id,$centro->id]) }}" class="btn btn-success" data-placement="top"><i class="fa fa-eye"></i></a>
                      <a href="{{ route('renovate-rol-turno', $var->id) }}" class="btn btn-warning" data-placement="top"><i class="fa fa-refresh"></i></a>
                    </td>
                  </tr>
                  
              @endforeach
           </tbody>
         </table>
       </div>
       {{ $rol_turnos->links() }}
     </div>
     </div>
   </div>
   <br>
 </section>
@endsection
