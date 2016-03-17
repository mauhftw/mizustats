@extends('template.master')
@section('page-title','Registrar precio')
@section('page-description','Por favor ingrese un nuevo precio')
@section('box-name', 'Precio de agua')
@section('content')

            <!-- form start -->
{!! Form::open(['route'=>'water-prices.store', 'class'=>'form-horizontal form-validate']) !!}
            <div class="col-md-12">
                <div class="form-group">
                  <label for="price" class="col-sm-2 control-label">Precio</label>
                  <div class="col-sm-3">
                    {!! Form::text('price', '', ['class'=>'form-control', 'required', 'placeholder' => '$', 'minlength'=>'1', 'maxlength'=>'32', 'autofocus', 'pattern' => '[0-9]+']) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="descrption" class="col-sm-2 control-label">Descripcion</label>
                  <div class="col-sm-3">
                    {!! Form::text('description', '', ['class'=>'form-control', 'placeholder' => 'Escriba una pequenia descripcion', 'minlength'=>'2', 'maxlength'=>'32', 'autofocus', 'pattern' => '[a-zA-Z_0-9]+']) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="active" class="col-sm-2 control-label">Activo</label>
                <div class="col-sm-3">
                  {!! Form::checkbox('active', '1') !!}
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{{ url("water-prices") }}}" class="btn btn-default">Cancelar</a>
                {!! Form::submit('Registrar',['class'=> 'btn btn-primary pull-right']) !!}
              </div>
              <!-- /.box-footer -->
            {!! Form::close() !!}
          </div>
@stop
@section('scripts')
@stop
