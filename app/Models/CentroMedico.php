<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
            ->orderBy('id', 'desc');
        return $result;
    }

    public function scope_insertarCentroMedico($query, $request)
    {
        $centro = new CentroMedico;
        $centro->nombre = $request->get('nombre');
        $centro->direccion = $request->get('direccion');
        $centro->descripcion = $request->get('descripcion');
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
        $centro->save();

        $idespecialidad = $request->get('idespecialidad');

        $cont = 0;
        while ($cont < count($idespecialidad)) {
            $detalleEspecialidad = new DetalleCentroEspecialidad();
            $detalleEspecialidad->id_centro_medico = $centro->id;
            $detalleEspecialidad->id_especialidad = $idespecialidad[$cont];
            $detalleEspecialidad->estado = 1;
            $detalleEspecialidad->save();
            $cont = $cont + 1;
        }
    }

    public function scope_obtenerCentro($query, $id)
    {
        $centro = DB::table('centro_medico as c')
        ->join('red as r', 'r.id', '=', 'c.id_red')
        ->join('tipo_servicio as t', 't.id', '=', 'c.id_tipo_servicio')
        ->join('zona as z', 'z.id', '=', 'c.id_zona')
        ->join('nivel as n', 'n.id', '=', 'c.id_nivel')
        ->select('c.id','c.nombre','c.latitud','c.longitud','c.direccion','c.descripcion','c.distrito','c.uv','c.manzano','c.horas_atencion','telefono','r.nombre as nombreRed','t.nombre as nombreServicio','z.nombre as nombreZona','n.nombre as nombreNivel')
        ->where('c.id','=', $id)
        ->first();

        return $centro;
    }

    public function scope_obtenerDetalleCentro($query, $id)
    {
        $detalle = DB::table('detalle_centro_especialidad as de')
        ->join('especialidad as e','e.id', '=', 'de.id_especialidad')
        ->select('e.nombre','de.id')
        ->where('de.id_centro_medico','=', $id)
        ->get();

        return $detalle;
    }

    public function scope_eliminarCentroMedico($query, $id)
    {
        $centro = CentroMedico::findOrFail($id);
        $centro->estado = 0;
        $centro->update(); 
    }

    public function scope_getAllCentroMedico($query)
    {
        return $query;
    }

    public function scope_getOneCentroMendico($query, $id)
    {
        $result = $query->where('id', '=', $id);
        return $result;
    }
}
