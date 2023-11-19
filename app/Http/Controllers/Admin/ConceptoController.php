<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Concepto;

class ConceptoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conceptos = Concepto::all();
        return view('admin.conceptos.index', compact('conceptos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.conceptos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'descripcion' => "required|unique:conceptos"
            ]
            );
        Concepto::create($request->all());
        $conceptos = Concepto::all();
        return redirect()->route('admin.conceptos.index', compact('conceptos'))->with('info','El Concepto se creó con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Concepto $concepto)
    {
        return view('admin.conceptos.show',compact('concepto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Concepto $concepto)
    {
        return view('admin.conceptos.edit',compact('concepto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Concepto $concepto)
    {
        $request->validate(
            [
                'descripcion' => "required|unique:conceptos,descripcion,$concepto->id"
            ]
            );
        
        $concepto->update($request->all());
        return redirect()->route('admin.conceptos.edit', compact('concepto'))->with('info','El Concepto se modificó con éxito');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Concepto $concepto)
    {
        $concepto->delete();
        return redirect()->route('admin.conceptos.index', compact('concepto'))->with('info','El Concepto se eliminó con éxito');
    }
}
