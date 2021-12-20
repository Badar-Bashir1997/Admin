<?php 
 include("lib/session.php");
 include("lib/DBConn.php");
 if(isset($_REQUEST['BtnSubmit']))
    {
      $Price=0;
      $Farm=$_REQUEST['Farm'];
        $Flock1=$_REQUEST['Flock'];
        $e_Date=$_REQUEST['txtDate'];
        $Qty=$qnty_of_feed=$_REQUEST['txtqnty'];
        $f_name=$_REQUEST['txtName'];
        $q1="SELECT purchase.id,purchase.remaining,purchase.price_per_unit,(SELECT flock_id FROM flock WHERE flock.Flock_name='$Flock1')AS flock_id FROM purchase WHERE purchase.name='Feed' AND purchase.remaining>0 ORDER BY `purchase`.`id` ASC";
        $result1 = mysqli_query($conn,$q1);

        while($row1=mysqli_fetch_array($result1))
        {
          $used=0;
          $d_id=$row1['id'];
          $d_q=$row1['remaining'];
          $p=$row1['price_per_unit'];
          $Flock=$row1['flock_id'];
          if($GLOBALS['Qty']<=0)
          {
            
          }
          elseif($GLOBALS['Qty']>=$d_q)
          {
            $remaning_qnty=$GLOBALS['Qty'];
            $GLOBALS['Qty']=$GLOBALS['Qty']-$d_q;
            $used=$remaning_qnty-$GLOBALS['Qty'];
            $GLOBALS['Price']=$GLOBALS['Price']+$used*$p;
            $qry2="UPDATE purchase SET purchase.remaining=0 WHERE purchase.id='$d_id'";
            mysqli_query($conn,$qry2);
          }
          elseif($GLOBALS['Qty']<$d_q && $GLOBALS['Qty']>0 )
          {

            $GLOBALS['Price']=$GLOBALS['Price']+$GLOBALS['Qty']*$p;
            $Qnty=$d_q-$GLOBALS['Qty'];
            $GLOBALS['Qty']=0;
            $qry2="UPDATE purchase SET purchase.remaining='$Qnty' WHERE purchase.id='$d_id'";
            mysqli_query($conn,$qry2);
          }
        }
        $tp=$GLOBALS['Price'];
        $Query = "INSERT INTO expences(Farm_id,flock_id,e_name,sub_type,e_qnty,price,e_date) 
        values('$Farm','$Flock','Feed','$f_name','$qnty_of_feed','$tp','$e_Date')" ;
        
 $confirm_status = mysqli_query($conn,$Query);
       if($confirm_status)
       {
         header("location:feed_exp.php");
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
           Feed
           <small>Expenses</small>
          </h1>
          <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
           <li><a href="#">Feed</a></li>
          <li class="active">Expenses</li>
          </ol>
        </section>

    <!-- Main content -->
    <section class="content">
<form action="#" method="post" name="form" class="was-validated" enctype="multipart/form-data">
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Feed Expenses</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <!-- /.col -->
            <div class="col-md-6">
            <div class="form-group">
                <label>Select Farm</label>
                <select class="form-control select2" style="width: 100%;" name="Farm" id="Farm" data-placeholder="Select Farm" onchange="Farm_id(this.value);"required>
                  <option></option>
                   <?php 
      
                   $query = " SELECT * FROM farm";
                    $result = mysqli_query($conn,$query);
                     while($row = mysqli_fetch_array($result)){
                     $f_id= $row['name'];
                     ?>
                  <option value="<?php echo $row['farm_id'] ?>"><?php echo $f_id ?></option>
                  <?php   }
                   ?> 
                </select>
              </div></div>
              <div class="col-md-6">
              <div class="form-group">
                <label>Select Flock</label>
                <select class="form-control select2" style="width: 100%;" name="Flock" id="Flock" data-placeholder="Select Flock"  onchange="flock(this.value);"required>
                </select>
              </div></div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Feed Name</label>
                
                 <select class="form-control select2" style="width: 100%;" name="txtName" id="txtName" data-placeholder="Select Feed Name" onchange="Feed_q(this.value);" required >
                  <option></option>
                   <?php 
      
                   $query = " SELECT type FROM purchase WHERE remaining>0 AND name='Feed' GROUP BY type ";
                    $result = mysqli_query($conn,$query);
                     while($row = mysqli_fetch_array($result))
                     {
                     $f_name= $row['type'];
                     ?>
                  <option value="<?php echo $f_name;?>"><?php echo $f_name; ?></option>
                  <?php   }
                   ?> 
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Quantity</label>
                <input type="Number" name="txtqnty" parsley-trigger="change" required
                 class="form-control" id="txtqnty" placeholder="" >
              </div>
              <!-- /.form-group -->
            </div>
            
            <!-- /.col -->
             <div class="col-md-12">
              <div style="margin: auto;width: 60%;">
              <div class="form-group">
                <label>Expense Date</label>
                <input type="date" name="txtDate" parsley-trigger="change" required
                placeholder="" class="form-control">
              </div>
              <!-- /.form-group -->
            </div>
            </div>
           

          </div>
          <!-- /.row -->
          
          
           <button type="submit" name="BtnSubmit" class="btn btn-primary pull-right"  onclick="return onRegister();">Submit</button>
           
        </div>
        <!-- /.box-body -->

        
        
      </div>
      <!-- /.box -->
    </form>
    </section>
            
 
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Feed Expences Record</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x: scroll;">
              <table id="example"class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                  
                  <th>Farm</th>
                  <th>Flock</th>
                  <th>Feed Name</th>
                  <th>Quantity</th>
                  <th>Date</th>
                  <th>Price</th>
                  <!-- <th>Actions</th> -->
                  
                </tr>
                </thead>
                <tbody>
                  <?php
                    $query = "SELECT *,(SELECT Flock_name FROM flock WHERE flock.flock_id=expences.flock_id)AS flk_id,(SELECT name FROM farm WHERE farm.farm_id=expences.farm_id)AS frm_id FROM expences WHERE e_name='Feed' ";
                    $result = mysqli_query($conn,$query);
                      if ($result->num_rows > 0) {            
                        while($row = mysqli_fetch_array($result))
                           {
                            ?> 
                                  <tr>
                                  
                                  <td><?php echo $row['frm_id']; ?></td> 
                                  <td><?php echo $row['flk_id']; ?></td>
                                  <td><?php echo $row['sub_type']; ?></td>
                                  <td><?php echo $row['e_date']; ?></td>
                                  <td><?php echo $row['e_qnty']; ?></td>
                                  <td><?php echo $row['price']; ?></td>
                                  
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
</div>
<!-- ./wrapper -->

</body>
</html>
<script type="text/javascript">
   function Feed_q(str) {                   
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) 
                  {
                    window.t = this.responseText; 
                    document.getElementById('txtqnty').placeholder="Maximum Number of Bags="+window.t;
                  }
                       
                      };
                   xhttp.open("GET", "feed_qnty.php?q="+str, true);
                   xhttp.send();
                
                      }
                       function onRegister()
                       {
                         var b = parseInt(window.t);
                    if(document.form.txtqnty.value>b)
                        {
                         alert("Enter Valid Number of Bags \r\n You Enter Greater Value than Maximum");
                        document.form.txtqnty.focus();
                           return (false);
                             }
             
                                 else
                              {
                             return (true);
                                 }
                               }

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