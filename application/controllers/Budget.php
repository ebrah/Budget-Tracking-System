<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Budget extends CI_Controller
  {
     
    public function submit_budget(){
        $project_id =  $this->uri->segment(3);
        $data['project_id'] = $project_id;
        $data['error'] = '';

        $this->load->model('main_model');
        $data['project_name'] = $this->main_model->get_project_title($project_id);
       
        $data['notification'] = $this->main_model->notification_data();

        $this->load->view('pages/components/Header');
        $this->load->view('pages/components/navigation', $data);
        $this->load->view('pages/qsurveyor/add_project_budget', $data);
        $this->load->view('pages/components/footer');
   }

   public function edit_delete(){ //view_to delete budgets..

        $project_id = $this->uri->segment(3);
        $data['error'] = '';

        $this->load->model('main_model');
        $this->load->model('budget_model');
        
        $data['notification'] = $this->main_model->notification_data();
        $data['project_name'] = $this->main_model->get_project_title($project_id);
        $data['project_id'] = $project_id;

        $budgets = $this->budget_model->budgets($project_id);

        $data['budgets'] = $budgets['budgets'];
        $data['file'] = $budgets['file'];

        $this->load->view('pages/components/Header');
        $this->load->view('pages/components/navigation', $data);
        $this->load->view('pages/edit_delete_view', $data);
        $this->load->view('pages/components/footer');  

 }

    public function view_budget_edit(){
        $url = $this->uri->uri_to_assoc(3);

        $project_id =  $this->uri->segment(3);
        $data['project_id'] = $url['p'];
        $data['error'] = '';

        $this->load->model('main_model');
        $this->load->model('budget_model');

        $data['project_name'] = $this->main_model->get_project_title($url['p']);
        $data['notification'] = $this->main_model->notification_data();

        $data['budget'] = $this->budget_model->get_budget($url['b']);

        $this->load->view('pages/components/Header');
        $this->load->view('pages/components/navigation', $data);
        $this->load->view('pages/view_budget_edit', $data);
        $this->load->view('pages/components/footer');

   }
    
    public function project_budget_edit(){
        $array =  $this->uri->uri_to_assoc(3);
        $budget_id = $array['b'];
        $project_id = $array['p'];

        $date = $this->input->post('date');
        $description = $this->input->post('description');
        $specification = $this->input->post('specification');
        $unit = $this->input->post('unit');
        $quantity = $this->input->post('quantity');
        $price = $this->input->post('price');
        $tprice = $this->input->post('tprice');

        $this->load->model('budget_model');
        $this->budget_model->project_budget_edit($date, $description, $specification, $unit, $quantity, $price, $tprice, $budget_id, $project_id);
   }

   public function project_budget_delete(){
       $array = $this->uri->uri_to_assoc(3);
       $budget_id = $array['b'];
       $project_id = $array['p'];

       $this->load->model('budget_model');
       $this->budget_model->project_budget_delete($budget_id, $project_id);

   }

   public function submit_budget_now(){

        $projectId = $this->input->post('projectId');
        $date = $this->input->post('date');
        $description = $this->input->post('description');
        $specification = $this->input->post('specification');
        $unit = $this->input->post('unit');
        $quantity = $this->input->post('quantity');
        $price = $this->input->post('price');
        $tprice = $this->input->post('tprice');

        $this->load->model('budget_model');
        $this->budget_model->Submit_budget($date, $description, $specification, $unit, $quantity, $price, $tprice, $projectId);

    }


        public function budget_file(){

           $project_id = $this->uri->segment(3);

           $config['upload_path']          = './uploads/';
           $config['allowed_types']        = 'pdf|doc|docx';
    
           $this->load->library('upload', $config);
    
           $this->upload->initialize($config);
    
           if ( ! $this->upload->do_upload('budgetFile'))
            {
                    $error =  $this->upload->display_errors();

                    $this->session->set_flashdata('fail', $error);
                    redirect(base_url()."public/index.php/budget/edit_delete/". $project_id);
    
            }
            else
            {
                   $data = array('upload_data' => $this->upload->data());
    
                    // $this->load->view('upload_success', $data);
    
                   $filename = $data['upload_data']["file_name"];
  
                   $this->load->model('budget_model');
                   $this->budget_model->budget_file($project_id, $filename);
            }

        } 

      public function download_budget_file(){
        $pid = $this->uri->segment(3);
        $this->load->model('budget_model');
        $this->budget_model->download_budget_file($pid);
     }

  }

?>