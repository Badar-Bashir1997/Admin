<?php 
 include("lib/session.php");
 include("lib/DBConn.php");
 if(isset($_GET['id'])){
            $id = $_GET['id'];
$qq="SELECT *,(SELECT IFNULL(SUM(remaining),0) FROM production WHERE production.p_name='Manure'AND flock_id=flock.flock_id)AS manure_p,(SELECT IFNULL(SUM(qnty),0) FROM production WHERE production.p_name='Manure'AND flock_id=flock.flock_id)AS manure_rem,(SELECT IFNULL(SUM(sales.sale_qnty),0) FROM sales WHERE sales.sale_name='Manure'AND flock_id=flock.flock_id)AS manure_sale, (SELECT IFNULL(SUM(remaining),0) FROM production WHERE production.p_name='Egg'AND flock_id=flock.flock_id)AS egg_rem,(SELECT IFNULL(SUM(qnty),0) FROM production WHERE production.p_name='Egg'AND flock_id=flock.flock_id)AS egg_p,(SELECT IFNULL(SUM(sale_qnty),0) FROM sales WHERE sales.sale_name='Egg'AND flock_id=flock.flock_id)AS egg_sale FROM flock WHERE flock_id='".$id."'";
$result11 = mysqli_query($conn,$qq);
$row11 = mysqli_fetch_array($result11);
    }

    // $qry=" SELECT expences.e_name,SUM(expences.price)AS exp FROM expences WHERE flock_id='$id' GROUP BY expences.e_name ";
    // $rslt=mysqli_query($conn, $qry);
    
  
include("includes/header.php");
include("includes/sidebar.php");
 ?>
  
  <!-- Left side column. contains the logo and sidebar -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Flocks
        <small>Records</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Flocks Records</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><img class="ion" src="upload/broiler.png" alt="Image"></span>

            <div class="info-box-content">
              <span class="info-box-number">Flock</span>
              <span class="info-box-text "><?php echo $row11['Flock_name']; ?></span>
            </div>
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><img class="ion" src="upload/broiler.png" alt="User Image"></span>
            <?php 

            $q="SELECT IFNULL(SUM(expences.price),0) AS EXP FROM expences WHERE expences.flock_id='".$id."'";
            $result=mysqli_query($conn, $q);
            $row= mysqli_fetch_array($result);
            $exp=$row['EXP'];
             ?>
            <div class="info-box-content">
              <span class="info-box-number">Total Expenditure</span>
              <span class="info-box-text"><?php echo $exp; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><img class="ion" src="upload/broiler.png" alt="User Image"></span>
            <?php 

            $q="SELECT IFNULL(SUM(sales.recived_amount),0) AS ti FROM sales WHERE sales.flock_id='".$id."'";
            $result=mysqli_query($conn, $q);
            $row= mysqli_fetch_array($result);
            $ti=$row['ti'];
             ?>
            <div class="info-box-content">
              <span class="info-box-number">Total Income</span>
              <span class="info-box-text"><?php echo $ti; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><img class="ion" src="upload/broiler.png" alt="User Image"></span>

            <div class="info-box-content">
              <span class="info-box-number">Profit Loss</span>
              <?php
              if($exp>$ti)
              {
                $p_l=$exp-$ti;
                ?>
                <span class="info-box-text">Loss</span> 
               <span class="info-box-text"><?php echo $p_l ?></span> 
               <?php  
              } 
              else
              {
                $p_l=$ti-$exp;
                ?>
                <span class="info-box-text">Profit</span>
                <span class="info-box-text"><?php echo $p_l ?></span>
                <?php 
              }
              
              ?>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><img class="ion" src="upload/broiler.png" alt="User Image"></span>
            <div class="info-box-content">
              <span class="info-box-number">Total Mortality</span>
              <span class="info-box-text"><?php echo $row11['mortality']; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
       <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><img class="ion" src="upload/broiler.png" alt="User Image"></span>
            <div class="info-box-content">
              <span class="info-box-number">Total Egg Production</span>
              <span class="info-box-text"><?php echo $row11['egg_p']; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <form>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Today's Update</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#mortality_modal1">Mortality
                </button>
                <?php if( $row11['Breed_type'] == "Layer")  { ?>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#egg_modal2">Egg Production</button>
                <?php } ?>
                <button type="button" class="btn btn-primary  " data-toggle="modal" data-target="#manure_modal3">Manure Production</button>
                <button type="button" class="btn btn-warning " data-toggle="modal" data-target="#exp_modal4">Expenses</button>
            </div>
           
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        </form>
      </div>

      
<div class="row">
        <form>
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Sale</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#manure_sale">Manure Sale
                </button>
                <?php if( $row11['Breed_type'] == "Layer")  { ?>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#egg_sale">Egg Sale</button>
                <?php } ?>
                <button type="button" class="btn btn-primary  " data-toggle="modal" data-target="#bird_sale">Bird Sale</button>
                
            </div>
           
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        </form>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Details</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              
                <!-- <div class="col-md-6">
                  <p class="text-center">
                    <strong>Expenses</strong>
                  </p>
             <div class="box-body">
                 <div class="progress-group">
                    <span class="progress-text">aa</span>
                    <span class="progress-number"><b>160</b>/200</span>
                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                    </div>
                  </div>
                  <div class="progress-group">
                    <span class="progress-text">Complete Purchase</span>
                    <span class="progress-number"><b>310</b>/400</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                    </div>
                  </div>
                  <div class="progress-group">
                    <span class="progress-text">xyz</span>
                    <span class="progress-number"><b>480</b>/800</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                    </div>
                  </div>
                  <div class="progress-group">
                    <span class="progress-text">xyz</span>
                    <span class="progress-number"><b>250</b>/500</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                    </div>
                  </div>
           
        </div>
                </div> -->
                <!-- /.col -->
                <div class="col-md-12">
                  <p class="text-center">
                    <strong>Sales</strong>
                  </p>
                  <?php if( $row11['Breed_type'] == "Layer")  { ?>
                  <div class="progress-group">
                    <span class="progress-text">Eggs</span>
                    <span class="progress-number"><b><?php echo $row11['egg_sale'];?></b>/<?php echo $row11['egg_p'];?></span>
                    <?php
                    $calculate=0;
                    if($row11['egg_p']>0){$calculate = ($row11['egg_sale']/$row11['egg_p'])*100;}
                    // $calculate = 50.7;
                    $egg_percentage='style='.'"'.'width: '.$calculate.'%'.'";';
                    ?>
                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" <?php echo $egg_percentage;?>></div>
                    </div>
                  </div>
                  <?php } ?>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Manure</span>
                    <span class="progress-number"><b><?php echo $row11['manure_sale'];?></b>/<?php echo $row11['manure_p'];?></span>
                     <?php
                     $calculate=0;
                     if($row11['manure_p']>0){$calculate = ($row11['manure_sale']/$row11['manure_p'])*100;}
                    // $calculate = 50.7;
                    $manure_percentage='style='.'"'.'width: '.$calculate.'%'.'";';
                    ?>
                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" <?php echo $manure_percentage;?>></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <!-- <div class="progress-group">
                    <span class="progress-text">Birds</span>
                    <span class="progress-number"><b>480</b>/800</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                    </div>
                  </div> -->
                  <!-- /.progress-group -->
                  <!-- <div class="progress-group">
                    <span class="progress-text">xyz</span>
                    <span class="progress-number"><b>250</b>/500</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                    </div>
                  </div> -->
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
             
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      
    </section>
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Expenses</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x: scroll;">
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                                  <th>Flock ID</th>
                                  <th>Farm Name</th>
                                  <th>Flock Name</th>
                                  <th>Expense</th>
                                  <th>Name</th>
                                  <th>Quantity</th>
                                  <th>Price</th>
                                  <th>Expense Date</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $query = "SELECT * ,(SELECT name FROM farm WHERE farm_id=expences.farm_id) AS Farm_name,(SELECT Flock_name FROM flock WHERE flock_id=expences.flock_id)AS Flock_name FROM expences WHERE flock_id='".$id."'";
                                      $result = mysqli_query($conn,$query);
                                        if ($result->num_rows > 0) {            
                                          while($row = mysqli_fetch_array($result))
                                             {
                                              $s_t=$row['sub_type'];
                                              ?>      
                                                <tr>
                                                    <td><?php echo $row['flock_id']; ?></td>
                                                    <td><?php echo $row['Farm_name']; ?></td> 
                                                    <td><?php echo $row['Flock_name']; ?></td>
                                                    <td><?php echo $row['e_name']; ?></td>
                                                    <?php 
                                                    if($s_t=="No")
                                                    {
                                                      ?>
                                                      <td><?php echo "Flock Purchase"; ?></td>
                                                      <?php  
                                                    }
                                                    else
                                                    {
                                                     ?>
                                                     <td><?php echo $s_t; ?></td>
                                                     <?php  
                                                    }?>
                                                    <td><?php echo $row['e_qnty']; ?></td>
                                                    <td><?php echo $row['price']; ?></td>
                                                    <td><?php echo $row['e_date']; ?></td>
                                                    
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
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Sales</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x: scroll;">
                <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                                  <th>Flock ID</th>
                                  <th>Flock Name</th>
                                  <th>Name</th>
                                  <th>Sale Type</th>
                                  <th>Quantity</th>
                                  <th>Price Per Unit</th>
                                  <th>Total Price</th>
                                  <th>Recived Amount</th>
                                  <th>Payment Method</th>
                                  <th>Broker</th>
                                  <th>Driver</th>
                                  <th>Sale Date</th>
                                  <th>Remaining</th>
                                  <th>Balance</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $query = "SELECT *,(SELECT Flock_name FROM flock WHERE flock.flock_id=sales.flock_id)AS Flock_name,(SELECT name FROM broker WHERE broker.b_id=sales.b_id)AS b_id,(SELECT name FROM driver WHERE driver.id=sales.d_id)AS d_id FROM sales WHERE flock_id='".$id."'";
                                      $result = mysqli_query($conn,$query);
                                        if ($result->num_rows > 0) {            
                                          while($row = mysqli_fetch_array($result))
                                             {
                                              
                                              ?>      
                                                <tr>
                                                    <td><?php echo $row['flock_id']; ?></td> 
                                                    <td><?php echo $row['Flock_name']; ?></td>
                                                    <td><?php echo $row['sale_name']; ?></td>
                                                    <td><?php echo $row['sale_type']; ?></td>
                                                    <td><?php echo $row['sale_qnty']; ?></td>
                                                    <td><?php echo $row['price_per_unit']; ?></td>
                                                    <td><?php echo $row['total_price']; ?></td>
                                                    <td><?php echo $row['recived_amount']; ?></td>
                                                    <td><?php echo $row['payment_method']; ?></td>
                                                    <td><?php echo $row['b_id']; ?></td>
                                                    <td><?php echo $row['d_id']; ?></td>
                                                    <td><?php echo $row['sale_date']; ?></td>
                                                    <td><?php echo $row['remaining']; ?></td>
                                                    <td><?php echo $row['balance']; ?></td>
                                                    
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
  
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Production</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x: scroll;">
                <table id="example2" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                                  <th>Flock ID</th>
                                  <th>Flock Name</th>
                                  <th>Production Name</th>
                                  <th>Quantity</th>
                                  <th>Production Date</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    if( $row11['Breed_type'] == "Layer")  {
                                      $query22 = "SELECT *,(SELECT Flock_name FROM flock WHERE flock_id=production.flock_id)AS Flock_name FROM production WHERE flock_id='".$id."'";
                                      }
                                      else
                                      {
                                        $query22 = "SELECT *,(SELECT Flock_name FROM flock WHERE flock_id=production.flock_id)AS Flock_name FROM production WHERE p_name='Manure' AND flock_id='".$id."'";
                                      }
                                      $result22 = mysqli_query($conn,$query22);            
                                          while(@$row = mysqli_fetch_array($result22))
                                             {
                                              
                                              ?>      
                                                <tr>
                                                    <td><?php echo $row['flock_id']; ?></td>
                                                    <td><?php echo $row['Flock_name']; ?></td>
                                                    <td><?php echo $row['p_name']; ?></td>
                                                    <td><?php echo $row['qnty']; ?></td>
                                                    <td><?php echo $row['p_date']; ?></td>
                                                    
                                                       </tr>
                                                         <?php
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
  
 
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- sales -->
  <?php 
  include('sales_popup.php');
  ?>
  <!-- sales -->
                  <!-- mortality -->
                  <div class="modal inmodal " id="mortality_modal1" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false" >
            <div class="modal-dialog " >
                <div class="modal-content animated flipInY ">
                    <div class="modal-header">
                      <strong>Add Mortality</strong>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        
                    </div>
                    <form method="post" id="mortality_form" class="was-validated">
                        <div class="modal-body">
                          <div class="row">
                            <div class="form-group col-md-12">
                              <label >Number Of Birds: <span style="color:red; display: none;"  id="mortality_p_eror">Pleas Enter The Valid Number Of Birds</span></label>
                              <input type="Number" name="NumberOfBirds" id="NumberOfBirds" placeholder="Maximum Number of Birds=<?php echo $row11['remaining'];?>"  required class="form-control">
                              <input type="hidden" name="flock_id" id="flock_id" value="<?php echo $id; ?>">
                            </div>
                          </div>
                            
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            <button type="button" class="ladda-button btn btn-primary" id="mortality" data-style="expand-right">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
                <!-- mortality -->
                <!-- Egg production -->
                <div class="modal inmodal" id="egg_modal2" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" >
                <div class="modal-content animated flipInY">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h5 class="modal-title">Add Eggs Production</h5>
                    </div>
                    <form method="post" id="egg_form" class="was-validated">
                        <div class="modal-body">
                          <div class="row">
                            <div class="form-group col-md-12">
                              <label >Number Of Eggs: <span style="color:red; display: none;" id="Egg_p_eror">Pleas Enter The Valid Number Of Eggs</span></label>
                              <input type="Number" name="NumberOfEggs" id="NumberOfEggs" placeholder="Enter Number Of Eggs"  required class="form-control">
                              <label >Date: <span style="color:red; display: none;" id="Egg_p_dt_eror">Pleas Enter Date</span></label>
                              <input type="Date" name="Egg_date" id="Egg_date"  required class="form-control">
                              <input type="hidden" name="flock_id" id="flock_id" value="<?php echo $id; ?>">
                              <input type="hidden" name="farm_id" id="farm_id" value="<?php echo $row11['farm_id']; ?>">
                            </div>
                          </div>  
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            <button type="button" class="ladda-button btn btn-primary" id="Add_egg" data-style="expand-right">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
                <!-- manure -->
               <div class="modal inmodal" id="manure_modal3" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" >
                <div class="modal-content animated flipInY">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h5 class="modal-title">Add Manure</h5>
                    </div>
                    <form method="post" id="manure_form" class="was-validated">
                        <div class="modal-body">
                            <div class="row">
                            <div class="form-group col-md-12">
                              <label >Quantity Of Manure: <span style="color:red; display: none;" id="manure_p_eror">Pleas Enter The Valid Quantity</span></label>
                              <input type="Number" name="manure_qnty" id="manure_qnty" placeholder="Enter Manure Quantity"  required class="form-control">
                              <label >Date : <span style="color:red; display: none;" id="manure_p_dt_eror">Pleas Enter Date</span></label>
                              <input type="Date" name="manure_date" id="manure_p_date"  required class="form-control">
                              <input type="hidden" name="flock_id" id="flock_id" value="<?php echo $id; ?>">
                              <input type="hidden" name="farm_id" id="farm_id" value="<?php echo $row11['farm_id']; ?>">
                            </div>
                          </div>  
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            <button type="button" class="ladda-button btn btn-primary" id="Add_manure" data-style="expand-right">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
                <!-- manure -->
                <!-- Expanses -->
                <div class="modal inmodal" id="exp_modal4" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" id="add_vehicles_body">
                <div class="modal-content animated flipInY">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h5 class="modal-title">Add Expenses</h5>
                    </div>
                    <form method="post" id="add_vehicle_form" >
                        <div class="modal-body">
                            <div class="box-body">
              <button type="button" id="exp_btn" class="btn btn-danger " data-toggle="modal" data-target="#electricity_modal1">Electricity
                </button>
                <button type="button"id="exp_btn" class="btn btn-success" data-toggle="modal" data-target="#feed_modal2">Feed</button>
                <button type="button"id="exp_btn" class="btn btn-primary  " data-toggle="modal" data-target="#diesel_modal3">Diesel</button>
                <button type="button"id="exp_btn" class="btn btn-warning " data-toggle="modal" data-target="#wood_modal4">Wood</button>
                <button type="button"id="exp_btn" class="btn btn-warning " data-toggle="modal" data-target="#medicine_modal5">Medicine</button>
            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            <button type="button" class="ladda-button btn btn-primary" id="submit_vehicle" data-style="expand-right">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
                <!-- Expanses -->
                 <!-- Electricity -->
                  <div class="modal inmodal " id="electricity_modal1" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false" >
            <div class="modal-dialog " >
                <div class="modal-content animated flipInY ">
                    <div class="modal-header">
                      <strong>Electricity Expenses</strong>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        
                    </div>
                    <form method="post" id="electricity_form" class="was-validated">
                        <div class="modal-body">
                            
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            <button type="button" class="ladda-button btn btn-primary" id="electricity" data-style="expand-right">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
                <!-- Electricity -->
                 <!-- Feed -->
                  <div class="modal inmodal " id="feed_modal2" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false" >
            <div class="modal-dialog " >
                <div class="modal-content animated flipInY ">
                    <div class="modal-header">
                      <strong>Feed</strong>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        
                    </div>
                    <form method="post" id="feed_form" class="was-validated">
                        <div class="modal-body">
                          <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Feed Expenses</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Feed Name</label>
                
                 <select class="form-control select2" style="width: 100%;" name="txtName" id="txtName" data-placeholder="Select Feed Name" onchange="Feed_q(this.value);" required >
                  <option></option>
                   <?php 
      
                   $query = " SELECT * FROM purchase WHERE purchase.remaining>0 AND purchase.name='Feed' GROUP BY purchase.type ";
                    $result = mysqli_query($conn,$query);
                     while($row = mysqli_fetch_array($result))
                     {
                     $f_name= $row['type'];
                     $feed_remaining=$row['remaining'];
                     ?>
                  <option><?php echo $f_name ?></option>
                  <?php   }
                   ?> 
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Quantity</label>
                <input type="Number" name="txtqnty" parsley-trigger="change" required
                 class="form-control" id="txtqnty" placeholder="" >
                
              </div>
              <!-- /.form-group -->
            </div>
            
            <!-- /.col -->
             <div class="col-md-12">
              <div style="margin: auto;width: 60%;">
              <div class="form-group">
                <label>Date</label>
                <input type="date" name="txtDate" parsley-trigger="change" 
                placeholder="" class="form-control">
              </div>
              <!-- /.form-group -->
            </div>
            </div>
           

          </div>
          <!-- /.row -->
          
        </div>
        <!-- /.box-body -->

        
        
      </div>
      <!-- /.box -->
                            <input type="hidden" name="flock_id" id="flock_id" value="<?php echo $id; ?>">
                              <input type="hidden" name="farm_id" id="farm_id" value="<?php echo $row11['farm_id']; ?>">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            <button type="button" class="ladda-button btn btn-primary" id="feed" data-style="expand-right">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
                <!-- Feed -->
                 <!-- Diesel -->
                  <div class="modal inmodal " id="diesel_modal3" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false" >
            <div class="modal-dialog " >
                <div class="modal-content animated flipInY ">
                    <div class="modal-header">
                      <strong>Diesil Expenses</strong>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        
                    </div>
                    <form method="post" id="diesel_form" class="was-validated">
                        <div class="modal-body">
                           <div class="row">
            <div class="col-md-6">
              
              <?php 

                $q="SELECT type,IFNULL(SUM(remaining),0)AS diesel FROM purchase WHERE purchase.remaining>0 AND purchase.name='Diesel'";
                $result1 = mysqli_query($conn,$q);
                $row_dsl = mysqli_fetch_array($result1);
                $ttl_dsl="Total Diesel=".$row_dsl['diesel'];
                 ?>
              <div class="form-group">
                <label>Diesel Quantity</label>
               <input type="text" name="qnty_of_dsl" parsley-trigger="change" required
                 class="form-control" id="qnty_of_dsl" placeholder="<?php echo $ttl_dsl; ?>">
                

              </div>
              
              
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <!-- /.col -->
             <div class="col-md-6">
              <div class="form-group">
                <label>Date</label>
                <input type="Date" name="d_Date" parsley-trigger="change" required
                 class="form-control" id="d_Date">
              </div>
            

              
              <!-- /.form-group -->
            </div>
          </div>
          
                            
                            <input type="hidden" name="flock_id" id="flock_id" value="<?php echo $id; ?>">
                              <input type="hidden" name="farm_id" id="farm_id" value="<?php echo $row11['farm_id']; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            <button type="button" class="ladda-button btn btn-primary" id="diesel" data-style="expand-right">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
                <!-- Diesel -->
                 <!-- Wood -->
                  <div class="modal inmodal " id="wood_modal4" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false" >
            <div class="modal-dialog " >
                <div class="modal-content animated flipInY ">
                    <div class="modal-header">
                      <strong>Add Wood</strong>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        
                    </div>
                    <form method="post" id="wood_form" class="was-validated">
                        <div class="modal-body">
                           <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <?php 
                $q="SELECT type,IFNULL(SUM(remaining),0)AS wood FROM purchase WHERE purchase.remaining>0 AND purchase.name='Wood'";
                $result1 = mysqli_query($conn,$q);
                $row1 = mysqli_fetch_array($result1);
                $ttl_wood="Total Wood=".$row1['wood'];
                 ?>
                <label>Wood Quantity</label>
               <input type="Number" name="qnty_of_wood" parsley-trigger="change" required
                placeholder="<?php echo $ttl_wood; ?>" class="form-control" id="qnty_of_wood">
              </div>
            </div>
            <!-- /.col -->
            <!-- /.col -->
             <div class="col-md-6">
              <div class="form-group">
                <label>Date</label>
                <input type="Date" name="d_Date" parsley-trigger="change" required
                 class="form-control" id="d_Date">
              </div>
            
           
              <!-- /.form-group -->
            </div>
          </div>
                            
                            <input type="hidden" name="flock_id" id="flock_id" value="<?php echo $id; ?>">
                              <input type="hidden" name="farm_id" id="farm_id" value="<?php echo $row11['farm_id']; ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            <button type="button" class="ladda-button btn btn-primary" id="wood" data-style="expand-right">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
                <!-- Wood -->
                 <!-- Medicine -->
                  <div class="modal inmodal " id="medicine_modal5" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false" >
            <div class="modal-dialog " >
                <div class="modal-content animated flipInY ">
                    <div class="modal-header">
                      <strong>Medicine Expenses</strong>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        
                    </div>
                    <form method="post" id="medicine_form" class="was-validated">
                        <div class="modal-body">
                          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Medicine Name</label>
                
                 <select class="form-control select2" style="width: 100%;" name="txtName" id="txtName" data-placeholder="Select Medicine Name" onchange="Mdsn_q(this.value);" required >
                  <option></option>
                   <?php 
      
                   $query = "SELECT id,type FROM purchase WHERE purchase.remaining>0 AND purchase.name='Medicine'";
                    $result = mysqli_query($conn,$query);
                     while($row = mysqli_fetch_array($result))
                     {
                     $f_name= $row['type'];
                     ?>
                  <option value="<?php echo $f_name; ?>"><?php echo $f_name ?></option>
                  <?php   }
                   ?> 
                </select>
              </div>
            </div>
             <div class="col-md-6">
                <div class="form-group">
                <label>Quantity</label>
                <input type="Number" name="mdsnqnty" parsley-trigger="change" required
                 class="form-control" id="mdsnqnty" placeholder="" >
                
              </div>

              
            </div>
          </div>
          <!-- /.row -->
          <div class="col-md-12">
              <div style="margin: auto;width: 60%;" >
          <div class="form-group">
                <label>Expense Date</label>
                <input type="Date" name="d_Date" parsley-trigger="change" required
                 class="form-control" id="d_Date">
              </div>
            </div>
          </div>
                         <input type="hidden" name="flock_id" id="flock_id" value="<?php echo $id; ?>">
                              <input type="hidden" name="farm_id" id="farm_id" value="<?php echo $row11['farm_id']; ?>">   
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            <button type="button" class="ladda-button btn btn-primary" id="medicine" data-style="expand-right">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
                <!-- Medicine -->

<?php
include("includes/footer.php");
include("includes/control_sidebar.php");
include("includes/scripts.php");
  ?>
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->


</body>
</html>
<script type="text/javascript">
   function Mdsn_q(str) {                   
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) 
                  {
                    window.t = this.responseText; 
                    document.getElementById('mdsnqnty').placeholder="Maximum Number of Packets="+window.t;
                  }
                       
                      };
                   xhttp.open("GET", "mdsn_qnty.php?q="+str, true);
                   xhttp.send();
                
                      }
                       function onRegister()
                       {
                         var b = parseInt(window.t);
                    if(document.form.txtqnty.value>b)
                        {
                         alert("Enter Valid Number of packets \r\n You Enter Greater Value than Maximum");
                        document.form.txtqnty.focus();
                           return (false);
                             }
             
                                 else
                              {
                             return (true);
                                 }
                               }
                               function Feed_q(str) {                   
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) 
                  {
                    window.t = this.responseText; 
                    document.getElementById('txtqnty').placeholder="Maximum Number of Bags="+window.t;
                  }
                       
                      };
                   xhttp.open("GET", "feed_qnty.php?q="+str, true);
                   xhttp.send();
                
                      }
                       function onRegister()
                       {
                         var b = parseInt(window.t);
                    if(document.form.txtqnty.value>b)
                        {
                         alert("Enter Valid Number of Bags \r\n You Enter Greater Value than Maximum");
                        document.form.txtqnty.focus();
                           return (false);
                             }
             
                                 else
                              {
                             return (true);
                                 }
                               }
$(document).on("click" , "#medicine" , function() 
  {
    var medicine = $("#mdsnqnty").val();
    if(medicine>=0)
    {
    $.ajax({ 
    type : 'POST',
    url : 'ajax/flock_detail_ajax.php',
    data : $('#medicine_form').serialize(),
    success: function(response)
    {
      if(response=="Medicine Successfully Added")
      {
        toastr.success(response, 'Success');
        $("#mdsnqnty").val('');
        $("#mdsnqnty").attr('placeholder','');
        $('#medicine_modal5').modal('hide');
        $('#medicine_form')[0].reset();
         setTimeout(function(){ window.location = "flock_detail.php?id=<?php echo $id ?>"; }, 2000);
      }
      else
      {
        toastr.error(response);
      }
    }
    });
    }
    else
    {
      $("#mdsnqnty").val('');
    }
   
  });




$(document).on("click" , "#wood" , function() 
  {
    var wood = $("#qnty_of_wood").val();
    if(wood>=0)
    {
    $.ajax({ 
    type : 'POST',
    url : 'ajax/flock_detail_ajax.php',
    data : $('#wood_form').serialize(),
    success: function(response)
    {
      if(response=="Wood Successfully Added")
      {
        toastr.success(response, 'Success');
        $('#wood_modal4').modal('hide');
        var wood1=parseInt('<?php echo $row1['wood'];?>');
        var wood_rem=wood1-wood;
        $('#qnty_of_wood').attr('placeholder','Total Wood='+wood_rem);
        $('#wood_form')[0].reset();
         setTimeout(function(){ window.location = "flock_detail.php?id=<?php echo $id ?>"; }, 2000);
      }
      else
      {
        toastr.error(response);
      }
    }
    });
    }
    else
    {
      $("#qnty_of_wood").val('');
    }
   
  });




$(document).on("click" , "#diesel" , function() 
  {
    var diesel = $("#qnty_of_dsl").val();
    if(diesel>=0)
    {
    $.ajax({ 
    type : 'POST',
    url : 'ajax/flock_detail_ajax.php',
    data : $('#diesel_form').serialize(),
    success: function(response)
    {
      if(response=="Diesel Successfully Added")
      {
        toastr.success(response, 'Success');
        $('#diesel_modal3').modal('hide');
        var diesel1=parseInt('<?php echo $row_dsl['diesel'];?>');
        var diesel_remain=diesel1-diesel;
        $('#qnty_of_dsl').attr('placeholder','Total diesel='+diesel_remain);
        $('#diesel_form')[0].reset();
         setTimeout(function(){ window.location = "flock_detail.php?id=<?php echo $id ?>"; }, 2000);
      }
      else
      {
        toastr.error(response);
      }
    }
    });
    }
    else
    {
      $("#qnty_of_dsl").val('');
    }
   
  });



  $(document).on("click" , "#exp_btn" , function() 
  {
    $('#exp_modal4').modal('hide');
  });
  $(document).on("click" , "#mortality" , function() 
  {
    var nob = $("#NumberOfBirds").val();
    if(nob>0 && nob<"<?php echo $row11['remaining'];?>")
    { console.log('bdr');
    $.ajax({ 
    type : 'POST',
    url : 'ajax/flock_detail_ajax.php',
    data : $('#mortality_form').serialize(),
    success: function(response)
    {
      if(response=="ok")
      {
        toastr.success(response, 'Success');
        $("#NumberOfBirds").val('');
        $('#mortality_modal1').modal('hide');
        $("#NumberOfBirds").attr('placeholder','');
        $('#mortality_form')[0].reset();
         setTimeout(function(){ window.location = "flock_detail.php?id=<?php echo $id ?>"; }, 2000);
      }
      else
      {
        toastr.error(response);
      }
    }
    });
    }
    else
    {
      $('#mortality_p_eror').css("display", "");
      $("#NumberOfBirds").val('');
    }
   
  });

   $(document).on("click" , "#Add_egg" , function() 
  {
    var noe = $("#NumberOfEggs").val();
    if (noe<=0) 
    {
      $('#Egg_p_eror').css("display", "");
      $("#NumberOfEggs").val('');
    }
      else if($("#Egg_date").val()=='')
      {
        $('#Egg_p_dt_eror').css("display", "");
      }
    else
    {
    $.ajax({ 
    type : 'POST',
    url : 'ajax/flock_detail_ajax.php',
    data : $('#egg_form').serialize(),
    success: function(response)
    {
      if(response=="Eggs Successfully Added")
      {
        toastr.success(response, 'Success');
                $('#egg_modal2').modal('hide');
        setTimeout(function(){ window.location = "flock_detail.php?id=<?php echo $id ?>"; }, 2000);
      }
      else
      {
        toastr.error(response);
      }
    }
    });
    }
  });



   $(document).on("click" , "#Add_manure" , function() 
  {
    var noe = $("#manure_qnty").val();
    if (noe<=0) 
    {
      $('#manure_p_eror').css("display", "");
      $("#manure_qnty").val('');
    }
      else if($("#manure_p_date").val()=='')
      {
        $('#manure_p_eror').css("display", "none");
        $('#manure_p_dt_eror').css("display", "");
      }
        else
    {
    $.ajax({ 
    type : 'POST',
    url : 'ajax/flock_detail_ajax.php',
    data : $('#manure_form').serialize(),
    success: function(response)
    {
      if(response=="Manure Successfully Added")
      {
        toastr.success(response, 'Success');
        $("#manure_qnty").val('');
        $('#manure_modal3').modal('hide');
        $("#manure_qnty").attr('placeholder','');
        $('#manure_form')[0].reset();
        setTimeout(function(){ window.location = "flock_detail.php?id=<?php echo $id ?>"; }, 2000);
      }
      else
      {
        toastr.error(response);
      }
    }
    });
    }
    
   
  });


    $(document).on("click" , "#feed" , function() 
  {
    var feed = $("#txtqnty").val();
    if(feed>0 && feed<=parseInt('<?php echo $feed_remaining;?>'))
    {
    $.ajax({ 
    type : 'POST',
    url : 'ajax/flock_detail_ajax.php',
    data : $('#feed_form').serialize(),
    success: function(response)
    {
      if(response=="Feed Successfully Added")
      {
        toastr.success(response, 'Success');
        $("#txtqnty").val('');
        $("#txtqnty").attr('placeholder','');
        $('#feed_modal2').modal('hide');
        $('#feed_form')[0].reset();
         setTimeout(function(){ window.location = "flock_detail.php?id=<?php echo $id ?>"; }, 2000);
      }
      else
      {
        toastr.error(response);
      }
    }
    });
    }
    else
    {      $("#txtqnty").val('');
    }
   
  });
</script>
<script>
 function totalp3(nm){
                  var num = parseInt(nm);
                  var num2= parseInt(document.getElementById('bird_qnty').value);
                    window.ttl=num*num2;
                 
                  $(".t_amount").text("Total Amount="+window.ttl);
                }
function totalp4(nm){
                    var num2= parseInt(document.getElementById('bird_price').value);
                  var num = parseInt(nm);
                    window.ttl=num*num2;
                 
                  $(".t_amount").text("Total Amount="+window.ttl);
                }   




$(document).on("click" , "#Add_Bird_sale" , function() 
  {
    var q = $("#bird_qnty").val();
    if(q>0)
    {
    $.ajax({ 
    type : 'POST',
    url : 'ajax/flock_detail_ajax.php',
    data : $('#bird_sale_form').serialize(),
    success: function(response)
    {
      if(response=="Birds Successfully Sold")
      {
        toastr.success(response, 'Success');
        $("#bird_qnty").val('');
        $('#bird_sale').modal('hide');
         setTimeout(function(){ window.location = "flock_detail.php?id=<?php echo $id ?>"; }, 2000);
        
      }
      else
      {
        toastr.error(response);
      }
    }
    });
    }
    else
    {
      $('#bird_sale_error').css("display", "");
      $("#bird_qnty").val('');
    }
       });


$(document).on("click" , "#per_kg" , function() 
  {
   document.getElementById('bird_qnty').placeholder='Enter Quantity In Kg' ;
   document.getElementById('bird_sale_type').value='per_kg'; 
  });



$(document).on("click" , "#per_bird" , function() 
  {
    var q=parseFloat('<?php echo $row11['remaining'];?>');
   document.getElementById('bird_qnty').placeholder='Maximum Number of Birds='+q ;
   document.getElementById('bird_sale_type').value='per_bird'; 
  });


 function totalp(nm){
                  var num = parseInt(nm);
                  var num2= parseInt(document.getElementById('NumberOfEggs_sale').value);
                    window.ttl=num*num2;
                 
                  $(".t_amount").text("Total Amount="+window.ttl);
                }
function totalp1(nm){
                    var num2= parseInt(document.getElementById('egg_price').value);
                  var num = parseInt(nm);
                    window.ttl=num*num2;
                 
                  $(".t_amount").text("Total Amount="+window.ttl);
                }   


    
    $(document).on("click" , "#per_crate" , function() 
  {
    var q=parseFloat('<?php echo $row11['egg_rem'];?>');
    window.c=q/360;
   document.getElementById('NumberOfEggs_sale').placeholder='Maximum Number of Crates='+window.c ;
   document.getElementById('egg_sale_type').value='per_crate' ; 
   $( "#NumberOfEggs_sale" ).prop( "disabled", false );
  });

    $(document).on("click" , "#per_tray" , function() 
  {
    var q=parseFloat('<?php echo $row11['egg_rem'];?>');
    window.c=q/30;
   document.getElementById('NumberOfEggs_sale').placeholder='Maximum Number of Tray='+window.c ;
   document.getElementById('egg_sale_type').value='per_tray' ; 
   $( "#NumberOfEggs_sale" ).prop( "disabled", false );
  });
    $(document).on("click" , "#per_egg" , function() 
  {
    window.c=parseFloat('<?php echo $row11['egg_rem'];?>');
    
   document.getElementById('NumberOfEggs_sale').placeholder='Maximum Number of Eggs='+window.c ;
   document.getElementById('egg_sale_type').value='per_egg' ; 
   $( "#NumberOfEggs_sale" ).prop( "disabled", false );
  });




    $(document).on("click" , "#Add_egg_sales" , function() 
  {
    var q = $("#NumberOfEggs_sale").val();
    if(q>0 && q<=window.c)
    {
    $.ajax({ 
    type : 'POST',
    url : 'ajax/flock_detail_ajax.php',
    data : $('#egg_sale_form').serialize(),
    success: function(response)
    {
      if(response=="Eggs Successfully Sold")
      {
        toastr.success(response, 'Success');
        $("#NumberOfEggs_sale").val('');
        $('#egg_sale').modal('hide');
         setTimeout(function(){ window.location = "flock_detail.php?id=<?php echo $id ?>"; }, 2000);
      }
      else
      {
        toastr.error(response);
      }
    }
    });
    }
    else
    {
      $('#egg_sale_error').css("display", "");
      $("#NumberOfEggs_sale").val('');
    }
       });

$(document).on("click" , "#Sale_manure" , function() 
  {
    var q = $("#manure_qnty_sale").val();
    if(q>0)
    {
    $.ajax({ 
    type : 'POST',
    url : 'ajax/flock_detail_ajax.php',
    data : $('#manure_sales_form').serialize(),
    success: function(response)
    {
      if(response=="Manure Successfully Sold")
      {
        toastr.success(response, 'Success');
        $('#manure_sale').modal('hide');
        var mnur1=parseInt('<?php echo $row11['manure_rem'];?>');
        var mnur_remain=mnur1-q;
        $('#manure_qnty_sale').attr('placeholder','Total Manure='+mnur_remain);
        $('#manure_sales_form')[0].reset();
         setTimeout(function(){ window.location = "flock_detail.php?id=<?php echo $id ?>"; }, 2000);
      }
      else
      {
        toastr.error(response);
      }
    }
    });
    }
    else
    {
      $('#manure_sale_error').css("display", "");
      $("#manure_qnty_sale").val('');
    }
       });       </script>


       <script type="text/javascript">
function remain(tl)
                   {
                    var chk_remain = 0;
                    var chk_blns = 0;
                    var d_b_rem = parseInt(window.rmng1); // Remaining From Database
                    var d_b_bls = parseInt(window.blns1); // Balance From Database
                    var tol_bill  = window.ttl;  //Total= price * Quantity
                    var ent_amnt = parseInt(tl); // Entered Amount
                    if(tol_bill>ent_amnt)
                    { console.log('1');
                       chk_remain= tol_bill-ent_amnt;
                       if(d_b_rem>0)
                       { console.log('1.1');
                        $(".remaning").val(chk_remain+d_b_rem);
                        $(".balance").val(0);
                       }
                       else if(d_b_bls>0 && d_b_bls>chk_remain)
                       { console.log('1.2');
                        $(".balance").val(d_b_bls-chk_remain);
                        $(".remaning").val(0);
                       }
                       else if(d_b_bls>0 && d_b_bls<chk_remain)
                       { console.log('1.2');
                        $(".balance").val(0);
                        $(".remaning").val(chk_remain-d_b_bls);
                       }
                       else
                       { console.log('1.3');
                        $(".balance").val(chk_blns);
                        $(".remaning").val(chk_remain);
                       }
                    }
                    else
                    { console.log('2');
                      chk_blns=ent_amnt-tol_bill;
                      if(d_b_bls>0)
                       { console.log('2.1');
                        $(".balance").val(d_b_bls+chk_blns);
                        $(".remaning").val(0);
                       }
                       else if(d_b_rem>0 && d_b_rem>chk_blns)
                       { console.log('2.2');
                        $(".remaning").val(d_b_rem-chk_blns);
                        $(".balance").val(0);
                       }
                       else if(d_b_rem>0 && d_b_rem<chk_blns)
                       { console.log('2.2.1');
                        $(".remaning").val(0);
                        $(".balance").val(chk_blns-d_b_rem);
                       }
                       else
                       { console.log('2.3');
                        $(".balance").val(chk_blns);
                        $(".remaning").val(chk_remain);
                       }
                    }
                   }


  
  $(document).on("change" , ".broker" , function(e) {
    var broker_id = $(this).val();
    // console.log(broker_id);
    $(".remaning").val('');
    $(".balance").val('');
    $(".txtamount").val('');
    $(".remaning").attr('placeholder','');
    $(".balance").attr('placeholder','');

    $.ajax({ 
      type : 'POST',
      url : 'ajax/flock_detail_ajax.php',
      dataType: 'JSON',
      data : {'brkr':broker_id},
      success: function(response)
      { 
        // console.log("rmng"+response['rmng']);
        // console.log("blns"+response['blns']);

        // var lnth = response.length;
        // for(var i=0; i<lnth; i++){
            window.blns1 = response['blns'];
            window.rmng1 = response['rmng'];
            $(".remaning").attr('placeholder','Remaning='+response['rmng']);
            $(".balance").attr('placeholder','Balance='+response['blns']);
        // }
       
      }

    });

});



</script>