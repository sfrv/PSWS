<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    public $timestamps = false;

  	protected $table = 'turno';

	protected $fillable = [
	  'nombre',
	  'hora_inicio',
	  'hora_fin',
	  'id_detalle_centro_especialidad',
	  'id_etapa_servicio',
	  'estado'
	];

	public function scope_insertarTurno($query, $nombre, $hora_inicio, $hora_fin, $id_detalle_centro_especialidad, $id_etapa_servicio)
	{
	  $turno = new Turno;
	  $turno->nombre = $nombre;
	  $turno->hora_inicio = $hora_inicio;
	  $turno->hora_fin = $hora_fin;
	  $turno->id_detalle_centro_especialidad = $id_detalle_centro_especialidad;
	  $turno->id_etapa_servicio = $id_etapa_servicio;
	  $turno->estado = 1;
	  $turno->save();

	  return $turno->id;
	}
}