<?php 
 include("lib/session.php");
 include("lib/DBConn.php");
 if(isset($_REQUEST['BtnSubmit']))

    {
        $qnty_of_bags=$_REQUEST['qnty_of_bags'];
        $price=$_REQUEST['price'];
        $e_Date=$_REQUEST['e_Date'];
        $Status=$_REQUEST['Status'];
        $Query = "INSERT INTO bags_sales(qnty_of_bags,price,b_date,p_method) 
        values('$qnty_of_bags',' $price','$e_Date','$Status')" ;
 $confirm_status = mysqli_query($conn,$Query);
       if($confirm_status)
       {


?>
        <script>
            alert('Record has been Successfully Inserted in Database');
            window.location.href='bags.php?success';
            </script>
<?php
    }
    else
    {
        ?>
        <script type="text/javascript">alert('not Working');
        window.location.href='bags.php?success';
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
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
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
        <small>Bags Sales</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Bags</a></li>
        <li class="active">Sales</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add Bags Sales</h3>

          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form action="#" method="post" name="form">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Quentity of Bags</label>
               <input type="text" name="qnty_of_bags" parsley-trigger="change" required
                placeholder="Quentity of Bags" class="form-control" id="qnty_of_bags">
              </div>
              <!-- /.form-group -->
            
              <!-- /.form-group -->
              <div class="form-group">
                <label>Price</label>
                <input type="Number" name="price" parsley-trigger="change" required 
                placeholder="Price" class="form-control" id="price">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <!-- /.col -->
             <div class="col-md-6">
              <div class="form-group">
                <label>Date</label>
                <input type="Date" name="e_Date" parsley-trigger="change" required
                 class="form-control" id="e_Date">
              </div>
              <!-- /.form-group -->
            </div>
             <div class="col-md-6">
              <div class="box">
            <div class="box-header">
              <h3 class="box-title">Payments Method</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="form-group">
                
               <input type="radio" id="cash" name="Status" value="Cash">
                <label for="cash">Cash</label><br>
                <input type="radio" id="Cradit" name="Status" value="Cradit" >
                <label for="Cradit">Cradit</label><br> 
                <input type="radio" id="Bank" name="Status" value="Bank" >
                <label for="Bank">Bank</label><br> 
              </div>
            </div>
            <!-- /.box-body -->
          </div>
              <!-- /.form-group -->
            </div>
          </div>
          <!-- /.row -->
           <button type="submit" name="BtnSubmit" class="btn btn-primary"  onclick="return onRegister();">Submit</button>
           </form>
        </div>
        <!-- /.box-body -->

        
        
      </div>
      <!-- /.box -->
    </section>
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
<script> 
    function onRegister()
          {
            if(document.form.qnty_of_bags.value == "")
            {
            alert("Enter Quentity of Bags");
            document.form.qnty_of_bags.focus();
            return (false);
            }
             
            else
            {
                return (true);
            }
          }
          </script> 
</body>
</html>
