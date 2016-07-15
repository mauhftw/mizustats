<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>mizustats</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{!! csrf_token() !!}" />

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
    @include('shared.sidebar')

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
                <!-- box body -->
                <div class="box-body" style="display: block;">
                  @yield('content')

                </div>
                  @include('shared.deletemodal')
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
<script type="text/javascript">
var datatable_spanish = {
	"sProcessing":     "Procesando...",
	"sLengthMenu":     "Mostrar _MENU_ registros",
	"sZeroRecords":    "No se encontraron resultados",
	"sEmptyTable":     "Ningún dato disponible en esta tabla",
	"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
	"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
	"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
	"sInfoPostFix":    "",
	"sSearch":         "Buscar:",
	"sUrl":            "",
	"sInfoThousands":  ",",
	"sLoadingRecords": "Cargando...",
	"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
	},
	"oAria": {
			"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
	}
};
var datatable_sdom = "<'row datatables-header form-inline'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>r><t><'row datatables-footer'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>>";
</script>
<script type="text/javascript">
$(document).ready(function(){
	setupDeleteLink();
  setupAjax();
});

function setupAjax(){
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
}

function setupDeleteLink(){
	var link;
	$('body').on("click", ".delete-link", function(e){
    e.preventDefault();
		link = $(this);
    $('#deleteModal .modal-delete-confirm').attr('data-url',link.data('href'));
    $('#deleteModal').modal();

	});

	$('body').on('click', '.modal-dismiss', function (e) {
		e.preventDefault();
    $('#deleteModal').modal('hide');
	});

	$('body').on('click', '.modal-delete-confirm', function (e) {
		e.preventDefault();
		if(link != 'undefined' && link != null){
			$.ajax({
				type: "DELETE",
				url: link.data("href"),
				success: function(msg){
          $('#deleteModal').modal('hide');

					link.closest("tr").remove();
				}
			}).fail(function( jqXHR, textStatus ) {

			});
		}
	});
}
</script>
@yield('scripts')

</body>
</html>
