$(document).ready(function() {

	var $sb = $('#sidebar');
	if ($sb[0] && !($.browser.msie && !$.support.opacity)){
		var top = $sb.offset().top - parseFloat($sb.css('margin-top').replace(/auto/, 0));
		$(window).scroll(function () {
			if ($(this).scrollTop() >= top) {
				$sb.addClass('fixed');
			}else{
				$sb.removeClass('fixed');
			}			
		});		
	}
	$("#sidebar a").click(function(){
		$.scrollTo('#'+$(this).attr('href').split('#')[1], 600,{over:{top:-0.02}});
		return false;
	})
	
});