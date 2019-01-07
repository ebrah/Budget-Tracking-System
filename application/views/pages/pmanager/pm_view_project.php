<!-- MAIN -->
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="col-md-12">
          <!-- Custom Tabs -->
         	 <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">REQUEST PANEL</h3>
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
											 echo '<p class="text-success">'. $this->session->flashdata('success') .'</p>';
										 }else{
											 echo '<p class="text-danger">' .$this->session->flashdata('fail') .'</p>';
										 }
									?>
								</div>
								<div class="panel-body">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
			         <li class="active"><a href="#tab_1" data-toggle="tab"><b>View Projects</b></a></li>
               <li ><a href="<?php echo base_url();?>public/index.php/project/request_project" ><b>New Request</b></a></li>
               <li ><a href="<?php echo base_url();?>public/index.php/project/pay_trend"><b>payment trend</b></a></li>

              <li class="pull-right"><a href="#!"> <button type="button" class="btn btn-default pull-right disabled" data-dismiss="modal">Print Preview</button></a></li>
            </ul>
<!-- ####################################################################################### -->
              <!-- tab-pane #tab_1 -->
    <div class="tab-pane  active" id="tab_1">

			<div class="box-body">
			<form action="" method="GET">
			<table id="example1" class="table table-bordered table-striped">
						
						 <?php if($projects->num_rows() > 0 ){?>

				         <thead>
									<tr>
										<!-- <th>Employee ID</th> -->
										<th>Project Title</th>
										<th>Start Date</th>
										<th>Project Manager</th>
										<th>Verified</th>
										<th>Approved</th>
										<th>Client</th>
										<th>Project budget</th>
										<th colspan="2">Actions</th>
									</tr>
								 </thead>
								<tbody>

                   <?php
											foreach($projects->result() as $project){
										?>
													<td>
														<a href='<?php echo base_url()?>public/index.php/project/project_detail/<?php echo $project->project_id;?>'>
				
																	<div class='widget-user-image'>
															          <?php echo $project->project_name; ?>
																	</div> <!-- /widget-user-image --> 
															</a>
													</td>	
											<td> 		
												<?php echo $project->project_start; ?>
											</td>
											<td> 		
												  <?php echo $user_project[$project->creater]; ?>
											</td>
											
											<?php 
											    if($project->verified == -1){
													  echo 	" <td><span class='label label-danger'> REJECTED </span>	</td>";
													}else{
														echo $project->verified != '' ? " <td><span class='label label-success'> Verified </span>	</td>": "<td> <span class='label label-danger'>Not verified </span>	</td>" ;
													}
                     
													if($project->verified == -1){
													  echo 	" <td><span class='label label-danger'> REJECTED </span>	</td>";
													}else{?>
													
														<?php echo $project->approved != '' ? " <td><span class='label label-success'>Approved</span>	</td>": "<td> <span class='label label-danger'>Not Approved </span>	</td>" ; ?>

												<?php	} ?>

											<td> 		
												  <?php echo $project->client; ?>
											</td>
					
											<td> 
												<a href='<?php echo base_url();?>public/index.php/budget/edit_delete/<?php echo $project->project_id;?>'/>
												<button class='btn btn-block btn-default btn-sm ' type='button' > view budget </button></a>
											</td>
											<td> 
												<a href='<?php echo base_url();?>public/index.php/project/edit_project/<?php echo $project->project_id;?>'/>
												<button class='btn btn-block btn-default btn-sm ' type='button' > edit </button></a>
											</td>

											<td> 
													 <button class='btn btn-block btn-default btn-sm' type='button' data-toggle="modal" data-target="#modal-default1"  deleteUrl="<?php echo base_url();?>public/index.php/project/delete_project/<?php echo $project->project_id;?>"  > Delete </button></a>
											</td>
											
										</tr>

									 <?
												}
									 }else{
										echo '<b style="color:red;font-size:12pt">Sorry, no project uploaded yet.</b>';
									 }?>


					
      <div class="modal fade" id="modal-default1">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Delete Project.</h4>
					  </div>
					  <div class="modal-body">
						<p>   
											<form action="" method="GET">
											
												<b style="color:red;font-size:12pt">Are you sure!, want to delete this Project?</b>
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
					   
					
						</tbody>
						<tfoot>
						
						</tfoot>
					  </table>

			</form >

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
