<?php

namespace App\Http\Controllers;

use App\Models\genero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $generos = genero::all();
        return view('generos.index',compact('generos'));
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

        $generos = new genero;
        $generos->nombre = $request->input("nombre");
        $generos->save();

        return redirect()->back()->with('success', 'Género agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(genero $genero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(genero $genero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_genero)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|regex:/^[A-Z][a-z]*$/',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $generos = genero::find($id_genero);
        
        $generos->nombre = $request->input("nombre");
        $generos->update();

        return redirect()->back()->with('success', 'Género agregado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_genero)
    {
        $generos = genero::find($id_genero);
        $generos->delete();
        return redirect()->back();
    }
}
