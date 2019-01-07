
<!-- navgiation bar required NAVIGATION BAR -->
		
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!--registration form-->
				<div class="col-md-4">
					<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Add New User</h3>
									<p><?php echo validation_errors(); ?></p>
									<?php if($this->session->flashdata('success')){
										  echo '<p class="text-success">'. $this->session->flashdata('success') .'</p>';
										}else{
											echo '<p class="text-danger">'. $this->session->flashdata('fail') .'</p>';
										}?>
									
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body">
									
						<?php echo form_open(base_url()."public/index.php/Register/register_user"); ?>

					 <div class="box box-warning">
				           
							<!-- <p><?php echo validation_errors(); ?></p> -->
							<div class="box-body">
							 <div class="col-md-6">
				                <!-- text input -->
				                 <!-- <div class="form-group">
				                  <label>Employee ID</label>
				                  <input type="text" class="form-control" name = "employee_id" placeholder="enter Employee ID">
				                </div> -->
								<div class="form-group">
				                  <label>First Name</label>
				                  <input type="text" class="form-control" name = "firstname" placeholder="First Name">
				                </div>

								<div class="form-group">
								 <label>Username</label></div>
								 <div class="input-group">
				                <span class="input-group-addon"></span>
				                <input type="text" class="form-control" name ="username" placeholder="enter email address">
				              </div>
								

								<div class="form-group">
				                <label>Password</label></div>
								 <div class="input-group">
				                  <div class="input-group-addon">
				                    <i class="fa fa-lock"></i>
				                  </div>
				                  <input type="password"  class="form-control pull-right" name = "password"  id="pass">
				                </div>

								 <div class="form-group">
				                <label>Verify Password</label>
				                <div class="input-group date">
				                  <div class="input-group-addon">
				                    <i class="fa fa-lock"></i>
				                  </div>
				                  <input type="password"  class="form-control pull-right" name = "verify_password"  id="vpass">
				                </div>
	
											        <!-- /.input group -->
				              </div>
				                </div>

								 <div class="col-md-6">
								 <!-- <div class="form-group">
				                  <label for="exampleInputFile">Upload Image</label>
				                  <input  class = "form-control" class="file-loading" name = 'userfile' type="file" id="userfile">

				                </div> -->
								<div class="form-group">
				                  <label>Lastname</label>
				                  <input type="text" class="form-control" name ="lastname" placeholder="lastname">
				                </div>
								<div class="form-group">
				                <label>Qualification</label>
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
				                <label>Gender</label>
				                <select  class="form-control select2" name = "gender" style="width: 100%;">
				                  <option value = "Male">Male</option>
				                  <option value = "Female">Female</option>
				                </select>
				              </div>

								
	
								 <div class="form-group">
				                <label>Phone </label>
				                <div class="input-group">
				                  <div class="input-group-addon">
				                    <i class="fa fa-phone"></i>
				                  </div>
				                  <input type="number" class="form-control" name = "phone_number" min="12" required>
				                </div>
				                <!-- /.input group -->
				              </div>
								 </div>
								
								
							
							
					 </div>
					 <div class="box-footer">
				                <button name = "submit" type="submit" class="btn btn-block btn-success">Register</button>
				    </div>
					 
					 
					 </div>
					  </form>
					  </div>
	  				</div>
	  			</div>
					<!--/registration form-->

								<!-- VIEW USERS -->
				  <div class="col-md-8">
				  	<div class="panel">
				 <div class="box box-success">
			           <div class="panel-heading">
									<h3 class="panel-title">List of Registered Users</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body">
						<form action="" method="GET">
						<table id="example1" class="table table-bordered table-striped">
						
					
						
			                <thead>
			                <tr>
			                  <!-- <th>Employee ID</th> -->
			                  <th>First Name</th>
			                  <th>Last Name</th>
			                  <th>Qualification</th>
			                  <th>Status</th>
			                  <th>Actions</th> 
			                </tr>
			                </thead>
			                <tbody>

										 <?php if($users->num_rows() > 0 ){
											    foreach($users->result() as $user){
											?>

												<!-- <tr><td align='center' style='color:#3c8dbc'> </td> -->
														<td>
															<a href='admin_system_users_more_upload pic.php?officer_no=$officer_no'>
					
																		<div class='widget-user-image'>
													              <?php echo $user->firstname; ?>
																		</div> <!-- /widget-user-image --> 
																</a>
															</td>	
													<td> 		
															<div class='widget-user-image'>
																  <?php echo $user->lastname; ?>
															</div>
												</td>
												<td> <?php echo $user->qualification; ?> </td>
												<?php  if($user->active == 1 ){?>
														   <td><span class='label label-success'>Active</span>	</td>
													     <td><a href='<?php echo base_url()?>public/index.php/register/deActivateUser/<?php echo $user->user_id; ?>' class='label label-danger'>Deactivate</a>  </td>
												<?php }else{ ?>
												   	<td> <span class='label label-danger'>Blocked</span>	</td>
												   	 <td> <a href='<?php echo base_url()?>public/index.php/register/activateUser/<?php echo $user->user_id; ?>' class='label label-success'>Activate</a>	</td>
												<?php } ?>
												
						
												<!-- <td> 
													<a href='#!'>
													<button class='btn btn-block btn-default btn-sm ' type='button' disabled > More </button></a>
												</td> -->
											</tr>

										 <?php
													}
										 }?>


						
			         <div class="modal fade" id="modal-default">
			          <div class="modal-dialog">
			            <div class="modal-content">
			              <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                  <span aria-hidden="true">&times;</span></button>
			                <h4 class="modal-title">Default Modal</h4>
			              </div>
			              <div class="modal-body">
			                <p>   
												<form action="" method="GET">
												
													<b style="color:red;font-size:12pt">Sorry, no staff information that match details entered</b>
													<b style="color:red;font-size:12pt">Sorry, make sure that staff_id is not empty(filled)</b>
												
												</form>

                    	</p>
			              </div>
			              <div class="modal-footer">
			                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
			                <button type="button" class="btn btn-warning">Save changes</button>
			              </div>
			            </div>
			            <!-- /.modal-content -->
			          </div>
			          <!-- /.modal-dialog -->
			        </div>   
			               
			            
			                </tbody>
			                <tfoot>
			                
			                </tfoot>
			              </table>
						</form >
							</div>
						</div>
					</div>
				</div>
							<!-- ../END VIEW USERS -->
	
				</div>
				<!-- /END CONTAINER FLUID -->
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		
