<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<div class="col-md-6">
					<h3 class="box-title">Orders</h3>
				</div>
				<div class="col-md-6 text-right">
					
				</div>
            </div>
			
			<div class="box-header">
				<div class="col-md-2">
					<h3 class="box-title">Search Order</h3>
				</div>
				<div class="col-md-10">
					<?php echo form_open_multipart("admin/orders/index" , array('id'=>'search_order'))?>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<input type="text" class="form-control" id="order_id" name="order_id" placeholder="Order ID" data-validation="required" value="<?php echo set_value('order_id');?>" >
								</div>							
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Customer Name" data-validation="required" value="<?php echo set_value('customer_name');?>" >	
								</div>							
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<select class="form-control" id="order_status" name="order_status" tabindex=8>		
										<option value="">Status</option>
										<option value="New">New</option>
										<option value="Accepted">Accepted</option>
										<option value="Cancelled">Cancelled</option>
										<option value="In Process">In Process</option>
										<option value="Completed">Completed</option>
									</select>
								</div>							
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<input type="hidden" value="yes" id="submit" name="submit">
									<button type="submit" value="Submit" id="add_class_submit" class="btn btn-primary">Submit</button>
								</div>							
							</div>
						</div>
						
					</form>
			
				</div>
            </div>
			
			
			<div class="box-body table-responsive">
				<table class="table table-hover">
					<tr>
						<th>Invoice Number</th>
						<th>Customer Detail</th>
						<th>Item Detail</th>
						<th>Amount</th>
						<th>Transaction Detail</th>
						<th>Payment Status</th>
						<th>Status</th>
						<th style="text-align: center;">Action</th>
					</tr>
					<?php 
						foreach($orders as $order){
						$users	=	get_user_by_id($order->customer_id);
						$itemDetail	=	json_decode($order->itemDetail);
						//pr($itemDetail);
					?>
					<tr style="<?php if($order->PaymentStatus == 'TXN_FAILURE'){ ?>background: #FFF8DC; <?php } ?>">
						<td><?php echo $order->invoice_id;?></td>
						<td>
							<?php echo $users->firstname.' '. $users->lastname;?><br />
							<?php echo $users->email;?><br />
							<?php echo $users->mobile_number;?>
						</td>
						<td>
							<?php foreach($itemDetail as $key=>$itemdetails){ 
							//pr($itemdetails);
							?>
							<?php echo $key+1 . ') ' . get_product_name_by_id($itemdetails->product_id) . ' - ' . $itemdetails->product_offer_price . ' * ' . $itemdetails->qty;?><br />
							<?php } ?>
						</td>
						<td><?php echo $order->TransactionAmt;?></td>
						<td>
							<?php echo date('M d, Y', $order->txn_date);?><br />
							<?php if($order->order_type != "COD"){ ?>
							<?php echo $order->PaymentType;?><br />
							<?php echo $order->payment_transaction_no;?>
							<?php }else{ ?>
							<?php echo '<b>COD</b>';?>
							<?php } ?>
						</td>
						<td style="width:17%;">
							<?php if($order->order_type != "COD"){ ?>
							<?php echo $order->PaymentStatus;?><br />
							<?php echo $order->respmsg;?>
							<?php }else{ ?>
							<?php echo '<b>COD</b>';?>
							<?php } ?>
						</td>
						<td>
						<?php if($order->order_status == '4'){ ?>
						Order Completed
						<?php }elseif($order->order_status == '5'){ ?>
						Order Cancelled
						<?php }else{ ?>
						<a href="<?php echo site_url()."admin/orders/edit_order/".$order->id?>">
							<?php 
							if($order->order_status == '0'){
								echo "New Order";
							}elseif($order->order_status == '1'){
								echo "Order Accepted";
							}elseif($order->order_status == '2'){
								echo "Order In Process";
							}elseif($order->order_status == '3'){
								echo "Order Shipped";
							}elseif($order->order_status == '4'){
								echo "Order Completed";
							}elseif($order->order_status == '5'){
								echo "Order Cancelled";
							} 
							?>
						</a>
						<?php } ?>
						
						</td>
						<td style="text-align: center;">
							<a target="_blank" href="<?php echo site_url()."admin/orders/view_bill/".$order->id?>" alt="View Bill" title="View Bill">
								View Bill
							</a>
						</td>
						
						
					</tr>
					<?php }?>
				</table>
			</div>
			
		</div>
	</div>
</div>
<script>
document.getElementById("searchTerm").onkeypress = function(event){
	if (event.keyCode == 13 || event.which == 13){
		document.getElementById("search").submit();
	}
};
</script>