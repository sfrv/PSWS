<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\CentroMedico;
use App\Models\Medico;
use App\Models\RolTurno;
use App\Models\EtapaServicio;
use App\Models\RolDia;
use App\Models\Turno;

class RolTurnoController extends Controller
{
	public function index_rol_turno($id,Request $request)
	{
		$centro = CentroMedico::_obtenerCentro($id);
        $rol_turnos = CentroMedico::_obtenerRolTurnos($id,$request['searchText']);
        // dd($rol_turnos);
        // dd($request['searchText']);
        // $searchText = $request->get('searchText');
        $searchText = $request->get('searchText');
        return view('admCentros.centro.index_rol_turno',compact('centro','rol_turnos','searchText'));
	}

    public function create_rol_turno($id)
    {
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $anios = array("2018","2019","2020","2021","2022","2023","2024","2025","2026","2027","2028","2029","2030");
        $anio_actual = date("Y");
        $mes_actual = $meses[date('n')-1];

        $detalle = CentroMedico::_obtenerDetalleCentro($id);
        $medicos = Medico::_getAllMedicos("")->get();
        // dd($medicos);
        $detalle2 = json_encode($detalle, JSON_UNESCAPED_SLASHES );
        return view('admCentros.centro.create_rol_turno',compact('detalle','medicos','detalle2','meses','mes_actual','anios','anio_actual'));
    }

    public function edit_rol_turno($id)
    {
    	$rol_turno = RolTurno::findOrFail($id);
    	$etapa_servicio_uno = RolTurno::_getEtapaServicio($id,'ETAPA DE EMERGENCIA');
    	$especialidades = RolTurno::_getEspecialidadesPorIdEtapaServicio($etapa_servicio_uno->id);
    	$turnos = RolTurno::_getTurnosPorIdEtapaServicio($etapa_servicio_uno->id);
    	$rol_dias = RolTurno::_getRolDiasPorIdEtapaServicio($etapa_servicio_uno->id);
    	$medicos = Medico::_getAllMedicos("")->get();
    	
    	$turnos_json = json_encode($turnos, JSON_UNESCAPED_SLASHES );
    	$rol_dias_json = json_encode($rol_dias, JSON_UNESCAPED_SLASHES );
    	$medicos_json = json_encode($medicos, JSON_UNESCAPED_SLASHES );
    	$detalle2 = json_encode($especialidades, JSON_UNESCAPED_SLASHES );
    	// dd($rol_dias);
    	return view('admCentros.centro.edit_rol_turno',compact('rol_turno','especialidades','turnos_json','rol_dias_json','medicos_json','medicos','detalle2','etapa_servicio_uno'));
    }

    public function show_rol_turno($id)
    {
    	$rol_turno = RolTurno::findOrFail($id);
    	$etapa_servicio_uno = RolTurno::_getEtapaServicio($id,'ETAPA DE EMERGENCIA');
    	$especialidades = RolTurno::_getEspecialidadesPorIdEtapaServicio($etapa_servicio_uno->id);
    	$turnos = RolTurno::_getTurnosPorIdEtapaServicio($etapa_servicio_uno->id);
    	$rol_dias = RolTurno::_getRolDiasPorIdEtapaServicio($etapa_servicio_uno->id);
    	$medicos = Medico::_getAllMedicos("")->get();
    	
    	$turnos_json = json_encode($turnos, JSON_UNESCAPED_SLASHES );
    	$rol_dias_json = json_encode($rol_dias, JSON_UNESCAPED_SLASHES );
    	$medicos_json = json_encode($medicos, JSON_UNESCAPED_SLASHES );
    	// dd($especialidades);
    	return view('admCentros.centro.show_rol_turno',compact('rol_turno','especialidades','turnos_json','rol_dias_json','medicos_json'));
    }

    public function actualizar_rol_tuno()
    {
    	$my_json = $_REQUEST['my_json'];

        $titulo = $my_json['titulo'];
        $mes = $my_json['mes'];
        $anio = $my_json['anio'];
        $id_rol_turno = $my_json['id'];

        RolTurno::_editarRolTurno($titulo,$mes,$anio,$id_rol_turno);

        if (!empty($my_json['rol_dias_actualizar'])) {
        	$rol_dias_actualizar = (array)$my_json['rol_dias_actualizar'];
        	for ($i=0; $i < count($rol_dias_actualizar) ; $i++) { 
        		$id_rol_dia = $rol_dias_actualizar[$i]['id'];
        		$id_doctor = $rol_dias_actualizar[$i]['id_doctor'];
        		if ($id_doctor == -1) {
        			$id_doctor = null;
        		}
        		RolDia::_editarRolDia($id_doctor,$id_rol_dia);
        	}
        }

        if (!empty($my_json['turnos_actualizar'])) {
        	$turnos_actualizar = (array)$my_json['turnos_actualizar'];
        	for ($i=0; $i < count($turnos_actualizar) ; $i++) { 
        		$id_turno = $turnos_actualizar[$i]['id'];
        		$titulo = $turnos_actualizar[$i]['titulo'];
        		$hora_inicio = $turnos_actualizar[$i]['hora_inicio'];
        		$hora_fin = $turnos_actualizar[$i]['hora_fin'];
        		Turno::_editarTurno($titulo,$hora_inicio,$hora_fin,$id_turno);
        	}
        }

        if (!empty($my_json['rol_dias_eliminar'])) {
        	$rol_dias_eliminar = (array)$my_json['rol_dias_eliminar'];
        	for ($i=0; $i < count($rol_dias_eliminar) ; $i++) { 
        		$id_rol_dia = $rol_dias_eliminar[$i];
        		RolDia::destroy($id_rol_dia);
        	}
        }

        if (!empty($my_json['turnos_eliminar'])) {
        	$turnos_eliminar = (array)$my_json['turnos_eliminar'];
        	for ($i=0; $i < count($turnos_eliminar) ; $i++) { 
        		$id_turno = $turnos_eliminar[$i];
        		Turno::destroy($id_turno);
        	}
        }

        if (!empty($my_json['rol_dias_crear'])) {
        	$rol_dias_crear = (array)$my_json['rol_dias_crear'];
        	for ($i=0; $i < count($rol_dias_crear) ; $i++) { 
        		$id_turno = $rol_dias_crear[$i]['id_turno'];
        		$id_doctor = $rol_dias_crear[$i]['id_doctor'];
        		$dia = $rol_dias_crear[$i]['dia'];
        		if ($id_doctor == -1) {
        			$id_doctor = null;
        		}
        		$id_rol_dia = RolDia::_insertarRolDia($dia,$id_turno,$id_doctor);
        	}
        }

        $id_etapa_servicio = $my_json['id_etapa_servicio_uno'];
        if (!empty($my_json['turnos_rol_crear'])) {
        	$especialidades = $my_json['turnos_rol_crear'];
	        for ($i=0; $i < count($especialidades) ; $i++) { 
	        	$id_especialidad = $especialidades[$i]['id'];
	        	if (!empty($especialidades[$i]['turnos'])) {
		        	$turnos = $especialidades[$i]['turnos'];
		        	for ($j=0; $j < count($turnos) ; $j++) { 
		        		$titulo_turno = $turnos[$j]['titulo'];
		        		$hora_inicio_turno = $turnos[$j]['hora_inicio'];
		        		$hora_fin_turno = $turnos[$j]['hora_fin'];
		        		$id_turno = Turno::_insertarTurno($titulo_turno,$hora_inicio_turno,$hora_fin_turno,$id_especialidad,$id_etapa_servicio);
		        		$filas = (array)$turnos[$j]['filas'];
		        		for ($k=0; $k < count($filas) ; $k++) { 
		        		 	for ($m=0; $m < count($filas[$k]) ; $m++) { 
			        		 	$dia_rol_dia = $filas[$k][$m]['dia'];
			        		 	$id_doctor_rol_dia = $filas[$k][$m]['id_doctor'];
			        		 	if ($id_doctor_rol_dia == -1) {//no existe doctor
			        		 		$id_doctor_rol_dia = null;
			        		 	}else{//si existe doctor

			        		 	}
			        		 	$id_rol_dia = RolDia::_insertarRolDia($dia_rol_dia,$id_turno,$id_doctor_rol_dia);
		        		 	}
		        		} 
		        	}
		        }else{//no existe turnos
		        	// $aux_borrar = $aux_borrar . "0";
		        }
	        }
        }
    }

    public function guardar_rol_turno(Request $request)
    {
        // dd($request->all());
        // echo $request->get('titulo');
        // return $request->all();
        $titulo = $request->get('titulo');
        $mes = $request->get('mes');
        $anio = $request->get('anio');
        $id_rol_turno = RolTurno::_insertarRolTurno($titulo,$mes,$anio);
        $id_etapa_servicio = EtapaServicio::_insertarEtapaServicio('ETAPA DE EMERGENCIA',$id_rol_turno);

        if ($request->get('idturnos') != null) {
            $idturnos = $request->get('idturnos');
            $idespecialidades = $request->get('idespecialidad');
            $a = 0;
            while ($a < count($idturnos)) {
                $titulo_turno = $request->get('text_turno'.$idturnos[$a]);
                $hora_inicio_turno = $request->get('text_hora_inicio'.$idturnos[$a]);
                $hora_fin_turno = $request->get('text_hora_fin'.$idturnos[$a]);
                $id_especialidad = $idespecialidades[$a];
                $id_turno = Turno::_insertarTurno($titulo_turno,$hora_inicio_turno,$hora_fin_turno,$id_especialidad,$id_etapa_servicio);
                if ($request->get('id_filas_turno'.$idturnos[$a]) != null) {
                    $idfilas = $request->get('id_filas_turno'.$idturnos[$a]);
                    $b = 0; 
                    while ($b < count($idfilas)) {
                        $id_doctor_rol_dia = $request->get('selec_dia_lunes'.$idfilas[$b]);
                        if ($id_doctor_rol_dia == -1) {//no existe doctor
                            $id_doctor_rol_dia = null;
                        }
                        $id_rol_dia = RolDia::_insertarRolDia('LUNES',$id_turno,$id_doctor_rol_dia);
                        //
                        $id_doctor_rol_dia = $request->get('selec_dia_martes'.$idfilas[$b]);
                        if ($id_doctor_rol_dia == -1) {//no existe doctor
                            $id_doctor_rol_dia = null;
                        }
                        $id_rol_dia = RolDia::_insertarRolDia('MARTES',$id_turno,$id_doctor_rol_dia);
                        //
                        $id_doctor_rol_dia = $request->get('selec_dia_miercoles'.$idfilas[$b]);
                        if ($id_doctor_rol_dia == -1) {//no existe doctor
                            $id_doctor_rol_dia = null;
                        }
                        $id_rol_dia = RolDia::_insertarRolDia('MIERCOLES',$id_turno,$id_doctor_rol_dia);
                        //
                        $id_doctor_rol_dia = $request->get('selec_dia_jueves'.$idfilas[$b]);
                        if ($id_doctor_rol_dia == -1) {//no existe doctor
                            $id_doctor_rol_dia = null;
                        }
                        $id_rol_dia = RolDia::_insertarRolDia('JUEVES',$id_turno,$id_doctor_rol_dia);
                        //
                        $id_doctor_rol_dia = $request->get('selec_dia_viernes'.$idfilas[$b]);
                        if ($id_doctor_rol_dia == -1) {//no existe doctor
                            $id_doctor_rol_dia = null;
                        }
                        $id_rol_dia = RolDia::_insertarRolDia('VIERNES',$id_turno,$id_doctor_rol_dia);
                        //
                        $id_doctor_rol_dia = $request->get('selec_dia_sabado'.$idfilas[$b]);
                        if ($id_doctor_rol_dia == -1) {//no existe doctor
                            $id_doctor_rol_dia = null;
                        }
                        $id_rol_dia = RolDia::_insertarRolDia('SABADO',$id_turno,$id_doctor_rol_dia);
                        //
                        $id_doctor_rol_dia = $request->get('selec_dia_domingo'.$idfilas[$b]);
                        if ($id_doctor_rol_dia == -1) {//no existe doctor
                            $id_doctor_rol_dia = null;
                        }
                        $id_rol_dia = RolDia::_insertarRolDia('DOMINGO',$id_turno,$id_doctor_rol_dia);
                        $b++;
                    }
                }
                $a++;
            }
            // return $request->all();
        }
        
    	// $aux_borrar = "";
    	// $my_json = $_REQUEST['my_json'];

     //    $titulo = $my_json['titulo'];
     //    $mes = $my_json['mes'];
     //    $anio = $my_json['anio'];

     //    $id_rol_turno = RolTurno::_insertarRolTurno($titulo,$mes,$anio);

     //    $etapa_servicio = $my_json['etapa_servicio'];
     //    $nombre_etapa_servicio = $etapa_servicio['nombre'];
     //    $id_etapa_servicio = EtapaServicio::_insertarEtapaServicio($nombre_etapa_servicio,$id_rol_turno);

     //    $especialidades = $etapa_servicio['especialidades'];
     //    for ($i=0; $i < count($especialidades) ; $i++) { 
     //    	$id_especialidad = $especialidades[$i]['id'];
     //    	if (!empty($especialidades[$i]['turnos'])) {
	    //     	$turnos = $especialidades[$i]['turnos'];
	    //     	for ($j=0; $j < count($turnos) ; $j++) { 
	    //     		$titulo_turno = $turnos[$j]['titulo'];
	    //     		$hora_inicio_turno = $turnos[$j]['hora_inicio'];
	    //     		$hora_fin_turno = $turnos[$j]['hora_fin'];
	    //     		// $aux_borrar = $aux_borrar . " | " . $titulo_turno . " | " . $hora_inicio_turno . " | " . $hora_fin_turno . " | " . $id_especialidad . " | " . $id_etapa_servicio . "---";
	    //     		$id_turno = Turno::_insertarTurno($titulo_turno,$hora_inicio_turno,$hora_fin_turno,$id_especialidad,$id_etapa_servicio);
	    //     		$filas = (array)$turnos[$j]['filas'];
	    //     		for ($k=0; $k < count($filas) ; $k++) { 
	    //     		 	for ($m=0; $m < count($filas[$k]) ; $m++) { 
		   //      		 	$dia_rol_dia = $filas[$k][$m]['dia'];
		   //      		 	$id_doctor_rol_dia = $filas[$k][$m]['id_doctor'];
		   //      		 	if ($id_doctor_rol_dia == -1) {//no existe doctor
		   //      		 		$id_doctor_rol_dia = null;
		   //      		 	}else{//si existe doctor

		   //      		 	}
		   //      		 	$id_rol_dia = RolDia::_insertarRolDia($dia_rol_dia,$id_turno,$id_doctor_rol_dia);
	    //     		 	}
	    //     		} 
	    //     	}
	    //     }else{//no existe turnos
	    //     	// $aux_borrar = $aux_borrar . "0";
	    //     }
     //    }
        // echo $aux_borrar;
        // echo $my_json['etapa_servicio']['especialidades'][1]['id'];
    }

    public function renovate_rol_turno($id)
    {
    	$rol_turno = RolTurno::findOrFail($id);
    	$etapa_servicio_uno = RolTurno::_getEtapaServicio($id,'Etapa 1');
    	$especialidades = RolTurno::_getEspecialidadesPorIdEtapaServicio($etapa_servicio_uno->id);
    	$turnos = RolTurno::_getTurnosPorIdEtapaServicio($etapa_servicio_uno->id);
    	$rol_dias = RolTurno::_getRolDiasPorIdEtapaServicio($etapa_servicio_uno->id);
    	$medicos = Medico::_getAllMedicos("")->get();
    	
    	$turnos_json = json_encode($turnos, JSON_UNESCAPED_SLASHES );
    	$rol_dias_json = json_encode($rol_dias, JSON_UNESCAPED_SLASHES );
    	$medicos_json = json_encode($medicos, JSON_UNESCAPED_SLASHES );
    	$detalle2 = json_encode($especialidades, JSON_UNESCAPED_SLASHES );
    	
    	return view('admCentros.centro.renovate_rol_turno',compact('rol_turno','especialidades','turnos_json','rol_dias_json','medicos_json','medicos','detalle2','etapa_servicio_uno'));
    }
}
