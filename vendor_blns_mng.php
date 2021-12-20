              <div class="row col-md-12">
                      <div class="form-group col-md-2">
                        <label>Payments Method:</label>
                      </div>
                      <div class="form-group col-md-10">
              <input type="radio" id="cash" name="Status" value="Cash" checked >
                <label for="cash" >Cash</label><br>
                <input type="radio" id="Cradit" name="Status" value="Cradit">
                <label for="Cradit">Credit</label><br> 
                <input type="radio" id="Bank" name="Status" value="Bank">
                <label for="Bank">Bank</label><br>  
                      </div>
                  </div>
             <div class="row col-md-12">
                      <div class="form-group col-md-3">
                        <label>Select Vendor:</label>
                      </div>
                      
                      <div class="form-group col-md-6">
                          <select class="form-control select2" style="width: 100%;" id="vendor" name="vendor" required  >

                    <option value="0">Select Vendor</option>
                    <?php
                     $query   = "SELECT * FROM vendors";
                      $result  = mysqli_query($conn,$query);
                     while($row = mysqli_fetch_array($result)){ ?>
                        <option value="<?php echo $row['v_id'];?>"> <?php echo  $row['name'];?></option>
                    <?php } ?>           
                </select>
                      </div>
                      <div class="form-group col-md-3">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_vendor">+Add Vendor</button>
                      </div>
                  </div>
                  <div class="row col-md-12">
                      <div class="form-group col-md-3">
                        <label>Amount:<span id="t_amount"></span></label>
                      </div>
                      <div class="form-group col-md-9">
             <input type="Number" name="txtamount" parsley-trigger="change"  id="txtamount" 
                 class="form-control" onchange="remain(this.value)">
                      </div>
                  </div>
                  <div class="row col-md-12">
                      <div class="form-group col-md-3">
                        <label>Balance:</label>
                      </div>
                      <div class="form-group col-md-9">
               <input type="Number" name="txtbalance" parsley-trigger="change" id="balance" 
                 class="form-control" readonly>
                      </div>
                  </div>
                  <div class="row col-md-12">
                      <div class="form-group col-md-3">
                        <label>Remaining:</label>
                      </div>
                      <div class="form-group col-md-9">
               <input type="Number" name="txtremaning" parsley-trigger="change" id="remaning" 
                 class="form-control" readonly >
                      </div>
                  </div>

       
