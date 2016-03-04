@extends('template.slave')
@section('page-title','Home')
@section('page-description','Panel de reportes')
@section('content')
<div class="col-md-12">
    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
            </div>
        </header>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                  <h3>Estadisticas del dia</h3>
                    <table class="table table-bordered table-striped" id="datatable" data-url="{{{ url('home/data') }}}">
                        <thead>
                            <tr>
                                <th class="col-md-2 center">Consumo acumulado del dia [lts]</th>
                                <th class="col-md-2 center">Consumo/hora [lts]</th>
                                <th class="col-md-2 center">Consumo acumulado del mes [lts]</th>
                                <th class="col-md-2 center">Consumo de la ciudad [lts]</th>
                                <th class="col-md-2 center">Consumo promedio de ciudad [lts]</th>
                                <th class="col-md-3 center">Aproximado a pagar [$]</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                  <div class="row">
                    <div class="col-md-6" id="consumption_month_chart"></div>
                    <div class="col-md-6" id="consumption_day_chart"></div>
                  </div>
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
        bFilter: false,
        paging: false,
        ordering: false,
        info: false,
        //language: datatable_spanish,
        ajax: $('#datatable').data('url'),
        columns: [
        {data: 'consumption', name: 'consumption'},
        {data: 'consumptionPerHour', name: 'consumptionPerHour'},
        {data: 'monthUserConsumption', name: 'monthUserConsumption', className: "center"},
        {data: 'cityTotalConsumption', name: 'cityTotalConsumption'},
        {data: 'cityAverage', name: 'cityAverage', className: "center"},
        {data: 'bill',name: 'bill', className: "center"}
        ]
    });
});
</script>
@stop
