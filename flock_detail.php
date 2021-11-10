<?php 
 include("lib/session.php");
 include("lib/DBConn.php");
 if(isset($_GET['id'])){
            $id = $_GET['id'];
    }
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css'>
<link rel="stylesheet" href="plugins/datatables/style.css">
 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
 <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
 <?php
include("includes/header.php");
include("includes/sidebar.php");
 ?>
  
  <!-- Left side column. contains the logo and sidebar -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Flocks
        <small>Records</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Flocks Records</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><img class="ion" src="upload/broiler.png" alt="User Image"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Flock</span>
              <span class="info-box-number"><?php echo $id; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><img class="ion" src="upload/broiler.png" alt="User Image"></span>
            <?php 

            $q="SELECT (IFNULL(SUM(expences.price),0)+(SELECT IFNULL(SUM(flock.Purchase_cost),0) FROM flock))AS EXP FROM expences WHERE expences.flock_id='".$id."'";
            $result=mysqli_query($conn, $q);
            $row= mysqli_fetch_array($result);
            $exp=$row['EXP'];
             ?>
            <div class="info-box-content">
              <span class="info-box-text">Total Expenditure</span>
              <span class="info-box-number"><?php echo $exp; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><img class="ion" src="upload/broiler.png" alt="User Image"></span>
            <?php 

            $q="SELECT (IFNULL(SUM(bags_sales.price),0) + (SELECT IFNULL(SUM(broiler_sales.price),0) FROM broiler_sales WHERE broiler_sales.flock_id='$id')+(SELECT IFNULL(SUM(egg_sales.price),0)FROM egg_sales WHERE egg_sales.flock_id='$id')+(SELECT IFNULL(SUM(layer_sales.price),0)FROM layer_sales WHERE layer_sales.flock_id='$id')+(SELECT IFNULL(SUM(manure_sales.price),0) FROM manure_sales WHERE manure_sales.flock_id='$id')) as ti FROM bags_sales WHERE bags_sales.flock_id='$id'";
            $result=mysqli_query($conn, $q);
            $row= mysqli_fetch_array($result);
            $ti=$row['ti'];
            $p_l=$exp-$ti;
             ?>
            <div class="info-box-content">
              <span class="info-box-text">Total Income</span>
              <span class="info-box-number"><?php echo $ti; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><img class="ion" src="upload/broiler.png" alt="User Image"></span>

            <div class="info-box-content">
              <span class="info-box-text">Profit Loss</span>
              <?php
              if($exp>$ti)
              {?>
                <span class="info-box-number">Loss</span> 
               <span class="info-box-number"><?php echo $p_l ?></span> 
               <?php  
              } 
              else
              {
                ?>
                <span class="info-box-number">Profit</span>
                <span class="info-box-number"><?php echo $p_l ?></span>
                <?php 
              }
              
              ?>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Details</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
                <div class="col-md-6">
                  <p class="text-center">
                    <strong>Ecpences</strong>
                  </p>

                  <div class="box-body">
          <div class="progress-group">
                    <span class="progress-text">Add Products to Cart</span>
                    <span class="progress-number"><b>160</b>/200</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Complete Purchase</span>
                    <span class="progress-number"><b>310</b>/400</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                    </div>
                  </div>
                  <div class="progress-group">
                    <span class="progress-text">Visit Premium Page</span>
                    <span class="progress-number"><b>480</b>/800</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Send Inquiries</span>
                    <span class="progress-number"><b>250</b>/500</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                    </div>
                  </div>
           
        </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <p class="text-center">
                    <strong>Sales</strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text">Add Products to Cart</span>
                    <span class="progress-number"><b>160</b>/200</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Complete Purchase</span>
                    <span class="progress-number"><b>310</b>/400</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Visit Premium Page</span>
                    <span class="progress-number"><b>480</b>/800</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Send Inquiries</span>
                    <span class="progress-number"><b>250</b>/500</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
             
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      
    </section>
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Expences</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow: scroll;">
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                                  <th>Farm ID</th>
                                  <th>Flock ID</th>
                                  <th>Expense</th>
                                  <th>Name</th>
                                  <th>Quantity</th>
                                  <th>Price</th>
                                  <th>Expense Date</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $query = "SELECT * FROM expences WHERE flock_id='".$id."'";
                                      $result = mysqli_query($conn,$query);
                                        if ($result->num_rows > 0) {            
                                          while($row = mysqli_fetch_array($result))
                                             {
                                              $s_t=$row['sub_type'];
                                              ?>      
                                                <tr>
                                                    <td><?php echo $row['Farm_id']; ?></td> 
                                                    <td><?php echo $row['flock_id']; ?></td>
                                                    <td><?php echo $row['e_name']; ?></td>
                                                    <?php 
                                                    if($s_t=="No")
                                                    {
                                                      ?>
                                                      <td><?php echo ""; ?></td>
                                                      <?php  
                                                    }
                                                    else
                                                    {
                                                     ?>
                                                     <td><?php echo $s_t; ?></td>
                                                     <?php  
                                                    }?>
                                                    <td><?php echo $row['e_qnty']; ?></td>
                                                    <td><?php echo $row['price']; ?></td>
                                                    <td><?php echo $row['e_date']; ?></td>
                                                    
                                                       </tr>
                                                         <?php
                                                                   }
                                                                  }
                                                              else
                                                                {
                                                                  echo "No Result Found";
                                                                }
                                                                      ?>
        
                                        </tbody>
                                    </table>

                                    <!-- Modal -->


                                    </div>
                                                <!-- /.box-body -->
                                              </div>
                                              <!-- /.box -->
                                            </div>
                                            <!-- /.col -->
                                          </div>
                                          <!-- /.row -->
  </section>
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Sales</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow: scroll;">
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                                  <th>Farm ID</th>
                                  <th>Flock ID</th>
                                  <th>Name</th>
                                  <th>Quantity</th>
                                  <th>Price</th>
                                  <th>Expense Date</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $query = "SELECT * FROM expences WHERE flock_id='".$id."'";
                                      $result = mysqli_query($conn,$query);
                                        if ($result->num_rows > 0) {            
                                          while($row = mysqli_fetch_array($result))
                                             {
                                              
                                              ?>      
                                                <tr>
                                                    <td><?php echo $row['Farm_id']; ?></td> 
                                                    <td><?php echo $row['flock_id']; ?></td>
                                                    <td><?php echo $row['e_name']; ?></td>
                                                    <td><?php echo $row['e_qnty']; ?></td>
                                                    <td><?php echo $row['price']; ?></td>
                                                    <td><?php echo $row['e_date']; ?></td>
                                                    
                                                       </tr>
                                                         <?php
                                                                   }
                                                                  }
                                                              else
                                                                {
                                                                  echo "No Result Found";
                                                                }
                                                                      ?>
        
                                        </tbody>
                                    </table>

                                    <!-- Modal -->


                                    </div>
                                                <!-- /.box-body -->
                                              </div>
                                              <!-- /.box -->
                                            </div>
                                            <!-- /.col -->
                                          </div>
                                          <!-- /.row -->
  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include("includes/footer.php");
include("includes/control_sidebar.php");
  ?>
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
  
<script src='https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js'></script>
<script src='https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js'></script>
<script src='https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js'></script>
<script src='https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script  src="plugins/datatables/script.js"></script>
</body>
</html>
