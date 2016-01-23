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
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="{{{ asset("/bower_components/AdminLTE/dist/css/skins/skin-blue.min.css") }}}" rel="stylesheet" type="text/css" />
</head>
<body class="skin-blue">
<div class="wrapper">

    <!-- Header -->
    @include('shared.header')

    <!-- Sidebar -->
    @include('shared.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('page-title')
                <small>@yield('page-description')</small>
            </h1>
            <!-- You can dynamically generate breadcrumbs here -->
            <!-- <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">
              <!-- Default box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">@yield('box-name')</h3>
                  <div class="box-tools pull-right">
                    <!--<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>-->
                  </div>
                </div>
                <div class="box-body" style="display: block;">
                  <div class="col-md-12">
                      @include('shared.notifications')
                  </div>
                  @yield('content')
                </div>
                <!-- /.box-body -->
              <!--  <div class="box-footer" style="display: block;">
                  Footer
                </div> -->
                <!-- /.box-footer-->
              <!--</div>-->
              <!-- /.box -->

            <div style="padding: 10px 0px; text-align: center;">
              <!--<div class="text-muted">Excuse the ads! We need some help to keep our site up.</div>-->
              <div class="visible-xs visible-sm">
                <!-- AdminLTE BASURAAA BORRARRR-->
                <ins class="adsbygoogle" style="display:inline-block;width:300px;height:250px" data-ad-client="ca-pub-4495360934352473" data-ad-slot="2819675442">
                </ins>
                <!--<script>(adsbygoogle = window.adsbygoogle || []).push({});</script>-->
              </div>
              <div class="hidden-xs hidden-sm">
              <!--  <script async="" src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js">
              </script> -->
                <!-- Home large leaderboard -->
                <ins class="adsbygoogle" style="display:inline-block;width:728px;height:90px" data-ad-client="ca-pub-4495360934352473" data-ad-slot="1170479443">
                </ins>
                <!--<script>(adsbygoogle = window.adsbygoogle || []).push({});</script>-->
              </div>
            </div>
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
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience -->
</body>
</html>
