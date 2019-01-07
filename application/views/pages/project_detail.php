
<!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">

<div class="row">
    <div class="col-md-12">
        <!-- RECENT PURCHASES -->
        <div class="panel">

        <?php 
          $projectId;
          if($project_detail->num_rows() > 0){
              foreach ($project_detail->result() as $project) { ?>

         <div class="panel-heading">
                <h3 class="panel-title">Project Title: <?php 
                   $projectId = $project->project_id; 
                   echo $project->project_name; ?></h3>
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

                    <?php
                       if($this->session->flashdata('success')){
                           echo '<p class="text-success">'. $this->session->flashdata('success') .'</p>';
                       }else{
                           echo '<p class="text-danger">'. $this->session->flashdata('fail') .'</p>';
                       }
                    ?>

                </div>
            </div>
            <div class="panel-body no-padding">
                <table class="table table-striped">
                
                    <tbody>
                        <tr>
                            <th> Project Manager : </th>
                            <td> <?php echo $creater[$project->creater]; ?> </td>
                            <td>
                              <?php
                                 if($this->session->qualification == "Head of Operation"){?>
                                     <button class="btn btn-default" id="switch-btn" data-link="<?php echo base_url()?>public/index.php/hoc/switch_manager/<?php echo $project->project_id;?>" data-toggle="modal" data-target="#modal-manager">switch manager</button>
                                 <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Project Start date : </th>
                            <td> <?php echo $project->project_start; ?> </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Project End date : </th>
                            <td><?php echo $project->project_end; ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Project Description : </th>
                            <td><?php echo $project->statement; ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Project plan file : </th>
                           
                              <?php if($project->file_plan != ""){?>
                                 <td>
                                    <?php echo $project->file_plan; ?>
                                 </td>
                                 <td><a href="<?php echo base_url()?>public/index.php/project/download_plan_file/<?php echo $project->project_id;?>" class="btn btn-info" > Print preview </a> </td>
                              <?php }else{
                                  echo '<td> <span class="label label-warning"> project file not available yet.</span></td>';
                              }?>
                           
                            <!-- <td><span class="label label-success">SUCCESS</span></td> -->
                        </tr>
                        <tr>
                            <th>Project budget file : </th>
                           
                              <?php if($project->file_budget != ""){?>
                                 <td>
                                    <?php echo $project->file_budget; ?>
                                 </td>
                                 <td><a href="<?php echo base_url()?>public/index.php/budget/download_budget_file/<?php echo $project->project_id;?>" class="btn btn-info" > Print preview </a> </td>
                              <?php }else{
                                  echo '<td> <span class="label label-warning"> budget file not available yet.</span> </td>';
                              }?>
                           
                        </tr>
                        <tr>
                            <th>client</th>
                            <td><?php echo $project->client; ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Client Contact</th>
                            <td><?php echo $project->contact; ?></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-2"><span class="panel-note"><i class="fa fa-clock-o"></i> Last 24 hours</span></div>
                    <div class="col-md-10 text-right " style="display: flex; justify-content:flex-end; align-items:center;">
                        Project status:

                         <?php
                           if($project->verified == -1){

                             echo '<span class="label label-danger" style="margin: 0 5px;"> PROJECT REJECTED </span>';
                           }else{?>

                                <?php
                                if($project->approved != ''){
                                    echo '<span class="label label-success" style="margin: 0 5px;">APPROVED</span>';
                                }else{
                                    echo '<span class="label label-warning" style="margin: 0 5px;">NOT APPROVED </span>'; 
                                }
                                ?>

                                AND

                                <?php
                                if($project->verified != ''){
                                    echo '<span class="label label-success" style="margin: 0 5px;">VERIFIED</span>';
                                }else{
                                    echo '<span class="label label-warning" style="margin: 0 5px;">NOT VERIFIED </span>'; 
                                }
                              ?>

                              <?php 
                                 if($this->session->qualification == 'Finance Director' && $this->session->qualification == 'Accountant'){?>
                                     <button class="btn btn-primary" data-toggle="modal" data-target="#modal-plan-file">upload project plan file.</button>
                                 <?php } ?>

                          <?php } ?>

                    </div>
                </div>
            </div>
        </div>

        <!-- recommendation -->
        <?php 
           if($recommendation->num_rows() > 0){?>

           <div class="panel">
            <div class="panel-heading">
               <h3 class="panel-title text-danger"> Recommendation for this project being rejected.</h3>
            </div><!-- /panel-heading -->
            <div class="panel-body">
             <?php 
                foreach ($recommendation->result() as $recommend ) {
                    echo "<p> ". $recommend->recommendation ."</p>";
                }
             ?>
             
          </div>
        </div>

        <?php } ?>
 

            

        <?php    
              }
          }
        ?>

        <!-- END RECENT PURCHASES -->
    </div><!-- row -->

    <div class="modal fade" id="modal-plan-file">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Upload project plan file or Replace existing one.</h4>
                </div>
                <div class="modal-body" style="display: flex; justify-content:center; align-items:center;">
                
                    <?php echo form_open_multipart(base_url()."public/index.php/project/project_file/".$projectId);?>
                        
                        <div class="row">
                            <div class="form-group">
                                    <label for="price" class="col-sm-3 control-label">upload budget file.</label>
                                    <div class="col-sm-7">
                                        <input type="file" id="budgetFile" class="form-control regform-control" name="budgetFile"/>
                                    </div>
                            </div>	
                        </div><!-- /row -->
                        

                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">cancel</button>
              <button  type="submit" class="btn btn-info">upload</button>
              </form>
             </div>
        </div><!-- /modal -->
        </div>
        </div>

    <div class="modal fade" id="modal-manager">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Change Poject Manager.</h4>
                </div>
                <div class="modal-body" id="manager" style="display: flex; justify-content:center; align-items:center;">
                
                    <?php echo form_open_multipart(base_url()."public/index.php/project/project_file/".$projectId);?>
                        
                        <div class="row">

                                  <div class="col-sm-6">
                                   <div class="form-group">
                                    <label for="cmanager" class="col-sm-12 control-label">current Manager .</label>
                                    <div class="col-sm-12">
                                       <select name="cmanager" disabled id="cmanager" class="form-control regform-control">
                                            <option value=""></option>
                                            <option selected value=""><?php echo $creater[$project->creater]; ?></option>
                                            <option value="">Hans</option>
                                       </select>
                                        
                                    </div>
                                    </div><!-- /form-group -->
                                  </div><!-- /col-sm-6 -->
                                  <div class="col-sm-6">
                                   <div class="form-group">
                                    <label for="nmanager" class="col-sm-12 control-label">new Manager.</label>
                                    <div class="col-sm-12">
                                         <select name="nmanager" id="nmanager" class="form-control select2">
                                         <option value=""> select manager </option>
                                            <?php
                                              
                                               if($managers->num_rows() > 0){
                                                   foreach ($managers->result() as $manager ) {?>
                                                    <option value="<?php echo $manager->user_id;?>"> <?php echo $manager->firstname .' '. $manager->lastname; ?> </option>
                                                  <?php }
                                               }?>
                                         </select>
                                    </div> 
                                    </div><!-- /form-group -->
                                  </div><!-- /col-sm-6 -->
                            </div>	
                        </div><!-- /row -->

                <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">cancel</button>
              <button  type="submit" class="btn btn-info">save</button>

              </form>
             </div>
        </div><!-- /modal -->
        <div><!-- /modal-fade -->
        </div>

    </div><!-- /container-fluid -->
  </div><!-- /main-content -->
</div><!-- /main -->