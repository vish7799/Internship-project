<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();	
	}
	
	
	/*function add_address($post){
		$this->db->insert('user_address',$post);
		$user_address_id = $this->db->insert_id();
		return $user_address_id;
	}*/
	
	function billing_address_info($user_id){
		$q 		= 	"SELECT user_address.* FROM user_address WHERE user_id = ".$user_id." ORDER BY `user_address`.`id` DESC LIMIT 0, 1";
		$query = $this->db->query($q);
		$getRows = $query->row();

		if(isset($getRows) && !empty($getRows)) {
			//return $query->row();
			return $query->result_array();
		} else {
			return false;
		}
	}
	
	public function add_order($data){
		
		if($data['customer_id'] == '' || $data['itemDetail'] == '' || $data['AddressId'] == '' || $data['TransactionAmt'] == ''){
			return false;
		} 
		
		if($this->db->insert('customer_order', $data)){
			$order_id = $this->db->insert_id();
			
			$customer_id		=	$data['customer_id'];
			$year				=	date('y', time());
			$month				=	date('m', time());
			
			$post1['invoice_id']	=	'IC'.$month.$year.$customer_id.$order_id;
			
			$this->db->where('id', $order_id);
			$this->db->where('customer_id', $customer_id);
			$this->db->update('customer_order',$post1);
			
			return $order_id;
			
		}else{
			return false;
		}
		
	}

	public function insertTransaction($data){
        $insert = $this->db->insert('payments',$data);
        return $insert?true:false;
    }

    public function getOrderByID($id) {
    	$q 		= 	"SELECT user_address.* FROM user_address WHERE id = ".$id;
		$query = $this->db->query($q);
		$getRows = $query->row();

		if(isset($getRows) && !empty($getRows)) {
			//return $query->row();
			return $query->result_array();
		} else {
			return false;
		}
    }

    public function getLastTransaction($uid) {
		$q 		= 	"SELECT payments.* FROM payments WHERE user_id = ".$uid." ORDER BY `payments`.`payment_id` DESC LIMIT 0, 1";
		$query = $this->db->query($q);
		$getRows = $query->row();

		if(isset($getRows) && !empty($getRows)) {
			return $query->row();
		} else {
			return false;
		}
	}
	
	
	function get_user_address($user_id){
		$q 			= 	"SELECT * FROM `addressbook` WHERE user_id='".$user_id."' ORDER BY `addressbook`.`id` DESC";
		$query 		= 	$this->db->query($q);
		return $query->result();
	}
	
	function add_address($post){
		$post['created'] 		= 	time();
		$this->db->insert('addressbook',$post);
		$add_id 				= 	$this->db->insert_id();
		return $add_id;
	}
	
	function get_address($address_id){
		$q 			= 	"SELECT * FROM `addressbook` WHERE id='".$address_id."'";
		$query 		= 	$this->db->query($q);
		return $query->row();
	}
	
	function update_address($address_id, $post){
		$userData				=	$this->session->userdata('user');
		$user_id 				= 	$userData->id;
			
		$this->db->where('id', $address_id);
		$this->db->where('user_id', $user_id);
		$this->db->update('addressbook',$post);
		return true;
	}
	
	function get_coupon(){
		$q 			= 	"SELECT * FROM `coupon_discount` WHERE status = '1' ORDER BY `coupon_discount`.`id` DESC";
		$query 		= 	$this->db->query($q);
		return $query->result();
	}
	
	function insert_order_status($post){
		
		$post['created'] 			= 	time();
		
		$this->db->insert('customer_order_status',$post);
		$customer_order_status_id 	= 	$this->db->insert_id();
		return $customer_order_status_id;
		
	}
	
	function wishlist_save($post){
		
		$post['created']			=	time();
		
		$this->db->insert('wishlist',$post);
		$wishlist_id = $this->db->insert_id();
		return $wishlist_id;
	}
	
	public function wishlist_product_count($product_id, $user_id){
		$q 			= 	"SELECT count(*) as count FROM wishlist where user_id = '".$user_id."' and product_id = '".$product_id."'";		
		$query 		= 	$this->db->query($q);
		return $query->row()->count;
	}
	
	
	
}