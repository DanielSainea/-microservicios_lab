<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    function index()
    {
        $programas = Programa::all();
        $data = ['data' => $programas];
        return response()->json($data);
    }

    function show($id)
    {
        $programa = Programa::find($id);
        $data = ['data' => $programa];
        return response()->json($data);
    }

    function store(Request $request)
    {
        $datos = $request->all();
        $programa = new Programa();
        $programa->nombre = $datos['nombre'];
        $programa->save();
        $data = ['data' => $programa];
        return response()->json($data);
    }

    function update($id, Request $request)
    {
        $datos = $request->all();
        $programa = Programa::find($id);
        $programa->nombre = $datos['nombre'];
        $programa->save();
        $data = ['data' => $programa];
        return response()->json($data);
    }

    function destroy($id)
    {
        $programa = Programa::find($id);
        if (empty($programa)) {
            $data = ['data' => 'No se encuentra registrado el Programa'];
            return response()->json($data, 404);
        }
        $programa->delete();
        $data = ['data' => 'Datos eliminados'];
        return response()->json($data);
    }
}