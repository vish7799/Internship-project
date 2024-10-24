<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
              <h3 class="box-title">FAQ</h3>

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
						<th width="70%">Title</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
					<?php foreach($faqs as $faq){?>
					<tr>
						<td><?php echo $faq->title;?></td>
						<td>
							<?php if($faq->status == '1'){ ?>
								<a href="<?php echo site_url()."admin/faq/status_change/".$faq->id."/0"; ?>">
									<i class="fa fa-check" aria-hidden="true" style="color:green; font-size: 20px;"></i> <b>Active</b>
								</a>
							<?php }else{ ?>
								<a href="<?php echo site_url()."admin/faq/status_change/".$faq->id."/1"; ?>">
									<i class="fa fa-times" aria-hidden="true" style="color:red; font-size: 20px;"></i> <b>Inactive</b>
								</a>
							<?php } ?>
						</td>						
						<td>
							<a href="<?php echo site_url()."admin/faq/edit/".$faq->id?>">
								<i class="fa fa-pencil-square-o" aria-hidden="true" style="color:#000; font-size: 20px;"></i>
							</a>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<a onclick="return confirm('Are you sure, you want to delete it?')" href="<?php echo site_url()."admin/faq/delete/".$faq->id?>">
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