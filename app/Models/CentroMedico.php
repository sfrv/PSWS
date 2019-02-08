<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use DB;

class CentroMedico extends Model
{
    public $timestamps = false;

    protected $table = 'centro_medico';

    protected $fillable = [
        'nombre',
        'direccion',
        'descripcion',
        'distrito',
        'uv',
        'imagen',
        'manzano',
        'horas_atencion',
        'telefono',
        'latitud',
        'longitud',
        'id_red',
        'id_tiposervicio',
        'id_zona',
        'id_nivel',
        'estado'
    ];


    public function scope_getAllCentrosMedicos($query, $searchText)
    {
        $text = trim($searchText);
        $result = $query->where('nombre', 'LIKE', '%' . $text . '%')
            ->where('estado', '=' , '1')
            ->orderBy('id', 'desc');
            // ->paginate(7);
        return $result;
    }

    public function scope_insertarCentroMedico($query, $request)
    {
        $centro = new CentroMedico;
        $centro->nombre = $request->get('nombre');
        $centro->direccion = $request->get('direccion');
        $centro->distrito = $request->get('distrito');
        $centro->uv = $request->get('uv');
        $centro->imagen = $request->get('imagen');
        $centro->manzano = $request->get('manzano');
        $centro->horas_atencion = $request->get('horas_atencion');
        $centro->telefono = $request->get('telefono');
        $centro->latitud = $request->get('latitud');
        $centro->longitud = $request->get('longitud');
        $centro->id_red = $request->get('id_red');
        $centro->id_tipo_servicio = $request->get('id_tipo_servicio');
        $centro->id_zona = $request->get('id_zona');
        $centro->id_nivel = $request->get('id_nivel');
        $centro->estado = 1;

        if (Input::hasFile('imagen')) {
            $file = $request->file('imagen');
            $file->move(public_path() . '/images/Centros/', $file->getClientOriginalName());
            $centro->imagen = $file->getClientOriginalName();
        }

        $centro->save();

        $idespecialidad = $request->get('idespecialidad_e');

        $cont = 0;
        while ($cont < count($idespecialidad)) {
            $detalleEspecialidad = new DetalleCentroEspecialidad();
            $detalleEspecialidad->id_centro_medico = $centro->id;
            $detalleEspecialidad->id_especialidad = $idespecialidad[$cont];
            if($request->get($idespecialidad[$cont].'_e') != null ){
                $detalleEspecialidad->etapa_emergencia = 1;
            }
            if($request->get($idespecialidad[$cont].'_c') != null ){
                $detalleEspecialidad->etapa_consulta = 1;
            }
            if($request->get($idespecialidad[$cont].'_h') != null ){
                $detalleEspecialidad->etapa_hospitalizacion = 1;
            }
            $detalleEspecialidad->estado = 1;
            $detalleEspecialidad->save();
            $cont = $cont + 1;
        }
    }

    public function scope_editarCentroMedico($query, $request, $id)
    {
        $centro = CentroMedico::findOrFail($id);
        $centro->nombre = $request->get('nombre');
        $centro->direccion = $request->get('direccion');
        $centro->distrito = $request->get('distrito');
        $centro->uv = $request->get('uv');
        // $centro->imagen = $request->get('imagen');
        $centro->manzano = $request->get('manzano');
        $centro->horas_atencion = $request->get('horas_atencion');
        $centro->telefono = $request->get('telefono');
        $centro->latitud = $request->get('latitud');
        $centro->longitud = $request->get('longitud');
        $centro->id_red = $request->get('id_red');
        $centro->id_tipo_servicio = $request->get('id_tipo_servicio');
        $centro->id_zona = $request->get('id_zona');
        $centro->id_nivel = $request->get('id_nivel');

        if (Input::hasFile('imagen')) {
            $file = $request->file('imagen');
            $file->move(public_path() . '/images/Centros/', $file->getClientOriginalName());
            $centro->imagen = $file->getClientOriginalName();
        }

        $centro->update();

        if ($request->get('idespecialidad_edit') != null) {
            $idespecialidad = $request->get('idespecialidad_edit');
            $cont = 0;
            $cant_aux = 0;
            while ($cont < count($idespecialidad)) {
                $detalleEspecialidad = DetalleCentroEspecialidad::findOrFail($idespecialidad[$cont]);
                if($request->get($idespecialidad[$cont].'_ef') != null ){
                    $detalleEspecialidad->etapa_emergencia = 1;
                }else{
                    $detalleEspecialidad->etapa_emergencia = 0;
                    $cant_aux++;
                }
                if($request->get($idespecialidad[$cont].'_cf') != null ){
                    $detalleEspecialidad->etapa_consulta = 1;
                }else{
                    $detalleEspecialidad->etapa_consulta = 0;
                    $cant_aux++;
                }
                if($request->get($idespecialidad[$cont].'_hf') != null ){
                    $detalleEspecialidad->etapa_hospitalizacion = 1;
                }else{
                    $detalleEspecialidad->etapa_hospitalizacion = 0;
                    $cant_aux++;
                }
                if ($cant_aux == 3) {
                    // $detalleEspecialidad2 = DetalleCentroEspecialidad::findOrFail($idespecialidad[$cont]);
                    $detalleEspecialidad->estado = 0;
                    // $detalleEspecialidad2->update();
                }else{
                    // $detalleEspecialidad2 = DetalleCentroEspecialidad::findOrFail($idespecialidad[$cont]);
                    $detalleEspecialidad->estado = 1;
                    // $detalleEspecialidad2->update();
                }
                $cant_aux = 0;
                $detalleEspecialidad->update();
                $cont = $cont + 1;
            }
        }

        if ($request->get('idespecialidad_e') != null) {
            $idespecialidad = $request->get('idespecialidad_e');
            $cont = 0;
            while ($cont < count($idespecialidad)) {
                $detalleEspecialidad = new DetalleCentroEspecialidad();
                $detalleEspecialidad->id_centro_medico = $centro->id;
                $detalleEspecialidad->id_especialidad = $idespecialidad[$cont];
                if($request->get($idespecialidad[$cont].'_e') != null ){
                    $detalleEspecialidad->etapa_emergencia = 1;
                }
                if($request->get($idespecialidad[$cont].'_c') != null ){
                    $detalleEspecialidad->etapa_consulta = 1;
                }
                if($request->get($idespecialidad[$cont].'_h') != null ){
                    $detalleEspecialidad->etapa_hospitalizacion = 1;
                }
                $detalleEspecialidad->estado = 1;
                $detalleEspecialidad->save();
                $cont = $cont + 1;
            }
        }

        if ($request->get('idespecialidad_delete') != null) {
            $idespecialidad = $request->get('idespecialidad_delete');
            $cont = 0;
            while ($cont < count($idespecialidad)) {
                // DetalleCentroEspecialidad::destroy($idespecialidad[$cont]);
                $detalleEspecialidad = DetalleCentroEspecialidad::findOrFail($idespecialidad[$cont]);
                $detalleEspecialidad->estado = 0;
                $detalleEspecialidad->update();
                $cont = $cont + 1;
            }
        }
        // dd($idespecialidad);
        // dd("ss");

    }

    public function scope_obtenerCentro($query, $id)
    {
        $centro = DB::table('centro_medico as c')
            ->join('red as r', 'r.id', '=', 'c.id_red')
            ->join('tipo_servicio as t', 't.id', '=', 'c.id_tipo_servicio')
            ->join('zona as z', 'z.id', '=', 'c.id_zona')
            ->join('nivel as n', 'n.id', '=', 'c.id_nivel')
            ->select('c.id', 'c.nombre', 'c.latitud', 'c.longitud', 'c.direccion', 'c.descripcion', 'c.distrito', 'c.uv', 'c.manzano', 'c.horas_atencion', 'c.imagen', 'telefono', 'r.nombre as nombreRed', 't.nombre as nombreServicio', 'z.nombre as nombreZona', 'n.nombre as nombreNivel')
            ->where('c.id', '=', $id)
            ->first();

        return $centro;
    }

    public function scope_obtenerDetalleCentro($query, $id)
    {
        $detalle = DB::table('detalle_centro_especialidad as de')
            ->join('especialidad as e', 'e.id', '=', 'de.id_especialidad')
            ->select('e.nombre', 'de.id' , 'de.etapa_emergencia' , 'de.etapa_consulta', 'de.etapa_hospitalizacion','de.id_especialidad','de.estado')
            ->where('de.id_centro_medico', '=', $id)
            ->orderBy("de.id", "asc")
            ->get();

        return $detalle;
    }

    public function scope_obtenerEspecialidadesEtapaEmergencia($query, $id)
    {
        $result = DB::table('detalle_centro_especialidad as de')
            ->join('especialidad as e', 'e.id', '=', 'de.id_especialidad')
            ->select('e.nombre', 'de.id')
            ->where('de.id_centro_medico', '=', $id)
            ->where('de.estado', '=', 1)
            ->where('de.etapa_emergencia', '=', 1)
            ->orderBy("de.id", "asc")
            ->get();

        return $result;
    }

    public function scope_obtenerRolTurnos($query, $id, $searchText)
    {

        $text = trim($searchText);
        if ($text == "") {
            $result = DB::table('centro_medico as a')
                ->join('detalle_centro_especialidad as b', 'a.id', '=', 'b.id_centro_medico')
                ->join('turno as c', 'b.id', '=', 'c.id_detalle_centro_especialidad')
                ->join('etapa_servicio as d', 'c.id_etapa_servicio', '=', 'd.id')
                ->join('rol_turno as e', 'd.id_rol_turno', '=', 'e.id')
                ->select('e.*')
                ->where('a.id', '=', $id)
                ->distinct()
                ->orderBy("e.id", "DES");
        } else {

            $result = DB::table('centro_medico as a')
                ->join('detalle_centro_especialidad as b', 'a.id', '=', 'b.id_centro_medico')
                ->join('turno as c', 'b.id', '=', 'c.id_detalle_centro_especialidad')
                ->join('etapa_servicio as d', 'c.id_etapa_servicio', '=', 'd.id')
                ->join('rol_turno as e', 'd.id_rol_turno', '=', 'e.id')
                ->select('e.*')
                ->where('a.id', '=', $id)
                ->where('e.mes', 'LIKE', '%' . $text . '%')
                ->orWhere('e.titulo', 'LIKE', '%' . $text . '%')
                ->distinct()
                ->orderBy("e.id", "DES");
        }


        return $result;
    }

    public function scope_obtenerCarteraServicios($query, $id, $searchText)
    {
        $text = trim($searchText);
        if ($text == "") {
            $result = DB::table('centro_medico as a')
                ->join('detalle_centro_especialidad as b', 'a.id', '=', 'b.id_centro_medico')
                ->join('servicio as c', 'b.id', '=', 'c.id_detalle_centro_especialidad')
                ->join('cartera_servicio as d', 'c.id_cartera_servicio', '=', 'd.id')
                ->select('d.*')
                ->where('a.id', '=', $id)
                ->distinct()
                ->orderBy("d.id", "DES")
                ->paginate(10);
        } else {
            $result = DB::table('centro_medico as a')
                ->join('detalle_centro_especialidad as b', 'a.id', '=', 'b.id_centro_medico')
                ->join('servicio as c', 'b.id', '=', 'c.id_detalle_centro_especialidad')
                ->join('cartera_servicio as d', 'c.id_cartera_servicio', '=', 'd.id')
                ->select('d.*')
                ->where('a.id', '=', $id)
                ->where('d.mes', 'LIKE', '%' . $text . '%')
                ->orWhere('d.titulo', 'LIKE', '%' . $text . '%')
                ->distinct()
                ->get();
          // $result=$query->where('estado','=',1)
          //             ->where('nombre','LIKE','%'.$text.'%')
          //               ->orWhere('id','LIKE','%'.$text.'%')
          //               ->orderBy('id','desc');
        }


        return $result;
        // $cartera_servicios = DB::table('centro_medico as a')
        // ->join('detalle_centro_especialidad as b','a.id', '=', 'b.id_centro_medico')
        // ->join('servicio as c','b.id', '=', 'c.id_detalle_centro_especialidad')
        // ->join('cartera_servicio as d','c.id_cartera_servicio', '=', 'd.id')
        // ->select('d.*')
        // ->where('a.id','=', $id)
        // ->distinct()
        // ->get();

        // return $cartera_servicios;
    }

    public function scope_eliminarCentroMedico($query, $id)
    {
        $centro = CentroMedico::findOrFail($id);
        $centro->estado = 0;
        $centro->update();
    }

    public function scope_getAllCentroMedico($query)
    {
        $result = DB::table('centro_medico as c')
            ->join('red as r', 'r.id', '=', 'c.id_red')
            ->join('tipo_servicio as t', 't.id', '=', 'c.id_tipo_servicio')
            ->join('zona as z', 'z.id', '=', 'c.id_zona')
            ->join('nivel as n', 'n.id', '=', 'c.id_nivel')
            ->select('c.id', 'c.nombre', 'c.latitud', 'c.longitud', 'c.direccion', 'c.descripcion', 'c.distrito', 'c.uv', 'c.manzano', 'c.horas_atencion', 'telefono', 'r.nombre as nombreRed', 't.nombre as nombreTipoServicio', 'z.nombre as nombreZona', 'n.nombre as nombreNivel', 'c.estado');

        return $result;
    }

    public function scope_getOneCentroMedico($query, $id)
    {
        $result = $query->where('id', '=', $id);
        return $result;
    }

    public function scope_getCentrosMedicos_por_red_tipo_nivel($query, $id_red, $id_tipo_servicio, $id_nivel)
    {
        $result = DB::table('centro_medico as c')
            ->join('red as r', 'r.id', '=', 'c.id_red')
            ->join('tipo_servicio as t', 't.id', '=', 'c.id_tipo_servicio')
            ->join('zona as z', 'z.id', '=', 'c.id_zona')
            ->join('nivel as n', 'n.id', '=', 'c.id_nivel')
            ->select('c.id', 'c.nombre', 'c.latitud', 'c.longitud', 'c.direccion', 'c.descripcion', 'c.distrito', 'c.uv', 'c.manzano', 'c.horas_atencion', 'telefono', 'r.nombre as nombreRed', 't.nombre as nombreTipoServicio', 'z.nombre as nombreZona', 'n.nombre as nombreNivel', 'c.estado')

            ->where('c.id_red', '=', $id_red)
            ->where('c.id_tipo_servicio', '=', $id_tipo_servicio)
            ->where('c.id_nivel', '=', $id_nivel);

        return $result;

    }

    //================================================
   
    public function scope_getLastCarteraServicio($query, $id){
            $result = DB::table('centro_medico as a')
            ->join('detalle_centro_especialidad as b', 'a.id', '=', 'b.id_centro_medico')
            ->join('servicio as c', 'b.id', '=', 'c.id_detalle_centro_especialidad')
            ->join('cartera_servicio as d', 'c.id_cartera_servicio', '=', 'd.id')
            ->select('d.*')
            ->where('a.id', '=', $id)
            ->distinct()
            ->orderby('d.id','desc');
            // ->take(1);
            
            return $result;
    }

    
    //modificar el la funcion ateriorr de carteras pues el nombre no corresponde
    public function scope_getAllRolTurnos($query, $id)
    {
        $result = DB::table('centro_medico as a')
            ->join('detalle_centro_especialidad as b', 'a.id', '=', 'b.id_centro_medico')
            ->join('turno as c', 'b.id', '=', 'c.id_detalle_centro_especialidad')
            ->join('etapa_servicio as d', 'c.id_etapa_servicio', '=', 'd.id')
            ->join('rol_turno as e', 'd.id_rol_turno', '=', 'e.id')
            ->select('e.*')
            ->where('a.id', '=', $id)
            ->distinct()
            ->orderBy("e.id", "desc");
        return $result;
    }
}
