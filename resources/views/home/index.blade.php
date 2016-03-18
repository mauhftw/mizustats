@extends('template.slave')
@section('page-title','Home')
@section('page-description','Panel de reportes')
@section('box-name','Reportes del dia')
@section('content')
<div class="col-md-12">
    <section class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
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
                    <div class="col-md-6" id="consumption_day_chart"></div>
                    <div class="col-md-6" id="consumption_month_chart"></div>
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
        language: datatable_spanish,
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

<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

// Load the Visualization API and the piechart package.
google.charts.load('current', {'packages':['corechart']});
// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    dayChart();
    monthChart();
  }

function dayChart() {

    var jsonData = $.ajax({
    url: "home/chart/day",
    dataType: "json",
    async: false
    }).responseText;

   // Create our data table out of JSON data loaded from server.
   var data = new google.visualization.DataTable(jsonData);
   var options = {
   title: 'Consumo de la semana',
   hAxis: {title: 'Litros'},
   width:600,
   height:400
   };
  // Instantiate and draw our chart, passing in some options.

   var chart = new google.visualization.BarChart(document.getElementById('consumption_day_chart'));
   chart.draw(data, options);
}

function monthChart() {

  var jsonData = $.ajax({
  url: "home/chart/month",
  dataType: "json",
  async: false
  }).responseText;

 // Create our data table out of JSON data loaded from server.
 var data = new google.visualization.DataTable(jsonData);
 var options = {
 title: 'Consumo respecto el mes anterior',
 hAxis: {title: 'Litros'},
 width:600,
 height:400
 };
// Instantiate and draw our chart, passing in some options.

 var chart = new google.visualization.BarChart(document.getElementById('consumption_month_chart'));
 chart.draw(data, options);
}
</script>
