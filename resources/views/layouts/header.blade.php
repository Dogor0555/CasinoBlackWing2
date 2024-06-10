<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
 
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <!-- Switch mode bg -->
    <li class="nav-item">
      <a class="nav-link mode-bg" role="button">
        <i class="fas fa-sun"></i>
      </a>
    </li>
    <!-- ./Switch mode bg -->
    <!--<li class="nav-item" description="">
      <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li>-->
  </ul>

  <div class="user-panel d-flex mr-2">
    <div class="info text-uppercase d-none d-md-block">
        <a href="#" class="d-block">{{Auth::user()->name}} {{Auth::user()->last_name}}</a>
    </div>
    <div style="width: 2.2rem; height: 2.2rem;" class="ml-2 pb-1">
        <img src="{{url('public/user-profile/' . Auth::user()->user_photo)}}" class="img-circle elevation-2 rounded-circle" alt="User Image" style="width: 100%; height: 100%; object-fit: contain;">
    </div>
 </div>


  

</nav>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  $(document).ready(function() {
    // Espera a que el documento esté listo

    // Encuentra el enlace con la clase "mode-bg"
    $(".mode-bg").on("click", function() {
      // Alternar la clase "dark-mode" en el cuerpo
      $("body").toggleClass("dark-mode");

      // Guardar el estado del modo oscuro en localStorage
      localStorage.setItem("darkMode", $("body").hasClass("dark-mode"));

      // Alternar el icono entre el sol y la luna
      if ($("body").hasClass("dark-mode")) {
        $(".mode-bg i").removeClass("fa-sun").addClass("fa-moon");
      } else {
        $(".mode-bg i").removeClass("fa-moon").addClass("fa-sun");
      }
    });

    // Restaurar el estado del modo oscuro al cargar la página
    var darkMode = localStorage.getItem("darkMode");
    if (darkMode === "true") {
      $("body").addClass("dark-mode");
      $(".mode-bg i").removeClass("fa-sun").addClass("fa-moon");
    }
  });
</script>

  