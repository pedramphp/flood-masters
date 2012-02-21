
var activeIndex = 0,
	slideshow,
	slideshowFunc = function(){
	
		slideshow = setInterval(function(){
			
			if( activeIndex === $("#slidePicture li").length -1 ){
				activeIndex = 0;
			}else{
				activeIndex++;
			}
			
			$("#slidePicture").find(".active").removeClass("active")
							  .end()
							  .find("li:eq("+activeIndex+")").addClass("active");
			
			
		},5000);		
	
	};

function stopSlideshow(){
	
		clearInterval(slideshow);
	
}


$(document).ready(function(){

	$("#slideShow nav a").mouseenter(function(){
		stopSlideshow();
		var index = $("#slideShow a").index(this) +1;
		
		if($("#slidePicture li:eq("+index+").active").length > 0){ return; }
		
		$("#slidePicture").find(".active").removeClass("active")
						  .end()
						  .find("li:eq("+index+")").addClass("active");
			
	});

});


$(window).load(function(){

	slideshowFunc();
	
});
