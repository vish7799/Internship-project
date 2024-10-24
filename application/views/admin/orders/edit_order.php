<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<?php echo form_open_multipart("admin/orders/edit_order/".$orders->id , array('id'=>'edit_order'))?>
				<div class="box-header with-border">
					<h3 class="box-title">Update Order</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
							
							<div class="form-group">
								<label>Status</label>
								<select class="form-control" id="order_status" name="order_status" tabindex=8>									
			<option value="0" <?php if($orders->order_status == "0"){ echo "selected=selected";}?>>New Order</option>
			<option value="1" <?php if($orders->order_status == "1"){ echo "selected=selected";}?>>Order Accepted</option>
			<option value="2" <?php if($orders->order_status == "2"){ echo "selected=selected";}?>>Order In Process</option>
			<option value="3" <?php if($orders->order_status == "3"){ echo "selected=selected";}?>>Order Shipped</option>
			<option value="4" <?php if($orders->order_status == "4"){ echo "selected=selected";}?>>Order Completed</option>
			<option value="5" <?php if($orders->order_status == "5"){ echo "selected=selected";}?>>Order Cancelled</option>
								
								</select>
								<?php echo form_error('status', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							
							<div class="form-group">
								<label>Current Note</label> 
								<?php echo set_value('mobile',$orders->note);?>
							</div>
							<div class="form-group">
								<label>Note</label> 
								<input type="text" class="form-control" id="note" name="note" placeholder="Enter Note here" data-validation="required" value="" tabindex=6>
								<?php echo form_error('note', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button type="submit" id="add_class_submit" class="btn btn-primary">Submit</button>
					<button type="button" onclick="window.location.href='<?php echo site_url()?>admin/orders'" id="add_teacher_back" class="btn btn-primary">Back</button>
				</div>
				<input type="hidden" name="order_id" id="order_id" value="<?php echo $orders->id?>" />
				<input type="hidden" name="customer_id" id="customer_id" value="<?php echo $orders->customer_id?>" />
			</form>
		</div>
	</div>
</div>