<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="icon" href="{{url('public/images/LOGOCA.jpeg')}}" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{!empty($header_title) ? $header_title : ''}} - Casino Black Wing</title>
  <link rel="stylesheet" href="{{ asset('public/dist/css/menu.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Calisto+MT|Brush+Script+MT" rel="stylesheet">
  <title>Black Jack - ADMIN</title>
</head>
<body>
  <div class="navbar">
    <div class="profile">
      <img src="{{url('public/user-profile/' . Auth::user()->user_photo)}}" class="img-circle elevation-2 rounded-circle" alt="User Image">
      <a href="{{url('admin/perfil')}}" class="user-name">{{Auth::user()->name}} {{Auth::user()->last_name}}</a>
    </div>
    <a href="{{url('logout')}}" class="logout-button">Cerrar Sesión</a>
  </div>

  <div class="menu">
    
    <div class="menu-item">
      <a href="{{url('admin/admin/list')}}" class="nav-link @if(Request::segment(2) == 'player') active @endif">
        <i class="nav-icon far fa-user"></i>
       Usuarios Administradores
      </a>
    </div>
    <div class="menu-item">
    <a href="{{url('admin/players/list')}}" class="nav-link @if(Request::segment(2) == 'player') active @endif">
        <i class="nav-icon far fa-user"></i>
        Administrar Jugadores
      </a>
    </div>
  </div>
</body>
</html>
