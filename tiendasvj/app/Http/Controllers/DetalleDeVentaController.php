<?php

namespace App\Http\Controllers;

use App\Models\detalle_de_venta;
use App\Models\juego;
use App\Models\metodo_de_pago;
use App\Models\datos_de_pago;
use Illuminate\Http\Request;

class DetalleDeVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $juegos = juego::all();
        $metodosp= metodo_de_pago::all();
        
        return view('ventas.registro',compact('juegos','metodosp'));
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
        $detalle_de_ventas= new detalle_de_venta();
        $detalle_de_ventas->fecha=$request->input('fecha');
        $detalle_de_ventas->id_juego=$request->input('juego');
        $detalle_de_ventas->cantidad=$request->input('cantidad');
        $detalle_de_ventas->precio_unitario=$request->input('precio_u');
        $detalle_de_ventas->precio_total=$request->input('precio_t');
        $detalle_de_ventas->metodo_de_pago=$request->input('metodop');
        $detalle_de_ventas->user_id=$request->input('user');
    }

    /**
     * Display the specified resource.
     */
    public function show(detalle_de_venta $detalle_de_venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(detalle_de_venta $detalle_de_venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, detalle_de_venta $detalle_de_venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(detalle_de_venta $detalle_de_venta)
    {
        //
    }
}
