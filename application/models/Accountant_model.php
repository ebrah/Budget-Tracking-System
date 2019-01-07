<?php

  class Accountant_model extends CI_Model
  {
    public function finance($budget_id, $project_id){
        $accountant = $this->session->user_id;
         $this->db->set('financed', $accountant );
         $this->db->where('budget_id', $budget_id);
         $success = $this->db->update('project_budget');


                //notification
                $users = $this->db->get('users');
                if($users->num_rows() > 0){
                  foreach ($users->result() as $user) {
                    $this->createNotification(
                      $user->user_id,
                      $project_id,
                      '1 Budget get financed for project titled:',
                      '1 Budget get financed for project titled:',
                      '1 Budget get financed for project titled:',
                      '1 Budget get financed for project titled:',
                      '1 Budget get financed for project titled:'
                    );
                  }
                }

         if($success){
             $this->session->set_flashdata('success', 'budget financed.');
            }else{
                $this->session->set_flashdata('fail', 'fail to finance budget');
            }

        redirect(base_url()."public/index.php/budget/edit_delete/".$project_id);
         

    }

    public function revert($budget_id, $project_id){

         $accountant = $this->session->user_id;
         $this->db->set('financed', NULL );
         $this->db->where('budget_id', $budget_id);
         $success = $this->db->update('project_budget');

         if($success){
            $this->session->set_flashdata('success', 'budget unfinanced again.');
        }else{
            $this->session->set_flashdata('fail', 'fail to unfinance budget.');
        }

                    //notification
                    $users = $this->db->get('users');
                    if($users->num_rows() > 0){
                      foreach ($users->result() as $user) {
                        $this->createNotification(
                          $user->user_id,
                          $project_id,
                          '1 budget unfinanced for project titled:',
                          '1 budget unfinanced for project titled:',
                          '1 budget unfinanced for project titled:',
                          '1 budget unfinanced for project titled:',
                          '1 budget unfinanced for project titled:'
                        );
                      }
                    }

        redirect(base_url()."public/index.php/budget/edit_delete/".$project_id);

    }

    public function activateAccountant($acc_id){
         $this->db->set('active', TRUE);
         $this->db->where('user_id', $acc_id);
         $success = $this->db->update('users');
         if($success){
            $this->session->set_flashdata('success', 'New accountant activated to update or finance budgets submited for specific project.');
            redirect(base_url()."public/index.php/accountant/accountants");
        }else{
            $this->session->set_flashdata('fail', 'fail to activate accountant');
            redirect(base_url()."public/index.php/accountant/accountants");
        }
    }
    public function deActivateAccountant($acc_id){
         $this->db->set('active', FALSE);
         $this->db->where('user_id', $acc_id);
         $success = $this->db->update('users');
         if($success){
            $this->session->set_flashdata('success', 'Accountant deactivated!, can\'t finance any project anymore.');
            redirect(base_url()."public/index.php/accountant/accountants");
        }else{
            $this->session->set_flashdata('fail', 'fail to deactivate accountant');
            redirect(base_url()."public/index.php/accountant/accountants");
        }
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