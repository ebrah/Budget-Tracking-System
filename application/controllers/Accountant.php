<?php
 class Accountant extends CI_Controller 
 {
     public function finance(){
         $arr = $this->uri->uri_to_assoc(3);
         $project_id =  $arr['p'];
         $budget_id = $arr['b'];

         $this->load->model('accountant_model');
         $this->accountant_model->finance($budget_id, $project_id);
     }

     public function revert(){

         $arr = $this->uri->uri_to_assoc(3);
         $project_id =  $arr['p'];
         $budget_id = $arr['b'];

         $this->load->model('accountant_model');
         $this->accountant_model->revert($budget_id, $project_id);

     }

     public function accountants(){

        $this->load->model('main_model');
		$data['users'] = $this->main_model->get_registered_user();

		$data['notification'] = $this->main_model->notification_data();

		$this->load->view('pages/components/Header');
		$this->load->view('pages/components/navigation', $data);
		$this->load->view('pages/account/accountants', $data);
		$this->load->view('pages/components/footer');
       
     }

     public function activateAccountant(){
         $accountant_id = $this->uri->segment(3);
         $this->load->model('accountant_model');
         $this->accountant_model->activateAccountant($accountant_id);
     }
     public function deActivateAccountant(){
         $accountant_id = $this->uri->segment(3);
         $this->load->model('accountant_model');
         $this->accountant_model->deActivateAccountant($accountant_id);
     }
 }
 

 ?>