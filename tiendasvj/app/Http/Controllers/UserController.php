<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\rol;
use App\Models\carrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = user::all();
        $rols= rol::all();
        return view('users.index',compact('users','rols'));
    }
    public function editusr($id)
    {
        $user = User::findOrFail($id); // Busca el usuario por ID
    
        $rols = Rol::all(); // Recupera todos los roles, si es necesario para la vista de edición
    
        return view('users.editar', compact('user', 'rols'));
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
        
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|regex:/^[a-zA-ZñÑ]+(?: [a-zA-ZñÑ]+)?$/',
            'last_name'=> 'required|string|regex:/^[a-zA-ZñÑ]+(?: [a-zA-ZñÑ]+)?$/',
            'birthday' => 'required|date|before_or_equal:' . now()->format('Y-m-d') . '|after_or_equal:1920-01-01|before_or_equal:2020-12-31',
            'email'=>'required|email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $users = User::find($id);

        $users->name = $request->input("name");
        $users->last_name = $request->input("last_name");
        $users->birthday = $request->input("birthday");
        $users->email = $request->input("email");
        $users->password = bcrypt( $request->input("password"));
        $users->id_rol = $request->input("rol");
        $users->update();

        return redirect('users')->with('success', 'usuario se ha actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect()->back();
    }
}
