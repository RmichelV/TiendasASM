<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class metodo_de_pago extends Model
{
    use HasFactory;
    protected $table = "metodo_de_pagos";
    protected $primaryKey = "id_metodop";
    protected $fillable = ['nombre'];
    public $timestamps = false;
}
