@extends('layouts.admin')
@section('contenido')
 <section class="content-header">
   <h1 align="center">
       <b>ROL DE TURNOS DEL CENTRO: {{ $centro->nombre }}</b>
   </h1>

 </section>
 <br>

 <section class="content">
   <div class="row">
     <div class="col-sm-12 col-xs-12">
       <div class="box box-success">
       <div class="box-header with-border">
           <h3 align="center">PANEL DE <span class="text-bold">ROL DE TURNO REGISTRADOS</span></h3>
           @include('alertas.logrado')
       </div>
       <div class="box-body table-responsive no-padding">
       <div class="box-body">
         @include('admCentros.centro.rol_turno.search')
         <table class="table table-striped" style="border-top-color: #00AEFF">
           <thead>
           <tr>
              <th class="text-center">ESTADO</th>
              <th class="text-center">ID</th>
              <th class="text-center">TITULO</th>
              <th class="text-center">MES</th>
              <th class="text-center">ANIO</th>
              <th class="text-center">OPCIONES</th>
           </tr>
           </thead>
           <tbody>
             @foreach($rol_turnos as $var)
                  <tr>
                    @if($var->estado == 1)
                      <td class="text-center"><span class="badge bg-green">ACTIVO</span></td>
                    @else
                      <td class="text-center"><span class="badge bg-red">INACTIVO</span></td>
                    @endif
                    <td class="text-center">{{ $var->id }}</td>
                    <td class="text-center">{{ $var->titulo }}</td>
                    <td class="text-center">{{ $var->mes }}</td>
                    <td class="text-center">{{ $var->anio}}</td>
                    <td class="text-center">
                      @if(Auth::user()->id_centro_medico == $centro->id || Auth::user()->tipo == 'ADMINISTRADOR' )
                      <a href="" data-target="#modal-delete-{{$var->id}}" data-toggle="modal" class="btn btn-danger" data-placement="top" data-original-title="Remove"><i class="fa fa-times fa fa-white"></i></a>
                      <a href="{{ route('edit-rol-turno', [$var->id,$centro->id]) }}" class="btn btn-info" data-placement="top"><i class="fa fa-edit"></i></a>
                      @endif

                      <a href="{{ route('show-rol-turno', [$var->id,$centro->id]) }}" class="btn btn-success" data-placement="top"><i class="fa fa-eye"></i></a>
                      <!-- <a href="{{ route('renovate-rol-turno', [$var->id,$centro->id]) }}" class="btn btn-warning" data-placement="top"><i class="fa fa-refresh"></i></a> -->
                      @if(Auth::user()->id_centro_medico == $centro->id || Auth::user()->tipo == 'ADMINISTRADOR' )
                      <a href="" class="btn btn-warning" data-placement="top"><i class="fa fa-refresh"></i></a>
                      <a href="{{ route('build-rol-turno', [$var->id,$centro->id]) }}" class="btn bg-olive btn-flat" data-placement="top"><i class="fa fa-mail-forward"></i></a>
                      @endif
                      
                      <a href="{{ route('generar-excel-rol-turno',[$var->id,$centro->id] ) }}" class="btn btn-primary" data-placement="top"><i class="fa fa-download"></i></a>
                    </td>
                  </tr>
                  
              @endforeach
           </tbody>
         </table>
       </div>
       </div>
       {{ $rol_turnos->links() }}
     </div>
     </div>
   </div>
   <br>
 </section>
@endsection
