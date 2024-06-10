<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Editor</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-wR9n8vhQ/j9SkzLPcANHjRVNJ0k9Lv9zkzt6nkvyxxKpsU3Z8Q1G3MlXDNNwdosz4mM+U0dMw4T+CpeUx9M62A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body,
    h1,
    input,
    button {
      font-weight: 700;
    }

    body {
      margin: 0;
      font-family: 'Montserrat', sans-serif;
      background-image: linear-gradient(to bottom, #FFD700, #708090);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .profile-editor {
      position: relative;
      background-color: #333;
      padding: 25px;
      border-radius: 20px;
      max-width: 400px;
      width: 100%;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .title {
      text-align: center;
      margin-bottom: 30px;
      font-size: 24px;
      color: #FFD700;
    }

    .profile-picture {
      width: 150px;
      height: 150px;
      border: 4px solid #FFD700;
      border-radius: 50%;
      overflow: hidden;
      margin: 0 auto 20px;
    }

    .profile-picture img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .puntaje {
      text-align: center;
      color: #FFD700;
      margin-bottom: 20px;
      font-size: 24px;
      font-weight: bold;
      animation: shine 2s infinite;
    }

    @keyframes shine {
      0% {
        text-shadow: 0 0 10px #FFD700, 0 0 20px #FFD700, 0 0 30px #FFD700;
        transform: scale(1);
      }
      50% {
        text-shadow: 0 0 20px #FFD700, 0 0 30px #FFA500, 0 0 40px #FFA500;
        transform: scale(1.1);
      }
      100% {
        text-shadow: 0 0 10px #FFD700, 0 0 20px #FFD700, 0 0 30px #FFD700;
        transform: scale(1);
      }
    }

    input {
      width: calc(100% - 20px);
      padding: 12px;
      margin-bottom: 20px;
      border: none;
      border-radius: 8px;
      border-bottom: 2px solid #FFD700;
      font-family: 'Montserrat', sans-serif;
      outline: none;
      background-color: #333;
      color: #FFF;
    }

    .buttons {
      display: flex;
      justify-content: space-between;
    }

    button {
      padding: 12px 24px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-family: 'Montserrat', sans-serif;
    }

    .save-changes {
      background-color: #FFD700;
      color: white;
    }

    .cancel {
      background-color: #708090;
      color: white;
    }

    .exit-button {
      position: absolute;
      top: 10px;
      left: 10px;
      background-color: #708090;
      color: white;
      padding: 8px;
      border: none;
      border-radius: 50%;
      cursor: pointer;
    }

    .exit-button i {
      font-size: 18px;
    }

    .exit-button:hover {
      background-color: #555;
    }

    .boton_regresar {
      background-color: #e2b04a;
      color: #fff;
      text-decoration: none;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      border-radius: 5px;
      transition: background-color 0.3s;
      font-weight: bold;
      font-family: 'Montserrat', sans-serif;
    }

    .boton_regresar:hover {
      background-color: #d4a03b;
    }

    .boton_regresar:active {
      background-color: #b88632;
    }
  </style>
</head>
<body>
<div class="container">
    <div class="profile-editor">
      <a href="{{ url('admin/players/list') }}" class="boton_regresar">&#10094;</a>
      <h1 class="title">Agregar Nuevo Jugador</h1>
     
      <form method="post" action="{{ route('admin.players.add') }}" enctype="multipart/form-data">
        @csrf
        <input type="file" name="user_photo">
        <input type="text" name="name" required placeholder="Introduzca el nombre">
        <input type="text" name="last_name" required placeholder="Introduzca los apellidos">
        <input type="email" name="email" required placeholder="Introduzca el correo">
        <input type="password" name="password" required placeholder="Introduzca la contraseña">
        <input type="password" name="password_confirmation" required placeholder="Confirme la contraseña">
        
        <div class="buttons">
          <button type="submit" class="save-changes">Guardar</button>
          <button type="button" class="cancel" onclick="limpiarForm()">Limpiar</button>
        </div>
      </form>
    </div>
  </div>
  <script>
    function limpiarForm() {
      const form = document.getElementById('profile-form');
      form.querySelector('input[name="user_photo"]').value = '';
      form.querySelector('input[name="name"]').value = '';
      form.querySelector('input[name="last_name"]').value = '';
      form.querySelector('input[name="email"]').value = '';
      form.querySelector('input[name="current_password"]').value = '';
      form.querySelector('input[name="new_password"]').value = '';
      form.querySelector('input[name="new_password_confirmation"]').value = '';
    }
  
    
  </script>

</body>
</html>

