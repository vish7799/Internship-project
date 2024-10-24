<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<?php echo form_open_multipart("admin/admin/index" , array('id'=>'forget_password'))?>
				<div class="box-header with-border">
					<h3 class="box-title">Change password</h3>
				</div>
				<div class="box-body">
					<div class="row">						
						<div class="col-md-6">
							<div class="form-group">
								<label>Current Password</label> 
								<input type="text" class="form-control" id="current_password" name="current_password" placeholder="Current Password" data-validation="required" value="<?php echo set_value('current_password')?>" tabindex=1>
								<?php echo form_error('current_password', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							<div class="form-group">
								<label>New Password</label> 
								<input type="text" class="form-control" id="new_password" name="new_password" placeholder="New Password" data-validation="required" value="<?php echo set_value('new_password')?>" tabindex=1>
								<?php echo form_error('new_password', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							<div class="form-group">
								<label>Repeat Password</label> 
								<input type="password" class="form-control" id="new_password2" name="new_password2" placeholder="Repeat Password" data-validation="required" value="<?php echo set_value('new_password2')?>" tabindex=1>
								<?php echo form_error('new_password2', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
					</div>
					
				</div>
				<div class="box-footer">
					<button type="submit" id="add_class_submit" class="btn btn-primary">Submit</button>
					<button type="button" onclick="window.location.href='<?php echo site_url()?>admin/dashboard'" id="add_teacher_back" class="btn btn-primary">Back</button>
				</div>
			</form>
		</div>
	</div>
</div>