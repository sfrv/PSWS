<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    public $timestamps = false;

    protected $table = 'medico';

    protected $fillable = [
        'nombre', 'apellido', 'telefono', 'direccion', 'correo', 'estado'
    ];

    public function scope_getAllMedicos($query, $searchText)
    {
        $text = trim($searchText);
        $result = $query->where('nombre', 'LIKE', '%' . $text . '%')
            ->orWhere('id', 'LIKE', '%' . $text . '%')
            ->orderBy('id', 'desc');
        return $result;
    }

    public function scope_insertarMedico($query, $request)
    {
        $medico = new Medico;
        $medico->nombre = $request->get('nombre');
        $medico->apellido = $request->get('apellido');
        $medico->telefono = $request->get('telefono');
        $medico->direccion = $request->get('direccion');
        $medico->correo = $request->get('correo');
        $medico->save();
    }

    public function scope_editarMedico($query, $id, $request)
    {
        $medico = Medico::findOrFail($id);
        $medico->nombre = $request->get('nombre');
        $medico->apellido = $request->get('apellido');
        $medico->telefono = $request->get('telefono');
        $medico->direccion = $request->get('direccion');
        $medico->correo = $request->get('correo');
        $medico->update();
    }

    public function scope_eliminarMedico($query, $id)
    {
        $medico = Medico::findOrFail($id);
        $medico->estado = '0';
        $medico->update();
    }

    public function scope_getAllMedico($query)
    {
        return $query;
    }

}
