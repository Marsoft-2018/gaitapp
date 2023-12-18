<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banco;

class BancoController extends Controller
{    
    public function index()
    {
        $bancos = Banco::all();
        return view('admin.bancos.index', compact('bancos'));
    }

    public function create()
    {
        return view('admin.bancos.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nombre' => "required|unique:bancos"
            ]
            );
        Banco::create($request->all());
        $bancos = Banco::all();
        return redirect()->route('admin.bancos.index', compact('bancos'))->with('info','El Banco se creó con éxito');
    }

    public function show(Banco $banco)
    {
        return view('admin.bancos.show',compact('Banco'));
    }

    public function edit(Banco $banco)
    {
        return view('admin.bancos.edit',compact('Banco'));
    }

    public function update(Request $request, Banco $banco)
    {
        $request->validate(
            [
                'nombre' => "required|unique:bancos,nombre,$banco->id"
            ]
            );
        
        $banco->update($request->all());
        return redirect()->route('admin.bancos.edit', compact('Banco'))->with('info','El Banco se modificó con éxito');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banco $banco)
    {
        $banco->delete();
        return redirect()->route('admin.bancos.index', compact('Banco'))->with('info','El Banco se eliminó con éxito');
    }
}
