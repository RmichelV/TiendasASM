<?php

namespace App\Http\Controllers;

use App\Models\estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estados = estado::all();
        return view('Estados.index', compact('estados'));
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
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|regex:/^[A-Z][a-z]*$/',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $estado = new Estado;
        $estado->nombre = $request->input("nombre");
        $estado->save();

        return redirect()->back()->with('success', 'Estado de venta agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(estado $estado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(estado $estado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_estado)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|regex:/^[A-Z][a-z]*$/',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $estados = Estado::find($id_estado);
        $estados->nombre = $request->input("nombre");
        $estados->update();

        return redirect()->back()->with('success', 'Estado de venta se actualizo correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_estado)
    {
        $estados = estado::find($id_estado);
        $estados->delete();
        return redirect()->back();
    }
}
