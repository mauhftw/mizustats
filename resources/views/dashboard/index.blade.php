@extends('template.master')
@section('page-title','Dashboard')
@section('page-description','Panel de reportes')
@section('box-name','Estadisticas del dia')
@section('content')


        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                
                    <table class="table table-bordered table-striped" id="datatable" data-url="{{{ url('dashboard/data') }}}">
                        <thead>
                            <tr>
                                <th class="col-md-2 center">Usuarios activos</th>
                                <th class="col-md-2 center">Consumo acumulado del dia [lts]</th>
                                <th class="col-md-2 center">Consumo/hora [lts]</th>
                                <th class="col-md-2 center">Mayor consumidor</th>
                                <th class="col-md-2 center">Menor consumidor</th>
                                <th class="col-md-3 center">Consumo acumulado del mes</th>
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
        {data: 'users', name: 'users', className: "center"},
        {data: 'consumption', name: 'consumption'},
        {data: 'consumptionPerHour', name: 'consumptionPerHour'},
        {data: 'largestConsumer', name: 'largestConsumer'},
        {data: 'smallestConsumer', name: 'smallestConsumer', className: "center"},
        {data: 'totalConsumption',name: 'totalConsumption', className: "center"}
        ]
    });
});
</script>
<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

// Load the Visualization API and the piechart package.
google.charts.load('current', {'packages':['corechart']});
// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    monthChart();
    dayChart();
  }

function monthChart() {

    var jsonData = $.ajax({
    url: "dashboard/chart/month",
    dataType: "json",
    async: false
    }).responseText;

   // Create our data table out of JSON data loaded from server.
   var data = new google.visualization.DataTable(jsonData);
   var options = {
   title: 'Consumo acumulado del mes',
   hAxis: {title: 'Litros'},
   width:600,
   height:400
   };
  // Instantiate and draw our chart, passing in some options.

   var chart = new google.visualization.BarChart(document.getElementById('consumption_month_chart'));
   chart.draw(data, options);
}

function dayChart() {

  var jsonData = $.ajax({
  url: "dashboard/chart/day",
  dataType: "json",
  async: false
  }).responseText;

 // Create our data table out of JSON data loaded from server.
 var data = new google.visualization.DataTable(jsonData);
 var options = {
 title: 'Consumo acumulado del dia',
 hAxis: {title: 'Litros'},
 width:600,
 height:400
 };
// Instantiate and draw our chart, passing in some options.

 var chart = new google.visualization.BarChart(document.getElementById('consumption_day_chart'));
 chart.draw(data, options);
}
</script>
@stop
