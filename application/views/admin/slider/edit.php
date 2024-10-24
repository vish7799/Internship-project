<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<?php echo form_open_multipart("admin/slider/edit" , array('id'=>'edit_slider'))?>
				<div class="box-header with-border">
					<h3 class="box-title">Edit Slider</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Heading 1</label> 
								<textarea class="form-control" id="heading_one" name="heading_one"><?php echo $page->heading_one;?></textarea>
								<?php echo form_error('heading_one', '<span class="help-block form-error">', '</span>'); ?>
								
								<?php echo form_error('heading_one', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Heading 2</label> 
								<textarea class="form-control" id="heading_two" name="heading_two"><?php echo $page->heading_two;?></textarea>
								<?php echo form_error('heading_two', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Image</label>
								<input type="file" class="form-control" id="image" name="image">
								<input type="hidden" name="old_image" value="<?php echo $page->image;?>"/>
								<?php echo form_error('image', '<span class="help-block form-error">', '</span>'); ?>
								<?php
								if(file_exists('./assets/photo/slider/'.$page->image)){
									?><img style="width:100%; margin-top:10px;" src="<?php echo site_url()?>/assets/photo/slider/<?php echo $page->image;?>"><?php
								}
								?>
							</div>
							
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label>Mobile Image <small style="color: #ff0000;">Size 1920 * 1000</small></label>
								<input type="file" class="form-control" id="mimage" name="mimage">
								<input type="hidden" name="old_mimage" value="<?php echo $page->mimage;?>"/>
								<?php echo form_error('image', '<span class="help-block form-error">', '</span>'); ?>
								<?php
								if(file_exists('./assets/photo/slider/'.$page->mimage)){
									?><img style="width:100%; margin-top:10px;" src="<?php echo site_url()?>/assets/photo/slider/<?php echo $page->mimage;?>"><?php
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
					<button type="button" onclick="window.location.href='<?php echo site_url()?>admin/slider'" class="btn btn-primary">Back</button>
				</div>
			</form>
		</div>
	</div>
</div>