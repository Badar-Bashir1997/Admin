<?php 
 include("lib/session.php");
 include("lib/DBConn.php");
 if(isset($_REQUEST['BtnSubmit']))
 {
  
        $name=$_REQUEST['txtName'];
        $model=$_REQUEST['txtModel'];
        $reg=$_REQUEST['txtReg'];
        $Query = "INSERT INTO vehicals(name,model,reg_no) 
        values('$name','$model','$reg')" ;
 $confirm_status = mysqli_query($conn,$Query);
       if($confirm_status)
       {
?>
        <script>
            alert('Vehical has been Successfully Inserted');
            window.location.href='Add_Vehical.php';
            </script>
<?php
    }
    else
    {
        ?>
        <script type="text/javascript">alert('not Working');
        window.location.href='Add_Vehical.php';
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
        <small>Vehicals</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Add</a></li>
        <li class="active">Vehicals</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
<form action="#" method="post" class="was-validated">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Vehicals</h3>

          
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
                <label>Model</label>
                <input type="text" name="txtModel" parsley-trigger="change" required
                placeholder="Enter Model" class="form-control"  >
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Registration NO</label>
                <input type="text" name="txtReg" parsley-trigger="change" required
                placeholder="Enter Registration NO" class="form-control" >
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
             
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
              <h3 class="box-title">Vehicals Record</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow: scroll;">
              <table id="example"  class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Name</th>
                  <th>Model</th>
                  <th>Registration NO</th>
                  <th>Update/Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $query = "SELECT * FROM vehicals";
                    $result = mysqli_query($conn,$query);
                      if ($result->num_rows > 0) {            
                        while($row = mysqli_fetch_array($result))
                           {
                            ?>      
                              <tr>
                                  <td><?php echo $row['id']; ?></td> 
                                  <td><?php echo $row['name']; ?></td>
                                  <td><?php echo $row['model']; ?></td>
                                  <td><?php echo $row['reg_no']; ?></td>
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
<!-- ./wrapper -->

<?php include("includes/scripts.php");?>

</body>
</html>
