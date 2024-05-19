<?php

namespace App\Http\Controllers;

use App\Models\carrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\juego;
class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carritos = carrito::all();
        $juegos = juego::all();
        return view('carrito.index',compact('carritos','juegos'));
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
    // public function store(Request $request)
    // {

    //     $carritos = new carrito();
    //     $userc=Auth::user();
    //     if($userc){
    //         $carritos->user_id=$userc->id;
    //         $carritos->id_juego = $request->input('id_juego');
    //     }
    //     $carritos->save();
    //     return redirect()->back()->with('success', 'el juego se  se ha  agregado correctamente.');

    // }
    public function store(Request $request)
    {
        $user = Auth::user();
    
        if($user){
            $id_juego = $request->input('id_juego');
            
            $existingCartItem = Carrito::where('user_id', $user->id)
                                        ->where('id_juego', $id_juego)
                                        ->first();
    
            if($existingCartItem) {
                return redirect()->back()->with('error', 'Este juego ya está en tu carrito.');
            }
    
            $carritos = new Carrito();
            $carritos->user_id = $user->id;
            $carritos->id_juego = $id_juego;
            $carritos->save();
    
            return redirect()->back()->with('success', 'El juego se ha agregado correctamente.');
        }
    
        return redirect()->back()->with('error', 'Debes iniciar sesión para agregar juegos al carrito.');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(carrito $carrito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(carrito $carrito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, carrito $carrito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_carrito)
    {
        $carritos = carrito::find($id_carrito);
        $carritos->delete();
        return redirect()->back();
    }
}
