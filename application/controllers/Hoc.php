<?php

  class Hoc extends CI_Controller
  {

    public function verify(){
       $project_id =  $this->uri->segment(3);
       $this->load->model('hoc_model');
       $this->hoc_model->verify($project_id);
    }

    public function ignore(){
        $project_id = $this->uri->segment(3);
        $recommend = $this->input->post('recommendation');
        $this->load->model('hoc_model');
        $this->hoc_model->ignore($project_id, $recommend);
    }

    public function switch_manager(){
        $project_id = $this->uri->segment(3);

        $user = $this->input->post('nmanager');

        $this->load->model('main_model');
        $this->main_model->switch_manager($project_id, $user);
    }
      
  }
  


?>