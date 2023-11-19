<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Egreso;

class EgresoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $egresos = Egreso::all();
        $heads = [
            'id',
            'Consecutivo',
            'Fecha',
            'Participante',
            'Valor',
            'Concepto',
            'Editar',
            'Eliminar'
        ];
        return view('admin.egresos.index', compact('egresos','heads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.egresos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'consecutivo' => "required|unique:egresos",
                'id_participante' => "required",
                'fecha' => "required",
                'valor' => "required",
                'id_concepto' => "required"
            ]
            );
        Egreso::create($request->all());
        $egresos = Egreso::all();
        return redirect()->route('admin.egresos.index', compact('egresos'))->with('info','El Egreso se creó con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Egreso $egreso)
    {
        return view('admin.egresos.show',compact('egreso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Egreso $egreso)
    {
        return view('admin.egresos.edit',compact('egreso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Egreso $egreso)
    {
        $request->validate(
            [
                'consecutivo' => "required|unique:egresos,consecutivo,$egreso->id",
                'id_participante' => "required",
                'fecha' => "required",
                'valor' => "required",
                'id_concepto' => "required"              
            ]
            );
        
        $egreso->update($request->all());
        return redirect()->route('admin.egresos.edit', compact('egreso'))->with('info','El Egreso se modificó con éxito');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Egreso $egreso)
    {
        $egreso->delete();
        return redirect()->route('admin.egresos.index', compact('egreso'))->with('info','El Egreso se eliminó con éxito');
    }
}
