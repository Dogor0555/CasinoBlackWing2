<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="icon" href="{{ url('public/images/LOGOCA.jpeg') }}" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ !empty($header_title) ? $header_title : '' }} - Casino Black Wing</title>
  <link href="https://fonts.googleapis.com/css?family=Calisto+MT|Brush+Script+MT" rel="stylesheet">
  <title>Black Jack - Puntajes</title>
  <style>
    body {
        font-family: Arial, sans-serif;
        background-image: linear-gradient(to bottom, #FFD700, #708090);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        color: #fff;
    }
    .container {
        max-width: 768px;
        width: 100%;
        margin: 0 auto;
        background-color: #1c1c1c;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        border-radius: 12px;
        overflow: hidden;
        border: 2px solid #e2b04a;
    }
    .header {
        display: flex;
        font-size: 25px;
        justify-content: space-between;
        align-items: center;
        padding: 16px;
        background-color: #3f3f3f;
        color: #e2b04a;
        border-bottom: 2px solid #e2b04a;
        font-weight: bold;
    }
    .header h2 {
        margin: 0;
        font-size: 24px;
    }
    .header img {
        height: 40px;
        width: 40px;
        border-radius: 50%;
    }
    .table-container {
        overflow-y: auto;
        max-height: 400px; /* Ajusta esta altura según sea necesario */
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    thead {
        background-color: #e2b04a;
        color: #000;
    }
    th, td {
        padding: 12px;
        text-align: left;
    }
    tbody tr:nth-child(odd) {
        background-color: #333;
    }
    tbody tr:nth-child(even) {
        background-color: #444;
    }
    tbody tr:hover {
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
    }
    .boton_regresar:hover {
        background-color: #d4a03b;
    }
    .boton_regresar:active {
        background-color: #b88632;
    }
    .user-score {
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
  <div class="container">
    <div class="header">
      <a href="{{ url('player/menu') }}" class="boton_regresar">Regresar</a>
      <a class="user-name">{{ Auth::user()->name }} {{ Auth::user()->last_name }} (Tú)</a>
      @if ($puntajeUsuario)
        <span class="user-score">SCORE: {{ $puntajeUsuario->puntos_ganados }}</span>
      @endif
      <img src="{{ url('public/user-profile/' . Auth::user()->user_photo) }}" class="img-circle elevation-2 rounded-circle" alt="User Image">
    </div>
    <div class="table-container">
  <table id="tablaPuntajes">
    <thead>
      <tr>
        <th>TOP</th>
        <th>Usuario</th>
        <th>Puntos ganados</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($puntajes as $index => $puntaje)
        @if($puntaje->usuario)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $puntaje->usuario->name }} {{ $puntaje->usuario->last_name }}</td>
            <td>{{ $puntaje->puntos_ganados }}</td>
          </tr>
        @endif
      @endforeach
    </tbody>
  </table>
</div>
  </div>

  <script src="{{ url('public/plugins/jquery/jquery.min.js') }}"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
  <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
  <script type="text/javascript" src="{{ asset('public/dist/js/blackJack.js') }}"></script>
  <input type="hidden" id="rutaimagescarta" value="{{ asset('public') }}">
  <input type="hidden" value="{{ route('guardarPuntaje') }}" id="rutaGuardarPuntaje" />
  <input type="hidden" value="{{ csrf_token() }}" id="_token" />
  <script type="text/javascript">
    let table = new DataTable('#tablaPuntajes', {
      "order": [[2, "desc"]],
      "paging": false, // Disable pagination
      "language": {
        "search": "Buscar:",
        "lengthMenu": "Mostrar _MENU_ entradas por página",
        "info": "Mostrando _TOTAL_ entradas",
        "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
        "infoFiltered": "(filtrado de _MAX_ entradas totales)",
        "paginate": {
          "first": "Primero",
          "last": "Último",
          "next": "Siguiente",
          "previous": "Anterior"
        },
        "zeroRecords": "No se encontraron registros coincidentes",
        "emptyTable": "No hay datos disponibles en la tabla",
        "loadingRecords": "Cargando...",
        "processing": "Procesando..."
      }
    });
  </script>
</body>
</html>
