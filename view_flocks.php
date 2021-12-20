<?php 
 include("lib/session.php");
 include("lib/DBConn.php");
 if(isset($_GET['id'])){
  $Farmid = $_GET['id'];
    }
include("includes/header.php");
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
        <li><a href="index.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="javascript:void(0)"class="active">Farms</a></li>
        
      </ol>
    </section>
    <section class="content">
      <form action="#" method="post" name="form">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Flocks Record</h3>
              <a class="btn btn-success pull-right"href="Add_flocks.php">+Add Flock</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x: scroll;">
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" >
    <thead>
        <tr>      
                  <th>Flock ID</th>
                  <th>Farm Name</th>
                  <th>Flock Name</th>
                  <th>Breed Type</th>
                  <th>Start Date</th>
                  <th>Expected End Date</th>
                  <th>Number of Birds</th>
                  <th>Remaining</th>
                  <th>Purchase Cost</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Closed Date</th>
                  <th>Actions</th>
            
        </tr>
    </thead>
    <tbody>
        <?php 
        if( @$Farmid)
          {$q1="SELECT *,(SELECT name FROM farm WHERE farm_id='$Farmid')AS f_name FROM flock WHERE farm_id='$Farmid'";}
          else 
          {$q1="SELECT *,(SELECT name FROM farm WHERE farm.farm_id=flock.farm_id)AS f_name FROM flock WHERE Status='ongoing'OR Status='Sold'";}
        
        $result = mysqli_query($conn,$q1);
          if (@$result->num_rows > 0) {      
            foreach($result as $row) {      
            // while( $row = mysqli_fetch_array($result) ) {
                $f_id   = $row['flock_id'];
                $f_id1  = $f_id."dlt";
                $f_id2  = $f_id."edit";
                $f_id3  = $f_id."view";
                $total= $row['Purchase_cost']*$row['nob'];?>     
              <tr>
                <td><?php echo $row['flock_id']; ?></td>
                <td><?php echo $row['f_name']; ?></td> 
                <td><?php echo $row['Flock_name']; ?></td>
                <td><?php echo $row['Breed_type']; ?></td> 
                <td><?php echo $row['start_date']; ?></td>
                <td><?php echo $row['end_date']; ?></td>
                <td><?php echo $row['nob']; ?></td>
                <td><?php echo $row['remaining']; ?></td>
                <td><?php echo $row['Purchase_cost']; ?></td>
                <td><?php echo $total; ?></td>
                <td><?php echo $row['Status']; ?></td>
                <td><?php echo $row['closed_date']; ?></td>
                <td>
                  <!-- <a href="#">
                    <button type="button" name="<?php echo $f_id2;?>" class="btn btn-primary btn-xs dt-edit  glyphicon glyphicon-pencil" aria-hidden="true"></button>
                  </a> -->
                  <button type="submit" name="<?php echo $f_id1;?>" class="btn btn-danger btn-xs dt-delete glyphicon glyphicon-remove" aria-hidden="true"></button>
                  <?php if( isset($_REQUEST[$f_id1]) ) {
                    $qury     ="SELECT flock.Status FROM flock WHERE flock.flock_id='$f_id'";
                    $result1  = mysqli_query($conn,$qury);
                    $row1     = mysqli_fetch_array($result1);
                    if( $row1['Status']=="ongoing"|| $row1['Status']=="Sold" ) { ?>
                      <script type="text/javascript">
                        if ( confirm("Are you sure want to delete") ) {
                          var txt="<?php echo $f_id; ?>";
                         $.ajax({
                            url: "dlt_flock.php?q="+txt,
                            type: 'get',
                            success: function(response){
                              if(response=="ok") {
                                alert('Flock Has Been Successfully Deleted From Database');
                                window.location.href = 'view_flocks.php';
                              } else {
                               alert('Not Working');
                                window.location.href = 'view_flocks.php'; 
                              }
                            }
                          });
                        } else {
                          var txt = "Cancel";
                        }

                       
                      </script>
                    <?php } ?>
                  <?php } ?>
                </td>
              </tr>
            <?php }
          } else {
            echo "No Result Found";
          } ?>
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
    </form>
    </section>

</div>
 <div class="control-sidebar-bg"></div>
</div>

<?php
include("includes/footer.php");

   // Control Sidebar 
include("includes/control_sidebar.php");

 include("includes/scripts.php");
?>

  



</body>
</html>
