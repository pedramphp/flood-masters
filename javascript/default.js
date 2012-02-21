$(document).ready(function(){


	$("#navMenu .firstLevel").mouseenter(function(){
		if($(this).hasClass("hovered")) return;
		$(this).addClass("hovered");
	});
	
	
	$("#navMenu .firstLevel").mouseleave(function(){
		$(this).removeClass("hovered");
	});
	
	$('[data-href]').css('cursor','pointer').live('click',function(){
			window.location.href = $(this).data('href');
	});
	
});