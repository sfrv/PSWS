@extends('layouts.admin')
@section('contenido')
 <section class="content-header">
   <h1 align="center">
       <b>MEDICOS</b>
   </h1>
 </section>
 <br>

 <section class="content">
   <div class="row">
     <div class="col-sm-12 col-xs-12">
       <div class="box box-success">
       <!-- TITULO DE PANEL -->
       <div class="box-header with-border">
           <h3 align="center">PANEL DE  <span class="text-bold">MEDICOS REGISTRADOS</span></h3>
           @include('alertas.logrado')
       </div>
       <div class="box-body">
         @include('admCentros.medico.search')
         <table class="table table-striped" style="border-top-color: #00AEFF">
           <thead>
           <tr>
              <th class="text-center">ESTADO</th>
             <th class="text-center">NOMBRE</th>
             <th class="text-center">APELLIDO</th>
             <th class="text-center">TELEFONO</th>
             <th class="text-center">DIRECCION</th>
             <th class="text-center">CORREO</th>
             <th class="text-center">OPCIONES</th>
           </tr>
           </thead>
           <tbody>
             @foreach($medicos as $var)
                  <tr class="text-center">
                    @if($var->estado == 1)
                      <td class="text-center"><span class="badge bg-green">ACTIVO</span></td>
                    @else
                      <td class="text-center"><span class="badge bg-red">INACTIVO</span></td>
                    @endif
                    <td>{{ $var->nombre }}</td>
                    <td>{{ $var->apellido }}</td>
                    <td>{{ $var->telefono }}</td>
                    <td>{{ $var->direccion }}</td>
                    <td>{{ $var->correo }}</td>
                    <td>
                      <a href="{{URL::action('MedicoController@edit',$var->id)}}" class="btn btn-info" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                      <a href="" data-target="#modal-delete-{{$var->id}}" data-toggle="modal" class="btn btn-danger" data-placement="top" data-original-title="Remove"><i class="fa fa-times fa fa-white"></i></a>

                      <!-- <a href=# class="btn btn-info" data-placement="top" data-original-title="Edit"><i class="fa fa-edit"></i></a> -->
                      <!-- <a href=# data-toggle="modal" class="btn btn-danger" data-placement="top" data-original-title="Remove"><i class="fa fa-times fa fa-white"></i></a> -->
                    </td>
                  </tr>
                  @include('admCentros.medico.modal')
              @endforeach
           </tbody>
         </table>
       </div>
       {{ $medicos->links() }}
     </div>
     </div>
   </div>
   <br>
 </section>
@endsection
