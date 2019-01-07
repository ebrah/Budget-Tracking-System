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
									<h3 class="panel-title"> Propose a project / Submit Project</h3>
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
														<p class="text-warning"><?php echo $error;?></p>
																<p class="text-success"><?php if($this->session->flashdata('success')){
																			     echo $this->session->flashdata('success');
														  }?></p>
								</div>
				<div class="panel-body">
					<div class="form-horizontal" id="passwordForm">

                    <?php echo form_open_multipart(base_url()."public/index.php/Project/submit_project/edit/FALSE/id/0");?>
					      <div class="row">
					        <div class="col-sm-3"></div>
					        <div class="col-sm-5">
					          <div id="feedback" style="text-align:center; color:#008000; font-size:14px; margin-bottom:3%;"></div>
					        </div>
					      </div>

					       <div class="form-group">
					          <label for="inputEmail1" class="col-sm-3 control-label">Project Title </label>
					          <div class="col-sm-5">
					            <input type="text" id="inputEmail1" class="form-control regform-control" name="project_title" placeholder="Title" required>
					          </div>
					        </div>

									<div class="form-group">
					          <label for="date1" class="col-sm-3 control-label"> Project start date </label>
					          <div class="col-sm-5">
					            <input type="date" id="date1" class="form-control regform-control" name="start_date" placeholder="start date" required>
					          </div>
					        </div>

									<div class="form-group">
					          <label for="date2" class="col-sm-3 control-label">Project end date </label>
					          <div class="col-sm-5">
					            <input type="date" id="date2" class="form-control regform-control" name="end_date" placeholder="end date" required>
					          </div>
					        </div>

					        <div class="form-group">
					          <label for="description" class="col-sm-3 control-label">Project description</label>
					          <div class="col-sm-5">
                          <textarea name="project_description" id="description" placeholder="describe little about this project" class="form-control regform-control" required></textarea>
					          </div>
					           <div class="col-sm-3" id="pwd_strength"></div>
					        </div>

					        <div class="form-group">
					          <label for="inputEmail3" class="col-sm-3 control-label">Upload Project Proposal or Project Plan if present (optional) </label>
					          <div class="col-sm-5">
					            <input type="file" id="inputEmail3" class="form-control regform-control" name="userfile" >
					          </div>
					        </div>

									<div class="form-group">
					          <label for="client" class="col-sm-3 control-label">Client </label>
					          <div class="col-sm-5">
					            <input type="text" id="client" class="form-control regform-control" name="client_name" placeholder="Client name" required>
					          </div>
					        </div>

									<div class="form-group">
					          <label for="contact" class="col-sm-3 control-label">Contact </label>
					          <div class="col-sm-5">
					            <input type="text" id="contact" class="form-control regform-control" name="contact" placeholder="Client Contact" required>
					          </div>
					        </div>

					       <div class="form-group">
					        <div class="col-sm-3"></div>
					        <div class="col-sm-3">
					        <button type="submit" id="change" class="btn btn-success" >Submit</button>
					        </div>
					      </div>

								</form>
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
