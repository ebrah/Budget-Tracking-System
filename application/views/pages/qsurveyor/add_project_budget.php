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
            <h3 class="panel-title" style="margin-bottom: 10px;"> PROJECT TITLE:  <?php echo $project_name; ?></h3>
              <h3 class="panel-title"> Submit budget report for this project.</h3>
              <div class="right">
                <a href="<?php echo base_url();?>public/index.php/budget/edit_delete/<?php echo $project_id; ?>" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></a>
                <a href="<?php echo base_url();?>/public/index.php/budget/edit_delete/<?php echo $project_id; ?>" ><i class="lnr lnr-cross"></i></a>
                       </div>
                            <p class="text-success"><?php if($this->session->flashdata('success')){
                                       echo $this->session->flashdata('success');
                          }else{
                                       echo $this->session->flashdata('fail');
                          }?></p>
            </div>
    <div class="panel-body">

    <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
			        <li class="active"><a href="#tab_1" data-toggle="tab"><b> Add project budget</b></a></li>
               <!-- <li ><a href="<?php echo base_url()?>public/index.php/budget/edit_delete/<?php echo $project_id;?>" ><b> Edit / Delete </b></a></li> -->
               <!-- <li ><a href="<?php echo base_url();?>public/index.php/project/pay_trend"><b>payment trend</b></a></li> -->

              <li class="pull-right"><a href="#!"> <button type="button" class="btn btn-default pull-right disabled" data-dismiss="modal">Print Preview</button></a></li>
            </ul>
<!-- ####################################################################################### -->
              <!-- tab-pane #tab_1 -->


 <div class="tab-pane  active" id="tab_1">

		<div class="box-body">
      <div class="form-horizontal" id="passwordForm">

<?php echo form_open_multipart(base_url()."public/index.php/budget/submit_budget_now");?>
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-5">
      <div id="feedback" style="text-align:center; color:#008000; font-size:14px; margin-bottom:3%;"></div>
    </div>
  </div>



   <div class="form-group">
      <!-- <label for="inputEmail1" class="col-sm-3 control-label">Project Title </label> -->
      <div class="col-sm-12 text-white">
        <input type="text" id="inputEmail1" class="form-control regform-control text-white" value="<?php echo $project_id;?>" name="projectId" class="hidden" style="background: #fff; color: #fff; box-shadow: 0 0 #fff; border:0" >
      </div>
    </div>

    <!-- <div class="form-group">
      <label for="inputEmail2" class="col-sm-3 control-label">Description</label>
      <div class="col-sm-5">
            <textarea name="project_description" id="inputEmail2" placeholder="describe little about this project" class="form-control regform-control" required></textarea>
      </div>
       <div class="col-sm-3" id="pwd_strength"></div>
    </div> -->

    <div class="form-group">
      <label for="date" class="col-sm-3 control-label">Date</label>
      <div class="col-sm-5">
        <input type="date" id="date" class="form-control regform-control" name="date" " >
      </div>
    </div>

    <div class="form-group">
      <label for="description" class="col-sm-3 control-label">Description</label>
      <div class="col-sm-5">
            <input type="text" name="description" id="description" placeholder="description.." class="form-control regform-control" required/>
      </div>
       <div class="col-sm-3" id="pwd_strength"></div>
    </div>

    <div class="form-group">
      <label for="specificataion" class="col-sm-3 control-label">Specification</label>
      <div class="col-sm-5">
            <input type="text" name="specification" id="specification" placeholder="Specification" class="form-control regform-control" required/>
      </div>
       <div class="col-sm-3" id="pwd_strength"></div>
    </div>

    <div class="form-group">
      <label for="unit" class="col-sm-3 control-label">Unit</label>
      <div class="col-sm-5">
            <input type="text" name="unit" id="specification" placeholder="Unit" class="form-control regform-control" required/>
      </div>
       <div class="col-sm-3" id="pwd_strength"></div>
    </div>

    <div class="form-group">
      <label for="quantity" class="col-sm-3 control-label">Quantity</label>
      <div class="col-sm-5">
            <input type="number" name="quantity" id="quantity" class="form-control regform-control" placeholder="0" required/>
      </div>
       <div class="col-sm-3" id="pwd_strength"></div>
    </div>

    <div class="form-group">
      <label for="price" class="col-sm-3 control-label">Unit Price</label>
      <div class="col-sm-5">
        <input type="number" id="price" class="form-control regform-control" placeholder="00.0" name="price" >
      </div>
    </div>

    <div class="form-group">
      <label for="tprice1" class="col-sm-3 control-label">Total Price</label>
      <div class="col-sm-5">
        <input type="number" id="tprice1" class="form-control regform-control"  placeholder="00.0" disabled>
        <input type="number" id="tprice" name="tprice" class="hidden"/>
      </div>
    </div>

   <div class="form-group">
    <div class="col-sm-3"></div>
    <div class="col-sm-3">
    <button type="submit" id="change" class="btn btn-success" >Submit</button>
    </div>
  </div>

  </form>
      </div> <!-- /box-body -->
    </div> <!-- /tab-pane -->


    </div> <!-- /nav-tabs-custom -->


 
            <!-- </div> -->
            <!-- </div> -->
            <!-- ../end custom tab -->
            <!-- </div> -->
          </div>
        </div>
  </div>
  <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
