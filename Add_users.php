<?php 
 include("lib/session.php");
 include("lib/DBConn.php");
 if(isset($_REQUEST['BtnSubmit']))
 {
         $fileinfo = PATHINFO($_FILES["image"]["name"]);
      $newFilename = $fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
      move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $newFilename);
      $location = "upload/" . $newFilename;
        $f_name=$_REQUEST['txtName'];
        $name=$_REQUEST['txtUName'];
        $phone=$_REQUEST['txtPhone'];
        $Email=$_REQUEST['txtEmail'];
        $Address=$_REQUEST['txtAddress'];
        $Date=$_REQUEST['txtDate'];
        $salary=$_REQUEST['txtSalary'];
        $Query = "INSERT INTO user(full_name,u_name,phone_no,email,Address,join_date,salary,image) 
        values('$f_name','$name','$phone','$Email','$Address','$Date','$salary','$location')" ;
        // echo  $Query;
        // die;
 $confirm_status = mysqli_query($conn,$Query);
       if($confirm_status)
       {
?>
        <script>
            alert('User has been Successfully Inserted');
            window.location.href='Add_users.php';
            </script>
<?php
    }
    else
    {
        ?>
        <script type="text/javascript">alert('not Working');
    </script>
        <?php
    }
}
 ?>
 <?php
include("includes/header.php");
include("includes/sidebar.php");
 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add
        <small>Users</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Add</a></li>
        <li class="active">Users</li>
      </ol>
    </section>
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Users</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form action="#" method="post" class="was-validated" enctype="multipart/form-data">
          <div class="row">
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="txtName" parsley-trigger="change" required
                placeholder="Full Name" class="form-control" >
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label> User Name</label>
                <input type="text" name="txtUName" parsley-trigger="change" required
                placeholder="user Name" class="form-control" >
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Phone</label>
                <input type="text" name="txtPhone" parsley-trigger="change" required
                placeholder="+923XXXXXXXXX" class="form-control" >
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Email</label>
                <input type="Email" name="txtEmail" parsley-trigger="change" required
                placeholder="Email" class="form-control" >
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
             <div class="col-md-6">
              <div class="form-group">
                <label>Address</label>
                <input type="text" name="txtAddress" parsley-trigger="change" required
                placeholder="Address" class="form-control">
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Joining Date</label>
                <input type="date" name="txtDate" parsley-trigger="change" required
                placeholder="Joining Date" class="form-control">
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Salary</label>
                <input type="Number" name="txtSalary" parsley-trigger="change" required
                placeholder="Salary" class="form-control">
              </div>
              
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">
            <div class="form-group">
              <label class="col-2 col-form-label">Image<span class="text-danger">*</span></label>
              <div class="col-12">
              <input type="file" name="image" class="form-control">
              </div>
              </div>
            </div>
           
          </div>
          <!-- /.row -->
           <button type="submit" name="BtnSubmit" class="btn btn-primary" >Submit</button>
           </form>
        </div>
      </div>
      <!-- /.box -->
    </section>

     <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users Record</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow: scroll;">
              <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                 <th>id</th>
                 <th>Full Name</th>
                  <th>User Name</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Address</th>
                  <!-- <th>Update/Delete</th> -->
                </tr>
                </thead>
                <tbody>
                                  <?php
                    $query = "SELECT * FROM user";
                    $result = mysqli_query($conn,$query);
                      if ($result->num_rows > 0) {            
                        while($row = mysqli_fetch_array($result))
                           {
                            ?> 
                                 <tr>
                                <td><?php echo $row['id']; ?></td> 
                                <td><?php echo $row['full_name']; ?></td>
                                  <td><?php echo $row['u_name']; ?></td>
                                  <td><?php echo $row['phone_no']; ?></td>
                                  <td><?php echo $row['email']; ?></td>
                                  <td><?php echo $row['Address']; ?></td>
                                        <!-- <td>
                                      <button type="button" class="btn btn-primary btn-xs dt-edit" style="margin-right:16px;">
                                          <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                      </button>
                                      <button type="button" class="btn btn-danger btn-xs dt-delete">
                                          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                      </button>
                                  </td> -->
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
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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
</div>
<!-- ./wrapper -->

<?php include("includes/scripts.php");?>

</body>
</html>
