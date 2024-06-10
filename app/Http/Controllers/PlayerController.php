<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PuntajesModel;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    public function showMenu()
    {
        return view('player.menu');
    }

    public function showGame()
    {
        $user = Auth::user();
        $gamesPlayed = $user->games_played;
        $puntaje = PuntajesModel::where('id_usuario', $user->id)->first();
    
        return view('player.game', compact('gamesPlayed', 'puntaje'));
        
    }


    public function handleGameRequest(Request $request)
{
    $user = Auth::user();
    $gamesPlayed = $user->games_played;

    if ($gamesPlayed >= 5) {
        return response()->json(['message' => 'Ya has alcanzado el límite de intentos.']);
    }

    // Procesar la solicitud de juego aquí

    // Incrementar el contador de juegos jugados
    $user->games_played++;
    $user->save();

    // Retornar la respuesta adecuada al cliente
    return response()->json(['message' => 'Solicitud de juego procesada correctamente.']);
}
  





}

