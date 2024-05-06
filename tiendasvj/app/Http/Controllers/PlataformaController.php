<?php

namespace App\Http\Controllers;

use App\Models\plataforma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlataformaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plataformas = plataforma::all();
        return view('plataformas.index',compact('plataformas'));
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
            'nombre' => 'required|string|regex:/^[a-zA-Z]+(\s[a-zA-Z]+)*$/',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $plataformas = new plataforma;
        $plataformas->nombre = $request->input("nombre");
        $plataformas->save();

        return redirect()->back()->with('success', 'Plataforma agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(plataforma $plataforma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(plataforma $plataforma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_plataforma)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|regex:/^[a-zA-Z]+(\s[a-zA-Z]+)*$/',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $plataformas = plataforma::find($id_plataforma);
        $plataformas->nombre = $request->input("nombre");
        $plataformas->update();

        return redirect()->back()->with('success', 'Plataforma actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_plataforma)
    {
        
        $plataformas = plataforma::find($id_plataforma);
        $plataformas->delete();

        return redirect()->back()->with('success', 'Plataforma eliminado correctamente.');
    }
}
