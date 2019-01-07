<?php
class Hoc_model extends CI_Model 
{
    public function verify($project_id){
      $id = $this->session->user_id;
      $this->db->set('verified', $id);
      $this->db->where('project_id', $project_id);
      $success =  $this->db->update('project');
      if($success){
          $this->session->set_flashdata('success', 'project verified');
      }else{
          $this->session->set_flashdata('fail', 'fail to verify project.');
      }

                //notification
        $users = $this->db->get('users');
        if($users->num_rows() > 0){
        foreach ($users->result() as $user) {
            $this->createNotification(
            $user->user_id,
            $project_id,
            'Project verified titled:'
            );
        }
       }
       
      redirect(base_url()."public/index.php/main/Hoc");
    }

    public function ignore($project_id, $recommend){

        $this->db->set('verified', -1);
        $this->db->where('project_id', $project_id);
        $this->db->update('project');

        $result = $this->db->insert('rejected_project', array(
            'project_id' => $project_id,
            'recommendation' => $recommend
        ));

        if($result){
            $this->session->set_flashdata('success', 'project rejected.');
        }else{
            $this->session->set_flashdata('fail', 'fail to reject project.');
        }

             //notification
            $users = $this->db->get('users');
            if($users->num_rows() > 0){
            foreach ($users->result() as $user) {
                $this->createNotification(
                $user->user_id,
                $project_id,
                'Project rejected, titled: ',
                'Project rejected titled: ',
                'Project rejected titled:'
                );
            }
          }



        redirect(base_url()."public/index.php/main/Hoc");

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