<?php

use Illuminate\Database\Seeder;
use App\Models\Especialidad;

class EspecialidadesTableSeeder extends Seeder
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
          'nombre' 		  => 'Nombre de la Especialidad 1',
          'descripcion' => 'Descripcion de la Especialidad 1',
          'created_at'  => new DateTime,
          'updated_at'  => new DateTime
        ],
        [
          'nombre' 		  => 'Nombre de la Especialidad 2',
          'descripcion' => 'Descripcion de la Especialidad 2',
          'created_at'  => new DateTime,
          'updated_at'  => new DateTime
        ],
        [
          'nombre' 		  => 'Nombre de la Especialidad 3',
          'descripcion' => 'Descripcion de la Especialidad 3',
          'created_at'  => new DateTime,
          'updated_at'  => new DateTime
        ],
        [
          'nombre' 		  => 'Nombre de la Especialidad 4',
          'descripcion' => 'Descripcion de la Especialidad 4',
          'created_at'  => new DateTime,
          'updated_at'  => new DateTime
        ]
      );
      Especialidad::insert($data);
    }
}
