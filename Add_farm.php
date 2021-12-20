<?php 
 include("lib/session.php");
 include("lib/DBConn.php");
  if(isset($_REQUEST['BtnSubmit']))
    {
        $name=$_REQUEST['Farm_Name'];
        $location=$_REQUEST['Farm_Location'];
        $phone=$_REQUEST['txt_phone'];
        $b_type=$_REQUEST['breed_type'];
        $capacity=$_REQUEST['txt_capacity'];
        $status="Available";
        $Query = "INSERT INTO farm(name,location,Breed_type,phone_no,Status,bird_capacity) values('$name','$location','$b_type','$phone','$status','$capacity')" ;
        $confirm_status = mysqli_query($conn,$Query);
        
        $string=mysqli_error($conn);
        
       if($confirm_status)
       {
        header("location:view_all_farm.php");
      }
    else
    {
      if (str_contains($string, 'Duplicate')) {
        $error_log = "Farm ID Allready Exist , Pleas Change Name OR Location";
      }
        
    }
}
include("includes/header.php");
include("includes/sidebar.php");
 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add
        <small>Farm</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="javascript:void(0)"class="active" >Farms</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Farm</h3>

          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if(@$error_log){ ?>
            <p style="color: red;">1: <?php echo $error_log;?></p>
          <?php } ?>
          <form action="#" method="post" name="form" class="was-validated">
            <div class="row col-md-12">
                      <div class="form-group col-md-2">
                        <label>Name:</label>
                      </div>
                      <div class="form-group col-md-10">
                         <input type="text" name="Farm_Name" parsley-trigger="change" required
                          placeholder="Farm Name" class="form-control" id="FarmName" >
                      </div>
                  </div>
                  <div class="row col-md-12">
                      <div class="form-group col-md-2">
                        <label>Location:</label>
                      </div>
                      <div class="form-group col-md-10">
                         <input type="text" name="Farm_Location" parsley-trigger="change" required
                            placeholder="Farm Location" class="form-control" id="FarmLocation">
                      </div>
                  </div>
                  <div class="row col-md-12">
                      <div class="form-group col-md-2">
                        <label>Phone No:</label>
                      </div>
                      <div class="form-group col-md-10">
                         <input type="text" name="txt_phone" parsley-trigger="change" required
                placeholder="+923XXXXXXXXX" class="form-control" id="phone" pattern="[+]{1}[9]{1}[2]{1}[0-9]{10}" >
                      </div>
                  </div>
                  <div class="row col-md-12">
                      <div class="form-group col-md-2">
                        <label>Bird Capacity:</label>
                      </div>
                      <div class="form-group col-md-10">
                        <input type="Number" name="txt_capacity" parsley-trigger="change" required
                placeholder="Enter Maximum Bird Capacity" class="form-control" id="capacity" >
                      </div>
                  </div>
                  <div class="row col-md-12">
                      <div class="form-group col-md-2">
                        <label>Breed Type:</label>
                      </div>
                      <div class="form-group col-md-10">
                        <select class="form-control select2" style="width: 100%;" name="breed_type">
                  <option>Broiler</option>
                  <option>Layer</option>
                  <option>Both</option>
                </select>
                      </div>
                  </div>
          <!-- <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="Farm_Name" parsley-trigger="change" required
                placeholder="Farm Name" class="form-control" id="FarmName" onkeyup="myChangeFunction(this)">
              </div>
            </div>
          </div> -->
              <!-- /.form-group -->
              <!-- <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Location</label>
                <input type="text" name="Farm_Location" parsley-trigger="change" required
                placeholder="Farm Location" class="form-control" id="FarmLocation" onchange="myChangeFunction2(this)">
              </div>
            </div>
          </div> -->
              <!-- <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Phone No</label>
                <input type="text" name="txt_phone" parsley-trigger="change" required
                placeholder="+923XXXXXXXXX" class="form-control" id="phone" pattern="[+]{1}[9]{1}[2]{1}[0-9]{10}" >
              </div>
            </div>
          </div>
            <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Bird Capacity</label>
                <input type="Number" name="txt_capacity" parsley-trigger="change" required
                placeholder="Enter Maximum Bird Capacity" class="form-control" id="capacity" >
              </div>
            </div>
          </div> -->
              <!-- /.form-group -->
            
            <!-- /.col -->
           <!--  <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                <label>Breed Type</label>
                <select class="form-control select2" style="width: 100%;" name="breed_type">
                  <option>Broiler</option>
                  <option>Layer</option>
                  <option>Both</option>
                </select>
              </div> -->
              <!-- /.form-group -->
            <!-- </div> -->
            <!-- /.col -->
          <!-- </div> -->
          <!-- /.row -->
           <button type="submit" name="BtnSubmit" class="btn btn-primary" >Submit</button>
           </form>
        </div>
        <!-- /.box-body -->

        
        
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
 include("includes/scripts.php");
  ?>
<!-- Page script -->
 <!-- <script> 
    function onRegister()
          {
            if(document.form.Farm_Name.value == "")
            {
            alert("Enter Farm Name");
            document.form.Farm_Name.focus();
            return (false);
            }
             else if(document.form.Farm_Location.value == "")
            {
            alert("Enter Farm Location");
            document.form.Farm_Location.focus();
            return (false);
            }
            else if(document.form.capacity.value == "")
            {
            alert("Enter Farm Capacity");
            document.form.capacity.focus();
            return (false);
            }
            else
            {
                return (true);
            }
          }
        </script>   -->
</body>
</html>
<!-- <script type="text/javascript">
                
                function myChangeFunction(input1) {
               var v2 = document.getElementById('FarmLocation').value;
               document.getElementById('Farm_id').value ='';
               var input2=document.getElementById('Farm_id');
                input2.value =input1.value+"("+v2+")";
                       }
                       function myChangeFunction2(input1) {
                        var v = document.getElementById('FarmName').value;
                        document.getElementById('Farm_id').value ='';
                        var input2=document.getElementById('Farm_id');
                        input2.value =v+"("+ input1.value+")";
                       }
                </script> -->