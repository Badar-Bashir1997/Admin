<?php 
 include("lib/session.php");
 include("lib/DBConn.php");
 if(isset($_REQUEST['BtnSubmit']))
 {
        $sql = "UPDATE settings SET ";
        if($_REQUEST['txtName']) { $sql.= "name='".$_REQUEST['txtName']."', ";}
        if($_REQUEST['txtPhone']) { $sql.= "phone_no='".$_REQUEST['txtPhone']."', ";}
        if($_REQUEST['txtEmail']) { $sql.= "email='".$_REQUEST['txtEmail']."', ";}
        if($_REQUEST['txtAddress']) { $sql.= "address='".$_REQUEST['txtAddress']."', ";}
        if(@$_FILES["txtfavicon"]["name"]){
          $fileinfo = PATHINFO($_FILES["txtfavicon"]["name"]);
          $newFilename = $fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
          move_uploaded_file($_FILES["txtfavicon"]["tmp_name"],"upload/" . $newFilename);
          $location = "upload/" . $newFilename;
          $sql.= "favicon='".$location."', ";
        }
        if(@!empty($_FILES["txtlogo"]["name"])){
          $fileinfo = PATHINFO($_FILES["txtlogo"]["name"]);
          $newFilename = $fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
          move_uploaded_file($_FILES["txtlogo"]["tmp_name"],"upload/" . $newFilename);
          $location1 = "upload/" . $newFilename;
          $sql.= "logo='".$location1."', ";
        }

        $newarraynama = rtrim($sql, ", ");

        $newarraynama .= " WHERE id = 2";

        // print_r($newarraynama);
        // die();
        // $confirm_status = mysqli_query($conn,$newarraynama);
        

        
  
        // $name=$_REQUEST['txtName'];
        // $phone=$_REQUEST['txtPhone'];
        // $Email=$_REQUEST['txtEmail'];
        // $Address=$_REQUEST['txtAddress'];
        // $Query = "UPDATE settings SET name='$name',phone_no='$phone',email='$Email',Address='$Address',favicon='$location',logo='$location1'"; 
        // print_r($Query);
        // die();
 // $confirm_status = mysqli_query($conn,$Query);
       if(mysqli_query($conn,$newarraynama))
       {
?>
        <script>
            alert('Settings has been Successfully Updated in Database');
            window.location.href='settings.php';
            </script>
<?php
    }
    else
    {
        ?>
        <script type="text/javascript">alert('not Working');
        window.location.href='settings.php';
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
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
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
        Update
        <small>Settings</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Update</a></li>
        <li class="active">Settings</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <form action="#" method="post" class="was-validated" enctype="multipart/form-data">
        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Update Settings</h3>

             <?php
                                          
                    $Query = "SELECT * FROM settings";
                    $result = mysqli_query($conn, $Query);
                    $row1 = mysqli_fetch_array($result);
                    
                ?>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="txtName" parsley-trigger="change"
                  placeholder="Full Name" class="form-control" value="<?php echo $row1['name'];  ?>">
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Phone</label>
                  <input type="text" name="txtPhone" parsley-trigger="change"
                  placeholder="+923XXXXXXXXX" class="form-control" pattern="[+]{1}[9]{1}[2]{1}[0-9]{10}" value="<?php echo $row1['phone_no'];  ?>" >
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Email</label>
                  <input type="Email" name="txtEmail" parsley-trigger="change"
                  placeholder="Email" class="form-control" value="<?php echo $row1['email'];  ?>">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
               <div class="col-md-6">
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" name="txtAddress" parsley-trigger="change"
                  placeholder="Address" class="form-control" value="<?php echo $row1['Address'];  ?>">
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Favicon <span style="color: red;"><?php echo $row1['favicon'];  ?></span> </label>
                  <input type="file" name="txtfavicon" parsley-trigger="change"
                   class="form-control" value="<?php echo $row1['favicon'];  ?>">
                </div>
                <!-- /.form-group -->
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Logo <span style="color: red;"><?php echo $row1['logo'];  ?></span></label>
                  <input type="file" name="txtlogo" parsley-trigger="change"
                   class="form-control" value="<?php echo $row1['logo'];  ?>">
                </div>
                <!-- /.form-group -->
              </div>
            </div>
            <!-- /.row -->
             <button type="submit" name="BtnSubmit" class="btn btn-primary" >Submit</button>
             
          </div>
          <!-- /.box-body -->

          
          
        </div>
      </form>
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
