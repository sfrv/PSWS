@extends('layouts.admin')
@section('contenido')
 <section class="content-header">
   <h1 align="center">
       <b>ESPECIALIDADES</b>
   </h1>
 </section>
 <br>

 <section class="content">
   <div class="row">
     <div class="col-sm-12 col-xs-12">
       <div class="box box-primary">
       <!-- TITULO DE PANEL -->
       <div class="box-header with-border">
           <h3 align="center">PANEL DE  <span class="text-bold">ESPECIALIDADES REGISTRADAS</span></h3>
       </div>
       <div class="box-body">
         @include('admCentros.especialidad.search')
         <table class="table table-bordered" style="border-top-color: #00AEFF">
           <thead>
           <tr>
             <th class="text-center">NOMBRE</th>
             <th class="text-center">DESCRIPCION</th>
             <th class="text-center">OPCIONES</th>
           </tr>
           </thead>
           <tbody>
             @foreach($especialidades as $var)
                  <tr class="text-center">
                    <td>{{ $var->nombre }}</td>
                    <td>{{ $var->descripcion }}</td>
                    <td>
                      <a href="" data-target="#modal-delete-{{$var->id}}" data-toggle="modal" class="btn btn-danger" data-placement="top" data-original-title="Remove"><i class="fa fa-times fa fa-white"></i></a>
                      <a href="{{URL::action('EspecialidadController@edit',$var->id)}}" class="btn btn-info" data-placement="top" data-original-title="Ver Detalle de Orden de Produccion"><i class="fa fa-edit"></i></a>
                    </td>
                  </tr>
                  @include('admCentros.especialidad.modal')
              @endforeach
           </tbody>
         </table>
       </div>
       {{ $especialidades->links() }}
     </div>
     </div>
   </div>
   <br>
 </section>
@endsection
