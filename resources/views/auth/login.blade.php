<!DOCTYPE html>
<html lang="en">
<head>
   <meta name="_globalsign-domain-verification" content="8wahjSopoiSos6fNrGZqw-DenhhnjULzs5vANFXa3a" /> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Casino BLACKWING</title>
  <link rel="icon" href="{{url('public/images/LOGOCA.jpeg')}}" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url ('public/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ url ('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url ('public/dist/css/adminlte.min.css')}}">
  <style>
    body {
      background-image: url('{{ url("public/images/FONDOcA.jpeg") }}'); /* Añade la imagen de fondo */
      background-size: cover; /* Ajusta el tamaño de la imagen de fondo */
      background-position: center; /* Centra la imagen de fondo */
      background-repeat: no-repeat; /* Evita que la imagen de fondo se repita */
    }
    .login-box,
    .card {
      border-radius: 20px; /* Ajusta el radio según tus preferencias */
      backdrop-filter: blur(16px) saturate(180%);
      -webkit-backdrop-filter: blur(16px) saturate(180%);
      background-color: rgba(255, 255, 255, 0.32);
      border-radius: 12px;
      border: 1px solid rgba(209, 213, 219, 0.3);
    }

    .login-box .card-body {
      
      flex-direction: column;
      
    }

    .login-box .input-group {
      width: 100%;
    }

    .login-box .row {
      width: 100%;
    }

    .login-box .row .col-6 {
      padding: 0;
    }

    .login-box .row .col-6 a {
      display: block;
      text-align: right;
      white-space: nowrap;
      width: 100%;
    }

    @media (max-width: 768px) {
      body {
        background-size: auto; /* Cambia el tamaño de la imagen de fondo a automático */
      }
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
  <div class="card-header text-center">
      <img class="img-fluid img-thumbnail" src="{{ url ('public/images/LogoFondoOscuro.png')}}" alt="">
  </div>
    <div class="card-body">
      <p class="login-box-msg">Iniciar Sesión</p>

      @include('_message')

      <form action="{{ url('login')}}" method="post">
        {{ csrf_field()}}
        <div class="input-group mb-3">
          <input type="email" class="form-control" required name="email" placeholder="Correo institucional">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" required name="password" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6 text-left">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember">
              <label for="remember">
                Recuerdame
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-6 text-right">
            <button type="submit" class="btn btn-primary" style="background-color: black; color: white;">Iniciar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="row pt-2">
          <div class="col-6 text-left">
            <a href="{{url('forgot-password')}}">Olvidé mi contraseña</a>
          </div> 
          <div class="col-6 text-right">
            <a href="{{ url('signup') }}">Registrate</a>
          </div>
      </div>
     
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ url ('public/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url ('public/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ url ('public/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
