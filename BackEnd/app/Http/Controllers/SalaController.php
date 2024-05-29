<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    function index()
    {
        $salas = Sala::all();
        $data = ['data' => $salas];
        return response()->json($data);
    }

    function show($id)
    {
        $sala = Sala::find($id);
        $data = ['data' => $sala];
        return response()->json($data);
    }

    function store(Request $request)
    {
        $datos = $request->all();
        $sala = new Sala();
        $sala->nombre = $datos['nombre'];
        $sala->save();
        $data = ['data' => $sala];
        return response()->json($data);
    }

    function update($id, Request $request)
    {
        $datos = $request->all();
        $sala = Sala::find($id);
        $sala->nombre = $datos['nombre'];
        $sala->save();
        $data = ['data' => $sala];
        return response()->json($data);
    }

    function destroy($id)
    {
        $sala = Sala::find($id);
        if (empty($sala)) {
            $data = ['data' => 'No se encuentra registrado el nombre de la sala'];
            return response()->json($data, 404);
        }
        $sala->delete();
        $data = ['data' => 'Datos eliminados'];
        return response()->json($data);
    }
}