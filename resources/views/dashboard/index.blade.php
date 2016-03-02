@extends('template.master')
@section('page-title','Dashboard')
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
                    <table class="table table-bordered table-striped" id="datatable" data-url="{{{ url('dashboard/data') }}}">
                        <thead>
                            <tr>
                                <th class="col-md-2 center">Usuarios activos</th>
                                <th class="col-md-2 center">Consumo acumulado del dia [lts]</th>
                                <th class="col-md-2 center">Consumo/hora [lts]</th>
                                <th class="col-md-2 center">Mayor consumidor</th>
                                <th class="col-md-2 center">Consumo del mayor consumidor</th>
                                <th class="col-md-3 center">Consumo acumulado del mes</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                  <div class="col-md-12">
                    <div id="chart_div"></div>
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
        {data: 'largestConsumerValue', name: 'largestConsumerValue', className: "center"},
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
  var jsonData = $.ajax({
      url: "dashboard/cities/month",
      dataType: "json",
      async: false
      }).responseText;

  // Create our data table out of JSON data loaded from server.
  var data = new google.visualization.DataTable(jsonData);
  data.addColumn('string', 'cities');
  data.addColumn('number', 'water');
  console.log(jsonData);
  var options = {
    title: 'Consumo del mes',
    hAxis: {title: 'Consumo', titleTextStyle: {color: 'green'}},
    vAxis: {title: 'Ciudad', titleTextStyle: {color: '#FF0000'}},
  //  backgroundColor:'#ffffcc',
  //  legend:{position: 'bottom', textStyle: {color: 'blue', fontSize: 13}},
    width:320,
    height:240
};
  // Instantiate and draw our chart, passing in some options.

  var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
  chart.draw(data, options);
}
</script>
@stop
