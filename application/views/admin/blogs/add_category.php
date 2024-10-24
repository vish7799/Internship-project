<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<?php echo form_open_multipart("admin/blogs/add_category" , array('id'=>'add_cms'))?>
				<div class="box-header with-border">
					<h3 class="box-title">Add Blog Category</h3>
				</div>
				
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Title</label> 
								<input type="text" class="form-control" id="blog_category_title" name="title" placeholder="Title" data-validation="required" tabindex=1 value="<?php echo set_value('title')?>">
								<?php echo form_error('title', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Slug</label> 
								<input type="text" class="form-control" readonly id="slug" name="slug" data-validation="required" tabindex=1 value="<?php echo set_value('slug')?>">
								<?php echo form_error('slug', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Parent Category Name</label>
								<select name="parent_id" id="parent_id" class="form-control" data-validation="required" tabindex=3>
									<option value="0">Select Parent Category</option>
									<?php foreach($pcategories as $pcategory){ ?>
										<option value="<?php echo $pcategory->id; ?>"><?php echo $pcategory->title; ?></option>
									<?php } ?>
								 </select>
								 <?php echo form_error('parent_id', '<span class="help-block form-error">', '</span>'); ?>
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
					
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Description</label> 
								<textarea class="form-control" id="page_editor" name="description" placeholder="Description"><?php echo set_value('description')?></textarea>
								<?php echo form_error('description', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
					</div>
							
					
				</div>
				<div class="box-footer">
					<button type="submit" id="add_class_submit" class="btn btn-primary">Submit</button>
					<button type="button" onclick="window.location.href='<?php echo site_url()?>admin/blogs/category'" class="btn btn-primary">Back</button>
				</div>
			</form>
		</div>
	</div>
</div>