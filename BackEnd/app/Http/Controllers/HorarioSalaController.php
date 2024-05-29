<?php

namespace App\Http\Controllers;


use App\Models\HorarioSala;
use Illuminate\Http\Request;

class HorarioSalaController extends Controller
{

    function index()
    {
        $HorarioSalas = HorarioSala::all();
        $data = ['data' =>  $HorarioSalas];
        return response()->json($data);
    }

    function show($id)
    {
        $HorarioSala = HorarioSala::find($id);
        $data = ['data' =>  $HorarioSala];
        return response()->json($data);
    }

    function store(Request $request)
    {
        $datos = $request->all();
        $HorarioSala = new HorarioSala();
        $HorarioSala->dia = $datos['dia'];
        $HorarioSala->materia = $datos['materia'];
        $HorarioSala->horaInicio = $datos['horaInicio'];
        $HorarioSala->horaFin = $datos['horaFin'];
        $HorarioSala->idPrograma = $datos['idPrograma'];
        $HorarioSala->idSala = $datos['idSala'];
        $HorarioSala->save();
        $data = ['data' =>  $HorarioSala];
        return response()->json($data);
    }

    function update($id, Request $request)
    {
        $datos = $request->all();
        $HorarioSala = HorarioSala::find($id);
        $HorarioSala->dia = $datos['dia'];
        $HorarioSala->materia = $datos['materia'];
        $HorarioSala->horaInicio = $datos['horaInicio'];
        $HorarioSala->horaFin = $datos['horaFin'];
        $HorarioSala->idPrograma = $datos['idPrograma'];
        $HorarioSala->idSala  = $datos['idSala '];
        $HorarioSala->save();
        $data = ['data' => $HorarioSala];
        return response()->json($data);
    }

    function destroy($id)
    {
        $HorarioSala = HorarioSala::find($id);
        if (empty( $HorarioSala)) {
            $data = ['data' => 'No se encuentra registrado el horario de la sala'];
            return response()->json($data, 404);
        }
        $HorarioSala->delete();
        $data = ['data' => 'Datos eliminados'];
        return response()->json($data);
    }

}