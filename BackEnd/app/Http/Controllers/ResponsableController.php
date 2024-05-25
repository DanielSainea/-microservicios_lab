<?php

namespace App\Http\Controllers;

use App\Models\Responsable;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    function index()
    {
        $responsables = Responsable::all();
        $data = ['data' => $responsables];
        return response()->json($data);
    }

    function show($id)
    {
        $responsable = Responsable::find($id);
        $data = ['data' => $responsable];
        return response()->json($data);
    }

    function store(Request $request)
    {
        $datos = $request->all();
        $responsable = new Responsable();
        $responsable->nombre = $datos['nombre'];
        $responsable->save();
        $data = ['data' => $responsable];
        return response()->json($data);
    }

    function update($id, Request $request)
    {
        $datos = $request->all();
        $responsable = Responsable::find($id);
        $responsable->nombre = $datos['nombre'];
        $responsable->save();
        $data = ['data' => $responsable];
        return response()->json($data);
    }

    function destroy($id)
    {
        $responsable = Responsable::find($id);
        if (empty($responsable)) {
            $data = ['data' => 'No se encuentra registrado el responsable'];
            return response()->json($data, 404);
        }
        $responsable->delete();
        $data = ['data' => 'Datos eliminados'];
        return response()->json($data);
    }
}