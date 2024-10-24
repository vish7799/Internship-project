<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cms_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();	
	}
	
	
	/*******************************************************************************************************************************************/
	/**********************************************		CMS FUNCTIONS 	********************************************************************/
	function get_pages($page = 1){
		$start 					= 	($page-1) * get_setting('limit');
		$end 					= 	get_setting('limit');
		$limit 					= 	" LIMIT $start, $end";
		$q 						= 	"SELECT cms.* FROM cms order by cms.id" . $limit;
		
		$query 					= 	$this->db->query($q);
		return $query->result();
	}
	
	public function get_all_pages_count(){
		$q 						= 	"SELECT count(*) as count FROM cms order by cms.id";		
		$query 					= 	$this->db->query($q);
		return $query->row()->count;
	}
	
	public function get_page_info($page_id){
		$q 						= 	"SELECT * FROM cms where id = ". $page_id;
		$query 					= 	$this->db->query($q);
		return $query->row();
	}
	
	function add_page($post){
		$post['created'] 		= 	time();
		$post['modified'] 		= 	time();
		$this->db->insert('cms',$post);
		$cms_id 				= 	$this->db->insert_id();
		return $cms_id;
	}
	
	function get_slug($slug, $cntr = 0){
		
		$query 					= 	$this->db->query("select count(*) as count from cms where slug = '$slug'");
		if($query->row()->count > 0){
			$slug 				= 	str_replace("-" . $cntr,"", $slug);
			$new_slug 			= 	$slug . '-' . ($cntr + 1);
			$slug 				= 	$this->get_slug($new_slug,$cntr+1);
			return $slug;
		}else{
			return $slug;
		}
	}
	
	function update_page($page_id,$post){
		$post['modified'] 		= 	time();
		$this->db->where('id',$page_id);
		$this->db->update('cms',$post);
		return true;
	}
	
	function delete($where,$table){
		$this->db->delete($table, $where); 
	}
	
	function status_change($id, $status, $table){
		$post['modified'] 		= 	time();
		$post['status'] 		= 	$status;
		$this->db->where('id', $id);
		$this->db->update($table, $post);
		return true;
	
	}
	
	/******************************************************************************/
	/**********************************		COMMON FUNCTIONS 	*******************/
	
	public function get_pagination($total, $page, $url){
		
		$total_page = ceil($total/get_setting('limit'));
		if($total_page == 1 || $total_page == 0){ 
			return '';
		}
		$pagination	=	'<ul class="pagination pagination-sm no-margin pull-right">';
		
		$first_page = $page-1;
		if($first_page<1){
			$first_page=1;
		}
		
		$pagination	.=	'<li><a href="'.$url.$first_page.'">&laquo;</a></li>';
		for($p=1;$p<=$total_page;$p++){
			$pagination	.=	'<li><a href="'.$url.$p.'">'.$p.'</a></li>';
		}
		
		$last_page = $page+1;
		if($last_page>$total_page){
			$last_page=$total_page;
		}
		$pagination	.=	'<li><a href="'.$url.$last_page.'">&raquo;</a></li>';							
		$pagination	.=	'</ul>';
		return $pagination;
	}
	
	/*****************************************************************************************************/
	/***************************************		SETTING FUNCTIONS 	**********************************/
	
	function get_settings(){
		$this->db->select('*');
		$this->db->from('settings');
		$query = $this->db->get();
		return $query->result();
	}
	
	function update_settings(){
		$post = $this->input->post();
		foreach($post as $field=>$value){
			$this->db->where('field',$field);
			$this->db->update('settings',array('value'=>$value));
		}
	}
	
}