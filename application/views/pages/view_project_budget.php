		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">


								<!-- VIEW USERS -->
				  <div class="col-md-12">
					<div class="panel">
				 <div class="box box-success">
			           <div class="panel-heading">
									<h3 class="panel-title"> 
									 
									   Project Budget
									 </h3> <br/>
									<h3 class="panel-title"> 
									   <?php  echo ' Project Title : ' . $budgets['project_name'];  ?>
									   
									 </h3>
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

                                    <a href="<?php echo base_url().$way[$my_sess];?>">
                                        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button"><i class="lnr lnr-cross"></i></button>
                                    </a>

									</div>
								</div>
							<div class="panel-body">

							<div class="nav-tabs-custom" style="margin-bottom: 15px;">
								<ul class="nav nav-tabs">

								<?php 
									 if(!empty($budgets['file_budget'])){ ?>
                                         <li class="pull-right"><a href='<?php  echo base_url();?>public/index.php/project/download_budget_file/<?php  echo $budget->project_id;?>'>
											<button class='btn btn-default pull-right' type='button' > Print Preview </button></a> </li>
										  <?php
								      } ?>
								<!-- <a href="#!"> <button type="button" class="btn btn-default pull-right disabled" data-dismiss="modal">Print Preview</button></a></li> -->
								</ul>
							</div>

						<form action="" method="GET">
						<table id="example1" class="table table-bordered table-striped">
						

								<?php
								
								if( empty($budgets['budgets']) > 0 ){?>

                                        <thead>
                                            <tr>
                                                <!-- <th>Employee ID</th> -->

                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>Specification</th>
                                                <th>Unit</th>
                                                <th>Quantity</th>
                                                <th>Unit Price </th>
                                                <th>Total Price </th>
                                                <th>Approved </th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody> 
                                           <?php
											    foreach($budgets['budgets'] as $budget){

													
											?>
												<td>
												   <?php echo $budget['date']; ?>
												</td>	
												<td> 		
												   <?php echo  $budget['specification']; ?>	
												</td>
												<td> <?php echo $budget['unit']; ?> </td>
												<td> <?php echo $budget['quantity'] ?> </td>
												<td> <?php echo $budget['unit_price']; ?> </td>
												<td> <?php echo $budget['total_price']; ?> </td>
												<?php echo $budget['approved'] == 1 ? " <td><span class='label label-success'>Yes</span>	</td>": "<td> <span class='label label-danger'>No</span>	</td>" ; ?>
										
											</tr>

										 <?php
											 }
										 }else{
                                            echo '	<b style="color:red;font-size:12pt">Sorry, no any budgets allocated for this project.</b>';
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