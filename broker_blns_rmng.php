              <div class="row col-md-12">
                      <div class="form-group col-md-2">
                        <label>Payments Method:</label>
                      </div>
                      <div class="form-group col-md-10">
              <input type="radio" id="cash" name="Status" value="Cash"checked >
                <label for="cash" >Cash</label><br>
                <input type="radio" id="Cradit" name="Status" value="Cradit">
                <label for="Cradit">Credit</label><br> 
                <input type="radio" id="Bank" name="Status" value="Bank">
                <label for="Bank">Bank</label><br>  
                      </div>
                  </div>
                  <div class="row col-md-12">
                      <div class="form-group col-md-3">
                        <label>Select Driver:</label>
                      </div>
                      <div class="form-group col-md-9">
                          <select class="form-control select2" style="width: 100%;"id="driver" name="driver" required  >

                    <option value="0">Select Driver</option>
                    <?php
                     $query   = "SELECT * FROM driver";
                      $result  = mysqli_query($conn,$query);
                     while($row = mysqli_fetch_array($result)){ ?>
                        <option value="<?php echo $row['id'];?>"> <?php echo  $row['name'];?></option>
                    <?php } ?>           
                </select>
                      </div>
                  </div>
             <div class="row col-md-12">
                      <div class="form-group col-md-3">
                        <label>Select Broker:</label>
                      </div>
                      <div class="form-group col-md-9">
                          <select class="form-control select2 broker" style="width: 100%;" name="broker" required  >

                    <option value="0">Select Broker</option>
                    <?php
                     $query   = "SELECT * FROM broker";
                      $result  = mysqli_query($conn,$query);
                     while($row = mysqli_fetch_array($result)){ ?>
                        <option value="<?php echo $row['b_id'];?>"> <?php echo  $row['name'];?></option>
                    <?php } ?>           
                </select>
                      </div>
                  </div>
                  <div class="row col-md-12">
                      <div class="form-group col-md-3">
                        <label>Amount:<span class="t_amount"></span></label>
                      </div>
                      <div class="form-group col-md-9">
             <input type="Number" name="txtamount" parsley-trigger="change"   
                 class="form-control txtamount" onchange="remain(this.value)">
                      </div>
                  </div>
                  <div class="row col-md-12">
                      <div class="form-group col-md-3">
                        <label>Balance:</label>
                      </div>
                      <div class="form-group col-md-9">
               <input type="Number" name="txtbalance" parsley-trigger="change"  
                 class="form-control balance" readonly>
                      </div>
                  </div>
                  <div class="row col-md-12">
                      <div class="form-group col-md-3">
                        <label>Remaining:</label>
                      </div>
                      <div class="form-group col-md-9">
               <input type="Number" name="txtremaning" parsley-trigger="change"  
                 class="form-control remaning" readonly >
                      </div>
                  </div>

       


        