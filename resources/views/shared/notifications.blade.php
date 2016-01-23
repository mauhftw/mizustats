@if (count($errors) > 0)
<div class="alert alert-danger">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <strong>Oops!</strong> Hubo un error con los datos ingresados.<br><br>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{!! $error !!}</li>
    @endforeach
  </ul>
</div>
@endif

@if(Session::has('success'))
<div class="alert alert-success">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    {{{ Session::get('success') }}}
</div>
@endif

<!--@if(Session::has('working'))
  @if(Session::get('working',0) == 1)
  <div class="alert alert-danger">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      {{{ trans('backup.in_progress')}}}
  </div>
  @elseif(Session::get('working',-1) == 0)
  <div class="alert alert-success">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      {{{ trans('backup.completed')}}}
  </div>
  @endif
@endif
