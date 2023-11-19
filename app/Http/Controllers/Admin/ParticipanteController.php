<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Participante;

class ParticipanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.participantes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Participante::create($request->all());
         return response()->json([
            'res' => true,
            "msg" => "Participante creado con éxito"
         ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $participante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $participante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $participante)
    {
        //
    }
}
