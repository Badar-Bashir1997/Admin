<?php 
 include("lib/session.php");
 include("lib/DBConn.php");
 if(isset($_REQUEST['BtnSubmit']))
    {
      $fileinfo = PATHINFO($_FILES["image"]["name"]);
        $newFilename = $fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
        move_uploaded_file($_FILES["image"]["tmp_name"],"upload/Medicine/" . $newFilename);
        $location = "upload/Medicine/" . $newFilename;
        $medicine=$_REQUEST['medicine'];
        $qnty=$_REQUEST['qnty_of_mdsn'];
        $price=$_REQUEST['price'];
        $ttl_price=$qnty*$price;
        $e_Date=$_REQUEST['d_Date'];
        $Status=$_REQUEST['Status'];
        $vendor=$_REQUEST['vendor'];
        $txtremaning=$_REQUEST['txtremaning'];
        $txtbalance=$_REQUEST['txtbalance'];
        $txtamount=$_REQUEST['txtamount'];
        $Query = "INSERT INTO purchase(name,type,qnty,remaining,price_per_unit,total_price,paid_amount,remaining_amount,balance_amount,payment_method,purchase_date,image,v_id)  
        values('Medicine','$medicine','$qnty','$qnty','$price','$ttl_price','$txtamount','$txtremaning','$txtbalance','$Status','$e_Date','$location','$vendor')" ;
 $confirm_status = mysqli_query($conn,$Query);
 
 $Query1="UPDATE `vendors` SET `balance` = '$txtbalance',`remaining` ='$txtremaning' WHERE `vendors`.`v_id` ='".$vendor."' ";
 $confirm_status1 = mysqli_query($conn,$Query1);

       if($confirm_status && $confirm_status1)
       {
        header("location:medicine.php");
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
 <?php
include("includes/sidebar.php");
 ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Purchase
        <small>Medicine</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Purchase</a></li>
        <li class="active">Medicine</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Purchase Medicine</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form action="#" method="post" name="form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6">
             
              <div class="form-group">
                <label>Medicine Name</label>
               <input type="text" name="medicine" parsley-trigger="change" required
                placeholder="Medicine Name" class="form-control" id="medicine">
              </div>
              <div class="form-group">
                <label>Medicine Quantity</label>
               <input type="Number" name="qnty_of_mdsn" parsley-trigger="change" required
                placeholder="Quantity" class="form-control" id="qnty_of_mdsn" onkeyup="totalp1(this.value)">
              </div>
            </div>
            <!-- /.col -->
            <!-- /.col -->
             <div class="col-md-6">
              
              <div class="form-group">
                <label>Purchase Date</label>
                <input type="Date" name="d_Date" parsley-trigger="change" required
                 class="form-control" id="d_Date">
              </div>
            <div class="form-group">
                <label>Price Per Packet</label>
                <input type="Number" name="price" parsley-trigger="change" required 
                placeholder="Enter Price per Packet" class="form-control" id="price" onchange="totalp(this.value)"> 
              
            
          </div>
            </div>
          </div>
          <!-- /.row -->
          <div class="col-md-12">
            <div style="margin: auto;width: 60%;" >
          <div class="form-group">
              <label class="col-2 col-form-label">Image<span class="text-danger">*</span></label>
              <div class="col-12">
              <input type="file" name="image" class="form-control">
              </div>
              </div></div></div>
          <?PHP include("vendor_blns_mng.php");?>
          <!-- /.row -->
           <button type="submit" name="BtnSubmit" class="btn btn-primary pull-right" >Submit</button>
           </form>
        </div>
      </div>
      <!-- /.box -->
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Medicine Purchase Record</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x: scroll;">
              <table id="example"class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                  
                  <th>id</th>
                  <th>Medicine Name</th>
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
                    $query = "SELECT * FROM purchase WHERE purchase.name='Medicine' ";
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
                                  
                  <!--  <td>
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
   <?php
include("includes/control_sidebar.php");
include("includes/scripts.php");
  ?>
</div>
</body>
</html>
<script>
                function totalp(nm){
                  var num = parseInt(nm);
                  var num2= parseInt(document.getElementById('qnty_of_mdsn').value)
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