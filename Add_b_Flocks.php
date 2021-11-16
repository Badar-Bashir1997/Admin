<?php 
 include("lib/session.php");
 include("lib/DBConn.php");
if(isset($_REQUEST['BtnSubmit']))

    {
        $st_date=$_REQUEST['st_date'];
        $End_date=$_REQUEST['end_date'];
        $no_of_birds=$_REQUEST['no_of_birds'];
        $Purchase_cost=$_REQUEST['Purchase_cost'];
        $Farm=$_REQUEST['Farm'];
        $Query = "INSERT INTO flock(start_date,end_date,nob,Purchase_cost,farm_name) 
        values('$st_date','$End_date','$no_of_birds','$Purchase_cost','$Farm')" ;
 $confirm_status = mysqli_query($conn,$Query);
       if($confirm_status)
       {


?>
        <script>
           alert('Broiler Record has been Successfully Inserted in Database');
            window.location.href='Add_b_flocks.php';
            </script>
<?php
    }
    else
    {
        ?>
        <script type="text/javascript">alert('not Working');
        window.location.href='Add_b_flocks.php';
    </script>
        <?php
    }
}

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
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
        Add
        <small>Flocks</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Farms</a></li>
        <li class="active">Flocks</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Flocks</h3>

          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
                <form action="#" method="post" name="form">
              <div class="form-group">
                <label>Start Date</label>
               <div class="input-group date">
                  <div class="input-group-addon">
                   
                  </div>
                  <input type="date"name="st_date" class="form-control pull-right" >
                </div>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Expeted End Date</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    
                  </div>
                  <input type="date"name="end_date" class="form-control pull-right" >
                </div>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Number Of Birds</label>
                <input type="text" name="no_of_birds" parsley-trigger="change" required
                placeholder="Number Of Birds" class="form-control" id="NumberOfBirds">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
             <div class="col-md-6">
              <div class="form-group">
                <label>Purchase Cost</label>
                <input type="text" name="Purchase_cost" parsley-trigger="change" required
                placeholder="Purchase Cost" class="form-control" id="PurchaseCost">
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Select Farm</label>
                <select class="form-control select2" style="width: 100%;" name="Farm">
                  
                   <?php 
      
                    $query = " SELECT * FROM farm where Breed_type='Broiler'";
                    $result = mysqli_query($conn,$query);
                    while($row = mysqli_fetch_array($result)){
                      $name= $row['name'];
                      ?>
                                <option><?php echo $name ?></option>
                                <?php   }
                     ?> 
                </select>
              </div>
              <!-- /.form-group -->
            </div>
          </div>
          <!-- /.row -->
           <button type="submit" name="BtnSubmit" class="btn btn-primary"  >Submit</button>
           </form>
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
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page script -->

</body>
</html>
