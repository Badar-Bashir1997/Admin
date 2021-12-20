
 <!-- Egg Sales -->
                <div class="modal inmodal" id="egg_sale" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" >
                <div class="modal-content animated flipInY">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h5 class="modal-title">Egg Sales</h5>
                    </div>
                    <form method="post" id="egg_sale_form" class="was-validated">
                        <div class="modal-body">
                          <div class="row">
                            <div class="form-group col-md-12">
                                 <label>
                                    <button type="button" id="per_crate" class="btn btn-success" style="margin-left :5px;">Per Crate</button>
                                    <button type="button"  id="per_tray"class="btn btn-primary" style="margin-left :5px;">Per Tray</button>
                                    <button type="button" id="per_egg" class="btn btn-warning" style="margin-left :5px;">Per Egg</button>
                                </label><br>
                                <input type="hidden" name="egg_sale_type" id="egg_sale_type" value="per_crate">

                              <label >Quantity: <span style="color:red; display: none;"  id="egg_sale_error">Pleas Enter The Valid Number Of Eggs</span></label>
                              <input type="Number" name="NumberOfEggs_sale" id="NumberOfEggs_sale"  required class="form-control" onkeyup="totalp1(this.value);" disabled>
                              <label >Date</label>
                              <input type="Date" name="Egg_sale_date" id="Egg_sale_date"  required class="form-control">
                              <label>Price per unit</label>
                                <input type="Number" name="egg_price" parsley-trigger="change" required 
                                placeholder="Enter Price per Unit" class="form-control" id="egg_price" onchange="totalp(this.value);"><br>
                              <input type="hidden" name="flock_id" id="flock_id" value="<?php echo $id; ?>">
                              <input type="hidden" name="farm_id" id="farm_id" value="<?php echo $row11['farm_id']; ?>">

                              <?PHP include("broker_blns_rmng.php");?>

                            </div>
                          </div>  
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            <button type="button" class="ladda-button btn btn-primary" id="Add_egg_sales" data-style="expand-right">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Egg Sales -->
                <!-- manure Sales-->
               <div class="modal inmodal" id="manure_sale" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" >
                <div class="modal-content animated flipInY">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h5 class="modal-title">Manure Sale</h5>
                    </div>
                    <form method="post" id="manure_sales_form" class="was-validated">
                        <div class="modal-body">
                            <div class="row">
                            <div class="form-group col-md-12">
                              <label >Quantity Of Manure: <span style="color:red; display: none;"  id="manure_sale_error">Pleas Enter The Valid Quantity</span></label>
                              <input type="Number" name="manure_qnty_sale" id="manure_qnty_sale" placeholder="Maximum Quantity of Manure=<?php echo $row11['manure_rem'];?>"  required class="form-control">
                              <label >Date</label>
                              <input type="Date" name="manure_sale_date" id="manure_date"  required class="form-control">
                               <label>Price per kg</label>
                                <input type="Number" name="manure_price" parsley-trigger="change" required 
                                placeholder="Enter Price per kg" class="form-control" id="price"><br>

                                
                                  <div class="box" >
                                <div class="box-header">
                                  <h3 class="box-title">Payments Method</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                <div class="form-group">
                                   <input type="radio" id="cash" name="Status" value="Cash" checked >
                                    <label for="cash" >Cash</label><br>
                                    <input type="radio" id="Cradit" name="Status" value="Cradit">
                                    <label for="Cradit">Credit</label><br> 
                                    <input type="radio" id="Bank" name="Status" value="Bank">
                                    <label for="Bank">Bank</label><br>  
                                  </div>
                                </div>
                                </div>

                              <input type="hidden" name="flock_id" id="flock_id" value="<?php echo $id; ?>">
                              <input type="hidden" name="farm_id" id="farm_id" value="<?php echo $row11['farm_id']; ?>">

                            </div>
                          </div>  
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            <button type="button" class="ladda-button btn btn-primary" id="Sale_manure" data-style="expand-right">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
                <!-- manure Sales-->
              

               <!-- Bird Sales-->
               <div class="modal inmodal" id="bird_sale" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" >
                <div class="modal-content animated flipInY">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h5 class="modal-title">Bird Sales</h5>
                    </div>
                    <form method="post" id="bird_sale_form" class="was-validated">
                        <div class="modal-body">
                            <div class="row">
                            <div class="form-group col-md-12">
                                <label>
                                    <button type="button" id="per_kg" class="btn btn-success" style="margin-left :5px;">Per Kg</button>
                                    <button type="button"  id="per_bird"class="btn btn-primary" style="margin-left :5px;">Per Bird</button>
                                </label><br>
                                <input type="hidden" name="bird_sale_type" id="bird_sale_type" value="per_kg">
                              <label >Quantity: <span style="color:red; display: none;" id="bird_sale_error">Pleas Enter The Valid Quantity</span></label>
                              <input type="Number" name="bird_qnty" id="bird_qnty" placeholder="Enter Quantity in kg"  required class="form-control" onkeyup="totalp4(this.value);">
                              <label>Price per unit</label>
                                <input type="Number" name="bird_price" parsley-trigger="change" required 
                                placeholder="Enter Price per Unit" class="form-control" id="bird_price" onkeyup="totalp3(this.value);"><br>
                              <label >Date</label>
                              <input type="Date" name="bird_date" id="bird_date"  required class="form-control">

                              <input type="hidden" name="flock_id" id="flock_id" value="<?php echo $id; ?>">
                              <input type="hidden" name="farm_id" id="farm_id" value="<?php echo $row11['farm_id']; ?>">

                              <?PHP include("broker_blns_rmng.php");?>
                            </div>
                          </div>  
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            <button type="button" class="ladda-button btn btn-primary" id="Add_Bird_sale" data-style="expand-right">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
                <!-- manure Sales-->
