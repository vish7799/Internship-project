<?php

function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function lowerCaseTitle($title){
	return strtolower($title);
}

function time_elapsed_string($datetime, $full = false) {
	
//echo time_elapsed_string('2013-05-01 00:22:35');
//echo time_elapsed_string('@1367367755'); # timestamp input
//echo time_elapsed_string('2013-05-01 00:22:35', true);
	
	$now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

function custom_echo($x, $length){
  if(strlen($x)<=$length){
    echo $x;
  }else{
    $y=substr($x,0,$length) . '...';
    echo $y;
  }
}

function pr($d){
	echo "<pre>";
	print_r($d);
	echo "</pre>";
	die;
}

/**/

function get_cmspage_by_id($id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT * from cms where id = '" . $CI->db->escape_str($id) . "'");
	return $query->row();
}

/**/

function get_product_by_category($category){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT * from products where category_id = '" . $CI->db->escape_str($category) . "' ORDER BY `products`.`id` DESC limit 10");
	return $query->result();
}

function get_product_by_id($id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT * from products where id = '" . $CI->db->escape_str($id) . "'");
	return $query->row();
}

function get_category(){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT * from product_categories where status='1' ");
	return $query->result();
}

function get_ctype(){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT * from ctype where status='1' ");
	return $query->result();
}

function get_category_id_by_slug($slug){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT id from product_categories where slug = '" . $CI->db->escape_str($slug) . "'");
	return (isset($query->row()->id) && $query->row()->id != "")?$query->row()->id:"-";
}

function get_flavour_slug_by_id($id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT slug from flavour where id = '" . $CI->db->escape_str($id) . "'");
	return (isset($query->row()->slug) && $query->row()->slug != "")?$query->row()->slug:"-";
}

function get_flavour_name_by_id($id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT title from flavour where id = '" . $CI->db->escape_str($id) . "'");
	return (isset($query->row()->title) && $query->row()->title != "")?$query->row()->title:"-";
}

function get_ctype_id_by_slug($slug){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT id from ctype where slug = '" . $CI->db->escape_str($slug) . "'");
	return (isset($query->row()->id) && $query->row()->id != "")?$query->row()->id:"-";
}

function get_ctype_slug_by_id($id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT slug from ctype where id = '" . $CI->db->escape_str($id) . "'");
	return (isset($query->row()->slug) && $query->row()->slug != "")?$query->row()->slug:"-";
}

function get_ctype_name_by_id($id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT title from ctype where id = '" . $CI->db->escape_str($id) . "'");
	return (isset($query->row()->title) && $query->row()->title != "")?$query->row()->title:"-";
}

function get_shape_slug_by_id($id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT slug from shape where id = '" . $CI->db->escape_str($id) . "'");
	return (isset($query->row()->slug) && $query->row()->slug != "")?$query->row()->slug:"-";
}

function get_shape_name_by_id($id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT title from shape where id = '" . $CI->db->escape_str($id) . "'");
	return (isset($query->row()->title) && $query->row()->title != "")?$query->row()->title:"-";
}

function get_coupon_info_by_code($code){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT * from coupon_discount where ccode = '" . $CI->db->escape_str($code) . "'");
	return $query->row();
}





function get_setting($field){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT value from settings where field = '" . $CI->db->escape_str($field) . "'");
	return (isset($query->row()->value) && $query->row()->value != "")?$query->row()->value:"";
}

function get_product_category_title($id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT title from product_categories where id = '" . $CI->db->escape_str($id) . "'");
	return (isset($query->row()->title) && $query->row()->title != "")?$query->row()->title:"-";
}

function get_deal_category_title($id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT title from deal_categories where id = '" . $CI->db->escape_str($id) . "'");
	return (isset($query->row()->title) && $query->row()->title != "")?$query->row()->title:"-";
}


function get_all_categories($parent,$productcategory=array()){
 $CI =& get_instance();
 if(!empty($productcategory) && !$productcategory->id){
  $where = ' and id != ' . $productcategory->id;
 }else{
  $where = '';
 }
 $query = $CI->db->query("SELECT * from product_categories where parent = $parent $where");
 return $query->result();
}

function get_category_options($parent=0,$productcategory=array(),$level=0){
 $level++;
 $categories = get_all_categories($parent,$productcategory);
 $option = '';
 if(!empty($categories)){  
  foreach($categories as $category){
   if(isset($productcategory->parent) && $productcategory->parent==$category->id){
    $option  .= "<option selected=selected value='".$category->id."'>".get_level_string($level) ."-". $category->title."</option>";
   }else{
    $option  .= "<option value='".$category->id."'>".get_level_string($level) . "-". $category->title."</option>";
   }
   
   $option .= get_category_options($category->id, $productcategory,$level);
   
  }
 }
 return $option;
 
}

function get_level_string($level){
 $string = '';
 for($i=1;$i<$level;$i++){
  $string .='&nbsp;&nbsp;&nbsp;&nbsp;';
 }
 return $string;
}

function parent_category($category = array()){
 if(!empty($category)){
  $CI =& get_instance();
  $query = $CI->db->query("SELECT * from product_categories where id = '" . $CI->db->escape_str($category->parent) . "'");
  return (isset($query->row()->title) && $query->row()->title != "")?$query->row()->title:"-";
 }else{
  return '-';
 }
}


function main_menu($parent=0){
 $CI =& get_instance();
 $query = $CI->db->query("SELECT * from product_categories where parent = '" . $CI->db->escape_str($parent) . "'");
 return $query->result();
}



function get_directorycategory_options($parent=0,$directorycategory=array(),$level=0){
 $level++;
 $categories = get_all_directorycategories($parent,$directorycategory);
 $option = '';
 if(!empty($categories)){  
  foreach($categories as $category){
   if(isset($directorycategory->parent) && $directorycategory->parent==$category->id){
    $option  .= "<option selected=selected value='".$category->id."'>".get_level_string($level) ."-". $category->title."</option>";
   }else{
    $option  .= "<option value='".$category->id."'>".get_level_string($level) . "-". $category->title."</option>";
   }
   
   $option .= get_directorycategory_options($category->id, $directorycategory,$level);
   
  }
 }
 return $option;
 
}

function get_all_directorycategories($parent,$directorycategory=array()){
 $CI =& get_instance();
 if(!empty($directorycategory) && !$directorycategory->id){
  $where = ' and id != ' . $directorycategory->id;
 }else{
  $where = '';
 }
 $query = $CI->db->query("SELECT * from directory_categories where parent = $parent $where");
 return $query->result();
}

function parent_directory_category($category = array()){
 if(!empty($category)){
  $CI =& get_instance();
  $query = $CI->db->query("SELECT * from directory_categories where id = '" . $CI->db->escape_str($category->parent) . "'");
  return (isset($query->row()->title) && $query->row()->title != "")?$query->row()->title:"-";
 }else{
  return '-';
 }
}


function get_directory_product_category_title($id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT title from directory_categories where id = '" . $CI->db->escape_str($id) . "'");
	return (isset($query->row()->title) && $query->row()->title != "")?$query->row()->title:"-";
}


function get_category_front($parent=0,$productcategory=array(),$level=0){
 $level++;
 $categories = get_all_categories($parent,$productcategory);
 $option = '';
 if(!empty($categories)){  
  foreach($categories as $category){
   if(isset($productcategory->parent) && $productcategory->parent==$category->id){
    $option  .= "<div><a href='".site_url()."categories/category/".$category->id."'>".get_level_string($level) ."-". $category->title."</a></div>";
   }else{
    $option  .= "<div><a href='".site_url()."categories/category/".$category->id."'>".get_level_string($level) . "-". $category->title."</a></div>";
   }
   
   $option .= get_category_front($category->id, $productcategory,$level);
   
  }
 }
 return $option;
 
}


function format_date($timestamp,$format="d/m/Y"){
	return  date($format, $timestamp); 
}

function generateOTP($length = 6){
	
	$otp		=	substr(str_shuffle(str_repeat($x='0123456789', ceil($length/strlen($x)) )),1,$length);
	return $otp;
}


function get_user_email($id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT email from users where id = '" . $CI->db->escape_str($id) . "'");
	return (isset($query->row()->email) && $query->row()->email != "")?$query->row()->email:"-";
}

function get_user_name($id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT name from users where id = '" . $CI->db->escape_str($id) . "'");
	return (isset($query->row()->name) && $query->row()->name != "")?$query->row()->name:"-";
}

function get_user_mobile($id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT mobile from users where id = '" . $CI->db->escape_str($id) . "'");
	return (isset($query->row()->mobile) && $query->row()->mobile != "")?$query->row()->mobile:"-";
}

function get_product_name($id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT title from products where id = '" . $CI->db->escape_str($id) . "'");
	return (isset($query->row()->title) && $query->row()->title != "")?$query->row()->title:"-";
}

function get_address($address_id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT * from addressbook where id = '" . $CI->db->escape_str($address_id) . "'");
	return $query->row();
}

function gst_calulator($originale_cost, $gst){
	
	$step1				=	100+($gst) ;
	$step2				=	(100/$step1);
	$step3				=	($originale_cost*$step2);
	$gst_amount			=	round($originale_cost-$step3, 2);
	return	$gst_amount;
	
}

function get_product($products_id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT * from products where id = '" . $CI->db->escape_str($products_id) . "'");
	return $query->row();
}

function get_product_id_by_slug($slug){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT id from products where slug = '" . $CI->db->escape_str($slug) . "'");
	return (isset($query->row()->id) && $query->row()->id != "")?$query->row()->id:"-";
}

function get_product_slug_by_id($id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT slug from products where id = '" . $CI->db->escape_str($id) . "'");
	return (isset($query->row()->slug) && $query->row()->slug != "")?$query->row()->slug:"-";
}

function get_product_name_by_slug($slug){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT title from products where slug = '" . $CI->db->escape_str($slug) . "'");
	return (isset($query->row()->title) && $query->row()->title != "")?$query->row()->title:"-";
}

function get_product_images($id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT * from product_images where product_id = '" . $CI->db->escape_str($id) . "'");
	return $query->result();
}

function get_product_category_slug($id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT slug from product_categories where id = '" . $CI->db->escape_str($id) . "'");
	return (isset($query->row()->slug) && $query->row()->slug != "")?$query->row()->slug:"-";
}

function get_product_info($id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT * from products where id = '" . $CI->db->escape_str($id) . "'");
	return $query->row();
}

function get_product_category_name($id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT title from product_categories where id = '" . $CI->db->escape_str($id) . "'");
	return (isset($query->row()->title) && $query->row()->title != "")?$query->row()->title:"-";
}

function get_product_category_name_by_slug($slug){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT title from product_categories where slug = '" . $CI->db->escape_str($slug) . "'");
	return (isset($query->row()->title) && $query->row()->title != "")?$query->row()->title:"-";
}

function get_product_name_by_id($id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT title from products where id = '" . $CI->db->escape_str($id) . "'");
	return $query->row()->title;
}

function get_product_gst_by_id($id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT gst from products where id = '" . $CI->db->escape_str($id) . "'");
	return $query->row()->gst;
}

function get_user_by_id($id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT * from users where id = '" . $CI->db->escape_str($id) . "'");
	return $query->row();
}

function get_sub_category($id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT * from product_categories where parent = '" . $CI->db->escape_str($id) . "'");
	return $query->result();
}

function get_parent_category(){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT * from product_categories where parent = '0' order by id");
	return $query->result();
}

function get_order_status($orderid){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT * from customer_order_status where order_id = '" . $CI->db->escape_str($orderid) . "' order by id");
	return $query->result();
}

function get_color_title_by_id($id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT title from color where id = '" . $CI->db->escape_str($id) . "'");
	return $query->row()->title;
}

function get_color_by_id($id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT * from color where id = '" . $CI->db->escape_str($id) . "'");
	return $query->row();
}

function get_size_title_by_id($id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT title from size where id = '" . $CI->db->escape_str($id) . "'");
	return $query->row()->title;
}

function get_size_by_id($id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT * from size where id = '" . $CI->db->escape_str($id) . "'");
	return $query->row();
}

function get_wishlist_product_count($user_id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT count(*) as count FROM wishlist where user_id = '" . $CI->db->escape_str($user_id) . "'");
	return (isset($query->row()->count) && $query->row()->count != "")?$query->row()->count:"-";
}


function get_total_active_product(){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT count(*) as count from products where status = '1'");
	return $query->row()->count;
}

function get_total_user(){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT count(*) as count from users");
	return $query->row()->count;
}

function get_total_earning(){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT SUM(TransactionAmt) as count from customer_order");
	return $query->row()->count;
}

function get_total_order(){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT count(*) as count from customer_order");
	return $query->row()->count;
}


function update_protuct_inventory($order_id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT * FROM customer_order where id = '" . $CI->db->escape_str($order_id) . "'");
	$order_details 				=	$query->row();
	//pr($order_details->itemDetail);
	$item_details 			=	json_decode($order_details->itemDetail);
	//pr($item_details);
	$loopcount			=	0;
	foreach($item_details as $item_detail){
		
		$query 				= 	$CI->db->query("UPDATE `products` SET qty=qty-".$item_detail->qty." where id = '" . $CI->db->escape_str($item_detail->product_id) . "'");
		$loopcount++;
	}
}

/******************* BLOG SECTION ***********************/

function get_latest_blogs(){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT * from blogs where status = 1 order by created_date DESC limit 0,3");
	return $query->result();
}

function get_blogs_tags(){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT * from blogs_tag where status = 1 and title != '' order by title ASC");
	return $query->result();
}

function get_blogs_images($event_id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT * from blogs_images where blog_id = '" . $CI->db->escape_str($event_id) . "' order by id ASC");
	return $query->result();
}

function get_blogs_category(){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT * from blogs_category where status = 1 and title != '' order by title ASC");
	return $query->result();
}

function get_blog_count_category_id($category_id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT count(*) as count from blogs where category_id LIKE '%," . $CI->db->escape_str($category_id) . ",%'");
	return $query->row()->count;
}

function get_blog_Id_by_slug($slug){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT id from blogs where slug = '" . $CI->db->escape_str($slug) . "'");
	return $query->row()->id;
}

function get_blog_categoryId_by_slug($slug){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT id from blogs_category where slug = '" . $CI->db->escape_str($slug) . "'");
	return $query->row()->id;
}

function get_blog_categoryName_by_id($id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT title from blogs_category where id = '" . $CI->db->escape_str($id) . "'");
	return $query->row()->title;
}

function get_blog_tagId_by_slug($slug){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT id from blogs_tag where slug = '" . $CI->db->escape_str($slug) . "'");
	return $query->row()->id;
}

function get_blog_tagName_by_id($id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT title from blogs_tag where id = '" . $CI->db->escape_str($id) . "'");
	return $query->row()->title;
}

function get_blogs_views_tracker($blog_id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT sum(counter) as total_visit from blogs_views_tracker where blog_id = '" . $CI->db->escape_str($blog_id) . "'");
	return $query->row()->total_visit;
}

function get_category_name_by_id($id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT title from blogs_category where id = '" . $CI->db->escape_str($id) . "'");
	return (isset($query->row()->title) && $query->row()->title != "")?$query->row()->title:"-";
}

function get_blog_category_by_id($category_id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT title from blogs_category where id = '" . $CI->db->escape_str($category_id) . "'");
	return $query->row()->title;
}

function get_blog_category_slug_by_id($category_id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT slug from blogs_category where id = '" . $CI->db->escape_str($category_id) . "'");
	return $query->row()->slug;
}

/******************* BLOG SECTION ***********************/


function get_product_search(){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT * from products where status = '1'");
	return $query->result();
}


function get_product_slug_by_name($title){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT slug from products where title = '" . $CI->db->escape_str($title) . "'");
	return (isset($query->row()->slug) && $query->row()->slug != "")?$query->row()->slug:"-";
}


function getParentCategory(){
	$CI =& get_instance();
	$query 					= 	$CI->db->query("SELECT * from product_categories where parent = '0' and status = '1' order by id ASC");
	return $query->result();
}

function getChildCategoryCount($parent_id){
	$CI =& get_instance();
	$query 					= 	$CI->db->query("SELECT count(*) as count from product_categories where parent = '" . $CI->db->escape_str($parent_id) . "' and status = '1' order by id ASC");
	return (isset($query->row()->count) && $query->row()->count != "")?$query->row()->count:"";
}

function getChildCategory($parent_id){
	$CI =& get_instance();
	$query 					= 	$CI->db->query("SELECT * from product_categories where parent = '" . $CI->db->escape_str($parent_id) . "' and status = '1' order by id ASC");
	return $query->result();
}

function getParentCategoryId($id){
	$CI =& get_instance();
	$query 					= 	$CI->db->query("SELECT parent from product_categories where id = '" . $CI->db->escape_str($id) . "' and status = '1'");
	return (isset($query->row()->parent) && $query->row()->parent != "")?$query->row()->parent:"";
}


function get_product_slug(){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT * from products");
	return $query->result();
	
}

function get_featured_product(){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT * from products where status = '1' and is_featured = '1' ORDER BY rand() limit 5");
	return $query->result();
}

function get_product_count_category_id($category_id){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT count(*) as count from products where parent_category_id = '" . $CI->db->escape_str($category_id) . "'");
	return $query->row()->count;
}

function getChildCategoryById($parrentid){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT * from product_categories where status = '1' and parent = '" . $CI->db->escape_str($parrentid) . "' ORDER BY id ASC");
	return $query->result();
}