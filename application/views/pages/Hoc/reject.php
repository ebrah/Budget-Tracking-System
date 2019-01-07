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
              <h3 class="panel-title"> Statement for Rejection </h3>
              <div class="right">
                <a href="<?php echo base_url();?>public/index.php/main/Hoc" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></a>
                <a href="<?php echo base_url();?>public/index.php/main/Hoc"><i class="lnr lnr-cross"></i></a>
                       </div>
                        <p class="text-warning"><?php echo $error;?></p>
                            <p class="text-success"><?php if($this->session->flashdata('success')){
                                       echo $this->session->flashdata('success');
                          }?></p>
            </div>
    <div class="panel-body">
      <div class="form-horizontal" id="passwordForm">

                <?php echo form_open(base_url()."public/index.php/Project/submit_rejection");?>
            <div class="row">
              <div class="col-sm-3"></div>
              <div class="col-sm-5">
                <div id="feedback" style="text-align:center; color:#008000; font-size:14px; margin-bottom:3%;"></div>
              </div>
            </div>

             <div class="form-group">
                <label for="inputEmail1" class="col-sm-3 control-label">Project Title </label>
                <div class="col-sm-5">
                  <input type="text" id="inputEmail1" class="form-control regform-control text-white" value="<?php echo $project_id;?>" name="projectId" style="background: #fff; color: #fff; box-shadow: 0 0 #fff; border:0" >
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail2" class="col-sm-3 control-label">Reason / statement for rejection.</label>
                <div class="col-sm-5">
                      <textarea col="4" rows="5" name="reason" id="inputEmail2" placeholder="reason" class="form-control regform-control" required></textarea>
                </div>
                 <div class="col-sm-3" id="pwd_strength"></div>
              </div>

              <!-- <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Upload Project Proposal or Project Plan </label>
                <div class="col-sm-5">
                  <input type="file" id="inputEmail3" class="form-control regform-control" name="userfile" >
                </div>
              </div> -->

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
