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
    public function __construct()
    {
        // $this->middleware('auth');
    }

	public function index_rol_turno($id,Request $request)
	{
		$centro = CentroMedico::_obtenerCentro($id);
        $rol_turnos = CentroMedico::_obtenerRolTurnos($id,$request['searchText'])->paginate(7);
        $searchText = $request->get('searchText');
        return view('admCentros.centro.rol_turno.index',compact('centro','rol_turnos','searchText'));
	}

    public function edit_rol_turno($id_rol_turno,$id_centro)
    {
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $anios = array("2018","2019","2020","2021","2022","2023","2024","2025","2026","2027","2028","2029","2030");

    	$rol_turno = RolTurno::findOrFail($id_rol_turno);
    	return view('admCentros.centro.rol_turno.edit',compact('id_centro','rol_turno','meses','anios'));
    }

    public function edit_rol_turno_emergencia($id_rol_turno,$id_centro)
    {
        // $rol_turno = RolTurno::findOrFail($id_rol_turno);
        $etapa_servicio_uno = RolTurno::_getEtapaServicio($id_rol_turno,'ETAPA DE EMERGENCIA');
        // $especialidades = RolTurno::_getEspecialidadesPorIdEtapaServicio($etapa_servicio_uno->id);
        $especialidades_etapa_emergencia = CentroMedico::_obtenerEspecialidadesEtapaEmergencia($id_centro);
        $turnos = RolTurno::_getTurnosPorIdEtapaServicio($etapa_servicio_uno->id);
        $rol_dias = RolTurno::_getRolDiasPorIdEtapaServicio($etapa_servicio_uno->id);
        // dd($rol_dias);
        $medicos = Medico::_getAllMedicos("")->get();
        
        $turnos_json = json_encode($turnos, JSON_UNESCAPED_SLASHES );
        $rol_dias_json = json_encode($rol_dias, JSON_UNESCAPED_SLASHES );
        $medicos_json = json_encode($medicos, JSON_UNESCAPED_SLASHES );
        $detalle2 = json_encode($especialidades_etapa_emergencia, JSON_UNESCAPED_SLASHES );
        // dd($rol_dias);
        return view('admCentros.centro.rol_turno.edit_emergencia',compact('id_centro','id_rol_turno','especialidades_etapa_emergencia','turnos_json','rol_dias_json','medicos_json','medicos','detalle2','etapa_servicio_uno'));
    }

    public function edit_rol_turno_consulta($id_rol_turno,$id_centro)
    {
        $etapa_servicio = RolTurno::_getEtapaServicio($id_rol_turno,'ETAPA DE CONSULTA EXTERNA');
        $especialidades_etapa_emergencia = CentroMedico::_obtenerEspecialidadesEtapaConsultaExt($id_centro);
        $turnos = RolTurno::_getTurnosPorIdEtapaServicio($etapa_servicio->id);
        $rol_dias = RolTurno::_getRolDiasPorIdEtapaServicio($etapa_servicio->id);
        $medicos = Medico::_getAllMedicos("")->get();
        
        $turnos_json = json_encode($turnos, JSON_UNESCAPED_SLASHES );
        $rol_dias_json = json_encode($rol_dias, JSON_UNESCAPED_SLASHES );
        $medicos_json = json_encode($medicos, JSON_UNESCAPED_SLASHES );
        $detalle2 = json_encode($especialidades_etapa_emergencia, JSON_UNESCAPED_SLASHES );

        return view('admCentros.centro.rol_turno.edit_consulta',compact('id_centro','id_rol_turno','especialidades_etapa_emergencia','turnos_json','rol_dias_json','medicos_json','medicos','detalle2'));
    }

    public function edit_rol_turno_hospitalizacion($id_rol_turno,$id_centro)
    {
        $etapa_servicio = RolTurno::_getEtapaServicio($id_rol_turno,'ETAPA DE HOSPITALIZACION');
        $especialidades_etapa_hospitalizacion = CentroMedico::_obtenerEspecialidadesEtapaHospitalizacion($id_centro);
        $turnos = RolTurno::_getTurnosPorIdEtapaServicio($etapa_servicio->id);
        $rol_dias = RolTurno::_getRolDiasPorIdEtapaServicio($etapa_servicio->id);
        $medicos = Medico::_getAllMedicos("")->get();
        
        $turnos_json = json_encode($turnos, JSON_UNESCAPED_SLASHES );
        $rol_dias_json = json_encode($rol_dias, JSON_UNESCAPED_SLASHES );
        $medicos_json = json_encode($medicos, JSON_UNESCAPED_SLASHES );
        $detalle2 = json_encode($especialidades_etapa_hospitalizacion, JSON_UNESCAPED_SLASHES );

        return view('admCentros.centro.rol_turno.edit_hospitalizacion',compact('id_centro','id_rol_turno','especialidades_etapa_hospitalizacion','turnos_json','rol_dias_json','medicos_json','medicos','detalle2'));
    }

    public function show_rol_turno($id,$id_centro)
    {
    	$rol_turno = RolTurno::findOrFail($id);
    	$etapa_servicio_uno = RolTurno::_getEtapaServicio($id,'ETAPA DE EMERGENCIA');
    	// $especialidades = RolTurno::_getEspecialidadesPorIdEtapaServicio($etapa_servicio_uno->id);
        $especialidades_etapa_emergencia = CentroMedico::_obtenerEspecialidadesEtapaEmergencia($id_centro);
    	$turnos = RolTurno::_getTurnosPorIdEtapaServicio($etapa_servicio_uno->id);
    	$rol_dias = RolTurno::_getRolDiasPorIdEtapaServicio($etapa_servicio_uno->id);
    	$medicos = Medico::_getAllMedicos("")->get();
    	
    	$turnos_json = json_encode($turnos, JSON_UNESCAPED_SLASHES );
    	$rol_dias_json = json_encode($rol_dias, JSON_UNESCAPED_SLASHES );
    	$medicos_json = json_encode($medicos, JSON_UNESCAPED_SLASHES );
    	// dd($especialidades);
    	return view('admCentros.centro.rol_turno.show',compact('rol_turno','especialidades_etapa_emergencia','turnos_json','rol_dias_json','medicos_json'));
    }

    public function update_rol_tuno(Request $request,$id_rol_turno)
    {
        $titulo = $request->get('titulo');
        $mes = $request->get('mes');
        $anio = $request->get('anio');
        $id_centro = RolTurno::_editarRolTurno($titulo,$mes,$anio,$id_rol_turno);

        return Redirect::to('adm/centro/index_rol_turno/'.$id_centro);
    }

    public function update_rol_tuno_emergencia(Request $request,$id_rol_turno,$id_centro)
    {
        $etapa_servicio_uno = RolTurno::_getEtapaServicio($id_rol_turno,'ETAPA DE EMERGENCIA');
        $id_etapa_servicio = $etapa_servicio_uno->id;
        $this->update_rol_tuno_detalle($request,$id_etapa_servicio);
        
        return Redirect::to('adm/centro/edit_rol_turno/'.$id_rol_turno.'/'.$id_centro);
    }

    public function update_rol_tuno_consulta(Request $request,$id_rol_turno,$id_centro)
    {
        $etapa_servicio = RolTurno::_getEtapaServicio($id_rol_turno,'ETAPA DE CONSULTA EXTERNA');
        $id_etapa_servicio = $etapa_servicio->id;
        $this->update_rol_tuno_detalle($request,$id_etapa_servicio);
        
        return Redirect::to('adm/centro/edit_rol_turno/'.$id_rol_turno.'/'.$id_centro);
    }

    public function update_rol_tuno_hospitalizacion(Request $request,$id_rol_turno,$id_centro)
    {
        $etapa_servicio = RolTurno::_getEtapaServicio($id_rol_turno,'ETAPA DE HOSPITALIZACION');
        $id_etapa_servicio = $etapa_servicio->id;
        $this->update_rol_tuno_detalle($request,$id_etapa_servicio);
        
        return Redirect::to('adm/centro/edit_rol_turno/'.$id_rol_turno.'/'.$id_centro);
    }

    public function update_rol_tuno_detalle($request,$id_etapa_servicio)
    {
        if ($request->get('id_rol_dias_delete') != null) {
            $rol_dias_eliminar = $request->get('id_rol_dias_delete');
            $a = 0;
            while ($a < count($rol_dias_eliminar)) {
                $id_rol_dia = $rol_dias_eliminar[$a];
                RolDia::destroy($id_rol_dia);
                $a++;
            }
        }

        if ($request->get('id_turnos_delete') != null) {
            $turnos_eliminar = $request->get('id_turnos_delete');
            $a = 0;
            while ($a < count($turnos_eliminar)) {
                $id_turno = $turnos_eliminar[$a];
                Turno::destroy($id_turno);
                $a++;
            }
        }

        if ($request->get('id_turnos_actualizar') != null) {
            $turnos_actualizar = $request->get('id_turnos_actualizar');
            $a = 0;
            while ($a < count($turnos_actualizar)) {
                $titulo = $request->get('text_turno_actualizar'.$turnos_actualizar[$a]);
                $hora_inicio = $request->get('text_hora_inicio_actualizar'.$turnos_actualizar[$a]);
                $hora_fin = $request->get('text_hora_fin_actualizar'.$turnos_actualizar[$a]);
                $id_turno = $turnos_actualizar[$a];
                Turno::_editarTurno($titulo,$hora_inicio,$hora_fin,$id_turno);

                if ($request->get('id_filas_nuevos_turno'.$id_turno) != null) {
                    $idfilas = $request->get('id_filas_nuevos_turno'.$id_turno);
                    $b = 0; 
                    while ($b < count($idfilas)) {
                        $id_doctor_rol_dia = $request->get('selec_dia_lunes_nuevo'.$idfilas[$b]);
                        $id_rol_dia = RolDia::_insertarRolDia('LUNES',$id_turno,$id_doctor_rol_dia);
                        //
                        $id_doctor_rol_dia = $request->get('selec_dia_martes_nuevo'.$idfilas[$b]);
                        $id_rol_dia = RolDia::_insertarRolDia('MARTES',$id_turno,$id_doctor_rol_dia);
                        //
                        $id_doctor_rol_dia = $request->get('selec_dia_miercoles_nuevo'.$idfilas[$b]);
                        $id_rol_dia = RolDia::_insertarRolDia('MIERCOLES',$id_turno,$id_doctor_rol_dia);
                        //
                        $id_doctor_rol_dia = $request->get('selec_dia_jueves_nuevo'.$idfilas[$b]);
                        $id_rol_dia = RolDia::_insertarRolDia('JUEVES',$id_turno,$id_doctor_rol_dia);
                        //
                        $id_doctor_rol_dia = $request->get('selec_dia_viernes_nuevo'.$idfilas[$b]);
                        $id_rol_dia = RolDia::_insertarRolDia('VIERNES',$id_turno,$id_doctor_rol_dia);
                        //
                        $id_doctor_rol_dia = $request->get('selec_dia_sabado_nuevo'.$idfilas[$b]);
                        $id_rol_dia = RolDia::_insertarRolDia('SABADO',$id_turno,$id_doctor_rol_dia);
                        //
                        $id_doctor_rol_dia = $request->get('selec_dia_domingo_nuevo'.$idfilas[$b]);
                        $id_rol_dia = RolDia::_insertarRolDia('DOMINGO',$id_turno,$id_doctor_rol_dia);
                        $b++;
                    }
                }
                $a++;
            }
        }

        if ($request->get('id_rol_dias_actualizar') != null) {
            $rol_dias_actualizar = $request->get('id_rol_dias_actualizar');
            $a = 0;
            while ($a < count($rol_dias_actualizar)) {
                $id_rol_dia = $rol_dias_actualizar[$a];
                $id_doctor = $request->get('select_dia_lunes_actualizar_'.$id_rol_dia);
                RolDia::_editarRolDia($id_doctor,$id_rol_dia);
                $a++;

                $id_rol_dia = $rol_dias_actualizar[$a];
                $id_doctor = $request->get('select_dia_martes_actualizar_'.$id_rol_dia);
                RolDia::_editarRolDia($id_doctor,$id_rol_dia);
                $a++;

                $id_rol_dia = $rol_dias_actualizar[$a];
                $id_doctor = $request->get('select_dia_miercoles_actualizar_'.$id_rol_dia);
                RolDia::_editarRolDia($id_doctor,$id_rol_dia);
                $a++;

                $id_rol_dia = $rol_dias_actualizar[$a];
                $id_doctor = $request->get('select_dia_jueves_actualizar_'.$id_rol_dia);
                RolDia::_editarRolDia($id_doctor,$id_rol_dia);
                $a++;

                $id_rol_dia = $rol_dias_actualizar[$a];
                $id_doctor = $request->get('select_dia_viernes_actualizar_'.$id_rol_dia);
                RolDia::_editarRolDia($id_doctor,$id_rol_dia);
                $a++;

                $id_rol_dia = $rol_dias_actualizar[$a];
                $id_doctor = $request->get('select_dia_sabado_actualizar_'.$id_rol_dia);
                RolDia::_editarRolDia($id_doctor,$id_rol_dia);
                $a++;

                $id_rol_dia = $rol_dias_actualizar[$a];
                $id_doctor = $request->get('select_dia_domingo_actualizar_'.$id_rol_dia);
                RolDia::_editarRolDia($id_doctor,$id_rol_dia);
                $a++;
            }
        }
        
        if ($request->get('id_turnos_nuevos') != null) {
            $idturnos = $request->get('id_turnos_nuevos');
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
                        $id_doctor_rol_dia = $request->get('selec_dia_lunes_nuevo'.$idfilas[$b]);
                        $id_rol_dia = RolDia::_insertarRolDia('LUNES',$id_turno,$id_doctor_rol_dia);
                        //
                        $id_doctor_rol_dia = $request->get('selec_dia_martes_nuevo'.$idfilas[$b]);
                        $id_rol_dia = RolDia::_insertarRolDia('MARTES',$id_turno,$id_doctor_rol_dia);
                        //
                        $id_doctor_rol_dia = $request->get('selec_dia_miercoles_nuevo'.$idfilas[$b]);
                        $id_rol_dia = RolDia::_insertarRolDia('MIERCOLES',$id_turno,$id_doctor_rol_dia);
                        //
                        $id_doctor_rol_dia = $request->get('selec_dia_jueves_nuevo'.$idfilas[$b]);
                        $id_rol_dia = RolDia::_insertarRolDia('JUEVES',$id_turno,$id_doctor_rol_dia);
                        //
                        $id_doctor_rol_dia = $request->get('selec_dia_viernes_nuevo'.$idfilas[$b]);
                        $id_rol_dia = RolDia::_insertarRolDia('VIERNES',$id_turno,$id_doctor_rol_dia);
                        //
                        $id_doctor_rol_dia = $request->get('selec_dia_sabado_nuevo'.$idfilas[$b]);
                        $id_rol_dia = RolDia::_insertarRolDia('SABADO',$id_turno,$id_doctor_rol_dia);
                        //
                        $id_doctor_rol_dia = $request->get('selec_dia_domingo_nuevo'.$idfilas[$b]);
                        $id_rol_dia = RolDia::_insertarRolDia('DOMINGO',$id_turno,$id_doctor_rol_dia);
                        $b++;
                    }
                }
                $a++;
            }
        }
    }

    public function create_rol_turno_emergencia($id_centro)//id centro
    {
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        $anios = array("2018","2019","2020","2021","2022","2023","2024","2025","2026","2027","2028","2029","2030");
        $anio_actual = date("Y");
        $mes_actual = $meses[date('n')-1];

        // $detalle = CentroMedico::_obtenerDetalleCentro($id);
        $especialidades_etapa_emergencia = CentroMedico::_obtenerEspecialidadesEtapaEmergencia($id_centro);
        $medicos = Medico::_getAllMedicos("")->get();

        return view('admCentros.centro.rol_turno.create_emergencia',compact('id_centro','especialidades_etapa_emergencia','medicos','meses','mes_actual','anios','anio_actual'));
    }

    public function create_rol_turno_consulta($id_centro,$id_rol_turno)
    {
        $especialidades_etapa_consulta = CentroMedico::_obtenerEspecialidadesEtapaConsultaExt($id_centro);
        $medicos = Medico::_getAllMedicos("")->get();

        return view('admCentros.centro.rol_turno.create_consulta_ext',compact('id_centro','id_rol_turno','especialidades_etapa_consulta','medicos'));
    }

    public function create_rol_turno_hospitalizacion($id_centro,$id_rol_turno)
    {
        $especialidades_etapa_hospitalizacion = CentroMedico::_obtenerEspecialidadesEtapaHospitalizacion($id_centro);
        $medicos = Medico::_getAllMedicos("")->get();

        return view('admCentros.centro.rol_turno.create_hospitalizacion',compact('id_centro','id_rol_turno','especialidades_etapa_hospitalizacion','medicos'));
    }

    public function store_rol_turno_emergencia(Request $request,$id_centro)
    {
        $titulo = $request->get('titulo');
        $mes = $request->get('mes');
        $anio = $request->get('anio');
        $id_rol_turno = RolTurno::_insertarRolTurno($titulo,$mes,$anio,$id_centro);
        $id_etapa_servicio = EtapaServicio::_insertarEtapaServicio('ETAPA DE EMERGENCIA',$id_rol_turno);

        $this->store_rol_turno_detalle($request,$id_etapa_servicio);
        return Redirect::to('adm/centro/create_rol_turno_consulta/'.$id_centro.'/'.$id_rol_turno);
    }

    public function store_rol_turno_consulta(Request $request,$id_centro,$id_rol_turno)
    {
        $id_etapa_servicio = EtapaServicio::_insertarEtapaServicio('ETAPA DE CONSULTA EXTERNA',$id_rol_turno);
        $this->store_rol_turno_detalle($request,$id_etapa_servicio);
        return Redirect::to('adm/centro/create_rol_turno_hospitalizacion/'.$id_centro.'/'.$id_rol_turno);
    }

    public function store_rol_turno_hospitalizacion(Request $request,$id_centro,$id_rol_turno)
    {
        $id_etapa_servicio = EtapaServicio::_insertarEtapaServicio('ETAPA DE HOSPITALIZACION',$id_rol_turno);
        $this->store_rol_turno_detalle($request,$id_etapa_servicio);
        return Redirect::to('adm/centro/index_rol_turno/'.$id_centro);
    }

    public function store_rol_turno_detalle($request,$id_etapa_servicio)
    {
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
                        $id_rol_dia = RolDia::_insertarRolDia('LUNES',$id_turno,$id_doctor_rol_dia);
                        //
                        $id_doctor_rol_dia = $request->get('selec_dia_martes'.$idfilas[$b]);
                        $id_rol_dia = RolDia::_insertarRolDia('MARTES',$id_turno,$id_doctor_rol_dia);
                        //
                        $id_doctor_rol_dia = $request->get('selec_dia_miercoles'.$idfilas[$b]);
                        $id_rol_dia = RolDia::_insertarRolDia('MIERCOLES',$id_turno,$id_doctor_rol_dia);
                        //
                        $id_doctor_rol_dia = $request->get('selec_dia_jueves'.$idfilas[$b]);
                        $id_rol_dia = RolDia::_insertarRolDia('JUEVES',$id_turno,$id_doctor_rol_dia);
                        //
                        $id_doctor_rol_dia = $request->get('selec_dia_viernes'.$idfilas[$b]);
                        $id_rol_dia = RolDia::_insertarRolDia('VIERNES',$id_turno,$id_doctor_rol_dia);
                        //
                        $id_doctor_rol_dia = $request->get('selec_dia_sabado'.$idfilas[$b]);
                        $id_rol_dia = RolDia::_insertarRolDia('SABADO',$id_turno,$id_doctor_rol_dia);
                        //
                        $id_doctor_rol_dia = $request->get('selec_dia_domingo'.$idfilas[$b]);
                        $id_rol_dia = RolDia::_insertarRolDia('DOMINGO',$id_turno,$id_doctor_rol_dia);
                        $b++;
                    }
                }
                $a++;
            }
        }
    }

    public function renovate_rol_turno($id,$id_centro)
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
    	
    	return view('admCentros.centro.rol_turno.renovate',compact('id_centro','rol_turno','especialidades','turnos_json','rol_dias_json','medicos_json','medicos','detalle2','etapa_servicio_uno'));
    }

    public function build_rol_turno($id_rol_turno,$id_centro)
    {
        $etapas_servicios = EtapaServicio::_obtejerEtapasPorIdRolTurno($id_rol_turno);
        
        if (count($etapas_servicios) == 1) {//le toca la etapa 2 CONSULTA
            return Redirect::to('adm/centro/create_rol_turno_consulta/'.$id_centro.'/'.$id_rol_turno);
        }else if (count($etapas_servicios) == 2) {//le toca la etapa 3 HOSPITALIZACION
            return Redirect::to('adm/centro/create_rol_turno_hospitalizacion/'.$id_centro.'/'.$id_rol_turno);
        }else if (count($etapas_servicios) == 3 ){//le toca la etapa 4 CENTRO
            return Redirect::to('adm/centro/index_rol_turno/'.$id_centro);
        }
    }

    //PARA LA APLICACION MOVIL
    public function get_EtapasServicios($id){
        return json_encode(array("etapas" => RolTurno::_getEtapasServicios($id)->get()));
    }
    
    public function get_EspecialidadesPorIdEtapa($id){
        return json_encode(array("especialidades" => RolTurno::_getEspecialidadesPorIdEtapaServicio($id)));
    }
    
    public function get_TurnosPorIdEtapaServicio($id){
        return json_encode(array("turnos" => RolTurno::_getTurnosPorIdEtapaServicio($id)));
    }

    public function get_RolDiasPorIdEtapaServicio($id){
        return json_encode(array("rolesDia" => RolTurno::_getRolDiasPorIdEtapaServicio($id)));
    }
}
