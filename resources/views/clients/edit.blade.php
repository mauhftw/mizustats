@extends('template.slave')
@section('page-title','Editar usuario')
@section('page-description','Edita datos de usuario')
@section('box-name', 'Editar usuario')
@section('content')

            <!-- form start -->
{!! Form::model($user,['route'=>['client.update', $user->id], 'method'=>'PUT', 'class'=>'form-horizontal form-validate']) !!}
              <div class="box-body">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Nombre</label>
                  <div class="col-sm-3">
                    {!! Form::text('name', old('name'), ['class'=>'form-control', 'required', 'minlength'=>'2', 'maxlength'=>'32', 'autofocus', 'pattern' => '[a-zA-Z]+']) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="lastname" class="col-sm-2 control-label">Apellido</label>

                  <div class="col-sm-3">
                      {!! Form::text('lastname', old('lastname'), ['class'=>'form-control', 'required', 'minlength'=>'2', 'maxlength'=>'32', 'autofocus', 'pattern' => '[a-zA-Z]+']) !!}
                  </div>
                </div>

                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">E-mail</label>

                <div class="col-sm-3">
                  {!! Form::text('email', old('email'), ['class'=>'form-control', 'placeholder' => 'example@domain.com', 'required', 'minlength'=>'2', 'maxlength'=>'128']) !!}
                </div>
              </div>

              <div class="form-group" id='fieldwrapper'>
                <label for="password" class="col-sm-2 control-label">Password</label>

              <div class="col-sm-3">
                {!! Form::password('password', ['class'=>'form-control', 'minlength'=>'6', 'maxlength'=>'128', 'required', 'id' => 'pass']) !!}
              </div>
            </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{{ url("home") }}}" class="btn btn-default">Cancelar</a>
                {!! Form::submit('Editar',['class'=> 'btn btn-primary pull-right']) !!}
              </div>
              <!-- /.box-footer -->
            {!! Form::close() !!}
          </div>
@stop
@section('scripts')
@stop
