<?php

namespace App\Http\Controllers;

use App\Models\tienda;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiendas = tienda::all();
        $users = user::all();
        return view("Tienda.index", compact("tiendas","users"));
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
            'nombre' => 'required|string|regex:/^(?!\s+$)[a-zA-Z\s]+$/',
            'direccion'=> 'required|string|regex:/^(?!\s+$)[a-zA-Z\s]+$/',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $tiendas = new tienda();
        $tiendas->nombre = $request->input("nombre");
        $tiendas->direccion=$request->input("direccion");
        $tiendas->user_id=$request->input("user");
        $tiendas->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(tienda $tienda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tienda $tienda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_tienda)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|regex:/^(?!\s+$)[a-zA-Z\s]+$/',
            'direccion'=> 'required|string|regex:/^(?!\s+$)[a-zA-Z\s]+$/',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $tiendas = tienda::find($id_tienda);
        $tiendas->nombre = $request->input("nombre");
        $tiendas->direccion=$request->input("direccion");
        $tiendas->user_id=$request->input("user");
        $tiendas->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_tienda)
    {
        $tiendas = tienda::find($id_tienda);
        $tiendas->delete();
        return redirect()->back();
    }
}
