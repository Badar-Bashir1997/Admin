<?php 
 include("lib/session.php");
 include("lib/DBConn.php");
 if(isset($_REQUEST['BtnSubmit']))
    {
      $Farm=$_REQUEST['Farm'];
        $Flock=$_REQUEST['Flock'];
        $qnty_of_dsl=$_REQUEST['qnty_of_dsl'];
        $price=$_REQUEST['price'];
        $e_Date=$_REQUEST['d_Date'];
        $Status=$_REQUEST['Status'];
        $Query = "INSERT INTO desiel(Farm_id,flock_id,qnty_desiel,price,d_date,p_method) 
        values('$Farm','$Flock','$qnty_of_dsl','$price','$e_Date','$Status')" ;
 $confirm_status = mysqli_query($conn,$Query);
       if($confirm_status)
       {
?>
        <script>
            alert('Record has been Successfully Inserted in Database');
            window.location.href='desiel.php?success';
            </script>
<?php
    }
    else
    {
        ?>
        <script type="text/javascript">alert('not Working');
        window.location.href='desiel.php?success';
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
 <?php
include("includes/sidebar.php");
 ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Purchase
        <small>Desiel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Purchase</a></li>
        <li class="active">Desiel</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Purchase Desiel</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form action="#" method="post" name="form">
          <div class="row">
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
              </div>
              <div class="form-group">
                <label>Desiel Quentity</label>
               <input type="text" name="qnty_of_dsl" parsley-trigger="change" required
                placeholder="Desiel Quentity" class="form-control" id="qnty_of_dsl">
              </div>
              <!-- /.form-group -->
            
              <!-- /.form-group -->
              <div class="form-group">
                <label>Price</label>
                <input type="Number" name="price" parsley-trigger="change" required 
                placeholder="Price" class="form-control" id="price">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <!-- /.col -->
             <div class="col-md-6">
              <div class="form-group">
                <label>Select Flock</label>
                <select class="form-control select2" style="width: 100%;" name="Flock" id="Flock" data-placeholder="Select Flock"  onchange="flock(this.value);"required>
                   <script>
                    function Farm_id(str) {
                      xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    var t = this.responseText;
                    optionText = t;
                   optionValue = t;
                   
                   $('#Flock')
                    .find('option')
                   .remove();
                         $('#Flock').append(`<option ></option>`);
                $('#Flock').append(`<option value="${optionValue}">
                  ${optionText}
                </option>`);
                       }
                      };
                   xhttp.open("GET", "flock_id_ajax.php?q="+str, true);
                   xhttp.send();
                      }
                     
                      </script>
                </select>
              </div>
              <div class="form-group">
                <label>Date</label>
                <input type="Date" name="d_Date" parsley-trigger="change" required
                 class="form-control" id="d_Date">
              </div>
            
              <div class="box">
            <div class="box-header">
              <h3 class="box-title">Payments Method</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="form-group">
                
               <input type="radio" id="cash" name="Status" value="Cash"checked>
                <label for="cash" >Cash</label><br>
                <input type="radio" id="Cradit" name="Status" value="Cradit" >
                <label for="Cradit">Cradit</label><br> 
                <input type="radio" id="Bank" name="Status" value="Bank" >
                <label for="Bank">Bank</label><br> 
              </div>
            </div>
            <!-- /.box-body -->
          </div>
              <!-- /.form-group -->
            </div>
          </div>
          <!-- /.row -->
           <button type="submit" name="BtnSubmit" class="btn btn-primary"  onclick="return onRegister();">Submit</button>
           </form>
        </div>
      </div>
      <!-- /.box -->
    </section>
  <div class="control-sidebar-bg"></div>
</div>
 <?php
  include("includes/footer.php");
  ?>
   <?php
include("includes/control_sidebar.php");
  ?>
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/select2/select2.full.min.js"></script>
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
<script> 
    function onRegister()
          {
            if(document.form.qnty_of_dsl.value == "")
            {
            alert("Enter Quentity of Desiel");
            document.form.qnty_of_dsl.focus();
            return (false);
            }
             
            else
            {
                return (true);
            }
          }
          </script> 
          <script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>
</body>
</html>
