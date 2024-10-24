<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<?php echo form_open_multipart("admin/cms/add" , array('id'=>'add_cms'))?>
				<div class="box-header with-border">
					<h3 class="box-title">Add Page</h3>
				</div>
				
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Title</label> 
								<input type="text" class="form-control" id="cms_title" name="title" placeholder="Title" data-validation="required" tabindex=1 value="<?php echo set_value('title')?>">
								<?php echo form_error('title', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Slug</label> 
								<input type="text" class="form-control" id="slug" name="slug" readonly data-validation="required" tabindex=1 value="<?php echo set_value('slug')?>">
								<?php echo form_error('slug', '<span class="help-block form-error">', '</span>'); ?>
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
								<label>Meta Title</label> 
								<input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Meta Title" data-validation="required" tabindex=1 value="<?php echo set_value('meta_title');?>">
								<?php echo form_error('meta_title', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							<div class="form-group">
								<label>Meta Keywords</label> 
								<input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords" data-validation="required" tabindex=1 value="<?php echo set_value('meta_keywords');?>">
								<?php echo form_error('meta_keywords', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Meta Description</label> 
								<textarea class="form-control" id="meta_description" rows="5" name="meta_description" placeholder="Meta Description"><?php echo set_value('meta_description')?></textarea>
								<?php echo form_error('meta_description', '<span class="help-block form-error">', '</span>'); ?>
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