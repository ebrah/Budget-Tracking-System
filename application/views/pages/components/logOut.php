	
   		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
   
   <!-- MAIN CONTENT -->
    <!-- <div>
				<div class="main-content">
				<div class="container-fluid">
					<div class="col-md-12">
						custom tab -->
				 <div class="panel" >
				 				<div class="panel-heading">
									<h3 class="panel-title">LOG OUT</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
                      
				                  	<div class="panel-body">
                               <div class="well center-block" style="width: 80%; padding: 1% 1%; margin: 1%;">
                                  <h4 class="text-center">You are about to Log out!</h4>
                                 <p class="text-center">Click "Cancel" to skip Log out or "Continue" to Log out.</p>
                                <p class="text-center">
                                     
                                      <?php
                                                  

                                             switch($this->session->qualification){
                                 
                                                case 'Quantity Surveyor' : path(base_url(),"public/index.php/main/Qsurveyor");
                                                break;
                                                case 'Telecom Engineer' : path(base_url(),"public/index.php/main/Pmanager");
                                                break;
                                                case 'Civil Engineer' : path(base_url(),"public/index.php/main/Pmanager");
                                                break;
                                                case 'Electrical Engineer' : path(base_url(),"public/index.php/main/Pmanager");
                                                break;
                                                case 'Head of Operation' : path(base_url(),"public/index.php/main/Hoc");
                                                break;
                                                case 'Finance Director' : path(base_url(),"public/index.php/main/Fdirector");
                                                break;
                                                case 'Accountant' : path(base_url(),"public/index.php/main/Account");
                                                break;
                                                case 'System Admin' : path(base_url(),"public/index.php/main/admin");
                                                break;
                                 
                                                default;
                                 
                                             }

                                             function path($path, $ur){
                                                echo '<a href="'.$path.$ur.'" type="button" class="btn btn-success logout">Cancel</a> '; 
                                             }
                                      ?>
                                      <!-- <a href="admin_index.html" type="button" class="btn btn-success logout">Cancel</a>  -->
                                     <a href="<?php echo base_url()?>public/index.php/Register/logout" type="button" class="btn btn-success logout">Continue</a>
                               </p>
                           </div>
                            </div>
                        
					   	
					           </div>
					           </div>
					           </div>
					           </div>

			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->