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
        $ttl_price=$price*$qnty_feed;
        $p_Date=$_REQUEST['txtDate'];
        $Status=$_REQUEST['Status'];
        $vendor=$_REQUEST['vendor'];
        $txtremaning=$_REQUEST['txtremaning'];
        $txtbalance=$_REQUEST['txtbalance'];
        $txtamount=$_REQUEST['txtamount'];

        $Query = "INSERT INTO purchase(name,type,qnty,remaining,price_per_unit,total_price,paid_amount,remaining_amount,balance_amount,payment_method,purchase_date,image,v_id)  
        values('Feed','$F_name','$qnty_feed','$qnty_feed','$price','$ttl_price','$txtamount','$txtremaning','$txtbalance','$Status','$p_Date','$location','$vendor')" ;
 $confirm_status = mysqli_query($conn,$Query);

$Query1="UPDATE `vendors` SET `balance` = '$txtbalance',`remaining` ='$txtremaning' WHERE `vendors`.`v_id` ='".$vendor."' ";
 $confirm_status1 = mysqli_query($conn,$Query1);

       if($confirm_status && $confirm_status1)
       {
        header("location:feed.php");
    }
    else
    {
        ?>
        <script type="text/javascript">alert('not Working');
    </script>
        <?php
    }
mysqli_close($conn);}
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
                placeholder="Quantity of feed bags" class="form-control" onkeyup="totalp1(this.value)" >
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Price per Bag</label>
                <input type="number" name="txtPrice" parsley-trigger="change" required id="price" 
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
          
          <?PHP include("vendor_blns_mng.php");?>
          <!-- /.row -->
           <button type="submit" name="BtnSubmit" class="btn btn-primary pull-right"  >Submit</button>
           
        </div>
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
            <div class="box-body" style="overflow-x: scroll;">
              <table id="example"class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                  
                  <th>id</th>
                  <th>Feed Name</th>
                  <th>Quantity</th>
                  <th>Remaining</th>
                  <th>Price Per Liter</th>
                  <th>Total Price</th>
                  <th>Paid Amount</th>
                  <th>Remaining Amount</th>
                  <th>Balance Amount</th>
                  <th>Payment Method</th>
                  <th>Purchase Dates</th>
                  <th>Image</th>
                  
                </tr>
                </thead>
                <tbody>
                  <?php
                    $query = "SELECT * FROM purchase WHERE purchase.name='Feed' ";
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
                                  <td><?php echo $row['paid_amount']; ?></td>
                                  <td><?php echo $row['remaining_amount']; ?></td>
                                  <td><?php echo $row['balance_amount']; ?></td>
                                  <td><?php echo $row['payment_method']; ?></td>
                                  <td><?php echo $row['purchase_date']; ?></td>
                                  <td><img src="<?php echo $row['image']; ?>" width = "50" height = "50"></td>
                                  
                   <!-- <td>
                <button type="button" class="btn btn-primary btn-xs dt-edit" style="margin-right:16px;">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-danger btn-xs dt-delete">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
            </td> -->
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
include("includes/scripts.php");
  ?>
<!-- ./wrapper -->



</body>
</html>
<script>
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

$(document).on("change" , "#vendor" , function() {
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
              </script>