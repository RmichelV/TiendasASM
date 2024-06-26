<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\MetodoDePagoController;
use App\Http\Controllers\PlataformaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\JuegoController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\DetalleDeVentaController;
use App\Http\Controllers\BuscadorController;
use App\Http\Controllers\VentaController;

Route::get('/',[WelcomeController::class,'index']);

Route::get('/dashboard', function () {
    return view('bienvenido');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//cruds 
Route::resource('estados',EstadoController::class);
Route::resource('generos',GeneroController::class);
Route::resource('metodos',MetodoDePagoController::class);
Route::resource('plataformas',PlataformaController::class);
Route::resource('rols',RolController::class);
Route::resource('users',UserController::class);
Route::resource('tiendas',TiendaController::class);
Route::resource('juegos',JuegoController::class);
Route::resource('carritos',CarritoController::class);
Route::resource('detalle_ventas',DetalleDeVentaController::class);
Route::resource('buscador',BuscadorController::class);
Route::resource('ventas',VentaController::class);


Route::get('mpago', function () {
    return view('pago');
});



///////////samuel////////////////////
Route::get('/juegos/filtrar-por-genero/{id_genero}', [JuegoController::class, 'filtrarPorGenero'])->name('juegos.filtrarPorGenero');

// Rutas resource para juegos y carritos
Route::resource('juegos', JuegoController::class);
// RUTA DE FILTRADO POR GENERO
Route::get('/juegos/filtrar-por-genero/{id_genero}', [JuegoController::class, 'filtrarPorGenero'])->name('juegos.filtrarPorGenero');
// RUTA DE FILTRADO POR PLATAFORMA
Route::get('/juegos/filtrar-por-plataforma/{id_plataforma}', [JuegoController::class, 'filtrarPorPlataforma'])->name('juegos.filtrarPorPlataforma');



// route::get('/editar-u',function(){
//     return view('Users.editar');
// })->name('editar-u');

// usuarios 
Route::get('/editar-u/{id}', [UserController::class, 'editusr'])->name('users.editar');
//tienda 
Route::get('/agregar-tienda', [TiendaController::class,'agregarTienda'])->name('agregar-tienda');
Route::get('/editar-tienda/{id}', [TiendaController::class, 'editarTienda'])->name('editar-tienda');

//juegos 
Route::get('/agregar-juego', [JuegoController::class,'agregarJuego'])->name('agregar-juego');
Route::get('/editar-juego/{id}', [JuegoController::class, 'editarJuego'])->name('editar-juego');