<?php

  class Budget_model extends CI_Model
  {
           //budget
    public function Submit_budget($date, $description, $specification, $unit, $quantity, $price, $tprice, $projectId){

        $usr = $this->session->userdata('user_id');

        $this->db->set(array(
           'project_id' => $projectId,
           'description' => $description,
           'specification' => $specification,
           'unit' => $unit,
           'quantity' => $quantity,
           'unit_price' => $price,
           'total_price' => $tprice,
           'date' => $date,
           'approved' => ''
        ));
        $c = $this->db->insert('project_budget');

        if( $c ){
          $this->session->set_flashdata('success', 'project budget successfuly submited.');
        }else{
          
          $this->session->set_flashdata('fail', 'Ooh! something went wrong.');
        }
              //notification
              $users = $this->db->get('users');
              if($users->num_rows() > 0){
                foreach ($users->result() as $user) {
                  $this->createNotification(
                    $user->user_id,
                    $projectId,
                    'new budget for project:',
                    'new budget for project:',
                    'new budget for project:',
                    'new budget for project:'
                   
                  );
                }
             }

        redirect(base_url()."public/index.php/budget/edit_delete/".$projectId);
  }

  public function budgets($projectId){
       //get files for this budget.

       $this->db->where('project_id', $projectId);
       $this->db->order_by('budget_id DESC');
       $query = $this->db->get('project_budget');

       $this->db->select('file_budget');
       $this->db->where('project_id', $projectId);

       $file = $this->db->get('project');

       $f = '';
       if($file->num_rows() > 0){
         foreach ($file->result() as $fil) {
           $f = $fil->file_budget;
         }
       }

       return array(
         "file" => $f,
         "budgets" => $query
        );

  }


  public function get_budgetApproved(){
        
    $query = $this->db->get('project_budget');

    $approves = [];

    if($query->num_rows() > 0){
        foreach($query->result() as $q ){
           $approves[ $q->project_id ] = $q->approved;
        }
    }

    return $approves;
 }


public function get_budget($budgetId){

   $this->db->where('budget_id', $budgetId);
   $query = $this->db->get('project_budget');
   $budget = array();
   if($query->num_rows() > 0){
     foreach ($query->result() as $q) {
       $budget['budget_id'] = $q->budget_id;
       $budget['project_id'] = $q->project_id;
       $budget['description'] = $q->description;
       $budget['specification'] = $q->specification;
       $budget['quantity'] = $q->quantity;
       $budget['unit'] = $q->unit;
       $budget['price'] = $q->unit_price;
       $budget['tprice'] = $q->total_price;
       $budget['date'] = $q->date;
     }
   }

   return $budget;

}

public function project_budget_edit($date, $description, $specification, $unit, $quantity, $price, $tprice,$budgetId, $projectId){
 
 $this->db->set(array(
   'description' => $description,
   'specification' => $specification,
   'unit' => $unit,
   'quantity' => $quantity,
   'unit_price' => $price,
   'total_price' => $tprice,
   'date' => $date,
 ));
 $this->db->where('budget_id', $budgetId);
 $success = $this->db->update('project_budget');

 if($success){
   $this->session->set_flashdata('success', 'Woow!. You updated a budget. success');
   redirect(base_url().'public/index.php/budget/edit_delete/'.$projectId);
 }else{
  $this->session->set_flashdata('fail', 'fail!. to update a budget.');
  redirect(base_url().'public/index.php/budget/edit_delete/'.$projectId);
 }

}

public function project_budget_delete($budget_id, $projectId){

  $this->db->where('budget_id', $budget_id);
  $success = $this->db->delete('project_budget');

  if($success){
    $this->session->set_flashdata('success', 'successful budget deleted.');
    redirect(base_url().'public/index.php/budget/edit_delete/'.$projectId);
  }else{
   $this->session->set_flashdata('fail', 'fail!. to delete a budget.');
   redirect(base_url().'public/index.php/budget/edit_delete/'.$projectId);
  }
}

public function budget_file($project_id, $filename){
  $this->db->set('file_budget', $filename);
  $this->db->where('project_id', $project_id);
  $success = $this->db->update('project');

  if($success){
    $this->session->set_flashdata('success', 'budget file successful uploaded.');
    redirect(base_url().'public/index.php/budget/edit_delete/'.$project_id);
  }else{
   $this->session->set_flashdata('fail', 'fail!, to upload file.');
   redirect(base_url().'public/index.php/budget/edit_delete/'.$project_id);
  }

}

public function download_budget_file($id){

  $this->db->select('file_budget');
  $this->db->where('project_id', $id);
  $file_name = $this->db->get('project');
  $get_name;
  if($file_name->num_rows() > 0){
    foreach ($file_name->result() as $file) {
        $get_name = $file->file_budget;
    }
  }

  $data = file_get_contents(base_url().'public/uploads/'.$get_name);

  force_download('project_report.pdf', $data ); 

}

// public function get_project_budget(){

//     $this->db->select('project.project_id, project.project_name, project.file_budget, project_budget.description, project_budget.specification, project_budget.unit, project_budget.quantity, project_budget.unit_price, project_budget.total_price, project_budget.date, project_budget.approved');
//     $this->db->from('project');
//     $this->db->join('project_budget', 'project_budget.project_id = project.project_id', 'left');
//     $query = $this->db->get();

//     $budget = array();
//     $budget['project_id'] = '';
//     $budget['project_name'] = '';
//     $budget['file_budget'] = '';

//     if($query->num_rows() > 0){

//       foreach ($query->result() as $bg) {
//         if(empty( $budget['project_id'] )){
//              $budget['project_id'] = $bg->project_id;
//         }
//         if(empty( $budget['project_name'] )){
//              $budget['project_name'] = $bg->project_name;
//         }
//         if(empty( $budget['file_budget'] )){
//              $budget['file_budget'] = $bg->file_budget;
//         }

//         $budget['budgets'][] =  array(
//           "description" => $bg->description,
//           "specification" => $bg->specification,
//           "unit" => $bg->unit,
//           "quantity" => $bg->quantity,
//           "unit_price" => $bg->unit_price,
//           "total_price" => $bg->total_price,
//           "date" => $bg->date,
//           "approved" => $bg->approved
//         );
          
//       }
//     }

  //   return $budget;

  // }



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