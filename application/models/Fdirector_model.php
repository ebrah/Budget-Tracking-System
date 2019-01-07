<?php
 class Fdirector_model extends CI_Model
 {
     public function approve($project_id){
         $user = $this->session->user_id;
         $this->db->set('approved', $user);
         $this->db->where('project_id', $project_id);
         $success = $this->db->update('project');

         if($success){
             $this->session->set_flashdata('success', 'Project approved.');
          }else{
                $this->session->set_flashdata('fail', 'fail to approved project.');
          }

               //notification
        $users = $this->db->get('users');
        if($users->num_rows() > 0){
        foreach ($users->result() as $user) {
            $this->createNotification(
            $user->user_id,
            $project_id,
            'Project approved titled:',
            'Project approved titled:',
            'Project approved titled:',
            'Project approved titled:'
            );
        }
       }
            //REDIRED...
            redirect(base_url()."public/index.php/main/Fdirector");
     }

     public function ignore($project_id, $recommendation){
          $user = $this->session->user_id;

          $this->db->set('approved', -1);
          $this->db->where('project_id', $project_id);
          $this->db->update('project');

         $success = $this->db->insert('rejected_project', array(
              'project_id' => $project_id,
              'recommendation' => $recommendation,
              'who' => $user
          ));

          if($success){
            $this->session->set_flashdata('success', 'Project rejected.');
            }else{
             $this->session->set_flashdata('fail', 'fail to reject Project.');
         }

              //notification
                $users = $this->db->get('users');
                if($users->num_rows() > 0){
                foreach ($users->result() as $user) {
                    $this->createNotification(
                    $user->user_id,
                    $project_id,
                    '',
                    'Project rejected title:',
                    'Project rejected title:',
                    'Project rejected title:',
                    'Project rejected title:'
                    );
                }
             }
         //redirect
         redirect(base_url()."public/index.php/main/Fdirector");
          
     }

     public function approve_budget($budget_id, $project_id){
         $userId = $this->session->user_id;
         $userOcc = $this->session->qualification; 
         $this->db->set('approved',  $userId);
         $this->db->where('budget_id', $budget_id);
         $success = $this->db->update('project_budget');

         if($success){
            $this->session->set_flashdata('success', 'budget approved.');
            }else{
             $this->session->set_flashdata('fail', 'fail to approve budget.');
         }

                             //notification
                             $users = $this->db->get('users');
                             if($users->num_rows() > 0){
                             foreach ($users->result() as $user) {
                                 $this->createNotification(
                                 $user->user_id,
                                 $project_id,
                                 'Finance director approved budget for project titled:',
                                 'Finance director approved budget for project titled:',
                                 'Finance director approved budget for project titled:',
                                 'Finance director approved budget for project titled:',
                                 'Finance director approved budget for project titled:'
                                 );
                             }
                           }
         //redirect
         redirect(base_url()."public/index.php/budget/edit_delete/".$project_id);

     }

     public function reject_budget($budget_id, $project_id, $recommendation){
         $this->db->set(array(
             'approved' => -1,
             'recommendation' => $recommendation,
             'who' => $this->session->firstname,
             'qualification' => $this->session->qualification,
         ));

         $this->db->where('budget_id', $budget_id);
         $success = $this->db->update('project_budget');

         if($success){
            $this->session->set_flashdata('success', 'budget rejected.');
            }else{
             $this->session->set_flashdata('fail', 'fail to reject budget.');
         }

                        //notification
            $users = $this->db->get('users');
            if($users->num_rows() > 0){
            foreach ($users->result() as $user) {
                $this->createNotification(
                $user->user_id,
                $project_id,
                '',
                'Budget rejected for project titled:',
                'Budget rejected for project titled:',
                'Budget rejected for project titled:',
                'Budget rejected for project titled:'
                );
            }
          }
         //redirect
         redirect(base_url()."public/index.php/budget/edit_delete/".$project_id);
         
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
 


 }
 
?>