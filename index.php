<?php 
 include("lib/session.php");
 include("lib/DBConn.php");
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 <?php
include("includes/header.php");
 ?>
 <?php
include("includes/sidebar.php");
 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="box-body">
    <form action="#" method="post" name="form">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Start Date</label>
                <input type="Date" name="s_Date" parsley-trigger="change" required
                 class="form-control" id="s_Date">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>End Date</label>
                <input type="Date" name="e_date" parsley-trigger="change" required
                 class="form-control" id="e_date">
          </div>
        </div>
      </div>
      <button type="submit" name="BtnSubmit" class="btn btn-primary"  >Submit</button>
    </form>
  </div>
  <?php 
   $tl=0;
   $ttl_e=0;
   $p_l=0;
if(isset($_REQUEST['BtnSubmit']))
    {
       $dataPoints = array();
       $dataPoints1 = array();
        $start_Date=$_REQUEST['s_Date'];
        $end_date=$_REQUEST['e_date'];
        $s_date=new DateTime($_REQUEST['s_Date']);
         $e_date=new DateTime($_REQUEST['e_date']);
        $qry="SELECT flock_id FROM flock WHERE start_date>='$start_Date' AND end_date<='$end_date' ";
         $result = mysqli_query($conn,$qry);
         
        while($row = mysqli_fetch_array($result))
         {
        $flk_id=$row['flock_id'];
        $Query = "SELECT (IFNULL(SUM(bags_sales.price),0) + (SELECT IFNULL(SUM(broiler_sales.price),0) FROM broiler_sales WHERE broiler_sales.flock_id='$flk_id')+(SELECT IFNULL(SUM(egg_sales.price),0)FROM egg_sales WHERE egg_sales.flock_id='$flk_id')+(SELECT IFNULL(SUM(menure_sales.price),0)FROM menure_sales WHERE menure_sales.flock_id='$flk_id')+(SELECT IFNULL(SUM(layer_sales.price),0) FROM layer_sales WHERE layer_sales.flock_id='$flk_id')) as ttl FROM bags_sales WHERE bags_sales.flock_id=' $flk_id' ";
        $result1 = mysqli_query($conn,$Query);
        $row1 = mysqli_fetch_array($result1);
        $tl =$tl+$row1['ttl'];
          $Query1="SELECT (IFNULL(SUM(desiel.price),0) + (SELECT IFNULL(SUM(flock.Purchase_cost),0) FROM flock WHERE flock.flock_id='$flk_id')+(SELECT IFNULL(SUM(medicine.price),0)FROM medicine WHERE medicine.flock_id='$flk_id')+(SELECT IFNULL(SUM(misc.price),0)FROM misc WHERE misc.flock_id='$flk_id')+(SELECT IFNULL(SUM(wood.price),0) FROM wood WHERE wood.flock_id='$flk_id')) as t_e FROM desiel WHERE desiel.flock_id='$flk_id'";
        $result2 = mysqli_query($conn,$Query1);
        $row2 = mysqli_fetch_array($result2);
        $ttl_e =$ttl_e+$row2['t_e'];
              }
              $p_l=$tl-$ttl_e;
               for($i = $s_date; $i <= $e_date; $i->modify('+1 day'))
              {
                 $st_date=$i->format('Y-m-d');
               $Query2="SELECT (IFNULL(SUM(desiel.price),0) + (SELECT IFNULL(SUM(flock.Purchase_cost),0) FROM flock WHERE flock.start_date='$st_date'ORDER BY flock.start_date)+(SELECT IFNULL(SUM(medicine.price),0)FROM medicine WHERE medicine.m_date='$st_date' ORDER BY medicine.m_date)+(SELECT IFNULL(SUM(misc.price),0)FROM misc WHERE misc.m_date='$st_date'ORDER BY misc.m_date)+(SELECT IFNULL(SUM(wood.price),0) FROM wood WHERE wood.w_date='$st_date'ORDER BY wood.w_date)) as te FROM desiel WHERE desiel.d_date='$st_date'ORDER BY desiel.d_date";
               $result3 = mysqli_query($conn,$Query2);
              $row3 = mysqli_fetch_array($result3);
              $r=$row3['te'];

              $Query3="SELECT (IFNULL(SUM(bags_sales.price),0) + (SELECT IFNULL(SUM(broiler_sales.price),0) FROM broiler_sales WHERE broiler_sales.sale_date='$st_date' ORDER BY broiler_sales.sale_date)+(SELECT IFNULL(SUM(egg_sales.price),0)FROM egg_sales WHERE egg_sales.Sale_Date='$st_date' ORDER BY egg_sales.Sale_Date)+(SELECT IFNULL(SUM(layer_sales.price),0)FROM layer_sales WHERE layer_sales.s_date='$st_date' ORDER BY layer_sales.s_date)+(SELECT IFNULL(SUM(menure_sales.price),0) FROM menure_sales WHERE menure_sales.m_date='$st_date' ORDER BY menure_sales.m_date)) as ti FROM bags_sales WHERE bags_sales.b_date='$st_date' ORDER BY bags_sales.b_date";
               $result4 = mysqli_query($conn,$Query3);
              $row4 = mysqli_fetch_array($result4);
              $ti=$row4['ti'];              
              if($ti>0 && $r<=0){
              array_push($dataPoints, array("y" =>$r, "label" =>$st_date));
             }
              if($r>0){
               array_push($dataPoints, array("y" =>$r, "label" =>$st_date));
             }
             if($r>0 && $ti<=0){
              array_push($dataPoints1, array("y" =>$ti, "label" =>$st_date));
             }
             if($ti>0){
               array_push($dataPoints1, array("y" =>$ti, "label" =>$st_date));
             }
            }?>

            
              <script>chart_v();</script> 
             <?php 
             }
           
            ?>
            

      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php 
                 $query=" SELECT count(f_id) as f_id FROM farm";
                $result1 = mysqli_query($conn, $query);
               $row = mysqli_fetch_array($result1);
               ?>
              <h3><?php echo $row['f_id']; ?></h3>
              <p>Number of Farms</p>
            </div>
            <div class="icon">
              <i class="fa fa-industry"></i>
            </div>
            <a href="view_all_farm.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php 
                 $query=" SELECT count(f_id) as f_id FROM flock";
                $result1 = mysqli_query($conn, $query);
               $row = mysqli_fetch_array($result1);

               ?>
              <h3><?php echo $row['f_id']; ?></h3>

              <p>Number of Flocks</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="view_flocks.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $ttl_e; ?></h3>
              <p>Totel Expenditure</p>
            </div>
            <div class="icon">
              <i class="fa fa-money "></i>
            </div>
            <a href="view_ttl_exp.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $p_l ?></h3>

              <p>Profit/Loss</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php 
                 $query=" SELECT count(id) as id FROM employees WHERE employees.status='Active'";
                $result1 = mysqli_query($conn, $query);
               $row = mysqli_fetch_array($result1);

               ?>
              <h3><?php echo $row['id']; ?></h3>

              <p>Totel Employees</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="Add_Employees.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php 
                 $query=" SELECT count(f_id) as f_id FROM flock";
                $result1 = mysqli_query($conn, $query);
               $row = mysqli_fetch_array($result1);

               ?>
              <h3><?php echo $row['f_id']; ?></h3>

              <p>Total Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="view_flocks.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php 
                 $query=" SELECT count(id) as id FROM admin";
                $result1 = mysqli_query($conn, $query);
               $row = mysqli_fetch_array($result1);

               ?>
              <h3><?php echo $row['id']; ?></h3>

              <p>Totel Admin</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $tl; ?></h3>

              <p>Totel Income</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="content col-lg-12 connectedSortable">
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Repoting Graph</h3>

          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div id="chartContainer" style="height: 370px; width: 100%;"></div>
           
        </div>
        <!-- /.box-body -->

        
        
      </div>
      <!-- /.box -->
    </section>
        <section class="col-lg-7 connectedSortable">
          <div class="box box-success">
            <div class="box-header">
              <i class="fa fa-comments-o"></i>

              <h3 class="box-title">Chat</h3>

              <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                <div class="btn-group" data-toggle="btn-toggle">
                  <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                </div>
              </div>
            </div>
            <div class="box-body chat" id="chat-box">
              <!-- chat item -->
              <div class="item">
                <img src="dist/img/user4-128x128.jpg" alt="user image" class="online">
                <p class="message">
                  <a href="#" class="name">
                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                    Mike Doe
                  </a>
                  I would like to meet you to discuss the latest news about
                  the arrival of the new theme. They say it is going to be one the
                  best themes on the market
                </p>
                <div class="attachment">
                  <h4>Attachments:</h4>

                  <p class="filename">
                    Theme-thumbnail-image.jpg
                  </p>

                  <div class="pull-right">
                    <button type="button" class="btn btn-primary btn-sm btn-flat">Open</button>
                  </div>
                </div>
                <!-- /.attachment -->
              </div>
              <!-- /.item -->
              <!-- chat item -->
              <div class="item">
                <img src="dist/img/user3-128x128.jpg" alt="user image" class="offline">

                <p class="message">
                  <a href="#" class="name">
                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                    Alexander Pierce
                  </a>
                  I would like to meet you to discuss the latest news about
                  the arrival of the new theme. They say it is going to be one the
                  best themes on the market
                </p>
              </div>
              <!-- /.item -->
              <!-- chat item -->
              <div class="item">
                <img src="dist/img/user2-160x160.jpg" alt="user image" class="offline">

                <p class="message">
                  <a href="#" class="name">
                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
                    Susan Doe
                  </a>
                  I would like to meet you to discuss the latest news about
                  the arrival of the new theme. They say it is going to be one the
                  best themes on the market
                </p>
              </div>
              <!-- /.item -->
            </div>
            <!-- /.chat -->
            <div class="box-footer">
              <div class="input-group">
                <input class="form-control" placeholder="Type message...">

                <div class="input-group-btn">
                  <button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box (chat box) -->

          <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">To Do List</h3>

              <div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="todo-list">
                <li>
                  <!-- drag handle -->
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <!-- checkbox -->
                  <input type="checkbox" value="">
                  <!-- todo text -->
                  <span class="text">Design a nice theme</span>
                  <!-- Emphasis label -->
                  <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                  <!-- General tools such as edit or delete-->
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <input type="checkbox" value="">
                  <span class="text">Make the theme responsive</span>
                  <small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <input type="checkbox" value="">
                  <span class="text">Let theme shine like a star</span>
                  <small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <input type="checkbox" value="">
                  <span class="text">Let theme shine like a star</span>
                  <small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <input type="checkbox" value="">
                  <span class="text">Check your messages and notifications</span>
                  <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
                <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                  <input type="checkbox" value="">
                  <span class="text">Let theme shine like a star</span>
                  <small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>
                  <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
              <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
            </div>
          </div>
          <!-- /.box -->

          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">Quick Email</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">
              <form action="#" method="post">
                <div class="form-group">
                  <input type="email" class="form-control" name="emailto" placeholder="Email to:">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" placeholder="Subject">
                </div>
                <div>
                  <textarea class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
              </form>
            </div>
            <div class="box-footer clearfix">
              <button type="button" class="pull-right btn btn-default" id="sendEmail">Send
                <i class="fa fa-arrow-circle-right"></i></button>
            </div>
          </div>

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

         
          <!-- /.box -->

          <!-- solid sales graph -->
          <div class="box box-solid bg-teal-gradient">
            <div class="box-header">
              <i class="fa fa-th"></i>

              <h3 class="box-title">Sales Graph</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
            </div>
            <div class="box-body border-radius-none">
              <div class="chart" id="line-chart" style="height: 250px;"></div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-border">
              <div class="row">
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgColor="#39CCCC">

                  <div class="knob-label">Mail-Orders</div>
                </div>
                <!-- ./col -->
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgColor="#39CCCC">

                  <div class="knob-label">Online</div>
                </div>
                <!-- ./col -->
                <div class="col-xs-4 text-center">
                  <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgColor="#39CCCC">

                  <div class="knob-label">In-Store</div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

          <!-- Calendar -->
          <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Calendar</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="#">Add new event</a></li>
                    <li><a href="#">Clear events</a></li>
                    <li class="divider"></li>
                    <li><a href="#">View calendar</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-black">
              <div class="row">
                <div class="col-sm-6">
                  <!-- Progress bars -->
                  <div class="clearfix">
                    <span class="pull-left">Task #1</span>
                    <small class="pull-right">90%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
                  </div>

                  <div class="clearfix">
                    <span class="pull-left">Task #2</span>
                    <small class="pull-right">70%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                  <div class="clearfix">
                    <span class="pull-left">Task #3</span>
                    <small class="pull-right">60%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
                  </div>

                  <div class="clearfix">
                    <span class="pull-left">Task #4</span>
                    <small class="pull-right">40%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

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
 <script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
    title: {
        text: "Expenses and Income Graph"
    },
    axisY: {
        title: "Amount"
    },
    axisX: {
        title: "Date"
    },
    data: [{
        type: "area",
        dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
    },
    {
        type: "area",
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        
    }]
});
chart.render();
 
}
</script>
<!-- jQuery 2.2.3 -->
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
