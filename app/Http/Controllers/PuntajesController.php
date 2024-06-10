<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\PuntajesModel;

class PuntajesController extends Controller
{
    public function guardarPuntaje(Request $request)
{
    $respuesta = [
        "ESTATUS" => "",
        "MENSAJE" => ""
    ];

    try {
        // Obtener el usuario autenticado
        $usuarioId = Auth::id();

        // Incrementar el contador de juegos jugados
        $usuario = Auth::user();
        $usuario->games_played++;
        $usuario->save();

        // Verificar si el usuario ya tiene un puntaje registrado
        $puntajeUsuario = PuntajesModel::where('id_usuario', $usuarioId)->first();

        if ($puntajeUsuario) {
            // Si el usuario ya tiene un puntaje, actualizarlo
            $puntajeUsuario->puntos_jugador += $request->puntos_jugador;
            $puntajeUsuario->puntos_crupier += $request->puntos_crupier;
            $puntajeUsuario->puntos_ganados += $request->puntos_ganados;
            $puntajeUsuario->save();
        } else {
            // Si el usuario no tiene un puntaje, crear uno nuevo
            $data = $request->all();
            $data["id_usuario"] = $usuarioId;
            PuntajesModel::create($data);
        }

        $respuesta["ESTATUS"] = "SUCCESS";
    } catch (\Throwable $th) {
        $respuesta["ESTATUS"] = "FAIL";
        $respuesta["MENSAJE"] = "OCURRIO UN ERROR AL GUARDAR EL PUNTAJE DEL JUGADOR";
        $respuesta["ERROR"] = $th->getMessage();
    }

    return response()->json($respuesta);
}

public function showPuntaje() {
    // Obtener todos los puntajes más altos, ordenados de mayor a menor
    $puntajes = PuntajesModel::with('usuario')
                ->orderBy('puntos_ganados', 'desc')
                ->get();

    // Obtener el puntaje del usuario actual
    $puntajeUsuario = PuntajesModel::where('id_usuario', Auth::id())->first();

    // Pasar los puntajes y el puntaje del usuario a la vista
    return view('player.puntajes', compact('puntajes', 'puntajeUsuario'));
}


}
