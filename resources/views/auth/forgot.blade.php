<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CASINO BLACKWING - Recuperar contraseña</title>
  <link rel="icon" href="{{ url('public/images/LOGOCA.jpeg') }}" type="image/x-icon">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ url('public/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ url('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ url('public/dist/css/adminlte.min.css') }}">
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
  </style>
</head>
<body class="hold-transition login-page $enable-gradients.aqua-gradient">
  <div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <img class="img-fluid img-thumbnail" src="{{ url('public/images/LogoFondoOscuro.png') }}" alt="">
      </div>

      <!-- Nota de recuperación de contraseña -->
      <div class="alert m-3 p-2 text-justify" style="color: black; background-color: rgba(100, 149, 237, 0.6);">
        Ingresa el correo para recuperar contraseña. En caso de no recibir el correo, verifica en spam y asegúrate de proporcionar el correo correcto.
      </div>

      <div class="card-body">
        <p class="login-box-msg">Recuperar contraseña</p>

        @include('_message')

        <form action="" method="post">
          {{ csrf_field() }}
          <div class="input-group mb-3">
            <input type="email" class="form-control" required name="email" placeholder="Correo institucional">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>

          <div style="display:flex; align-items: center; align-content:center;">
            <div class="col-6">
              <button type="submit" class="btn btn-primary btn-block">Enviar</button>
            </div>
            <div class="col-6">
              <a href="{{ url('') }}" type="button" class="btn btn-secondary btn-block">Iniciar Sesión</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="{{ url('public/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ url('public/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ url('public/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
