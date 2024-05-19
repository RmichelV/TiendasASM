<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carrito extends Model
{
    use HasFactory;
    protected $table = "carritos";
    protected $primaryKey = "id_carrito";
    
    protected $fillable = ["user_id","id_juego"];

    public function juego()
    {
        return $this->hasMany(juego::class, 'id_juego','id_juego');
    }
    public $timestamps = false;
}
