<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plataforma extends Model
{
    use HasFactory;
    protected $table = "plataformas";
    protected $primaryKey = "id_plataforma";
    protected $fillable = ['nombre'];
    public $timestamps = false;
}
