<?php 
 include("lib/session.php");
 include("lib/DBConn.php");
 if(isset($_REQUEST['BtnSubmit']))
 {

    
      $fileinfo = PATHINFO($_FILES["image"]["name"]);
      $newFilename = $fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
      move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $newFilename);



      $location = "upload/" . $newFilename;
        $Farm=$_REQUEST['Farm'];
        $name=$_REQUEST['txtName'];
        $phone=$_REQUEST['txtPhone'];
        $Email=$_REQUEST['txtEmail'];
        $Address=$_REQUEST['txtAddress'];
        $Date=$_REQUEST['txtDate'];
        $salary=$_REQUEST['txtSalary'];
        $Status=$_REQUEST['Status'];
        $Query = "INSERT INTO employees(Farm_id,name,phone_no,email,address,join_date,salary,status,image) 
        values('$Farm','$name','$phone','$Email','$Address','$Date','$salary','$Status','$location')" ;
 $confirm_status = mysqli_query($conn,$Query);
       if($confirm_status)
       {
?>
        <script>
            alert('Employee Record has been Successfully Inserted in Database');
            window.location.href='Add_Employees.php?success';
            </script>
<?php
    }
    else
    {
        ?>
        <script type="text/javascript">alert('not Working');
        window.location.href='Add_Employees.php?success';
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
        Add
        <small>Employees</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Add</a></li>
        <li class="active">Employees</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <form action="#" method="post" class="was-validated" enctype="multipart/form-data">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Employees</h3>

          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Select Farm</label>
                <select class="form-control select2" style="width: 100%;" name="Farm" id="Farm" data-placeholder="Select Farm" onchange="Farm_id(this.value);">
                  <option></option>
                   <?php 
      
                   $query = " SELECT * FROM farm";
                    $result = mysqli_query($conn,$query);
                     while($row = mysqli_fetch_array($result)){
                     $f_id= $row['name'];
                     ?>
                  <option value="<?php echo $row['farm_id'] ?>"><?php echo $f_id ?></option>
                  <?php   }
                   ?> 
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="txtName" parsley-trigger="change" required
                placeholder="Full Name" class="form-control" >
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Phone</label>
                <input type="text" name="txtPhone" parsley-trigger="change" required
                placeholder="+923XXXXXXXXX" class="form-control" pattern="[+]{1}[9]{1}[2]{1}[0-9]{10}">
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Email</label>
                <input type="text" name="txtEmail" parsley-trigger="change" required
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
            <div class="col-md-6">
              <div class="form-group">
                <label>Status</label><br>
               <input type="radio" id="Active" name="Status" value="Active" checked>
                <label for="Active">Active</label><br>
                <input type="radio" id="block" name="Status" value="Block" >
                <label for="block">Block</label><br> 
              </div>
              <!-- /.form-group -->
            </div>
          </div>
          <!-- /.row -->
           <button type="submit" name="BtnSubmit" class="btn btn-primary" >Submit</button>
           
        </div> 
      </div>
      <!-- /.box -->
    </form>
    </section>
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Employees Record</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow: scroll;">
              <table id="example"class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Farm</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Joining Date</th>
                  <th>Salary</th>
                  <th>Status</th>
                  <th>image</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $query = "SELECT *,(SELECT name FROM farm WHERE farm_id=employees.Farm_id) AS Farm_name FROM employees Where status='Active'";
                    $result = mysqli_query($conn,$query);
                      if ($result->num_rows > 0) {            
                        while($row = mysqli_fetch_array($result))
                           {
                            ?> 
                <tr>
                                  <td><?php echo $row['id']; ?></td>
                                  <td><?php echo $row['Farm_name']; ?></td> 
                                  <td><?php echo $row['name']; ?></td>
                                  <td><?php echo $row['phone_no']; ?></td>
                                  <td><?php echo $row['email']; ?></td>
                                  <td><?php echo $row['address']; ?></td>
                                  <td><?php echo $row['join_date']; ?></td>
                                  <td><?php echo $row['salary']; ?></td>
                                  <td><?php echo $row['status']; ?></td>
                                  <td><img src="<?php echo $row['image']; ?>" width = "50" height = "50"></td>
                   <td>
                <button type="button" class="btn btn-primary btn-xs dt-edit" style="margin-right:16px;">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-danger btn-xs dt-delete">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
            </td>
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
