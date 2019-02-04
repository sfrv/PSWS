<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class RolTurno extends Model
{
    public $timestamps = false;

  	protected $table = 'rol_turno';

	protected $fillable = [
	  'titulo',
	  'descripcion',
	  'mes',
	  'anio',
	  'estado'
	];

	public function scope_insertarRolTurno($query, $titulo, $mes, $anio)
	{
	  $rol_turno = new RolTurno;
	  $rol_turno->titulo = $titulo;
	  $rol_turno->mes = $mes;
	  $rol_turno->anio = $anio;
	  $rol_turno->descripcion = 'Ninguno.';
	  $rol_turno->estado = 1;
	  $rol_turno->save();

	  return $rol_turno->id;
	}

	public function scope_editarRolTurno($query, $titulo, $mes, $anio, $id)
	{
	  $rol_turno = RolTurno::findOrFail($id);
	  $rol_turno->titulo = $titulo;
	  $rol_turno->mes = $mes;
	  $rol_turno->anio = $anio;
	  $rol_turno->save();
	}

	public function scope_getEtapaServicio($query, $id, $nombre)
    {
        $result = DB::table('etapa_servicio as a')
        ->select('a.*')
        ->where('a.id_rol_turno','=', $id)
        ->where('a.nombre','=', $nombre)
        ->first();

        return $result;
    }

    public function scope_getTurnosPorIdEtapaServicio($query, $id)
    {
        $result = DB::table('turno as a')
        ->select('a.*')
        ->where('a.id_etapa_servicio','=', $id)
        ->get();

        return $result;
    }

    public function scope_getEspecialidadesPorIdEtapaServicio($query, $id)
    {
        $result = DB::table('turno as a')
        ->join('detalle_centro_especialidad as b', 'a.id_detalle_centro_especialidad', '=', 'b.id')
        ->join('especialidad as c', 'b.id_especialidad', '=', 'c.id')
        ->select('c.nombre','b.id')
        ->where('a.id_etapa_servicio','=', $id)
        ->orderBy('b.id', 'ASC')
        ->distinct()
        ->get();

        return $result;
    }

    public function scope_getRolDiasPorIdEtapaServicio($query, $id)
    {
    	$result = DB::table('turno as a')
    	->join('rol_dia as b', 'a.id', '=', 'b.id_turno')
        ->select('b.*')
        ->where('a.id_etapa_servicio','=', $id)
        ->get();

        return $result;
    }
}
