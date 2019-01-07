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
              <h3 class="panel-title"> Edit budget for this project.</h3>
              <div class="right">
                <a href="<?php echo base_url();?>public/index.php/budget/edit_delete/<?php echo $budget['project_id']; ?>" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></a>
                <a href="<?php echo base_url();?>public/index.php/budget/edit_delete/<?php echo $budget['project_id']; ?>" ><i class="lnr lnr-cross"></i></a>
                       </div>
                          <?php if($this->session->flashdata('success')){
                                       echo '<p class="text-success">'. $this->session->flashdata('success') .'</p>';
                          }else{
                                       echo '<p class="text-danger">'.$this->session->flashdata('fail'). '</p>';
                          }?>
            </div>
    <div class="panel-body">

    <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
			        <li class="active"><a href="#tab_1" data-toggle="tab"><b> edit budget</b></a></li>
               <!-- <li ><a href="<?php echo base_url()?>public/index.php/project/edit_delete/<?php echo $project_id;?>" ><b> Edit/ Delete </b></a></li> -->
               <!-- <li ><a href="<?php echo base_url();?>public/index.php/project/pay_trend"><b>payment trend</b></a></li> -->

              <!-- <li class="pull-right"><a href="#!"> <button type="button" class="btn btn-default pull-right disabled" data-dismiss="modal">Print Preview</button></a></li> -->
            </ul>
<!-- ####################################################################################### -->
              <!-- tab-pane #tab_1 -->


 <div class="tab-pane  active" id="tab_1">

		<div class="box-body">
      <div class="form-horizontal" id="passwordForm">

<?php echo form_open_multipart(base_url()."public/index.php/budget/project_budget_edit/b/".$budget['budget_id']."/p/".$budget['project_id']);?>
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-5">
      <div id="feedback" style="text-align:center; color:#008000; font-size:14px; margin-bottom:3%;"></div>
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
        <input type="date" id="date" value="<?php echo $budget['date']; ?>" class="form-control regform-control" name="date" " >
      </div>
    </div>

    <div class="form-group">
      <label for="description" class="col-sm-3 control-label">Description</label>
      <div class="col-sm-5">
            <input type="text" name="description" value="<?php echo $budget['description']; ?>" id="description" placeholder="description.." class="form-control regform-control" required/>
      </div>
       <div class="col-sm-3" id="pwd_strength"></div>
    </div>

    <div class="form-group">
      <label for="specificataion" class="col-sm-3 control-label">Specification</label>
      <div class="col-sm-5">
            <input type="text" name="specification" value="<?php echo $budget['specification']; ?>" id="specification" placeholder="Specification" class="form-control regform-control" required/>
      </div>
       <div class="col-sm-3" id="pwd_strength"></div>
    </div>

    <div class="form-group">
      <label for="unit" class="col-sm-3 control-label">Unit</label>
      <div class="col-sm-5">
            <input type="text" name="unit" id="unit" value="<?php echo $budget['unit']; ?>" placeholder="Unit" class="form-control regform-control" required/>
      </div>
       <div class="col-sm-3" id="pwd_strength"></div>
    </div>

    <div class="form-group">
      <label for="quantity" class="col-sm-3 control-label">Quantity</label>
      <div class="col-sm-5">
            <input type="number" name="quantity" value="<?php echo $budget['quantity']; ?>" id="quantity" class="form-control regform-control" placeholder="0" required/>
      </div>
       <div class="col-sm-3" id="pwd_strength"></div>
    </div>

    <div class="form-group">
      <label for="price" class="col-sm-3 control-label">Unit Price</label>
      <div class="col-sm-5">
        <input type="number" id="price" value="<?php echo $budget['price']; ?>" class="form-control regform-control" placeholder="00.0" name="price" >
      </div>
    </div>

    <div class="form-group">
      <label for="tprice1" class="col-sm-3 control-label">Total Price</label>
      <div class="col-sm-5">
        <input type="number" id="tprice1" value="<?php echo $budget['tprice']; ?>" class="form-control regform-control"  placeholder="00.0" disabled>
        <input type="number" id="tprice" value="<?php echo $budget['tprice']; ?>" name="tprice" class="hidden"/>
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
