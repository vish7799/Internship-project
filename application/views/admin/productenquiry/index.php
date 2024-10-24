<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
              <h3 class="box-title">Product Enquiry</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 200px;display:none;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						<th>Product Name</th>
						<th >Customer Name</th>
						<th >Customer Email</th>
						<th >Customer Mobile</th>
						<th width="20%">Customer Message</th>
						<th >Enquiry Date</th>
					</tr>
					<?php foreach($pages as $page){?>
					<tr>
						<td><?php echo get_product_name($page->product_id); ?></td>
						<td><?php echo $page->name;?></td>
						<td><?php echo $page->email;?></td>
						<td><?php echo $page->mobile;?></td>
						<td style="text-align: justify;"><?php echo $page->message;?></td>
						<td><?php echo date('d M, Y',$page->created); ?></td>
						
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