<?php

  class Main_model extends CI_Model{


      public function register_user( $fname, $lname, $usrname, $pass, $vpass, $position, $gender, $phone ){

          $salt = $this->salt();

          $hashedPassword = $this->makePassword($pass, $salt);

           $data = array(
             'firstname' => $fname,
             'lastname' => $lname,
             'gender' => $gender,
             'phone' => $phone,
             'qualification' => $position,
             'username' => $usrname ,
             'password' => $hashedPassword,
             'salt' =>  $salt
           );

           if($this->db->insert("users", $data)){
              $this->session->set_flashdata('success', 'User successful registered');
              if($this->session->user_id){
                redirect(base_url()."public/index.php/main/admin");
              }else{
                redirect(base_url()."public/index.php/main/registerAdmin");
              }
              
           };

      }

      //chang passwd
      public function changePassword($currenPassword, $newPassword){
        $salt = $this->salt();
        $hashedPassword = $this->makePassword($currenPassword, $salt);

        $nwHashedPss = $this->makePassword($newPassword, $salt);

        // echo 'originHashed   '.$hashedPassword;
        $usrId = $this->session->user_id;

        // a51ab9da338c3f7873499aa41a48eb739cca6897cf6a13c9413b170b9ee804a1

        // ad249303b8700f92c32452346cc1ba12c7798a09ab991a3288ed071eb083aefd


        $this->db->set(array('password' => $nwHashedPss, 'salt' => $salt));
        $this->db->where('user_id', $usrId);
        $check = $this->db->update('users');
        
        if($check){
             $this->session->set_flashdata('success', 'successful password changed');
            redirect(base_url()."public/index.php/main/admin");
         }else{
           $this->session->set_flashdata('fail', 'fail to reset password');
           redirect(base_url()."public/index.php/main/admin");
         }
     }



      //password hashing

      public function salt()
      {
        return password_hash("rasmuslerdorf", PASSWORD_DEFAULT);
      }

      public function makePassword($password = null, $salt = null)
      {
        if($password && $salt) {
          return hash('sha256', $password.$salt);
        }
        //  $key = $this->config->item('encryption_key');
        //  $salt1 =  hash('sha512', $key. $password);
        //  $salt2 = hash('sha512', $password . $key );
        //  return  hash('sha512', $salt1 . $password . $salt2);

      }

      //


      //get Registered user
      public function get_registered_user(){
         return $this->db->get('users');
      }


      //login user
      public function login_user($username, $password){

          //dehash.
          $this->db->select('salt');
          $this->db->where('username', $username );
          $result = $this->db->get('users');
          $usr = $result;
          $usrInfo = ($usr->num_rows() == 1) ? $usr : false;

          $passwd;
          if($usrInfo){
            foreach ($usrInfo->result() as $info ) {
              $passwd = $this->makePassword($password, $info->salt);
            }
           
          }

        $this->db->where(array('username' => $username, 'password' => $passwd));
        $user = $this->db->get('users');
        $usr_data;

        if($user->num_rows() > 0){

             foreach($user->result() as $usr){
               $usr_data = array(
                   'user_id' => $usr->user_id,
                   'firstname' => $usr->firstname,
                   'qualification' => $usr->qualification,
                   'active' => $usr->active
               );
             }
             
             $this->session->set_userdata($usr_data);

            //  echo $usr_data['qualification'];

             switch($usr_data['qualification']){

               case 'Quantity Surveyor' : redirect(base_url()."public/index.php/main/Qsurveyor");
                break;
               case 'Telecom Engineer' : redirect(base_url()."public/index.php/main/Pmanager");
                break;
               case 'Civil Engineer' : redirect(base_url()."public/index.php/main/Pmanager");
                break;
               case 'Electrical Engineer' : redirect(base_url()."public/index.php/main/Pmanager");
                break;
               case 'Head of Operation' : redirect(base_url()."public/index.php/main/Hoc");
                break;
               case 'Finance Director' : redirect(base_url()."public/index.php/main/Fdirector");
                break;
               case 'Accountant' : redirect(base_url()."public/index.php/main/Account");
                break;
               case 'System Admin' : redirect(base_url()."public/index.php/main/admin");
                break;

                default;

          }
        }else{
              $this->session->set_flashdata('fail', 'Invalid username or password ');
              redirect(base_url()."public");
        }

      }



    public function get_project_title($projectId){
        $this->db->select('project_name');
        $this->db->where('project_id', $projectId);
        $query = $this->db->get('project');
         $title = "";
        if($query->num_rows() > 0){
            foreach ($query->result() as $q) {
              $title = $q->project_name;
            }
        }

        return $title;
    }


    //redirect 
    public function direct(){

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

      return $way[$my_sess];
    }

    public function Submit_project($title, $description, $start_date, $end_date, $client, $contact, $my_file, $edit, $projectId){ 
  


      if($edit != 'FALSE'){

        $this->db->set( array(
            'project_name' => $title,
            'statement' => $description,
            'project_start' => $start_date,
            'project_end' => $end_date,
            'file_plan' => $my_file,
            'client' => $client,
            'contact' => $contact,
            'creater' => $this->session->userdata('user_id')
        ));
        $this->db->where('project_id', $projectId);
        $this->db->update('project');

        $this->session->set_flashdata('success', ' successful project edited.');

        //notification
        $users = $this->db->get('users');
        if($users->num_rows() > 0){
          foreach ($users->result() as $user) {
            $this->createNotification(
              $user->user_id,
              $projectId,
              'Poject Edited titled as',
              'Poject Edited titled as',
              'Poject Edited titled as',
              'Poject Edited titled as',
              'Poject Edited titled as',
              $title 
            );
          }
        }

        //redirect
        redirect(base_url().$this->direct());

      }else{

         $this->db->insert('project', array(
          'project_name' => $title,
          'statement' => $description,
          'project_start' => $start_date,
          'project_end' => $end_date,
          'file_plan' => $my_file,
          'client' => $client,
          'contact' => $contact,
          'creater' => $this->session->userdata('user_id')
        ));
         $proId = $this->db->insert_id();
         $this->session->set_flashdata('success', ' successful project submited wait for response.');

        //notification
        $users = $this->db->get('users');
        if($users->num_rows() > 0){
          foreach ($users->result() as $user) {
            $this->createNotification(
              $user->user_id,
              $proId,
              'New Project submited.',
              'New Project submited.',
              'New Project submited',
              'New project submited',
              'New Project submited',
              $title 
            );
          }
        }
          //redirect
         redirect(base_url().$this->direct());

      }

    }

    public function delete_project($projectId){


       $this->db->where('project_id', $projectId);
       $succ = $this->db->delete('project');
       if($succ){
         $this->session->set_flashdata('success', 'project deleted successful.');
       }else{
         $this->session->set_flashdata('fail', 'fail to delete project.');
       }
       
        //redirect
         redirect(base_url().$this->direct());

    }

      public function get_projects(){
             $this->db->order_by('project_id DESC');
         $p = $this->db->get('project');
         return $p;
      }


    public function get_user(){
        $arr_users = [];
        $usrs = $this->db->get('users');

        if($usrs->num_rows()>0){
          foreach ($usrs->result() as $usr ) {
               $arr_users[ $usr->user_id ] =  $usr->firstname .'  '. $usr->lastname;
          }

          return $arr_users;
        }

     }

    public function get_managers(){
  
        $where = "qualification = 'Telecom Engineer' OR qualification = 'Civil Engineer' OR qualification = 'Electrical Engineer' ";
        $this->db->where($where);
        $users = $this->db->get('users');

        return $users;

     }


    // //Hoc
    // public function rejection($project, $statement){

    //     $usr = $this->session->userdata('user_id');

    //     $this->db->set(array(
    //         'user_id' => $usr,
    //         'project_id' => $project,
    //         'description' => $statement
    //     ));

    //     $c = $this->db->insert('comment');

    //     $this->db->set(array(
    //         'Ho' => TRUE
    //     ));
    //         $this->db->where('project_id', $project);
    //     $b = $this->db->update('project');

    //     if( $c AND $b ){
    //       $this->session->set_flashdata('success', 'System will notify the requester of this project.');
    //       redirect(base_url()."public/index.php/main/Hoc");
    //     }else{

    //       $this->session->set_flashdata('fail', 'Ooh! to reject the project.');
    //       redirect(base_url()."public/index.php/main/Hoc");
    //     }

    // }


  //   public function editing($projectTitle, $description, $filename, $proj){

  //       $this->db->set(array(
  //          'project_name' => $projectTitle,
  //          'statement' => $description,
  //          'file_plan' => $filename,
  //          'Ho' => TRUE
  //       ));
  //            $this->db->where('project_id', $proj);
  //       $c = $this->db->update('project');

  //       if($c){
  //         $this->session->set_flashdata('success', 'Project successful edited.');
  //         redirect(base_url()."public/index.php/main/Hoc");
  //       }else{

  //         $this->session->set_flashdata('fail', 'Ooh! something went wrong.');
  //         redirect(base_url()."public/index.php/main/Hoc");

  //   }

  // }


  //  //accept the project
  //  public function submit_accept($id){
  //     $this->db->set(array(
  //         'accepted' => TRUE,
  //         'Ho' => TRUE
  //     ));
  //     $this->db->where('project_id', $id);
  //     $success = $this->db->update('project');

  //         if($success){
  //           $this->session->set_flashdata('success', 'WooW! you have accept the project.');
  //           redirect(base_url()."public/index.php/main/Hoc");
  //         }else{
  //           $this->session->set_flashdata('fail', 'Ooh! something went wrong.');
  //           redirect(base_url()."public/index.php/main/Hoc");
  //     }
  //  }

  //  public function finance($id){
  //       $this->db->set(array(
  //         'approved' => TRUE
  //     ));

  //     $this->db->where('project_id', $id);
  //     $success = $this->db->update('project_budget');

  //     $this->db->set(array(
  //         'Fd' => TRUE
  //     ));
  //     $this->db->where('project_id', $id);
  //     $this->db->update('project_budget');

  //         if($success){
  //           $this->session->set_flashdata('success', 'WooW! you have approved to finance the project .');
  //           redirect(base_url()."public/index.php/main/Fdirector");
  //         }else{
  //           $this->session->set_flashdata('fail', 'Ooh! something went wrong.');
  //           redirect(base_url()."public/index.php/main/Fdirector");
  //       }
      
  // }

    // public function finance_account($id, $amount){
    //   //finance account.
    //   $userId = $this->session->userdata('user_id');
    //    $this->db->set(array(
    //          'user_id' => $userId,
    //          'project_id' => $id,
    //          'amount' => $amount
    //    ));
    //    $success = $this->db->insert('account');

    //     if($success){
    //           $this->session->set_flashdata('success', 'Project successfuly financed.');
    //           redirect(base_url()."public/index.php/main/Account");
    //         }else{
    //           $this->session->set_flashdata('fail', 'Ooh! something went wrong.');
    //           redirect(base_url()."public/index.php/main/Account");
    //     }
    // }

    public function pay_trends(){
          
      //  $this->db->select('project.project_id, project.project_name, account.amount');
      //  $this->db->from('project');
      //  $this->db->join('account', 'account.project_id = project.project_id', 'left');
       $this->db->select_sum('total_price');
       $this->db->select('project_id, financed');
       $this->db->where('financed !=', '');
       $budgets = $this->db->get('project_budget');

       $this->db->select('project_id, project_name, project_start');
       $projects = $this->db->get('project');

       $project = array();
       if($projects->num_rows() > 0 ){
         foreach ($projects->result() as $pro) {
            $project[$pro->project_id] = array(
              'project_name' => $pro->project_name,
              'project_start' => $pro->project_start
            );
         }
       }
       
       return array(
           'budgets' => $budgets,
           'projects' => $project
       );

    }

    public function notification_data(){
      $currentUserId = $this->session->user_id;

      if($this->session->qualification == "Head of Operation"){
        $this->db->select('project_id,  mssg_Ho');
        $this->db->where(array('user_id' => $currentUserId, 'mssg_Ho !=' => ''));
      }
      if($this->session->qualification == "Quantity Surveyor"){
          $this->db->select('project_id, mssg_Qs');
          $this->db->where(array('user_id' => $currentUserId, 'mssg_Qs !=' => ''));
      }
      if($this->session->qualification == "Telecom Engineer" || $this->session->qualification == "Civil Engineer" || $this->session->qualification == "Electrical Engineer"){
          $this->db->select('project_id, mssg_Pm');
          $this->db->where(array('user_id' => $currentUserId, 'mssg_Pm !=' => ''));
      }
      if($this->session->qualification == "Finance Director"){
          $this->db->select('project_id, mssg_Fd');
          $this->db->where(array('user_id' => $currentUserId, 'mssg_Fd !=' => ''));
      }
      if($this->session->qualification == "Accountant"){
          $this->db->select('project_id, mssg_Acc');
          $this->db->where(array('user_id' => $currentUserId, 'mssg_Acc !=' => ''));
      }
      if($this->session->qualification == "System Admin"){
          $this->db->select('project_id, mssg_Qs');
          $this->db->where(array('user_id' => $currentUserId, 'mssg_Qs !=' => ''));
      }

      //$this->db->select('project_id, mssg_Pm, mssg_Qs, mssg_Ho, mssg_Fd, mssg_Acc');
     
      //$this->db->where(array('user_id' => $currentUserId, 'mssg_Ho !=' => ''));
      $this->db->order_by('id DESC');
      $query = $this->db->get('notification'); 

      //projects
      $output = $this->db->get('project');
      
      $projects =  array();
      if($output->num_rows() > 0){
        foreach ($output->result() as $out) {
            $projects[$out->project_id] = $out->project_name;
        }
      }

      return array (
          'notifications' => $query,
          'projects' => $projects
      );

    }

    public function download_plan_file($id){

      $this->db->select('file_plan');
      $this->db->where('project_id', $id);
      $file_name = $this->db->get('project');
       $get_name;
      if($file_name->num_rows() > 0){
        foreach ($file_name->result() as $file) {
            $get_name = $file->file_plan;
        }
      }


      $data = file_get_contents(base_url().'public/uploads/'.$get_name);

      force_download('project_report.pdf', $data, TRUE ); 

      //REDIRECT

    }

    public function project_detail($ID){
        $this->db->where('project_id', $ID);
        $query = $this->db->get('project');
        return $query;
    }

    public function project_file($projectId, $filename){
      $this->db->set('file_plan', $filename);
      $this->db->where('project_id', $projectId);
      $this->db->update(project);
      $this->session->set_flashdata('success', 'project file uploaded.');
      
      redirect(base_url()."public/index.php/project/project_detail/".$projectId);
    }

    public function get_edit_project($project_id){
      $this->db->where('project_id', $project_id);
      $query = $this->db->get('project');

      $project = array();

      if($query->num_rows() > 0){
        foreach ($query->result() as $q) {
          $project['project_id'] = $q->project_id;
          $project['project_name'] = $q->project_name;
          $project['start'] = $q->project_start;
          $project['end'] = $q->project_end;
          $project['description'] = $q->statement;
          $project['file'] = $q->file_plan;
          $project['client'] = $q->client;
          $project['contact'] = $q->contact;
        }
      }
      return $project;
    }

    public function switch_manager($project_id, $user){
       //$this->set('nmanager', )

       $this->db->set('creater', $user);
       $this->db->where('project_id', $project_id);
       $this->db->update('project');

        //notification
        $users = $this->db->get('users');
        if($users->num_rows() > 0){
          foreach ($users->result() as $user) {
            $this->createNotification(
              $user->user_id,
              $project_id,
              'Manger exchanged from project, title:'
            );
          }
        }

       redirect(base_url()."/public/index.php/project/project_detail/".$project_id);

    }

    public function recommendation($project_id){
       $query = $this->db->get_where('rejected_project', array( 'project_id' => $project_id ));
       return $query;
    }

    public function createNotification(
       $userId,
       $projectId,
       $pm = '',
       $qs = '',
       $ho = '',
       $fd = '',
       $acc = '',
       $pname = '' 
    
    ){

      $this->db->insert('notification', array(
          'user_id' => $userId,
          'project_id' => $projectId,
          'mssg_Pm' => $pm,
          'mssg_Qs' => $qs,
          'mssg_Ho' => $ho,
          'mssg_Fd' => $fd,
          'mssg_Acc' => $acc,
          'project_name' => $pname
        ));
    }


    public function deleteNotification(){
       $this->db->where('user_id', $this->session->user_id);
       $this->db->delete('notification');

       redirect(base_url().$this->direct());
    }

    public function activateUser($userId){
      $this->db->set('active', TRUE );
      $this->db->where('user_id', $userId);
      $this->db->update('users');
      $this->session->set_flashdata('success', 'user activated.');
      redirect(base_url().'public/index.php/main/admin');
    }

    public function deActivateUser($userId){
      $this->db->set('active', FALSE);
      $this->db->where('user_id', $userId);
      $this->db->update('users');
      $this->session->set_flashdata('fail', 'user deactivated .');
      redirect(base_url().'public/index.php/main/admin');
    }


  }
?>
