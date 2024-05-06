<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tienda extends Model
{
    use HasFactory;
    protected $table = "tiendas";
    protected $primaryKey = "id_tienda";
    protected $fillable = ['nombre','direccion','user_id'];

    // public function user(){
    //     return $this->belongsTo(user::class,'user_id','id');
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
    public function juegos()
    {
        return $this->hasMany(Juego::class);
    }
    public $timestamps = false;
}
