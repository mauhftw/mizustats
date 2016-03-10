@extends('template.master')
@section('page-title','Registrar usuario')
@section('page-description','Registra un nuevo usuario en el sistema')
@section('box-name', 'Nuevo usuario')
@section('content')

            <!-- form start -->
{!! Form::open(['route'=>'users.store', 'class'=>'form-horizontal form-validate']) !!}
              <div class="box-body">
                <div class="form-group">
                  <label for="role" class="col-sm-2 control-label">Seleccione el tipo de usuario</label>

                  <div class="col-sm-3">
                <!--  <select class="form-control">
                    <option>Administrador</option>
                    <option>Cliente</option>
                  </select> -->
                  {!! Form::select('role_id', $roles, 'null', ['class' => 'form-control', 'required']) !!}

                  </div>
                </div>

                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Nombre</label>
                  <div class="col-sm-3">
                    {!! Form::text('name', '', ['class'=>'form-control', 'required', 'placeholder' => 'Nombre', 'minlength'=>'2', 'maxlength'=>'32', 'autofocus', 'pattern' => '[a-zA-Z]+']) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label for="lastname" class="col-sm-2 control-label">Apellido</label>

                  <div class="col-sm-3">
                    {!! Form::text('lastname', '', ['class'=>'form-control','placeholder' => 'Apellido', 'required', 'minlength'=>'2', 'maxlength'=>'32', 'autofocus', 'pattern' => '[a-zA-Z]+']) !!}
                  </div>
                </div>

                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">E-mail</label>

                <div class="col-sm-3">
                  {!! Form::text('email','', ['class'=>'form-control', 'placeholder' => 'example@domain.com', 'required', 'minlength'=>'2', 'maxlength'=>'128']) !!}
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
                  {!! Form::text('dni', '', ['class'=>'form-control', 'required','placeholder' => '35666111', 'minlength'=>'2', 'maxlength'=>'32', 'autofocus', 'pattern' => '[0-9]+']) !!}
                </div>
              </div>

              <div class="form-group">
                <label for="state" class="col-sm-2 control-label">Provincia</label>

                <div class="col-sm-3">
                {!! Form::select('state_id', $states, 'null', ['class' => 'form-control', 'required', 'id' => 'state']) !!}
                </div>
              </div>

              <div class="form-group">
                <label for="city" class="col-sm-2 control-label">Ciudad</label>

                <div class="col-sm-3">  <!-- AJAX class form-control en el select-->
                  <select name="state" class="form-control" id="city">
                    <option selected ="selected">Seleccione Provincia</option>
                </select>
                <!--<img src="ajax-loader.gif" id="loding1"></img>-->
                <!--{!! Form::select('city_id',['228' => 'Godoy Cruz'], 'Godoy Cruz', ['class' => 'form-control', 'required']) !!}-->

                </div>
              </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{{ url("users") }}}" class="btn btn-default">Cancelar</a>
                {!! Form::submit('Registrar',['class'=> 'btn btn-primary pull-right']) !!}
              </div>
              <!-- /.box-footer -->
            {!! Form::close() !!}
          </div>
@stop
@section('scripts')
<script type="text/javascript">
$(document).ready(function()
{
	//$("#loding1").hide();
	$("#state").change(function()
	{
		//$("#loding1").show();
		var id=$(this).val();
		var dataString = 'id='+ id;
    //console.log(id);
		//$("#state").find('option').remove();
		$("#city").find('option').remove();
		$.ajax
		({
			type: "GET",
			url: 'city/'+id,
			data: id,
			cache: false,
			success: function(html){
        console.log(html);
			  //$("#loding1").hide();
				//$("#city").html(html);
        //<option value="1">Buenos Aires</option>
        for (var i = 0; i < html.length; i++) {
          console.log(html[i].name);
            $('#city').append("<option value='"+html[i].id+"'>"+html[i].name+"</option>")
}
			}
		});
	});
});
</script>
@stop
