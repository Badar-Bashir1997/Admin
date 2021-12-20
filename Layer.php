<?php 
 include("lib/session.php");
 include("lib/DBConn.php");
 ?>
 
   </div>
  <?php
include("includes/header.php");
include("includes/sidebar.php");
 ?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Layer
        <small>Flocks</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Broiler</li>
         <li class="active">Flocks</li>
      </ol>
    </section>
    <div class="box box-default">
        <div class="box-header with-border">
      <section class="content" style="">
     <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">ongoing Flocks</a></li>
              <li><a href="#tab_2" data-toggle="tab">Sold</a></li>
            </ul>
                   <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <?php  
                $query = "SELECT *,(SELECT name FROM farm WHERE farm_id=flock.farm_id)AS name,(SELECT IFNULL(SUM(price),0) FROM expences WHERE flock_id=flock.flock_id )AS exp,(SELECT IFNULL(SUM(qnty),0) FROM production WHERE flock_id=flock.flock_id)AS production,(SELECT IFNULL(SUM(sales.sale_qnty),0) FROM sales WHERE flock_id=flock.flock_id AND sales.sale_name='Bird' AND sales.sale_type='per_kg')AS sale,(SELECT IFNULL(SUM(sales.sale_qnty),0) FROM sales WHERE flock_id=flock.flock_id AND sales.sale_name='Manure')AS manure  FROM flock Where Breed_type='Layer'AND Status='ongoing'";
                $result1  = mysqli_query($conn, $query);
                if (@$result1->num_rows > 0) 
                {
                
                 while( $row = mysqli_fetch_array($result1)) { ?>
                  <div class="row" style="margin: 20px;">
                    <div class="small-box bg-green col-md-5" >
                      <div class="row small-box-footer">
                        <div class="col-md-6">
                          <h4 style="text-align: center;" >Farm:- <?php echo $row['name']; ?></h4>
                        </div>
                        <div class="col-md-6">
                          <h4 style="text-align: center;">Flock:- <?php echo $row['Flock_name']; ?></h4>
                        </div>
                      </div>
                      <div class="inner row">
                        <div class="col-md-6">
                          <h5 style="text-align: center;">Total Expenses</h5>
                            <p style="text-align: center;"><?php echo $row['exp'];?></p>
                          <h5 style="text-align: center;">Manure Production</h5>
                            <p style="text-align: center;"><?php echo $row['production'];?></p>
                          <h5 style="text-align: center;">Manure Sales</h5>
                          <p style="text-align: center;"><?php echo $row['manure'];?></p>
                        </div>
                        <div class="col-md-6">
                          <h5 style="text-align: center;">Total Birds</h5>
                          <p style="text-align: center;"><?php echo $row['nob'];?></p>
                          <h5 style="text-align: center;">Birds Sold In Kg</h5>
                          <p style="text-align: center;"><?php echo $row['sale'];?></p>
                          <h5 style="text-align: center;">Mortality</h5>
                          <p style="text-align: center;"><?php echo $row['mortality'];?></p>
                          <h5 style="text-align: center;">Birds Remaining</h5>
                          <p style="text-align: center;"><?php echo $row['remaining'];?></p>
                        </div>
                      </div>

                      <a href="flock_detail.php?id=<?php echo $row['flock_id']; ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                <?php } 
                }
                else
                  {?>
                    <div class="row" style="margin: 20px;">
                   <div class="small-box bg-green">
                          <p style="text-align: center; font-size: 20px;">There Is No Ogoing Flock.</p>
                          <p style="text-align: center; font-size: 10px;color: aqua;"><a href="Add_flocks.php"> Please Add Flock </a></p>
                      </div>
                    </div>
                 <?php }?>
              </div>
              <div class="tab-pane" id="tab_2">
                <?php  
                $query = "SELECT *,(SELECT name FROM farm WHERE farm_id=flock.farm_id)AS name,(SELECT IFNULL(SUM(price),0) FROM expences WHERE flock_id=flock.flock_id )AS exp,(SELECT IFNULL(SUM(qnty),0) FROM production WHERE flock_id=flock.flock_id)AS production,(SELECT IFNULL(SUM(sales.sale_qnty),0) FROM sales WHERE flock_id=flock.flock_id AND sales.sale_name='Bird' AND sales.sale_type='per_kg')AS sale,(SELECT IFNULL(SUM(sales.sale_qnty),0) FROM sales WHERE flock_id=flock.flock_id AND sales.sale_name='Manure')AS manure  FROM flock Where Breed_type='Layer'AND Status='Sold'";

                $result1  = mysqli_query($conn, $query);
                if (@$result1->num_rows > 0) 
                {
                 while( $row = mysqli_fetch_array($result1)) { ?>
                  <div class="row" style="margin: 20px;">
                    <div class="small-box bg-yellow col-md-5" >
                      <div class="row small-box-footer">
                        <div class="col-md-6">
                          <h4 style="text-align: center;" >Farm:- <?php echo $row['name']; ?></h4>
                        </div>
                        <div class="col-md-6">
                          <h4 style="text-align: center;">Flock:- <?php echo $row['Flock_name']; ?></h4>
                        </div>
                      </div>
                      <div class="inner row">
                        <div class="col-md-6">
                          <h5 style="text-align: center;">Total Expenses</h5>
                            <p style="text-align: center;"><?php echo $row['exp'];?></p>
                          <h5 style="text-align: center;">Manure Production</h5>
                            <p style="text-align: center;"><?php echo $row['production'];?></p>
                          <h5 style="text-align: center;">Manure Sales</h5>
                          <p style="text-align: center;"><?php echo $row['manure'];?></p>
                        </div>
                        <div class="col-md-6">
                          <h5 style="text-align: center;">Total Birds</h5>
                          <p style="text-align: center;"><?php echo $row['nob'];?></p>
                          <h5 style="text-align: center;">Birds Sold In Kg</h5>
                          <p style="text-align: center;"><?php echo $row['sale'];?></p>
                          <h5 style="text-align: center;">Mortality</h5>
                          <p style="text-align: center;"><?php echo $row['mortality'];?></p>
                          <h5 style="text-align: center;">Birds Remaining</h5>
                          <p style="text-align: center;"><?php echo $row['remaining'];?></p>
                        </div>
                      </div>

                      <a href="flock_detail.php?id=<?php echo $row['flock_id']; ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <?php } ?>
                <?php } else { ?>
                  <div class="row" style="margin: 20px;">
                    <div class="small-box bg-green">
                       <p style="text-align: center; font-size: 20px;">You haven't sold any flock, yet!</p>
                    </div>
                  </div>
                <?php }?>
              </div>
            </div>
          </div>
      
      </section>
    </div></div>
      
    </div>
  <?php
include("includes/footer.php");
include("includes/control_sidebar.php");
include("includes/scripts.php");
  ?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

<!-- ./wrapper -->


</body>
</html>