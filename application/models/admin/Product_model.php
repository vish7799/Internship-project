<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();	
	}
	
	public function get_all_category(){
		$q 		= 	"SELECT product_categories.* FROM product_categories where status='1' order by product_categories.id" ;
		$query 	= 	$this->db->query($q);
		return $query->result();
	}
	
	public function get_all_color(){
		$q 		= 	"SELECT color.* FROM color where status='1' order by color.id" ;
		$query 	= 	$this->db->query($q);
		return $query->result();
	}
	
	public function get_all_size(){
		$q 		= 	"SELECT size.* FROM size where status='1' order by size.id" ;
		$query 	= 	$this->db->query($q);
		return $query->result();
	}
	
	public function get_all_relationship(){
		$q 		= 	"SELECT relationship.* FROM relationship where status='1' order by relationship.id" ;
		$query 	= 	$this->db->query($q);
		return $query->result();
	}
	
	public function get_all_occasion(){
		$q 		= 	"SELECT occasion.* FROM occasion where status='1' order by occasion.id" ;
		$query 	= 	$this->db->query($q);
		return $query->result();
	}
	
	public function getsubcategory($catId){
		$q 		= 	"SELECT product_categories.* FROM product_categories where status='1' and  parent = '".$catId."' order by product_categories.id" ;
		$query 	= 	$this->db->query($q);
		return $query->result();
	}
	
	public function get_all_parent_category(){
		$q 		= 	"SELECT product_categories.* FROM product_categories where status='1' and  parent = '0' order by product_categories.id" ;
		$query 	= 	$this->db->query($q);
		return $query->result();
	}
	
	

	function get_all_products($page = 1, $searchTerm="", $category_id="", $sorting=""){
		
		if($sorting == "SASC"){
			$orderby		=	"ORDER BY `products`.`status` ASC";
		}elseif($sorting == "SDESC"){
			$orderby		=	"ORDER BY `products`.`status` DESC";
		}else{
			$orderby		=	"order by products.id desc";
		}
		
		if($searchTerm=="")
			$where1 = "";
		else
			$where1 = " and title LIKE '%".$searchTerm."%'";
		
		if($category_id=="")
			$where2 = "";
		else
			$where2 = " and category_id = '".$category_id."'";
		
		$start = ($page-1) * get_setting('limit');
		$end = get_setting('limit');
		$limit = " LIMIT $start, $end";
		$q = "SELECT products.* FROM products WHERE 1=1 $where1 $where2 " . $orderby . $limit;
		
		$query = $this->db->query($q);
		return $query->result();
	}
	
	public function get_all_products_count($searchTerm="", $category_id=""){
		if($searchTerm=="")
			$where1 = "";
		else
			$where1 = " and title LIKE '%".$searchTerm."%'";
		
		if($category_id=="")
			$where2 = "";
		else
			$where2 = " and category_id = '".$category_id."'";
		
		$q = "SELECT count(*) as count FROM products WHERE 1=1 $where1 $where2 order by products.id";		
		$query = $this->db->query($q);
		return $query->row()->count;
	}
	
	function get_product_categories(){
		$q = "SELECT product_categories.* FROM product_categories order by product_categories.id";		
		$query = $this->db->query($q);
		return $query->result();
	}
	
	function get_all_units($page = 1,$searchTerm=""){
		if($searchTerm=="")
			$where = " WHERE 1=1 ";
		else
			$where = " WHERE title LIKE '$searchTerm%' ";
		
		$start = ($page-1) * get_setting('limit');
		$end = get_setting('limit');
		$limit = " LIMIT $start, $end";
		$q = "SELECT units.* FROM units $where order by units.id" . $limit;
		
		$query = $this->db->query($q);
		return $query->result();
	}
	
	function add_product_image($product_id, $image){
		$post = array();
		$post['product_id']	=	$product_id;
		$post['image']		=	$image;
		$this->db->insert('product_images',$post);
	}
	
	function add_product_option($post){
		
		$this->db->insert('product_options',$post);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	
	function add_product($post){
		
		$post['created']	=	time();
		$post['modified']	=	time();
 		$this->db->insert('products',$post);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	
	public function get_product_info($product_id){
		$query = $this->db->query("SELECT * FROM products where id = ". $product_id);
		return $query->row();
	}
	
	public function get_product_option_by_product_id($product_id){
		$query = $this->db->query("SELECT * FROM product_options where product_id = ". $product_id);
		return $query->result();
	}
	
	function get_product_images($product_id){
		$q = "SELECT product_images.* FROM product_images where product_id = $product_id order by product_images.id";		
		$query = $this->db->query($q);
		return $query->result();
	}
	
	function update_product($product_id,$post){
		$this->db->where('id',$product_id);
		$this->db->update('products',$post);
		return true;
	}
	
	function get_image_name($image_id){
		$q = "SELECT image FROM product_images where id = $image_id";
		$query = $this->db->query($q);
		return $query->row()->image;
	}
	
	function get_slug_product($slug, $cntr = 0){
		
		$query = $this->db->query("select count(*) as count from products where slug = '$slug'");
		if($query->row()->count > 0){
			$slug = str_replace("-" . $cntr,"", $slug);
			$new_slug = $slug . '-' . ($cntr + 1);
			$slug = $this->get_slug_product($new_slug,$cntr+1);
			
			return $slug;
		}else{
			return $slug;
		}
	}

	function status_change($id, $status, $table){
		
		$post['status'] 		= 	$status;
		$this->db->where('id', $id);
		$this->db->update($table, $post);
		return true;
	
	}
	
	function featured_status_change($id, $status, $table){
		
		$post['is_featured'] 		= 	$status;
		$this->db->where('id', $id);
		$this->db->update($table, $post);
		return true;
	
	}
	/*******************************************************************************************************************************************/
	/**********************************************		COMMON FUNCTIONS 	********************************************************************/
	
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
	

	
	/*******************************************************************************************************************************************/
	/**********************************************		SETTING FUNCTIONS 	********************************************************************/
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