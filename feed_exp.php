<?php 
 include("lib/session.php");
 include("lib/DBConn.php");
 if(isset($_REQUEST['BtnSubmit']))
    {
      
      $Price=0;
      $Farm=$_REQUEST['Farm'];
        $Flock=$_REQUEST['Flock'];
        $e_Date=$_REQUEST['txtDate'];
        $Qty=$qnty_of_feed=$_REQUEST['txtqnty'];
        $f_name=$_REQUEST['txtName'];
        $q1="SELECT feed.feed_id,feed.remaining,feed.price FROM feed WHERE feed.remaining>0 ORDER BY `feed`.`feed_id` ASC";
        $result1 = mysqli_query($conn,$q1);

        while($row1=mysqli_fetch_array($result1))
        {
          $used=0;
          $d_id=$row1['feed_id'];
          $d_q=$row1['remaining'];
          $p=$row1['price'];
          if($GLOBALS['Qty']<=0)
          {
            
          }
          elseif($GLOBALS['Qty']>=$d_q)
          {
            $remaning_qnty=$GLOBALS['Qty'];
            $GLOBALS['Qty']=$GLOBALS['Qty']-$d_q;
            $used=$remaning_qnty-$GLOBALS['Qty'];
            $GLOBALS['Price']=$GLOBALS['Price']+$used*$p;
            $qry2="UPDATE feed SET feed.remaining=0 WHERE feed.feed_id='$d_id'";
            mysqli_query($conn,$qry2);
          }
          elseif($GLOBALS['Qty']<$d_q && $GLOBALS['Qty']>0 )
          {

            $GLOBALS['Price']=$GLOBALS['Price']+$GLOBALS['Qty']*$p;
            $Qnty=$d_q-$GLOBALS['Qty'];
            $GLOBALS['Qty']=0;
            $qry2="UPDATE feed SET feed.remaining='$Qnty' WHERE feed.feed_id='$d_id'";
            mysqli_query($conn,$qry2);
          }
        }
        $tp=$GLOBALS['Price'];
        $Query = "INSERT INTO expences(Farm_id,flock_id,e_name,sub_type,e_qnty,price,e_date) 
        values('$Farm','$Flock','Feed','$f_name','$qnty_of_feed','$tp','$e_Date')" ;
        
 $confirm_status = mysqli_query($conn,$Query);
       if($confirm_status)
       {
?>
        <script>
            alert('Feed Expenses has been Successfully Inserted');
            window.location.href='feed_exp.php';
            </script>
<?php
    }
    else
    {
        ?>
        <script type="text/javascript">alert('not Working');
        window.location.href='feed_exp.php';
    </script>
        <?php
    }
}
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
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
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
           Feed
           <small>Expenses</small>
          </h1>
          <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
           <li><a href="#">Feed</a></li>
          <li class="active">Expenses</li>
          </ol>
        </section>

    <!-- Main content -->
    <section class="content">
<form action="#" method="post" name="form" enctype="multipart/form-data">
      <!-- SELECT2 EXAMPLE -->
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
                <label>Select Farm</label>
                <select class="form-control select2" style="width: 100%;" name="Farm" id="Farm" data-placeholder="Select Farm" onchange="Farm_id(this.value);"required>
                  <option></option>
                   <?php 
      
                   $query = " SELECT * FROM farm";
                    $result = mysqli_query($conn,$query);
                     while($row = mysqli_fetch_array($result)){
                     $f_id= $row['Farm_id'];
                     ?>
                  <option><?php echo $f_id ?></option>
                  <?php   }
                   ?> 
                </select>
              </div></div>
              <div class="col-md-6">
              <div class="form-group">
                <label>Select Flock</label>
                <select class="form-control select2" style="width: 100%;" name="Flock" id="Flock" data-placeholder="Select Flock"  onchange="flock(this.value);"required>
                   <script>
                    function Farm_id(str) {
                      $('#Flock')
                     .find('option')
                   .remove();
                   $('#Flock').append(`<option value=""></option>`);                     
                    $.ajax({
                              url: "flock_id_ajax.php?q="+str,
                        type: 'get',
                        dataType: 'JSON',
                        success: function(response){
                            var len = response.length;
                            for(var i=0; i<len; i++){
                                var id = response[i].id;
                                optionText = response[i].id;
                                optionValue = response[i].id;

                                $('#Flock').append(`<option value="${optionValue}">
                                 ${optionText}
                                </option>`);
                            }

                        }
                    });
                                    }
                     
                      </script>
                </select>
              </div></div>
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
                <label>Expense Date</label>
                <input type="date" name="txtDate" parsley-trigger="change" required
                placeholder="" class="form-control">
              </div>
              <!-- /.form-group -->
            </div>
            </div>
           

          </div>
          <!-- /.row -->
          
          
           <button type="submit" name="BtnSubmit" class="btn btn-primary pull-right"  onclick="return onRegister();">Submit</button>
           
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
              <h3 class="box-title">Feed Expences Record</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow: scroll;">
              <table id="example"class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                  
                  <th>Farm</th>
                  <th>Flock</th>
                  <th>Feed Name</th>
                  <th>Quantity</th>
                  <th>Date</th>
                  <th>Price</th>
                  <th>Actions</th>
                  
                </tr>
                </thead>
                <tbody>
                  <?php
                    $query = "SELECT * FROM expences WHERE e_name='Feed' ";
                    $result = mysqli_query($conn,$query);
                      if ($result->num_rows > 0) {            
                        while($row = mysqli_fetch_array($result))
                           {
                            ?> 
                                  <tr>
                                  
                                  <td><?php echo $row['Farm_id']; ?></td> 
                                  <td><?php echo $row['flock_id']; ?></td>
                                  <td><?php echo $row['sub_type']; ?></td>
                                  <td><?php echo $row['e_date']; ?></td>
                                  <td><?php echo $row['e_qnty']; ?></td>
                                  <td><?php echo $row['price']; ?></td>
                                  
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
    $(".select2").select2();
  });
</script>
</body>
</html>
