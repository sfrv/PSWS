<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleSintoma extends Model
{
  protected $fillable = [
    'id_enfermedad',
    'id_sintoma'
  ];
}
