<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();	
	}
	
	/***********************************************************************************/
	/**********************		USER FUNCTIONS 	****************************************/
	
	function get_user_address($user_id){
		$q 		= 	"SELECT addressbook.* FROM addressbook where user_id = '". $user_id ."' Order by addressbook.id desc";	
		$query 	= 	$this->db->query($q);
		return $query->result();
	}
	
	function get_address_info($address_id){
		$q 		= 	"SELECT addressbook.* FROM addressbook where id = '". $address_id ."'";	
		$query 	= 	$this->db->query($q);
		return $query->row();
	}
	
	function update_address($post, $addressid){
		$post['modified']		=	time();
		$this->db->where('id',$addressid);
		$this->db->update('addressbook',$post);
		return true;
	
	}
	
	function get_wishlist($user_id){
		$q 		= 	"SELECT wishlist.* FROM wishlist where user_id = '". $user_id ."' Order by wishlist.id desc";	
		$query 	= 	$this->db->query($q);
		return $query->result();
	}
	
	function get_orders($user_id){
		$q 		= 	"SELECT customer_order.* FROM customer_order where customer_id = '". $user_id ."' Order by customer_order.id desc";	
		$query 	= 	$this->db->query($q);
		return $query->result();
	}
	
	function get_order_detail($order_id, $user_id){
		$q 		= 	"SELECT customer_order.* FROM customer_order where customer_id = '". $user_id ."' and id = '".$order_id."'";	
		$query 	= 	$this->db->query($q);
		return $query->row();
	}
	
	
	function get_user_info(){
		
		$user_id		=	$_SESSION['user']->id;
		
		$q 		= 	"SELECT users.* FROM users where id = '".$user_id."' ";	
		$query 	= 	$this->db->query($q);
		return $query->row();
		
	}
	
	function update_user($post, $user_id){
		
		$post['modified']		=	time();
		$this->db->where('id',$user_id);
		$this->db->update('users',$post);
		return true;
	
	}
	
	function wishlist_remove($product_id, $user_id){
		$this->db->where('product_id', $product_id);
		$this->db->where('user_id', $user_id);
		$this->db->delete('wishlist'); 
	
	}
}