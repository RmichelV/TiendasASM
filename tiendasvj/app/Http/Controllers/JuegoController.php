<?php

namespace App\Http\Controllers;

use App\Models\juego;
use App\Models\tienda;
use App\Models\plataforma;
use App\Models\genero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class JuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $juegos = juego::all();
        $tiendas = tienda::all();
        $plataformas=plataforma::all();
        $generos = genero::all();
        return view("juego.index", compact("juegos","tiendas","plataformas","generos"));
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

    //     $validator = Validator::make($request->all(), [
    //         'nombre' => 'required|string|regex:/^[a-zA-Z0-9]\s*\S.*$/',
    //         'descripcion'=> 'required|string|regex:/^[a-zA-Z0-9.-]+$/',
    //         'precio'=> 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
    //         'stock'=> 'required|numeric|integer',
    //         'generos'=>'required|array|min:1',
    //         'plataformas'=>'required|array|min:1',
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }
    //     // dd($request->all());

    //     $idTienda = auth()->user()->tienda->id_tienda;//nueva linea
        
    //     $juegos = new juego();
    //     $juegos->nombre = $request->input("nombre");
    //     $juegos->descripcion = $request->input("descripcion");
    //     $juegos->cantidad_de_jugadores = $request->input("cantidad");
    //     $juegos->precio = $request->input("precio");
    //     $juegos->stock = $request->input("stock");
    //     // $juegos->imagen = $request->input("imagen");
    //     $juegos->id_tienda = $idTienda;

    //     $juegos->save();

    //     // Obtener los géneros seleccionados del formulario
    //     $plataformasSeleccionadas = $request->input('plataformas');

    //     // Asociar los géneros seleccionados con el juego recién creado
    //     $juegos->plataformas()->attach($plataformasSeleccionadas);

    //     $generosSeleccionados = $request->input('generos');

    //     // Asociar los géneros seleccionados con el juego recién creado
    //     $juegos->generos()->attach($generosSeleccionados);

    //     return redirect()->back();
    // }

    /**
     * Display the specified resource.
     */
    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'nombre' => 'required|string|regex:/^[a-zA-Z0-9]\s*\S.*$/',
    //         'descripcion'=> 'required|string|regex:/^[a-zA-Z0-9.-]+$/',
    //         'precio'=> 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
    //         'stock'=> 'required|numeric|integer',
    //         'generos'=>'required|array|min:1',
    //         'plataformas'=>'required|array|min:1',
    //     ]);
    
    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }
        

    //     $idTienda = auth()->user()->tienda->id_tienda;
        
    //     $juego = new Juego();
    //     $juego->nombre = $request->input("nombre");
    //     $juego->descripcion = $request->input("descripcion");
    //     $juego->cantidad_de_jugadores = $request->input("cantidad");
    //     $juego->precio = $request->input("precio");
    //     $juego->stock = $request->input("stock");

    //     $juego->id_tienda = $idTienda;
    
    //     $juego->save();
    
    //     $juego->generos()->attach($request->input('generos'));
    
    //     $juego->plataformas()->attach($request->input('plataformas'));
    
    //     return redirect()->back()->with('success', 'El juego se ha agregado correctamente.');
    // }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|regex:/^[a-zA-Z0-9]\s*\S.*$/',
            'descripcion' => 'required|string|regex:/^[a-zA-Z0-9.-]+$/',
            'precio' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'stock' => 'required|numeric|integer',
            'generos' => 'required|array|min:1',
            'plataformas' => 'required|array|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        
        $idTienda = auth()->user()->tienda->id_tienda;
        

        $juego = new Juego();
        $juego->nombre = $request->input("nombre");
        $juego->descripcion = $request->input("descripcion");
        $juego->cantidad_de_jugadores = $request->input("cantidad");
        $juego->precio = $request->input("precio");
        $juego->stock = $request->input("stock");
        
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = $juego->nombre.".".$imagen->extension();
            $imagen->storeAs('',$nombreImagen.".".$imagen->extension(),'local');
            $ruta = $imagen->storeAs('', $nombreImagen, 'local');
            $juego->imagen=$ruta;
        }
        

        $juego->id_tienda = $idTienda;

        $juego->save();

        $juego->generos()->attach($request->input('generos'));
        $juego->plataformas()->attach($request->input('plataformas'));

        // dd($request->all());

        return redirect()->back()->with('success', 'El juego se ha agregado correctamente.');
    }
    public function show(juego $juego)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(juego $juego)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id_juego)
    {
        $idTienda = auth()->user()->tienda->id_tienda;

        $juegos = juego::find($id_juego);
        $juegos->nombre = $request->input("nombre");
        $juegos->descripcion = $request->input("descripcion");
        $juegos->cantidad_de_jugadores = $request->input("cantidad");
        $juegos->precio = $request->input("precio");
        $juegos->stock = $request->input("stock");
        // $juegos->imagen = $request->input("imagen");
        $juegos->id_tienda = $idTienda;
        $juegos->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_juego)
    {
        $juegos = juego::find($id_juego);
        $juegos->delete();
        return redirect()->back();
    }
}
