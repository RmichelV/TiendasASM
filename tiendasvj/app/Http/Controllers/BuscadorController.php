<?php

namespace App\Http\Controllers;

use App\Models\buscador;
use App\Models\juego;
use Illuminate\Http\Request;

class BuscadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');
        $juegos = collect(); // Inicializar como colección vacía

        if ($query) {
            $juegos = Juego::where('nombre', 'LIKE', '%' . $query . '%')->get();
        }

        return view('buscador', ['juegos' => $juegos]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(buscador $buscador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(buscador $buscador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, buscador $buscador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(buscador $buscador)
    {
        //
    }
}
