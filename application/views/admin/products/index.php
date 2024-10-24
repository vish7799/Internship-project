<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<div class="col-md-3">
					<h3 class="box-title">Products</h3>
				</div>
				<div class="col-md-9 text-right">
					<?php echo form_open_multipart("admin/products" , array('id'=>'search'))?>
					<div class="col-md-5 text-right">
					<input type="text" class="form-control" id="searchTerm" name="searchTerm" placeholder="Search" value=""/>	
					</div>
					<div class="col-md-5 text-right">
					<select class="form-control" id="category_id" name="category_id"  tabindex=9>
						<option value="">Choose Category</option>
						<?php echo get_category_options(0);?>
					</select>
					</div>
					<div class="col-md-2 text-right">
						<button type="submit" id="add_class_submit" class="btn btn-primary">Submit</button>
					</div>
					</form>	
				</div>
            </div>
			<?php 
				if($sorting == "SASC"){
					$ssorting	=	"SDESC";
				}else{
					$ssorting	=	"SASC";
				}
			?>
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						
						<th width="25%">Title</th>
						<th>Price</th>
						<th>Offer Price</th>
						<th>Category</th>
						<th>Parent Category</th>
						<th>Image</th>
						<th style="text-align: center;"><a href="<?php echo site_url(); ?>admin/products/index/<?php echo $pageno; ?>/<?php echo $ssorting; ?>">Status</a></th>
						<th style="text-align: center;">Is Fetaure</th>
						<th style="text-align: center;">Action</th>
					</tr>
					<?php foreach($products as $product){?>
					<tr>
						
						<td><?php echo ucwords($product->title);?></td>
						<td><?php echo $product->price;?></td>
						<td><?php echo $product->offer_price;?></td>
						<td><?php echo get_product_category_title($product->category_id);?></td>
						<td><?php echo ucfirst(get_product_category_title($product->parent_category_id));?></td>
						<td><img src='<?php echo site_url(); ?>assets/photo/product/<?php echo $product->image; ?>' style='width:50px;'/></td>
						
						<td style="text-align: center;">
							<?php if($product->status == '1'){ ?>
								<a href="<?php echo site_url()."admin/products/status_change/".$product->id."/0"; ?>">
									<i class="fa fa-check" aria-hidden="true" style="color:green; font-size: 20px;"></i>
								</a>
							<?php }else{ ?>
								<a href="<?php echo site_url()."admin/products/status_change/".$product->id."/1"; ?>">
									<i class="fa fa-times" aria-hidden="true" style="color:red; font-size: 20px;"></i>
								</a>
							<?php } ?>
						</td>
						
						<td style="text-align: center;">
							<?php if($product->is_featured == '1'){ ?>
								<a href="<?php echo site_url()."admin/products/featured_status_change/".$product->id."/0"; ?>">
									<i class="fa fa-check" aria-hidden="true" style="color:green; font-size: 20px;"></i>
								</a>
							<?php }else{ ?>
								<a href="<?php echo site_url()."admin/products/featured_status_change/".$product->id."/1"; ?>">
									<i class="fa fa-times" aria-hidden="true" style="color:red; font-size: 20px;"></i>
								</a>
							<?php } ?>
						</td>
						
						<td style="text-align: center;">
							<a href="<?php echo site_url()."admin/products/edit_product/".$product->id."/".$pageno; ?>">
								<i class="fa fa-pencil-square-o" aria-hidden="true" style="color:#000; font-size: 20px;"></i>
							</a>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="javascript:void(0)" onclick="if(confirm('Are you sure you want to delete this entry')){ window.location.href= '<?php echo site_url()."admin/products/delete_product/".$product->id?>';}">
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