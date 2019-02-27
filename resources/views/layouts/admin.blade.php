<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SEDES CRUED</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/my_css.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('images/iconoTaller.png')}}">

  </head>
  <body class="hold-transition skin-green sidebar-mini" id="mynav">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="{{url('dashboard')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>S</b>E</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>S.E.</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{asset('images/iconoTaller.png')}}" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->

                  <li class="user-header">
                    <img src="{{asset('images/iconoTaller.png')}}" class="img-circle" alt="User Image">
                    <p>
                      Usuario(a): {{ Auth::user()->name }}
                      <small>SEDES - CRUED</small>
                      <small>TIPO - {{ Auth::user()->tipo }}</small>
                    </p>
                  </li>

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="" class="btn btn-default btn-flat">Cerrar</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Cerrar Secion</a>
                      
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                    </div>
                  </li>
                </ul>
              </li>

            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>

              <!-- <li class="treeview">
                <a href="#">
                  <i class="fa fa-list-alt"></i>
                  <span>Adm. Centros Medicos</span>
                   <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{url('adm/centro')}}"><i class="fa fa-circle-o"></i>Gestionar Centro Medico</a></li>
                  <li><a href="{{url('adm/nivel')}}"><i class="fa fa-circle-o"></i>Gestionar Nivel</a></li>
                  <li><a href="{{url('adm/zona')}}"><i class="fa fa-circle-o"></i>Gestionar Zona</a></li>
                  <li><a href="{{url('adm/especialidad')}}"><i class="fa fa-circle-o"></i>Gestionar Especialidad</a></li>
                  <li><a href="{{url('adm/red')}}"><i class="fa fa-circle-o"></i>Gestionar Red</a></li>
                  <li><a href="{{url('adm/servicio')}}"><i class="fa fa-circle-o"></i>Gestionar Tipo de Servicio</a></li>
                  <li><a href="{{url('adm/medico')}}"><i class="fa fa-circle-o"></i>Gestionar Medicos</a></li>
                </ul>
              </li> -->

              <li>
                <a href="{{url('adm/centro')}}">
                  <i class="fa fa-hospital-o"></i> <span>CENTROS MEDICOS</span>
                  <i class="fa fa-angle-right pull-right"></i>
                </a>
              </li>

              <li>
                <a href="{{url('adm/nivel')}}">
                  <i class="fa fa-list-ul"></i> <span>NIVELES</span>
                  <i class="fa fa-angle-right pull-right"></i>
                </a>
              </li>

              <li>
                <a href="{{url('adm/zona')}}">
                  <i class="fa fa-dot-circle-o"></i> <span>ZONAS</span>
                  <i class="fa fa-angle-right pull-right"></i>
                </a>
              </li>

              <li>
                <a href="{{url('adm/especialidad')}}">
                  <i class="fa fa-heartbeat"></i> <span>ESPECIALIDADES</span>
                  <i class="fa fa-angle-right pull-right"></i>
                </a>
              </li>

              <li>
                <a href="{{url('adm/red')}}">
                  <i class="fa fa-university"></i> <span>REDES</span>
                  <i class="fa fa-angle-right pull-right"></i>
                </a>
              </li>

              <li>
                <a href="{{url('adm/servicio')}}">
                  <i class="fa fa-plus-square"></i> <span>SERVICIOS</span>
                  <i class="fa fa-angle-right pull-right"></i>
                </a>
              </li>

              <li>
                <a href="{{url('adm/medico')}}">
                  <i class="fa fa-user-plus"></i> <span>MEDICOS</span>
                  <i class="fa fa-angle-right pull-right"></i>
                </a>
              </li>

              <li>
                <a href="{{url('adm/usuario')}}">
                  <i class="fa fa-user"></i> <span>USUARIOS</span>
                  <i class="fa fa-angle-right pull-right"></i>
                </a>
              </li>
              <!-- <li class="treeview">
                <a href="#">
                  <i class="fa fa-list-alt"></i>
                  <span>Adm. Sistemas Expertos</span>
                   <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{url('adm/enfermedad')}}"><i class="fa fa-circle-o"></i>Gestionar Enfermedadad</a></li>
                  <li><a href="{{url('adm/sintoma')}}"><i class="fa fa-circle-o"></i>Gestionar Sintoma</a></li>
                </ul>
              </li> -->

            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-green">S.E.</small>
              </a>
            </li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">

                
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
		                          <!--Contenido-->
                              	@yield('contenido')
		                          <!--Fin Contenido-->
                           </div>
                        </div>

                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2018 <a href="#">Taller De Grado</a>.</strong> All rights reserved.
      </footer>


    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <script type="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    @stack('scripts')
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>

  </body>
</html>
