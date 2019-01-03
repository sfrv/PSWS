<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleEspecialidad extends Model
{
  protected $fillable = [
    'id_especialidad',
    'id_lugar'
  ];
}
