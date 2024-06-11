<?php

namespace App\Http\Controllers;

use App\Models\venta;
use App\Models\juego;
use App\Models\User;
use App\Models\metodo_de_pago;
use App\Models\detalle_de_venta;


use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = venta::all();
        $juegos = juego::all();
        $users = User::all();
        $metodo_de_pagos=metodo_de_pago::all();
        $detalle_de_ventas = detalle_de_venta::all();
        return view('ventas.verventas',compact('ventas','juegos','users','metodo_de_pagos','detalle_de_ventas'));
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
    public function show(venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(venta $venta)
    {
        //
    }
}
