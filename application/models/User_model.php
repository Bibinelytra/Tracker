<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model{

  public function __construct(){
    parent::__construct();
    $this->table_name = 'user';
  }	

public function index(){

}

public function authenticate(array $data){

  $query = $this->db->get_where($this->table_name ,array('username' => $data['username'] , 'password' => hash('sha512',$data['password'])));

  
  $user_id = 0;
  if($query->num_rows() > 0){

      $user_id = $query->row()->id;
   }  

  return $user_id;

}

 public function find_by_id($data){
   $query = $this->db->get_where($this->table_name, array('id' => $data));
   return $query->row();
 }

}
?>