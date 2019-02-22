<?php
public function store_cartera_servicio()
{
     // $my_json = $_REQUEST['my_json'];
     // $titulo = $my_json['titulo'];
     // $mes = $my_json['mes'];
     // $anio = $my_json['anio'];
     // $id_centro = $my_json['id_centro'];

     // $id_cartera_servicio = CarteraServicio::_insertarCarteraServicio($titulo,$mes,$anio,$id_centro);

     // $datos = (array)$my_json['datos'];
     // for ($i=0; $i < count($datos) ; $i++) { 
     //      Servicio::_insertarServicio($datos[$i][1],$datos[$i][2],$datos[$i][3],$datos[$i][4],$id_cartera_servicio,$datos[$i][0]);
     // }
}

public function store_rol_turno()
{
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

public function update_rol_turno()
{
	// $my_json = $_REQUEST['my_json'];

     //    $titulo = $my_json['titulo'];
     //    $mes = $my_json['mes'];
     //    $anio = $my_json['anio'];
     //    $id_rol_turno = $my_json['id'];

     //    RolTurno::_editarRolTurno($titulo,$mes,$anio,$id_rol_turno);

     //    if (!empty($my_json['rol_dias_actualizar'])) {
     //    	$rol_dias_actualizar = (array)$my_json['rol_dias_actualizar'];
     //    	for ($i=0; $i < count($rol_dias_actualizar) ; $i++) { 
     //    		$id_rol_dia = $rol_dias_actualizar[$i]['id'];
     //    		$id_doctor = $rol_dias_actualizar[$i]['id_doctor'];
     //    		if ($id_doctor == -1) {
     //    			$id_doctor = null;
     //    		}
     //    		RolDia::_editarRolDia($id_doctor,$id_rol_dia);
     //    	}
     //    }

     //    if (!empty($my_json['turnos_actualizar'])) {
     //    	$turnos_actualizar = (array)$my_json['turnos_actualizar'];
     //    	for ($i=0; $i < count($turnos_actualizar) ; $i++) { 
     //    		$id_turno = $turnos_actualizar[$i]['id'];
     //    		$titulo = $turnos_actualizar[$i]['titulo'];
     //    		$hora_inicio = $turnos_actualizar[$i]['hora_inicio'];
     //    		$hora_fin = $turnos_actualizar[$i]['hora_fin'];
     //    		Turno::_editarTurno($titulo,$hora_inicio,$hora_fin,$id_turno);
     //    	}
     //    }

     //    if (!empty($my_json['rol_dias_eliminar'])) {
     //    	$rol_dias_eliminar = (array)$my_json['rol_dias_eliminar'];
     //    	for ($i=0; $i < count($rol_dias_eliminar) ; $i++) { 
     //    		$id_rol_dia = $rol_dias_eliminar[$i];
     //    		RolDia::destroy($id_rol_dia);
     //    	}
     //    }

     //    if (!empty($my_json['turnos_eliminar'])) {
     //    	$turnos_eliminar = (array)$my_json['turnos_eliminar'];
     //    	for ($i=0; $i < count($turnos_eliminar) ; $i++) { 
     //    		$id_turno = $turnos_eliminar[$i];
     //    		Turno::destroy($id_turno);
     //    	}
     //    }

     //    if (!empty($my_json['rol_dias_crear'])) {
     //    	$rol_dias_crear = (array)$my_json['rol_dias_crear'];
     //    	for ($i=0; $i < count($rol_dias_crear) ; $i++) { 
     //    		$id_turno = $rol_dias_crear[$i]['id_turno'];
     //    		$id_doctor = $rol_dias_crear[$i]['id_doctor'];
     //    		$dia = $rol_dias_crear[$i]['dia'];
     //    		if ($id_doctor == -1) {
     //    			$id_doctor = null;
     //    		}
     //    		$id_rol_dia = RolDia::_insertarRolDia($dia,$id_turno,$id_doctor);
     //    	}
     //    }

     //    $id_etapa_servicio = $my_json['id_etapa_servicio_uno'];
     //    if (!empty($my_json['turnos_rol_crear'])) {
     //    	$especialidades = $my_json['turnos_rol_crear'];
	    //     for ($i=0; $i < count($especialidades) ; $i++) { 
	    //     	$id_especialidad = $especialidades[$i]['id'];
	    //     	if (!empty($especialidades[$i]['turnos'])) {
		   //      	$turnos = $especialidades[$i]['turnos'];
		   //      	for ($j=0; $j < count($turnos) ; $j++) { 
		   //      		$titulo_turno = $turnos[$j]['titulo'];
		   //      		$hora_inicio_turno = $turnos[$j]['hora_inicio'];
		   //      		$hora_fin_turno = $turnos[$j]['hora_fin'];
		   //      		$id_turno = Turno::_insertarTurno($titulo_turno,$hora_inicio_turno,$hora_fin_turno,$id_especialidad,$id_etapa_servicio);
		   //      		$filas = (array)$turnos[$j]['filas'];
		   //      		for ($k=0; $k < count($filas) ; $k++) { 
		   //      		 	for ($m=0; $m < count($filas[$k]) ; $m++) { 
			  //       		 	$dia_rol_dia = $filas[$k][$m]['dia'];
			  //       		 	$id_doctor_rol_dia = $filas[$k][$m]['id_doctor'];
			  //       		 	if ($id_doctor_rol_dia == -1) {//no existe doctor
			  //       		 		$id_doctor_rol_dia = null;
			  //       		 	}else{//si existe doctor

			  //       		 	}
			  //       		 	$id_rol_dia = RolDia::_insertarRolDia($dia_rol_dia,$id_turno,$id_doctor_rol_dia);
		   //      		 	}
		   //      		} 
		   //      	}
		   //      }else{//no existe turnos
		   //      	// $aux_borrar = $aux_borrar . "0";
		   //      }
	    //     }
     //    }
}