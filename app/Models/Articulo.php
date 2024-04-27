<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'descripcion', 'precio', 'cantidad_disponible', 'imagen_url', 'categoria_id', 'marca_id'
    ];

    public static function obtenerPorId($id)
    {
        return self::find($id);
    }
}
