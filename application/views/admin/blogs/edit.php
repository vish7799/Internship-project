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
			<?php echo form_open_multipart("admin/blogs/edit" , array('id'=>'edit_courses'))?>
				<div class="box-header with-border">
					<h3 class="box-title">Edit Blog</h3>
				</div>
				<div class="box-body">
					<div class="col-md-9" style="padding-left: 0px;">
						<div class="row">
							<div class="col-md-5">
								<div class="form-group">
									<label>Title</label> 
									<input type="text" class="form-control" id="title_blog" name="title" placeholder="Title" data-validation="required" tabindex=1 value="<?php echo $page->title;?>">
									<?php echo form_error('title', '<span class="help-block form-error">', '</span>'); ?>
								</div>
								
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label>Slug</label> 
									<input type="text" class="form-control" id="slug" name="slug" data-validation="required" tabindex=1 value="<?php echo $page->slug;?>">
									<?php echo form_error('slug', '<span class="help-block form-error">', '</span>'); ?>
								</div>
							</div>
							<div class="col-md-2">
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
					
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Description</label> 
									<textarea class="form-control" id="page_editor" name="description" placeholder="Description"><?php echo $page->description;?></textarea>
									<?php echo form_error('description', '<span class="help-block form-error">', '</span>'); ?>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-3" style="padding-left: 0px;">
						<?php 
							$categoryarray			=	explode(',', $page->category_id);
							$categoryarray			=	array_filter($categoryarray);
						?>
						<div class="col-md-12">
							<div class="form-group">
								<label>Category</label>
								<div class="ex3">
									<?php foreach($categories as $category){ ?>
										<input type="checkbox" id="category_id" name="category_id[]" value="<?php echo $category->id; ?>" style="margin-bottom: 10px;" <?php if(in_array($category->id, $categoryarray)){ ?> checked <?php } ?>> <?php echo $category->title; ?><br />
									<?php } ?>
								</div>
								<?php echo form_error('category_id', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						<?php 
							$tagarray			=	explode(',', $page->tag);
							$tagarray			=	array_filter($tagarray);
						?>
						<div class="col-md-12">
							<div class="form-group">
								<label>Tag</label>
								<div class="ex1">
									<?php foreach($tags as $tag){ ?>
										<input type="checkbox" id="tag" name="tag[]" value="<?php echo $tag->id; ?>" style="margin-bottom: 10px;" <?php if(in_array($tag->id, $tagarray)){ ?> checked <?php } ?>> <?php echo $tag->title; ?><br />
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
								<input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Meta Title" data-validation="required" tabindex=1 value="<?php echo $page->meta_title;?>">
								<?php echo form_error('meta_title', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							<div class="form-group">
								<label>Meta Keywords</label> 
								<input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords" data-validation="required" tabindex=1 value="<?php echo $page->meta_keywords;?>">
								<?php echo form_error('meta_keywords', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							<div class="form-group">
								<label>Cretaed By</label> 
								<input type="text" class="form-control" id="created_by" name="created_by" placeholder="Created By" data-validation="required" tabindex=1 value="<?php echo $page->created_by;?>">
								<?php echo form_error('created_by', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							<div class="form-group">
								<label>Created Date</label> 
								<input type="date" class="form-control" id="created_date" name="created_date" placeholder=" Created Date" data-validation="required" tabindex=1 value="<?php echo date('Y-m-d', $page->created_date);?>">
								<?php echo form_error('created_date', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Meta Description</label> 
								<textarea class="form-control" id="meta_description" rows="9" name="meta_description" placeholder="Meta Description"><?php echo $page->meta_description;?></textarea>
								<?php echo form_error('meta_description', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							
						</div>
					</div>
					
					<div class="row">
						
						
						
						<div class="col-md-3">
							<div class="form-group">
								<label>Cover Image</label>
								<input type="file" class="form-control" id="image" name="image">
								<input type="hidden" name="old_image" value="<?php echo $page->image;?>"/>
								<?php echo form_error('image', '<span class="help-block form-error">', '</span>'); ?>
								<?php
								if($page->image != "" && file_exists('./assets/photo/blogs/'.$page->image)){
									?><img style="width:100px;margin-top:10px;" src="<?php echo site_url()?>/assets/photo/blogs/<?php echo $page->image;?>"><?php
								}
								?>
							</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
								<label>Featured Image</label>
								<input type="file" class="form-control" id="fimage" name="fimage">
								<input type="hidden" name="old_fimage" value="<?php echo $page->fimage;?>"/>
								<?php echo form_error('fimage', '<span class="help-block form-error">', '</span>'); ?>
								<?php
								if($page->fimage != "" && file_exists('./assets/photo/blogs/featured/'.$page->fimage)){
									?><img style="width:100px;margin-top:10px;" src="<?php echo site_url()?>/assets/photo/blogs/featured/<?php echo $page->fimage;?>"><?php
								}
								?>
							</div>
						</div>
						
						<div class="col-md-6">	
							<div class="form-group">
								<label>Gallery Images (You can choose multiple images at once)</label> 
								<input type="file" class="form-control" id="other_image" multiple name="other_image[]" placeholder="Other Images" data-validation="required" value="<?php echo set_value('other_image');?>"  tabindex=7>
								<?php echo form_error('other_image', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							<?php 
							//print_r($images);
							foreach($blog_images as $image){
								?>
								<div class="slider_box">
									<img src="<?php echo site_url();?>assets/photo/blogs/other/<?php echo $image->image;?>" style="width:100px; border:solid 2px #ccc; padding:5px; float:left;"/>
									<div class="hover_box">
										<button type="button" onclick="deleteFile('<?php echo $page->id?>','<?php echo $image->id?>');">Delete</button>
									</div>
								</div>
								<?php
							}
							?>
						</div>
						
					</div>
					
				</div>
				<div class="box-footer">
					<input type="hidden" name="page_id" value="<?php echo $page->id;?>" />
					<button type="submit" id="add_class_submit" class="btn btn-primary">Submit</button>
					<button type="button" onclick="window.location.href='<?php echo site_url()?>admin/blogs'" class="btn btn-primary">Back</button>
				</div>
			</form>
		</div>
	</div>
</div>

<style>
.slider_box{position:relative;float:left;margin:0 5px;}
.hover_box{    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
	text-align:center;
    background: rgba(0,0,0,.5);display:none;}
.hover_box button{    margin-top: 23%;
    background: none;
    border: none;
    color: #fff;
    font-size: 18px;}
.hover_box button:hover{text-decoration:underline;}
.slider_box:hover .hover_box{display:block;}
</style>
<script>
function deleteFile(product_id,file_id){
	if(confirm("Are you sure you want to delete this file?")){
		window.location.href = site_url + "blogs/delete_image/"+product_id+'/'+file_id;
	}
}
</script>