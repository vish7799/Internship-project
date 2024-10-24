<div class="row">
    <div class="col-md-12">
		<div class="box box-primary">
			<?php echo form_open_multipart("admin/products/edit_product/".$product->id."/".$pageno , array('id'=>'edit_product'))?>
				<div class="box-header with-border">
					<h3 class="box-title">Edit product</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Product Name</label> 
								<input type="text" class="form-control" id="product_title" name="title" placeholder="Product Name" data-validation="required" value="<?php echo set_value('title',$product->title);?>"  tabindex=1>
								<?php echo form_error('title', '<span class="help-block form-error">', '</span>'); ?>
							</div>							
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Slug</label> 
								<input type="text" class="form-control" id="slug" name="slug" readonly data-validation="required" tabindex=1 value="<?php echo set_value('slug',$product->slug);?>">
								<?php echo form_error('slug', '<span class="help-block form-error">', '</span>'); ?>
							</div>							
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
								<label>Choose Category</label>
								<select class="form-control" id="category_id" name="category_id" tabindex=3>
									<option value="">Choose Category</option>
									<?php foreach($categories as $category){ ?>
									<option value="<?php echo $category->id;?>" <?php if($category->id == $product->category_id){ ?>  selected <?php } ?>><?php echo $category->title;?></option>
										<?php $childcategories			=	getChildCategoryById($category->id); ?>
										<?php foreach($childcategories as $childcategory){ ?>
											<option value="<?php echo $childcategory->id;?>" <?php if($childcategory->id == $product->category_id){ ?>  selected <?php } ?>> -- <?php echo ucfirst($childcategory->title); ?></option>
										<?php }?>
									<?php }?>
								</select>
								<?php echo form_error('category_id', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
								<label>Star Rating</label>
								<select class="form-control" id="star_rating" name="star_rating"  tabindex=8>
									<option value="">Please Select Star</option>
									<option value="3 Star" <?php if($product->star_rating == '3 Star'){ echo "selected=selected";}?>>3 Star</option>
									<option value="4 Star" <?php if($product->star_rating == '4 Star'){ echo "selected=selected";}?>>4 Star</option>
									<option value="5 Star" <?php if($product->star_rating == '5 Star'){ echo "selected=selected";}?>>5 Star</option>
									<option value="Non Inverter" <?php if($product->star_rating == 'Non Inverter'){ echo "selected=selected";}?>>Non Inverter</option>
								</select>
								<?php echo form_error('star_rating', '<span class="help-block form-error">', '</span>'); ?>
							</div>							
						</div>
						
					</div>
					<div class="row">	
						<div class="col-md-3">
							<div class="form-group">
								<label>Total QTY</label> 
								<input type="text" class="form-control" id="qty" name="qty" placeholder="Total QTY" data-validation="required" value="<?php echo set_value('qty', $product->qty);?>"  tabindex=1>
								<?php echo form_error('qty', '<span class="help-block form-error">', '</span>'); ?>
							</div>							
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Price</label> 
								<input type="text" class="form-control" id="price" name="price" placeholder="Product Price" data-validation="required" value="<?php echo set_value('price',$product->price);?>"  tabindex=1>
								<?php echo form_error('price', '<span class="help-block form-error">', '</span>'); ?>
							</div>							
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Offer Price</label> 
								<input type="text" class="form-control" id="offer_price" name="offer_price" placeholder="Product Offer Price" data-validation="required" value="<?php echo set_value('offer_price',$product->offer_price);?>"  tabindex=1>
								<?php echo form_error('offer_price', '<span class="help-block form-error">', '</span>'); ?>
							</div>							
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
								<label>GST</label> 
								<input type="text" class="form-control" id="gst" name="gst" placeholder="Product Name" data-validation="required" value="<?php echo set_value('gst',$product->gst);?>"  tabindex=1>
								<?php echo form_error('gst', '<span class="help-block form-error">', '</span>'); ?>
							</div>							
						</div>
					</div>
					
					<div class="row">	
						<div class="col-md-12">
							<div class="form-group">
								<label>Product Description</label> 
								<textarea type="text" class="form-control" id="page_editor" rows=5 name="description" placeholder="Product Description" data-validation="required"  tabindex=1><?php echo set_value('description',$product->description);?></textarea>
								<?php echo form_error('description', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
					</div>
					
					
					<div class="row">	
						<div class="col-md-4">
							<div class="form-group">
								<label>Meta Title</label> 
								<input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Meta Title" data-validation="required" tabindex=1 value="<?php echo $product->meta_title;?>">
								<?php echo form_error('meta_title', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							
							<div class="form-group">
								<label>Meta Keywords</label> 
								<input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords" data-validation="required" tabindex=1 value="<?php echo $product->meta_keywords;?>">
								<?php echo form_error('meta_keywords', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Meta Description</label> 
								<textarea class="form-control" id="meta_description" rows="5" name="meta_description" placeholder="Meta Description"><?php echo $product->meta_description;?></textarea>
								<?php echo form_error('meta_description', '<span class="help-block form-error">', '</span>'); ?>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Status</label>
								<select class="form-control" id="status" name="status"  tabindex=8>
									<option value="1" <?php if($product->status == 1){ echo "selected=selected";}?>>Active</option>
									<option value="0" <?php if($product->status == 0){ echo "selected=selected";}?>>In Active</option>
								</select>
								<?php echo form_error('status', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							
							<div class="form-group">
								<label>Is Featured</label>
								<select class="form-control" id="is_featured" name="is_featured"  tabindex=8>
									<option value="0" <?php if($product->is_featured == 0){ echo "selected=selected";}?>>No</option>
									<option value="1" <?php if($product->is_featured == 1){ echo "selected=selected";}?>>Yes</option>
								</select>
								<?php echo form_error('is_featured', '<span class="help-block form-error">', '</span>'); ?>
							</div>	
						</div>
						
					</div>
						
					<div class="row">	
						<div class="col-md-6">	
							<div class="form-group">
								<label>Main Image</label> 
								<input type="file" class="form-control" id="image" name="image" placeholder="Image" data-validation="required" value="<?php echo set_value('image',$product->image);?>"  tabindex=7>
								<?php echo form_error('image', '<span class="help-block form-error">', '</span>'); ?>
								<input type="hidden" name="old_image" value="<?php echo $product->image;?>"/>
								<?php
								if(file_exists('./assets/photo/product/'.$product->image)){
									?><img style="width:100px;margin-top:10px;" src="<?php echo site_url()?>/assets/photo/product/<?php echo $product->image;?>"><?php
								}
								?>
							</div>
						</div>
						<div class="col-md-6">	
							<div class="form-group">
								<label>Other Images (You can choose multiple images at once)</label> 
								<input type="file" class="form-control" id="other_image" multiple name="other_image[]" placeholder="Other Images" data-validation="required" value="<?php echo set_value('other_image');?>"  tabindex=7>
								<?php echo form_error('other_image', '<span class="help-block form-error">', '</span>'); ?>
							</div>
							<?php 
							//print_r($images);
							foreach($product_images as $image){
								?>
								<div class="slider_box">
									<img src="<?php echo site_url();?>assets/photo/product/<?php echo $image->image;?>" style="width:100px; border:solid 2px #ccc; padding:5px; margin-bottom:10px; float:left;"/>
									<div class="hover_box">
										<button type="button" onclick="deleteFile('<?php echo $product->id?>','<?php echo $image->id?>');">Delete</button>
									</div>
								</div>
								<?php
							}
							?>
						</div>
						
						
						<div class="col-md-12">
							
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button type="submit" id="add_class_submit" class="btn btn-primary">Submit</button>
					<button type="button" onclick="window.location.href='<?php echo site_url()?>admin/products/index/<?php echo $pageno; ?>'" id="add_teacher_back" class="btn btn-primary">Back</button>
				</div>
				<input type="hidden" name="product_id" id="product_id" value="<?php echo $product->id?>" />
			</form>
		</div>
	</div>
</div>
<style>
.slider_box{position:relative;float:left;margin:0 5px;}
.hover_box{    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
	text-align:center;
    background: rgba(0,0,0,.5);display:none;}
.hover_box button{    margin-top: 23%;
    background: none;
    border: none;
    color: #fff;
    font-size: 18px;}
.hover_box button:hover{text-decoration:underline;}
.slider_box:hover .hover_box{display:block;}
</style>
<script>
function deleteFile(product_id,file_id){
	if(confirm("Are you sure you want to delete this file?")){
		window.location.href = site_url + "products/delete_image/"+product_id+'/'+file_id;
	}
}
</script>




<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


<script type="text/javascript">
	$(document).ready(function() {
		$('.category_id').on('change', function() {
			var catId = $(this).val();
			
			var type = $(this).attr('dell_formtype');
			if(catId != ''){
				getSubCat(catId, type);
			} else {
				$('#sub_category_id').html('<option value="">No Sub Category</option>');
			}
		})
		
		function ajaxCall() {
			this.send = function(data, url, method, success, type) {
				type = type||'json';
				var successRes = function(data) {
					success(data);
				};
				$.ajax({
					url: url,
					type: method,
					data: data,
					success: successRes,
					timeout: 60000
				});
			}
		}
		
		function getSubCat(catId, type) {
			var call = new ajaxCall();
			var url = '<?php echo site_url(); ?>'+'admin/products/getSubCat';
			var data = {catId:catId};
			var method = 'POST';
			call.send(data, url, method, function(data) {
				if(data) {
					if(type == 1) {
						$('.null_city').remove();
						$('#sub_category_id').html(data);
					}
					if(type == 2) {
						$('#sub_category_id').html(data);
					}
				}
			});
		}
		
		
	});
</script>