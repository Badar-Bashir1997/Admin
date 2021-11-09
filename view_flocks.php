<?php 
 include("lib/session.php");
 include("lib/DBConn.php");
 ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css'>
<link rel="stylesheet" href="plugins/datatables/style.css">

 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->

  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
 <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

<?php
include("includes/header.php");
 ?>
 <?php
include("includes/sidebar.php");
 ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
      <h1>
        Flocks 
        <small>Records</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Farms</a></li>
        <li class="active">Flocks Records</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Flocks Record</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow: scroll;">
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" >
    <thead>
        <tr>
                  <th>Farm id</th>
                  <th>Flock id</th>
                  <th>Flock Name</th>
                  <th>Start Date</th>
                  <th>Expected End Date</th>
                  <th>Number of Birds</th>
                  <th>Purchase Cost</th>
                  <th>Status</th>
                  <th>Closed Date</th>
                  <th>Actions</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
                    $query = "SELECT * FROM flock";
                    $result = mysqli_query($conn,$query);
                      if ($result->num_rows > 0) {            
                        while($row = mysqli_fetch_array($result))
                           {
                            $f_id=$row['flock_id'];
                            $f_id1=$f_id."dlt";
                            $f_id2=$f_id."edit";
                            $f_id3=$f_id."view";
                            ?>     
                              <tr>
                                <td><?php echo $row['Farm_id']; ?></td>
                                  <td><?php echo $row['flock_id']; ?></td> 
                                  <td><?php echo $row['Flock_name']; ?></td> 
                                  <td><?php echo $row['start_date']; ?></td>
                                  <td><?php echo $row['end_date']; ?></td>
                                  <td><?php echo $row['nob']; ?></td>
                                  <td><?php echo $row['Purchase_cost']; ?></td>
                                  <td><?php echo $row['Status']; ?></td>
                                  <td><?php echo $row['closed_date']; ?></td>
                                  <td>
                                    <a href="#"><button type="button" name="<?php echo $f_id2;?>" class="btn btn-primary btn-xs dt-edit  glyphicon glyphicon-pencil" aria-hidden="true"></button></a>
                                                    <button type="submit" name="<?php echo $f_id1;?>" class="btn btn-danger btn-xs dt-delete glyphicon glyphicon-remove" aria-hidden="true"></button>
                                                    <?php 

                                                    if(isset($_REQUEST[$f_id1]))
                                                      {
                                                        $qury="SELECT farm.Status FROM farm WHERE farm.Farm_id='$f_id'";
                                                        $result1 = mysqli_query($conn,$qury);
                                                        $row1 = mysqli_fetch_array($result1);
                                                      if($row1['Status']=="Available"){
                                                        $c_date=date("y-m-d");
                                                        $qry="UPDATE farm SET farm.Status='Closed',farm.Closed_date='$c_date' WHERE farm.Farm_id='$f_id'";
                                                        $confirm_status = mysqli_query($conn,$qry);
                                                        if($confirm_status)
                                                         {
                                                          ?>
                                                          <script>
                                                              alert('Record has been Successfully updated in Database');
                                                              window.location.href='view_all_farm.php?success';
                                                              </script>
                                                          <?php
                                                      }
                                                      else
                                                      {
                                                          ?>
                                                          <script type="text/javascript">alert('not Working');
                                                          window.location.href='view_all_farm.php?success';
                                                      </script>
                                                          <?php
                                                      }
                                                      }
                                                      elseif ($row1['Status']=="Closed"){
                                                        ?>
                                                          <script>
                                                              alert('Farm is allready Deleted');
                                                              window.location.href='view_all_farm.php?success';
                                                              </script>
                                                          <?php
                                                      }
                                                      else{
                                                        ?>
                                                        <script>
                                                              alert('Farm Cannot delete Because Flock is ongoing');
                                                              window.location.href='view_all_farm.php?success';
                                                              </script>
                                                          
                                                          <?php
                                                      }
                                                    }
                                                     ?>
                                              <br>
                                              <button type="submit" name="<?php echo $f_id3;?>" class="btn btn-success btn-xs  glyphicon glyphicon-eye-open" aria-hidden="true"></button>
                                              <?php 
                                                    if(isset($_REQUEST[$f_id3]))
                                                      {
                                                        
                                                       }
                                                     ?>
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

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Row information</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

</div>
 <div class="control-sidebar-bg"></div>
</div>

<?php
include("includes/footer.php");
  ?>

  <!-- Control Sidebar -->
   <?php
include("includes/control_sidebar.php");
  ?>

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
  
<script src='https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js'></script>
<script src='https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js'></script>
<script src='https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js'></script>
<script src='https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script  src="plugins/datatables/script.js"></script>


</body>
</html>
