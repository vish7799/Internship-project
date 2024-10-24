<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
				<div class="col-md-6">
					<h3 class="box-title">Coupon Discount</h3>
				</div>
				<div class="col-md-6 text-right">
					<?php echo form_open_multipart("admin/coupon_discount" , array('id'=>'search'))?>
					<input type="text" class="form-control" id="searchTerm" name="searchTerm" placeholder="Search" value=""/>	
					</form>	
				</div>
            </div>
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						<th>ID</th>
						<th>Code</th>
						<th>Type</th>
						<th>Value</th>
						<th style="text-align: center;">Status</th>
						<th style="text-align: center;">Action</th>
					</tr>
					<?php foreach($coupons as $coupon){?>
					<tr>
						<td><?php echo $coupon->id;?></td>
						<td><?php echo $coupon->ccode;?></td>
						<td><?php echo $coupon->ctype;?></td>
						<td><?php echo $coupon->cvalue;?></td>
						
						
						
						<td style="text-align: center;">
							<?php if($coupon->status == '1'){ ?>
								<a href="<?php echo site_url()."admin/coupon_discount/status_change/".$coupon->id."/0"; ?>">
									<i class="fa fa-check" aria-hidden="true" style="color:green; font-size: 20px;"></i>
								</a>
							<?php }else{ ?>
								<a href="<?php echo site_url()."admin/coupon_discount/status_change/".$coupon->id."/1"; ?>">
									<i class="fa fa-times" aria-hidden="true" style="color:red; font-size: 20px;"></i>
								</a>
							<?php } ?>
						</td>
						<td style="text-align: center;">
							<a href="<?php echo site_url()."admin/coupon_discount/edit/".$coupon->id?>">
								<i class="fa fa-pencil-square-o" aria-hidden="true" style="color:#000; font-size: 20px;"></i>
							</a>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="javascript:void(0)" onclick="if(confirm('Are you sure you want to delete this entry')){ window.location.href= '<?php echo site_url()."admin/coupon_discount/delete/".$coupon->id?>';}">
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