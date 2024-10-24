<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<?php echo form_open_multipart("admin/productcategory/add_productcategory" , array('id'=>'add_productcategory'))?>
				<div class="box-header with-border">
					<h3 class="box-title">Add category</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Title</label> 
								<input type="text" class="form-control" id="category_title" name="title" placeholder="Title" data-validation="required" value="<?php echo set_value('title');?>"  tabindex=1>
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
						
						<div class="col-md-12">
							<div class="form-group">
								<label>Description</label> 
								<textarea type="text" class="form-control" id="page_editor" rows=5 name="description" placeholder="Description" data-validation="required"  tabindex=1><?php echo set_value('description');?></textarea>
								<?php echo form_error('description', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Image</label> 
								<input type="file" class="form-control" id="image" name="image" placeholder="Image" data-validation="required" value="<?php echo set_value('image');?>"  tabindex=7>
								<?php echo form_error('image', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							<div class="form-group">
								<label>Status</label>
								<select class="form-control" id="status" name="status"  tabindex=8>
									<option value="1">Active</option>
									<option value="0">In Active</option>
								</select>
								<?php echo form_error('status', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Parent Category</label>
								<select class="form-control" id="parent" name="parent"  tabindex=8>
									<option value="0">-No Category</option>
									<?php echo get_category_options(0);?>
								</select>
								<?php echo form_error('status', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button type="submit" id="add_class_submit" class="btn btn-primary">Submit</button>
					<button type="button" onclick="window.location.href='<?php echo site_url()?>admin/productcategory'" id="add_teacher_back" class="btn btn-primary">Back</button>
				</div>
			</form>
		</div>
	</div>
</div>