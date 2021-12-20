<?php 
 include("lib/session.php");
 include("lib/DBConn.php");

include("includes/header.php");
include("includes/sidebar.php");
 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Farms 
        <small>Records</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="javascript:void(0)" class="active">Farms</a></li>
       
      </ol>
    </section>
    <form action="#" method="post" name="form">
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Farms Record</h3>
              <a class="btn btn-success pull-right"href="Add_farm.php">+Add Farm</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body " style="overflow-x: scroll;">
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>

                        <tr>
                                  <th>Farm ID</th>
                                  <th>Name</th>
                                  <th>Location</th>
                                  <th>Bread Type</th>
                                  <th>Birds Capacity</th>
                                  <th>Phone no</th>
                                  <th>Status</th>
                                  <th>Action</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $query = "SELECT * FROM farm";
                                      $result = mysqli_query($conn,$query);
                                        if ($result->num_rows > 0) {            
                                          while($row = mysqli_fetch_array($result))
                                             {
                                              $f_id=$row['farm_id'];
                                              $f_id1=$f_id."dlt";
                                              $f_id2=$f_id."edit";
                                              $f_id3=$f_id."view";
                                              ?>      
                                                <tr>
                                                    <td><?php echo $f_id; ?></td> 
                                                    <td><?php echo $row['name']; ?></td>
                                                    <td><?php echo $row['location']; ?></td>
                                                    <td><?php echo $row['Breed_type']; ?></td>
                                                    <td><?php echo $row['bird_capacity']; ?></td>
                                                    <td><?php echo $row['phone_no']; ?></td>
                                                    <td><?php echo $row['Status']; ?></td>
                                                    <td>
                                               <a class="btn btn-success btn-xs dt-add  glyphicon glyphicon-plus" aria-hidden="true" href="Add_flocks.php?id=<?php echo $f_id; ?>"></a>

                                                <a class="btn btn-primary btn-xs dt-edit  glyphicon glyphicon-pencil" aria-hidden="true" href="update_farm.php?id=<?php echo $f_id; ?>"></a>
                                                
                                                <a class="btn btn-success btn-xs  glyphicon glyphicon-eye-open" aria-hidden="true" href="view_flocks.php?id=<?php echo $f_id; ?>"></a>
                                                     
                                                    <button type="submit" name="<?php echo $f_id1;?>" class="btn btn-danger btn-xs dt-delete glyphicon glyphicon-remove" aria-hidden="true"></button>
                                                    <?php 

                                                    if(isset($_REQUEST[$f_id1]))
                                                      {
                                                        $qury="SELECT farm.Status FROM farm WHERE farm.farm_id='$f_id'";
                                                        $result1 = mysqli_query($conn,$qury);
                                                        $row1 = mysqli_fetch_array($result1);
                                                      if($row1['Status']=="Available"){

                                                        $c_date=date("y-m-d");
                                                        $qry="UPDATE farm SET farm.Status='Closed',farm.Closed_date='$c_date' WHERE farm.farm_id='$f_id'";
                                                        $confirm_status = mysqli_query($conn,$qry);
                                                        if($confirm_status)
                                                         {
                                                          ?>
                                                          <script>
                                                              alert('Record has been Successfully updated in Database');
                                                              window.location.href='view_all_farm.php';
                                                              </script>
                                                          <?php
                                                      }
                                                      else
                                                      {
                                                          ?>
                                                          <script type="text/javascript">alert('not Working');
                                                          window.location.href='view_all_farm.php';
                                                      </script>
                                                          <?php
                                                      }
                                                      }
                                                      elseif ($row1['Status']=="Closed"){
                                                        ?>
                                                          <script>
                                                              alert('Farm is allready Deleted');
                                                              window.location.href='view_all_farm.php';
                                                              </script>
                                                          <?php
                                                      }
                                                      else{
                                                        ?>
                                                        <script>
                                                              alert('Farm Cannot delete Because Flock is ongoing');
                                                              window.location.href='view_all_farm.php';
                                                              </script>
                                                          
                                                          <?php
                                                      }
                                                    }
                                                     ?>
                                              
                                            
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


                                    </div>
                                                <!-- /.box-body -->
                                              </div>
                                              <!-- /.box -->
                                            </div>
                                            <!-- /.col -->
                                          </div>
                                          <!-- /.row -->
                                        </section>
                                    </form>
                                    </div>

<?php
include("includes/footer.php");
  ?>

  <!-- Control Sidebar -->
   <?php
include("includes/control_sidebar.php");
  ?>
 <div class="control-sidebar-bg"></div>
</div>
<?php  include("includes/scripts.php");?>


</body>
</html>
