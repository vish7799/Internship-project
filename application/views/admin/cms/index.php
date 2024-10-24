<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
              <h3 class="box-title">CMS</h3>

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
						<th width="60%">Title</th>
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
								<a href="<?php echo site_url()."admin/cms/status_change/".$page->id."/0"; ?>">
									<i class="fa fa-check" aria-hidden="true" style="color:green; font-size: 20px;"></i>
								</a>
							<?php }else{ ?>
								<a href="<?php echo site_url()."admin/cms/status_change/".$page->id."/1"; ?>">
									<i class="fa fa-times" aria-hidden="true" style="color:red; font-size: 20px;"></i>
								</a>
							<?php } ?>
						</td>
						
						<td style="text-align: center;">
							<a href="<?php echo site_url()."admin/cms/edit/".$page->id?>">
								<i class="fa fa-pencil-square-o" aria-hidden="true" style="color:#000; font-size: 20px;"></i>
							</a>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="javascript:void(0)" onclick="if(confirm('Are you sure you want to delete this entry')){ window.location.href= '<?php echo site_url()."admin/cms/delete/".$page->id?>';}">
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