		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href=""><img src="<?php echo asset_url() ?>/img/gibotel1.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<form class="navbar-form navbar-right">
					<div class="input-group">
						<input type="text" value="" class="form-control" placeholder="Search dashboard...">
						<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
					</div>
				</form>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
								<i class="lnr lnr-alarm"></i>
								<?php
								 
									$notifications = $notification['notifications'];
									$project = $notification['projects'];
								      if($notifications->num_rows() > 0){
										echo '<span class="badge bg-danger">'. $notifications->num_rows() .'</span>';
									}
								?>
								
							</a>
							<ul class="dropdown-menu notifications" style="max-height: 79vh; overflow: auto;">

							  <?php
								if($notifications->num_rows() > 0){
									foreach ($notifications->result() as $notify) {

										if($this->session->qualification == "Telecom Engineer" || $this->session->qualification == "Civil Engineer" || $this->session->qualification == "Electrical Engineer"){

											if(!empty($notify->mssg_Pm)){
										      echo '<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>'.$notify->mssg_Pm.' '.$project[$notify->project_id] ??''.'</a></li>';
											
											}
										}

									

										if($this->session->qualification == "Quantity Surveyor" ){
											if(!empty($notify->mssg_Qs)){
												echo '<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>'.$notify->mssg_Qs.' '. $project[ $notify->project_id]?? '' .'</a></li>';
											}
										}

										if($this->session->qualification == "Head of Operation"){
											if(!empty($notify->mssg_Ho)){
												echo '<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>'.$notify->mssg_Ho .', '.$project[$notify->project_id]?? ''.'</a></li>';
											}
										}

										if($this->session->qualification == "Finance Director"){

											if(!empty($notify->mssg_Fd)){
												echo '<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>'.$notify->mssg_Fd .' '. $project[$notify->project_id]?? ''.'</a></li>';
											}
										}

										if($this->session->qualification == "Accountant"){

											if(!empty($notify->mssg_Acc)){
												echo '<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>'.$notify->mssg_Acc .' '.$project[$notify->project_id]?? ''.'</a></li>';
											}
										}   
										if($this->session->qualification == "System Admin"){

											if(!empty($notify->mssg_Qs)){
												echo '<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>'.$notify->mssg_Qs .' '.$project[$notify->project_id]?? ''.'</a></li>';
												
											}
										}   
									}
									?>

									<li><a href="<?php echo base_url()?>public/index.php/project/deleteNotification" class="more">Delete All notifications</a></li>

								<?php }
								
							  ?>
	
						  </ul>
						</li>
						<!-- <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#">Basic Use</a></li>
								<li><a href="#">Working With Data</a></li>
								<li><a href="#">Security</a></li>
								<li><a href="#">Troubleshooting</a></li>
							</ul>
						</li> -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo asset_url() ?>/img/user.png" class="img-circle" alt="Avatar"> <span><?php echo $this->session->firstname; ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#!" class="lnr lnr-user"> <?php echo $this->session->qualification; ?></a></li>
								<li><a href="<?php echo base_url()?>public/index.php/main/adminChange"><i class="lnr lnr-lock"></i> <span>Change Password</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="">
				<nav>
				<?php
				   $budget = $this->uri->segment(2) === 'view_project_budget';
				   $logout = $this->uri->segment(2) === 'logoutDirect';
				                                       
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
					<ul class="nav">
						<li><a href="<?php echo base_url().$way[$my_sess];?>" class="<?php echo (($budget === TRUE) || ($logout === TRUE))? '' : 'active' ?>"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<!-- <li><a href="admin_users.php" class="active"><i class="lnr lnr-pencil"></i> <span>users</span></a></li> -->
						<!-- <li><a href="<?php echo base_url()?>public/index.php/project/view_project_budget" class="<?php echo ($budget === TRUE)? 'active' : '' ?>"><i class="fa fa-upload"></i> <span>budget</span></a></li> -->
						<li><a href="<?php echo base_url()?>public/index.php/Register/logoutDirect" class="<?php echo ($logout === TRUE)? 'active' : '' ?>"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->