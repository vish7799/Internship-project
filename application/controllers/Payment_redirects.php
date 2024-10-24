<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

require_once(APPPATH."libraries\paytm\config_paytm.php");
require_once(APPPATH."libraries\paytm/encdec_paytm.php");

class Payment_redirects extends CI_Controller {

	function __construct() {
		parent::__construct();
		//$this->load->model('student');
		//$this->load->model('course');
		
	}

	public function index(){
		//pr($_SESSION['orderdata']);
		
		$checkSum 			= 	"";
		$paramList 			= 	array();
		$ORDER_ID 			= 	$_SESSION['orderdata']["ORDER_ID"];
		$CUST_ID 			= 	$_SESSION['orderdata']["CUST_ID"];
		$INDUSTRY_TYPE_ID 	= 	$_SESSION['orderdata']["INDUSTRY_TYPE_ID"];
		$CHANNEL_ID 		= 	$_SESSION['orderdata']["CHANNEL_ID"];
		$TXN_AMOUNT 		= 	$_SESSION['orderdata']["TXN_AMOUNT"];

		// Create an array having all required parameters for creating checksum.
		$paramList["MID"] 						= 	PAYTM_MERCHANT_MID;
		//$paramList["MID"] 					= 	'zhIwHx99147304773630';
		$paramList["ORDER_ID"] 					= 	$ORDER_ID;
		$paramList["CUST_ID"] 					= 	$CUST_ID;
		$paramList["INDUSTRY_TYPE_ID"] 			= 	$INDUSTRY_TYPE_ID;
		$paramList["CHANNEL_ID"] 				= 	$CHANNEL_ID;
		$paramList["TXN_AMOUNT"] 				= 	$TXN_AMOUNT;
		$paramList["WEBSITE"] 					= 	PAYTM_MERCHANT_WEBSITE;
		//$paramList["WEBSITE"] 				= 	'WEBSTAGING';
		$paramList["CALLBACK_URL"] 				= 	base_url()."Payment_responses";

		/*
		$paramList["CALLBACK_URL"] 				= 	"http://localhost/PaytmKit/pgResponse.php";
		$paramList["MSISDN"] 					= 	$MSISDN; //Mobile number of customer
		$paramList["EMAIL"] 					= 	$EMAIL; //Email ID of customer
		$paramList["VERIFIED_BY"] 				= 	"EMAIL"; //
		$paramList["IS_USER_VERIFIED"] 			= 	"YES"; //
		*/
		
		//Here checksum string will return by getChecksumFromArray() function.
		$checkSum 								= 	getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
		//$checkSum 							= 	getChecksumFromArray($paramList,'a%5NbIW3jK&iwVCG');
		$paramList["CHECKSUMHASH"]				=	$checkSum;	
		//pr($paramList);
		$this->load->view('payment_redirects',['paramList'=>$paramList]);
	}


}