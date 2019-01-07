
<!-- navgiation bar required NAVIGATION BAR -->
		
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid" style="display:flex;">
					
				
				<!-- VIEW USERS -->
				  <div class="col-md-8" style="margin: 0 auto; display: block;">
				  	<div class="panel">
				 <div class="box box-success">
			           <div class="panel-heading">
									<h3 class="panel-title">List of Accountants / cashier </h3>
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
									</div>
                                    <?php
                                       if($this->session->flashdata('success')){
                                           echo "<p class='text-success'>".$this->session->flashdata('success') . "</p>";
                                        }else{
                                            echo "<p class='text-danger'>".$this->session->flashdata('fail') . "</p>";
                                       }
                                    ?>
								</div>
								<div class="panel-body">
                                <p class="text-primary"> Note: Active Accountant can update or finance approved budgets.  </p>
						<form action="" method="GET">
						<table id="example1" class="table table-bordered table-striped">
						
					


									 <?php if($users->num_rows() > 0 ){?>
                                          <thead>
                                            <tr>
                                             <!-- <th>Employee ID</th> -->
                                              <th>First Name</th>
                                              <th>Last Name</th>
                                              <th>Qualification</th>
                                              <th>Status</th>
                                              <?php if($this->session->qualification != 'Accountant'){
                                                  echo "<th>Action</th> ";
                                              }
                                              ?>
                                             </tr>
                                            </thead>
                                          <tbody>
                                    
                                         <?php
											    foreach($users->result() as $user){

                                                if($user->qualification == 'Accountant'){?>

                                                    <tr>
														<td>
															<a href='#!'>
					
																<div class='widget-user-image'>
													              <?php echo $user->firstname; ?>
																 </div> <!-- /widget-user-image --> 
															  </a>
															</td>	
													   <td> 		
														  <div class='widget-user-image'>
																  <?php echo  $user->lastname; ?>
														 </div>
												     </td>
												 <td> <?php echo $user->qualification; ?> </td>
												<?php echo $user->active == 1 ? " <td><span class='label label-success'>Active</span>	</td>": "<td> <span class='label label-danger'>Blocked</span>	</td>" ; ?>

                                                <?php 
                                                if($this->session->qualification == 'Finance Director'){
                                                   echo "<td>";
                                                 if( $user->active == 0){?>
                                                     <a href="<?php echo base_url()?>public/index.php/accountant/activateAccountant/<?php echo $user->user_id;?>" class="btn btn-sm label label-primary"> Activate </a>
                                                <?php }else{ ?>
                                                     <a href="<?php echo base_url()?>public/index.php/accountant/deActivateAccountant/<?php echo $user->user_id;?>" class="btn btn-sm label label-danger"> Deactivate </a>
                                                 <?php } 
                                                } 
                                                echo "</td>";
                                                
                                                ?>
                                                
                                                
												
											  </tr>

                                         <?php  } 
											}
										 }else{
                                             echo '<b style="color:red;font-size:12pt">Sorry, no Accountants / Cashier information entered. </b>';
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
		
