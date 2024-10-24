<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slider_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();	
	}
	
	/****************************************************************************/
	/***********************		SLIDER FUNCTIONS 	*************************/
	
	function add_slider_image($image){
		$this->db->insert('slider',array("image"=>$image, "status"=>1));
	}
	

	function getImages(){
		$q = "SELECT * FROM slider";
		$query = $this->db->query($q);
		return $query->result();
	}
	
	public function get_image_info($image_id){
		$q = "SELECT * 
				FROM slider
				where id = ". $image_id;
		$query = $this->db->query($q);
		return $query->row();
	}

	function update_image($page_id,$post){
		$this->db->where('id',$page_id);
		$this->db->update('slider',$post);
		return true;
	}
	
	function status_change($id, $status, $table){
		
		$post['status'] 		= 	$status;
		$this->db->where('id', $id);
		$this->db->update($table, $post);
		return true;
	
	}
	/****************************************************************************/
	/**********************		COMMON FUNCTIONS 	*****************************/
	
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
	
	/****************************************************************************/
	/******************		SETTING FUNCTIONS 	*********************************/
	
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
	
	/*******************************************************************************************************************************************/
	/**********************************************		OTHER FUNCTIONS 	********************************************************************/
	
	function delete($where,$table){
		$this->db->delete($table, $where); 
	}
	
	
	
}