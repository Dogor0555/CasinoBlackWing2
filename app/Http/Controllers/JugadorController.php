<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jugador;
use Illuminate\Support\Facades\Hash;

class JugadorController extends Controller
{


    public function showMenu()
    {
        return view('admin.menu');
    }

    public function list(Request $request)
    {
        $search = $request->query('search');
    
        $data['getRecord'] = Jugador::where('user_type', 3)
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('last_name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            })
            ->get(); // Cambiado a get() para obtener todos los registros sin paginación
    
        $data["header_title"] = "Player List";
        return view("admin.players.list", $data);
    }
    


    public function add(){
        
        $data["header_title" ] = "Add New Player";
        return view("admin.players.add", $data);
    }

    public function insert(Request $request)
    {
        // **Adición de validaciones para los campos 'name', 'last_name', 'email', 'password', 'password_confirmation' y 'user_photo'**
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|confirmed',
            'user_photo' => 'nullable|file|image|max:2048',
            'games_played' => 'required|int'
        ]);
    
        // Verificar si el correo electrónico ya está registrado en la base de datos
        if (Jugador::where('email', $request->email)->exists()) {
            return redirect()->back()->with("errorMessage", "El correo electrónico ya está registrado en el sistema. Por favor, utiliza otro correo electrónico.");
        }
    
        $user = new Jugador();
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->games_played = trim($request->games_played);
        $user->user_type = 3;
    
        // **Agregar la lógica para manejar la foto del usuario**
    
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
    
            // Asignar el nombre de la imagen al campo 'user_photo'
            $user->user_photo = $imageName;
        } else {
            // Si no se proporciona una imagen, asignar un valor predeterminado
            $user->user_photo = 'default.jpg';
        }
    
        // **Guardar el nuevo usuario**
        $user->save();
    
        return redirect("admin/players/list")->with("welcomeMessage", "Jugador creado correctamente.");
    }    


    public function edit($id){
        $data['getRecord'] = Jugador::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = "Edit Admin";
            return view("admin.players.edit", $data);
        }else{
            abort(404);
        }
    }
   
    public function update($id, Request $request)
    {
        $user = Jugador::getSingle($id);
    
        if (empty($user)) {
            abort(404);
        }
    
        // Validación de los campos 'name' y 'user_photo'
        $request->validate([
            'name' => 'required|string|max:255',
            'user_photo' => 'nullable|file|image|max:2048'
        ]);
    
        // Verificación de la existencia del correo electrónico en la base de datos
        $existingUser = Jugador::where('email', $request->email)->first();
    
        if ($existingUser && $existingUser->id !== $user->id) {
            return redirect()->back()->with("errorMessage", "El correo electrónico ya está registrado en el sistema. Por favor, utiliza otro correo electrónico.");
        } else
        {
            $user->email = trim($request->email);
        }
    
        // Actualización de campos de nombre, apellido e Intentos que Lleva el jugador
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->games_played = trim($request->games_played);
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
            //$imageName = $user->name . '_' . $currentDateTime . '.' . $imageFile->getClientOriginalExtension();
            $extension = pathinfo($imageFile->getClientOriginalName(), PATHINFO_EXTENSION);
            $imageName = $user->name . '_' . $currentDateTime . '.' . $extension;
    
            // Almacenar la imagen en el directorio 'public/user-profile'
            $imageFile->storeAs('user-profile', $imageName, 'public');
    
            // Actualizar el campo 'user_photo' en el modelo
            $user->user_photo = $imageName;
        }
    
        $user->updated_at = now();
    
        // Guardar el usuario actualizado
        $user->save();
    
        return redirect("admin/players/list")->with("welcomeMessage", "Jugador modificado correctamente.");
    }    

    public function delete($id){
        $user = Jugador::getSingle($id);
        $user->is_delete = 1;
        $user->save();
 
        return redirect("admin/players/list")->with("welcomeMessage","Jugador eliminado correctamente.");

     }

}