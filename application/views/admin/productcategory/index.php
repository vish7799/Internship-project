<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<div class="col-md-6">
					<h3 class="box-title">Categories</h3>
				</div>
				<div class="col-md-6 text-right">
					<?php echo form_open_multipart("admin/productcategory" , array('id'=>'search'))?>
					<input type="text" class="form-control" id="searchTerm" name="searchTerm" placeholder="Search" value=""/>	
					</form>	
				</div>
            </div>
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						<th>ID</th>
						<th>Image</th>
						<th>Title</th>
						<th>Parent Category</th>
						<th style="text-align: center;">Status</th>
						<th style="text-align: center;">Action</th>
					</tr>
					<?php foreach($productcategory as $pcategory){?>
					<tr>
						<td><?php echo $pcategory->id;?></td>
						<td>
							<?php
								if(file_exists('./assets/photo/productcategory/'.$pcategory->image)){
									?><img style="height:20px;margin-top:10px;" src="<?php echo site_url()?>/assets/photo/productcategory/<?php echo $pcategory->image;?>"><?php
								}
							?>
						</td>
						<td>
							<a href="<?php echo site_url()."admin/productcategory/edit_productcategory/".$pcategory->id?>">
								<?php echo ucwords($pcategory->title);?>
							</a>
						</td>						
						<td>
							<?php echo parent_category($pcategory);?>
						</td>
						
						<td style="text-align: center;">
							<?php if($pcategory->status == '1'){ ?>
								<a href="<?php echo site_url()."admin/productcategory/status_change/".$pcategory->id."/0"; ?>">
									<i class="fa fa-check" aria-hidden="true" style="color:green; font-size: 20px;"></i>
								</a>
							<?php }else{ ?>
								<a href="<?php echo site_url()."admin/productcategory/status_change/".$pcategory->id."/1"; ?>">
									<i class="fa fa-times" aria-hidden="true" style="color:red; font-size: 20px;"></i>
								</a>
							<?php } ?>
						</td>
						<td style="text-align: center;">
							<a href="<?php echo site_url()."admin/productcategory/edit_productcategory/".$pcategory->id?>">
								<i class="fa fa-pencil-square-o" aria-hidden="true" style="color:#000; font-size: 20px;"></i>
							</a>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="javascript:void(0)" onclick="if(confirm('Are you sure you want to delete this entry')){ window.location.href= '<?php echo site_url()."admin/productcategory/delete_productcategory/".$pcategory->id?>';}">
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

<script>
document.getElementById("searchTerm").onkeypress = function(event){
	if (event.keyCode == 13 || event.which == 13){
		document.getElementById("products").submit();
	}
};
</script>