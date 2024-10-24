$(document).ready(function(){
	
	$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
	
	$('#multiselect').multiselect();
	
	/* var dateFormat = $( '#dateofbirth, #registrationdate, #joindate, #addedon, #date' ).datepicker( "option", "dateFormat", 'dd/mm/yy' );
	$( '#date_of_birth' ).datepicker( "option", "dateFormat", "dd/mm/yy" );
	$( '#blood_taken' ).datepicker( "option", "dateFormat", "dd/mm/yy" );
	$( '#blood_expiry' ).datepicker( "option", "dateFormat", "dd/mm/yy" );
	$( '#damage_date' ).datepicker( "option", "dateFormat", "dd/mm/yy" );
	$( '#date_issue' ).datepicker( "option", "dateFormat", "dd/mm/yy" );
	$( '#search_date_from' ).datepicker( "option", "dateFormat", "dd/mm/yy" );
	$( '#search_date_to' ).datepicker( "option", "dateFormat", "dd/mm/yy" );
	$( '#prbc_expiry' ).datepicker( "option", "dateFormat", "dd/mm/yy" );
	$( '#plt_expiry' ).datepicker( "option", "dateFormat", "dd/mm/yy" );
	$( '#plasma_expiry' ).datepicker( "option", "dateFormat", "dd/mm/yy" );
	$( '#today_issue_date' ).datepicker({dateFormat: 'dd/mm/yy'} );
	
	$.validate({
		form : '#add_exist_donor, #add_donor, #blood_sample, #blood_collection, #add_ngo, #edit_ngo, #update_damage, #issue_blood',
		onSuccess : function($form) {
			greenbar();
		}
	}); */
	
	
	
})

function greenbar(){
	$(".top-range").show();
	var percent = 0;
	var refreshId = setInterval(function() {
		percent = percent+1;
		$(".top-range").css('width',percent+'%');		
		if (percent == 100) {
			clearInterval(refreshId);
		}
	}, 10);
}

/**********************************************************************************
***********************************************************************************
****************  	new registration process		*******************************
***********************************************************************************
**********************************************************************************/


$(document).ready(function($){
	
	$("#product_title").on("keyup",function(){
		
		if($("#product_title").val()){
			$.post( site_url + "products/get_slug/"+$("#product_title").val(), function( data ) {
				
				$("#slug").val(data);
			})
		}
	});
	
	$("#category_title").on("keyup",function(){
		if($("#category_title").val()){
			$.post( site_url + "productcategory/get_slug/"+$("#category_title").val(), function( data ) {
				$("#slug").val(data);
			})
		}
	});
	
	$("#color_title").on("keyup",function(){
		if($("#color_title").val()){
			$.post( site_url + "color/get_slug/"+$("#color_title").val(), function( data ) {
				$("#slug").val(data);
			})
		}
	});

	$("#blog_category_title").on("keyup",function(){
		if($("#blog_category_title").val()){
			$.post( site_url + "blogs/get_category_slug/"+$("#blog_category_title").val(), function( data ) {
				$("#slug").val(data);
			})
		}
	});
	
	$("#blog_tag_title").on("keyup",function(){
		if($("#blog_tag_title").val()){
			$.post( site_url + "blogs/get_tag_slug/"+$("#blog_tag_title").val(), function( data ) {
				$("#slug").val(data);
			})
		}
	});
	
	$("#relationship_title").on("keyup",function(){
		if($("#relationship_title").val()){
			$.post( site_url + "relationship/get_slug/"+$("#relationship_title").val(), function( data ) {
				$("#slug").val(data);
			})
		}
	});
	
	$("#occasion_title").on("keyup",function(){
		if($("#occasion_title").val()){
			$.post( site_url + "occasion/get_slug/"+$("#occasion_title").val(), function( data ) {
				$("#slug").val(data);
			})
		}
	});
	
	$("#size_title").on("keyup",function(){
		if($("#size_title").val()){
			$.post( site_url + "size/get_slug/"+$("#size_title").val(), function( data ) {
				$("#slug").val(data);
			})
		}
	});
	
	$("#ctype_title").on("keyup",function(){
		if($("#ctype_title").val()){
			$.post( site_url + "ctype/get_slug/"+$("#ctype_title").val(), function( data ) {
				$("#slug").val(data);
			})
		}
	});
	
	$("#cms_title").on("keyup",function(){
		if($("#cms_title").val()){
			$.post( site_url + "cms/get_slug/"+$("#cms_title").val(), function( data ) {
				$("#slug").val(data);
			})
		}
	});
	
	$("#blog_title").on("keyup",function(){
		if($("#blog_title").val()){
			$.post( site_url + "blogs/get_slug/"+$("#blog_title").val(), function( data ) {
				$("#slug").val(data);
			})
		}
	});
	
	$("#category_title").on("keyup",function(){
		if($("#category_title").val()){
			$.post( site_url + "blogs/get_category_slug/"+$("#category_title").val(), function( data ) {
				$("#slug").val(data);
			})
		}
	});
	
	
	$("#jobs_title").on("keyup",function(){
		if($("#jobs_title").val()){
			$.post( site_url + "jobs/get_slug/"+$("#jobs_title").val(), function( data ) {
				$("#slug").val(data);
			})
		}
	});
	
	
	$("#name").on("keyup",function(){
		if($("#name").val()){
			$.post( site_url + "workspace/get_slug/"+$("#name").val(), function( data ) {
				$("#slug").val(data);
			})
		}
	});
	$("#news_title").on("keyup",function(){
		if($("#news_title").val()){
			$.post( site_url + "category/get_slug/"+$("#news_title").val(), function( data ) {
				$("#slug").val(data);
			})
		}
	});
	
	$("#package_title").on("keyup",function(){
		if($("#package_title").val()){
			$.post( site_url + "package/get_slug/"+$("#package_title").val(), function( data ) {
				$("#slug").val(data);
			})
		}
	});
	
	$(".image_delete").click(function(){
		if (confirm("Are you sure you want to delete this image!")) {
			var id = $(this).data("id");
			window.location.href = site_url + 'client/delete/'+id
		}
	})
})
