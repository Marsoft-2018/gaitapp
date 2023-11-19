<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuardarParticipanteRequest;
use App\Models\Participante;
use Illuminate\Http\Request;

class ParticipanteController extends Controller
{
    public function index()
    {
        return Participante::all();
    }

    public function store(GuardarParticipanteRequest $request)
    {
         Participante::create($request->all());
         return response()->json([
            'res' => true,
            "msg" => "Participante creado con éxito"
         ]);
    }

    public function show(Participante $participante)
    {
         return response()->json([
            'res' => true,
            "participante" => $participante
         ]);
    }
}
