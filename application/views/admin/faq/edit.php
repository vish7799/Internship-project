<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<?php echo form_open_multipart("admin/faq/edit" , array('id'=>'edit_faq'))?>
				<div class="box-header with-border">
					<h3 class="box-title">Edit FAQ</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Title</label> 
								<input type="text" class="form-control" id="cms_title" name="title" placeholder="Title" data-validation="required" tabindex=1 value="<?php echo $faq->title;?>">
								<?php echo form_error('title', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Status</label>
								<select name="status" id="status" class="form-control" data-validation="required" tabindex=3>
									<option value="1" <?php if($faq->status == 1){ echo "selected=selected";}?>>Active</option>
									<option value="0" <?php if($faq->status == 0){ echo "selected=selected";}?>>Inactive</option>
								 </select>
								 <?php echo form_error('status', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Description</label> 
								<textarea class="form-control" id="page_editor" name="description" placeholder="Description"><?php echo $faq->description;?></textarea>
								<?php echo form_error('description', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
					</div>
					
				</div>
				<div class="box-footer">
					<input type="hidden" name="page_id" value="<?php echo $faq->id;?>" />
					<button type="submit" id="add_class_submit" class="btn btn-primary">Submit</button>
					<button type="button" onclick="window.location.href='<?php echo site_url()?>admin/faq'" class="btn btn-primary">Back</button>
				</div>
			</form>
		</div>
	</div>
</div>