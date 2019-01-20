<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolDia extends Model
{
    public $timestamps = false;

  	protected $table = 'rol_dia';

	protected $fillable = [
	  'dia',
	  'id_turno',
	  'id_medico',
	  'estado'
	];

	public function scope_insertarRolDia($query, $dia, $id_turno, $id_medico)
	{
	  $rol_dia = new RolDia;
	  $rol_dia->dia = $dia;
	  $rol_dia->id_turno = $id_turno;
	  $rol_dia->id_medico = $id_medico;
	  $rol_dia->estado = 1;
	  $rol_dia->save();

	  return $rol_dia->id;
	}
}
