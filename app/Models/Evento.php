<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos';

    public static function obtenerEventos()
    {
        return DB::table('eventos')
            ->select('titulo as title', 'fecha_inicio as start', 'fecha_fin as end', 'descripcion', 'url_imagen')
            ->get();
    }
}
