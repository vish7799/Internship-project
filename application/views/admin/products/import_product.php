<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<?php echo form_open_multipart("admin/products/import_product" , array('id'=>'add_product'))?>
				<div class="box-header with-border">
					<h3 class="box-title">Import Product</h3>
				</div>
				<div class="box-body">
						
					<div class="row">	
						
						<div class="col-md-6">						
							<div class="form-group">
								<label>Upload Product CSV</label> 
								<input type="file" class="form-control" id="image" name="image" placeholder="Image" data-validation="required" value="<?php echo set_value('image');?>"  tabindex=7>
								<?php echo form_error('image', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						
						
						
					</div>
				</div>
				<div class="box-footer">
					<button type="submit" id="add_class_submit" class="btn btn-primary">Submit</button>
					<button type="button" onclick="window.location.href='<?php echo site_url()?>admin/import_product'" id="add_teacher_back" class="btn btn-primary">Back</button>
				</div>
			</form>
		</div>
	</div>
</div>