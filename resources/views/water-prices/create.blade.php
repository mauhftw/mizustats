@extends('template.master')
@section('page-title','Registrar precio')
@section('page-description','Por favor ingrese un nuevo precio')
@section('box-name', 'Precio de agua')
@section('content')

            <!-- form start -->
{!! Form::open(['route'=>'water-prices.store', 'class'=>'form-horizontal form-validate']) !!}
              <div class="box-body">
                <div class="form-group">
                  <label for="price" class="col-sm-2 control-label">Precio</label>
                  <div class="col-sm-3">
                    <input required type="price" class="form-control" placeholder="$" min ="2" pattern="[0-9.]+">
                  </div>
                </div>
                <div class="form-group">
                  <label for="descrption" class="col-sm-2 control-label">Descripcion</label>

                  <div class="col-sm-3">
                    <input required type="description" class="form-control" placeholder="Descripcion" min="2" pattern="[a-zA-Z]+">
                  </div>
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
