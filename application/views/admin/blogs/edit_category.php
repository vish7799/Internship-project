<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<?php echo form_open_multipart("admin/blogs/edit_category" , array('id'=>'edit_courses'))?>
				<div class="box-header with-border">
					<h3 class="box-title">Add Page</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Title</label> 
								<input type="text" class="form-control" id="category_title" name="title" placeholder="Title" data-validation="required" tabindex=1 value="<?php echo $page->title;?>">
								<?php echo form_error('title', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Slug</label> 
								<input type="text" class="form-control" id="slug" name="slug" data-validation="required" tabindex=1 value="<?php echo $page->slug;?>">
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
										<option value="<?php echo $pcategory->id; ?>" <?php if($pcategory->id == $page->parent_id){ ?> selected <?php } ?>><?php echo $pcategory->title; ?></option>
									<?php } ?>
									
								 </select>
								 <?php echo form_error('parent_id', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Status</label>
								<select name="status" id="status" class="form-control" data-validation="required" tabindex=3>
									<option value="1" <?php if($page->status == 1){ echo "selected=selected";}?>>Active</option>
									<option value="0" <?php if($page->status == 0){ echo "selected=selected";}?>>Inactive</option>
								 </select>
								 <?php echo form_error('status', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						
					</div>
					
				</div>
				<div class="box-footer">
					<input type="hidden" name="page_id" value="<?php echo $page->id;?>" />
					<button type="submit" id="add_class_submit" class="btn btn-primary">Submit</button>
					<button type="button" onclick="window.location.href='<?php echo site_url()?>admin/courses'" class="btn btn-primary">Back</button>
				</div>
			</form>
		</div>
	</div>
</div>