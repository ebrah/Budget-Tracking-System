<?php
class Register extends CI_Controller{
    public function index(){
        echo 'default controller';
    }

     public function register_user(){

            $fname = $this->input->post('firstname');
            $lname = $this->input->post('lastname');
            $usrname = $this->input->post('username');
            $pass = $this->input->post('password');
            $vpass = $this->input->post('verify_password');
            $position = $this->input->post('position');
            $gender = $this->input->post('gender');
            $phone = $this->input->post('phone_number');

            $rul = array(
                array(
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'verify_password',
                    'label' => 'Password Confirmation',
                    'rules' => 'required|matches[password]'
                ),
                array(
                    'field' => 'phone_number',
                    'label' => 'Phone number',
                    'rules' => 'required|min_length[10]|max_length[12]'
                )
            );

            $this->form_validation->set_rules($rul);

            if($this->form_validation->run() === TRUE){
                $this->load->model('main_model');
                $this->main_model->register_user($fname, $lname, $usrname, $pass, $vpass, $position, $gender, $phone);
            }else{
                redirect(base_url()."public/index.php/main/admin");
        }

  }


 public function login_user(){

    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $this->load->model('main_model');
    $this->main_model->login_user($username, $password);
}

public function logout(){
    $this->session->sess_destroy();
    redirect(base_url()."public/index.php/main");
}

 public function logoutDirect(){
        $this->load->model('main_model');
        $data['notification'] = $this->main_model->notification_data();

        $this->load->view('pages/components/Header');
		$this->load->view('pages/components/navigation', $data);
		$this->load->view('pages/components/logOut');
		$this->load->view('pages/components/footer');
  }

  public function activateUser(){
      $userId = $this->uri->segment(3);
      $this->load->model('main_model');
      $this->main_model->activateUser($userId);
  }

  public function deActivateUser(){
        $userId = $this->uri->segment(3);
        $this->load->model('main_model');
        $this->main_model->deActivateUser($userId);
  }

}

?>
