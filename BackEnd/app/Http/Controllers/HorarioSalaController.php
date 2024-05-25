<?php

namespace App\Http\Controllers;


use App\Models\horarioSala;
use Illuminate\Http\Request;

class HorarioSalaController extends Controller
{

    function index()
    {
        $horariosalas = horarioSala::all();
        $data = ['data' =>  $horariosalas];
        return response()->json($data);
    }

    function show($id)
    {
        $horariosala = horarioSala::find($id);
        $data = ['data' =>  $horariosala];
        return response()->json($data);
    }

    function store(Request $request)
    {
        $datos = $request->all();
        $horariosala = new horarioSala();
        $horariosala->dia = $datos['dia'];
        $horariosala->materia = $datos['materia'];
        $horariosala->horaInicio = $datos['horaInicio'];
        $horariosala->horaFin = $datos['horaFin'];
        $horariosala->idPrograma = $datos['idPrograma'];
        $horariosala->idSala = $datos['idSala'];
        $horariosala->save();
        $data = ['data' =>  $horariosala];
        return response()->json($data);
    }

    function update($id, Request $request)
    {
        $datos = $request->all();
        $horariosala = horarioSala::find($id);
        $horariosala->dia = $datos['dia'];
        $horariosala->materia = $datos['materia'];
        $horariosala->horaInicio = $datos['horaInicio'];
        $horariosala->horaFin = $datos['horaFin'];
        $horariosala->idPrograma = $datos['idPrograma'];
        $horariosala->idSala  = $datos['idSala '];
        $horariosala->save();
        $data = ['data' => $horariosala];
        return response()->json($data);
    }

    function destroy($id)
    {
        $horariosala = horarioSala::find($id);
        if (empty( $horariosala)) {
            $data = ['data' => 'No se encuentra registrado el horario de la sala'];
            return response()->json($data, 404);
        }
        $horariosala->delete();
        $data = ['data' => 'Datos eliminados'];
        return response()->json($data);
    }

}