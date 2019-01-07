<?php

class Fdirector extends CI_Controller
{
   
   function approve(){
     $project_id = $this->uri->segment(3);
     $this->load->model('fdirector_model');
     $this->fdirector_model->approve($project_id);
  }

  public function ignore(){
      $project_id = $this->uri->segment(3);

      $recommendation = $this->input->post('recommendation');
      $this->load->model('fdirector_model');
      $this->fdirector_model->ignore($project_id, $recommendation);
  }

  public function approve_budget(){
    $arr = $this->uri->uri_to_assoc(3);
    $budget_id = $arr['b'];
    $project_id = $arr['p'];

    $this->load->model('fdirector_model');
    $this->fdirector_model->approve_budget($budget_id, $project_id);
  }

  public function reject_budget(){
     $arr = $this->uri->uri_to_assoc(3);
    $budget_id = $arr['b'];
    $project_id = $arr['p'];

    $recommendation = $this->input->post('recommendation');
    $this->load->model('fdirector_model');
    $this->fdirector_model->reject_budget($budget_id, $project_id, $recommendation);
  }

  

}

?>