<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<?php echo form_open_multipart("admin/productcategory/edit_productcategory/".$productcategory->id , array('id'=>'edit_productcategory'))?>
				<div class="box-header with-border">
					<h3 class="box-title">Edit Category</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Title</label> 
								<input type="text" class="form-control" id="category_title" name="title" placeholder="Title" data-validation="required" value="<?php echo set_value('title',$productcategory->title);?>"  tabindex=1>
								<?php echo form_error('title', '<span class="help-block form-error">', '</span>'); ?>
							</div>							
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label>Slug</label> 
								<input type="text" class="form-control" id="slug" name="slug" readonly data-validation="required" tabindex=1 value="<?php echo set_value('slug',$productcategory->slug);?>">
								<?php echo form_error('slug', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						
						<div class="col-md-12">
							<div class="form-group">
								<label>Description</label> 
								<textarea type="text" class="form-control" id="page_editor" rows=5 name="description" placeholder="Description" data-validation="required"  tabindex=1><?php echo set_value('description',$productcategory->description);?></textarea>
								<?php echo form_error('description', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Image</label> 
								<input type="file" class="form-control" id="image" name="image" placeholder="Image" data-validation="required" value="<?php echo set_value('image',$productcategory->image);?>"  tabindex=7>
								<?php echo form_error('image', '<span class="help-block form-error">', '</span>'); ?>
								<input type="hidden" name="old_image" value="<?php echo $productcategory->image;?>"/>
								<?php
								if(file_exists('./assets/photo/productcategory/'.$productcategory->image)){
									?><img style="width:100px;margin-top:10px;" src="<?php echo site_url()?>/assets/photo/productcategory/<?php echo $productcategory->image;?>"><?php
								}
								?>
							</div>
							<div class="form-group">
								<label>Status</label>
								<select class="form-control" id="status" name="status"  tabindex=8>
									<option value="1" <?php if($productcategory->status == 1){ echo "selected=selected";}?>>Active</option>
									<option value="0" <?php if($productcategory->status == 0){ echo "selected=selected";}?>>In Active</option>
								</select>
								<?php echo form_error('status', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Parent Category</label>
								<select class="form-control" id="parent" name="parent"  tabindex=8>
									<option value="0">No Category</option>
									<?php echo get_category_options(0, $productcategory);?>
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
				<input type="hidden" name="productcategory_id" id="productcategory_id" value="<?php echo $productcategory->id?>" />
			</form>
		</div>
	</div>
</div>