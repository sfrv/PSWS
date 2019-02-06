@extends('layouts.admin')
@section('contenido')
 <section class="content-header">
   <h1 align="center">
       <b>ZONAS</b>
   </h1>
 </section>
 <br>

 <section class="content">
   <div class="row">
     <div class="col-sm-12 col-xs-12">
       <div class="box box-primary">
       <!-- TITULO DE PANEL -->
       <div class="box-header with-border">
           <h3 align="center">PANEL DE <span class="text-bold">ZONAS REGISTRADAS</span></h3>
           @include('alertas.logrado')
       </div>
       <div class="box-body">
         @include('admCentros.zona.search')
         <table class="table table-bordered" style="border-top-color: #00AEFF">
           <thead>
           <tr>
             <th class="text-center">ID</th>
             <th class="text-center">Nombre</th>
             <th class="text-center">Descripcion</th>
             <th class="text-center">Opciones</th>
           </tr>
           </thead>
           <tbody>
             @foreach($zonas as $var)
                  <tr class="text-center">
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
