<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle_de_venta extends Model
{
    use HasFactory;
    protected $table = 'detale_de_venta';
    protected $primaryKey = 'id_detalle_de_venta';
    protected $fillable = ['id_juego','cantidad','precio_total','id_venta'];
    public function venta(){
        return $this->hasOne(venta::class,'id_venta','id_venta');
    }
    public function juego(){
        return $this->hasMany(juego::class,'id_juego','id_juego');
    }
    public $timestamps = false;
}