@if (Auth::check())
  @role('Admin')
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="{{ backpack_avatar_url(Auth::user()) }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <small><small><a href="{{ route('backpack.account.info') }}"><span><i class="fa fa-user-circle-o"></i> {{ trans('backpack::base.my_account') }}</span></a> &nbsp;  &nbsp; <a href="{{ backpack_url('logout') }}"><i class="fa fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span></a></small></small>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          {{-- <li class="header">{{ trans('backpack::base.administration') }}</li> --}}
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
          <!-- <li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li> -->
          
          <!-- Links del torneo Seleccionado -->
          <li class="treeview">
            <a href="#">
              <i class="fa fa-trophy"></i>
              <span>Torneo</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">Nuevo!</small>
              </span>
            </a>
            <ul class="treeview-menu">
              <!-- Gimnastas-->
              @if (App\Models\Gimnasta::count() == 0)
              <li><a href="{{ route('crud.gimnasta.create') }}"><i class="fa fa-female"></i> <span>Gimnastas</span></a></li>
              @else
              <li><a href="{{ backpack_url('gimnasta') }}"><i class="fa fa-female"></i> <span>Gimnastas</span></a></li>
              @endif
              <!-- Calificaciones-->
              <li><a href="{{ backpack_url('calificacion') }}"><i class="fa fa-check"></i> <span>Calificaciones capturadas</span></a></li>
              <!-- Gimnasios-->
              @if (App\Models\Gimnasio::count() == 0)
              <li><a href="{{ route('crud.gimnasio.create') }}"><i class="fa fa-home"></i> <span>Gimnacios</span></a></li>
              @else
              <li><a href="{{ backpack_url('gimnasio') }}"><i class="fa fa-home"></i> <span>Gimnacios</span></a></li>
              @endif
              <!-- Ciudades-->
              <li><a href="{{ backpack_url('ciudad') }}"><i class="fa fa-globe"></i> <span>Ciudades</span></a></li>
              <!-- Jueces-->
              @if (App\Models\Gimnasio::count() == 0)
              <li><a href="{{ route('crud.juez.create') }}"><i class="fa fa-pencil-square-o"></i> <span>Jueces</span></a></li>
              @else
              <li><a href="{{ backpack_url('juez') }}"><i class="fa fa-pencil-square-o"></i> <span>Jueces</span></a></li>
              @endif
              <!-- Mesas de Juicio-->
              <li><a href="{{ backpack_url('mesa') }}"><i class="fa fa-table"></i> <span>Mesas de Juicio</span></a></li>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-pie-chart"></i>
                  <span>Reportes</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{ route('resultados.form') }}"><i class="fa fa-trophy"></i> <span>Resultados</span></a></li>
                  <li><a href="/monitor"><i class="fa fa-desktop"></i> <span>Monitor All Around</span></a></li>
                </ul>
              </li>
              
              <li><a href="{{ backpack_url('torneo') }}"><i class="fa fa-wrench"></i> <span>Otros torneos</span></a></li>
              <!--
              <li>
                  <a href="{{ route('torneo.select') }}">
                    <i class="fa fa-exchange"></i>
                    <span>Cambiar Torneo</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-orange">CAMBIO!</small>
                    </span>
                  </a>
              </li>
              -->
              
            </ul>
          </li>
          
          <!-- Control de Usuarios -->          
          <li class="treeview">
            <a href="#">
              <i class="fa fa-user"></i>
              <span>Control de Usuarios</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ backpack_url('capturista') }}"><i class="fa fa-laptop"></i> <span>Capturistas</span></a></li>
              <li><a href="{{ backpack_url('user') }}"><i class="fa fa-user"></i> <span>Usuarios</span></a></li>
              <li><a href="{{ backpack_url('role') }}"><i class="fa fa-group"></i> <span>Roles</span></a></li>
              <li><a href="{{ backpack_url('permission') }}"><i class="fa fa-key"></i> <span>Permisos</span></a></li>
            </ul>
          </li>
          <!--/ Fin de control de usuarios -->

          <!-- Links de todos los torneos
          <li class="treeview">
            <a href="#">
              <i class="fa fa-globe"></i>
              <span> Todos los torneos </span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">Nuevo!</small>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ backpack_url('torneo') }}"><i class="fa fa-trophy"></i> <span>Torneos</span></a></li>
              <li><a href="{{ backpack_url('gimnasta') }}"><i class="fa fa-female"></i> <span>Gimnastas</span></a></li>
              <li><a href="{{ backpack_url('calificacion') }}"><i class="fa fa-check"></i> <span>Calificaciones capturadas</span></a></li>
              <li><a href="{{ backpack_url('gimnasio') }}"><i class="fa fa-home"></i> <span>Gimnacios</span></a></li>
              <li><a href="{{ backpack_url('ciudad') }}"><i class="fa fa-globe"></i> <span>Ciudades</span></a></li>
              <li><a href="{{ backpack_url('juez') }}"><i class="fa fa-pencil-square-o"></i> <span>Jueces</span></a></li>
              <li><a href="{{ backpack_url('mesa') }}"><i class="fa fa-table"></i> <span>Mesas de Juicio</span></a></li>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-pie-chart"></i>
                  <span>Reportes</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{ route('resultados.form') }}"><i class="fa fa-trophy"></i> <span>Resultados</span></a></li>
                  <li><a href="/monitor"><i class="fa fa-desktop"></i> <span>Monitor All Around</span></a></li>
                </ul>
              </li>
              
              
            </ul>
          </li>
           -->
          <!--/ Fin de todos los torneos -->

          
          
          <!-- ======================================= -->
          {{-- <li class="header">Other menus</li> --}}
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
  @else
    @role('Capturista')
        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
          <!-- sidebar: style can be found in sidebar.less -->
          <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
              <div class="pull-left image">
                <img src="{{ backpack_avatar_url(Auth::user()) }}" class="img-circle" alt="User Image">
              </div>
              <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <small><small><a href="{{ route('backpack.account.info') }}"><span><i class="fa fa-user-circle-o"></i> {{ trans('backpack::base.my_account') }}</span></a> &nbsp;  &nbsp; <a href="{{ backpack_url('logout') }}"><i class="fa fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span></a></small></small>
              </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
              {{-- <li class="header">{{ trans('backpack::base.administration') }}</li> --}}
              <!-- ================================================ -->
              <!-- ==== Recommended place for admin menu items ==== -->
              <!-- ================================================ -->
              <li><a href="/capturar"><i class="fa fa-pencil-square-o"></i> <span>Capturar</span></a></li>
              <!-- ======================================= -->
              {{-- <li class="header">Other menus</li> --}}
            </ul>
          </section>
          <!-- /.sidebar -->
        </aside>
    @endrole
  @endrole
@endif
