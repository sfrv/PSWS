@extends('layouts.admin')
@section('contenido')
 <section class="content-header">
   <h1 align="center">
       <b>CENTRO MEDICOS &nbsp;</b><i class="fa fa-hospital-o"></i>
   </h1>

 </section>

 <section class="content">
   <div class="row">
     <div class="col-sm-12 col-xs-12">
       <div class="box box-success">
         <div class="box-header with-border">
             <h3 align="center">PANEL DE <span class="text-bold">CENTROS MEDICOS REGISTRADOS</span></h3>
             @include('admCentros.centro.search')
         </div>
         <div class="box-body table-responsive no-padding">
         <div class="box-body">
           <table class="table table-striped" style="border-top-color: #00AEFF">
             <thead>
             <tr>
              <th class="text-center">ESTADO</th>
              <th class="text-center">NOMBRE</th>
              <th class="text-center">DIRECCION</th>
              <th class="text-center">CAMAS OCUPADAS</th>
              <th class="text-center">CAMAS LIBRES</th>
              <th class="text-center">CAMAS TOTAL</th>
              <th class="text-center">OPCIONES</th>
             </tr>
             </thead>
             <tbody>
               @foreach($centros as $var)
                    <tr>
                      @if($var->estado == 1)
                        <td class="text-center"><span class="badge bg-green">ACTIVO</span></td>
                      @else
                        <td class="text-center"><span class="badge bg-red">INACTIVO</span></td>
                      @endif
                      <td class="text-center">{{ $var->nombre }}</td>
                      <td class="text-center">{{ $var->direccion }}</td>
                      <td class="text-center"><span class="badge bg-red">{{ $var->camas_ocupadas }}</span></td>
                      <td class="text-center"><span class="badge bg-blue">{{ $var->camas_total - $var->camas_ocupadas }}</span></td>
                      <td class="text-center"><span class="badge bg-orange">{{ $var->camas_total }}</span></td>
                      <td class="text-center">
                        @if(Auth::user()->tipo == 'ADMINISTRADOR')
                          <a href="" data-target="#modal-delete-{{$var->id}}" data-toggle="modal" class="btn btn-danger" data-placement="top" data-original-title="Remove"><i class="fa fa-times fa fa-white"></i></a>
                        @endif
                        
                        <a href="{{URL::action('CentroMedicoController@show',$var->id)}}" class="btn btn-info" data-placement="top"><i class="fa fa-eye"></i></a>

                        @if(Auth::user()->id_centro_medico == $var->id || Auth::user()->tipo == 'ADMINISTRADOR')
                          <a href="{{URL::action('CentroMedicoController@edit',$var->id)}}" class="btn btn-success" data-placement="top"><i class="fa fa-edit"></i></a>
                        @endif

                        <a href="{{ route('index-cartera-servicio', $var->id) }}" class="btn btn-primary" data-placement="top"><i class="fa fa-bars"></i></a>

                        <a href="{{ route('index-rol-turno', $var->id) }}" class="btn btn-warning" data-placement="top"><i class="fa fa-bars"></i></a>
                      </td>
                    </tr>
                    @include('admCentros.centro.modal')
                @endforeach
             </tbody>
           </table>
         </div>
         </div>
         {{ $centros->links() }}
       </div>
     </div>
   </div>
   <br>
 </section>
@endsection
