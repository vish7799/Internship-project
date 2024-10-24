<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
              <h3 class="box-title">Media</h3>
            </div>
			<?php echo form_open_multipart("admin/Media/index" , array('id'=>'add_media'))?>
				<div class="box-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Image</label> 
								<input type="file" class="form-control" id="image" name="image[]" multiple value="<?php echo set_value('image')?>">
								<?php echo form_error('image', '<span class="help-block form-error">', '</span>'); ?>
							</div>							
						</div>
					</div>					
				</div>
				<div class="box-footer">
					<input type="hidden" name="id" value="1" />
					<button type="submit" id="add_class_submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
					
					<table class="table table-hover">
						<tr>
							<th>Image</th>
							<th>URL</th>
							<th style="text-align: center;">Delete</th>
						</tr>
							<?php if(!empty($images)){
							foreach($images as $image){
							?>
						<tr>
							<td>
								<img src="<?php echo site_url();?>assets/photo/media/<?php echo $image->image;?>" style="width:100px;"/>
							</td>
							<td>
								<?php echo site_url();?>assets/photo/media/<?php echo $image->image;?>
							</td>
							<td style="text-align: center;">
								<a onclick="return confirm('Are you sure, you want to delete it?')" href="<?php echo site_url()."admin/media/delete/".$image->id?>"><i class="fa fa-trash" aria-hidden="true" style="color:#000; font-size: 20px;"></i></a>
							</td>
						</tr>
							<?php } }?>
					</table>
											
					</div>
				</div>					
			</div>
		</div>
	</div>
</div>
<style>
.image_box{width:18%;float:left;margin:1%;position:relative;}
.image_box img{width:100%;height:200px;}
.image_delete{    position: absolute;bottom: 0;width: 100%;background: rgba(255,255,255,.8);text-align: center;padding: 5px 0;text-transform: uppercase;cursor:pointer;}
</style>