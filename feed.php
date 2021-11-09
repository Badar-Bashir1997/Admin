<?php 
 include("lib/session.php");
 include("lib/DBConn.php");
  if(isset($_REQUEST['BtnSubmit']))

    {
        $fileinfo = PATHINFO($_FILES["image"]["name"]);
      $newFilename = $fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
      move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $newFilename);
      $location = "upload/" . $newFilename;
        $F_name=$_REQUEST['txtName'];
        $qnty_feed=$_REQUEST['txtqnty'];
        $price=$_REQUEST['txtPrice'];
        
        $p_Date=$_REQUEST['txtDate'];
        $Status=$_REQUEST['Status'];
        if($Status=='Cash'){
        $name=$_REQUEST['name'];
        $amount=$_REQUEST['txtamount'];
        $remaning=$_REQUEST['txtremaning'];
        $balance=$_REQUEST['txtbalance'];
        $card="";
        $Bank="";
        $account="";}
        if($Status=='Cradit'){
          $name=$_REQUEST['txtchname'];
        $amount=$_REQUEST['txtcamount'];
         $card=$_REQUEST['txtcnum'];
         $remaning=$_REQUEST['txtremaning1'];
        $balance=$_REQUEST['txtbalance1'];
        $Bank="";
        $account="";
        }
        if ($Status=='Bank') {
            $name=$_REQUEST['txtbahname'];
        $amount=$_REQUEST['txtbamount'];
         $card="";
        $Bank=$_REQUEST['txtbname'];
        $account=$_REQUEST['txtbanum'];
        $remaning=$_REQUEST['txtremaning2'];
        $balance=$_REQUEST['txtbalance2'];
        }
        $q="SELECT brokers.id FROM brokers WHERE brokers.name='$name'";
        $result= mysqli_query($conn,$q);
        $row = mysqli_fetch_array($result);
        $b_id=$row['id'];

        $Query = "INSERT INTO feed(name,qnty,remaining,price,p_method,f_date,image) 
        values('$F_name','$qnty_feed','$qnty_feed','$price','$Status','$p_Date','$location')" ;
 $confirm_status = mysqli_query($conn,$Query);

 $qr="SELECT LAST_INSERT_ID()AS id";
 $result1 = mysqli_query($conn,$qr);
$row1=mysqli_fetch_array($result1);
$p_id=$row1['id']."feed";

 $qry="INSERT INTO `brokers_payment` ( `payment_option`,`p_id`,`b_id`, `name`, `balance`, `remaning`, `amount`, `card_no`, `Bank_name`, `Account_no`) VALUES ('$Status','$p_id','$b_id','$name','$balance','$remaning','$amount','$card','$Bank','$account')";
       $confirm_status1 = mysqli_query($conn,$qry);
       if($confirm_status && $confirm_status1)
       {
        ?>
        <script>
            alert('Record has been Successfully Inserted in Database');
            window.location.href='feed.php?success';
            </script>
<?php
    }
    else
    {
        ?>
        <script type="text/javascript">alert('not Working');
        window.location.href='feed.php?success';
    </script>
        <?php
    }
mysqli_close($conn);}
?>
 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css'>
<link rel="stylesheet" href="plugins/datatables/style.css">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/cs.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
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
           Purchase
           <small>Feed</small>
          </h1>
          <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
           <li><a href="#">Purchase</a></li>
          <li class="active">Feed</li>
          </ol>
        </section>

    <!-- Main content -->
    <section class="content">
<form action="#" method="post" name="form" class="was-validated" enctype="multipart/form-data">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Purchase Feed</h3>
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
                <label>Quantity</label>
                <input type="Number" name="txtqnty" parsley-trigger="change" required id="txtqnty" 
                placeholder="Quantity of feed bags" class="form-control" >
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Price per Bag</label>
                <input type="number" name="txtPrice" parsley-trigger="change" required
                placeholder="Enter Price per Bag" class="form-control" onchange="totalp(this.value)" >
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
             <div class="col-md-6">
              <div class="form-group">
                <label>Purchase Date</label>
                <input type="date" name="txtDate" parsley-trigger="change" required
                placeholder="" class="form-control">
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
          
          <div class="col-md-12">
              <div class="box" style="margin: auto;width: 60%;" >
            <div class="box-header">
              <h3 class="box-title">Payments Method</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="form-group">
                
               <input type="radio" id="cash" name="Status" value="Cash"checked onchange="change();">
                <label for="cash" >Cash</label><br>
                <input type="radio" id="Cradit" name="Status" value="Cradit" onchange="change2();" >
                <label for="Cradit">Cradit</label><br> 
                <input type="radio" id="Bank" name="Status" value="Bank" onchange="change3();" >
                <label for="Bank">Bank</label><br>  
              </div>
            </div>
            <!-- /.box-body -->
          </div>
              <!-- /.form-group -->
            </div>
            <?php include("payment_options.php"); ?>
          <!-- /.row -->
           <button type="submit" name="BtnSubmit" class="btn btn-primary pull-right"  >Submit</button>
           
        </div>
        <!-- /.box-body -->

        
        
      </div>
      <!-- /.box -->
      </form>
    </section>
            
 
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Feed Purchase Record</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow: scroll;">
              <table id="example"class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                  
                  <th>id</th>
                  <th>Name</th>
                  <th>Quantity</th>
                  <th>Purchase Dates</th>
                  <th>Payment Method</th>
                  <th>Price</th>
                  <th>Image</th>
                  <th>Actions</th>
                  
                </tr>
                </thead>
                <tbody>
                  <?php
                    $query = "SELECT * FROM feed ";
                    $result = mysqli_query($conn,$query);
                      if ($result->num_rows > 0) {            
                        while($row = mysqli_fetch_array($result))
                           {
                            ?> 
                <tr>
                                  
                                  <td><?php echo $row['feed_id']; ?></td> 
                                  <td><?php echo $row['name']; ?></td>
                                  <td><?php echo $row['qnty']; ?></td>
                                  <td><?php echo $row['f_date']; ?></td>
                                  <td><?php echo $row['p_method']; ?></td>
                                  <td><?php echo $row['price']; ?></td>
                                  <td><img src="<?php echo $row['image']; ?>" width = "50" height = "50"></td>
                                  
                   <td>
                <button type="button" class="btn btn-primary btn-xs dt-edit" style="margin-right:16px;">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-danger btn-xs dt-delete">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
            </td>
                </tr>
                <?php
                                                 }
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
  <div class="control-sidebar-bg"></div>
</div>


    
  <?php
  include("includes/footer.php");
  ?>

  <!-- Control Sidebar -->
   <?php
include("includes/control_sidebar.php");
  ?>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/js.js"></script>

<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page script -->
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
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>
<script type="text/javascript">
                function totalp(nm){

                  var num = parseInt(nm);
                  var num2= parseInt(document.getElementById('txtqnty').value)
                  var ttl=num*num2;
                  document.getElementById("txtcamount").placeholder="total Amount="+ttl;
                  document.getElementById("txtamount").placeholder="total Amount="+ttl;
                  document.getElementById("txtbamount").placeholder="total Amount="+ttl;
                }
              </script>
</html>
</body>
</html>
