<div id="aa">
        <div class="col-md-6" >
              <div class="form-group">
                <label>Select Brokers</label>
                <select class="form-control select2" style="width: 100%;" name="name" id="name" data-placeholder="Select Brokers" >
                  <option></option>
                   <?php 
      
                   $query = " SELECT * FROM  brokers ";
                    $result = mysqli_query($conn,$query);
                     while($row = mysqli_fetch_array($result)){
                     $f_id= $row['name'];
                     ?>
                  <option><?php echo $f_id ?></option>
                  <?php   }
                   ?> 
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6" >
              <div class="form-group">
                <label>Amount</label>
                <input type="Number" name="txtamount" parsley-trigger="change"  id="txtamount" 
                 class="form-control">
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6" >
              <div class="form-group">
                <label>Remaning</label>
                <input type="Number" name="txtremaning" parsley-trigger="change" id="remaning" 
                placeholder="Enter Remaning Amount" class="form-control" onchange="remaning(this.value);">
              </div>
              <script type="text/javascript">
                function remaning(str){
                  var b = parseInt(str);
                  if(b>0){
                    document.getElementById("balance").value=0;
                  }
                }
              </script>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6" >
              <div class="form-group">
                <label>Balance</label>
                <input type="Number" name="txtbalance" parsley-trigger="change" id="balance" onchange="balance(this.value);"
                placeholder="Enter Balance" class="form-control">
              </div>
              <script type="text/javascript">
                function balance(str){
                  var b = parseInt(str);
                  if(b>0){
                    document.getElementById("remaning").value=0;
                  }
                }
              </script>
            </div>
            </div>
            <div id="bb">
              <div class="col-md-6" >
              <div class="form-group">
                <label>Select Brokers</label>
                <select class="form-control select2" style="width: 100%;" name="txtchname" id="txtchname" data-placeholder="Select Brokers" >
                  <option></option>
                   <?php 
      
                   $query = " SELECT * FROM brokers ";
                    $result = mysqli_query($conn,$query);
                     while($row = mysqli_fetch_array($result)){
                     $f_id= $row['name'];
                     ?>
                  <option><?php echo $f_id ?></option>
                  <?php   }
                   ?> 
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6" >
              <div class="form-group">
                <label>Card Number</label>
                <input type="Number" name="txtcnum" parsley-trigger="change"
                placeholder="" class="form-control">
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6" >
              <div class="form-group">
                <label>Amount</label>
                <input type="Number" name="txtcamount" parsley-trigger="change" id="txtcamount" 
                 class="form-control">
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6" >
              <div class="form-group">
                <label>Remaning</label>
                <input type="Number" name="txtremaning1" parsley-trigger="change" id="remaning1" 
                placeholder="Enter Remaning Amount" class="form-control" onchange="remaning1(this.value);">
              </div>
              <script type="text/javascript">
                function remaning1(str){
                  var b = parseInt(str);
                  if(b>0){
                    document.getElementById("balance1").value=0;
                  }
                }
              </script>
              <!-- /.form-group -->
            </div>
            <div class="col-md-12">
            <div class="col-md-6" >
              <div class="form-group">
                <label>Balance</label>
                <input type="Number" name="txtbalance1" parsley-trigger="change" id="balance1" onchange="balance1(this.value);"
                placeholder="Enter Balance" class="form-control">
              </div>
              <script type="text/javascript">
                function balance1(str){
                  var b = parseInt(str);
                  if(b>0){
                    document.getElementById("remaning1").value=0;
                  }
                }
              </script>
              <!-- /.form-group -->
            </div>
            </div>
            </div>

            <div id="cc">
              <div class="col-md-6" >
              <div class="form-group">
                <label>Select Brokers</label>
                <select class="form-control select2" style="width: 100%;" name="txtbahname" id="txtbahname" data-placeholder="Select Brokers" >
                  <option></option>
                   <?php 
      
                   $query = " SELECT * FROM brokers ";
                    $result = mysqli_query($conn,$query);
                     while($row = mysqli_fetch_array($result)){
                     $f_id= $row['name'];
                     ?>
                  <option><?php echo $f_id ?></option>
                  <?php   }
                   ?> 
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6" >
              <div class="form-group">
                <label>Bank Name</label>
                <input type="text" name="txtbname" parsley-trigger="change"
                placeholder="Please Enter Bank Name" class="form-control">
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6" >
              <div class="form-group">
                <label>Bank Account Number</label>
                <input type="Number" name="txtbanum" parsley-trigger="change"
                placeholder="" class="form-control">
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6" >
              <div class="form-group">
                <label>Amount</label>
                <input type="Number" name="txtbamount" parsley-trigger="change" id="txtbamount" 
                 class="form-control">
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6" >
              <div class="form-group">
                <label>Remaning</label>
                <input type="Number" name="txtremaning2" parsley-trigger="change" id="remaning2" 
                placeholder="Enter Remaning Amount" class="form-control" onchange="remaning2(this.value);">
              </div>
              <script type="text/javascript">
                function remaning2(str){
                  var b = parseInt(str);
                  if(b>0){
                    document.getElementById("balance").value=0;
                  }
                }
              </script>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6" >
              <div class="form-group">
                <label>Balance</label>
                <input type="Number" name="txtbalance2" parsley-trigger="change" id="balance2" onchange="balance2(this.value);"
                placeholder="Enter Balance" class="form-control">
              </div>
              <script type="text/javascript">
                function balance2(str){
                  var b = parseInt(str);
                  if(b>0){
                    document.getElementById("remaning").value=0;
                  }
                }
              </script>
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
              function change(){
                
                if (c1.checked=true) {
                  x.style.display = "block";
                  y.style.display = "none";
                  z.style.display = "none";
                }
              }
              function change2(){
                if(c2.checked=true) {
                  y.style.display = "block";
                   x.style.display = "none";
                   z.style.display = "none";
                }
              }
              function change3(){
                if(c3.checked=true) {
                  z.style.display = "block";
                   x.style.display = "none";
                   y.style.display = "none";
                }
              }
              
            </script>
