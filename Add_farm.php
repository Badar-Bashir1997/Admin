<?php 
 include("lib/session.php");
 include("lib/DBConn.php");
  if(isset($_REQUEST['BtnSubmit']))

    {
        $name=$_REQUEST['Farm_Name'];
        $location=$_REQUEST['Farm_Location'];
        $phone=$_REQUEST['txt_phone'];
        $f_id=$_REQUEST['Farm_id'];
        $b_type=$_REQUEST['breed_type'];
        $email=$_REQUEST['txt_email'];

        $Query = "INSERT INTO farm(Farm_id,name,location,Breed_type,phone_no,email) values('$f_id','$name','$location','$b_type','$phone','$email')" ;
        $confirm_status = mysqli_query($conn,$Query);
       if($confirm_status)
       {
        ?>
        <script>
            alert('Record has been Successfully Inserted in Database');
            window.location.href='Add_farm.php?success';
            </script>
        <?php
    }
    else
    {
        ?>
        <script type="text/javascript">alert('not Working');
        window.location.href='Add_farm.php?success';
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
  <title>Admin Dashboard</title>
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
        <small>Farm</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Farms</a></li>
        <li class="active">Add New Farms</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Farm</h3>

          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
                <form action="#" method="post" name="form">
                 
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="Farm_Name" parsley-trigger="change" required
                placeholder="Farm Name" class="form-control" id="FarmName" onkeyup="myChangeFunction(this)">
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Location</label>
                <input type="text" name="Farm_Location" parsley-trigger="change" required
                placeholder="Farm Location" class="form-control" id="FarmLocation" onchange="myChangeFunction2(this)">
              </div>
              <div class="form-group">
                <label>Phone No</label>
                <input type="text" name="txt_phone" parsley-trigger="change" required
                placeholder="Phone Number" class="form-control" id="phone">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Farm Id</label>
                <input type="text" name="Farm_id" parsley-trigger="change" 
                placeholder="Farm id" class="form-control" id="Farm_id" readonly="" >
              </div>
              <script type="text/javascript">
                var v;
                function myChangeFunction(input1) {
                  document.getElementById('Farm_id').value ='';
               var input2 = document.getElementById('Farm_id');
                input2.value =input2.value+input1.value;
                v=input2.value
                       }
                       function myChangeFunction2(input1) {
                        document.getElementById('Farm_id').value ='';
               var input2 = document.getElementById('Farm_id');
                input2.value =v+"("+ input1.value+")";
                       }
                </script>
               <div class="form-group">
                <label>Breed Type</label>
                <select class="form-control select2" style="width: 100%;" name="breed_type">
                  <option>Broiler</option>
                  <option>Layer</option>
                  <option>Both</option>
                </select>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="txt_email" parsley-trigger="change" required
                placeholder="Contact Email" class="form-control" id="email">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
           <button type="submit" name="BtnSubmit" class="btn btn-primary" onclick="return onRegister();" >Submit</button>
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
   <?php
include("includes/control_sidebar.php");
  ?>
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
            if(document.form.Farm_Name.value == "")
            {
            alert("Enter Farm Name");
            document.form.Farm_Name.focus();
            return (false);
            }
             else if(document.form.Farm_Location.value == "")
            {
            alert("Enter Farm Location");
            document.form.Farm_Location.focus();
            return (false);
            }
            else if(document.form.Farm_total_capacity.value == "")
            {
            alert("Enter Farm Capacity");
            document.form.Farm_total_capacity.focus();
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
