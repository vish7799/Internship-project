<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<?php echo form_open_multipart("admin/cms/edit" , array('id'=>'edit_cms'))?>
				<div class="box-header with-border">
					<h3 class="box-title">Add Page</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Title</label> 
								<input type="text" class="form-control" id="cms_title" name="title" placeholder="Title" data-validation="required" tabindex=1 value="<?php echo $page->title;?>">
								<?php echo form_error('title', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Slug</label> 
								<input type="text" class="form-control" id="slug" name="slug" readonly data-validation="required" tabindex=1 value="<?php echo $page->slug;?>">
								<?php echo form_error('slug', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Description</label> 
								<textarea class="form-control" id="page_editor" name="description" placeholder="Description"><?php echo $page->description;?></textarea>
								<?php echo form_error('description', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Meta Title</label> 
								<input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Meta Title" data-validation="required" tabindex=1 value="<?php echo $page->meta_title;?>">
								<?php echo form_error('meta_title', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							
							<div class="form-group">
								<label>Meta Keywords</label> 
								<input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords" data-validation="required" tabindex=1 value="<?php echo $page->meta_keywords;?>">
								<?php echo form_error('meta_keywords', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Meta Description</label> 
								<textarea class="form-control" id="meta_description" rows="5" name="meta_description" placeholder="Meta Description"><?php echo $page->meta_description;?></textarea>
								<?php echo form_error('meta_description', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Cover Image</label>
								<input type="file" class="form-control" id="image" name="image">
								<input type="hidden" name="old_image" value="<?php echo $page->image;?>"/>
								<?php echo form_error('image', '<span class="help-block form-error">', '</span>'); ?>
								<?php
								if(file_exists('./assets/photo/cms/'.$page->image)){
									?><img style="width:100px;margin-top:10px;" src="<?php echo site_url()?>/assets/photo/cms/<?php echo $page->image;?>"><?php
								}
								?>
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
					<button type="button" onclick="window.location.href='<?php echo site_url()?>admin/cms'" class="btn btn-primary">Back</button>
				</div>
			</form>
		</div>
	</div>
</div>