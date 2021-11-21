<?php 
 include("lib/session.php");
 include("lib/DBConn.php");
 if(isset($_GET['id'])){
            $id = $_GET['id'];
$qq="SELECT remaining,Farm_id,Breed_type FROM flock WHERE flock_id='$id'";
$result11 = mysqli_query($conn,$qq);
$row11 = mysqli_fetch_array($result11);


    }

    // $qry=" SELECT expences.e_name,SUM(expences.price)AS exp FROM expences WHERE flock_id='$id' GROUP BY expences.e_name ";
    // $rslt=mysqli_query($conn, $qry);
    
   
 ?>
<!DOCTYPE html>
<html>
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

  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link href="plugins/toastr/toastr.min.css" rel="stylesheet">
  
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
 <?php
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
            <span class="info-box-icon bg-yellow"><img class="ion" src="upload/broiler.png" alt="User Image"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Flock</span>
              <span class="info-box-number"><?php echo $id; ?></span>
            </div>
            <!-- /.info-box-content -->
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
              <span class="info-box-text">Total Expenditure</span>
              <span class="info-box-number"><?php echo $exp; ?></span>
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
              <span class="info-box-text">Total Income</span>
              <span class="info-box-number"><?php echo $ti; ?></span>
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
              <span class="info-box-text">Profit Loss</span>
              <?php
              if($exp>$ti)
              {
                $p_l=$exp-$ti;
                ?>
                <span class="info-box-number">Loss</span> 
               <span class="info-box-number"><?php echo $p_l ?></span> 
               <?php  
              } 
              else
              {
                $p_l=$ti-$exp;
                ?>
                <span class="info-box-number">Profit</span>
                <span class="info-box-number"><?php echo $p_l ?></span>
                <?php 
              }
              
              ?>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
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
              
                <div class="col-md-6">
                  <p class="text-center">
                    <strong>Expenses</strong>
                  </p>
             <div class="box-body">
                   <?php 
                  // while( $row2= mysqli_fetch_array($rslt))
                  // {
                  ?>
                 <div class="progress-group">
                    <span class="progress-text"></span>
                    <span class="progress-number"><b>160</b>/200</span>
                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                    </div>
                  </div>
               <?php 
              // }
            ?>
                  <!-- /.progress-group -->
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
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">xyz</span>
                    <span class="progress-number"><b>250</b>/500</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                    </div>
                  </div>
           
        </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <p class="text-center">
                    <strong>Sales</strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text">xyz</span>
                    <span class="progress-number"><b>160</b>/200</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Complete Purchase</span>
                    <span class="progress-number"><b>310</b>/400</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">xyz</span>
                    <span class="progress-number"><b>480</b>/800</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">xyz</span>
                    <span class="progress-number"><b>250</b>/500</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                    </div>
                  </div>
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
            <div class="box-body" style="overflow: scroll;">
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                                  <th>Farm ID</th>
                                  <th>Flock ID</th>
                                  <th>Expense</th>
                                  <th>Name</th>
                                  <th>Quantity</th>
                                  <th>Price</th>
                                  <th>Expense Date</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $query = "SELECT * FROM expences WHERE flock_id='".$id."'";
                                      $result = mysqli_query($conn,$query);
                                        if ($result->num_rows > 0) {            
                                          while($row = mysqli_fetch_array($result))
                                             {
                                              $s_t=$row['sub_type'];
                                              ?>      
                                                <tr>
                                                    <td><?php echo $row['Farm_id']; ?></td> 
                                                    <td><?php echo $row['flock_id']; ?></td>
                                                    <td><?php echo $row['e_name']; ?></td>
                                                    <?php 
                                                    if($s_t=="No")
                                                    {
                                                      ?>
                                                      <td><?php echo ""; ?></td>
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
            <div class="box-body" style="overflow: scroll;">
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                                  <th>Farm ID</th>
                                  <th>Flock ID</th>
                                  <th>Name</th>
                                  <th>Quantity</th>
                                  <th>Total Price</th>
                                  <th>Recived Amount</th>
                                  <th>Sale Date</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $query = "SELECT * FROM sales WHERE flock_id='".$id."'";
                                      $result = mysqli_query($conn,$query);
                                        if ($result->num_rows > 0) {            
                                          while($row = mysqli_fetch_array($result))
                                             {
                                              
                                              ?>      
                                                <tr>
                                                    <td><?php echo $row['Farm_id']; ?></td> 
                                                    <td><?php echo $row['flock_id']; ?></td>
                                                    <td><?php echo $row['sale_name']; ?></td>
                                                    <td><?php echo $row['s_qnty']; ?></td>
                                                    <td><?php echo $row['price']; ?></td>
                                                    <td><?php echo $row['recived_amount']; ?></td>
                                                    <td><?php echo $row['s_date']; ?></td>
                                                    
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
                  <!-- mortality -->
                  <div class="modal inmodal " id="mortality_modal1" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false" >
            <div class="modal-dialog " >
                <div class="modal-content animated flipInY ">
                    <div class="modal-header">
                      <strong>Add Mortality</strong>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        
                    </div>
                    <form method="post" id="mortality_form">
                        <div class="modal-body">
                          <div class="row">
                            <div class="form-group col-md-12">
                              <label >Number Of Birds: <span style="color:red;" hidden id="eror">Pleas Enter The Valid Number Of Birds</span></label>
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
                        <h5 class="modal-title">Add New Vehicle</h5>
                    </div>
                    <form method="post" id="egg_form">
                        <div class="modal-body">
                          <div class="row">
                            <div class="form-group col-md-12">
                              <label >Number Of Eggs: <span style="color:red;" hidden id="eror1">Pleas Enter The Valid Number Of Eggs</span></label>
                              <input type="Number" name="NumberOfEggs" id="NumberOfEggs" placeholder="Enter Number Of Eggs"  required class="form-control">
                              <label >Date</label>
                              <input type="Date" name="Egg_date" id="Egg_date"  required class="form-control">
                              <input type="hidden" name="flock_id" id="flock_id" value="<?php echo $id; ?>">
                              <input type="hidden" name="farm_id" id="farm_id" value="<?php echo $row11['Farm_id']; ?>">
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
                    <form method="post" id="manure_form">
                        <div class="modal-body">
                            <div class="row">
                            <div class="form-group col-md-12">
                              <label >Quantity Of Manure: <span style="color:red;" hidden id="eror1">Pleas Enter The Valid Quantity</span></label>
                              <input type="Number" name="manure_qnty" id="manure_qnty" placeholder="Enter Manure Quantity"  required class="form-control">
                              <label >Date</label>
                              <input type="Date" name="manure_date" id="manure_date"  required class="form-control">
                              <input type="hidden" name="flock_id" id="flock_id" value="<?php echo $id; ?>">
                              <input type="hidden" name="farm_id" id="farm_id" value="<?php echo $row11['Farm_id']; ?>">
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
                    <form method="post" id="add_vehicle_form">
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
                    <form method="post" id="electricity_form">
                        <div class="modal-body">
                            
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            <button type="button" class="ladda-button btn btn-primary" id="mortality" data-style="expand-right">Add</button>
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
                      <strong>Add Mortality</strong>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        
                    </div>
                    <form method="post" id="feed_form">
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
      
                   $query = " SELECT name FROM feed WHERE feed.remaining>0 GROUP BY feed.name ";
                    $result = mysqli_query($conn,$query);
                     while($row = mysqli_fetch_array($result))
                     {
                     $f_name= $row['name'];
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
                <script>
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
                                    
                  </script>
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
                            
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            <button type="button" class="ladda-button btn btn-primary" id="mortality" data-style="expand-right">Add</button>
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
                    <form method="post" id="diesel_form">
                        <div class="modal-body">
                           <div class="row">
            <div class="col-md-6">
              
              <?php 
                $q="SELECT IFNULL(SUM(desiel.remaining),0)AS Q FROM desiel";
                $result1 = mysqli_query($conn,$q);
                $row1 = mysqli_fetch_array($result1);
                $ttl_dsl="Total Diesel=".$row1['Q'];
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
          
                            
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            <button type="button" class="ladda-button btn btn-primary" id="mortality" data-style="expand-right">Add</button>
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
                      <strong>Add Mortality</strong>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        
                    </div>
                    <form method="post" id="wood_form">
                        <div class="modal-body">
                           <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <?php 
                $q="SELECT IFNULL(SUM(wood.remaining),0)AS Q FROM wood";
                $result1 = mysqli_query($conn,$q);
                $row1 = mysqli_fetch_array($result1);
                $ttl_wood="Total Wood=".$row1['Q'];
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
                            
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            <button type="button" class="ladda-button btn btn-primary" id="mortality" data-style="expand-right">Add</button>
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
                    <form method="post" id="medicine_form">
                        <div class="modal-body">
                          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Medicine Name</label>
                
                 <select class="form-control select2" style="width: 100%;" name="txtName" id="txtName" data-placeholder="Select Medicine Name" onchange="Mdsn_q(this.value);" required >
                  <option></option>
                   <?php 
      
                   $query = "SELECT medicine_name FROM medicine WHERE medicine.remaining>0 GROUP BY medicine.medicine_name ";
                    $result = mysqli_query($conn,$query);
                     while($row = mysqli_fetch_array($result))
                     {
                     $f_name= $row['medicine_name'];
                     ?>
                  <option><?php echo $f_name ?></option>
                  <?php   }
                   ?> 
                </select>
              </div>
            </div>
             <div class="col-md-6">
                <div class="form-group">
                <label>Quantity</label>
                <input type="Number" name="txtqnty" parsley-trigger="change" required
                 class="form-control" id="txtqnty" placeholder="" >
                <script>
                    function Mdsn_q(str) {                   
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) 
                  {
                    window.t = this.responseText; 
                    document.getElementById('txtqnty').placeholder="Maximum Number of Packets="+window.t;
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
                                    
                  </script>
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
                            
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            <button type="button" class="ladda-button btn btn-primary" id="mortality" data-style="expand-right">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
                <!-- Medicine -->

<?php
include("includes/footer.php");
include("includes/control_sidebar.php");
  ?>
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.js"></script>
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
<script src="plugins/toastr/toastr.min.js"></script>
</body>
</html>
<script type="text/javascript">
  $(document).on("click" , "#exp_btn" , function() 
  {
    $('#exp_modal4').modal('hide');
  });
  $(document).on("click" , "#mortality" , function() 
  {
    var nob = $("#NumberOfBirds").val();
    if(nob>=0 && nob<"<?php echo $row11['remaining'];?>")
    {
    $.ajax({ 
    type : 'POST',
    url : 'ajax/mortality_ajax.php',
    data : $('#mortality_form').serialize(),
    success: function(response)
    {
      if(response=="ok")
      {
        toastr.success(response, 'Success');
        $("#NumberOfBirds").val('');
        $('#mortality_modal1').modal('hide');
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
      $('#eror').modal('show');
      $("#NumberOfBirds").val('');
    }
   
  });

   $(document).on("click" , "#Add_egg" , function() 
  {
    var noe = $("#NumberOfEggs").val();
    if(noe>=0)
    {
    $.ajax({ 
    type : 'POST',
    url : 'ajax/mortality_ajax.php',
    data : $('#egg_form').serialize(),
    success: function(response)
    {
      if(response=="Eggs Successfully Added")
      {
        toastr.success(response, 'Success');
        $("#NumberOfEggs").val('');
        $('#egg_modal2').modal('hide');
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
      $('#eror1').modal('show');
      $("#NumberOfEggs").val('');
    }
   
  });



   $(document).on("click" , "#Add_manure" , function() 
  {
    var noe = $("#manure_qnty").val();
    if(noe>=0)
    {
    $.ajax({ 
    type : 'POST',
    url : 'ajax/mortality_ajax.php',
    data : $('#manure_form').serialize(),
    success: function(response)
    {
      if(response=="Manure Successfully Added")
      {
        toastr.success(response, 'Success');
        $("#manure_qnty").val('');
        $('#manure_modal3').modal('hide');
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
      $('#eror1').modal('show');
      $("#manure_qnty").val('');
    }
   
  });
</script>
