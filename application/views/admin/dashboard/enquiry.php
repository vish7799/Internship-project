<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
              <h3 class="box-title">Enquiry</h3>

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
						<th>Name</th>
						<th>Email</th>
						<th>Subject</th>
						<th>Phone</th>
						<th style="width:40%">Message</th>
					</tr>
					<?php foreach($inquires as $inquiry){ ?>
					<tr>
						<td><?php echo $inquiry->name ;?></td>
						<td><a href="mailto:<?php echo $inquiry->email;?>"><?php echo $inquiry->email;?></a></td>						
						<td><?php echo $inquiry->subject;?></td>						
						<td><?php echo $inquiry->phone;?></td>						
						<td><?php echo $inquiry->message;?></td>						
						
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