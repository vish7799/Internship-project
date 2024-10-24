<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<?php echo form_open_multipart("admin/testimonials/add" , array('id'=>'add_testimonials'))?>
				<div class="box-header with-border">
					<h3 class="box-title">Add Testimonial </h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Name</label> 
								<input type="text" class="form-control" id="cms_title" name="name" placeholder="Name" data-validation="required" tabindex=1 value="<?php echo set_value('name')?>">
								<?php echo form_error('name', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label>Post</label> 
								<input type="text" class="form-control" id="post" name="post" placeholder="Post" data-validation="required" tabindex=1 value="<?php echo set_value('post')?>">
								<?php echo form_error('post', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Description</label> 
								<textarea class="form-control" id="page_editor" name="description" placeholder="Description"><?php echo set_value('description')?></textarea>
								<?php echo form_error('description', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Cover Image</label> 
								<input type="file" class="form-control" id="image" name="image" value="<?php echo set_value('image')?>">
								<?php echo form_error('image', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Status</label>
								<select name="status" id="status" class="form-control" data-validation="required" tabindex=3>
									<option value="1">Active</option>
									<option value="0">Inactive</option>
								 </select>
								 <?php echo form_error('status', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
					</div>
					
				</div>
				<div class="box-footer">
					<button type="submit" id="add_class_submit" class="btn btn-primary">Submit</button>
					<button type="button" onclick="window.location.href='<?php echo site_url()?>admin/cms'" class="btn btn-primary">Back</button>
				</div>
			</form>
		</div>
	</div>
</div>