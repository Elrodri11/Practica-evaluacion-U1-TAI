<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion_corta',
        'descripcion_larga',
        'precio',
        'caracteristicas',
        'fecha_registro',
    ];

    protected $dates = [
        'fecha_registro',
    ];
}
