@extends('template.master')
@section('page-title','Exportar datos')
@section('page-description','Guarda reportes en formato pdf')
@section('box-name', 'Exportar datos')
@section('content')

            <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                  <label for="name" class="col-sm-3 control-label">Seleccione la ubicacion del archivo a guardar</label>
                  <div class="col-sm-3">
                    <button type="button" class="btn btn-block btn-primary btn-md">Exportar</button>
                  </div>
                </div>
              </div>
              <!-- /.box-footer -->
@stop
@section('scripts')
@stop
