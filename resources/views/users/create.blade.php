@extends('template.master')
@section('page-title','Registrar usuario')
@section('page-description','Registra un nuevo usuario en el sistema')
@section('box-name', 'Nuevo usuario')
@section('content')

            <!-- form start -->
{!! Form::open(['route'=>'users.create', 'class'=>'form-horizontal form-validate']) !!}
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
                    <input required type="name" class="form-control" placeholder="Nombre" min ="2" pattern="[a-zA-Z]+">
                  </div>
                </div>
                <div class="form-group">
                  <label for="lastname" class="col-sm-2 control-label">Apellido</label>

                  <div class="col-sm-3">
                    <input required type="lastname" class="form-control" placeholder="Apellido" min="2" pattern="[a-zA-Z]+">
                  </div>
                </div>

                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">E-mail</label>

                <div class="col-sm-3">
                  <input required type="email" class="form-control" placeholder="example@example.com">
                </div>
              </div>

              <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>

              <div class="col-sm-3">
                <input required type="password" class="form-control" placeholder="Password">
              </div>
            </div>

            <div class="form-group">
              <label for="confirm_password" class="col-sm-2 control-label">Confirmar password</label>

            <div class="col-sm-3">
              <input required type="confirm_password" class="form-control" placeholder="Confirmar password">
            </div>
          </div>

              <div class="form-group">
                <label for="dni" class="col-sm-2 control-label">DNI</label>

                <div class="col-sm-3">
                  <input required type="dni" class="form-control" placeholder="DNI" [0-9]+>
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
                {!! Form::submit('Registrar',['class'=> 'btn btn-primary pull-right']) !!}
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
@stop
@section('scripts')
@stop
