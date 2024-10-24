var RevolutionSlider = function () {
var x = screen.width;
if(x < '991'){
	var height = 600;
}else{
	var height = 600;
}
    return {
        
        //Revolution Slider - Full Width
        initRSfullWidth: function () {
		    var revapi;
	        jQuery(document).ready(function() {
	            revapi = jQuery('.tp-banner').revolution(
	            {
					
	                delay:4000,
	                startwidth:1920,
	                startheight:height,
	                hideThumbs:10,
									navigationStyle:"preview4"
	            });
	        });
        },

        //Revolution Slider - Full Screen Offset Container
        initRSfullScreenOffset: function () {
		    var revapi;
	        jQuery(document).ready(function() {
	           revapi = jQuery('.tp-banner').revolution(
	            {
					
	                delay:4000,
	                startwidth:1920,
	                startheight:600,
	                hideThumbs:10,
	                fullWidth:"off",
	                fullScreen:"on",
	                hideCaptionAtLimit: "",
	                dottedOverlay:"twoxtwo",
	                navigationStyle:"preview4",
	                fullScreenOffsetContainer: ".header"
	            });
	        });
        }        

    };
}();        