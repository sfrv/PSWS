<?php

use Illuminate\Database\Seeder;
use App\Models\Zona;

class ZonaTableSeeder extends Seeder
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
          'nombre' 		  => 'Nombre de la Zona 1',
          'descripcion' => 'Descripcion de la Zona 1',
          'created_at'  => new DateTime,
          'updated_at'  => new DateTime
        ],
        [
          'nombre' 		  => 'Nombre de Zona 2',
          'descripcion' => 'Descripcion de la Zona 2',
          'created_at'  => new DateTime,
          'updated_at'  => new DateTime
        ],
        [
          'nombre' 		  => 'Nombre de Zona 3',
          'descripcion' => 'Descripcion de la Zona 3',
          'created_at'  => new DateTime,
          'updated_at'  => new DateTime
        ],
        [
          'nombre' 		  => 'Nombre de Zona 4',
          'descripcion' => 'Descripcion de la Zona 4',
          'created_at'  => new DateTime,
          'updated_at'  => new DateTime
        ]
      );
      Zona::insert($data);
    }
}
