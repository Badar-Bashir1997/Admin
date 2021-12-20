<?php 
 include("lib/session.php");
 include("lib/DBConn.php");
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
        Payments
        <small>Records</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Payments</a></li>
        <li class="active">payment options And History</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Payments options</h3>
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
               <button type="submit" name="BtnSubmit" class="btn btn-primary" >Submit</button>
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
              <h3 class="box-title">Payments History</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow: scroll;">
              <table id="example"  class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                  <th>payed By</th>
                  <th>payment Purpose</th>
                  <th>Date</th>
                  <th>Payment Type</th>
                  <th>Amount</th>
                  <th>Update/Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>xyz</td>
                  <td>xyz</td>
                  <td>xyz</td>
                  <td>xyz</td>
                  <td> xyz</td>
                   <td>
                <button type="button" class="btn btn-primary btn-xs dt-edit" style="margin-right:16px;">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-danger btn-xs dt-delete">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
            </td>
                </tr>
                
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
include("includes/footer.php");
  ?>

  <!-- Control Sidebar -->
   <?php
include("includes/control_sidebar.php");
  ?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php include("includes/scripts.php");?>

</body>
</html>
