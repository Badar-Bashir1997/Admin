<form runat="server" id="Add_frm">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Farm</h4>
        </div>
        <div class="row modal-body">
          <div class="row col-md-12">
            <div class="form-group col-md-2">
              <label>Name:</label>
            </div>
            <div class="form-group col-md-10">
               <input type="text" name="Farm_Name" parsley-trigger="change" placeholder="Farm Name" class="form-control" id="FarmName" required>
            </div>
          </div>
          <div class="row col-md-12">
              <div class="form-group col-md-2">
                <label>Location:</label>
              </div>
              <div class="form-group col-md-10">
                 <input type="text" name="Farm_Location" parsley-trigger="change" placeholder="Farm Location" class="form-control" id="FarmLocation" required>
              </div>
          </div>
          <div class="row col-md-12">
              <div class="form-group col-md-2">
                <label>Phone No:</label>
              </div>
              <div class="form-group col-md-10">
                 <input type="text" name="txt_phone" parsley-trigger="change" placeholder="+923XXXXXXXXX" class="form-control" id="phone" pattern="[+]{1}[9]{1}[2]{1}[0-9]{10}" required>
              </div>
          </div>
          <div class="row col-md-12">
              <div class="form-group col-md-2">
                <label>Bird Capacity:</label>
              </div>
              <div class="form-group col-md-10">
                <input type="Number" name="txt_capacity" parsley-trigger="change" placeholder="Enter Maximum Bird Capacity" class="form-control" id="capacity" required>
              </div>
          </div>
          <div class="row col-md-12">
              <div class="form-group col-md-2">
                <label>Breed Type:</label>
              </div>
              <div class="form-group col-md-10">
                <select class="form-control select2" style="width: 100%;" name="breed_type" id="farm_breed_type">
                  <option>Broiler</option>
                  <option>Layer</option>
                  <option>Both</option>
                </select>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="row col-md-12">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" name="Add_farm" id="Add_farm" class="btn btn-primary"  >Add</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
