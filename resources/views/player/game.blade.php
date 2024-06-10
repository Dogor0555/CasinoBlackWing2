<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{url('public/images/LOGOCA.jpeg')}}" type="image/x-icon">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{!empty($header_title) ? $header_title : ''}} - Casino Black Wing</title>
  <link rel="stylesheet" href="{{ asset('public/dist/css/style.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Calisto+MT|Brush+Script+MT" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>Black Jack</title>
  <style>
  .attempts-info {
  display: flex;
  align-items: center;
  color: #e2b04a; /* Same color as other elements */
}
.attempts-info img {
  width: 20px; /* Adjust the size as needed */
  height: 20px;
  margin-left: 5px; /* Space between text and image */
}


.limit-message {
  background-color: #ffcccc; /* Color de fondo */
  color: #ff0000; /* Color del texto */
  border: 1px solid #ff0000; /* Borde rojo */
  padding: 10px; /* Espaciado interno */
  margin-top: 20px; /* Margen superior */
  font-size: 16px; /* Tamaño de fuente */
  text-align: center; /* Alineación del texto */
  font-weight: bold; /* Negrita */
  border-radius: 5px; /* Bordes redondeados */
}

.puntaje {
  text-align: center;
  color: #FFD700;
  
  
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
</style>
</head>

<body>  
    <nav class="navbar">
        <div class="nav-button">
          <a href="{{ url('player/menu') }}" class="boton_regresar">&#10094;</a>
        </div>
        <div class="logo-container">
            <a alt="21 Black Jack" class="logo">21 - BLACKJACK</a>
        </div>
        <div class="attempts-info">
        <img src="{{url('public/images/medalla-de-oro.png')}}" alt="Medalla de Oro">    
         {{max(0, 4 - Auth::user()->games_played) }}
            
        </div>
        <div class="puntaje">
        @if ($puntaje)
          <p>SCORE: {{ $puntaje->puntos_ganados }}</p>
        @else
          <p>Aún no has jugado ninguna partida.</p>
        @endif
      </div>
        <div class="user-info">
            <img src="{{url('public/user-profile/' . Auth::user()->user_photo)}}" alt="User" class="user-avatar">
            <span class="username">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</span>
        </div>
    </nav>
 
 
 <div id="as-message-container" class="hidden"></div>
 <div id="canvasDiv"><canvas id="canvas"></canvas></div>
<div class="botones">
  <input type="button" value="Pedir Carta" onclick="pedirCarta()" id="pedir" class="action-button">
  <input type="button" value="Jugar otra vez!" id="reset" onclick="playagain()" class="action-button">
  <input type="button" value="Quedarme aquí" onclick="plantarme()" id="plantar" class="action-button">
</div>

<div id="info" class="hidden"></div>
<div id="infor"></div>

    <script src="{{url('public/plugins/jquery/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script type="text/javascript" src="{{ asset('public/dist/js/blackJack.js') }}"></script>
    <input type="hidden" id="rutaimagescarta" value="{{ asset('public') }}">
    <input type="hidden" value="{{route("guardarPuntaje")}}" id="rutaGuardarPuntaje"/>
    <input type="hidden" value="{{csrf_token()}}" id="_token"/>
    <script type="text/javascript">
      let table = new DataTable('#tablaPuntajes');

      var gamesPlayed = {{ $gamesPlayed }};
        var maxGames = 5;

        if (gamesPlayed >= maxGames) {
            // Crear el mensaje
            var limitMessage = document.createElement('div');
            limitMessage.classList.add('limit-message');
            limitMessage.textContent = '¡Ya has superado tu límite de intentos!';

            // Obtener el contenedor donde se mostrará el mensaje
            var limitMessageContainer = document.getElementById('infor');

            // Insertar el mensaje dentro del contenedor
            limitMessageContainer.appendChild(limitMessage);
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Obtener el número de intentos del usuario desde el servidor
            var gamesPlayed = <?php echo Auth::user()->games_played; ?>;

            // Obtener referencias a los botones relevantes
            var pedirCartaButton = document.getElementById('pedir');
            var jugarOtraVezButton = document.getElementById('reset');
            var plantarButton = document.getElementById('plantar');

            // Verificar si se alcanzó el límite de intentos y desactivar los botones si es necesario
            if (gamesPlayed >= 5) {
                pedirCartaButton.disabled = true;
                jugarOtraVezButton.disabled = true;
                plantarButton.disabled = true;
            }
        });
    </script>
</body>
</html>