<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\CarteraServicio;
use App\Models\CentroMedico;
use App\Models\Servicio;

class CarteraServicioController extends Controller
{
	public function index_cartera_servicio($id,Request $request)
    {
        $centro = CentroMedico::_obtenerCentro($id);
        $cartera_servicios = CentroMedico::_obtenerCarteraServicios($id,$request['searchText']);
        // dd($request['searchText']);
        $searchText = $request->get('searchText');
        return view('admCentros.centro.index_cartera_servicio',compact('cartera_servicios','centro','searchText'));
    }

    public function show_cartera_servicio($id)
    {
    	$cartera_servicio = CarteraServicio::findOrFail($id);
    	$servicios = CarteraServicio::_getServiciosPorId($id);
    	$especialidades = CarteraServicio::_getEspecialidadesPorId($id);

    	$servicios_json = json_encode($servicios, JSON_UNESCAPED_SLASHES );
    	// dd($cartera_servicio);
    	return view('admCentros.centro.show_cartera_servicio',compact('cartera_servicio','especialidades','servicios_json'));
    }

    public function create_cartera_servicio($id)
    {
        $detalle = CentroMedico::_obtenerDetalleCentro($id);
        $detalle2 = json_encode($detalle, JSON_UNESCAPED_SLASHES );
        return view('admCentros.centro.create_cartera_servicio',compact('detalle','detalle2'));
    }

    public function edit_cartera_servicio($id)
    {
    	$cartera_servicio = CarteraServicio::findOrFail($id);
    	$servicios = CarteraServicio::_getServiciosPorId($id);
    	$especialidades = CarteraServicio::_getEspecialidadesPorId($id);

    	$servicios_json = json_encode($servicios, JSON_UNESCAPED_SLASHES );
    	// dd($cartera_servicio);
    	return view('admCentros.centro.edit_cartera_servicio',compact('cartera_servicio','especialidades','servicios_json'));
    }

    public function guardar_cartera_servicio()
    {
        $my_json = $_REQUEST['my_json'];
        $titulo = $my_json['titulo'];
        $mes = $my_json['mes'];
        $anio = $my_json['anio'];

        $id_cartera_servicio = CarteraServicio::_insertarCarteraServicio($titulo,$mes,$anio);

        $datos = (array)$my_json['datos'];
        for ($i=0; $i < count($datos) ; $i++) { 
            Servicio::_insertarServicio($datos[$i][1],$datos[$i][2],$datos[$i][3],$datos[$i][4],$id_cartera_servicio,$datos[$i][0]);
        }
        
        echo "Exito";
    }

    public function actualizar_cartera_servicio()
    {
    	$my_json = $_REQUEST['my_json'];
        $titulo = $my_json['titulo'];
        $mes = $my_json['mes'];
        $anio = $my_json['anio'];
        $id = $my_json['id'];

        if ($my_json['datos_new'] != -1) {
            $datos_new = (array)$my_json['datos_new'];
            for ($i=0; $i < count($datos_new) ; $i++) { 
                Servicio::_insertarServicio($datos_new[$i][1],$datos_new[$i][2],$datos_new[$i][3],$datos_new[$i][4],$id,$datos_new[$i][0]);
            }
        }

        if ($my_json['datos_filas_delete'] != -1) {
            $datos_filas_delete = (array)$my_json['datos_filas_delete'];
            for ($i=0; $i < count($datos_filas_delete) ; $i++) { 
                Servicio::destroy($datos_filas_delete[$i]);
            }
        }
        
        CarteraServicio::_editarCarteraServicio($titulo,$mes,$anio,$id);
        $datos = (array)$my_json['datos'];
        for ($i=0; $i < count($datos) ; $i++) { 
            Servicio::_editarServicio($datos[$i][1],$datos[$i][2],$datos[$i][3],$datos[$i][4],$datos[$i][0]);
        }
    }

    public function renovate_cartera_servicio($id)
    {
        $cartera_servicio = CarteraServicio::findOrFail($id);
        $servicios = CarteraServicio::_getServiciosPorId($id);
        $especialidades = CarteraServicio::_getEspecialidadesPorId($id);

        $servicios_json = json_encode($servicios, JSON_UNESCAPED_SLASHES );
        // dd($cartera_servicio);
        return view('admCentros.centro.renovate_cartera_servicio',compact('cartera_servicio','especialidades','servicios_json'));
    }
}
