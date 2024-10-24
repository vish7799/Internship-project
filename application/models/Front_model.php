<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Front_model extends CI_Model {
	public function __construct(){
		parent::__construct();	
	}
	
	/****************************************************************************************/
	/******************************		FRONT FUNCTIONS 	*************************************/
	
	function get_category_product($slug, $post){
		
		if(!empty($post)){
			if($post['sorting'] == 'Name (A-Z)'){
				$orderby		=	"ORDER BY `products`.`title` ASC";
			}elseif($post['sorting'] == 'Name (Z-A)'){
				$orderby		=	"ORDER BY `products`.`title` DESC";
			}elseif($post['sorting'] == 'Price (Low to High)'){
				$orderby		=	"ORDER BY `products`.`offer_price` ASC";
			}elseif($post['sorting'] == 'Price (High to Low)'){
				$orderby		=	"ORDER BY `products`.`offer_price` DESC";
			}else{
				$orderby		=	"ORDER BY `products`.`id` DESC";
			}
			
		}else{
			$orderby		=	"ORDER BY `products`.`id` DESC";
		}
		
		$category_id		=	get_category_id_by_slug($slug);
		$q 					= 	"SELECT products.* FROM products where (category_id = '". $category_id ."' || parent_category_id = '". $category_id ."') and status = '1' ".$orderby;
		$query 				= 	$this->db->query($q);
		return $query->result();
	}
	
	function get_search_product($post){
		//pr($post);
		if(!empty($post)){
			if(isset($post['sorting'])){
				if($post['sorting'] == 'Name (A-Z)'){
					$orderby		=	"ORDER BY `products`.`title` ASC";
				}elseif($post['sorting'] == 'Name (Z-A)'){
					$orderby		=	"ORDER BY `products`.`title` DESC";
				}elseif($post['sorting'] == 'Price (Low to High)'){
					$orderby		=	"ORDER BY `products`.`offer_price` ASC";
				}elseif($post['sorting'] == 'Price (High to Low)'){
					$orderby		=	"ORDER BY `products`.`offer_price` DESC";
				}else{
					$orderby		=	"ORDER BY `products`.`id` DESC";
				}
			}else{
				$orderby		=	"ORDER BY `products`.`id` DESC";
			}
			if(isset($post['sub_cat']) && !empty($post['sub_cat'])){
				$where_sub_cat			=	'and (';
				foreach($post['sub_cat'] as $subcat){
					$where_sub_cat			.=	"category_id = '". $subcat ."' || ";
				}
				
				$where_sub_cat			=	substr_replace($where_sub_cat, '', -4);
				$where_sub_cat			.=	')';
			}else{
				$where_sub_cat			=	'';
			}
			
			if(isset($post['star_rating']) && !empty($post['star_rating'])){
				$where_star_rating			=	'and (';
				foreach($post['star_rating'] as $star_rating){
					$where_star_rating			.=	"star_rating = '". $star_rating ."' || ";
				}
				
				$where_star_rating			=	substr_replace($where_star_rating, '', -4);
				$where_star_rating			.=	')';
			}else{
				$where_star_rating			=	'';
			}
			
		}else{
			$where_sub_cat					=	"";
			$where_star_rating				=	"";
			$orderby		=	"ORDER BY `products`.`id` DESC";
		}
		
		$q 					= 	"SELECT products.* FROM products where status = '1' $where_sub_cat $where_star_rating $orderby";
		$query 				= 	$this->db->query($q);
		return $query->result();
	}
	
	function get_all_category(){
		$q 			= 	"SELECT * FROM product_categories where status = '1' and parent = '0' order by product_categories.id ASC";
		$query 		= 	$this->db->query($q);
		return $query->result();
	}
	
	function get_page_info($slug){
		$q 		= 	"SELECT * FROM cms where slug = '" . $slug."'";
		$query 	= 	$this->db->query($q);
		return $query->row();
	}
	
	function save_inquiry($post){
		$post['created']		=	time();
		$this->db->insert('inquiry',$post);
		$inquiry_id = $this->db->insert_id();
		return $inquiry_id;
	}
	
	function save_product_inquiry($post){
		$post['created']		=	time();
		$this->db->insert('product_inquiry',$post);
		$inquiry_id = $this->db->insert_id();
		return $inquiry_id;
	}
	
	function get_product_detail($slug){
		$product_id			=	get_product_id_by_slug($slug);
		$q 					= 	"SELECT products.* FROM products where products.id = '".$product_id."' order by products.id desc";
		$query 				= 	$this->db->query($q);
		return $query->row();
	}
		
	/*********************************************************/
	/******************		COMMON FUNCTIONS 	**************/
	
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

	
	
	/****************** BLOG Function *****************/
	
	function get_blogs($per_page, $page){
		$start 		= 	$page;
		$end 		= 	$per_page;
		$limit 		= 	" LIMIT $start, $end";
		$q 			= 	"SELECT blogs.* FROM blogs where status=1 order by blogs.created_date desc ". $limit;
		
		$query 	= 	$this->db->query($q);
		return $query->result();
	}
	
	function get_blog_count(){
		$q 		= 	"SELECT COUNT(*) AS blog_count  FROM blogs where status=1 order by blogs.created_date desc ";
		$query 	= 	$this->db->query($q);
		return $query->row()->blog_count;
	}
	
	function get_blogs_views_tracker($blog_id, $client_ip){
		
		$q 		= 	"SELECT * FROM blogs_views_tracker where blog_id='".$blog_id."' and user_ip_address = '".$client_ip."' ";
		$query 	= 	$this->db->query($q);
		$num 	= 	$query->num_rows();
		if($num > 0){
			$post['modified'] 		= 	time();
			$post['counter'] 		= 	$query->row()->counter + 1;
			$this->db->where('blog_id',$blog_id);
			$this->db->where('user_ip_address',$client_ip);
			$this->db->update('blogs_views_tracker',$post);
			return $post['counter'];
		}else{
			$post['created'] 				= 	time();
			$post['modified'] 				= 	time();
			$post['blog_id'] 				= 	$blog_id;
			$post['user_ip_address'] 		= 	$client_ip;
			$post['counter'] 				= 	'1';
			$this->db->insert('blogs_views_tracker',$post);
			$blogs_views_tracker_id 		= 	$this->db->insert_id();
			return $post['counter'];
		}
	}
	
	function get_blogs_category($category_id){
		$q 		= 	"SELECT blogs.* FROM blogs where category_id LIKE '%,".$category_id.",%' and status=1 order by blogs.created_date desc ";
		$query 	= 	$this->db->query($q);
		return $query->result();
	}
	
	function get_blogs_tags($tags_id){
		$q 		= 	"SELECT blogs.* FROM blogs where tag LIKE '%,".$tags_id.",%' and status=1 order by blogs.created_date desc ";
		$query 	= 	$this->db->query($q);
		return $query->result();
	}
	
	public function get_blogs_info($slug){
		$q 		= 	"SELECT * FROM blogs where slug = '". $slug."'";
		$query 	= 	$this->db->query($q);
		return $query->row();
	}
	
	function add_blog_comment($post){
		$post['created'] 		= 	time();
		$this->db->insert('blogs_comment',$post);
		$comment_id 				= 	$this->db->insert_id();
		return $comment_id;
	}
	
	function get_blogs_comment($blog_id){
		$q 		= 	"SELECT blogs_comment.* FROM blogs_comment where blog_id = '".$blog_id."' order by blogs_comment.created desc ";
		$query 	= 	$this->db->query($q);
		return $query->result();
	}
	
	/****************** BLOG Function *****************/
	
	function get_testimonails(){
		$q 			= 	"SELECT testimonials.* FROM testimonials order by testimonials.id desc ";
		$query 		= 	$this->db->query($q);
		return $query->result();
	}
	
	function get_faqs(){
		$q 			= 	"SELECT faq.* FROM faq order by faq.id desc ";
		$query 		= 	$this->db->query($q);
		return $query->result();
	}
	
	function get_like_product($category_id){
		$q 					= 	"SELECT products.* FROM products where products.category_id = '".$category_id."' ORDER BY RAND() limit 0,8";
		$query 				= 	$this->db->query($q);
		return $query->result();
	}
	
}