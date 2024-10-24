<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<?php echo form_open_multipart("admin/coupon_discount/edit/".$coupon_discount->id , array('id'=>'edit'))?>
				<div class="box-header with-border">
					<h3 class="box-title">Edit Coupon Discount</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Coupon Type</label> 
								<select class="form-control" id="ctype" name="ctype"  tabindex=1>
									<option value="">Select Coupon Type</option>
									<option value="Percentage" <?php if($coupon_discount->ctype == 'Percentage'){ echo "selected=selected";}?>>Percentage</option>
									<option value="Fix Amount" <?php if($coupon_discount->ctype == 'Fix Amount'){ echo "selected=selected";}?>>Fix Amount</option>
								</select>
								<?php echo form_error('ctype', '<span class="help-block form-error">', '</span>'); ?>
							</div>							
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label>Value</label> 
								<input type="text" class="form-control" id="cvalue" name="cvalue" data-validation="required" tabindex=1 value="<?php echo set_value('cvalue',$coupon_discount->cvalue);?>">
								<?php echo form_error('cvalue', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label>Coupon Code</label> 
								<input type="text" class="form-control" id="ccode" name="ccode" data-validation="required" tabindex=1 value="<?php echo set_value('ccode',$coupon_discount->ccode);?>">
								<?php echo form_error('ccode', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label>Status</label>
								<select class="form-control" id="status" name="status"  tabindex=8>
									<option value="1" <?php if($coupon_discount->status == 1){ echo "selected=selected";}?>>Active</option>
									<option value="0" <?php if($coupon_discount->status == 0){ echo "selected=selected";}?>>In Active</option>
								</select>
								<?php echo form_error('status', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						
						<div class="col-md-12">
							<div class="form-group">
								<label>Description</label> 
								<textarea class="form-control" id="description" name="description" placeholder="Description"><?php echo set_value('description', $coupon_discount->description)?></textarea>
								<?php echo form_error('description', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						
					</div>
				</div>
				<div class="box-footer">
					<button type="submit" id="add_class_submit" class="btn btn-primary">Submit</button>
					<button type="button" onclick="window.location.href='<?php echo site_url()?>admin/coupon_discount'" id="add_teacher_back" class="btn btn-primary">Back</button>
				</div>
				<input type="hidden" name="id" id="id" value="<?php echo $coupon_discount->id?>" />
			</form>
		</div>
	</div>
</div>