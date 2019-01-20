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
	public function index_rol_turno($id)
	{
		$centro = CentroMedico::_obtenerCentro($id);
        $rol_turnos = CentroMedico::_obtenerRolTurnos($id);
        // dd($rol_turnos);
        // dd($request['searchText']);
        // $searchText = $request->get('searchText');
        return view('admCentros.centro.index_rol_turno',compact('centro','rol_turnos'));
	}

    public function create_rol_turno($id)
    {
        $detalle = CentroMedico::_obtenerDetalleCentro($id);
        $medicos = Medico::_getAllMedicos("")->get();
        // dd($medicos);
        $detalle2 = json_encode($detalle, JSON_UNESCAPED_SLASHES );
        return view('admCentros.centro.create_rol_turno',compact('detalle','medicos','detalle2'));
    }

    public function show_rol_turno($id)
    {
    	$rol_turno = RolTurno::findOrFail($id);
    	$etapa_servicio_uno = RolTurno::_getEtapaServicio($id,'Etapa 1');
    	$especialidades = RolTurno::_getEspecialidadesPorIdEtapaServicio($etapa_servicio_uno->id);
    	$turnos = RolTurno::_getTurnosPorIdEtapaServicio($etapa_servicio_uno->id);
    	$rol_dias = RolTurno::_getRolDiasPorIdEtapaServicio($etapa_servicio_uno->id);
    	
    	// $servicios_json = json_encode($servicios, JSON_UNESCAPED_SLASHES );
    	// dd($rol_dias);
    	return view('admCentros.centro.show_rol_turno',compact('rol_turno','especialidades'));
    }

    public function guardar_rol_turno()
    {
    	$aux_borrar = "";
    	$my_json = $_REQUEST['my_json'];

        $titulo = $my_json['titulo'];
        $mes = $my_json['mes'];
        $anio = $my_json['anio'];

        $id_rol_turno = RolTurno::_insertarRolTurno($titulo,$mes,$anio);

        $etapa_servicio = $my_json['etapa_servicio'];
        $nombre_etapa_servicio = $etapa_servicio['nombre'];
        $id_etapa_servicio = EtapaServicio::_insertarEtapaServicio($nombre_etapa_servicio,$id_rol_turno);

        $especialidades = $etapa_servicio['especialidades'];
        for ($i=0; $i < count($especialidades) ; $i++) { 
        	$id_especialidad = $especialidades[$i]['id'];
        	if (!empty($especialidades[$i]['turnos'])) {
	        	$turnos = $especialidades[$i]['turnos'];
	        	for ($j=0; $j < count($turnos) ; $j++) { 
	        		$titulo_turno = $turnos[$j]['titulo'];
	        		$hora_inicio_turno = $turnos[$j]['hora_inicio'];
	        		$hora_fin_turno = $turnos[$j]['hora_fin'];
	        		// $aux_borrar = $aux_borrar . " | " . $titulo_turno . " | " . $hora_inicio_turno . " | " . $hora_fin_turno . " | " . $id_especialidad . " | " . $id_etapa_servicio . "---";
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
        // echo $aux_borrar;
        // echo $my_json['etapa_servicio']['especialidades'][1]['id'];
    }
}
