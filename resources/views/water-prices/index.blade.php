@extends('template.master')
@section('page-title','Precios')
@section('page-description','Listado de precios')
@section('box-name','Listado de precios')
@section('content')
<div class="col-md-12">
    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
            </div>
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-md">
                        <a class="btn btn-primary" href="{{{ url('users/create') }}}">Agregar  <i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered table-striped" id="datatable" data-url="{{{ url('users/data') }}}">
                        <thead>
                            <tr>
                                <th class="col-md-1 center">#</th>
                                <th class="col-md-2 center">Descripcion</th>
                                <th class="col-md-2 center">Valor</th>
                                <th class="col-md-2 center">Fecha</th>
                                <th class="col-md-2 center">Activo</th>
                                <th class="col-md-3 center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@stop
@section('scripts')
<script type="text/javascript">
  $(document).ready(function(){
    $('#datatable').dataTable({
        processing: true,
        serverSide: true,
        language: datatable_spanish,
        ajax: $('#datatable').data('url'),
        columns: [
        {data: 'id', name: 'id', className: "center"},
        {data: 'description', name: 'description'},
        {data: 'updated-at', name: 'updated-at'},
        {data: 'value', name: 'value'},
        {data: 'active', name: 'active', className: "center"},
        {data: 'actions',name: 'actions', className: "center", orderable: false, searchable: false}
        ]
    });
});
</script>
@stop
