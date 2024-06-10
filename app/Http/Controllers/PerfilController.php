<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\PuntajesModel;
use Illuminate\Support\Facades\Storage;

class PerfilController extends Controller
{
    public function update($id, Request $request)
{
    $user = User::findOrFail($id);

    // Validación de los campos 'name' y 'user_photo'
    $request->validate([
        'name' => 'required|string|max:255',
        'user_photo' => 'nullable|file|image|max:2048'
    ]);

    // Verificación de la existencia del correo electrónico en la base de datos
    $existingUser = User::where('email', $request->email)->where('id', '!=', $user->id)->first();

    if ($existingUser) {
        return redirect()->back()->with("errorMessage", "El correo electrónico ya está registrado en el sistema. Por favor, utiliza otro correo electrónico.");
    }

    // Actualización de campos de nombre, apellido y correo electrónico
    $user->name = trim($request->name);
    $user->last_name = trim($request->last_name);
    $user->email = trim($request->email);

    // Verificación de nueva contraseña
    if (!empty($request->new_password)) {
        if (Hash::check($request->current_password, $user->password)) {
            if ($request->new_password === $request->new_password_confirmation) {
                $user->password = Hash::make($request->new_password);
            } else {
                return redirect()->back()->with("errorMessage", "Las contraseñas a confirmar no coinciden.");
            }
        } else {
            return redirect()->back()->with("errorMessage", "La contraseña actual no es válida.");
        }
    }

    // Actualización de la foto del usuario
    if ($request->hasFile('user_photo')) {
        $imageFile = $request->file('user_photo');

        // Obtener la fecha y hora actuales para agregar al nombre del archivo
        $currentDateTime = now()->format('YmdHis');

        // Construir el nombre de la imagen con la fecha y hora
       // $imageName = $user->name . '_' . $currentDateTime . '.' . $imageFile->getClientOriginalExtension();
        $extension = pathinfo($imageFile->getClientOriginalName(), PATHINFO_EXTENSION);
        $imageName = $user->name . '_' . $currentDateTime . '.' . $extension;


        // Almacenar la imagen en el directorio 'public/user-profile'
        $imageFile->storeAs('user-profile', $imageName, 'public');

        // Borrar la foto anterior del usuario si existe
        if ($user->user_photo) {
            Storage::disk('public')->delete('user-profile/' . $user->user_photo);
        }

        // Actualizar el campo 'user_photo' en el modelo
        $user->user_photo = $imageName;
    }

    $user->updated_at = now();

    // Guardar el usuario actualizado
    $user->save();

    // Recargar la página actual
    return redirect()->back()->with("successMessage", "Perfil actualizado correctamente.");
   }

    public function showPerfil()
    {
       
        $user = Auth::user();
        $puntaje = PuntajesModel::where('id_usuario', $user->id)->first();
    
        return view('player.perfil', compact('user', 'puntaje'));
    }
}
