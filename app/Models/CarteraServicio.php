<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class CarteraServicio extends Model
{
    public $timestamps = false;

  	protected $table = 'cartera_servicio';

	protected $fillable = [
	  'titulo',
	  'mes',
	  'anio',
	  'estado'
	];

	public function scope_insertarCarteraServicio($query, $titulo, $mes, $anio)
	{
	  $cartera_servicio = new CarteraServicio;
	  $cartera_servicio->titulo = $titulo;
	  $cartera_servicio->mes = $mes;
	  $cartera_servicio->anio = $anio;
	  $cartera_servicio->estado = 1;
	  $cartera_servicio->save();
	  return $cartera_servicio->id;
	}

	public function scope_editarCarteraServicio($query, $titulo, $mes, $anio,$id)
	{
	  $cartera_servicio = CarteraServicio::findOrFail($id);
	  $cartera_servicio->titulo = $titulo;
	  $cartera_servicio->mes = $mes;
	  $cartera_servicio->anio = $anio;
	  $cartera_servicio->update();
	}

	public function scope_getServiciosPorId($query, $id)
    {
        $servicios = DB::table('servicio as a')
        ->select('a.*')
        ->where('a.id_cartera_servicio','=', $id)
        ->orderBy('a.id_detalle_centro_especialidad', 'desc')
        ->get();

        return $servicios;
    }

    //no borrar
    public function scope_getEspecialidadesPorId($query, $id)
    {
        $servicios = DB::table('servicio as a')
        ->join('detalle_centro_especialidad as b', 'a.id_detalle_centro_especialidad', '=', 'b.id')
        ->join('especialidad as c', 'b.id_especialidad', '=', 'c.id')
        ->select('c.nombre','b.id')
        ->where('a.id_cartera_servicio','=', $id)
        ->orderBy('c.id', 'desc')
        ->distinct()
        ->get();

        return $servicios;
    }

    // public function scope_getEspecialidadesPorId($query, $id_centro)
    // {
    //     $servicios = DB::table('detalle_centro_especialidad as a')
    //     ->join('especialidad as b', 'a.id_especialidad', '=', 'b.id')
    //     ->select('b.nombre','a.id')
    //     ->where('a.id_centro_medico','=', $id_centro)
    //     ->orderBy('b.id', 'desc')
    //     ->get();

    //     return $servicios;
    // }
}
