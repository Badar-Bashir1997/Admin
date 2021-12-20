<?php 
 include("lib/session.php");
 include("lib/DBConn.php");
if(isset($_REQUEST['BtnSubmit']))

    {
        $Farm=$_REQUEST['Farm'];
        $Flock=$_REQUEST['Flock'];
        $e_Date=$_REQUEST['e_Date'];
        $remain=$no_of_Eggs=$_REQUEST['no_of_Eggs'];
        $Query1="SELECT flock_id FROM flock WHERE flock.Flock_name='$Flock'";
        $result = mysqli_query($conn,$Query1);
        $row = mysqli_fetch_array($result);
        $Flock1=$row['flock_id'];
        $Query = "INSERT INTO production(flock_id,p_name,p_date,qnty,remaining)
        values('$Flock1','Egg','$e_Date','$no_of_Eggs','$remain')" ;
 $confirm_status = mysqli_query($conn,$Query);
       if($confirm_status)
       {
        header("location:egg_production.php");
    }
    else
    {
        ?>
        <script type="text/javascript">alert('not Working');
    </script>
        <?php
    }
}



 ?>

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
        <small>Egg Production</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Eggs</a></li>
        <li class="active">Production</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add Egg Production</h3>

          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
             <form action="#" method="post" name="form" class="was-validated">  
              <div class="row col-md-12">
                      <div class="form-group col-md-2">
                        <label>Select Farm:</label>
                      </div>
                      <div class="form-group col-md-10">
                         <select class="form-control select2" style="width: 100%;" name="Farm" id="Farm" data-placeholder="Select Farm" onchange="Farm_id(this.value);">
                  <option></option>
                   <?php 
      
                   $query = " SELECT * FROM farm WHERE Breed_type='Layer' OR  Breed_type='Both' ";
                    $result = mysqli_query($conn,$query);
                     while($row = mysqli_fetch_array($result)){
                     $f_id= $row['name'];
                     ?>
                  <option value="<?php echo $row['farm_id'] ?>"><?php echo $f_id ?></option>
                  <?php   }
                   ?> 
                </select>
                      </div>
                  </div>
                  <div class="row col-md-12">
                      <div class="form-group col-md-2">
                        <label>Date:</label>
                      </div>
                      <div class="form-group col-md-10">
                         <input type="Date" name="e_Date" parsley-trigger="change" required
                 class="form-control" id="PurchaseCost">
                      </div>
                  </div>
                  <div class="row col-md-12">
                      <div class="form-group col-md-2">
                        <label>Select Flock:</label>
                      </div>
                      <div class="form-group col-md-10">
                         <select class="form-control select2" style="width: 100%;" name="Flock" id="Flock" data-placeholder="Select Flock">
                  
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
                      </div>
                  </div>
             <div class="row col-md-12">
                      <div class="form-group col-md-2">
                        <label>Number Of Eggs Laid:</label>
                      </div>
                      <div class="form-group col-md-10">
                         <input type="Number" name="no_of_Eggs" parsley-trigger="change" required
                placeholder="Number Of Eggs Laid" class="form-control" id="NumberOfBirds">
                      </div>
                  </div>
             
          
           <button type="submit" name="BtnSubmit" class="btn btn-primary"  >Submit</button>
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
              <h3 class="box-title">Egg Production</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x: scroll;">
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                                  <th>Flock ID</th>
                                  <th>Farm Name</th>
                                  <th>Flock Name</th>
                                  <th>Quantity</th>
                                  <th>Production Date</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $query22 = "SELECT *,(SELECT Flock_name FROM flock WHERE flock_id=production.flock_id)AS Flock_name,(SELECT farm_id FROM flock WHERE flock_id=production.flock_id)AS frm_id,(SELECT name FROM farm WHERE farm_id=frm_id)AS farm_name FROM production WHERE p_name='Egg'";
                                      $result22 = mysqli_query($conn,$query22);            
                                          while(@$row = mysqli_fetch_array($result22))
                                             {
                                              
                                              ?>      
                                                <tr>
                                                    <td><?php echo $row['flock_id']; ?></td>
                                                    <td><?php echo $row['farm_name']; ?></td>
                                                    <td><?php echo $row['Flock_name']; ?></td>
                                                    <td><?php echo $row['qnty']; ?></td>
                                                    <td><?php echo $row['p_date']; ?></td>
                                                    
                                                       </tr>
                                                         <?php
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
 

 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
 <?php
  include("includes/footer.php");
include("includes/control_sidebar.php");
include("includes/scripts.php");
  ?>
<!-- ./wrapper -->


</body>
</html>
