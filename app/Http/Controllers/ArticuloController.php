<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;

class ArticuloController extends Controller
{

    public function articulos()
    {
        $articulos = Articulo::all();
        return view('inicio', compact('articulos'));
    }

    public function articulo($id_articulo){
        $articulo = Articulo::obtenerPorId($id_articulo);
        
        if (!$articulo) {
            return response()->json(['error' => 'Artículo no encontrado'], 404);
        }
        
        return view('articulo', compact('articulo'));
    }

}
