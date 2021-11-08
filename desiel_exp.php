<?php 
 include("lib/session.php");
 include("lib/DBConn.php");
 if(isset($_REQUEST['BtnSubmit']))
    {
      $used=0;
      $price=0;
      $Farm=$_REQUEST['Farm'];
        $Flock=$_REQUEST['Flock'];
        $e_Date=$_REQUEST['d_Date'];
        $Qty=$qnty_of_dsl=$_REQUEST['qnty_of_dsl'];
        while($row1=mysqli_fetch_array($result1))
        {
          $dsl_id=$row1['id'];
          $qr="SELECT desiel.qnty_desiel,desiel.price FROM desiel WHERE desiel.id='$dsl_id'";
          $rslt=mysqli_query($conn,$qr);
          $r=mysqli_fetch_array($rslt);
          if($Qty<=0)
          {
            exit;
          }
          elseif($Qty>=$r['qnty'])
          {
            $Qty=$Qty-$r['qnty'];
            $used=$qnty_of_dsl-$Qty;
            $price=$price+($used*$r['price']);
            $qry2="UPDATE desiel SET desiel.remaining=0 WHERE desiel.id='$dsl_id'";
            mysqli_query($conn,$qry2);
          }
          else
          {
            $price=$price+($Qty*$r['price']);
            $Qnty=$r['qnty']-$Qty;
            $Qty=0;
            $qry2="UPDATE desiel SET desiel.remaining='$Qnty' WHERE desiel.id='$dsl_id'";
            mysqli_query($conn,$qry2);
          }
        }
        
        $Query = "INSERT INTO desiel(Farm_id,flock_id,qnty_desiel,price,d_date) 
        values('$Farm','$Flock','$qnty_of_dsl','$price','$e_Date')" ;
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
        Desiel
        <small>Expenses</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Desiel</a></li>
        <li class="active">Expenses</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Desiel Expenses</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form action="#" method="post" name="form" enctype="multipart/form-data">
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
              <?php 
                $q="SELECT IFNULL(SUM(desiel.remaining),0)AS Q FROM desiel";
                $result1 = mysqli_query($conn,$q);
                $row1 = mysqli_fetch_array($result1);
                $ttl_dsl="Total Desiel=".$row1['Q'];
                $q1="SELECT desiel.id FROM desiel WHERE desiel.remaining>0 ORDER BY id ASC";
                $result1 = mysqli_query($conn,$q1);
                

                 ?>
              <div class="form-group">
                <label>Desiel Quentity</label>
               <input type="text" name="qnty_of_dsl" parsley-trigger="change" required
                 class="form-control" id="qnty_of_dsl" placeholder="<?php echo $ttl_dsl; ?>">
                

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
                      $('#Flock')
                     .find('option')
                   .remove();
                   $('#Flock').append(`<option value=""></option>`);
                     // xhttp = new XMLHttpRequest();
                    //xhttp.onreadystatechange = function() {
                  //if (this.readyState == 4 && this.status == 200) {
                //     $('#Flock')
                //     .find('option')
                //    .remove();
                //    var l= this.responseText.length; 
                //     var t= this.responseText;
                //     var t=this;
                //      for(var i=0; i<l; i++){
                //     optionText = t[i].id;
                //    optionValue = t[i].id;         
                // $('#Flock').append(`<option value="${optionValue}">
                //   ${optionText}
                // </option>`);
                //      }
                       
                //       };
                //    xhttp.open("GET", "flock_id_ajax.php?q="+str,dataType: 'JSON', true);
                //    xhttp.send();
                
                      //}
                      $.ajax({
              url: "flock_id_ajax.php ?q="+str,
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
              </div>
              <div class="form-group">
                <label>Expenses Date</label>
                <input type="Date" name="d_Date" parsley-trigger="change" required
                 class="form-control" id="d_Date">
              </div>
            

              
              <!-- /.form-group -->
            </div>
          </div>
          
           <button type="submit" name="BtnSubmit" class="btn btn-primary pull-right"  onclick="return onRegister();">Submit</button>
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
    $(".select2").select2();
  });
</script>
</body>
</html>
