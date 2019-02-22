@extends('layouts.admin')
@section('contenido')
 <section class="content-header">
   <h1 align="center">
       <b>ESPECIALIDADES &nbsp;</b><i class="fa fa-heartbeat"></i>
   </h1>
 </section>
 <br>

 <section class="content">
   <div class="row">
     <div class="col-sm-12 col-xs-12">
       <div class="box box-success">
       <!-- TITULO DE PANEL -->
       <div class="box-header with-border">
           <h3 align="center">PANEL DE  <span class="text-bold">ESPECIALIDADES REGISTRADAS</span></h3>
       </div>
       <div class="box-body table-responsive no-padding">
       <div class="box-body">
         @include('admCentros.especialidad.search')
         <table class="table table-striped" style="border-top-color: #00AEFF">
           <thead>
           <tr>
             <th class="text-center">ESTADO</th>
             <th class="text-center">NOMBRE</th>
             <th class="text-center">DESCRIPCION</th>
             @if(Auth::user()->tipo == 'ADMINISTRADOR')
              <th class="text-center">OPCIONES</th>
             @endif
           </tr>
           </thead>
           <tbody>
             @foreach($especialidades as $var)
                  <tr class="text-center">
                    @if($var->estado == 1)
                      <td><span class="badge bg-green">ACTIVO</span></td>
                    @else
                      <td><span class="badge bg-red">INACTIVO</span></td>
                    @endif
                    <td>{{ $var->nombre }}</td>
                    <td>{{ $var->descripcion }}</td>
                    @if(Auth::user()->tipo == 'ADMINISTRADOR')
                      <td>
                        <a href="" data-target="#modal-delete-{{$var->id}}" data-toggle="modal" class="btn btn-danger" data-placement="top" data-original-title="Remove"><i class="fa fa-times fa fa-white"></i></a>
                        <a href="{{URL::action('EspecialidadController@edit',$var->id)}}" class="btn btn-info" data-placement="top" data-original-title="Ver Detalle de Orden de Produccion"><i class="fa fa-edit"></i></a>
                      </td>
                    @endif
                  </tr>
                  @include('admCentros.especialidad.modal')
              @endforeach
           </tbody>
         </table>
       </div>
       </div>
       {{ $especialidades->links() }}
     </div>
     </div>
   </div>
   <br>
 </section>
@endsection
