<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<?php if($this->session->flashdata('fail')){
									   echo '<p class="text-danger text-center">'. $this->session->flashdata('fail') .'</p>';
								}?>
								<div class="logo text-center"><img src="assets/img/gibotel1.png" alt=""></div>
								<p class="lead">Login to your account</p>
							</div>
							<!-- <form class="form-auth-small" action="index.php"> -->
                                <?php echo form_open(base_url()."public/index.php/Register/login_user"); ?>
								<div class="form-group">
									<label for="signin-username" class="control-label sr-only">User name</label>
									<input type="text" class="form-control" name="username" id="signin-username" value="" placeholder="user name">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" id="signin-password" value="" name="password" placeholder="Password">
								</div>
								<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox">
										<span>Remember me</span>
									</label>
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading" style="font-size: 50px;">BUDGET TRACKING SYSTEM</h1>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
