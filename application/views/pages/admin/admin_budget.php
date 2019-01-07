
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="col-md-12">
          <!-- Custom Tabs -->
         	 <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">PROJECT PANEL</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
			 <li class="active"><a href="#tab_1" data-toggle="tab"><b>View Projects</b></a></li>
              <li ><a href="#tab_2" data-toggle="tab"> <b>Upload budget</b></a></li>
              <li class="pull-right"><a href=""> <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Print Preview</button></a></li>
            </ul>

            <div class="tab-content">
              <div class="tab-pane" id="tab_2">            
			  <div class="box-body">
			  <div class="col-md-4">
                <!-- text input -->
				 <div class="form-group">
                  <label>Project Name:</label>
                  <input type="text" class="form-control" name = "project_name" 
                  placeholder ="project name" required> 
             		</div>
				
                 <div class="form-group">
                  <label>Budget Type:</label>
                  <div>
					<input type="radio" name="main_budget" value="main budget" checked> Main Budget <br>
					  <input type="radio" name="variation_budget" value="variation budget"> Variation Budget<br>
					</div>
                  </div>
                <div class="form-group">
                  <label>Upload File</label>
                  <input type="file" class="form-control" name ="" placeholder="Client">
                </div>
                </div>
				
				</div>
				 <div class="box-footer">
				 <div class="col-md-4">
				 </div>
							 <div class="col-md-4">
							 <label></label>
			                <button name = "submit" type="submit" class="btn btn-block btn-success">  <span class="glyphicon glyphicon-floppy-saved"></span> Save</button>
			              
			              </div>
			              </div>
              </div>
              <!-- /.tab-pane -->





              <div class="tab-pane  active" id="tab_1">
               
	<p><?php if(isset($_GET['submit'])){ echo $msg;} ?></p>
			<div class="box-body">
			<form action="" method="GET">
			<table id="example1" class="table table-bordered table-striped">
		          <thead>
		                <tr>
		                  <th>No</th>
		                  <th>Date Created</th>
		                  <th>Project Name</th>
		                  <th>Project type</th>
		                  <th>Project Manager</th>
		                  <th></th>
		                </tr>
                </thead>
                <tbody>              				
               
               
            
                </tbody>
                <tfoot>
                
                </tfoot>
              </table>
			</form >
			
			
			
	 </div>
	

              </div>
              <!-- /.tab-pane -->
            
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- end class panel-body -->
    </div>
    <!-- ../end class-panel -->
</div>
					
				</div>
				<!-- /END CONTAINER FLUID -->
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
