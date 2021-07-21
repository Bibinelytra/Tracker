<?php 

class Projects Extends CI_Controller{


public function __construct(){

	parent::__construct();
}


public function index(){

  $result['projects'] = $this->db->order_by('pro_id','DESC')->get('projects')->result();
 	$this->load->view('admin/projects-list',$result);
}


public function search_project(){

$keyword = $this->input->post('keyword');
  
  $result['projects'] = $this->db->like('pro_name',$keyword)->or_like('pro_description',$keyword)->get('projects')->result();
  $this->load->view('admin/search-project',$result);  
}


public function search_issue($id){
$keyword = $this->input->post('keyword');
$status = $this->input->post('status');
$tracker = $this->input->post('tracker');

  $result['projects'] = $this->db->where('pro_id',$id)->get('projects')->row();

    $this->db->select('*');
    $this->db->from('issues');
    $this->db->where('project_id',$id);
    if(!empty($keyword)) {
        $this->db->group_start();
        $this->db->like('iss_tracker', $keyword);
        $this->db->or_like('iss_description', $keyword);
        $this->db->group_end();
    }
    $this->db->like('iss_tracker', $tracker);
     $this->db->like('status', $status);

    $result['issues'] = $this->db->get()->result();

  
  // $result['issues'] = $this->db->where('project_id',$id)->like('iss_tracker',$keyword)->or_like('iss_description',$keyword)->or_like('status',$status)->or_like('iss_tracker',$tracker)->get('issues')->result();
  $this->load->view('admin/search-issue',$result);  
}

public function add(){

 if($this->input->post()){
 
  $this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
 $this->form_validation->set_rules('name', 'Name','trim|required|alpha_numeric_spaces|is_unique[projects.pro_name]');  
  if($this->form_validation->run() == FALSE) {
  } else { 
  
 $project = array('pro_name' => $this->input->post('name'),
                  'pro_description' => $this->input->post('description'),    
                  'pro_status' => 1);

  $this->db->insert('projects',$project);
 
 $result = $this->session->set_flashdata('success','New Project Added Successfully');       
 redirect('add-project',$result);          
 }
} 
 $this->load->view('admin/add-project');

}


public function viewProjectDetails($id){

  $result['projects'] = $this->db->where('pro_id',$id)->get('projects')->row();
  $result['issues'] = $this->db->where('project_id',$id)->get('issues')->result();

  $this->load->view('admin/project-details',$result);
}



public function createIssue($id){

$result['id'] = $id;

 if($this->input->post()){
 
  $this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
 $this->form_validation->set_rules('tracker', 'Tracker','required'); 
  $this->form_validation->set_rules('description', 'Description','required');  
 
  if($this->form_validation->run() == FALSE) {
  } else { 

 
 $tracker = $this->input->post('tracker');
 $description = $this->input->post('description');

  $array = array('project_id' => $id, 'iss_tracker' => $tracker, 'iss_description' => $description, 'status' => 1);


 $search = $this->db->where($array)->get('issues')->row();

 if($search) {
   
     $result = $this->session->set_flashdata('error','Issue Already Exists');       
     redirect('create-issue/'.$id,$result);
 }

 else {
  
 $issues = array('project_id' => $id,
                  'iss_tracker' => $this->input->post('tracker'),    
                  'iss_description' => $this->input->post('description'),
                  'status' => 1
                );

  $this->db->insert('issues',$issues);
 
  $array2  = array('pro_status' => 1);
  $this->db->where('pro_id',$id)->update('projects',$array2);

 $result = $this->session->set_flashdata('success','New Issue Added Successfully');       
 redirect('create-issue/'.$id,$result);          
 }
} 
}
 $this->load->view('admin/add-issue',$result);

}



public function closeIssue($id){

 $result['id'] = $id;
 $project_id = $this->db->where('iss_id',$id)->get('issues')->row();
 $this->load->view('admin/close-issue',$result);
}


public function changeIssueStatus($id){
  
  $project_id = $this->db->where('iss_id',$id)->get('issues')->row()->project_id;
  $issue = array('status' => 0);
 $this->db->where('iss_id',$id)->update('issues',$issue);
 redirect('project-details/'.$project_id);

}


public function closeProject($id){
  
  $project = array('pro_status' => 0);
 
 $array = array('project_id' => $id, 'status' => 1);

 $issues = $this->db->where($array)->get('issues')->result();
 
 if(empty($issues)) {

 $this->db->where('pro_id',$id)->update('projects',$project);
 redirect('projects-list');

} else{
 
  $result = $this->session->set_flashdata('error','Project issues are not resolved');       
  redirect('project-details/'.$id,$result);
}

}



public function editIssue($id){
  

$project_id =  $this->db->where('iss_id',$id)->get('issues')->row()->project_id; 
$result['id'] = $id;


 if($this->input->post()){
 
  $this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
 $this->form_validation->set_rules('tracker', 'Tracker','required'); 
  $this->form_validation->set_rules('description', 'Description','required');  
 
  if($this->form_validation->run() == FALSE) {
  } else { 

 
 $tracker = $this->input->post('tracker');
 $description = $this->input->post('description');

  $array = array('project_id' => $project_id, 'iss_tracker' => $tracker, 'iss_description' => $description, 'status' => 1);


 $search = $this->db->where_not_in('iss_id',$id)->where($array)->get('issues')->row();

 if($search) {
   
     $result = $this->session->set_flashdata('error','Issue Already Exists');       
     redirect('edit-issue/'.$id,$result);
 }

 else {
  
 $issues = array('iss_tracker' => $this->input->post('tracker'),    
                  'iss_description' => $this->input->post('description'),
                );

  $this->db->update('issues',$issues);
  
  print_r($project_id);
  exit();

  $array2  = array('pro_status' => 1);
  $this->db->where('pro_id',$project_id)->update('projects',$array2);

 $result = $this->session->set_flashdata('success','Issue Details Updated Successfully');       
 redirect('create-issue/'.$project_id,$result);          
 }
} 

}
  $this->load->view('admin/edit-issue',$result);

}

}
?>