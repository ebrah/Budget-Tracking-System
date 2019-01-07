 <div class="tab-content">
              <div class="tab-pane" id="tab_2"> 

              <form action ="" method ="POST">           
			  
			  <div class="col-md-4">
                <!-- text input -->
				 <div class="form-group">
                  <label>Project Name:</label>
                 <select  class="form-control select2"   name = "position" style="width: 100%;">
					                  <option value ="Quantity Surveyor">Quantity Surveyor</option>
					                  <option value ="Telecom Engineer">Telecom Engineer</option>
					                  <option value = "Civil Engineer">Civil Engineer</option>
					                  <option value = "Electrical Engineer">Electrical Engineer</option>
					                  <option value = "Head of Operation">Head of Operation</option>
					                  <option value = "Finance Director">Finance Director</option>
					                  <option value = "Accountant">Accountant</option>
					                  <option value = "System Admin">System Admin</option>           
				                </select>
				            </div>

				
                 <div class="form-group">
                  <label>Description:</label>
                  <input type="text" class="form-control" name = "description" placeholder="Description ">
                </div>
                <div class="form-group">
                  <label>item Category:</label>
                  <input type="text" class="form-control" name ="item_category" placeholder="item Category">
                </div>
                </div>

				 <div class="col-md-4">
				  <div class="form-group">
                <label>target Site:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-site"></i>
                  </div>
                  <input type="date" class="form-control" name = "target_site"  placeholder="target Site" ="">
                </div>
                <!-- /.input group -->
              </div>
			  <div class="form-group">
                  <label>unit:</label>
                  <input type="number" class="form-control" name = "unit" placeholder="unit">
                </div>
				
			   <div class="form-group">
                <label> Quantity:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-list"></i>
                  </div>
                  <input type="text" class="form-control" name = "quantity"
                </div>
               
              </div>
				 </div>
				</div>
				  <!-- /.input group -->
				 <div class="col-md-4">
				
				<div class="form-group">
                <label>Amount:</label>

                <div class="input-group ">
                  <input type="number"  class="form-control" name = "amount"  placeholder="" ="Amount">
                </div>
                <!-- /.input group -->
              </div>
			</div>

				 <div class="box-footer">
				 <div class="col-md-4">
				 </div>
							 <div class="col-md-6">
							 <label></label>
			                <button name = "submit" type="submit" class="btn btn-block btn-success">  <span class="glyphicon glyphicon-floppy-saved"></span> Save</button>
			              
			              </div>
			              </div>
              
          </form>
          </div>
         			 <!-- /.tab-pane #tab_2 -->
      </div>
      		<!-- ../end tab-content -->
