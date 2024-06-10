<aside class="main-sidebar sidebar-dark-primary">
  <!-- Brand Logo -->
  <a href="#" class="brand-link text-white pt-3 d-flex align-items-center">
    <img src="{{url('public/images/logo-uso.svg')}}" alt="Logo" class="text-white pl-2" style="width: 3rem;">
    <span class="brand-text font-weight-bold" style="font-size: 2.5rem;">AEFI</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        @if(Auth::user()->user_type == 1)
        <li class="nav-item">
          <a href="{{url('admin/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('admin/admin/list')}}" class="nav-link @if(Request::segment(2) == 'admin') active @endif">
            <i class="nav-icon far fa-user"></i>
            <p>Admin</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{url('admin/class/list')}}" class="nav-link @if(Request::segment(2) == 'class') active @endif">
            <i class="nav-icon far fa-user"></i>
            <p>Clases</p>
          </a>
        </li>
        @elseif(Auth::user()->user_type == 2)
        <li class="nav-item">
          <a href="{{url('teacher/dashboard')}}" class="nav-link  @if(Request::segment(2) == 'dashboard') active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <!-- Otras secciones específicas para maestros -->

        @elseif(Auth::user()->user_type == 3)
        <li class="nav-item">
          <a href="{{url('student/dashboard')}}" class="nav-link  @if(Request::segment(2) == 'dashboard') active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <!-- Otras secciones específicas para estudiantes -->

        @elseif(Auth::user()->user_type == 4)
        <li class="nav-item">
          <a href="{{url('parent/dashboard')}}" class="nav-link  @if(Request::segment(2) == 'dashboard') active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <!-- Otras secciones específicas para padres -->

        @endif

        <li class="nav-item">
          <a href="{{url('logout')}}" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Cerrar Sesión</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>