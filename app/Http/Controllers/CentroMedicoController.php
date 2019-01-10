<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\CentroMedico;
use App\Models\Red;
use App\Models\TipoServicio;
use App\Models\Zona;
use App\Models\Nivel;
use App\Models\Especialidad;
use App\Models\CarteraServicio;
use App\Models\Servicio;
use DB;


class CentroMedicoController extends Controller
{

    public function index(Request $request)
    {
        $centros = CentroMedico::_getAllCentrosMedicos($request['searchText'])->paginate(7);
        return view('admCentros.centro.index', ["centros" => $centros, "searchText" => $request->get('searchText')]);
    }


    public function create()
    {
        $redes = Red::_getAllRedes("")->get();
        $tiposervicios = TipoServicio::_getAllTipoServicios("")->get();
        $zonas = Zona::_getAllZonas("")->get();
        $niveles = Nivel::_getAllNiveles("")->get();
        $especialidades = Especialidad::_getAllEspecialidades("")->get();
        return view('admCentros.centro.create', compact('redes','tiposervicios','zonas','niveles','especialidades'));
    }

    public function store(Request $request)
    {
        CentroMedico::_insertarCentroMedico($request);
        return Redirect::to('adm/centro');
    }

    public function show($id)
    {
        $centro = CentroMedico::_obtenerCentro($id);
        $detalle = CentroMedico::_obtenerDetalleCentro($id);
  
        return view('admCentros.centro.show',compact('centro','detalle'));
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        CentroMedico::_eliminarCentroMedico($id);
        return Redirect::to('adm/centro');
    }

    public function getCentrosMedicos(){
        return json_encode(array("centros" => CentroMedico::_getAllCentroMedico()->get()));
    }
  
    public function getLugar($id)
    {
      return json_encode(array("lugar" => CentroMedico::_getOneCentroMedico($id)->get()));
    }

    public function create_cartera_servicio($id)
    {

        $detalle = CentroMedico::_obtenerDetalleCentro($id);
        $detalle2 = json_encode($detalle, JSON_UNESCAPED_SLASHES );
        return view('admCentros.centro.cartera_servicio',compact('detalle','detalle2'));
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
}
