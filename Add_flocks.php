<?php 
 include("lib/session.php");
 include("lib/DBConn.php");
if(isset($_REQUEST['BtnSubmit']))
 {
  $f_id=$_REQUEST['Flock_id'];
        $f_name=$_REQUEST['Flock_Name'];
        $st_date=$_REQUEST['st_date'];
        $End_date=$_REQUEST['end_date'];
        $remaining=$no_of_birds=$_REQUEST['no_of_birds'];
        $Purchase_cost=$_REQUEST['Purchase_cost'];
        $t_p=$no_of_birds*$Purchase_cost;
        $Farm=$_REQUEST['Farm'];
        $Breed_type=$_REQUEST['breed'];
        $status="ongoing";
        $date1 = new DateTime($st_date);
        $date2 = new DateTime($End_date);
        $interval = $date2->diff($date1);
        $sql = "SELECT flock_id FROM flock WHERE Farm_id='$Farm' AND Status='$status'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
  if ($row && $row['flock_id']==!'') {
     ?>
        <script>alert('Flock is already in stock');
        window.location.href='Add_flocks.php';
    </script>
        <?php

  }
     else{
      if($Breed_type=="Broiler"){
 if($interval->days<30  or $date2<=$date1 )
        {
            ?>
        <script type="text/javascript">alert('Invalid:- Pleas Enter Minimium 1 Months');
        window.location.href='Add_flocks.php';
    </script>
        <?php    
}
else
{
  $Query = "INSERT INTO flock(flock_id,Flock_name,start_date,end_date,nob,remaining,Purchase_cost,farm_id,Breed_type,Status) 
        values('$f_id','$f_name','$st_date','$End_date','$no_of_birds','$remaining','$Purchase_cost','$Farm','$Breed_type','$status')" ;
 $confirm_status = mysqli_query($conn,$Query);
 
 $Query1 = "INSERT INTO expences(Farm_id,flock_id,e_name,sub_type,e_qnty,price,e_date) 
        values('$Farm','$f_id','Flock','No','$no_of_birds','$t_p','$st_date')" ;
        
 $confirm_status1 = mysqli_query($conn,$Query1);
       if($confirm_status&& $confirm_status1)
       {
        $q="UPDATE farm SET farm.Status='$status' WHERE farm.Farm_id='$Farm'";
        mysqli_query($conn,$q);
?>
        <script>
            alert('Flock has been Successfully Inserted');
            window.location.href='view_flocks.php';
            </script>
<?php
    }
    else
    {
        ?>
        <script type="text/javascript">alert('not Working');
        window.location.href='Add_flocks.php';
    </script>
        <?php
    }
 
}
      }
      else{
        if($interval->days<=185  or $date2<=$date1 )
        {
            ?>
        <script type="text/javascript">alert('Invalid:- Pleas Enter Minimium 6 Months');
        window.location.href='Add_flocks.php';
    </script>
        <?php    
}
else
{
  $Query = "INSERT INTO flock(flock_id,Flock_name,start_date,end_date,nob,remaining,Purchase_cost,farm_id,Breed_type,Status) 
        values('$f_id','$f_name','$st_date','$End_date','$no_of_birds','$remaining','$Purchase_cost','$Farm','$Breed_type','$status')" ;
 $confirm_status = mysqli_query($conn,$Query);
       $Query1 = "INSERT INTO expences(Farm_id,flock_id,e_name,sub_type,e_qnty,price,e_date) 
        values('$Farm','$f_id','Flock','No','$no_of_birds','$t_p','$st_date')" ;
        
 $confirm_status1 = mysqli_query($conn,$Query1);
       if($confirm_status&& $confirm_status1)
       {
        $q="UPDATE farm SET farm.Status='$status' WHERE farm.Farm_id='$Farm'";
        mysqli_query($conn,$q);
?>
        <script>
            alert('Flock has been Successfully Inserted');
            window.location.href='view_flocks.php';
            </script>
<?php
    }
    else
    {
        ?>
        <script type="text/javascript">alert('not Working');
        window.location.href='Add_flocks.php';
    </script>
        <?php
    }
 
}}}
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
 <?php
include("includes/header.php");
include("includes/sidebar.php");
 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add
        <small>Flocks</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="javascript:void(0)"class="active">Farms</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="#" method="post" name="form">  
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Flocks</h3>

          
        </div>
        <!-- /.box-header -->

        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Flock Name</label>
                <input type="text" name="Flock_Name" parsley-trigger="change" required
                placeholder="Flock Name" class="form-control" id="FlockName"  onkeyup="myChangeFunction(this)">
              </div>
              <div class="form-group">
                <label >Select Farm</label>
                <!-- <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Add New Farm</button> -->
                <!-- <?php 
                // include("farm_popup.php"); 
                ?> -->
                <select class="form-control select2"  style="width: 100%;" name="Farm" id="Farm" data-placeholder="Select Farm" onchange="Farm_id(this.value);" >
                  <option></option>
                   <?php 
                      
                   $query = " SELECT * FROM farm WHERE Status='Available' ";
                   $result = mysqli_query($conn,$query);
                   
                     while($row = mysqli_fetch_array($result)){
                     $name= $row['Farm_id'];
                      ?>
                  <option value="<?php echo $name ?>"><?php echo $name ?></option>
                  <?php   
                    }
                     ?>
                </select>
              </div>
             <div class="form-group">
                <label>Start Date</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                  </div>
                  <input type="Date" class="form-control pull-right" id="st_date" name="st_date" onchange="myChangeFunction2(this)">
                  <!-- <script>
                       function date_chk(dt){
                        if(document.getElementById('breed').value=='')
                        {

                            $('#breed').addClass("highlght").focus();
                        }
                         if(document.getElementById('breed').value=='Broiler')
                        {
                       if(document.getElementById('end_date').value!='')
                       {
                            var st_dt=new Date(dt);
                        var ed_dt=new Date(document.getElementById('end_date').value);
                        const diffTime = Math.abs(st_dt - ed_dt);
                        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                        if(ed_dt<=st_dt && diffDays<30)
                        {
                            document.getElementById('end_date').value=''
                            document.getElementById('st_date').value=''
                            alert('Invalid:- Pleas Enter Minimium 1 Months');
                        }
                        if(document.getElementById('breed').value=='')
                        {

                        }
                       } 
                        }
                       
                      }
                  </script> -->
                </div>
               
              </div>           
                <div class="form-group">
                <label>Number Of Birds</label>
                <input type="Number" name="no_of_birds" parsley-trigger="change" required
                placeholder="Number Of Birds" class="form-control" id="NumberOfBirds" onkeyup="bird_capacity(this.value)">
              </div>
               </div>
               <script type="text/javascript">
                  function bird_capacity(birds)
                  {
                    var str=document.getElementById('Farm').value;
                      $.ajax({
                     url: "bird_capacity.php?q="+str,
                    type: 'get',
                    dataType: 'JSON',
                    success: function(response){
                            var capacity = parseInt(response);
                            var b=parseInt(birds);

                            if(b>capacity)
                            {
                                document.getElementById('NumberOfBirds').value="";
                                alert('You Entered More Birds Than Capacity');
                            }
                        }

                    });
                    }
                  
               </script>
            <div class="col-md-6">
                <div class="form-group">
                <label>Flock Id</label>
                <input type="text" name="Flock_id" parsley-trigger="change" required
                placeholder="Flock id" class="form-control" id="Flock_id" readonly>
              </div>
              <script >
                function myChangeFunction(input1) {
                    var v = document.getElementById('st_date').value;
                  document.getElementById('Flock_id').value ='';
               var input2 = document.getElementById('Flock_id');
                input2.value =input1.value+"("+v+")";
                       }
                       function myChangeFunction2(input1) {
                        var v = document.getElementById('FlockName').value;
                        document.getElementById('Flock_id').value ='';
               var input2 = document.getElementById('Flock_id');
                input2.value =v+"("+input1.value+")";
                       }

                      
                </script>
              <div class="form-group">
                <label>Breed Type</label>
                <select class="form-control select2" style="width: 100%;"id="breed" name="breed" >

                <script>
                    function Farm_id(str) {
                      xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    var t = this.responseText;
                   if(t=="Both"){
                    $('#breed')
                    .find('option')
                   .remove();
                   $('#breed').append(`<option></option>`);
                    optionText = "Broiler";
                   optionValue = "Broiler";
                   $('#breed').append(`<option value="${optionValue}">
                  ${optionText}
                </option>`);
                   optionText = "Layer";
                   optionValue = "Layer";
                   $('#breed').append(`<option value="${optionValue}">
                  ${optionText}
                </option>`);
                   }
                   else{
                    optionText = t;
                   optionValue = t;
                   
                   $('#breed')
                    .find('option')
                   .remove();
                         $('#breed').append(`<option></option>`);
                $('#breed').append(`<option value="${optionValue}">
                  ${optionText}
                </option>`);}
                       }
                      };
                   xhttp.open("GET", "ajax_file.php?q="+str, true);
                   xhttp.send();
                      }
                     
                      </script>
                   
                </select>
              </div>
              <div class="form-group">
                <label>Expeted End Date</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                  </div>
                  <input type="Date" class="form-control pull-right" id="end_date" name="end_date" >
                </div>
                <!-- <script>
                       function date_chk1(dt){
                        if(document.getElementById('breed').value=='')
                        {
                            $('#breed').addClass("highlght").focus();
                        }
                         if(document.getElementById('breed').value=='Broiler')
                        {
                       if(document.getElementById('st_date').value!='')
                       {
                            var ed_dt=new Date(dt);
                        var st_dt=new Date(document.getElementById('st_date').value);
                        const diffTime = Math.abs(st_dt - ed_dt);
                        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                        if(ed_dt<=st_dt && diffDays<30)
                        {
                            document.getElementById('end_date').value=''
                            document.getElementById('st_date').value=''
                            alert('Invalid:- Pleas Enter Minimium 1 Months');
                        }
                        if(document.getElementById('breed').value=='')
                        {

                        }
                       } 
                        }
                       
                      }
                  </script> -->
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Price Per Bird</label>
                <input type="Number" name="Purchase_cost" parsley-trigger="change" required
                placeholder="Purchase Cost" class="form-control" id="PurchaseCost">
              </div>
            </div>
            </div>
          <!-- /.row -->
           <button type="submit" name="BtnSubmit" class="btn btn-primary"  >Submit</button>
        </div>
      </div>
      </form>
      <!-- /.box -->
    </section>
  <div class="control-sidebar-bg"></div>
</div>
 <?php
  include("includes/footer.php");
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
<!-- Page script -->
<script>
  $(function () {
    $(".select2").select2();
  });
  
</script>
</body>
</html>
