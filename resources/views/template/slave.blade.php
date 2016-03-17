<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>mizustats</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link href="{{{ asset("/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") }}}" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{{ asset("/bower_components/AdminLTE/dist/css/AdminLTE.min.css") }}}" rel="stylesheet" type="text/css" />
    <link href="{{{ asset("/bower_components/AdminLTE/dist/css/skins/skin-blue.min.css") }}}" rel="stylesheet" type="text/css" />
</head>
<body class="skin-blue">
<div class="wrapper">

    <!-- Header -->
    @include('shared.header')

    <!-- Sidebar -->
    @include('shared.user_sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('page-title')
                <small>@yield('page-description')</small>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
              <!-- Notifications -->
              <div>
                  @include('shared.notifications')
              </div>
              <!-- Default box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">@yield('box-name')</h3>
                </div>
                  <!-- Content -->
                <div class="box-body" style="display: block;">
                  @yield('content')
                </div>
                <!--@include('shared.deletemodal')-->

          </section>

    </div><!-- /.content-wrapper -->

    <!-- Footer -->
    @include('shared.footer')

</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<script src="{{{ asset ("/bower_components/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js") }}}"></script>
<script src="{{{ asset ("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}}" type="text/javascript"></script>
<script src="{{{ asset ("/bower_components/AdminLTE/dist/js/app.min.js") }}}" type="text/javascript"></script>
<script src="{{{ asset ("/bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js") }}}" type="text/javascript"></script>
<script src="{{{ asset ("/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js") }}}" type="text/javascript"></script>
<script src="{{{ asset ("/bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js") }}}" type="text/javascript"></script>
<script src="{{{ asset ("/bower_components/AdminLTE/plugins/fastclick/fastclick.js") }}}" type= "text/javascript"></script>
@yield('scripts')

</body>
</html>
