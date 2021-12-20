<div id="aa">
        <div class="col-md-6" >
              <div class="form-group">
                <label>Select Brokers</label>
                <select class="form-control select2" style="width: 100%;" name="name" id="name" data-placeholder="Select Brokers" onchange="blns_rmng(this.value);p_r_b();" >
                  <option></option>
                   <?php 
      
                   $query = " SELECT * FROM broker ";
                    $result = mysqli_query($conn,$query);
                     while($row = mysqli_fetch_array($result)){
                     $f_id= $row['name'];
                     ?>
                  <option><?php echo $f_id ?></option>
                  <?php   }
                   ?> 
                </select>
                <script>
                    function blns_rmng(str) {
                      $.ajax({
                     url: "blns_rmng.php?q="+str,
                      type: 'get',
                      dataType: 'JSON',
                      success: function(response){
                          var len = response.length;
                          for(var i=0; i<len; i++){
                              window.blns1 = response[i].blns;
                              window.rmng1 = response[i].rmng;
                              document.getElementById("remaning").placeholder="Remaning="+rmng1;
                              document.getElementById("balance").placeholder="Balance="+blns1;
                          }

                      }
                  });
                    }
                    function p_r_b()
                    {
                      document.getElementById("remaning").value='';
                    document.getElementById("balance").value='';
                    document.getElementById("txtamount").value='';
                    }
                     
                      </script>
              </div>
            </div>
            <div class="col-md-6" >
              <div class="form-group">
                <label>Amount</label>
                <input type="Number" name="txtamount" parsley-trigger="change"  id="txtamount" 
                 class="form-control" onchange="remain(this.value)">
                 <script type="text/javascript">
                   function remain(tl)
                   {
                    var v1  = window.ttl;
                    var ttl1 = parseInt(tl);
                    var r = parseInt(window.rmng1);
                   var b = parseInt(window.blns1);
                   var b_a=b+ttl1;
                   var r_a;

                  if(v1>ttl1)
                  { console.log('aaa');
                    if(b_a>v1)
                    { console.log('aaa1');
                      var t_v1= ttl1-v1;
                    var t_v2=b+t_v1-r;
                    document.getElementById("remaning").value=0;
                    document.getElementById("balance").value=t_v2;
                    }
                    else
                    { console.log('aaa2');
                      var t_v1= v1-ttl1;
                    var t_v2=r+t_v1-b;
                    document.getElementById("remaning").value=t_v2;
                    document.getElementById("balance").value=0;
                    }
                  
                  } else 
                  {  console.log('bbb');

                    if(b_a>v1)
                    {console.log('bbb1');
                    var t_v1=ttl1-v1;
                    var t_v2=b+t_v1-r;
                    document.getElementById("remaning").value=0;
                    document.getElementById("balance").value=t_v2;
                    }
                    
                  
                  //   var t_v1= ttl1-v1;
                  //   var t_v2=t_v1+b-r;
                  // document.getElementById("remaning").value=0;
                  // document.getElementById("balance").value=t_v2;  
                  
                }
                  
                   }
                 </script>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6" >
              <div class="form-group">
                <label>Remaining</label>
                <input type="Number" name="txtremaning" parsley-trigger="change" id="remaning" 
                 class="form-control" readonly >
              </div>
              
              <!-- /.form-group -->
            </div>
            <div class="col-md-6" >
              <div class="form-group">
                <label>Balance</label>
                <input type="Number" name="txtbalance" parsley-trigger="change" id="balance" 
                 class="form-control" readonly>
              </div>
              
            </div>
            </div>
            <div id="bb">
              <div class="col-md-6" >
              <div class="form-group">
                <label>Select Broker</label>
                <select class="form-control select2" style="width: 100%;" name="txtchname" id="txtchname" data-placeholder="Select Brokers"  onchange="blns_rmng1(this.value)">
                  <option></option>
                   <?php 
      
                   $query = " SELECT * FROM broker ";
                    $result = mysqli_query($conn,$query);
                     while($row = mysqli_fetch_array($result)){
                     $f_id= $row['name'];
                     ?>
                  <option><?php echo $f_id ?></option>
                  <?php   }
                   ?> 
                </select>
                <script>
                    function blns_rmng1(str) {
                      $.ajax({
                     url: "blns_rmng.php?q="+str,
                      type: 'get',
                      dataType: 'JSON',
                      success: function(response){
                          var len = response.length;
                          for(var i=0; i<len; i++){
                              var blns2 = response[i].blns;
                              var rmng2 = response[i].rmng;
                              document.getElementById("remaning1").placeholder="Remaning="+rmng2;
                              document.getElementById("balance1").placeholder="Balance="+blns2;
                          }

                      }
                  });
                    }
                     
                      </script>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6" >
              <div class="form-group">
                <label>Card Number</label>
                <input type="Number" name="txtcnum" parsley-trigger="change"
                placeholder="" class="form-control" id="txtcnum">
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6" >
              <div class="form-group">
                <label>Amount</label>
                <input type="Number" name="txtcamount" parsley-trigger="change" id="txtcamount" 
                 class="form-control" onchange="remain2(this.value)">
                 <script type="text/javascript">
                   function remain2(tl)
                   {
                    var v1  = window.ttl;
                    var ttl1 = parseInt(tl);
                   
                  if(v1>ttl1)
                  { var t_v1= v1-ttl1;
                    document.getElementById("remaning1").value=t_v1;
                    document.getElementById("balance1").value=0;
                  } else 
                  {  var t_v1= ttl1-v1;
                  document.getElementById("remaning1").value=0;
                  document.getElementById("balance1").value=t_v1;  
                  }
                  
                   }
                 </script>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6" >
              <div class="form-group">
                <label>Remaining</label>
                <input type="Number" name="txtremaning1" parsley-trigger="change" id="remaning1" 
                 class="form-control" readonly>
              </div>
              
              <!-- /.form-group -->
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Balance</label>
                    <input type="Number" name="txtbalance1" parsley-trigger="change" id="balance1" 
                     class="form-control" readonly>
                  </div>
                 
                </div>
              </div>
            </div>
            </div>

            <div id="cc" class="row">
              <div class="col-md-6" >
              <div class="form-group">
                <label>Select Broker</label>
                <select class="form-control select2" style="width: 100%;" name="txtbahname" id="txtbahname" data-placeholder="Select Brokers"  onchange="blns_rmng2(this.value)">
                  <option></option>
                   <?php 
      
                   $query = " SELECT * FROM broker ";
                    $result = mysqli_query($conn,$query);
                     while($row = mysqli_fetch_array($result)){
                     $f_id= $row['name'];
                     ?>
                  <option><?php echo $f_id ?></option>
                  <?php   }
                   ?> 
                </select>
                <script>
                    function blns_rmng2(str) {
                      $.ajax({
                     url: "blns_rmng.php?q="+str,
                      type: 'get',
                      dataType: 'JSON',
                      success: function(response){
                          var len = response.length;
                          for(var i=0; i<len; i++){
                              var blns3 = response[i].blns;
                              var rmng3 = response[i].rmng;
                              document.getElementById("remaning2").placeholder="Remaning="+rmng3;
                              document.getElementById("balance2").placeholder="Balance="+blns3;
                          }

                      }
                  });
                    }
                     
                      </script>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6" >
              <div class="form-group">
                <label>Bank Name</label>
                <input type="text" name="txtbname" parsley-trigger="change"
                placeholder="Please Enter Bank Name" class="form-control" id="txtbname">
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6" >
              <div class="form-group">
                <label>Bank Account Number</label>
                <input type="Number" name="txtbanum" parsley-trigger="change"
                placeholder="" class="form-control" id="txtbanum">
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6" >
              <div class="form-group">
                <label>Amount</label>
                <input type="Number" name="txtbamount" parsley-trigger="change" id="txtbamount" 
                 class="form-control" onchange="remain3(this.value)">
                 <script type="text/javascript">
                   function remain3(tl)
                   {
                    var v1  = window.ttl;
                    var ttl1 = parseInt(tl);
                   
                  if(v1>ttl1)
                  { var t_v1= v1-ttl1;
                    document.getElementById("remaning2").value=t_v1;
                    document.getElementById("balance2").value=0;
                  } else 
                  {  var t_v1= ttl1-v1;
                  document.getElementById("remaning2").value=0;
                  document.getElementById("balance2").value=t_v1;  
                  }
                  
                   }
                 </script>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6" >
              <div class="form-group">
                <label>Remaining</label>
                <input type="Number" name="txtremaning2" parsley-trigger="change" id="remaning2" 
                 class="form-control" readonly>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6" >
              <div class="form-group">
                <label>Balance</label>
                <input type="Number" name="txtbalance2" parsley-trigger="change" id="balance2"
                 class="form-control" readonly>
              </div>
              
              <!-- /.form-group -->
            </div>
            </div>
            <script type="text/javascript">
              var c1=document.getElementById("cash");
              var c2=document.getElementById("Cradit");
              var c3=document.getElementById("Bank");
                var x = document.getElementById("aa");
                var y = document.getElementById("bb");
                var z = document.getElementById("cc");
                y.style.display = "none";
                z.style.display = "none";
                document.getElementById("name").required=true;
                document.getElementById("txtamount").required=true;
                document.getElementById("remaning").required=true;
                document.getElementById("balance").required=true;

                document.getElementById("txtchname").required=false;
                document.getElementById("txtcnum").required=false;
                document.getElementById("txtcamount").required=false;
                document.getElementById("remaning1").required=false;
                document.getElementById("balance1").required=false;

                document.getElementById("txtbahname").required=false;
                document.getElementById("txtbname").required=false;
                document.getElementById("txtbanum").required=false;
                document.getElementById("txtbamount").required=false;
                document.getElementById("remaning2").required=false;
                document.getElementById("balance2").required=false;
              function change(){
                if (c1.checked=true) {
                  x.style.display = "block";
                  y.style.display = "none";
                  z.style.display = "none";
                  document.getElementById("name").required=true;
                document.getElementById("txtamount").required=true;
                document.getElementById("remaning").required=true;
                document.getElementById("balance").required=true;

                document.getElementById("txtchname").required=false;
                document.getElementById("txtcnum").required=false;
                document.getElementById("txtcamount").required=false;
                document.getElementById("remaning1").required=false;
                document.getElementById("balance1").required=false;

                document.getElementById("txtbahname").required=false;
                document.getElementById("txtbname").required=false;
                document.getElementById("txtbanum").required=false;
                document.getElementById("txtbamount").required=false;
                document.getElementById("remaning2").required=false;
                document.getElementById("balance2").required=false;
                  
                }
              }
              function change2(){
                if(c2.checked=true) {
                  y.style.display = "block";
                   x.style.display = "none";
                   z.style.display = "none";
                  document.getElementById("name").required=false;
                document.getElementById("txtamount").required=false;
                document.getElementById("remaning").required=false;
                document.getElementById("balance").required=false;

                document.getElementById("txtchname").required=true;
                document.getElementById("txtcnum").required=true;
                document.getElementById("txtcamount").required=true;
                document.getElementById("remaning1").required=true;
                document.getElementById("balance1").required=true;

                document.getElementById("txtbahname").required=false;
                document.getElementById("txtbname").required=false;
                document.getElementById("txtbanum").required=false;
                document.getElementById("txtbamount").required=false;
                document.getElementById("remaning2").required=false;
                document.getElementById("balance2").required=false;
                
                  
                }
              }
              function change3(){
                if(c3.checked=true) {
                  z.style.display = "block";
                   x.style.display = "none";
                   y.style.display = "none";
                  document.getElementById("name").required=false;
                document.getElementById("txtamount").required=false;
                document.getElementById("remaning").required=false;
                document.getElementById("balance").required=false;

                document.getElementById("txtchname").required=false;
                document.getElementById("txtcnum").required=false;
                document.getElementById("txtcamount").required=false;
                document.getElementById("remaning1").required=false;
                document.getElementById("balance1").required=false;

                document.getElementById("txtbahname").required=true;
                document.getElementById("txtbname").required=true;
                document.getElementById("txtbanum").required=true;
                document.getElementById("txtbamount").required=true;
                document.getElementById("remaning2").required=true;
                document.getElementById("balance2").required=true;
                  
                }
              }              
            </script>
