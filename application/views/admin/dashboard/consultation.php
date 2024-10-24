<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header">
              <h3 class="box-title">Doctor Consultation</h3>

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
						<th>name</th>
						<th>Email</th>
						<th>country</th>
						<th>phone</th>
						<th>Arival Date</th>
						<th>duration</th>
						<th>adults</th>
						<th>children</th>
						<th>Area Of Interest</th>
						<th>message</th>
					</tr>
					<?php foreach($inquires as $inquiry){ ?>
					<tr>
						<td><?php echo $inquiry->name ;?></td>
						<td><a href="mailto:<?php echo $inquiry->email;?>"><?php echo $inquiry->email;?></a></td>						
						<td><?php echo $inquiry->country;?></td>						
						<td><?php echo $inquiry->phone;?></td>						
						<td><?php echo $inquiry->adate;?></td>						
						<td><?php echo $inquiry->duration;?></td>						
						<td><?php echo $inquiry->adults;?></td>						
						<td><?php echo $inquiry->children;?></td>						
						<td><?php echo $inquiry->areainterest;?></td>						
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