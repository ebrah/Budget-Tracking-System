<?php
class Project extends CI_controller{

    public function request_project(){

                $this->load->model('main_model');
                $data['notification'] = $this->main_model->notification_data();

                $this->load->view('pages/components/Header');
	   	$this->load->view('pages/components/navigation', $data);
	   	$this->load->view('pages/request_project', array('error' => ''));
	  	$this->load->view('pages/components/footer');
    }

    public function submit_project(){

             $arr = $this->uri->uri_to_assoc(3);
             $edit = $arr['edit'];
             $projectID = $arr['id'];

             $title = $this->input->post('project_title');
             $description = $this->input->post('project_description');
             $start_date = $this->input->post('start_date');
             $end_date = $this->input->post('end_date');
             $client = $this->input->post('client_name');
             $contact = $this->input->post('contact');

             $this->load->model('main_model');


            if(!empty($_FILES['userfile']['name'])){

                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'pdf|doc|docx';
     
                $this->load->library('upload', $config);
     
                $this->upload->initialize($config);
     
                if ( ! $this->upload->do_upload('userfile'))
                 {
                         $error = $this->upload->display_errors();
     
                         $this->load->model('main_model');
                         $this->session->set_flashdata('success', $error);

                         redirect(base_url()."public/index.php/project/request_project");
                       
                 }
                 else
                 {
                         $data = array('upload_data' => $this->upload->data());
     
                         // $this->load->view('upload_success', $data);
     
                         $filename = $data['upload_data']["file_name"];
                        //  echo $filename;

                
     
                         $this->main_model->Submit_project($title, $description, $start_date, $end_date, $client, $contact ,$filename , $edit, $projectID); 
                 }

            }else{
                    $this->main_model->Submit_project($title, $description, $start_date, $end_date, $client, $contact, '', $edit, $projectID);    
            }

     }

     public function delete_project(){
        $projectId = $this->uri->segment(3);
        $this->load->model('main_model');
        $this->main_model->delete_project($projectId);
    }

     public function project_file(){

        $projectId = $this->uri->segment(3);
        
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'pdf|doc|docx';

        $this->load->library('upload', $config);
        $this->load->model('main_model');

        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('budgetFile'))
         {
                 $error  = $this->upload->display_errors();

                 $this->session->set_flashdata('fail', $error);

                 redirect(base_url()."public/index.php/project/project_detail/".$projectId);
         }
         else
         {
                 $data = array('upload_data' => $this->upload->data());

                 $filename = $data['upload_data']["file_name"];
               
                 $this->main_model->project_file($projectId, $filename); 
         }
     }

     public function pay_trend(){

        $this->load->model('main_model');
        $data['trends'] = $this->main_model->pay_trends(); 
        $data['users'] = $this->main_model->get_user();
        $data['notification'] = $this->main_model->notification_data();


        $this->load->view('pages/components/Header');
        $this->load->view('pages/components/navigation', $data);
        $this->load->view('pages/pay_trend', $data);
        $this->load->view('pages/components/footer');
     }

     public function edit_project(){
        $project_id = $this->uri->segment(3);

        $this->load->model('main_model');
        $data['project_id'] = $project_id;
        $data['notification'] = $this->main_model->notification_data();

        $data['project'] = $this->main_model->get_edit_project($project_id);

        $this->load->view('pages/components/Header');
        $this->load->view('pages/components/navigation', $data);
        $this->load->view('pages/edit_Request_project', $data);
        $this->load->view('pages/components/footer');
             
     }

//      public function accept(){
//          $pid = $this->uri->segment(3);
//          $this->load->model('main_model');
//          $this->main_model->submit_accept($pid);
//      }

//      public function edit(){
//        $proId  = $this->uri->segment(3);
//        $data['project_id'] = $this->uri->segment(3);
//        $data['error'] = '';

//        $this->load->model('main_model');
//        $data['notification'] = $this->main_model->notification_data();

//        $this->load->view('pages/components/Header');
//        $this->load->view('pages/components/navigation', $data);
//        $this->load->view('pages/Hoc/edit_view', $data);
//        $this->load->view('pages/components/footer');
//      }


//      public function submit_edit(){

//               $config['upload_path']          = './uploads/';
//               $config['allowed_types']        = 'pdf|doc|docx';

//               $this->load->library('upload', $config);

//               $this->upload->initialize($config);

//               if ( ! $this->upload->do_upload('userfile'))
//                {
//                        $error = array('error' => $this->upload->display_errors());

//                        $data['project_id'] = '';
//                        $data['error'] = $error;

//                        $this->load->model('main_model');
//                        $data['notification'] = $this->main_model->notification_data();

//                        // $this->load->view('upload_form', $error);
//                        $this->load->view('pages/components/Header');
//                        $this->load->view('pages/components/navigation', $data);
//                        $this->load->view('pages/qsurveyor/project_budget', $data);
//                        $this->load->view('pages/components/footer');
//                }
//                else
//                {
//                        $data = array('upload_data' => $this->upload->data());

//                        // $this->load->view('upload_success', $data);

//                        $filename = $data['upload_data']["file_name"];

//                        $project_id = $this->input->post('projectId');
//                        $projectTitle = $this->input->post('projectTitle');
//                        $description = $this->input->post('reason');

//                 //        echo $project_id;
//                 //        echo $projectTitle;
//                 //        echo $description;
//                 //        echo $filename;

//                        $this->load->model('main_model');
//                        $this->main_model->editing($projectTitle, $description, $filename, $project_id);
//                }

//      }


//      public function reject(){
//        $proId  = $this->uri->segment(3);
//        $data['project_id'] = $proId;
//        $data['error'] = '';

//        $this->load->model('main_model');
//        $data['notification'] = $this->main_model->notification_data();

//        $this->load->view('pages/components/Header');
//        $this->load->view('pages/components/navigation', $data);
//        $this->load->view('pages/Hoc/reject', $data);
//        $this->load->view('pages/components/footer');
//      }

//      public function submit_rejection(){

//           $project = $this->input->post('projectId');
//           $stament = $this->input->post('reason');

//           $this->load->model('main_model');
//           $this->main_model->rejection($project, $stament);
//      }


   public function finance(){
        $proId  = $this->uri->segment(3);
        $this->load->model('main_model');
        $this->main_model->finance($proId);
   }

   public function finance_account(){
           //finance acc

           $pId = $this->input->post('projectId');
           $amount = $this->input->post('amount');

           
           $this->load->model('main_model');
           $this->main_model->finance_account($pId, $amount);
   }

        public function finance_acc(){

                $data['projectId'] = $this->uri->segment(3);

                $this->load->model('main_model');
                $data['notification'] = $this->main_model->notification_data();

                $this->load->view('pages/components/Header');
                $this->load->view('pages/components/navigation', $data);
                $this->load->view('pages/account/finance_acc', $data);
                $this->load->view('pages/components/footer');

        }


        public function download_plan_file(){

                $pid = $this->uri->segment(3);
                $this->load->model('main_model');
                $this->main_model->download_plan_file($pid);
        }

        public function project_detail(){
                $ID = $this->uri->segment(3);
                $this->load->model('main_model');
                $data['project_detail'] = $this->main_model->project_detail($ID);

                $data['creater'] = $this->main_model->get_user();

                $data['notification'] = $this->main_model->notification_data();
                $data['managers'] = $this->main_model->get_managers();

                $data['recommendation'] = $this->main_model->recommendation($ID);

                $this->load->view('pages/components/Header');
                $this->load->view('pages/components/navigation', $data);
                $this->load->view('pages/project_detail', $data);
                $this->load->view('pages/components/footer');

        }

        public function deleteNotification(){
                $this->load->model('main_model');
                $this->main_model->deleteNotification();
        }
        


}


?>
