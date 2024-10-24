<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();	
	}

	public function update_password($data){
		$password = sha1($data['new_password']);
		$this->db->where('username','admin');
		$this->db->update('administrator',array('password'=>$password));
	}
	
	public function check_password($password){
		$query = $this->db->query("SELECT * FROM administrator WHERE username = 'admin' AND password = '".sha1($this->db->escape_str($password))."'");
		if($query->num_rows()){
			return true;
		}else{
			return false;
		}
	}
}