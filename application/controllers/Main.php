<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    //change later to login //now act as admin.
	public function index()
	{
	  $this->load->view('pages/components/loginHeader');
	  $this->load->view('pages/components/loginBody');

	}

	public function admin(){
		$this->load->model('main_model');
		$data['users'] = $this->main_model->get_registered_user();

		$data['notification'] = $this->main_model->notification_data();

		$this->load->view('pages/components/Header');
		$this->load->view('pages/components/navigation', $data);
		$this->load->view('pages/admin/admin_users', $data);
		$this->load->view('pages/components/footer');
	}

	public function registerAdmin(){
		$this->load->model('main_model');
		$data['users'] = $this->main_model->get_registered_user();

		$data['notification'] = $this->main_model->notification_data();

		$this->load->view('pages/components/adminHeader');
		$this->load->view('pages/components/navigation', $data);
		$this->load->view('pages/admin/admin_users', $data);
		$this->load->view('pages/components/footer');
	}

	public function adminChange(){
		$this->load->model('main_model');
		$data['users'] = $this->main_model->get_registered_user();

		$data['notification'] = $this->main_model->notification_data();

		$this->load->view('pages/components/adminHeader');
		$this->load->view('pages/components/navigation', $data);
		$this->load->view('pages/admin/admin_change_password', $data);
		$this->load->view('pages/components/footer');
	}

	public function changePassword(){
		$currentPass = $this->input->post('current_pass');
		$newPass = $this->input->post('new_pass');
		$confirmPass = $this->input->post('confirm_pass');

		
		if($newPass === $confirmPass){
			//update password
			$this->load->model('main_model');
			$this->main_model->changePassword($currentPass, $newPass);
		}else{
			$this->session->set_flashdata('fail', 'New password and confirmed one does not match. Try again.');
			redirect(base_url().'public/index.php/main/adminChange');
		}
	}

	public function Qsurveyor(){

		$this->load->model('main_model');

		$data['projects'] = $this->main_model->get_projects();
		$data['user_project'] =  $this->main_model->get_user();
		$data['notification'] = $this->main_model->notification_data();

		$this->load->view('pages/components/Header');
		$this->load->view('pages/components/navigation', $data);
		$this->load->view('pages/qsurveyor/qsurveyor_view', $data);
		$this->load->view('pages/components/footer');
	}

	public function Pmanager(){

		$this->load->model('main_model');

		$data['projects'] = $this->main_model->get_projects();
		$data['user_project'] =  $this->main_model->get_user();

		$data['notification'] = $this->main_model->notification_data();

		
		$this->load->view('pages/components/Header');
		$this->load->view('pages/components/navigation', $data);
		$this->load->view('pages/pmanager/pm_view_project', $data);
		$this->load->view('pages/components/footer');
	}

	public function Hoc(){

		$this->load->model('main_model');

		$data['projects'] = $this->main_model->get_projects();
		$data['user_project'] =  $this->main_model->get_user();
		$data['notification'] = $this->main_model->notification_data();

		$this->load->view('pages/components/Header');
		$this->load->view('pages/components/navigation', $data);
		$this->load->view('pages/Hoc/hoc_view', $data);
		$this->load->view('pages/components/footer');

	}

	public function Fdirector(){

		$this->load->model('main_model');

		$data['projects'] = $this->main_model->get_projects();
		$data['user_project'] =  $this->main_model->get_user();
		$data['notification'] = $this->main_model->notification_data();

		$this->load->view('pages/components/Header');
		$this->load->view('pages/components/navigation', $data);
		$this->load->view('pages/fdirector/fd_view_project', $data);
		$this->load->view('pages/components/footer');
	}

	public function Account(){

		$this->load->model('main_model');
		$data['projects'] = $this->main_model->get_projects();
		$data['user_project'] =  $this->main_model->get_user();
		$data['notification'] = $this->main_model->notification_data();

		$this->load->view('pages/components/Header');
		$this->load->view('pages/components/navigation', $data);
		$this->load->view('pages/account/acc_view_project',$data);
		$this->load->view('pages/components/footer');
	}


}

?>
