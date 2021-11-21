                <form runat="server">
                <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Farm</h4>
                    </div>
                    <div class="modal-body">
                     <section class="content">
                      <div class="box box-default">
                        <div class="box-body">
                         
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="FarmName" parsley-trigger="change" 
                                placeholder="Farm Name" class="form-control" id="FarmName" onkeyup="myChangeFunction4(this)">
                              </div>
                              <!-- /.form-group -->
                              <div class="form-group">
                                <label>Location</label>
                                <input type="text" name="Location" parsley-trigger="change" 
                                placeholder="Farm Location" class="form-control" id="Location" onchange="myChangeFunction5(this)">
                              </div>
                              <div class="form-group">
                                <label>Phone No</label>
                                <input type="text" name="txtphone" parsley-trigger="change" 
                                placeholder="Phone Number" class="form-control" id="txtphone" pattern="[+]{1}[9]{1}[2]{1}[0-9]{10}" value="+92">
                              </div>
                              <div class="form-group">
                                <label>Bird Capacity</label>
                                <input type="Number" name="capacity" parsley-trigger="change" 
                                placeholder="Enter Maximum Bird Capacity" class="form-control" id="capacity" >
                              </div>
                              <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Farm Id</label>
                                <input type="text" name="Farmid" parsley-trigger="change" 
                                placeholder="Farm id" class="form-control" id="Farmid" readonly="" >
                              </div>
                              <script type="text/javascript">
                                var v;
                                function myChangeFunction4(input1) {
                                var v2 = document.getElementById('FarmLocation').value;
                               document.getElementById('Farm_id').value ='';
                               var input2=document.getElementById('Farm_id');
                                input2.value =input1.value+"("+v2+")";
                                       }
                                       function myChangeFunction5(input1) {
                                        var v = document.getElementById('FarmName').value;
                                      document.getElementById('Farm_id').value ='';
                                      var input2=document.getElementById('Farm_id');
                                      input2.value =v+"("+ input1.value+")";
                                       }
                                </script>
                               <div class="form-group">
                                <label>Breed Type</label>
                                <select class="form-control select2" style="width: 100%;" name="breedtype" id="breedtype">
                                  <option >Broiler</option>
                                  <option >Layer</option>
                                  <option>Both</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="txt_email" parsley-trigger="change" 
                                placeholder="Contact Email" class="form-control" id="txt_email">
                              </div>
                            </div>
                          </div>
                          <input id="ADD" type="button"  value="Add" onclick="clk()">
                        </div>
                      </div>
                      <script> 
                         function clk() {
                            var fname = document.getElementById('#FarmName').value;
                             var Location = $('#Location').val();
                             var txtphone = $('#txtphone').val();
                             var capacity = $('#capacity').val();
                             var Farmid = $('#Farmid').val();
                             var breedtype = $('#breedtype').val();
                             var txt_email = $('#txt_email').val();

                             $.ajax({
                              type: 'post',
                              url: 'farm_popup_ajax.php',
                              // data: {fname: fname,Location: Location: txtphone: txtphone,capacity: capacity,Farmid: Farmid,breedtype: breedtype,txt_email: txt_email},
                              success: function(response){
                               optionText=optionValue=response;
                               $("#myModal").hide();
                               $('#Farm').append(`<option  value="${optionValue}" selected>
                                 ${optionText}
                                </option>`);
                              }
                             });
                            }
                          
                        </script> 
                           </section>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  
                </div>
                </div>
                </form>