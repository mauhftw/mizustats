@if (count($errors) > 0)
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h4><i class="icon fa fa-ban"></i> Error!</h4>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{!! $error !!}</li>
    @endforeach
  </ul>
</div>
@endif

@if(Session::has('success'))
<div class="alert alert-success alert-dismissible">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i> Exito!</h4>
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
