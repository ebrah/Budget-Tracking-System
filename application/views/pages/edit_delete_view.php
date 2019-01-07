<!-- MAIN -->
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="col-md-12">
          <!-- Custom Tabs -->
         	 <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">BUDGETS FOR PROJECT TITLE: <?php echo $project_name; ?></h3>
									<div class="right">
									<?php
                
											$way = array();

											$way[ 'Quantity Surveyor' ] = "public/index.php/main/Qsurveyor";
											$way[ 'Telecom Engineer' ] = "public/index.php/main/Pmanager";
											$way[ 'Civil Engineer' ] = "public/index.php/main/Pmanager";
											$way[ 'Electrical Engineer' ] = "public/index.php/main/Pmanager";
											$way[ 'Head of Operation' ] = "public/index.php/main/Hoc";
											$way[ 'Finance Director' ] = "public/index.php/main/Fdirector";
											$way[ 'Accountant' ] = "public/index.php/main/Account";
											$way[ 'System Admin' ] = "public/index.php/main/admin";
										
											$my_sess = $this->session->userdata('qualification');

											?>
											<a href="<?php echo base_url().$way[$my_sess];?>" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></a>
											<a href="<?php echo base_url().$way[$my_sess];?>" ><i class="lnr lnr-cross"></i></a>
								
									</div><!-- /right -->
									
									<?php 
									   if($this->session->flashdata('success')){
											 echo '<p class="text-success">'. $this->session->flashdata('success') .'</p>';
										 }else{
											 echo '<p class="text-danger">'. $this->session->flashdata('fail') .'</p>';
										 } 
										
										 if($this->session->active == 0 && $this->session->qualification == "Accountant"){
											echo '<p class="text-danger"> You \'re blocked accountant!, you can\'t update or finance any budgets now. </p>';
										 }
									?>
								</div>
								<div class="panel-body">
								<?php
								   if($this->session->qualification == 'Accountant'){
										 echo "<p class='panel-title' style='color: #a7a7a5; letter-spacing: 2px;'> Note: accountant / cashier can finance only approved budgets.  </p>";
									 }
								?>
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
			         <li class="active"><a href="#tab_1" data-toggle="tab"><b>Budgets</b></a></li>

							 <?php if($this->session->qualification == "Quantity Surveyor" || $this->session->qualification == "Head of Operation"){?>
							   <li> <a href='<?php echo base_url();?>public/index.php/budget/submit_budget/<?php echo $project_id;?>'/><b> add Budget </b></a> </li>
							 	<?php } ?>
								 
							 <?php if($file != ''){?>
								<li class="pull-right"><a href="<?php echo base_url()?>public/index.php/budget/download_budget_file/<?php echo $project_id;?>"> <button type="button" class="btn btn-default pull-right">Print budget</button></a></li>
							 <?php } ?>
							 <?php
							    if($this->session->qualification != 'Accountant'){?>
                      <li class="pull-right"><a href="#!"> <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal-file" >Upload / Replace budget file </button></a></li>

									<?php } ?>
            </ul>
<!-- ####################################################################################### -->
              <!-- tab-pane #tab_1 -->
    <div class="tab-pane  active" id="tab_1">

			<div class="box-body">
			<form action="" method="GET">
			<table id="example1" class="table table-bordered table-striped">
						
						 <?php if($budgets->num_rows() > 0 ){?>

				        <thead>
									<tr>
									  <th>Date</th> 
										<th>Description</th>
										<th>Specification</th>
										<th>Unit</th>
										<th>Quantity</th>
										<th>Unit Price</th>
										<th>Total price</th>
										<th>Approved</th>
										<?php if($this->session->qualification == "Quantity Surveyor" || $this->session->qualification == "Head of Operation"){?>
										  <th colspan="2">Actions</th>
										<?php } ?>
										<?php if($this->session->qualification == "Finance Director" || $this->session->qualification == "Accountant"){?>
										  <th>Actions</th>
										<?php } ?>
									</tr>
								 </thead>
								<tbody>

                   <?php
											foreach($budgets->result() as $budget){
										?>
													<td>
														<div class='widget-user-image'>
															    <?php echo $budget->date; ?>
														</div> <!-- /widget-user-image --> 
				
													</td>	
											<td> 		
												<?php echo $budget->description; ?>
											</td>
											<td> 		
												  <?php echo $budget->specification; ?>
											</td>

											<td> 		
												  <?php echo $budget->unit; ?>
											</td>
											<td> 		
												  <?php echo $budget->quantity; ?>
											</td>
											<td> 		
												  <?php echo $budget->unit_price; ?>
											</td>
											<td> 		
												  <?php echo $budget->total_price; ?>
											</td>

												<?php
														
														if($budget->approved == -1){
															echo "<td><span class='label label-danger'>REJECTED</span>	</td>";
														}else{
															
															if($budget->approved != ''){
																echo " <td><span class='label label-success'>Approved</span>	</td>" ;
															}else{
																echo "<td> <span class='label label-danger' style='display:inline-block; margin: 4px;'>Not</span> ";

														  if($this->session->qualification == 'Finance Director'){ 
																  echo	"<a href='".base_url()."public/index.php/fdirector/approve_budget/b/".$budget->budget_id."/p/".$project_id."' class='btns btn-warning btn-sm '>approve </a>";
															  }

														  	echo "</td>" ; 
															
														}
													}
												?>
					
											
											 <?php
											    if($this->session->qualification == "Quantity Surveyor" || $this->session->qualification == "Head of Operation"){?>
											      <td> 
														    	<a href='<?php echo base_url();?>public/index.php/budget/view_budget_edit/b/<?php echo $budget->budget_id;?>/p/<?php echo $project_id; ?>'/>
									    		      	<button class='btn btn-block btn-default btn-sm ' type='button' > Edit </button></a>
														</td>
													<?php } ?>

											    <?php if($this->session->qualification == "Quantity Surveyor" || $this->session->qualification == "Head of Operation"){?>
														<td> 
														   <a href="#!"> <button class='btn btn-block btn-default btn-sm' type='button' data-toggle="modal" data-target="#modal-default1"  deleteUrl="<?php echo base_url();?>public/index.php/budget/project_budget_delete/b/<?php echo $budget->budget_id;?>/p/<?php echo $budget->project_id;?>"  > Delete </button></a>
														</td>
													<?php } ?>

													<td>
													<?php

													  if($this->session->qualification == 'Finance Director'){?>

                             <?php if($budget->approved != -1){?>
															<a href="#!"  class="btn btn-danger budget-btn" 
																		rUrl="<?php echo base_url()?>public/index.php/fdirector/reject_budget/b/<?php echo $budget->budget_id;?>/p/<?php echo $project_id; ?>"
																		data-toggle="modal" data-target="#modal-rejection"
																		> reject </a>
														 <?php } ?>
														
														 <?php } ?>
																<?php if($budget->approved == -1){?>
																	<a href="#!" class=" label label-default btn btn-sm budget-reason" 
																				recommendation =" <?php echo $budget->recommendation; ?>"
																				user="The one who reject is: <?php echo $budget->who; ?>"
																				qualification="Qualification for the person is: <?php echo $budget->qualification; ?>"

																				data-toggle="modal" data-target="#modal-reason"
																				> reason  </a>

																<?php } ?>

															<?php
															   if($this->session->qualification == 'Accountant' && $this->session->active == 1){
																	   if($budget->financed != ''){?>
                                      <span class='label label-success'> financed </span> 

																  <?php }elseif( $budget->approved != '' && $budget->approved != -1 ){?>
																	  <a href='<?php echo base_url()?>public/index.php/accountant/finance/b/<?php echo $budget->budget_id; ?>/p/<?php echo $project_id; ?>' class='label label-success btn btn-sm'>finance </a> 	    
																	<?php }
																 
																}?>

													</td>

													<?php
													if($this->session->qualification == 'Accountant' && $budget->financed != '' && $this->session->active == 1){?>
															<td> <a href='<?php echo base_url()?>public/index.php/accountant/revert/b/<?php echo $budget->budget_id; ?>/p/<?php echo $project_id; ?>' class='label label-warning btn btn-sm'>revert </a>  </td>
													<?php }	?>

											
											
										</tr>

									 <?
												}
									 }else{
										echo '<b style="color:red;font-size:12pt">Sorry, no budgets for this project.</b>';
									 }?>


				<div>
				 <div class="modal fade" id="modal-default1">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Delete Budget.</h4>
					  </div>
					  <div class="modal-body">
						<p>   
											<form action="" method="GET">
											
												<b style="color:red;font-size:12pt">Are you sure!, want to delete this budget?</b>
											</form>

					</p>
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal">No cancel</button>
						<a href="" id="deleteUrl" type="button" class="btn btn-danger">Yes delete</a>
					  </div>
					</div>
					<!-- /.modal-content -->
				  </div>
				  <!-- /.modal-dialog -->
				</div>  
				</div>

     <div>
			 <div class="modal fade" id="modal-file">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Upload Budget file or Replace existing one.</h4>
					  </div>
					  <div class="modal-body" style="display: flex; justify-content:center; align-items:center;">
						
							<?php echo form_open_multipart(base_url()."public/index.php/budget/budget_file/".$project_id);?>
								
								<div class="row">
									<div class="form-group">
											<label for="price" class="col-sm-3 control-label">upload budget file.</label>
											<div class="col-sm-7">
												<input type="file" id="budgetFile" class="form-control regform-control" name="budgetFile"/>
											</div>
									</div>	
								</div><!-- /row -->
								
						
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal">cancel</button>
						<button  type="submit" class="btn btn-info">upload</button>
					  </div>
						</form> 
					</div>
					<!-- /.modal-content -->
				  </div>
				  <!-- /.modal-dialog -->
				</div>   
				</div>


    <div>
				<div class="modal fade" id="modal-rejection">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span></button>
					   	<h4 class="modal-title">Provide recommendation for ignoring or cancel this Budget.</h4>
					  </div>
					  <div class="modal-body" id="rejectBox" style="display: flex; justify-content:center; align-items:center;">
						
							<?php echo form_open_multipart("");?>
								
								<div class="row">
									<div class="form-group">
											<label for="recommendation" class="col-sm-3 control-label" style="padding: 5px;">Recommendation: </label>
											<div class="col-sm-7">
											     <textarea name="recommendation" id="recommendation" cols="60" rows="5" class="form-control regform-control" ></textarea>
											</div>
									</div>	
								</div><!-- /row -->
								
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal">cancel</button>
						<button  type="submit" class="btn btn-info">submit</button>
					  </div>
						</form> 
					</div>
					<!-- /.modal-content -->
				  </div>
				  <!-- /.modal-dialog -->
				 </div>  
				</div>

    <div>
				<div class="modal fade" id="modal-reason">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Recommendation.</h4>
					  </div>
					  <div class="modal-body" id="rbox" style="display: flex; justify-content:center; align-items:center;">
						
		          <div>
							   <h3 id="rtext"></h3>
								 <div>
								    <h4 id="usr"> </h4>
										<h4 id="qualification"> </h4>
								 </div>
							</div>
								
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal">cancel</button>
						<button  type="button" class="btn btn-info" data-dismiss="modal" >cancel</button>
					  </div>
					</div>
					<!-- /.modal-content -->
				  </div>
				  <!-- /.modal-dialog -->
				</div>  
				</div>
				</div>
					
				</tbody>
				<tfoot>
						
		</tfoot>
	 </table>


	 </div> <!-- box-body -->



              <!-- /.tab-pane #tab_1-->
            </div>
						<div class="tab-pane  active" id="tab_2">

						<div><!-- /tab-pane -->

            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- end class panel-body -->
    </div>
    <!-- ../end class-panel -->
</div>
					<!--end class md-12  -->
				</div>
				<!-- /END CONTAINER FLUID -->
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
