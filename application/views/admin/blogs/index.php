<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<div class="col-md-3" style="padding-left: 0px;"><h3 class="box-title">Blogs</h3></div>
				<div class="col-md-9 text-right"><a href="<?php echo site_url(); ?>admin/blogs/add"><button type="button" id="add_class_submit" class="btn btn-primary">Add New Blog</button></a></div>
            </div>
			<div class="box-header">
			<?php echo form_open_multipart("admin/blogs" , array('id'=>'search'))?>
				<?php 
				if($_SESSION['blog_serach']['searchTerm'] != ""){ 
					$searchTerm			=	$_SESSION['blog_serach']['searchTerm'];
				}else{
					$searchTerm			=	"";
				}
				?>
				<div class="col-md-3 text-right" style="padding-left: 0px;">
					<input type="text" class="form-control" id="searchTerm" name="searchTerm" placeholder="Search By Title" value="<?php echo $searchTerm; ?>"/>	
				</div>
				<?php 
				if($_SESSION['blog_serach']['category_id'] != ""){ 
					$category_id			=	$_SESSION['blog_serach']['category_id'];
				}else{
					$category_id			=	"";
				}
				?>
				<div class="col-md-3 text-right"  style="padding-left: 0px;">
					<select class="form-control" id="category_id" name="category_id"  tabindex=9>
						<option value="">Choose Category</option>
						<?php foreach($categories as $category){ ?>
						<option value="<?php echo $category->id; ?>" <?php if($category_id == $category->id){ ?> selected <?php } ?> ><?php echo $category->title; ?></option>
						<?php } ?>
						
					</select>
				</div>
				<?php 
				if($_SESSION['blog_serach']['status'] != ""){ 
					$status			=	$_SESSION['blog_serach']['status'];
				}else{
					$status			=	"";
				}
				?>
				<div class="col-md-3 text-right"  style="padding-left: 0px;">
					<select class="form-control" id="status" name="status"  tabindex=9>
						<option value="">Choose Status</option>
						<option value="1" <?php if($status == '1'){ ?> selected <?php } ?> >Active</option>
						<option value="0" <?php if($status == '0'){ ?> selected <?php } ?> >InActive</option>
					</select>
				</div>
				
				<div class="col-md-3 text-right"  style="padding-left: 0px;">
					<button type="submit" id="add_class_submit" class="btn btn-primary">Submit</button>
					<a href="<?php echo site_url(); ?>admin/blogs/search_reset"><button type="button" id="add_class_submit" class="btn btn-primary">Reset Search</button></a>
				</div>
			</form>	
			</div>
			<?php
			
			if(isset($sorting) && $sorting == "TITLEASC"){
				$title_sorting	=	"TITLEDESC";
			}else{
				$title_sorting	=	"TITLEASC";
			}
			
			if(isset($sorting) && $sorting == "CBYASC"){
				$cby_sorting	=	"CBYDESC";
			}else{
				$cby_sorting	=	"CBYASC";
			}
			
			if(isset($sorting) && $sorting == "CDATEASC"){
				$cdate_sorting	=	"CDATEDESC";
			}else{
				$cdate_sorting	=	"CDATEASC";
			}
			
			if(isset($sorting) && $sorting == "STATUSASC"){
				$status_sorting	=	"STATUSDESC";
			}else{
				$status_sorting	=	"STATUSASC";
			}
			
			?>
			
			
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						<th width="40%">
							<a href="<?php echo site_url(); ?>admin/blogs/index/<?php echo $pageno; ?>/<?php echo $title_sorting; ?>">
								Title
							</a>
						</th>
						<th>Category</th>
						
						<th>
							<a href="<?php echo site_url(); ?>admin/blogs/index/<?php echo $pageno; ?>/<?php echo $cby_sorting; ?>">
								Created By
							</a>
						</th>
						<th>
							<a href="<?php echo site_url(); ?>admin/blogs/index/<?php echo $pageno; ?>/<?php echo $cdate_sorting; ?>">
								Created Date
							</a>
						</th>
						<th style="text-align: center;">
							<a href="<?php echo site_url(); ?>admin/blogs/index/<?php echo $pageno; ?>/<?php echo $status_sorting; ?>">
								Status
							</a>
						</th>
						<th style="text-align: center;">Action</th>
					</tr>
					<?php foreach($pages as $page){?>
					<tr>
						<td><?php echo $page->title;?></td>
						<td>
						<?php 
							$categoryarray			=	explode(',', $page->category_id);
							$categoryarray			=	array_filter($categoryarray);
							
							foreach($categoryarray as $categorya){
								echo get_category_name_by_id($categorya) . "<br />";
							}
							
						?>
						</td>
						<td><?php echo $page->created_by;?></td>
						<td><?php echo date('D M d, Y', $page->created_date); ?></td>
						<td style="text-align: center;">
							<?php if($page->status == '1'){ ?>
								<a href="<?php echo site_url()."admin/blogs/status_change/".$page->id."/0"; ?>">
									<i class="fa fa-check" aria-hidden="true" style="color:green; font-size: 20px;"></i> <b>Active</b>
								</a>
							<?php }else{ ?>
								<a href="<?php echo site_url()."admin/blogs/status_change/".$page->id."/1"; ?>">
									<i class="fa fa-times" aria-hidden="true" style="color:red; font-size: 20px;"></i> <b>Inactive</b>
								</a>
							<?php } ?>
						</td>	
						<td style="text-align: center;">
							<a href="<?php echo site_url()."admin/blogs/edit/".$page->id?>">
								<i class="fa fa-pencil-square-o" aria-hidden="true" style="color:#000; font-size: 20px;"></i>
							</a>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo site_url()."admin/blogs/delete/".$page->id?>">
								<i class="fa fa-trash" aria-hidden="true" style="color:#000; font-size: 20px;"></i>
							</a>
						</td>
						
					</tr>
					<?php }?>
				</table>
			</div>
			<div class="box-footer clearfix">
				<?php echo $pagination;?>
            </div>
		</div>
	</div>
</div>