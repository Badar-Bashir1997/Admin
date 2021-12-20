<?php 
 include("lib/session.php");
 include("lib/DBConn.php");
 if(isset($_REQUEST['BtnSubmit']))
    {
      $Price1=0;
        $Farm=$_REQUEST['Farm'];
        $Flock_id=$_REQUEST['Flock'];
        $Qty=$no_of_Eggs=$_REQUEST['no_of_Eggs'];
        $pr=$price=$_REQUEST['price'];
        $t_p=$price*$no_of_Eggs;
        $e_Date=$_REQUEST['e_Date'];
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
        $q1="SELECT id,remaining FROM egg_production WHERE remaining>0 ORDER BY id ASC";
        $result1 = mysqli_query($conn,$q1);
        while($row1=mysqli_fetch_array($result1))
        {
          $used=0;
          $d_id=$row1['id'];
          $d_q=$row1['remaining'];
          if($GLOBALS['Qty']<=0)
          {
            
          }
          elseif($GLOBALS['Qty']>=$d_q)
          {
            $remaning_qnty=$GLOBALS['Qty'];
            $GLOBALS['Qty']=$GLOBALS['Qty']-$d_q;
            $used=$remaning_qnty-$GLOBALS['Qty'];
            $GLOBALS['Price1']=$GLOBALS['Price1']+$used*$GLOBALS['pr'];
            $qry2="UPDATE egg_production SET remaining=0 WHERE id='$d_id'";
            mysqli_query($conn,$qry2);
          }
          elseif($GLOBALS['Qty']<$d_q && $GLOBALS['Qty']>0 )
          {

            $GLOBALS['Price1']=$GLOBALS['Price1']+$GLOBALS['Qty']*$GLOBALS['pr'];
            $Qnty=$d_q-$GLOBALS['Qty'];
            $GLOBALS['Qty']=0;
            $qry2="UPDATE egg_production SET remaining='$Qnty' WHERE id='$d_id'";
            mysqli_query($conn,$qry2);
          }
        }
        $tp=$GLOBALS['Price1'];
        $Query = "INSERT INTO sales(Farm_id,flock_id,sale_name,s_qnty,price,recived_amount,s_date) 
        values('$Farm','$Flock_id','Egg','$no_of_Eggs','$tp','$amount','$e_Date')" ;
 $confirm_status = mysqli_query($conn,$Query);
        $q="SELECT vendors.v_id FROM vendors WHERE name='$name'";
        $result= mysqli_query($conn,$q);
        $row = mysqli_fetch_array($result);
        $v_id=$row['v_id'];

         $Query = "INSERT INTO egg_sales(Farm_id,b_id,flock_id,Sale_Date,noe,payment_method,price) 
        values('$Farm','$v_id','$Flock_id','$e_Date','$no_of_Eggs','$Status','$price')" ;
      
 $confirm_status = mysqli_query($conn,$Query);
 $qr="SELECT LAST_INSERT_ID()AS id";
 $result1 = mysqli_query($conn,$qr);
$row1=mysqli_fetch_array($result1);
$s_id=$row1['id']."egg";
 $qry="INSERT INTO `vendor_payment` ( `payment_option`,`s_id`,`v_id`, `name`, `balance`, `remaning`, `amount`, `card_no`, `Bank_name`, `Account_no`) VALUES ('$Status','$s_id','$v_id','$name','$balance','$remaning','$amount','$card','$Bank','$account')";
       $confirm_status1 = mysqli_query($conn,$qry);
       $Query1 = "INSERT INTO sales(Farm_id,flock_id,sale_name,s_qnty,price,s_date) 
        values('$Farm','$Flock_id','Egg','$no_of_Eggs','$t_p','$e_Date')" ;
        
 $confirm_status2 = mysqli_query($conn,$Query1);

       if($confirm_status && $confirm_status1 && $confirm_status2)
       {
        $qr1="UPDATE broker SET remaining='$remaning',balance='$balance' WHERE b_id='$v_id'";
           mysqli_query($conn,$qr1);
      ?>
        <script>
            alert('Egg Sales Record has been Successfully Inserted ');
            window.location.href='Egg_sales.php';
            </script>
      <?php
    }
    else
    {
        ?>
        <script type="text/javascript">alert('not Working');
        window.location.href='Egg_sales.php';
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
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
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
        Add
        <small>Egg Sales</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Eggs</a></li>
        <li class="active">Sales</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add Egg Sales</h3>

          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form action="#" method="post" name="form">
              <div class="row col-md-12">
                      <div class="form-group col-md-2">
                        <label>Select Farm:</label>
                      </div>
                      <div class="form-group col-md-10">
                        <select class="form-control select2" style="width: 100%;" name="Farm" id="Farm" data-placeholder="Select Farm" onchange="Farm_id(this.value);">
                          <option></option>
                           <?php 
              
                           $query = " SELECT Farm_id FROM flock where Breed_type='Layer'";
                            $result = mysqli_query($conn,$query);
                             while($row = mysqli_fetch_array($result)){
                             $f_id= $row['Farm_id'];
                             ?>
                          <option><?php echo $f_id ?></option>
                          <?php   }
                           ?> 
                        </select>
                      </div>
                  </div>
                  <div class="row col-md-12">
                      <div class="form-group col-md-2">
                        <label>Select Flock:</label>
                      </div>
                      <div class="form-group col-md-10">
                        <select class="form-control select2" style="width: 100%;" name="Flock" id="Flock" data-placeholder="Select Flock"  onchange="flock(this.value);">
                   
                </select>
                      </div>
                  </div>
                   <div class="row col-md-12">
                      <div class="form-group col-md-2">
                        <label>Number of Eggs:</label>
                      </div>
                      <div class="form-group col-md-4">
                        <label>
                          <a class="btn btn-success" style="margin-left :5px;">Per Crate</a>
                          <a class="btn btn-primary" style="margin-left :5px;">Per Trayate</a>
                          <a class="btn btn-warning" style="margin-left :5px;">Per Egg</a>
                        </label>
                      </div>
                      <div class="form-group col-md-6">
                        
                          <input type="Number" name="no_of_Eggs" placeholder="" parsley-trigger="change" required
                 class="form-control" id="no_of_Eggs" onkeyup="onRegister();totalp1(this.value)">
                      </div>
                  </div>
                   <div class="row col-md-12">
                      <div class="form-group col-md-2">
                        <label>Date:</label>
                      </div>
                      <div class="form-group col-md-10">
                         <input type="Date" name="e_Date" parsley-trigger="change" required
                 class="form-control" id="e_Date">
                      </div>
                  </div>
                   <div class="row col-md-12">
                      <div class="form-group col-md-2">
                         <label>Price per Egg:</label>
                      </div>
                      <div class="form-group col-md-10">
                        <input type="Number" name="price" parsley-trigger="change" required 
                placeholder="Enter Price per Egg" class="form-control" id="price" onchange="totalp(this.value)">
                      </div>
                  </div>
                   <div class="row col-md-12">
                      <div class="form-group col-md-2">
                        <label>Payments Method:</label>
                      </div>
                      <div class="form-group col-md-10">
                        <label><a class="btn btn-success" id="cash" name="Status" value="Cash" onclick="change();" style="margin-left :5px;">Cash</a>
                          <a class="btn btn-primary" style="margin-left :5px;" id="Cradit" name="Status" value="Cradit" onclick ="change2();">Credit</a>
                          <a class="btn btn-warning" style="margin-left :5px;" id="Bank" name="Status" value="Bank" onclick ="change3();" >Bank</a></label>

                      </div>
                  </div>
                   <?php 
            include("broker_payment_option.php");
             ?>
           <button type="submit" name="BtnSubmit" class="btn btn-primary pull-right"  onclick="return onRegister();">Submit</button>
           </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Egg Sales Record</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow: scroll;">
              <table id="example"class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                  
                  <th>Farm</th>
                  <th>Flock</th>
                  <th>Sales Dates</th>
                  <th>Number Of Eggs</th>
                  <th>Payment Method</th>
                  <th>Price</th>
                  <th>Total</th>
                  <th>Actions</th>
                  
                </tr>
                </thead>
                <tbody>
                  <?php
                    $query = "SELECT * FROM egg_sales ";
                    $result = mysqli_query($conn,$query);
                      if ($result->num_rows > 0) {            
                        while($row = mysqli_fetch_array($result))
                           {
                            $total=$row['noe']*$row['price'];
                            ?> 
                                  <tr>
                                  <td><?php echo $row['Farm_id']; ?></td> 
                                  <td><?php echo $row['flock_id']; ?></td>
                                  <td><?php echo $row['Sale_Date']; ?></td>
                                  <td><?php echo $row['noe']; ?></td>
                                  <td><?php echo $row['payment_method']; ?></td>
                                  <td><?php echo $row['price']; ?></td>
                                  <td><?php echo $total; ?></td>
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
                                            else
                                              {
                                                echo "No Result Found";
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
<!-- Page script -->
</body>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>
<script type="text/javascript">
                function totalp(nm){

                  var num = parseInt(nm);
                  var num2= parseInt(document.getElementById('no_of_Eggs').value)
                  window.ttl=num*num2;
                  document.getElementById("txtcamount").placeholder="";
                  document.getElementById("txtamount").placeholder="";
                  document.getElementById("txtbamount").placeholder="";

                  document.getElementById("txtcamount").placeholder="total Amount="+ttl;
                  document.getElementById("txtamount").placeholder="total Amount="+ttl;
                  document.getElementById("txtbamount").placeholder="total Amount="+ttl;
                }
                function totalp1(nm){

                  var num = parseInt(nm);
                  var num2= parseInt(document.getElementById('price').value)
                  window.ttl=num*num2;
                  document.getElementById("txtcamount").placeholder="";
                  document.getElementById("txtamount").placeholder="";
                  document.getElementById("txtbamount").placeholder="";


                  document.getElementById("txtcamount").placeholder="total Amount="+ttl;
                  document.getElementById("txtamount").placeholder="total Amount="+ttl;
                  document.getElementById("txtbamount").placeholder="total Amount="+ttl;
                }
                 
              </script>
</html>
<script>
                    function flock(str) {
                      xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                  window.t = this.responseText;  
                    document.getElementById("no_of_Eggs").placeholder="Maximum Number of Eggs="+window.t;
                       }
                      };
                   xhttp.open("GET", "flock_ajax.php?q="+str, true);
                   xhttp.send();
                      }
                      function onRegister()
                       {
                         var b = parseInt(window.t);
                    if(document.form.no_of_Eggs.value>b)
                        {
                          document.getElementById('no_of_Eggs').value="";
                         alert("Enter Valid Number of Eggs");
                        document.form.no_of_Eggs.focus();
                           return (false);
                             }
             
                                 else
                              {
                             return (true);
                                 }
                               }


                      </script>
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