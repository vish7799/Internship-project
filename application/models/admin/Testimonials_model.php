<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testimonials_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();	
	}
	
	/**********************************************************************************************************/
	/********************************		CMS FUNCTIONS 	***************************************************/
	
	function get_testimonials($page = 1){
		$start = ($page-1) * get_setting('limit');
		$end = get_setting('limit');
		$limit = " LIMIT $start, $end";
		$q = "SELECT testimonials.* FROM testimonials order by testimonials.id" . $limit;
		
		$query = $this->db->query($q);
		return $query->result();
	}
	
	public function get_all_pages_count(){
		$q = "SELECT count(*) as count FROM cms order by cms.id";		
		$query = $this->db->query($q);
		return $query->row()->count;
	}
	
	public function get_page_info($page_id){
		$q = "SELECT * FROM testimonials where id = ". $page_id;
		$query = $this->db->query($q);
		return $query->row();
	}
	
	public function get_gallery_images($page_id){
		$q = "SELECT * FROM gallery_cms where cms_id = ". $page_id;
		$query = $this->db->query($q);
		return $query->result();
	}
	
	function add_testimonials($post){
		$post['created'] = time();
		$this->db->insert('testimonials',$post);
		$testimonials_id = $this->db->insert_id();
		return $testimonials_id;
	}
	
	
	function delete_image($gallery_img_id){
		$img_info = $this->get_gallery_image($gallery_img_id);
		if(file_exists('./assets/photo/cms_gallery/'.$img_info->image)){
			unlink('./assets/photo/cms_gallery/'.$img_info->image);
		}
		$this->delete(array('id'=>$gallery_img_id),"gallery_cms");
	}
	
	
	function update_testimonial($page_id,$post){
		$this->db->where('id',$page_id);
		$this->db->update('testimonials',$post);
		return true;
	}
	
	function status_change($id, $status, $table){
		$post['status'] 		= 	$status;
		$this->db->where('id', $id);
		$this->db->update($table, $post);
		return true;
	}
	
	function delete($where,$table){
		$this->db->delete($table, $where); 
	}
	
	/*******************************************************************************************************/
	/**************************		COMMON FUNCTIONS 	****************************************************/
	
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
	
	/**********************************************************************************************************/
	/**********************************		SETTING FUNCTIONS 	***********************************************/
	
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