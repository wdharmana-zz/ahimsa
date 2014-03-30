$("#whosale").hide();


$(document).ready(function() {
	
	$(".sidebar").css({height:$(window).height()});
	$(".content").css({left:$(".sidebar").width()  + 120});
	
	});


$(window).resize(function(event) {
	
	event.preventDefault();
	
	$(".sidebar").css({height:$(window).height()});
	
	});

$("#menu-whosale").click(function(event) 
{
	
	$("#whosale").fadeIn(1000);	
	$("#whosale").animate({marginTop:85},500);	
	$("#whosale").animate({height:$(window).height() - 165},1000);	
});

$("#menu-home").click(function(event) 
{
	$("#whosale").fadeOut(1000);	
		
});