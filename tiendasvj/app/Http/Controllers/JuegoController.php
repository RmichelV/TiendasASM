<?php

namespace App\Http\Controllers;

use App\Models\juego;
use App\Models\tienda;
use App\Models\plataforma;
use App\Models\genero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

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
    public function agregarJuego()
    {
        $juegos = juego::all();
        $tiendas = tienda::all();
        $plataformas=plataforma::all();
        $generos = genero::all();
        return view("juego.agregar", compact("juegos","tiendas","plataformas","generos"));
    }
    public function editarJuego($id)
    {
        $juegos = juego::all();
        $tiendas = tienda::all();
        $plataformas=plataforma::all();
        $generos = genero::all();
        return view("juego.editar", compact("juegos","tiendas","plataformas","generos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|regex:/^[a-zA-Z0-9\s\-_\.]+$/|unique:juegos,nombre',
            'descripcion' => 'required',
            'precio' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'stock' => ['required', 'numeric', 'integer', 'min:1'],
            'generos' => 'required|array|min:1',
            'plataformas' => 'required|array|min:1',
        ],[
            'generos.required' => 'Debe seleccionar al menos un género',
            'plataformas.required' => 'Debe seleccionar al menos una plataforma',
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

        return redirect('juegos')->with('success', 'El juego se ha agregado correctamente.');
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
        $validator = Validator::make($request->all(), [
            'nombre' => [
                'required',
                'string',
                Rule::unique('juegos', 'nombre')->ignore($id_juego,'id_juego'),
            ],
            'descripcion' => 'required',
            'precio' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'stock' => ['required', 'numeric', 'integer', 'min:1'],
            'generos' => 'required|array|min:1',
            'plataformas' => 'required|array|min:1',
        ], [
            'nombre.unique' => 'El nombre del juego ya está en uso.',
            'stock.min' => 'El campo Stock debe ser mayor que cero.',
            'generos.required' => 'Debe seleccionar al menos un género',
            'plataformas.required' => 'Debe seleccionar al menos una plataforma',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        
        $idTienda = auth()->user()->tienda->id_tienda;
        

        $juego =  Juego::find($id_juego);
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

        $juego->update();

        // $juego->generos()->attach($request->input('generos'));
        // $juego->plataformas()->attach($request->input('plataformas'));

        // dd($request->all());

        return redirect('juegos')->with('success', 'El juego se ha agregado correctamente.');
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

    //////////samuel//////////
     // FILTRADO POR GENERO
     public function filtrarPorGenero($id_genero)
     {
         $juegos = Juego::whereHas('generos', function ($query) use ($id_genero) {
             $query->where('generos.id_genero', $id_genero);
         })->get();
         $tiendas = Tienda::all();
         $plataformas = Plataforma::all();
         $generos = Genero::all();
         return view("juego.index", compact("juegos", "tiendas", "plataformas", "generos"));
     }
 
     // FILTRADO POR PLATAFORMA
     public function filtrarPorPlataforma($id_plataforma)
     {
         $juegos = Juego::whereHas('plataformas', function ($query) use ($id_plataforma) {
             $query->where('plataformas.id_plataforma', $id_plataforma);
         })->get();
         $tiendas = Tienda::all();
         $plataformas = Plataforma::all();
         $generos = Genero::all();
         return view("juego.index", compact("juegos", "tiendas", "plataformas", "generos"));
     }
}
