<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();	
	}
	//Login functions
	function check_login($username,$password){
		$query = $this->db->query("SELECT * FROM administrator WHERE username = '".$this->db->escape_str($username)."' AND password = '".sha1($this->db->escape_str($password))."'");
		if($query->num_rows()){
			$data = $query->row();
			$this->session->set_userdata('admin_login',1);
			$this->session->set_userdata('admin',$data);
			return true;
		}else{
			return false;
		}
		
	}
	
	/*********************************************************************************************/
	/***********************************		SETTING FUNCTIONS 	******************************/
	
	function get_settings(){
		$this->db->select('*');
		$this->db->from('settings');
		$query = $this->db->get();
		return $query->result();
	}
	
	function update_settings(){
		$post = $this->input->post();
		
		foreach($post as $field=>$value){
			$setting = $this->get_setting($field);
			
			if(!empty($setting)){
				$this->db->where('field',$field);
				$this->db->update('settings',array('value'=>$value));
			}else{
				$data=array();
				$data['field'] = $field;
				$data['value'] = $value;
				$this->db->insert('settings',$data);
			}
			
		}
		
	}
	
	function get_setting($field){
		$query = $this->db->query("SELECT * FROM settings where field = '". $field."'");
		return $query->row();
	}
	
	/***********************************************************************************/
	/*************************		CMS FUNCTIONS 	************************************/
	
	function get_all_pages($page = 1){
		$where = " WHERE 1=1 ";
		
		$start = ($page-1) * get_setting('limit');
		$end = get_setting('limit');
		$limit = " LIMIT $start, $end";
		$q = "SELECT cms.* FROM cms $where order by cms.id" . $limit;
		
		$query = $this->db->query($q);
		return $query->result();
	}
	public function get_all_pages_count(){
		
		$where = " WHERE 1=1 ";
		
		
		$q = "SELECT count(*) as count FROM cms $where order by cms.id";		
		$query = $this->db->query($q);
		return $query->row()->count;
	}
	
	public function get_page_info($page_id){
		$query = $this->db->query("SELECT * FROM cms where id = ". $page_id);
		return $query->row();
	}
	
	function add_page($post){
		$this->db->insert('cms',$post);
	}
	
	function update_page($page_id,$post){
		//update class
		$this->db->where('id',$page_id);
		$this->db->update('cms',$post);
		return true;
	}
	
	function get_slug($slug, $cntr = 0){
		
		$query = $this->db->query("select count(*) as count from cms where slug = '$slug'");
		if($query->row()->count > 0){
			$slug = str_replace("-" . $cntr,"", $slug);
			$new_slug = $slug . '-' . ($cntr + 1);
			$slug = $this->get_slug($new_slug,$cntr+1);
			
			return $slug;
		}else{
			return $slug;
		}
	}
	
	
	/*******************************************************************************************************************************************/
	/**********************************************		ROOMS FUNCTIONS 	********************************************************************/
	function get_all_rooms($page = 1){
		$where = " WHERE 1=1 ";
		
		$start = ($page-1) * get_setting('limit');
		$end = get_setting('limit');
		$limit = " LIMIT $start, $end";
		$q = "SELECT rooms.* FROM rooms $where order by rooms.id" . $limit;
		
		$query = $this->db->query($q);
		return $query->result();
	}
	public function get_all_rooms_count(){
		$where = " WHERE 1=1 ";
		$q = "SELECT count(*) as count FROM rooms $where order by rooms.id";
		$query = $this->db->query($q);
		return $query->row()->count;
	}
	
	public function get_room_info($room_id){
		$query = $this->db->query("SELECT * FROM rooms where id = ". $room_id);
		return $query->row();
	}
	
	function add_room($post){
		$this->db->insert('rooms',$post);
	}
	
	function update_room($room_id,$post){
		//update class
		$this->db->where('id',$room_id);
		$this->db->update('rooms',$post);
		return true;
	}
	
	function get_additional_images($room_id){
		$query = $this->db->query("SELECT * FROM room_images where room_id = ". $room_id);
		return $query->result();
	}
	
	function add_additional_images($post){
		$this->db->insert('room_images',$post);
	}
	
	
	/*******************************************************************************************************************************************/
	/**********************************************		Vendors FUNCTIONS 	********************************************************************/
	function get_all_vendors($page = 1,$searchTerm=""){
		if($searchTerm=="")
			$where = " WHERE 1=1 ";
		else
			$where = " WHERE first_name LIKE '$searchTerm%' OR last_name LIKE '$searchTerm%'";
		
		$start = ($page-1) * get_setting('limit');
		$end = get_setting('limit');
		$limit = " LIMIT $start, $end";
		$q = "SELECT vendors.* FROM vendors $where order by vendors.id" . $limit;
		
		$query = $this->db->query($q);
		return $query->result();
	}
	public function get_all_vendors_count($searchTerm=""){
		
		if($searchTerm=="")
			$where = " WHERE 1=1 ";
		else
			$where = " WHERE first_name LIKE '$searchTerm%' OR last_name LIKE '$searchTerm%'";
		
		$q = "SELECT count(*) as count FROM vendors $where order by vendors.id";		
		$query = $this->db->query($q);
		return $query->row()->count;
	}
	
	public function get_vendor_info($user_id){
		$query = $this->db->query("SELECT * FROM vendors where id = ". $user_id);
		return $query->row();
	}
	
	function add_vendor($post){
		$post['created']	=	date('Y-m-d h:i:s',time());
 		$this->db->insert('vendors',$post);
	}
	
	function update_vendor($user_id,$post){
		//update class
		$this->db->where('id',$user_id);
		$this->db->update('vendors',$post);
		return true;
	}
	
	
	/*******************************************************************************************************************************************/
	/**********************************************		Vendors FUNCTIONS 	********************************************************************/
	function get_all_shops($page = 1,$searchTerm=""){
		if($searchTerm=="")
			$where = " WHERE 1=1 ";
		else
			$where = " WHERE shopname LIKE '$searchTerm%' ";
		
		$start = ($page-1) * get_setting('limit');
		$end = get_setting('limit');
		$limit = " LIMIT $start, $end";
		$q = "SELECT shop.* FROM shop $where order by shop.id" . $limit;
		
		$query = $this->db->query($q);
		return $query->result();
	}
	public function get_all_shops_count($searchTerm=""){
		if($searchTerm=="")
			$where = " WHERE 1=1 ";
		else
			$where = " WHERE shopname LIKE '$searchTerm%' ";
		
		$q = "SELECT count(*) as count FROM shop $where order by shop.id";		
		$query = $this->db->query($q);
		return $query->row()->count;
	}
	
	public function get_shop_info($shop_id){
		$query = $this->db->query("SELECT * FROM shop where id = ". $shop_id);
		return $query->row();
	}
	
	function add_shop($post){
		
		$post['created']	=	date('Y-m-d h:i:s',time());
 		$this->db->insert('shop',$post);
	}
	
	function update_shop($shop_id,$post){
		$this->db->where('id',$shop_id);
		$this->db->update('shop',$post);
		return true;
	}
	
	function update_shop_by_vendor($vendor_id,$post){
		
		$this->db->where('vendor_id',$vendor_id);
		$this->db->update('shop',$post);
		return true;
	}
	
	function update_vendor_by_shop($vendor_id,$post){
		
		$this->db->where('id',$vendor_id);
		$this->db->update('vendors',$post);
		return true;
	}
	/**********		PRODUCTS FUNCTIONS 	*****************************************************/
	
	
	function get_all_products_brandname($page = 1, $searchTerm="", $category_id="", $sorting=""){
		
		if($sorting == "SASC"){
			$orderby		=	"ORDER BY `products`.`status` ASC";
		}elseif($sorting == "SDESC"){
			$orderby		=	"ORDER BY `products`.`status` DESC";
		}else{
			$orderby		=	"order by products.id";
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
		$q = "SELECT products.* FROM products WHERE 1=1 and brand_name='' $where1 $where2 " . $orderby . $limit;
		
		$query = $this->db->query($q);
		return $query->result();
	}
	
	function get_all_products_outofstock($page = 1, $searchTerm="", $category_id="", $sorting=""){
		
		if($sorting == "SASC"){
			$orderby		=	"ORDER BY `products`.`status` ASC";
		}elseif($sorting == "SDESC"){
			$orderby		=	"ORDER BY `products`.`status` DESC";
		}else{
			$orderby		=	"order by products.id";
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
		$q = "SELECT products.* FROM products WHERE 1=1 and qty<'4' $where1 $where2 " . $orderby . $limit;
		
		$query = $this->db->query($q);
		return $query->result();
	}
	
	
	
	
	public function get_all_products_count_brandname($searchTerm="", $category_id=""){
		if($searchTerm=="")
			$where1 = "";
		else
			$where1 = " and title LIKE '%".$searchTerm."%'";
		
		if($category_id=="")
			$where2 = "";
		else
			$where2 = " and category_id = '".$category_id."'";
		
		$q = "SELECT count(*) as count FROM products WHERE 1=1 and brand_name='' $where1 $where2 order by products.id";		
		$query = $this->db->query($q);
		return $query->row()->count;
	}
	
	public function get_all_products_count_outofstock($searchTerm="", $category_id=""){
		if($searchTerm=="")
			$where1 = "";
		else
			$where1 = " and title LIKE '%".$searchTerm."%'";
		
		if($category_id=="")
			$where2 = "";
		else
			$where2 = " and category_id = '".$category_id."'";
		
		$q = "SELECT count(*) as count FROM products WHERE 1=1 and qty<'3' $where1 $where2 order by products.id";		
		$query = $this->db->query($q);
		return $query->row()->count;
	}
	
	public function get_product_info($product_id){
		$query = $this->db->query("SELECT * FROM products where id = ". $product_id);
		return $query->row();
	}
	
	
	
	
	function add_product_image($product_id, $image){
		$post = array();
		$post['product_id']	=	$product_id;
		$post['image']		=	$image;
		$this->db->insert('product_images',$post);
	}
	
	function add_shop_image($shop_id, $image){
		$post = array();
		$post['shop_id']	=	$shop_id;
		$post['image']		=	$image;
		$this->db->insert('shop_images',$post);
	}
	
	
	
	
	function get_shop_images($shop_id){
		$q = "SELECT shop_images.* FROM shop_images where shop_id = $shop_id order by shop_images.id";		
		$query = $this->db->query($q);
		return $query->result();
	}
	
	
	
	function get_image_name_shop($image_id){
		$q = "SELECT image FROM shop_images where id = $image_id";
		$query = $this->db->query($q);
		return $query->row()->image;
	}
	
	
	/*******************************************************************************************************************************************/
	/**********************************************		Deals FUNCTIONS 	********************************************************************/
	function get_all_deals($page = 1,$searchTerm=""){
		if($searchTerm=="")
			$where = " WHERE 1=1 ";
		else
			$where = " WHERE title LIKE '$searchTerm%' ";
		
		$start = ($page-1) * get_setting('limit');
		$end = get_setting('limit');
		$limit = " LIMIT $start, $end";
		$q = "SELECT deals.* FROM deals $where order by deals.id" . $limit;
		
		$query = $this->db->query($q);
		return $query->result();
	}
	public function get_all_deals_count($searchTerm=""){
		if($searchTerm=="")
			$where = " WHERE 1=1 ";
		else
			$where = " WHERE title LIKE '$searchTerm%' ";
		
		$q = "SELECT count(*) as count FROM deals $where order by deals.id";		
		$query = $this->db->query($q);
		return $query->row()->count;
	}
	
	public function get_deal_info($deal_id){
		$query = $this->db->query("SELECT * FROM deals where id = ". $deal_id);
		return $query->row();
	}
	
	
	public function get_shop_name($vendor_id){
		$query = $this->db->query("SELECT shopname FROM shop where vendor_id = ". $vendor_id);
		return $query->row();
	}
	
	function add_deal($post){
		
		$post['created']=	date('Y-m-d h:i:s',time());
 		$this->db->insert('deals',$post);
		$insert_id 		= $this->db->insert_id();
		
		$shopdata		=	$this->get_shop_name($post['vendor_id']);
		$shopname		=	$shopdata->shopname;
		$dealdata		=	$this->get_deal_info($insert_id);
		$data			=	array();
		// $data['title']	=	"Deal of the Day, ₹ ". $post['offer_price'];
		$data['title']	=	"Deal of the Day";
		$data['pnimage']=	site_url()."assets/photo/deal/".$post['image'];
		$data['msg']	=	$post['title']."-".$shopname;
		
		$data['detaildata']	= 	array_merge((array)$dealdata,array('type'=>"Deal"));
		
		$deviceTokenArray	=	array();
		$device_data		=	$this->get_device_token();
		foreach($device_data as $devices){
			$this->send_notification($devices->device_token, $data);
		}
	
	}
	
	function update_deal($deal_id,$post){
		$this->db->where('id',$deal_id);
		$this->db->update('deals',$post);
		return true;
	}
	function add_deal_image($deal_id, $image){
		$post = array();
		$post['deal_id']	=	$deal_id;
		$post['image']		=	$image;
		$this->db->insert('deal_images',$post);
	}
	
	function get_image_name_deal($image_id){
		$q = "SELECT image FROM deal_images where id = $image_id";
		$query = $this->db->query($q);
		return $query->row()->image;
	}
	
	
	/*******************************************************************************************************************************************/
	/**********************************************		Deals CATEGORY FUNCTIONS 	********************************************************************/
	function get_all_dealcategory($page = 1,$searchTerm=""){
		if($searchTerm=="")
			$where = " WHERE 1=1 ";
		else
			$where = " WHERE title LIKE '$searchTerm%' ";
		
		$start = ($page-1) * get_setting('limit');
		$end = get_setting('limit');
		$limit = " LIMIT $start, $end";
		$q = "SELECT deal_categories.* FROM deal_categories $where order by deal_categories.id" . $limit;
		
		$query = $this->db->query($q);
		return $query->result();
	}
	
	function get_deal_categories(){
		$q = "SELECT deal_categories.* FROM deal_categories order by deal_categories.id";		
		$query = $this->db->query($q);
		return $query->result();
	}
	
	function get_deal_images($deal_id){
		$q = "SELECT deal_images.* FROM deal_images where deal_id = $deal_id order by deal_images.id";		
		$query = $this->db->query($q);
		return $query->result();
	}
	
	
	public function get_all_dealcategory_count($searchTerm=""){
		if($searchTerm=="")
			$where = " WHERE 1=1 ";
		else
			$where = " WHERE title LIKE '$searchTerm%' ";
		
		$q = "SELECT count(*) as count FROM deal_categories $where order by deal_categories.id";		
		$query = $this->db->query($q);
		return $query->row()->count;
	}
	
	public function get_dealcategory_info($dealcategory_id){
		$query = $this->db->query("SELECT * FROM deal_categories where id = ". $dealcategory_id);
		return $query->row();
	}
	
	function add_dealcategory($post){
		$post['created']	=	date('Y-m-d h:i:s',time());
 		$this->db->insert('deal_categories',$post);
	}
	
	function update_dealcategory($dealcategory_id,$post){
		$this->db->where('id',$dealcategory_id);
		$this->db->update('deal_categories',$post);
		return true;
	}
	
	
	/**PRODUCTS CATEGORY FUNCTIONS ***************/
	
	
	
	
	
	
	
	
	
	
	
	
	
	/**DIRECTORY CATEGORY FUNCTIONS ***************/
	
	function get_all_directorycategory($page = 1,$searchTerm=""){
		if($searchTerm=="")
			$where = " WHERE 1=1 ";
		else
			$where = " WHERE title LIKE '$searchTerm%' ";
		
		$start = ($page-1) * get_setting('limit');
		$end = get_setting('limit');
		$limit = " LIMIT $start, $end";
		$q = "SELECT directory_categories.* FROM directory_categories $where order by directory_categories.id" . $limit;
		
		$query = $this->db->query($q);
		return $query->result();
	}
	
	function get_directory_categories(){
		$q = "SELECT directory_categories.* FROM directory_categories order by directory_categories.id";		
		$query = $this->db->query($q);
		return $query->result();
	}
	
	
	public function get_all_directorycategory_count($searchTerm=""){
		if($searchTerm=="")
			$where = " WHERE 1=1 ";
		else
			$where = " WHERE title LIKE '$searchTerm%' ";
		
		$q = "SELECT count(*) as count FROM directory_categories $where order by directory_categories.id";		
		$query = $this->db->query($q);
		return $query->row()->count;
	}
	
	public function get_directorycategory_info($directorycategory_id){
		$query = $this->db->query("SELECT * FROM directory_categories where id = ". $directorycategory_id);
		return $query->row();
	}
	
	function add_directorycategory($post){
		$post['created']	=	date('Y-m-d h:i:s',time());
 		$this->db->insert('directory_categories',$post);
	}
	
	function update_directorycategory($directorycategory_id,$post){
		$this->db->where('id',$directorycategory_id);
		$this->db->update('directory_categories',$post);
		return true;
	}
	
	
	function get_slug_directorycategory($slug, $cntr = 0){
		
		$query = $this->db->query("select count(*) as count from directory_categories where slug = '$slug'");
		if($query->row()->count > 0){
			$slug = str_replace("-" . $cntr,"", $slug);
			$new_slug = $slug . '-' . ($cntr + 1);
			$slug = $this->get_slug($new_slug,$cntr+1);
			
			return $slug;
		}else{
			return $slug;
		}
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
	
	function delete($where,$table){
		$this->db->delete($table, $where); 
	}
	
	
	
	function get_vendors(){
		$q = "SELECT vendors.id,vendors.first_name,vendors.last_name,vendors.username FROM vendors  order by vendors.id";		
		$query = $this->db->query($q);
		return $query->result();
	}
	function get_slider_images(){
		$q = "SELECT * FROM slider";		
		$query = $this->db->query($q);
		return $query->result();
	}
	function add_slider_image($image){
		$post = array();
		$post['image']	=	$image;
		$post['created']	=	date('Y-m-d h:i:s',time());
		$this->db->insert('slider',$post);
	}
	
	
	
	
	/**********	DIRECTORY FUNCTIONS 	*****************************************************/
	function get_all_directory($page = 1,$searchTerm=""){
		if($searchTerm=="")
			$where = " WHERE 1=1 ";
		else
			$where = " WHERE title LIKE '$searchTerm%' ";
		
		$start = ($page-1) * get_setting('limit');
		$end = get_setting('limit');
		$limit = " LIMIT $start, $end";
		$q = "SELECT directory.* FROM directory $where order by directory.id" . $limit;
		
		$query = $this->db->query($q);
		return $query->result();
	}
	public function get_all_directory_count($searchTerm=""){
		if($searchTerm=="")
			$where = " WHERE 1=1 ";
		else
			$where = " WHERE title LIKE '$searchTerm%' ";
		
		$q = "SELECT count(*) as count FROM directory $where order by directory.id";		
		$query = $this->db->query($q);
		return $query->row()->count;
	}
	
	public function get_directory_info($product_id){
		$query = $this->db->query("SELECT * FROM directory where id = ". $product_id);
		return $query->row();
	}
	
	function add_directory($post){
		$post['created']	=	date('Y-m-d h:i:s',time());
 		$this->db->insert('directory',$post);
		return $this->db->insert_id();
	}
	
	function update_directory($product_id,$post){
		$this->db->where('id',$product_id);
		$this->db->update('directory',$post);
		return true;
	}
	
	function get_device_token(){
		$q = "SELECT device_token FROM user_devices";		
		$query = $this->db->query($q);
		return $query->result();
	}
	
	/**************SEND PUSH NOTIFICATION*********/
	function send_notification($device_token, $data){
		$this->load->library('push');
		$this->load->library('firebase');		
		$firebase  	= new Firebase();
		$push   	= new Push();

		//$payload  = array();
		//$payload['service_id']  = $service_id;
		//$payload['physio_id']  = $data['physio_id'];
		//$payload['type']   = 'assignPhysio';

		$push->setTitle($data['title']);
		$push->setMessage($data['msg']);
		$push->setIsBackground(FALSE);
		$push->setPayload($data['detaildata']);
		// if($data['image']!="")
		$push->setImage($data['pnimage']);
		/* else	
			$push->setImage(''); */
		
		$json   = '';
		$response  = '';
		$json   = $push->getPush();
		$regId   = $device_token;
		$response  = $firebase->send($regId, $json);
	}
	
	
	
	
	
	
	/**QUIZ QUESTION FUNCTIONS ***************/
	function get_all_quiz($page = 1,$searchTerm=""){
		if($searchTerm=="")
			$where = " WHERE 1=1 ";
		else
			$where = " WHERE title LIKE '$searchTerm%' ";
		
		$start = ($page-1) * get_setting('limit');
		$end = get_setting('limit');
		$limit = " LIMIT $start, $end";
		$q = "SELECT quiz.* FROM quiz $where order by quiz.id" . $limit;
		
		$query = $this->db->query($q);
		return $query->result();
	}
	
	function get_quiz(){
		$q = "SELECT quiz.* FROM quiz order by quiz.id";		
		$query = $this->db->query($q);
		return $query->result();
	}
	
	
	public function get_all_quiz_count($searchTerm=""){
		if($searchTerm=="")
			$where = " WHERE 1=1 ";
		else
			$where = " WHERE title LIKE '$searchTerm%' ";
		
		$q = "SELECT count(*) as count FROM quiz $where order by quiz.id";		
		$query = $this->db->query($q);
		return $query->row()->count;
	}
	
	public function get_quiz_info($quiz_id){
		$query = $this->db->query("SELECT * FROM quiz where id = ". $quiz_id);
		return $query->row();
	}
	
	function add_quiz($post){
		$post['created']	=	date('Y-m-d h:i:s',time());
 		$this->db->insert('quiz',$post);
	}
	
	function update_quiz($quiz_id,$post){
		$this->db->where('id',$quiz_id);
		$this->db->update('quiz',$post);
		
		if($post['status']=='1'){
			$data	=	array('status'=>0);
			$this->db->where('id!=',$quiz_id);
			$this->db->update('quiz',$data);
		}
		
		return true;
	}
	
	
	function get_slug_quiz($slug, $cntr = 0){
		
		$query = $this->db->query("select count(*) as count from quiz where slug = '$slug'");
		if($query->row()->count > 0){
			$slug = str_replace("-" . $cntr,"", $slug);
			$new_slug = $slug . '-' . ($cntr + 1);
			$slug = $this->get_slug($new_slug,$cntr+1);
			
			return $slug;
		}else{
			return $slug;
		}
	}
	
	
	public function get_quiz_info_to_notify($quiz_id){
		$query = $this->db->query("SELECT * FROM quiz where id = ". $quiz_id);
		return $query->row();
	}
	
	
	function notify($quiz_id){
		
		$quiz_data 		=	$this->crud->get_quiz_info_to_notify($quiz_id);
		
		// echo "<pre>";
		// print_r($quiz_data);
		// die; 
		
		$data			=	array();
		$data['title']	=	"New Quiz";
		// $data['pnimage']=	site_url()."assets/photo/quiz/".$quiz_data->image;
		$data['pnimage']=	"http://18.188.172.193/bhagalpurmall//assets/photo/quiz/6669_1540365376.jpg";
		$data['msg']	=	$quiz_data->title." to be started at ". $quiz_data->quiz_date." ".$quiz_data->quiz_time;
		$quiz_data->id	=	rand(0,99);
		$data['detaildata']	= 	array_merge((array)$quiz_data,array('type'=>"Quiz"));

		// echo "<pre>";
		// print_r($quiz_data);
		// die;
		
		$this->send_notification("fajmovb7z_w:APA91bFT4mM-5eOnz7UGOOx81m8WZmc9MV9zYNSyZMG4fAGTWKOEY4IHdjZgI_hjAAnmEhvJJegb57lRIW_vsozZ8uHMKrH-QwiqQPBX5yPJ7TSdY1IPKYZvBEK2cSwrSnZyjtN_fWkb", $data);
		
		/* $deviceTokenArray	=	array();
		$device_data		=	$this->get_device_token();
		
		foreach($device_data as $devices){
			$this->send_notification($devices->device_token, $data);
		}  */ 
	}
	
	
	/**QUIZ QUESTIONS FUNCTIONS ***************/
	// function get_all_quiz_questions($page = 1,$searchTerm=""){
	function get_all_quiz_questions($quiz_id = 1,$searchTerm=""){
		if($searchTerm=="")
			$where = " WHERE 1=1 AND quiz_id='$quiz_id'";
		else
			$where = " WHERE title LIKE '$searchTerm%' AND quiz_id='$quiz_id'";
		
		/* $start = ($page-1) * get_setting('limit');
		$end = get_setting('limit');
		$limit = " LIMIT $start, $end"; */
		// $q = "SELECT quiz_questions.* FROM quiz_questions $where order by quiz_questions.id" . $limit;
		$q = "SELECT quiz_questions.* FROM quiz_questions $where order by quiz_questions.id";
		
		$query = $this->db->query($q);
		return $query->result();
	}
	
	function get_quiz_questions(){
		$q = "SELECT quiz_questions.* FROM quiz_questions order by quiz_questions.id";		
		$query = $this->db->query($q);
		return $query->result();
	}
	
	
	public function get_all_quiz_questions_count($searchTerm=""){
		if($searchTerm=="")
			$where = " WHERE 1=1 ";
		else
			$where = " WHERE title LIKE '$searchTerm%' ";
		
		$q = "SELECT count(*) as count FROM quiz_questions $where order by quiz_questions.id";		
		$query = $this->db->query($q);
		return $query->row()->count;
	}
	
	public function get_quiz_questions_info($quiz_id){
		$query = $this->db->query("SELECT * FROM quiz_questions where id = ". $quiz_id);
		return $query->row();
	}
	
	function add_quiz_questions($post){
		$post['created']	=	date('Y-m-d h:i:s',time());
 		$this->db->insert('quiz_questions',$post);
	}
	
	function update_quiz_questions($quiz_id,$post){
		$this->db->where('id',$quiz_id);
		$this->db->update('quiz_questions',$post);
		// echo $this->db->last_query();die;
		return true;
	}
	
	
	function get_quiz_results($quiz_id = 1){
		
		$where = " WHERE 1=1 AND quiz_id='$quiz_id'";
		
		/* $start = ($page-1) * get_setting('limit');
		$end = get_setting('limit');
		$limit = " LIMIT $start, $end"; */
		// $q = "SELECT quiz_questions.* FROM quiz_questions $where order by quiz_questions.id" . $limit;
		$q = "SELECT quiz_results.* FROM quiz_results $where order by quiz_results.correct DESC";
		
		$query = $this->db->query($q);
		return $query->result();
	}
	
	
	function quiz_reward_notification($post,$user_id){
		
		$post['created']	=	date('Y-m-d h:i:s',time());
 		
		$data					=	array();
		$data['title']			=	$post['title'];
		$data['type']			=	"General";
		$data['pnimage']		=	site_url()."assets/photo/notification/".$post['image'];
		$data['msg']			=	$post['short_desc'];
		$post['id']				=	rand(0,99);
		$post	=	(object)$post;
		$data['detaildata']		= 	array_merge((array)$post,array('type'=>"General"));
		
	
		// echo "<pre>";
		// print_r($post);
		// die;
		
		$deviceTokenArray=	array();
		$device_data	=	$this->get_user_device_token($user_id);
		// echo "<pre>";
		// print_r($data);echo $device_data[0]->device_token;
		// pr($device_data);
		
		$this->send_notification($device_data[0]->device_token, $data);
		// foreach($device_data as $devices){
			// $this->send_notification($devices->device_token, $data);
		// }
	}
	
	
	function get_user_device_token($user_id){
		$q = "SELECT device_token FROM user_devices WHERE user_id='$user_id'";		
		$query = $this->db->query($q);
		return $query->result();
	}
	
	
	
	/*******	User FUNCTIONS 	*******************************/
	function get_all_users($page = 1,$searchTerm=""){
		if($searchTerm=="")
			$where = " WHERE 1=1 ";
		else
			$where = " WHERE name LIKE '$searchTerm%'";
		
		$start = ($page-1) * get_setting('limit');
		$end = get_setting('limit');
		$limit = " LIMIT $start, $end";
		$q = "SELECT users.* FROM users $where order by users.id" . $limit;
		
		$query = $this->db->query($q);
		return $query->result();
	}
	
	function user_detail($user_id = 1){
		
		$q = "SELECT users.* FROM users where id = '".$user_id."' order by users.id";
		
		$query = $this->db->query($q);
		return $query->result();
	}
	
	public function get_all_users_count($searchTerm=""){
		
		if($searchTerm=="")
			$where = " WHERE 1=1 ";
		else
			$where = " WHERE name LIKE '$searchTerm%'";
		
		$q = "SELECT count(*) as count FROM users $where order by users.id";		
		$query = $this->db->query($q);
		return $query->row()->count;
	}
	
	public function get_users_info($user_id){
		$query = $this->db->query("SELECT * FROM users where id = ". $user_id);
		return $query->row();
	}
	public function get_users_info_by_email($email){
		$query = $this->db->query("SELECT * FROM users where email = '". $email."'");
		return $query->row();
	}
	
	function add_users($post){
		$post['created']	=	date('Y-m-d h:i:s',time());
 		$this->db->insert('users',$post);
	}
	
	function update_users($user_id,$post){
		//update class
		$this->db->where('id',$user_id);
		$this->db->update('users',$post);
		return true;
	}
	
	function change_password($user_id,$post){
		
		$this->db->where('id',$user_id);
		$this->db->update('users',$post);
		return true;
	}
	
	
	function get_all_orders(){
		
		$q 		= "SELECT customer_order.* FROM customer_order  order by customer_order.id DESC";
		$query 	= $this->db->query($q);
		return $query->result();
	}
	
	function advanceOrderSearch($order_id, $customer_name, $order_status){
		$where='';
		if($order_id != '') {
			$where .= ' AND customer_order.`id` = "'.$order_id.'"';
		}
		if($customer_name != '') {
			$where .= ' AND `users`.name = "'.$customer_name.'"';
		}
		if($order_status != '') {
			$where .= ' AND `customer_order`.order_status = "'.$order_status.'"';
		}
	
		$q 		= "SELECT customer_order.*, `users`.name as user_name FROM customer_order 
		LEFT JOIN users ON `customer_order`.customer_id = `users`.id 
		where 1=1 ".$where."  order by customer_order.id DESC";
		$query 	= $this->db->query($q);
		return $query->result();
		
	}
	
	
		
	function items_by_id($id){
		$query = $this->db->query("SELECT title
									FROM products 
									where id = '$id' ");
		return $query->row();
	}
	
	
	
	
	/**UNIT FUNCTIONS ***************/
	
	function get_units(){
		$q = "SELECT units.* FROM units order by units.id";		
		$query = $this->db->query($q);
		return $query->result();
	}
		
	
	
	
	
	
	
	
		public function get_order_info($order_id){
		$query = $this->db->query("SELECT * FROM customer_order where id = ". $order_id);
		return $query->row();
	}
	
	
		
	function update_order($user_id,$post){
		//update class
		$this->db->where('id',$user_id);
		$this->db->update('customer_order',$post);
		return true;
	}
	
	function insert_order_status($order_id, $customer_id, $post){
		
		$post['created'] 			= 	time();
		$post['order_id'] 			= 	$order_id;
		$post['customer_id'] 		= 	$customer_id;
		
		$this->db->insert('customer_order_status',$post);
		$customer_order_status_id 	= 	$this->db->insert_id();
		return $customer_order_status_id;
		
	}
	
	
	public function get_address_info($address_id){
		$query = $this->db->query("SELECT * FROM customer_address where id = ". $address_id);
		return $query->row();
	}
	
	
	
	
	
	/****************** BULK ORDER **************************/
	
	public function get_all_bulkorder(){
		$q 		= 	"SELECT bulk_order.* FROM bulk_order order by bulk_order.id" ;
		$query 	= 	$this->db->query($q);
		return $query->result();
	}
	
	public function get_all_bulkorder_count(){
		$q 		= 	"SELECT count(*) as count FROM bulk_order order by bulk_order.id";		
		$query 	= 	$this->db->query($q);
		return $query->row()->count;
	}
	
	public function get_bulkorder_info($order_id){
		$query 	= 	$this->db->query("SELECT * FROM bulk_order where id = ". $order_id);
		return $query->row();
	}
	
	function update_bulkorder($order_id, $post){
		$post['modified']	=	time();
		$this->db->where('id',$order_id);
		$this->db->update('bulk_order',$post);
		return true;
	}
	
	/****************** BULK ORDER **************************/
	
	
	/****************** REQUEST ORDER **************************/
	
	public function get_all_requestorder(){
		$q 		= 	"SELECT request_item.* FROM request_item order by request_item.id" ;
		$query 	= 	$this->db->query($q);
		return $query->result();
	}
	
	public function get_all_requestorder_count(){
		$q 		= 	"SELECT count(*) as count FROM request_item order by request_item.id";		
		$query 	= 	$this->db->query($q);
		return $query->row()->count;
	}
	
	public function get_requestorder_info($order_id){
		$query 	= 	$this->db->query("SELECT * FROM request_item where id = ". $order_id);
		return $query->row();
	}
	
	function update_requestorder($order_id, $post){
		$post['modified']	=	time();
		$this->db->where('id',$order_id);
		$this->db->update('request_item',$post);
		return true;
	}
	
	/****************** REQUEST ORDER **************************/
	
	function get_all_orders_dashboard(){
		
		$q 		= "SELECT customer_order.* FROM customer_order order by customer_order.id DESC limit 5";
		$query 	= $this->db->query($q);
		return $query->result();
	}
	
	function get_all_products_outofstock_dashboard(){
		
		$q 		= 	"SELECT products.* FROM products WHERE qty<'4' limit 5";
		$query 	= 	$this->db->query($q);
		return $query->result();
	}
	
}