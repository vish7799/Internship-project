<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<div class="col-md-3" style="padding-left: 0px;"><h3 class="box-title">Blog Tags</h3></div>
				<div class="col-md-9 text-right"><a href="<?php echo site_url(); ?>admin/blogs/add_tag"><button type="button" id="add_class_submit" class="btn btn-primary">Add New Blog Tag</button></a></div>
            </div>
			<div class="box-header">
			<?php echo form_open_multipart("admin/blogs/tag" , array('id'=>'search'))?>
				<?php 
				if($_SESSION['blog_serach_tag']['searchTerm'] != ""){ 
					$searchTerm			=	$_SESSION['blog_serach_tag']['searchTerm'];
				}else{
					$searchTerm			=	"";
				}
				?>
				<div class="col-md-5 text-right" style="padding-left: 0px;">
					<input type="text" class="form-control" id="searchTerm" name="searchTerm" placeholder="Search By Title" value="<?php echo $searchTerm; ?>"/>	
				</div>
				
				<?php 
				if($_SESSION['blog_serach_tag']['status'] != ""){ 
					$status			=	$_SESSION['blog_serach_tag']['status'];
				}else{
					$status			=	"";
				}
				?>
				<div class="col-md-4 text-right"  style="padding-left: 0px;">
					<select class="form-control" id="status" name="status"  tabindex=9>
						<option value="">Choose Status</option>
						<option value="1" <?php if($status == '1'){ ?> selected <?php } ?> >Active</option>
						<option value="0" <?php if($status == '0'){ ?> selected <?php } ?> >InActive</option>
					</select>
				</div>
				
				<div class="col-md-3 text-right"  style="padding-left: 0px;">
					<button type="submit" id="add_class_submit" class="btn btn-primary">Submit</button>
					<a href="<?php echo site_url(); ?>admin/blogs/search_reset_tag"><button type="button" id="add_class_submit" class="btn btn-primary">Reset Search</button></a>
				</div>
			</form>	
			</div>
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						<th width="40%">Title</th>
						<th>Slug</th>
						<th style="text-align: center;">Status</th>
						<th style="text-align: center;">Action</th>
					</tr>
					<?php foreach($pages as $page){?>
					<tr>	
						<td><?php echo $page->title;?></td>
						<td><?php echo $page->slug;?></td>
						<td style="text-align: center;">
							<?php if($page->status == '1'){ ?>
								<a href="<?php echo site_url()."admin/blogs/tag_status_change/".$page->id."/0"; ?>">
									<i class="fa fa-check" aria-hidden="true" style="color:green; font-size: 20px;"></i> <b>Active</b>
								</a>
							<?php }else{ ?>
								<a href="<?php echo site_url()."admin/blogs/tag_status_change/".$page->id."/1"; ?>">
									<i class="fa fa-times" aria-hidden="true" style="color:red; font-size: 20px;"></i> <b>Inactive</b>
								</a>
							<?php } ?>
						</td>
						<td style="text-align: center;">
							<a href="<?php echo site_url()."admin/blogs/edit_tag/".$page->id?>">
								<i class="fa fa-pencil-square-o" aria-hidden="true" style="color:#000; font-size: 20px;"></i>
							</a>
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>
			<div class="box-footer clearfix">
				<?php echo $pagination;?>
            </div>
		</div>
	</div>
</div>