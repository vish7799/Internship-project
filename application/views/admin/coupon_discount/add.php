<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<?php echo form_open_multipart("admin/coupon_discount/add" , array('id'=>'add'))?>
				<div class="box-header with-border">
					<h3 class="box-title">Add Coupon Discount</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Coupon Type</label> 
								<select class="form-control" id="ctype" name="ctype"  tabindex=1>
									<option value="">Select Coupon Type</option>
									<option value="Percentage">Percentage</option>
									<option value="Fix Amount">Fix Amount</option>
								</select>
								<?php echo form_error('ctype', '<span class="help-block form-error">', '</span>'); ?>
							</div>							
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label>Value</label> 
								<input type="text" class="form-control" id="cvalue" name="cvalue" data-validation="required" tabindex=2 value="<?php echo set_value('cvalue')?>">
								<?php echo form_error('cvalue', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						
						
						<div class="col-md-6">
							<div class="form-group">
								<label>Coupon Code</label> 
								<input type="text" class="form-control" id="ccode" name="ccode" data-validation="required" tabindex=3 value="<?php echo set_value('ccode')?>">
								<?php echo form_error('ccode', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label>Status</label>
								<select class="form-control" id="status" name="status"  tabindex=8>
									<option value="1">Active</option>
									<option value="0">In Active</option>
								</select>
								<?php echo form_error('status', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						
						<div class="col-md-12">
							<div class="form-group">
								<label>Description</label> 
								<textarea class="form-control" id="description" name="description" placeholder="Description"><?php echo set_value('description')?></textarea>
								<?php echo form_error('description', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						
					</div>
					
				</div>
				<div class="box-footer">
					<button type="submit" id="add_class_submit" class="btn btn-primary">Submit</button>
					<button type="button" onclick="window.location.href='<?php echo site_url()?>admin/coupon_discount'" id="add_coupon_discount" class="btn btn-primary">Back</button>
				</div>
			</form>
		</div>
	</div>
</div>