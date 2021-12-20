<?php
 
$dataPoints = array(
    array("y" => 40, "label" => "25/09/2021"),
    array("y" => 15, "label" => "26/09/2021"),
    array("y" => 25, "label" => "27/09/2021"),
    array("y" => 5, "label" => "28/09/2021"),
    array("y" => 10, "label" => "29/09/2021"),
    array("y" => 0, "label" => "30/09/2021"),
    array("y" => 20, "label" => "01/10/2021")
);
$dataPoints1 = array(
    array("y" => 50, "label" => "25/09/2021"),
    array("y" => 35, "label" => "26/09/2021"),
    array("y" => 20, "label" => "27/09/2021"),
    array("y" => 15, "label" => "28/09/2022"),
    array("y" => 12, "label" => "29/09/2022"),
    array("y" => 0, "label" => "30/09/2022"),
    array("y" => 20, "label" => "01/10/2022")
);
$dataPoints2 = array(
    array("y" => 100, "label" => "25/09/2021"),
    array("y" => 35, "label" => "26/09/2021"),
    array("y" => 70, "label" => "27/09/2021"),
    array("y" => 15, "label" => "28/09/2022"),
    array("y" => 60, "label" => "29/09/2022"),
    array("y" => 10, "label" => "30/09/2022"),
    array("y" => 90, "label" => "01/10/2022")
);
?>
<?php 
 include("lib/session.php");
 include("lib/DBConn.php");
 ?>

 <?php
include("includes/header.php");
 ?>
  <!-- Left side column. contains the logo and sidebar -->
 <?php
include("includes/sidebar.php");
 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Repoting
        <small>Graph</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Repoting</a></li>
        <li class="active">Graph</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Repoting Graph</h3>

          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div id="chartContainer" style="height: 370px; width: 100%;"></div>
           
        </div>
        <!-- /.box-body -->

        
        
      </div>
      <!-- /.box -->
    </section>
    
 

 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

    </div>
    
  <?php
  include("includes/footer.php");
  ?>

  <!-- Control Sidebar -->
   <?php
include("includes/control_sidebar.php");
  ?>
</div>
<!-- ./wrapper -->

<?php include("includes/scripts.php");?>

</body>
</html>
    <script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
    title: {
        text: "Expenses and Income Graph"
    },
    axisY: {
        title: "Amount"
    },
    axisX: {
        title: "Date"
    },
    data: [{
        type: "line",
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    },
    {
        type: "line",
        dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
    },
    {
        type: "line",
        dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
    }]
});
chart.render();
 
}
</script>