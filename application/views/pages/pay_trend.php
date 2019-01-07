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
              <h3 class="panel-title"> Payment trend.</h3>
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
          </div>

    <div class="panel-body">
      <div class="form-horizontal" id="passwordForm">

        <div class="panel">
  <div class="panel-heading">
    <!-- <h3 class="panel-title">Recent Purchases</h3>
    <div class="right">
      <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
      <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
    </div> -->
  </div>

  <div class="panel-body no-padding">
    <table class="table table-striped">
   

      <?php
        $budgets = $trends['budgets'];
        $projects = $trends['projects'];

        $checkForEmpty = FALSE;

        if($budgets->num_rows() > 0 ){
           foreach ($budgets->result() as $b ) {
             if($b->financed == '' && $b->total_price == ''){
               $checkForEmpty = TRUE;
             }
           }
        }

        
      if($budgets->num_rows() > 0 && $checkForEmpty != TRUE){?>

          <thead>
          <tr>
            <th>Start date</th>
            <th>Project Name</th>
            <th>Financed</th>
            <th>Total Amount</th>
            <th>Accountant issued</th> 
          </tr>
        </thead>
        <tbody>

  <?php    
          foreach ($budgets->result() as $budget ) {
         ?>
         <tr>
          <td><a href="#!"><?php echo $projects[ $budget->project_id ]['project_start']??''; ?></a></td>
          <td><?php echo $projects[ $budget->project_id ]['project_name']??''; ?></td>
          <td> <?php  if($budget->financed != ''){ echo '<span class="label label-success"> YES </span>'; }  ?> </td>
          <td>Tsh: <?php echo $budget->total_price; ?> /=</td>
          <td> <?php echo $users[ $budget->financed ]??''; ?> </td>
        </tr>
  
       <?php
           }
        }else{

          echo '<tr> <p class="text-danger text-center"> No any amount finance to any project yet.</p></tr>';
        }
      
      ?>

      </tbody>
    </table>
  </div>
  <div class="panel-footer">
    <div class="row">
       <div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Last 24 hours</span></div>
     <!-- <div class="col-md-6 text-right"><a href="#" class="btn btn-primary">View All Purchases</a></div> -->
    </div>
  </div>
</div>


      </div><!-- /form-horizontal -->
      </div>
            <!-- ../end custom tab -->
            </div>
          </div>
        </div>
  </div>
  <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
