<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();	
	}
	
	
	/*******************************************************************************************************************************************/
	/**********************************************		CMS FUNCTIONS 	********************************************************************/
	
	function register($post){
		$post['created'] = time();
		$post['modified'] = time();
		$this->db->insert('users',$post);
		$inserted_id = $this->db->insert_id();
		return $inserted_id;
	}

	function check_login($email,$password){
		
		$query = $this->db->query("SELECT * FROM users WHERE email = '".$this->db->escape_str($email)."' AND password = '".sha1($this->db->escape_str($password))."' AND is_verified = 1 AND status = 1");
		if($query->num_rows()){
			$data = $query->row();
			$this->session->set_userdata('user_login',1);
			$this->session->set_userdata('user',$data);
			return true;
		}else{
			return false;
		}
		
	}

	
	function social_login_user($email){
		/* $this->db->where('primary_email_address',$post['email']);
		$this->db->where('password',$post['password']);
		$this->db->update('business',array('is_verified'=>1,'validate_string'=>''));
		return true; */
		$query = $this->db->query("SELECT * FROM business WHERE primary_email_address = '".$email."'");
		$res_arr					=	array();
		if($query->num_rows()){
			$response_status		=	true;
			$res_arr['status']		=	$response_status;
			$res_arr['response']	=	$query->result_array();
			return $res_arr;
		}else{
			$response_status		=	false;
			$res_arr['status']		=	$response_status;
			$res_arr['response']	=	array();
			return $res_arr;
		}
	}
	
	
	function forget_password_request($post){
		$this->db->where('primary_email_address',$post['email']);
		$this->db->update('business',array('validate_string'=>$post['validate_string']));
		return true;
	}
	
	function validate_forget_password_request($validate_string){
		$query = $this->db->query("SELECT * FROM business WHERE validate_string = '".$validate_string."'");
		$res_arr					=	array();
		if($query->num_rows()){
			return true;
		}else{
			return false;
		}
	}
	
	function reset_password($post){
		$this->db->where('validate_string',$post['validate_string']);
		$this->db->update('business',array('validate_string'=>'','password'=>$post['password']));
		return true;
	}
	
	function update_user($post){
		$this->db->where('id',$post['user_id']);
		$this->db->update('business',array('image'=>$post['image'],'register_name'=>$post['register_name']));
		return true;
	}
	
	
	function update_password($post){
		$query			=	$this->db->query("SELECT * FROM users WHERE id = '".$post['user_id']."' and password = '".$post['old_password']."'");
		$res_arr		=	array();
		if($query->num_rows()){
			$this->db->where('id',$post['user_id']);
			$this->db->update('users',array('password'=>$post['new_password']));
			return true;
		}else{
			return false;
		}
	}
	
	function verify_user($validate_string){
		$this->db->where('validate_string',$validate_string);
		$this->db->update('business',array('is_verified'=>1,'validate_string'=>''));
		return true;
	}
	
	function fav_deal($userid){

		$query = $this->db->query("SELECT a.deal_id, a.user_id, b.*, c.name as restaurantname, c.slug as restaurantslug, c.image as restaurantimage, c.address as restaurantaddress, c.contactnumber as restaurantcontactnumber FROM deal_like as a LEFT JOIN deal as b ON a.deal_id = b.id LEFT JOIN restaurant as c ON b.restaurant_id = c.id WHERE a.user_id = '".$userid."'");
		$res_arr =	array();
		if($query->num_rows()){
			$response_status		=	true;
			$res_arr['status']		=	$response_status;
			$res_arr['response']	=	$query->result_array();
			return $res_arr;
		}else{
			$response_status		=	false;
			$res_arr['status']		=	$response_status;
			$res_arr['response']	=	array();
			return $res_arr;
		}
	}

}