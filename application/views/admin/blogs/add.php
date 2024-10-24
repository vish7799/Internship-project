<style>
	div.ex3 {
	  border: 1px solid #eee; 
	  background: #eee;
	  padding: 5px;
	  width: 100%;
	  height: 175px;
	  overflow: auto;
	}
	div.ex2 {
	  border: 1px solid #eee; 
	  background: #eee;
	  padding: 5px;
	  width: 100%;
	  height: 100px;
	  overflow: auto;
	}
	div.ex1 {
	  border: 1px solid #eee; 
	  background: #eee;
	  padding: 5px;
	  width: 100%;
	  height: 130px;
	  overflow: auto;
	}
</style>
<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<?php echo form_open_multipart("admin/blogs/add" , array('id'=>'add_cms'))?>
				<div class="box-header with-border">
					<h3 class="box-title">Add Blog</h3>
				</div>
				
				<div class="box-body">
					<div class="col-md-9" style="padding-left: 0px;">
						<div class="row">
							<div class="col-md-5">
								<div class="form-group">
									<label>Title</label> 
									<input type="text" class="form-control" id="title_blog" name="title" placeholder="Title" data-validation="required" tabindex=1 value="<?php echo set_value('title')?>">
									<?php echo form_error('title', '<span class="help-block form-error">', '</span>'); ?>
								</div>
								
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label>Slug</label> 
									<input type="text" class="form-control" id="slug" name="slug" data-validation="required" tabindex=1 value="<?php echo set_value('slug')?>">
									<?php echo form_error('slug', '<span class="help-block form-error">', '</span>'); ?>
								</div>
							</div>
							<div class="col-md-2">
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
				
					<div class="col-md-3" style="padding-left: 0px;">
					
						<div class="col-md-12">
							<div class="form-group">
								<label>Category</label>
								<div class="ex3">
									<?php foreach($categories as $category){ ?>
										<input type="checkbox" id="category_id" name="category_id[]" value="<?php echo $category->id; ?>" style="margin-bottom: 10px;"> <?php echo $category->title; ?><br />
									<?php } ?>
								</div>
								<?php echo form_error('category_id', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						
						<div class="col-md-12">
							<div class="form-group">
								<label>Tag</label>
								<div class="ex1">
									<?php foreach($tags as $tag){ ?>
										<input type="checkbox" id="tag" name="tag[]" value="<?php echo $tag->id; ?>" style="margin-bottom: 10px;"> <?php echo $tag->title; ?><br />
									<?php } ?>
								
								</div>
								<div class="ex2">
									<br />
									<label>Other Blog Tag <small>(Separate tags with commas)</small></label> 
									<input type="text" class="form-control" id="other_tag" name="other_tag" data-validation="required" tabindex=1 value="<?php echo set_value('other_tag')?>">
								</div>
								
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
								<label>Meta Keyword</label> 
								<input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords" data-validation="required" tabindex=1 value="<?php echo set_value('meta_keywords');?>">
								<?php echo form_error('meta_keywords', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							<div class="form-group">
								<label>Cretaed By</label> 
								<input type="text" class="form-control" id="created_by" name="created_by" placeholder="Created By" data-validation="required" tabindex=1 value="<?php echo set_value('created_by');?>">
								<?php echo form_error('created_by', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							<div class="form-group">
								<label>Created Date</label> 
								<input type="date" class="form-control" id="created_date" name="created_date" placeholder=" Created Date" data-validation="required" tabindex=1 value="<?php echo set_value('created_date');?>">
								<?php echo form_error('created_date', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Meta Description</label> 
								<textarea class="form-control" id="meta_description" rows="8" name="meta_description" placeholder="Meta Description"><?php echo set_value('meta_description')?></textarea>
								<?php echo form_error('meta_description', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							
						</div>
						
					</div>
					
					<div class="row">
						
						<div class="col-md-3">
							<div class="form-group">
								<label>Cover Image</label> 
								<input type="file" class="form-control" id="image" name="image" value="<?php echo set_value('image')?>">
								<?php echo form_error('image', '<span class="help-block form-error">', '</span>'); ?>
							</div>	
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
								<label>Featured Image</label> 
								<input type="file" class="form-control" id="fimage" name="fimage" value="<?php echo set_value('fimage')?>">
								<?php echo form_error('fimage', '<span class="help-block form-error">', '</span>'); ?>
							</div>	
						</div>
						
						<div class="col-md-6">	
							<div class="form-group">
								<label>Gallery Images (You can choose multiple images at once)</label> 
								<input type="file" class="form-control" id="other_image" multiple name="other_image[]" placeholder="Other Images" data-validation="required" value="<?php echo set_value('other_image');?>"  tabindex=7>
								<?php echo form_error('other_image', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						
					</div>
							
					
				</div>
				<div class="box-footer">
					<button type="submit" id="add_class_submit" class="btn btn-primary">Submit</button>
					<button type="button" onclick="window.location.href='<?php echo site_url()?>admin/blogs'" class="btn btn-primary">Back</button>
				</div>
			</form>
		</div>
	</div>
</div>