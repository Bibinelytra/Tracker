<?php 

class Auth Extends CI_Controller{


public function __construct(){

	parent::__construct();
}


public function index(){

	$this->load->view('admin/login');
}



 public function authenticate(){

  $userdata  = array('username' => $this->input->post('username'), 'password' => $this->input->post('password'));

  $user_id = $this->user_model->authenticate($userdata);
 

  if($user_id > 0){
  	
  	// create session variable
  $user = $this->user_model->find_by_id($user_id);
  if($user){
      $this->create_login_session($user);
      $this->session->set_flashdata('flash_message','You are logged in');
      $user_status = $this->session->userdata('uacc_status');
     

   if($user_status == 1)
     {
       redirect('projects-list');  
     }
    
     else{
       
       $result = array();
       $result['email_address'] = '';
       $result = $this->session->set_flashdata('error','Incorrect Login');  
       redirect('', $result);
         } 
       }

     }

     else{
        $result = array();
        $result['email_address'] = '';
        $result = $this->session->set_flashdata('error','Incorrect Login');  
        redirect('', $result);
     }
  
 }

 public function logout(){
   $this->session->sess_destroy();
   redirect('');

 }


 protected function create_login_session($user){

 	$session_data = array(
 		
 		'user_id'        => $user->id,
 		'username'  =>   $user->username,
 		'uacc_status'    => $user->uacc_status,
 		'image'          => $user->image,
 		'logged_in'      => TRUE,
 		'ip'             => $this->input->ip_address()
 		   );
  
  $this->session->set_userdata($session_data);

  }


private function _is_logged_in()
  {
    $session_data = $this->session->all_userdata();
    return (isset($session_data['user_id']) && $session_data['user_id'] > 0 && $session_data['logged_in'] == TRUE);
  }


}
?>