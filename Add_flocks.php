<?php 
 include("lib/session.php");
 include("lib/DBConn.php");
  $sql11 = "SELECT IFNULL(MAX(flock_id),0) AS id FROM flock;";
            $result11 = mysqli_query($conn,$sql11);
            $row11 = mysqli_fetch_array($result11);
 if(isset($_GET['id'])){
            $Farmid = $_GET['id'];
            $sql = "SELECT name,Breed_type FROM farm WHERE farm_id = '".$Farmid."'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result);
    }
if(isset($_REQUEST['BtnSubmit']))
 {
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
        $sql = "SELECT flock_id FROM flock WHERE farm_id='$Farm' AND Status='$status'";
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
    </script>
        <?php    
}
else
{
  $Query = "INSERT INTO flock(Flock_name,start_date,end_date,nob,remaining,Purchase_cost,farm_id,Breed_type,Status) 
        values('$f_name','$st_date','$End_date','$no_of_birds','$remaining','$Purchase_cost','$Farm','$Breed_type','$status')" ;
 $confirm_status = mysqli_query($conn,$Query);
 $qr="SELECT LAST_INSERT_ID()AS id";
 $result1 = mysqli_query($conn,$qr);
$row1=mysqli_fetch_array($result1);
$f1_id=$row1['id'];
 $Query1 = "INSERT INTO expences(farm_id,flock_id,e_name,sub_type,e_qnty,price,e_date) 
        values('$Farm','$f1_id','Flock','No','$no_of_birds','$t_p','$st_date')" ;
        
 $confirm_status1 = mysqli_query($conn,$Query1);
       if($confirm_status && $confirm_status1)
       {
        $q="UPDATE farm SET farm.Status='$status' WHERE farm.farm_id='$Farm'";
        mysqli_query($conn,$q);
        if(@$Farmid!=" ")
        {
            header("location:view_all_farm.php");
        }
        else
        {
            header("location:view_flocks.php");
        }
              
    }
    else
    {
      
        ?>
        <script type="text/javascript">alert('not Working');
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
    </script>
        <?php    
}
else
{
  $Query = "INSERT INTO flock(Flock_name,start_date,end_date,nob,remaining,Purchase_cost,farm_id,Breed_type,Status) 
        values('$f_name','$st_date','$End_date','$no_of_birds','$remaining','$Purchase_cost','$Farm','$Breed_type','$status')" ;
 $confirm_status = mysqli_query($conn,$Query);
  $qr="SELECT LAST_INSERT_ID()AS id";
 $result1 = mysqli_query($conn,$qr);
$row1=mysqli_fetch_array($result1);
$f1_id=$row1['id'];
       $Query1 = "INSERT INTO expences(farm_id,flock_id,e_name,sub_type,e_qnty,price,e_date) 
        values('$Farm','$f1_id','Flock','No','$no_of_birds','$t_p','$st_date')" ;
        
 $confirm_status1 = mysqli_query($conn,$Query1);
       if($confirm_status&& $confirm_status1)
       {
        $q="UPDATE farm SET farm.Status='$status' WHERE farm.Farm_id='$Farm'";
        mysqli_query($conn,$q);
if(@$Farmid!=" ")
        {
            header("location:view_all_farm.php");
        }
        else
        {
            header("location:view_flocks.php");
        }
    }
    else
    {
        ?>
        <script type="text/javascript">alert('not Working');
    </script>
        <?php
    }
 
}}}
}

 ?>
 
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
             <div class="row col-md-12">
                      <div class="form-group col-md-2">
                        <label>Flock Name:</label>
                      </div>
                      <div class="form-group col-md-10">
                        <input type="text" name="Flock_Name" parsley-trigger="change" required
                placeholder="Flock Name" class="form-control" id="FlockName" readonly  >
                      </div>
                  </div>
                   <div class="row col-md-12">
                      <div class="form-group col-md-2">
                        <label>Select Farm:</label>

                      </div>
                      <div class="form-group col-md-8">

                         <select class="form-control select2"  style="width: 100%;" name="Farm" id="Farm" required>
                  <option>Select Farm</option>
                   <?php 
                   $query   = "SELECT * FROM farm WHERE Status='Available' ";
                   $result  = mysqli_query($conn,$query);
                   
                    while($farms = mysqli_fetch_array($result)){ ?>
                        <option value="<?php echo $farms['farm_id'];?>" <?php if( @$Farmid == $farms['farm_id'] ) { ?>selected <?php } ?> > <?php echo  $farms['name'];?></option>
                    <?php } ?>
                </select>
                      </div>
                      <div class="form-group col-md-2"><button type="button" style="margin-left :5px;" class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal">+Add New Farm</button></div>
                  </div>
                   <div class="row col-md-12">
                      <div class="form-group col-md-2">
                        <label>Breed Type:</label>
                      </div>
                      <div class="form-group col-md-10">
                          <select class="form-control select2" style="width: 100%;"id="breed" name="breed" required >

                    <option value="0">Select breed type</option>
                    <?php if( $row['Breed_type'] == "Both" ) { ?>
                        <option value="Broiler">Broiler</option>
                        <option value="Layer">Layer</option>
                    <?php } else { ?>
                    <option value="<?php echo @$row['Breed_type'];?>"><?php echo @$row['Breed_type'];?></option>
                    <?php } ?>                
                </select>
                      </div>
                  </div> <div class="row col-md-12">
                      <div class="form-group col-md-2">
                        <label>Number Of Birds:</label>
                      </div>
                      <div class="form-group col-md-10">
                        <input type="Number" name="no_of_birds" parsley-trigger="change" required
                placeholder="Number Of Birds" class="form-control" id="NumberOfBirds" onkeyup="bird_capacity(this.value)">
                      </div>
                  </div>
                   <div class="row col-md-12">
                      <div class="form-group col-md-2">
                        <label>Start Date:</label>
                      </div>
                      <div class="form-group col-md-10">
                          <input type="Date" class="form-control pull-right" id="st_date" name="st_date" required>
                      </div>
                  </div>
                  <div class="row col-md-12">
                      <div class="form-group col-md-2">
                        <label>Expeted End Date:</label>
                      </div>
                      <div class="form-group col-md-10">
                        <input type="Date" class="form-control pull-right" id="end_date" name="end_date" required>
                      </div>
                  </div>
                  <div class="row col-md-12">
                      <div class="form-group col-md-2">
                        <label>Price Per Bird:</label>
                      </div>
                      <div class="form-group col-md-10">
                        <input type="Number" name="Purchase_cost" parsley-trigger="change" required
                placeholder="Purchase Cost" class="form-control" id="PurchaseCost">
                      </div>
                  </div>
          <!-- <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Flock Name</label>
                <input type="text" name="Flock_Name" parsley-trigger="change" required
                placeholder="Flock Name" class="form-control" id="FlockName" readonly  >
              </div>
              <div class="form-group">
                <label >Select Farm</label>
                <button type="button" class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#myModal">+Add New Farm</button>
                 
                <select class="form-control select2"  style="width: 100%;" name="Farm" id="Farm">
                  <option>Select Farm</option>
                   <?php 
                   $query   = "SELECT * FROM farm WHERE Status='Available' ";
                   $result  = mysqli_query($conn,$query);
                   
                    while($farms = mysqli_fetch_array($result)){ ?>
                        <option value="<?php echo $Farmid;?>" <?php if( @$Farmid == $farms['farm_id'] ) { ?>selected <?php } ?> > <?php echo  $farms['name'];?></option>
                    <?php } ?>
                </select>
              </div>
             <div class="form-group">
                <label>Start Date</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                  </div>
                  <input type="Date" class="form-control pull-right" id="st_date" name="st_date" required>
                  
                </div>
               
              </div>           
                <div class="form-group">
                <label>Number Of Birds</label>
                <input type="Number" name="no_of_birds" parsley-trigger="change" required
                placeholder="Number Of Birds" class="form-control" id="NumberOfBirds" onkeyup="bird_capacity(this.value)">
              </div>
               </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Breed Type</label>
                <select class="form-control select2" style="width: 100%;"id="breed" name="breed" required >

                    <option value="0">Select breed type</option>
                    <?php if( $row['Breed_type'] == "Both" ) { ?>
                        <option value="Broiler">Broiler</option>
                        <option value="Layer">Layer</option>
                    <?php } else { ?>
                    <option value="<?php echo @$row['Breed_type'];?>"><?php echo @$row['Breed_type'];?></option>
                    <?php } ?>                
                </select>
              </div>
              <div class="form-group">
                <label>Expeted End Date</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                  </div>
                  <input type="Date" class="form-control pull-right" id="end_date" name="end_date" required>
                </div>
                
              </div> -->
              <!-- /.form-group -->
             <!--  <div class="form-group">
                <label>Price Per Bird</label>
                <input type="Number" name="Purchase_cost" parsley-trigger="change" required
                placeholder="Purchase Cost" class="form-control" id="PurchaseCost">
              </div>
            </div>
            </div> -->
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
                 include("farm_popup.php"); 
                ?>
 <?php
  include("includes/footer.php");
include("includes/control_sidebar.php");
include("includes/scripts.php");
  ?>
</body>
</html>
<script>
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


    $(document).on("change" , "#Farm" , function() {
        
        var str=document.getElementById('Farm').value;
              xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                
          if (this.readyState == 4 && this.status == 200) {

            var t = this.responseText;
           if(t=="Both"){
            $('#breed')
            .find('option')
           .remove();
           $('#breed').append(`<option>Select breed type</option>`);
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
                 $('#breed').append(`<option>Select breed type</option>`);
        $('#breed').append(`<option value="${optionValue}">
          ${optionText}
        </option>`);}
               }
              };
           xhttp.open("GET", "ajax_file.php?q="+str, true);
           xhttp.send();
            });


 $(document).on("change" , "#breed" , function() {
    if($('#breed').val()=='Broiler'){
        var id=parseInt("<?php echo $row11['id'];?>");
        id++;
        var nm = 'Broiler'+id;
$('#FlockName').val(nm);
}
if($('#breed').val()=='Layer'){
    var id=parseInt("<?php echo $row11['id'];?>");
        id++;
$('#FlockName').val('Layer'+id);
}
 });


 $(document).on("click" , "#Add_farm" , function() {

var frm_name = $("#FarmName").val();
    if(frm_name!=''&&  $("#FarmLocation").val()!='' &&  $("#capacity").val()>=1)
    {
    $.ajax({ 
    type : 'POST',
    url : 'ajax/popup_farm_ajax.php',
    data : $('#Add_frm').serialize(),
    success: function(response)
    {
      if(response!="Null")
      {
        toastr.success('Farm Successfully Added', 'Success');
         optionText = $("#FarmName").val();
           optionValue = response;
         $('#Farm').append(`<option selected value="${optionValue}">
          ${optionText}
        </option>`);
         if($("#farm_breed_type").val()=="Both"){
            $('#breed')
            .find('option')
           .remove();
           $('#breed').append(`<option>Select breed type</option>`);
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
            
            optionText = $("#farm_breed_type").val();
           optionValue = $("#farm_breed_type").val();
           $('#breed')
            .find('option')
           .remove();
                 $('#breed').append(`<option>Select breed type</option>`);
        $('#breed').append(`<option value="${optionValue}">
          ${optionText}
        </option>`);}
        $('#Add_frm')[0].reset();
        $('#myModal').modal('hide');
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
    }
 });
                     
                      </script>