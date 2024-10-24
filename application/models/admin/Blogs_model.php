<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blogs_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();	
	}
	
	
	/**************************************************************************************/
	/***************		blogs FUNCTIONS 	*******************************************/
	
	function get_blogs($page = 1, $sorting="", $searchTerm="", $category_id="", $status=""){
		
		if($sorting == "TITLEASC"){
			$orderby		=	"ORDER BY `blogs`.`title` ASC";
		}elseif($sorting == "TITLEDESC"){
			$orderby		=	"ORDER BY `blogs`.`title` DESC";
		}elseif($sorting == "CBYASC"){
			$orderby		=	"ORDER BY `blogs`.`created_by` ASC";
		}elseif($sorting == "CBYDESC"){
			$orderby		=	"ORDER BY `blogs`.`created_by` DESC";
		}elseif($sorting == "CDATEASC"){
			$orderby		=	"ORDER BY `blogs`.`created_date` ASC";
		}elseif($sorting == "CDATEDESC"){
			$orderby		=	"ORDER BY `blogs`.`created_date` DESC";
		}elseif($sorting == "STATUSASC"){
			$orderby		=	"ORDER BY `blogs`.`status` ASC";
		}elseif($sorting == "STATUSDESC"){
			$orderby		=	"ORDER BY `blogs`.`status` DESC";
		}else{
			$orderby		=	"order by blogs.created_date DESC";
		}
		
		if($searchTerm == ""){
			$where1 		= 	"";
		}else{
			$where1 		= 	" and title LIKE '%".$searchTerm."%' ";
		}
		if($category_id==""){
			$where2 		= 	"";
		}else{
			$where2 		= 	" and category_id LIKE '%,".$category_id.",%' ";
		}
		if($status==""){
			$where3 		= 	"";
		}else{
			$where3 		= 	" and status = '".$status."'";
		}
		
		$start 		= 	($page-1) * get_setting('limit');
		$end 		= 	get_setting('limit');
		$limit 		= 	" LIMIT $start, $end";
		$q 			= 	"SELECT blogs.* FROM blogs where 1=1 " . $where1 . $where2 . $where3 . $orderby . $limit;
		
		$query 		= 	$this->db->query($q);
		return $query->result();
	}
	
	public function get_all_pages_count($sorting, $searchTerm, $category_id, $status){
		if($sorting == "TITLEASC"){
			$orderby		=	"ORDER BY `blogs`.`title` ASC";
		}elseif($sorting == "TITLEDESC"){
			$orderby		=	"ORDER BY `blogs`.`title` DESC";
		}elseif($sorting == "CBYASC"){
			$orderby		=	"ORDER BY `blogs`.`created_by` ASC";
		}elseif($sorting == "CBYDESC"){
			$orderby		=	"ORDER BY `blogs`.`created_by` DESC";
		}elseif($sorting == "CDATEASC"){
			$orderby		=	"ORDER BY `blogs`.`created_date` ASC";
		}elseif($sorting == "CDATEDESC"){
			$orderby		=	"ORDER BY `blogs`.`created_date` DESC";
		}elseif($sorting == "STATUSASC"){
			$orderby		=	"ORDER BY `blogs`.`status` ASC";
		}elseif($sorting == "STATUSDESC"){
			$orderby		=	"ORDER BY `blogs`.`status` DESC";
		}else{
			$orderby		=	"order by blogs.id DESC";
		}
		
		if($searchTerm == ""){
			$where1 		= 	"";
		}else{
			$where1 		= 	" and title LIKE '%".$searchTerm."%' ";
		}
		if($category_id==""){
			$where2 		= 	"";
		}else{
			$where2 		= 	" and category_id LIKE '%,".$category_id.",%' ";
		}
		if($status==""){
			$where3 		= 	"";
		}else{
			$where3 		= 	" and status = '".$status."'";
		}
		
		$q 			= 	"SELECT count(*) as count FROM blogs where 1=1 " . $where1 . $where2 . $where3 . $orderby;		
		$query 		= 	$this->db->query($q);
		return $query->row()->count;
	}
	
	public function get_blogs_info($page_id){
		$q 			= 	"SELECT * FROM blogs where id = ". $page_id;
		$query 		= 	$this->db->query($q);
		return $query->row();
	}
	
	public function get_parent_blog_category(){
		$q 			= 	"SELECT * FROM blogs_category where parent_id = '0' ORDER BY title";
		$query 		= 	$this->db->query($q);
		return $query->result();
	}
	
	function add_blogs($post){
		$post['created'] 		= 	time();
		$post['modified'] 		= 	time();
		$this->db->insert('blogs',$post);
		$blogs_id 				= 	$this->db->insert_id();
		return $blogs_id;
	}
	
	function delete_image($gallery_img_id){
		$img_info = $this->get_gallery_image($gallery_img_id);
		if(file_exists('./assets/photo/blogs/'.$img_info->image)){
			unlink('./assets/photo/blogs/'.$img_info->image);
		}
		$this->delete(array('id'=>$gallery_img_id),"gallery_cms");
	}
	
	function get_slug($slug, $cntr = 0){
		
		$query = $this->db->query("select count(*) as count from blogs where slug = '$slug'");
		if($query->row()->count > 0){
			$slug = str_replace("-" . $cntr,"", $slug);
			$new_slug = $slug . '-' . ($cntr + 1);
			$slug = $this->get_slug($new_slug,$cntr+1);
			
			return $slug;
		}else{
			return $slug;
		}
	}
	
	function update_blogs($page_id,$post){
		$post['modified'] 		= 	time();
		$this->db->where('id',$page_id);
		$this->db->update('blogs',$post);
		return true;
	}
	
	function get_categories(){
		$q 			= 	"SELECT blogs_category.* FROM blogs_category where status='1' order by blogs_category.id";
		$query 		= 	$this->db->query($q);
		return $query->result();
	}
	
	function get_tags(){
		$q 			= 	"SELECT blogs_tag.* FROM blogs_tag where status='1' order by blogs_tag.id";
		$query 		= 	$this->db->query($q);
		return $query->result();
	}
	
	
	function add_other_tag($post_tag, $cntr = 0){
		$title				=	$post_tag['title'];
		$query 				= 	$this->db->query("select count(*) as count from blogs_tag where title = '$title'");
		if($query->row()->count == 0){
			$this->db->insert('blogs_tag',$post_tag);
			$tag_id 				= 	$this->db->insert_id();
			return $tag_id;
		}else{
			$query 				= 	$this->db->query("select id from blogs_tag where title = '$title'");
			return $query->row()->id;
		}
		
	}
	
	function add_other_tag_blog($post_tag, $cntr = 0){
		$title				=	$post_tag['title'];
		$query 				= 	$this->db->query("select count(*) as count from blogs_tag where title = '$title'");
		if($query->row()->count == 0){
			$this->db->insert('blogs_tag',$post_tag);
			$tag_id 				= 	$this->db->insert_id();
			return $tag_id;
		}else{
			$query 				= 	$this->db->query("select id from blogs_tag where title = '$title'");
			return $query->row()->id;
		}
		
	}
	
	function add_other_category_blog($post_tag, $cntr = 0){
		$title				=	$post_tag['title'];
		$query 				= 	$this->db->query("select count(*) as count from blogs_category where title = '$title'");
		if($query->row()->count == 0){
			$this->db->insert('blogs_category', $this->db->escape_str($post_tag));
			$category_id 				= 	$this->db->insert_id();
			return $category_id;
		}else{
			$query 				= 	$this->db->query("select id from blogs_category where title = '$title'");
			return $query->row()->id;
		}
		
	}
	
	function add_blog_image($blog_id, $image){
		$post 				= 	array();
		$post['blog_id']	=	$blog_id;
		$post['image']		=	$image;
		$this->db->insert('blogs_images',$post);
	}
	
	function get_blog_images($blog_id){
		$q 				= 	"SELECT blogs_images.* FROM blogs_images where blog_id = $blog_id order by blogs_images.id";		
		$query 			= 	$this->db->query($q);
		return $query->result();
	}
	
	function get_image_name($image_id){
		$q = "SELECT image FROM blogs_images where id = $image_id";
		$query = $this->db->query($q);
		return $query->row()->image;
	}
	
	/********************** CATEGORY ************************************/
	
	function get_blogs_category($page = 1, $searchTerm="", $parent_id="", $status=""){
		
		if($searchTerm == ""){
			$where1 		= 	"";
		}else{
			$where1 		= 	" and title LIKE '%".$searchTerm."%' ";
		}
		if($parent_id==""){
			$where2 		= 	"";
		}else{
			$where2 		= 	" and parent_id = '".$parent_id."' ";
		}
		if($status==""){
			$where3 		= 	"";
		}else{
			$where3 		= 	" and status = '".$status."'";
		}
		
		$start 		= 	($page-1) * get_setting('limit');
		$end 		= 	get_setting('limit');
		$limit 		= 	" LIMIT $start, $end";
		$q 			= 	"SELECT blogs_category.* FROM blogs_category where 1=1 ". $where1 . $where2 . $where3 ." order by blogs_category.id" . $limit;
		
		$query 		= 	$this->db->query($q);
		return $query->result();
	}
	
	public function get_all_category_count($searchTerm, $parent_id, $status){
		
		if($searchTerm == ""){
			$where1 		= 	"";
		}else{
			$where1 		= 	" and title LIKE '%".$searchTerm."%' ";
		}
		if($parent_id==""){
			$where2 		= 	"";
		}else{
			$where2 		= 	" and parent_id = '".$parent_id."' ";
		}
		if($status==""){
			$where3 		= 	"";
		}else{
			$where3 		= 	" and status = '".$status."'";
		}
		$q 			= 	"SELECT count(*) as count FROM blogs_category where 1=1 ". $where1 . $where2 . $where3 ."  order by blogs_category.id";		
		$query 		= 	$this->db->query($q);
		return $query->row()->count;
	}
	
	public function get_blogs_category_info($page_id){
		$q 			= 	"SELECT * FROM blogs_category where id = ". $page_id;
		$query 		= 	$this->db->query($q);
		return $query->row();
	}
	
	function add_blogs_category($post){
		$post['created'] 		= 	time();
		$post['modified'] 		= 	time();
		$this->db->insert('blogs_category',$post);
		$blogs_id 				= 	$this->db->insert_id();
		return $blogs_id;
	}
	
	function get_category_slug($slug, $cntr = 0){
		
		$query = $this->db->query("select count(*) as count from blogs_category where slug = '$slug'");
		if($query->row()->count > 0){
			$slug = str_replace("-" . $cntr,"", $slug);
			$new_slug = $slug . '-' . ($cntr + 1);
			$slug = $this->get_slug($new_slug,$cntr+1);
			
			return $slug;
		}else{
			return $slug;
		}
	}
	
	function update_blogs_category($page_id,$post){
		$post['modified'] 		= 	time();
		$this->db->where('id',$page_id);
		$this->db->update('blogs_category',$post);
		return true;
	}
	
	/********************** TAG ************************************/
	
	function get_blogs_tag($page = 1, $searchTerm="", $status=""){
		
		if($searchTerm == ""){
			$where1 		= 	"";
		}else{
			$where1 		= 	" and title LIKE '%".$searchTerm."%' ";
		}
		if($status==""){
			$where3 		= 	"";
		}else{
			$where3 		= 	" and status = '".$status."'";
		}
		
		$start 		= 	($page-1) * get_setting('limit');
		$end 		= 	get_setting('limit');
		$limit 		= 	" LIMIT $start, $end";
		$q 			= 	"SELECT blogs_tag.* FROM blogs_tag where 1=1 ". $where1 . $where3 ."  order by blogs_tag.id" . $limit;
		
		$query 		= 	$this->db->query($q);
		return $query->result();
	}
	
	public function get_all_tag_count($searchTerm, $status){
		
		if($searchTerm == ""){
			$where1 		= 	"";
		}else{
			$where1 		= 	" and title LIKE '%".$searchTerm."%' ";
		}
		if($status==""){
			$where3 		= 	"";
		}else{
			$where3 		= 	" and status = '".$status."'";
		}
		
		$q 			= 	"SELECT count(*) as count FROM blogs_tag where 1=1 ". $where1 . $where3 ." order by blogs_tag.id";		
		$query 		= 	$this->db->query($q);
		return $query->row()->count;
	}
	
	public function get_blogs_tag_info($page_id){
		$q 			= 	"SELECT * FROM blogs_tag where id = ". $page_id;
		$query 		= 	$this->db->query($q);
		return $query->row();
	}
	
	function add_blogs_tag($post){
		$post['created'] 		= 	time();
		$post['modified'] 		= 	time();
		$this->db->insert('blogs_tag',$post);
		$blogs_id 				= 	$this->db->insert_id();
		return $blogs_id;
	}
	
	function get_tag_slug($slug, $cntr = 0){
		
		$query = $this->db->query("select count(*) as count from blogs_tag where slug = '$slug'");
		if($query->row()->count > 0){
			$slug = str_replace("-" . $cntr,"", $slug);
			$new_slug = $slug . '-' . ($cntr + 1);
			$slug = $this->get_slug($new_slug,$cntr+1);
			
			return $slug;
		}else{
			return $slug;
		}
	}
	
	function update_blogs_tag($page_id,$post){
		$post['modified'] 		= 	time();
		$this->db->where('id',$page_id);
		$this->db->update('blogs_tag',$post);
		return true;
	}
	
	/********************************************************************/
	
	function status_change($id, $status, $table){
		$post['status'] 		= 	$status;
		$this->db->where('id', $id);
		$this->db->update($table, $post);
		return true;
	}
	
	function get_active_category(){
		$q 			= 	"SELECT blogs_category.* FROM blogs_category where status = '1' order by blogs_category.id";
		$query 		= 	$this->db->query($q);
		return $query->result();
	}
	
	/********************************************************************************/
	/************************		COMMON FUNCTIONS 	*****************************/
	
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
	

	
	/*********************************************************************************/
	/********************		SETTING FUNCTIONS 	**********************************/
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