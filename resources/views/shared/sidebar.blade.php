<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src={{{ url("bower_components/AdminLTE/dist/img/user2-160x160.jpg")}}} class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Alexander Pierce</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
      </div>
    </div>

    <!-- search form (Optional) -->
    <!--<form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form> -->
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">PANEL DE ADMINISTRACION</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="active"><a href="{{{url('/dashboard')}}}"><i class="fa fa-pie-chart"></i> <span>Dashboard</span></a></li>
      <li><a href="{{{url('/users')}}}"><i class="fa fa-users"></i> <span>Usuarios</span></a></li>
      <li><a href="{{{url('/water-prices')}}}"><i class="fa fa-usd"></i> <span>Precios</span></a></li>
      <li><a href="{{{url('/export')}}}"><i class="fa fa-cloud-download"></i> <span>Exportar datos</span></a></li>
      <!--<li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="#">Link in level 2</a></li>
          <li><a href="#">Link in level 2</a></li>
        </ul>
      </li>-->
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
