<?php //pr($orders); ?>

<table border="0" width="98%" align="center" style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 0.95; border:1px #000 solid;">

	<tr>
		<td style="width:33.33%;"><img src="<?php echo site_url(); ?>assets/img/logo.png" style="width:50%"><br />
		<table  style="font-size:16px; line-height:2;">
				<tr><td><b>INVOICE: <?php echo $orders->invoice_id; ?></b></td></tr>
				<tr><td><b>Order Date:</b> <?php echo date('d/m/Y', $orders->txn_date) ?></td></tr>
				<tr><td><b>Payment Type:</b> <?php if($orders->PaymentType == 0){ echo 'COD'; }else{ echo $orders->PaymentType;} ?></td></tr>
				
				</tr>
			</table>
		</td>
		<td style="width:33.33%;">
			<table style="font-size:16px; line-height:2;">
			<?php $user_add		=	get_user_address($orders->AddressId); 
			
			//pr($user_add);	
			?>
				<tr><td><b>Bill To</b></td></tr>
				<tr><td><?php echo $user_add->contact_name . ' '. $user_add->contact_surname .'<br />'.$user_add->contact_address1.'<br />'.$user_add->contact_address2; ?></td></tr>
				<tr><td><?php echo $user_add->contact_city.', '.$user_add->contact_zip; ?></td></tr>
				<tr><td>Phone Number: <?php echo $user_add->contact_phone; ?></td></tr>
			</table>
		</td>
		<td style="width:33.33%;">
			<table  style="font-size:12px;">
				<tr><td><b>Bill From:</b></td></tr>
				<tr><td>Golden World, Shahpura, Jaipur</td></tr>
				<tr><td>Phone: +91 9876543210</td></tr>
				<tr><td>GSTIN: 08ABSPB6412A1Z2</td></tr>
			</table>
		</td>
	</tr>
	
	<tr>
		<td colspan="3">
			<table border="0" style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 0.95; border:1px #000 solid; width:100%;">
				<tr style="font-size:16px; font-weight:bold; outline: thin solid #000;">
					<td style="width:5%; text-align:center;">S. No</td>
					<td style="width:50%;">Product Name</td>
					<td style="width:5%; text-align:center;">Qty</td>
					<td style="width:5%; text-align:center;">Price</td>
					<td style="width:5%; text-align:center;">CGST(%)</td>
					<td style="width:5%; text-align:center;">SGST(%)</td>
					<td style="text-align:center; width:15%">Amount(₹)</td>
				</tr>
				<?php $order_detail		=	json_decode($orders->itemDetail); 
				//pr($order_detail);
				$qtysum					=	0;
				$tottal_amount					=	0;
				foreach($order_detail as $key=>$item_detail){
					$product_detail			=	get_product($item_detail->product_id);
					//pr($product_detail);
				?>
				<tr style="font-size:16px;">
					<td style="text-align:center;"><?php echo $key+1; ?></td>
					<td style=""><?php echo $product_detail->title; ?></td>
					<td style="text-align:center;"><?php echo $item_detail->qty; ?></td>
					<td style="text-align:center;"><?php echo $item_detail->product_offer_price; ?></td>
					<td style="text-align:center;"><?php echo ($product_detail->gst)/2; ?> %</td>
					<td style="text-align:center;"><?php echo ($product_detail->gst)/2; ?> %</td>
					<td style="text-align:center;"><?php echo $item_detail->qty * $item_detail->product_offer_price; ?></td>
				</tr>
				<?php 
				$qtysum	+= $item_detail->qty;
				$tottal_amount	+= $item_detail->qty * $item_detail->product_offer_price;
				} 
				$tottal_amount;
				?>
				
				
				
				<tr>
				
				<td style="" colspan="4"></td>
				<td style="text-align:right; font-size:9px;" colspan="2">Shipping Charges</td>
				<td style="text-align:center; font-size:9px;">₹ <?php echo $orders->shipping; ?></td>
				</tr>
				
				
				<tr style="font-size:11px; font-weight:bold; outline: thin solid #000;">
				<td style="text-align:right;" colspan="2">GRAND TOTAL</td>
				<td style="text-align:center; font-size:11px;"><?php echo $qtysum; ?></td>
				<td style="" colspan="3">&nbsp;</td>
				<td style="text-align:center; font-size:11px;">₹ <?php echo $tottal_amount+$orders->shipping.'.00'; ?></td>
				</tr>
				
			</table>
		</td>
		
	</tr>
	
</table>
