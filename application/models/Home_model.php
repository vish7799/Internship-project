<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();	
	}
	
	/***********************************************************************************/
	/**********************		HOME FUNCTIONS 	****************************************/
	
	function get_homepage_slider(){
		$q 		= 	"SELECT slider.* FROM slider order by slider.id desc";	
		$query 	= 	$this->db->query($q);
		return $query->result();
	}
	
	function get_category(){
		$q 		= 	"SELECT product_categories.* FROM product_categories where status = '1' and parent = '0' order by rand()";	
		$query 	= 	$this->db->query($q);
		return $query->result();
	}
	
	function get_feature_products(){
		$q 					= 	"SELECT products.* FROM products where is_featured = '1' and status = '1' order by products.id desc limit 4";
		$query 				= 	$this->db->query($q);
		return $query->result();
	}
	
	function get_testimonials(){
		$q 					= 	"SELECT testimonials.* FROM testimonials where status = '1' order by rand() limit 8 ";
		$query 				= 	$this->db->query($q);
		return $query->result();
	}
	
	function get_homepage_blogs(){
		$q 		= 	"SELECT blogs.* FROM blogs where status = '1' order by blogs.created_date desc limit 0,3";	
		$query 	= 	$this->db->query($q);
		return $query->result();
	}
	
	function get_homepage_faqs(){
		$q 		= 	"SELECT faq.* FROM faq order by RAND() limit 0,5";	
		$query 	= 	$this->db->query($q);
		return $query->result();
	}
	
	function get_new_products(){
		$q 					= 	"SELECT products.* FROM products where status = '1' order by products.id desc limit 8";
		$query 				= 	$this->db->query($q);
		return $query->result();
	}
	
	function get_homepage_category(){
		$q 		= 	"SELECT product_categories.* FROM product_categories order by rand() limit 0, 3";	
		$query 	= 	$this->db->query($q);
		return $query->result();
	}
	
}