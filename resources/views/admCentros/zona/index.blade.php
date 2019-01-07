@extends('layouts.admin')
@section('contenido')
 <section class="content-header">
   <h1 align="center">
       * * * * * <b>Zonas de Ubicacion</b> * * * * *
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
       <!-- TITULO DE PANEL -->
       <div class="box-header with-border">
           <h3 align="center">Panel de Control <span class="text-bold">de los Centros de Salud Registrados</span></h3>
           @include('alertas.logrado')
       </div>
       <div class="box-body">
         @include('admCentros.zona.search')
         <table class="table table-bordered" style="border-top-color: #00AEFF">
           <thead>
           <tr>
             <th class="center">ID</th>
             <th class="center">Nombre</th>
             <th class="center">Descripcion</th>
             <th class="center">Opciones</th>
           </tr>
           </thead>
           <tbody>
             @foreach($zonas as $var)
                  <tr>
                    <td>{{ $var->id }}</td>
                    <td>{{ $var->nombre }}</td>
                    <td>{{ $var->descripcion }}</td>
                    <td>
                      <a href="{{URL::action('ZonaController@edit',$var->id)}}" class="btn btn-info" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                      <a href="" data-target="#modal-delete-{{$var->id}}" data-toggle="modal" class="btn btn-danger" data-placement="top" data-original-title="Remove"><i class="fa fa-times fa fa-white"></i></a>
                    </td>
                  </tr>
                  @include('admCentros.zona.modal')
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
