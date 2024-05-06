<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
    use HasFactory;
    protected $table = "rols";
    protected $primaryKey = "id_rol";
    protected $fillable = ['nombre'];
    public $timestamps = false;
}
