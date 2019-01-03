<?php

use Illuminate\Database\Seeder;
use App\Models\Nivel;

class NivelTableSeeder extends Seeder
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
          'nombre' 		  => 'Nombre del Nivel 1',
          'descripcion' => 'Descripcion del Nivel 1',
          'created_at'  => new DateTime,
          'updated_at'  => new DateTime
        ],
        [
          'nombre' 		  => 'Nombre del Nivel 2',
          'descripcion' => 'Descripcion del Nivel 2',
          'created_at'  => new DateTime,
          'updated_at'  => new DateTime
        ],
        [
          'nombre' 		  => 'Nombre del Nivel 3',
          'descripcion' => 'Descripcion del Nivel 3',
          'created_at'  => new DateTime,
          'updated_at'  => new DateTime
        ],
        [
          'nombre' 		  => 'Nombre del Nivel 4',
          'descripcion' => 'Descripcion del Nivel 4',
          'created_at'  => new DateTime,
          'updated_at'  => new DateTime
        ]
      );
      Nivel::insert($data);
    }
}
