<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coupon_discount_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();	
	}
	
	function get_all_coupon_discount($page = 1,$searchTerm=""){
		if($searchTerm=="")
			$where 	= 	" WHERE 1=1 ";
		else
			$where 	= 	" WHERE ccode LIKE '$searchTerm%' ";
		
		$start 		= 	($page-1) * get_setting('limit');
		$end 		= 	get_setting('limit');
		$limit 		= 	" LIMIT $start, $end";
		$q 			= 	"SELECT coupon_discount.* FROM coupon_discount $where order by coupon_discount.id" . $limit;
		
		$query 		= 	$this->db->query($q);
		return $query->result();
	}
	
	public function get_all_coupon_discount_count($searchTerm=""){
		if($searchTerm=="")
			$where 	= 	" WHERE 1=1 ";
		else
			$where 	= 	" WHERE ccode LIKE '$searchTerm%' ";
		
		$q 			= 	"SELECT count(*) as count FROM coupon_discount $where ";		
		$query 		= 	$this->db->query($q);
		return $query->row()->count;
	}
	
	public function get_coupon_discount_info($id){
		$query 		= 	$this->db->query("SELECT * FROM coupon_discount where id = ". $id);
		return $query->row();
	}
	
	function add_coupon_discount($post){
 		$this->db->insert('coupon_discount',$post);
	}
	
	function update_coupon_discount($id,$post){
		$this->db->where('id',$id);
		$this->db->update('coupon_discount',$post);
		return true;
	}

	function delete($where,$table){
		$this->db->delete($table, $where); 
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
}