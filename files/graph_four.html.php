<?php
include 'access_control.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Graph Three</title>

<meta name="description" content="graph four">


<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the graph, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.arrayToDataTable([
          ['rating', 'student rating']
          <?php
            foreach($results_array as $data_row)
            {
              echo(", [$data_row[0], $data_row[1]]");
            }
          ?>
        ]);

        // Set chart options
        var options = { title: "<?php echo $student; ?> opinion over all labs for selected descriptor",
                        width:700,
                        height :700,
                        curveType: 'function',
                        legend: { position: 'bottom'}}

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>


</head>
<body>

<div class="container-fluid">
<div class="row">
<div class="col-md-12">
  <div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6 content">
      <div class="page-header">
        <h1>
          Graph of student responses over all completed labs for one descriptor
          <button class="btn btn-default pull-right" name="home" onclick="window.location = 'admin_controller.php'">
            Home
          </button>
        </h1>
      </div>
      <div class='chart-container'>
        <div id="chart_div"></div>
      </div>
    </div>
    <div class="col-md-3">
    </div>
  </div>
</div>
</div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
