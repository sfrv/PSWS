<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
