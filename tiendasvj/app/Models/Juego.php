<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class juego extends Model
{
    use HasFactory;
    protected $table = "juegos";
    protected $primaryKey = "id_juego";
    protected $fillable = ['nombre','descripcion','cantidad_de_jugadores','precio','stock','imagen','id_tienda'];
    public function tienda(){
        return $this->belongsTo(tienda::class, 'id_tienda','id_tienda');
    }
    public function plataformas()
    {
        return $this->belongsToMany(plataforma::class, 'juegos_plataformas', 'id_juego', 'id_plataforma');
    }
    public function generos()
    {
        return $this->belongsToMany(genero::class, 'juegos_generos', 'id_juego', 'id_genero');
    }
    public $timestamps = false;
}
