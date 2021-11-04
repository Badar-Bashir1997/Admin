<div id="aa">
        <div class="col-md-6" >
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="txtbname" parsley-trigger="change" 
                placeholder="Enter Name" class="form-control">
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6" >
              <div class="form-group">
                <label>Amount</label>
                <input type="Number" name="txtamount" parsley-trigger="change" 
                placeholder="Enter Amount given " class="form-control">
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
                <input type="Number" name="txtblance" parsley-trigger="change" id="balance" onchange="balance(this.value);"
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
                <label>Card Holder Name</label>
                <input type="text" name="txtchname" parsley-trigger="change"
                placeholder="Please Enter Card Holder Name" class="form-control">
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
                <input type="Number" name="txtamount" parsley-trigger="change" 
                placeholder="Enter Amount given to seller" class="form-control">
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
                <input type="Number" name="txtblance" parsley-trigger="change" id="balance" onchange="balance(this.value);"
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
              <!-- /.form-group -->
            </div>
            </div>

            <div id="cc">
            <div class="col-md-6" >
              <div class="form-group">
                <label>Bank Account Holder Name</label>
                <input type="text" name="txtchname" parsley-trigger="change"
                placeholder="Please Enter Card Holder Name" class="form-control">
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6" >
              <div class="form-group">
                <label>Bank Name</label>
                <input type="text" name="txtchname" parsley-trigger="change"
                placeholder="Please Enter Card Holder Name" class="form-control">
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6" >
              <div class="form-group">
                <label>Bank Account Number</label>
                <input type="Number" name="txtcnum" parsley-trigger="change"
                placeholder="" class="form-control">
              </div>
              <!-- /.form-group -->
            </div>
            <div class="col-md-6" >
              <div class="form-group">
                <label>Amount</label>
                <input type="Number" name="txtamount" parsley-trigger="change" 
                placeholder="Enter Amount given to seller" class="form-control">
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
                <input type="Number" name="txtblance" parsley-trigger="change" id="balance" onchange="balance(this.value);"
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
