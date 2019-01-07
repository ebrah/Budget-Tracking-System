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
              <h3 class="panel-title"> Finance the project </h3>
              <div class="right">
                <a href="<?php echo base_url();?>public/index.php/main/Account" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></a>
                <a href="<?php echo base_url();?>public/index.php/main/account" ><i class="lnr lnr-cross"></i></a>
                       </div>
                        
                            <p class="text-success"><?php if($this->session->flashdata('success')){
                                       echo $this->session->flashdata('success');
                          }?></p>
            </div>
    <div class="panel-body">
      <div class="form-horizontal" id="passwordForm">

                <?php echo form_open(base_url()."public/index.php/Project/finance_account");?>
            <div class="row">
              <div class="col-sm-3"></div>
              <div class="col-sm-5">
                <div id="feedback" style="text-align:center; color:#008000; font-size:14px; margin-bottom:3%;"></div>
              </div>
            </div>

             <div class="form-group">
                <label for="inputEmail1" class="col-sm-3 control-label"> </label>
                <div class="col-sm-5">
                  <input type="text" id="inputEmail1" class="form-control regform-control text-white" value="<?php echo $projectId;?>" name="projectId" style="background: #fff; color: #fff; box-shadow: 0 0 #fff; border:0" >
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail2" class="col-sm-3 control-label">Enter amount according to project budget.</label>
                <div class="col-sm-5">
                      <input type="number"  name="amount" id="inputEmail2" placeholder="0.00" class="form-control regform-control" required/>
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
