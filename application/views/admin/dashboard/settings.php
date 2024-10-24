<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<?php echo form_open_multipart("admin/dashboard/settings" , array('id'=>'settings'))?>
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
							
							<div class="form-group">
								<label>Admin Email</label>
								<input type="text" class="form-control" id="admin_email" name="admin_email" placeholder="Admin Email" value="<?php echo get_setting('admin_email')?>" data-validation="required" tabindex=1>
								<?php echo form_error('admin_email', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							
						</div>
					
						<div class="col-md-6">
							<div class="form-group">
								<label>Admin Mobile</label>
								<input type="text" class="form-control" id="admin_mobile" name="admin_mobile" placeholder="Admin Mobile" value="<?php echo get_setting('admin_mobile')?>" data-validation="required" tabindex=1>
								<?php echo form_error('admin_mobile', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						
						<div class="form-group col-md-12">
							<label>Social Links</label>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label>Facebook</label>
								<input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook" value="<?php echo get_setting('facebook')?>" data-validation="required" tabindex=1>
								<?php echo form_error('facebook', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label>twitter</label>
								<input type="text" class="form-control" id="twitter" name="twitter" placeholder="twitter" value="<?php echo get_setting('twitter')?>" data-validation="required" tabindex=1>
								<?php echo form_error('twitter', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label>linkedin</label>
								<input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="linkedin" value="<?php echo get_setting('linkedin')?>" data-validation="required" tabindex=1>
								<?php echo form_error('linkedin', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label>Instagram</label>
								<input type="text" class="form-control" id="instagram" name="instagram" placeholder="instagram" value="<?php echo get_setting('instagram')?>" data-validation="required" tabindex=1>
								<?php echo form_error('instagram', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label>Youtube</label>
								<input type="text" class="form-control" id="youtube" name="youtube" placeholder="Youtube" value="<?php echo get_setting('youtube')?>" data-validation="required" tabindex=1>
								<?php echo form_error('youtube', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label>Whatsapp</label>
								<input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="Whatsapp" value="<?php echo get_setting('whatsapp')?>" data-validation="required" tabindex=1>
								<?php echo form_error('whatsapp', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
					
						<div class="col-md-6">
							<div class="form-group">
								<label>Default Meta Title</label>
								<input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Meta Title" value="<?php echo get_setting('meta_title')?>" data-validation="required" tabindex=1>
								<?php echo form_error('meta_title', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							<div class="form-group">
								<label>Default Meta Keywords</label>
								<input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords" value="<?php echo get_setting('meta_keywords')?>" data-validation="required" tabindex=1>
								<?php echo form_error('meta_keywords', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label>Default Meta Description</label>
								<textarea class="form-control" id="meta_description" name="meta_description" rows="5"><?php echo get_setting('meta_description')?></textarea>
								<?php echo form_error('meta_description', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label>Google Map Script</label>
								<textarea class="form-control" id="google_map_script" name="google_map_script" rows="5"><?php echo get_setting('google_map_script')?></textarea>
								<?php echo form_error('google_map_script', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label>Google Analytics Code</label>
								<textarea class="form-control" id="google_analytice_code" name="google_analytice_code" rows="5"><?php echo get_setting('google_analytice_code')?></textarea>
								<?php echo form_error('google_analytice_code', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						
						<div class="col-md-6">
					
						</div>
						
						<div class="col-md-6">
					
						</div>
						
						
						<div class="col-md-12">
							<div class="form-group">
								<label>Limit Per Page</label>
								<input type="text" class="form-control" id="limit" name="limit" placeholder="Limit Per Page" value="<?php echo get_setting('limit')?>" data-validation="required" tabindex=1>
								<?php echo form_error('limit', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							
						</div>
						
						<div class="form-group col-md-12">
							<label>Shipping</label>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label>Shipping Rate</label>
								<input type="text" class="form-control" id="shipping_rate" name="shipping_rate" placeholder="Shipping Rate" value="<?php echo get_setting('shipping_rate')?>" data-validation="required" tabindex=1>
								<?php echo form_error('shipping_rate', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label>Minimum Shipping Amount</label>
								<input type="text" class="form-control" id="min_shipping_amount" name="min_shipping_amount" placeholder="Minimum Shipping Amount" value="<?php echo get_setting('min_shipping_amount')?>" data-validation="required" tabindex=1>
								<?php echo form_error('min_shipping_amount', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						
						
					</div>
				</div>
				<div class="box-footer">
					<button type="submit" id="settings_submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>