<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
    use HasFactory;

    protected $table = "venta";
    protected $primaryKey = "id_venta";
    protected $fillable = ['user_id','fecha_de_compra','precio_total','id_metodop'];

    public function detalle_ventas(){
        return $this->belongsTo(detalle_de_venta::class,'id_venta','id_venta');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
    public function metodo_de_pago()
    {
        return $this->belongsTo(metodo_de_pago::class, 'id_metodop','id_metodop');
    }
    public $timestamps = false;
    
}