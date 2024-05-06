<?php

namespace App\Http\Controllers;

use App\Models\metodo_de_pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class MetodoDePagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $metodos = metodo_de_pago::all();
        return view('metodop.index',compact('metodos'));
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

        $metodos = new metodo_de_pago;
        $metodos->nombre = $request->input("nombre");
        $metodos->save();

        return redirect()->back()->with('success', 'método de pago agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(metodo_de_pago $metodo_de_pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(metodo_de_pago $metodo_de_pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_metodop)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|regex:/^[A-Z][a-z]*$/',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $metodos = metodo_de_pago::find($id_metodop);
        $metodos->nombre = $request->input("nombre");
        $metodos->update();

        return redirect()->back()->with('success', 'método de pago agregado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_metodop)
    {
        $metodos = metodo_de_pago::find($id_metodop);
        $metodos->delete();
        return redirect()->back();
    }
}
