<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Especialidad;
use App\Models\DetalleEnfermedad;
use DB;

class EspecialidadController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $especialidades = Especialidad::_getAllEspecialidades($request['searchText'])->paginate(7);
        return view('admCentros.especialidad.index',["especialidades"=>$especialidades,"searchText"=>$request->get('searchText')]);
    }

    public function create()
    {
        return view('admCentros.especialidad.create');
    }

    public function store(Request $request)
    {
        Especialidad::_insertarEspecialidad($request);
        return Redirect::to('adm/especialidad')->with('msj','La especialidad: "'.$request['nombre'].'" se creo exitósamente.');
    }

    public function edit($id)
    {
        return view("admCentros.especialidad.edit",["especialidad"=>Especialidad::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        Especialidad::_editarEspecialidad($id, $request);
        return Redirect::to('adm/especialidad')->with('msj','La Especialidad: '.$request->nombre.' se edito exitosamente.');
    }

    public function destroy($id){
		    Especialidad::_eliminarEspecialidad($id);
        return Redirect::to('adm/especialidad');
	  }

    public function getEspecialidades(){
        return json_encode(array("especialidades" => Especialidad::_getAllEspecialidad()->get()));
    }

    public function getEspecialidadPorLugar($id)
    {
        $detalle_especialidads = DB::table('detalle_especialidads')->get();
        $arr = array();
        foreach ($detalle_especialidads as $det_es) {
            if ($det_es->id_lugar == $id) {
                $arr[] = Especialidad::findOrfail($det_es->id_especialidad);
            }
        }
        return json_encode(array("especialidades" => $arr ));
    }
}
