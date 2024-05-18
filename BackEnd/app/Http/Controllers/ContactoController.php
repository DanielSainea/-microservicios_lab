<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    function index()
    {
        $contactos = Contacto::all();
        $data = ['data' => $contactos];
        return response()->json($data);
    }

    function show($id)
    {
        $contacto = Contacto::find($id);
        $data = ['data' => $contacto];
        return response()->json($data);
    }

    function store(Request $request)
    {
        $datos = $request->all();
        $contacto = new Contacto();
        $contacto->nombre = $datos['nombre'];
        $contacto->email = $datos['email'];
        $contacto->telefono = $datos['telefono'];
        $contacto->save();
        $data = ['data' => $contacto];
        return response()->json($data);
    }

    function update($id, Request $request)
    {
        $datos = $request->all();
        $contacto = Contacto::find($id);
        $contacto->nombre = $datos['nombre'];
        $contacto->email = $datos['email'];
        $contacto->telefono = $datos['telefono'];
        $contacto->save();
        $data = ['data' => $contacto];
        return response()->json($data);
    }

    function destroy($id)
    {
        $contacto = Contacto::find($id);
        if (empty($contacto)) {
            $data = ['data' => 'No se encuentra registrado el contacto'];
            return response()->json($data, 404);
        }
        $contacto->delete();
        $data = ['data' => 'Datos eliminados'];
        return response()->json($data);
    }
}
