<?php 
 include("lib/session.php");
 include("lib/DBConn.php");
 if(isset($_REQUEST['BtnSubmit']))
 {
        $fileinfo = PATHINFO($_FILES["image"]["name"]);
      $newFilename = $fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
      move_uploaded_file($_FILES["image"]["tmp_name"],"upload/vendors/" . $newFilename);
      $location = "upload/vendors/" . $newFilename;
        $name=$_REQUEST['txtName'];
        $phone=$_REQUEST['txtPhone'];
        $id_card=$_REQUEST['cnic'];
        $Address=$_REQUEST['txtAddress'];
        $txtbanum=$_REQUEST['txtbanum'];
        $txtbname=$_REQUEST['txtbname'];
        $Query = "INSERT INTO vendors(name,phone_no,id_card,Address,bank_name,account_number,balance,remaining,image) 
        values('$name','$phone','$id_card','$Address','$txtbname','$txtbanum','0','0','$location')" ;
 $confirm_status = mysqli_query($conn,$Query);
       if($confirm_status)
       {
        header("location:vandors.php");
    }
    else
    {
        header("location:vandors.php");
    }
}
 
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
        <small>Vendors</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Add</a></li>
        <li class="active">Vendors</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
<form action="#" method="post" class="was-validated" enctype="multipart/form-data">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Vendors</h3>

          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <!-- /.col -->
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
                placeholder="+923XXXXXXXXX" class="form-control" pattern="[+]{1}[9]{1}[2]{1}[0-9]{10}"  >
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>ID Card Number</label>
                <input type="text" class="form-control" id="cnic" placeholder="Enter CNIC" name="cnic"  pattern="^[0-9]{5}-[0-9]{7}-[0-9]$" required>
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
            <div class="col-md-6" >
              <div class="form-group">
                <label>Bank Name</label>
                <input type="text" name="txtbname" parsley-trigger="change"
                placeholder="Please Enter Bank Name" class="form-control">
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6" >
              <div class="form-group">
                <label>Bank Account Number</label>
                <input type="Number" name="txtbanum" parsley-trigger="change"
                placeholder="Please Enter Bank Account Number" class="form-control">
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
           
        </div>
        <!-- /.box-body -->

        
        
      </div>
    </form>
      <!-- /.box -->
    </section>

 
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Vendors Record</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x: scroll;">
              <table id="example"  class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>CNIC</th>
                  <th>Address</th>
                  <th>Bank Name</th>
                  <th>Account Number</th>
                  <th>Remaining</th>
                  <th>Balance</th>
                  <th>Image</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $query = "SELECT * FROM vendors";
                    $result = mysqli_query($conn,$query);
                      if ($result->num_rows > 0) {            
                        while($row = mysqli_fetch_array($result))
                           {
                            ?>      
                              <tr>
                                  <td><?php echo $row['v_id']; ?></td> 
                                  <td><?php echo $row['name']; ?></td>
                                  <td><?php echo $row['phone_no']; ?></td>
                                  <td><?php echo $row['id_card']; ?></td>
                                  <td><?php echo $row['Address']; ?></td>
                                  <td><?php echo $row['bank_name']; ?></td>
                                  <td><?php echo $row['account_number']; ?></td>
                                  <td><?php echo $row['remaining']; ?></td>
                                  <td><?php echo $row['balance']; ?></td>
                                  <td><img src="<?php echo $row['image']; ?>" width = "50" height = "50"></td>
                                  <td>
                             
                            <a href="#"><span class="btn btn-primary btn-xs dt-edit  glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                  <a href="#" 
                            onClick="return confirm('Are you sure you want to delete')"; title="Delete"> <span class="btn btn-danger btn-xs dt-delete glyphicon glyphicon-remove" aria-hidden="true"></span></a>
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
<?php include("includes/scripts.php");?>
</body>
</html>
