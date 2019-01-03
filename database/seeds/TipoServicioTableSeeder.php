<?php

use Illuminate\Database\Seeder;
use App\Models\TipoServicio;

class TipoServicioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $data = array(
        [
          'nombre' 		  => 'Nombre del Tipo de Servicio 1',
          'descripcion' => 'Descripcion del Tipo de Servicio 1',
          'created_at'  => new DateTime,
          'updated_at'  => new DateTime
        ],
        [
          'nombre' 		  => 'Nombre del Tipo de Servicio 2',
          'descripcion' => 'Descripcion del Tipo de Servicio 2',
          'created_at'  => new DateTime,
          'updated_at'  => new DateTime
        ],
        [
          'nombre' 		  => 'Nombre del Tipo de Servicio 3',
          'descripcion' => 'Descripcion del Tipo de Servicio 3',
          'created_at'  => new DateTime,
          'updated_at'  => new DateTime
        ],
        [
          'nombre' 		  => 'Nombre del Tipo de Servicio 4',
          'descripcion' => 'Descripcion del Tipo de Servicio 4',
          'created_at'  => new DateTime,
          'updated_at'  => new DateTime
        ]
      );
      TipoServicio::insert($data);
    }
}
