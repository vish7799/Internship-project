<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();	
	}
	
	function add_user($post){
		$this->db->insert('users',$post);
		$inserted_id = $this->db->insert_id();
		return $inserted_id;
	}
	
	function get_slug($slug, $cntr = 0){
		
		$query = $this->db->query("select count(*) as count from users where slug = '$slug'");
		if($query->row()->count > 0){
			$slug = str_replace("-" . $cntr,"", $slug);
			$new_slug = $slug . '-' . ($cntr + 1);
			$slug = $this->get_slug($new_slug,$cntr+1);
			
			return $slug;
		}else{
			return $slug;
		}
	}

}