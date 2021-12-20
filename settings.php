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
          move_uploaded_file($_FILES["txtfavicon"]["tmp_name"],"upload/settings/" . $newFilename);
          $location = "upload/settings/" . $newFilename;
          $sql.= "favicon='".$location."', ";
        }
        if(@!empty($_FILES["txtlogo"]["name"])){
          $fileinfo = PATHINFO($_FILES["txtlogo"]["name"]);
          $newFilename = $fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
          move_uploaded_file($_FILES["txtlogo"]["tmp_name"],"upload/settings/" . $newFilename);
          $location1 = "upload/settings/" . $newFilename;
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

<?php include("includes/scripts.php");?>


</body>
</html>
