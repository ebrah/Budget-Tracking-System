
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div>
				<div class="main-content">
				<div class="container-fluid">
					<div class="col-md-12">
						 <!-- Custom Tabs -->
         	 <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">CHANGE PASSWORD</h3>
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

										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<a href="<?php echo base_url().$way[$my_sess];?>" type="button" ><i class="lnr lnr-cross"></i></a>
									</div>
									<?php
									   if($this->session->flashdata('success')){
										   echo '<p class="text-success">'. $this->session->flashdata('success').'</p>';
									   }else{
										   echo '<p class="text-danger">'. $this->session->flashdata('fail').'</p>';
									   }
									?>
								</div>
				<div class="panel-body">
					<!-- <form class="form-horizontal" id="passwordForm" action=" " method="POST"> -->
					<div class="form-horizontal">
					<?php echo form_open(base_url()."public/index.php/main/changePassword"); ?>
					      <div class="row">
					        <div class="col-sm-3"></div>
					        <div class="col-sm-5">
					          <div id="feedback" style="text-align:center; color:#008000; font-size:14px; margin-bottom:3%;"></div>
					        </div>
					      </div>
					    
					       <div class="form-group">
					          <label for="inputEmail3" class="col-sm-3 control-label">Current Password</label>
					          <div class="col-sm-5">
					            <input type="text" class="form-control regform-control" name="current_pass" placeholder="Current Password" required>
					          </div>
					        </div>

					        <div class="form-group">
					          <label for="inputEmail3" class="col-sm-3 control-label">New Password</label>
					          <div class="col-sm-5">
					            <input type="text" class="form-control regform-control" name="new_pass" placeholder="New Password" onkeyup="check_psw(this.value)" required>
					          </div>
					           <div class="col-sm-3" id="pwd_strength"></div>
					        </div>

					        <div class="form-group">
					          <label for="inputEmail3" class="col-sm-3 control-label">Confirm Password</label>
					          <div class="col-sm-5">
					            <input type="text" class="form-control regform-control" name="confirm_pass" placeholder="Re-enter new password" required>
					          </div>
					        </div>

					       <div class="form-group">
					        <div class="col-sm-3"></div>
					        <div class="col-sm-3">
					        <button type="submit" id="change" class="btn btn-success" >Change</button>
					        </div>
					      </div>

								</form>
                           </div ><!-- //form horizontal.. -->
								</div>
								</div>
								<!-- ../end custom tab -->
								</div>
							</div>
						</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->