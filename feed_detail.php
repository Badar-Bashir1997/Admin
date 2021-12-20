<?php 
 include("lib/session.php");
 include("lib/DBConn.php");
 if(isset($_GET['name'])){
    $name     = $_GET['name'];
    $qq       = "SELECT * FROM purchase WHERE type='$name'";
    $result11 = mysqli_query($conn,$qq);
    $row11    = mysqli_fetch_array($result11);
    }

    // $qry=" SELECT expences.e_name,SUM(expences.price)AS exp FROM expences WHERE flock_id='$id' GROUP BY expences.e_name ";
    // $rslt=mysqli_query($conn, $qry);
  
  
include("includes/header.php");
include("includes/sidebar.php");
 ?>
  
  <!-- Left side column. contains the logo and sidebar -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Feed
        <small>Records</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Feed Records</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="min-height: 100px !important;">

      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <span class="info-box-icon bg-yellow"><img class="info-box-icon" src="upload/feed.png" alt="User Image"></span>
          <div class="info-box">
            <div class="info-box-content">
              <span class="info-box-number ">Feed Name</span>
              <span class="info-box-text"><?php echo $name; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><img class="info-box-icon" src="upload/feed.png" alt="User Image"></span>
            <?php 

            $q="SELECT IFNULL(SUM(remaining),0) AS rmng FROM purchase WHERE type='".$name."'";
            $result=mysqli_query($conn, $q);
            $row= mysqli_fetch_array($result);
            $rmng=$row['rmng'];
             ?>
            <div class="info-box-content">
              <span class="info-box-number">Remaining</span>
              <span class="info-box-text">Bags=<?php echo $rmng; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
         <button type="button" class="btn btn-success pull-right " data-toggle="modal" data-target="#feed_modal1">+Buy Feed</button>
        </div>
        <!-- /.col -->
                
        <!-- /.col -->
      </div>
      
      
    </section>
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Feed Detail</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x: scroll;">
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                                  <th>Feed ID</th>
                                  <th>Feed Name</th>
                                  <th>Total Quantity</th>
                                  <th>Remaining</th>
                                  <th>Price Per Bag</th>
                                  <th>Total Price</th>
                                  <th>Payment Method</th>
                                  <th>Date</th>
                                  <th>Image</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $query = "SELECT * FROM purchase WHERE type='".$name."'";
                                      $result = mysqli_query($conn,$query);
                                        if ($result->num_rows > 0) {            
                                          while($row = mysqli_fetch_array($result))
                                             {
                                              ?>      
                                                <tr>
                                                    <td><?php echo $row['id']; ?></td> 
                                                    <td><?php echo $row['type']; ?></td>
                                                    <td><?php echo $row['qnty']; ?></td>
                                                    <td><?php echo $row['remaining']; ?></td>
                                                    <td><?php echo $row['price_per_unit']; ?></td>
                                                    <td><?php echo $row['total_price']; ?></td>
                                                    <td><?php echo $row['payment_method']; ?></td>
                                                    <td><?php echo $row['purchase_date']; ?></td>
                                                    <td><img src="<?php echo $row['image']; ?>" width = "50" height = "50"></td>
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
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Feed Used</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow: scroll;">
                <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                                  <th>Farm ID</th>
                                  <th>Flock ID</th>
                                  <th>Expense Date</th>
                                  <th>Feed Name</th>
                                  <th>Quantity</th>
                                  <th>Price</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $query = "SELECT * FROM expences WHERE e_name='feed' AND sub_type='".$name."'";
                                      $result = mysqli_query($conn,$query);
                                        if ($result->num_rows > 0) {            
                                          while($row = mysqli_fetch_array($result))
                                             {
                                              
                                              ?>      
                                                <tr>
                                                    <td><?php echo $row['farm_id']; ?></td> 
                                                    <td><?php echo $row['flock_id']; ?></td>
                                                    <td><?php echo $row['e_date']; ?></td>
                                                    <td><?php echo $row['sub_type']; ?></td>
                                                    <td><?php echo $row['e_qnty']; ?></td>
                                                    <td><?php echo $row['price']; ?></td>
                                                    
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
                  
         <!-- Add Feed -->
                  <div class="modal inmodal " id="feed_modal1" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false" >
            <div class="modal-dialog " >
                <div class="modal-content animated flipInY ">
                    <div class="modal-header">
                      <strong>Add Feed</strong>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        
                    </div>
                    <form method="post" id="feed_form" enctype="multipart/form-data">
                      <div class="modal-body">
                        <div class="box box-default">
                          <div class="box-header with-border">
                            <h3 class="box-title">Purchase Feed For <span style="color: red;">
                              <?php echo @$_GET['name'];?></span></h3>
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body">
                            <input type="hidden" name="feedName" id="feedName" value="<?php echo @$_GET['name'];?>">
                            <div class="row col-md-12">
                                <div class="form-group col-md-2">
                                  <label>Quantity: <span style="color:red;" hidden id="eror1">Pleas Enter The Valid Quantity</span></label>
                                </div>
                                <div class="form-group col-md-10">
                                <input type="Number" name="feedqnty" parsley-trigger="change" id="txtqnty" placeholder="Quantity of feed bags" class="form-control" onkeyup="totalp1(this.value);" required>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="form-group col-md-2">
                                  <label>Price per Bag:</label>
                                </div>
                                <div class="form-group col-md-10">
                                   <input type="number" name="txtPrice" parsley-trigger="change" id="price" placeholder="Enter Price per Bag" class="form-control" onchange="totalp(this.value)" required>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="form-group col-md-2">
                                  <label>Purchase Date:</label>
                                </div>
                                <div class="form-group col-md-10">
                                   <input type="date" name="txtDate" parsley-trigger="change" placeholder="" class="form-control" required>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="form-group col-md-2">
                                  <label>Image:</label>
                                </div>
                                <div class="form-group col-md-10">
                                  <input type="file" class="form-control" name="image" id="image" >
                                </div>
                            </div>
                            <?PHP include("vendor_blns_mng.php");?>

                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                          <button type="button" class="ladda-button btn btn-primary" id="add_feed" data-style="expand-right">Add</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
<!-- Add Vendor  -->
<div class="modal inmodal " id="add_vendor" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false" >
            <div class="modal-dialog " >
                <div class="modal-content animated flipInY ">
                    <div class="modal-header">
                      <strong>Add Vendor</strong>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        
                    </div>
                    <form method="post" id="vendor_form" enctype="multipart/form-data" class="was-validated">
                        <div class="modal-body">
                            
                            <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add Vendor</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row col-md-12">
                      <div class="form-group col-md-2">
                        <label>Vendor Name:</label>
                      </div>
                      <div class="form-group col-md-10">
                         <input type="text" name="feedName" parsley-trigger="change" required
                placeholder="Full Name" class="form-control" >
                      </div>
                  </div>
                  <div class="row col-md-12">
                      <div class="form-group col-md-2">
                        <label>Image:</label>
                      </div>
                      <div class="form-group col-md-10">
              <input type="file" name="image" id="image" class="form-control" required>
                      </div>
                  </div>
                  

        </div>
      </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            <button type="button" class="ladda-button btn btn-primary" id="add_vendor1" data-style="expand-right">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Add vendor -->

<?php
include("includes/footer.php");
include("includes/control_sidebar.php");
  ?>
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<?php include("includes/scripts.php"); ?>

<script type="text/javascript">
 function totalp(nm){
                  var num = parseInt(nm);
                  var num2= parseInt(document.getElementById('txtqnty').value)
                  window.ttl=num*num2;

                  $("#t_amount").text("Total Amount="+ttl);
                }
                function totalp1(nm){

                  var num = parseInt(nm);
                  var num2= parseInt(document.getElementById('price').value)
                  window.ttl=num*num2;
                  $("#t_amount").text("Total Amount="+ttl);
                }
$(document).on("click" , "#add_feed" , function() 
  {
    var qnty = $("#txtqnty").val();
    if( qnty>0 )
    {
      var formData = new FormData($("#feed_form")[0]);
      $.ajax({ 
        type : 'POST',
        url : 'ajax/purchase_ajax.php',
        data :formData,
        processData: false,
    contentType: false,
        success: function(response) {
          if(response=="Feed Successfully Added")
          {
            toastr.success(response, 'Success');
            setTimeout(function(){ window.location = "feed_detail.php?name=<?php echo $name; ?>"; }, 2000);
          }
          else
          {
            toastr.error(response);
          }
        }
      });
    } else {
      // $('#eror1').modal('show');
      $("#txtqnty").val('');
    }
   
  });

$(document).on("change" , "#vendor" , function() {
  console.log('aaaaaaaa');
  var vendor_id = $("#vendor").val();
  $("remaning").val('');
  $("balance").val('');
  $("txtamount").val('');

  $("remaning").attr('placeholder','');
  $("balance").attr('placeholder','');
  $.ajax({ 
    type : 'POST',
    url : 'ajax/purchase_ajax.php',
    dataType: 'JSON',
    data : {'vndr':vendor_id},
    success: function(response)
    {console.log('blns');
      var lnth = response.length;
      for(var i=0; i<lnth; i++){
          window.blns1 = response[i].blns;
          window.rmng1 = response[i].rmng;
          $("#remaning").attr('placeholder','Remaning='+rmng1);
          $("#balance").attr('placeholder',"Balance="+blns1);
      }
     
    }
    });

});

  function remain(tl)
                   {
                    var chk_remain = 0;
                    var chk_blns = 0;
                    var d_b_rem = parseInt(window.rmng1); // Remaining From Database
                    var d_b_bls = parseInt(window.blns1); // Balance From Database
                    var tol_bill  = window.ttl;  //Total= price * Quantity
                    var ent_amnt = parseInt(tl); // Entered Amount
                    if(tol_bill>ent_amnt)
                    { 
                       chk_remain= tol_bill-ent_amnt;
                       if(d_b_rem>0)
                       { 
                        $("#remaning").val(chk_remain+d_b_rem);
                        $("#balance").val(0);
                       }
                       else if(d_b_bls>0 && d_b_bls>chk_remain)
                       { 
                        $("#balance").val(d_b_bls-chk_remain);
                        $("#remaning").val(0);
                       }
                       else if(d_b_bls>0 && d_b_bls<chk_remain)
                       { 
                        $("#balance").val(0);
                        $("#remaning").val(chk_remain-d_b_bls);
                       }
                       else
                       { 
                        $("#balance").val(chk_blns);
                        $("#remaning").val(chk_remain);
                       }
                    }
                    else
                    { 
                      chk_blns=ent_amnt-tol_bill;
                      if(d_b_bls>0)
                       { 
                        $("#balance").val(d_b_bls+chk_blns);
                        $("#remaning").val(0);
                       }
                       else if(d_b_rem>0 && d_b_rem>chk_blns)
                       {
                        $("#remaning").val(d_b_rem-chk_blns);
                        $("#balance").val(0);
                       }
                       else if(d_b_rem>0 && d_b_rem<chk_blns)
                       { 
                        $("#remaning").val(0);
                        $("#balance").val(chk_blns-d_b_rem);
                       }
                       else
                       { 
                        $("#balance").val(chk_blns);
                        $("#remaning").val(chk_remain);
                       }
                    }
                   }


</script>
</body>
</html>