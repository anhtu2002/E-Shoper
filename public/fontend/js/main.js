/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});

function up_down_quantity(btn){
	event.preventDefault();
	var current_val = parseInt($("#product_quantity_input").val());
    var action = $(btn).hasClass("product_quantity_up") ? "increase" : "decrease";
	if(action == 'increase'){
		$("#product_quantity_input").val(current_val+ 1);
	}
	else{
		if(current_val > 1){
			$("#product_quantity_input").val(current_val - 1);
		}
	}     
}
function set_url(btn){
	var url = btn.getAttribute('data-url');
	var form = document.getElementById("form_product_detail");
	form.setAttribute('action', url);
	form.submit();

}
