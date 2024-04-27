<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class EventoController extends Controller
{
    public function calendario()
    {
        $eventos = Evento::all();
        return view('calendario', compact('eventos'));
    }

    public function obtener_eventos(){
        $eventos = Evento::obtenerEventos();
        return response()->json(['eventos' => $eventos]);
    }
    
    public function guardar_evento(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string',
            'titulo' => 'required|string',
            'fecha' => 'required|date',
        ]);

        $nombre_imagen = '';
        $entra = 'no';
        if ($request->hasFile('imagen')) {
            $entra = "si";
            $imagen = $request->file('imagen');
            $nombre_imagen = $imagen->getClientOriginalName();
            $imagen->storeAs('public/img', $nombre_imagen);
        }

        $evento = new Evento();
        $evento->descripcion = $request->descripcion;
        $evento->titulo = $request->titulo;
        $evento->fecha_inicio = $request->fecha;
        $evento->fecha_fin = $request->fecha;
        $evento->url_imagen = $nombre_imagen;
        $evento->save();

        // Responder con una respuesta JSON
        return response()->json(['message' => 'Evento guardado correctamente'], 200);
    }
}
