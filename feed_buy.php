<?php $URL_FILE_NAME =  basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']); ?>
<?php 
 include("lib/session.php");
 include("lib/DBConn.php");
 ?>
 
   </div>
  <?php
include("includes/header.php");
include("includes/sidebar.php");
 ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
        <small>Feed</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
         <li class="active">Feed</li>
      </ol>
    </section>
    <div class="box box-default">
        <div class="box-header with-border">
      <section class="content" >
        <div class="row col-xs-12 col-lg-12">
          <div class="row col-xs-9 col-lg-9">
               <button type="button" class="btn btn-success pull-right " data-toggle="modal" data-target="#feed_modal2" style="margin-right: 2px;">Create New Feed
                </button>
          </div>
          <div class="row col-xs-3 col-lg-3">
                <select class="form-control select2 pull-right" name="Feed_name" id="Feed_name">
                          <option>Select Feed</option>
                          <?php
                          $q="SELECT * FROM feed";
                          $rslt=mysqli_query($conn,$q);
                          while($row = mysqli_fetch_array($rslt)) { ?>
                          <option value="<?php echo $row['feed_id']; ?>"><?php echo $row['name']; ?></option>
                         <?php } ?>
                        </select>
           </div>             
              <!-- <button type="button" class="btn btn-success pull-right " data-toggle="modal" data-target="#feed_modal1" style="margin: 2px;">+Add Feed
                </button> -->
            </div>
     <div >
                <?php 
                 $query="SELECT id,type,IFNULL(sum(remaining),0)AS remaining FROM purchase WHERE name='Feed' GROUP BY type";
                $result1 = mysqli_query($conn, $query);
               
               while($row = mysqli_fetch_array($result1))
               {
               ?>
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->

          <div class="small-box bg-aqua">
            <img class="info-box-icon" src="upload/feed.png" >
             <h4 style="text-align: center;" class="small-box-footer">Feed Name:- <?php echo $row['type']; ?></h4>
            <div class="inner">
              <h4 style="text-align: center;">Remaining:- <?php echo $row['remaining']; ?></h4>
            </div>
            <a href="feed_detail.php?name=<?php echo $row['type']; ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <?php 
        } ?>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        
      <!-- Small boxes (Stat box) -->
      
      </section>
    </div></div>
      
    </div>
<!-- Add Feed -->
                  <div class="modal inmodal " id="feed_modal1" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false" >
            <div class="modal-dialog " >
                <div class="modal-content animated flipInY ">
                    <div class="modal-header">
                      <strong>Add Feed</strong>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        
                    </div>
                    <form method="post" id="feed_form" enctype="multipart/form-data" class="was-validated">
                        <div class="modal-body">
                            
                            <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Purchase Feed</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row col-md-12">
                      <div class="form-group col-md-2">
                        <label>Feed Name:</label>
                      </div>
                      <div class="form-group col-md-10">
                         <input type="text" name="feedName" id="feedName" parsley-trigger="change" readonly placeholder="Full Name" class="form-control" >
                      </div>
                  </div>
                  <div class="row col-md-12">
                      <div class="form-group col-md-2">
                        <label>Quantity: <span style="color:red;" hidden id="eror1">Pleas Enter The Valid Quantity</span></label>
                      </div>
                      <div class="form-group col-md-10">
                      <input type="Number" name="feedqnty" parsley-trigger="change" required id="txtqnty" 
                placeholder="Quantity of feed bags" class="form-control" onkeyup="totalp1(this.value)" >
                      </div>
                  </div>
                  <div class="row col-md-12">
                      <div class="form-group col-md-2">
                        <label>Price per Bag:</label>
                      </div>
                      <div class="form-group col-md-10">
                         <input type="number" name="txtPrice" parsley-trigger="change" required id="price" 
                placeholder="Enter Price per Bag" class="form-control" onchange="totalp(this.value)" >
                      </div>
                  </div>
                  <div class="row col-md-12">
                      <div class="form-group col-md-2">
                        <label>Purchase Date:</label>
                      </div>
                      <div class="form-group col-md-10">
                         <input type="date" name="txtDate" parsley-trigger="change" required
                placeholder="" class="form-control">
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

<!-- Create New Feed -->
<div class="modal inmodal " id="feed_modal2" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false" >
    <div class="modal-dialog " >
        <div class="modal-content animated flipInY ">
            <div class="modal-header">
              <strong>Create Feed Type</strong>
               <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>    
            </div>
            <form method="post" id="create_feed_form" enctype="multipart/form-data" class="was-validated">
              <div class="modal-body">
                  <div class="box box-default">
                    <div class="box-header with-border">
                    </div>
                    <div class="box-body">
                        <div class="row col-md-12">
                        <div class="form-group col-md-2">
                          <label>Feed Name:</label>
                        </div>
                        <div class="form-group col-md-10">
                           <input type="text" name="feedName_create" id="feedName_create" parsley-trigger="change" placeholder="Full Name" class="form-control" >
                        </div>
                        </div>
                        <div class="row col-md-12">
                          <button type="button" class="ladda-button btn btn-primary pull-right" style="margin: 2px">Add Ingredients</button>
                            <!-- <div class="form-group col-md-2">
                              <label>Quantity: <span style="color:red;" hidden id="eror1">Pleas Enter The Valid Quantity</span></label>
                            </div>
                            <div class="form-group col-md-10">
                            <input type="Number" name="feedqnty" parsley-trigger="change" required id="txtqnty" placeholder="Quantity of feed bags" class="form-control" onkeyup="totalp1(this.value)" >
                            </div> -->
                        </div>
                        <div class="row col-md-12">
                          <div class="col-md-5">
                            <input type="hidden" name="name[]">
                          </div>
                          <div class="col-md-5">
                            <input type="hidden" name="value[]">
                          </div>
                          <div class="col-md-2"><button type="button" style="display:none;">Remove</button></div>
                        </div>

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
  <div class="control-sidebar-bg"></div>
<?php include("includes/scripts.php");?>
</body>
</html>
<script type="text/javascript">
$(document).on("change" , "#Feed_name" , function() {
  console.log('aa');
var fed_nme=$('#Feed_name').val();
$('#feedName').val(fed_nme);
$('#feed_modal1').modal('show');
});


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
  document.getElementById("remaning").value='';
  document.getElementById("balance").value='';
  document.getElementById("txtamount").value='';

  document.getElementById("remaning").placeholder='';
  document.getElementById("balance").placeholder='';
  $.ajax({ 
    type : 'POST',
    url : 'ajax/purchase_ajax.php',
    dataType: 'JSON',
    data : {'vndr':vendor_id},
    success: function(response)
    {
      var lnth = response.length;
      for(var i=0; i<lnth; i++){
          window.blns1 = response[i].blns;
          window.rmng1 = response[i].rmng;
          document.getElementById("remaning").placeholder="Remaning="+rmng1;
          document.getElementById("balance").placeholder="Balance="+blns1;
      }
     
    }
    });

});

  $(document).on("click" , "#add_feed" , function() 
  {
    var qnty = $("#txtqnty").val();
    if(qnty>0)
    {
       var formData = new FormData($("#feed_form")[0]);
    $.ajax({ 
    type : 'POST',
    url : 'ajax/purchase_ajax.php',
    contentType: false,
    processData: false,
    data: formData,
    success: function(response)
    {
      if(response=="Feed Successfully Added")
      {
        toastr.success(response, 'Success');
        $('#feed_modal1').modal('hide');
        window.location.href='<?php echo $URL_FILE_NAME;?>';

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
      $('#eror1').modal('show');
      $("#txtqnty").val('');
    }
   
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