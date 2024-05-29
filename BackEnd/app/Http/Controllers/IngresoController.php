<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;
use Illuminate\Http\Request;

class IngresoController extends Controller
{
    function index()
    {
        $ingresos = Ingreso::all();
        $data = ['data' => $ingresos];
        return response()->json($data);
    }

    function show($id)
    {
        $ingreso = Ingreso::find($id);
        $data = ['data' => $ingreso];
        return response()->json($data);
    }

    function store(Request $request)
    {
        $datos = $request->all();
        $ingreso = new Ingreso();
        $ingreso->codigoEstudiante = $datos['codigoEstudiante'];
        $ingreso->nombreEstudiante = $datos['nombreEstudiante'];
        $ingreso->idPrograma = $datos['idPrograma'];
        $ingreso->fechaIngreso = $datos['fechaIngreso'];
        $ingreso->horaIngreso = $datos['horaIngreso'];
        $ingreso->horaSalida = $datos['horaSalida'];
        $ingreso->idResponsable = $datos['idResponsable'];
        $ingreso->idSala = $datos['idSala'];
        $ingreso->save();
        $data = ['data' => $ingreso];
        return response()->json($data);
    }

    function update($id, Request $request)
    {
        $datos = $request->all();
        $ingreso = Ingreso::find($id);
        $ingreso->codigoEstudiante = $datos['codigoEstudiante'];
        $ingreso->nombreEstudiante = $datos['nombreEstudiante'];
        $ingreso->idPrograma = $datos['idPrograma'];
        $ingreso->fechaIngreso = $datos['fechaIngreso'];
        $ingreso->horaIngreso = $datos['horaIngreso'];
        $ingreso->horaSalida = $datos['horaSalida'];
        $ingreso->idResponsable = $datos['idResponsable'];
        $ingreso->idSala = $datos['idSala'];
        $ingreso->save();
        $data = ['data' => $ingreso];
        return response()->json($data);
    }

    function destroy($id)
    {
        $ingreso = Ingreso::find($id);
        if (empty($ingreso)) {
            $data = ['data' => 'No se encuentra registrado el ingreso'];
            return response()->json($data, 404);
        }
        $ingreso->delete();
        $data = ['data' => 'Datos eliminados'];
        return response()->json($data);
    }
}
