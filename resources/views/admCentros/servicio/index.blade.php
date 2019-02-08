@extends('layouts.admin')
@section('contenido')
 <section class="content-header">
   <h1 align="center">
       <b>TIPOS DE SERVICIOS</b>
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
       <div class="box box-success">
       <!-- TITULO DE PANEL -->
       <div class="box-header with-border">
           <h3 align="center">PANEL DE <span class="text-bold">TIPOS DE SERVICIOS REGISTRADOS</span></h3>
       </div>
       <div class="box-body">
         @include('admCentros.servicio.search')
         <table class="table table-striped" style="border-top-color: #00AEFF">
           <thead>
           <tr>
             <th class="text-center">ESTADO</th>
             <th class="text-center">NOMBRE</th>
             <th class="text-center">DESCRIPCION</th>
             <th class="text-center">OPCIONES</th>
           </tr>
           </thead>
           <tbody>
             @foreach($servicios as $var)
                  <tr class="text-center">
                    @if($var->estado == 1)
                      <td><span class="badge bg-green">ACTIVO</span></td>
                    @else
                      <td><span class="badge bg-red">INACTIVO</span></td>
                    @endif
                    <td>{{ $var->nombre }}</td>
                    <td>{{ $var->descripcion }}</td>
                    <td>
                      <a href="{{URL::action('TipoServicioController@edit',$var->id)}}" class="btn btn-info" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                      <a href="" data-target="#modal-delete-{{$var->id}}" data-toggle="modal" class="btn btn-danger" data-placement="top" data-original-title="Remove"><i class="fa fa-times fa fa-white"></i></a>
                    </td>
                  </tr>
                  @include('admCentros.servicio.modal')
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
