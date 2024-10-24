<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");


require_once(APPPATH."libraries/paytm/config_paytm.php");
require_once(APPPATH."libraries/paytm/encdec_paytm.php");

class Payment_responses extends CI_Controller {

	function __construct() {
        parent::__construct();
        //$this->load->model('student');
        //$this->load->model('course');
		$this->load->model('payment');       
    }

	public function index(){

		$paytmChecksum 						= 	"";
		$paramList 							= 	array();
		$isValidChecksum 					= 	"FALSE";

		$paramList 							= 	$_POST;
		$paytmChecksum 						= 	isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

		//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.

		$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.
		
		//$isValidChecksum 					= 	verifychecksum_e($paramList, 'a%5NbIW3jK&iwVCG', $paytmChecksum); 
		//$isValidChecksum 					= 	verifychecksum_e($paramList, 'K!%uc9Ru3k46nlPn', $paytmChecksum); 
		//will return TRUE or FALSE string.
		
		//pr($_SESSION);

		if($isValidChecksum == "TRUE") {
			//echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
			if ($_POST["STATUS"] == "TXN_SUCCESS") {
				//echo "<b>Transaction status is success</b>" . "<br/>";
				//Process your transaction here as success transaction.
				//Verify amount & order id received from Payment gateway with your application's order id and amount.
				if (isset($_POST) && count($_POST)>0 ){ 
					$userData= array(
						'order_id' => $_POST['ORDERID'],
						'txn_id' => $_POST['TXNID'],
						'paid_amt' => $_POST['TXNAMOUNT'],
						'mid' => $_POST['MID'],
						'payment_mode' => $_POST['PAYMENTMODE'],
						'currency' => $_POST['CURRENCY'],
						'txn_date' => $_POST['TXNDATE'],
						'gateway_name' => $_POST['GATEWAYNAME'],
						'bank_txn_id' => $_POST['BANKTXNID'],
						'bank_name' => $_POST['BANKNAME'],
						'check_sum_hash'=> $_POST['CHECKSUMHASH'],
						'status' => $_POST['STATUS']
					);
					$insert			=	$this->payment->insert($userData); //insert record to order table database.
					
					$post['PaymentType']				=	'PAYTM -- '.$_POST['PAYMENTMODE'].' -- '.$_POST['GATEWAYNAME'];
					$post['PaymentStatus']				=	$_POST['STATUS'];
					$post['payment_transaction_no']		=	$_POST['BANKTXNID'];
					$post['payment_json_data']			=	json_encode($userData);
					$order_id							=	$_POST['ORDERID'];
					update_protuct_inventory($order_id);
					$insert								=	$this->payment->update_customer_order($post, $order_id); 
					//insert record to order table database.
					if($insert){
						$page_data['title']				=	get_setting('meta_title');
						$page_data['meta_keywords']		=	get_setting('meta_keywords');
						$page_data['meta_description']	=	get_setting('meta_description');
						
						$page_data['page_name'] 		= 	'products/payment_success';
						$page_data['page_title'] 		= 	'Payment Success';
						$page_data['menu']		 		= 	'Payment Success';
						$this->load->view('index',$page_data);
					}
					
					
					
				}
			}
			else {
				if (isset($_POST) && count($_POST)>0 ){ 
					if(isset($_POST['GATEWAYNAME'])){
						$_POST['GATEWAYNAME']	=	$_POST['GATEWAYNAME'];
					}else{
						$_POST['GATEWAYNAME']	=	'';
					}
					
					$userData= array(
						'order_id' => $_POST['ORDERID'],
						//'txn_id' => $_POST['TXNID'],
						'paid_amt' => $_POST['TXNAMOUNT'],
						'mid' => $_POST['MID'],
						'payment_mode' => $_POST['PAYMENTMODE'],
						'currency' => $_POST['CURRENCY'],
						'txn_date' => $_POST['TXNDATE'],
						'gateway_name' => $_POST['GATEWAYNAME'],
						'bank_txn_id' => $_POST['BANKTXNID'],
						'bank_name' => $_POST['BANKNAME'],
						'check_sum_hash'=> $_POST['CHECKSUMHASH'],
						'status' => $_POST['STATUS'],
						'respmsg' => $_POST['RESPMSG']
					);
					
					$insert								=	$this->payment->insert($userData);
					
					$post['PaymentType']				=	'PAYTM -- '.$_POST['PAYMENTMODE'].' -- '.$_POST['GATEWAYNAME'];
					$post['PaymentStatus']				=	$_POST['STATUS'];
					$post['respmsg']					=	$_POST['RESPMSG'];
					$post['payment_transaction_no']		=	$_POST['BANKTXNID'];
					$post['payment_json_data']			=	json_encode($userData);
					$order_id							=	$_POST['ORDERID'];
					$insert								=	$this->payment->update_customer_order($post, $order_id);
					if($insert){
						$page_data['title']				=	get_setting('meta_title');
						$page_data['meta_keywords']		=	get_setting('meta_keywords');
						$page_data['meta_description']	=	get_setting('meta_description');
						$page_data['respmsg']			=	$_POST['RESPMSG'];;
						
						$page_data['page_name'] 		= 	'products/payment_fail';
						$page_data['page_title'] 		= 	'Payment Fail';
						$page_data['menu']		 		= 	'Payment Fail';
						$this->load->view('index',$page_data);
					}
				}
			}



		}else{
			echo "<b>Checksum mismatched.</b>";
			//Process transaction as suspicious.
		}
}
}