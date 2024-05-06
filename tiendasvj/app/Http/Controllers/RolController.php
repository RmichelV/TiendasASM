<?php

namespace App\Http\Controllers;

use App\Models\rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rols = rol::all();
        return view('rols.index',compact('rols'));
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

        $rols = new rol;
        $rols->nombre = $request->input("nombre");
        $rols->save();

        return redirect()->back()->with('success', 'Rol agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(rol $rol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(rol $rol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_rol)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|regex:/^[a-zA-Z]+(\s[a-zA-Z]+)*$/',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $rols = rol::find($id_rol);
        $rols->nombre = $request->input("nombre");
        $rols->update();

        return redirect()->back()->with('success', 'Rol agregado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_rol)
    {
        $rols = rol::find($id_rol);
        $rols->delete();
        return redirect()->back();
    }
}
