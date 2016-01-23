@extends('template.master')
@section('page-title','Editar usuario')
@section('page-description','Edita usuario del sistema')
@section('box-name', 'Editar usuario')
@section('content')

            <!-- form start -->
{!! Form::model($user,['route'=>['users.update', $user->id], 'method'=>'PUT', 'class'=>'form-horizontal form-validate']) !!}
              <div class="box-body">
                <div class="form-group">
                  <label for="role" class="col-sm-2 control-label">Seleccione el tipo de usuario</label>

                  <div class="col-sm-3">
                  <select class="form-control">
                    <option>Administrador</option>
                    <option>Cliente</option>
                  </select>
                  </div>
                </div>

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

              <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>

              <div class="col-sm-3">
                {!! Form::password('password', ['class'=>'form-control', 'minlength'=>'6', 'maxlength'=>'128', 'required']) !!}
              </div>
            </div>

              <div class="form-group">
                <label for="dni" class="col-sm-2 control-label">DNI</label>

                <div class="col-sm-3">
                  {!! Form::text('dni', old('dni'), ['class'=>'form-control', 'required', 'minlength'=>'2', 'maxlength'=>'32', 'autofocus', 'pattern' => '[0-9]+']) !!}
                </div>
              </div>

              <div class="form-group">
                <label for="state" class="col-sm-2 control-label">Provincia</label>

                <div class="col-sm-3">
                <select class="form-control">
                  <option>Mendoza</option>
                  <option>Buenos Aires</option>
                </select>
                </div>
              </div>

              <div class="form-group">
                <label for="city" class="col-sm-2 control-label">Ciudad</label>

                <div class="col-sm-3">
                <select class="form-control">
                  <option>GodoyCruz</option>
                  <option>Maipu</option>
                  <option>Ciudad</option>
                  <option>Guaymallen</option>
                </select>
                </div>
              </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{{ url("users") }}}" class="btn btn-default">Cancelar</a>
                {!! Form::submit('Editar',['class'=> 'btn btn-primary pull-right']) !!}
              </div>
              <!-- /.box-footer -->
            {!! Form::close() !!}
          </div>
@stop
@section('scripts')
@stop
