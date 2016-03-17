@extends('template.master')
@section('page-title','Usuarios')
@section('page-description','Listado de usuarios')
@section('box-name','Listado de usuarios')
@section('content')

            <div class="row">
                <div class="col-sm-12">
                    <div class="mb-md">
                        <a class="btn btn-primary" href="{{{ url('users/create') }}}">Agregar  <i class="fa fa-plus"></i></a>
                    </div>
                    <br>
                </div>

                <div class="col-md-12">
                    <table class="table table-bordered table-striped" id="datatable" data-url="{{{ url('users/data') }}}">
                        <thead>
                            <tr>
                                <th class="col-md-1 center">#</th>
                                <th class="col-md-2 center">Nombre</th>
                                <th class="col-md-2 center">Apellido</th>
                                <th class="col-md-2 center">Provincia</th>
                                <th class="col-md-2 center">Departamento</th>
                                <th class="col-md-3 center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
    </section>

@stop
@section('scripts')
<script type="text/javascript">
  $(document).ready(function(){
    $('#datatable').dataTable({
        processing: true,
        serverSide: true,
        //language: datatable_spanish,
        ajax: $('#datatable').data('url'),
        columns: [
        {data: 'id', name: 'id', className: "center"},
        {data: 'name', name: 'name'},
        {data: 'lastname', name: 'lastname'},
        {data: 'state_name', name: 'state_name'},
        {data: 'city_name', name: 'city_name', className: "center"},
        {data: 'actions',name: 'actions', className: "center", orderable: false, searchable: false}
        ]
    });
});
</script>
@stop
