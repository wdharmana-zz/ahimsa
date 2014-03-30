
$(document).ready(function() {
	
	$("#sidemenu").css({height:$(window).height()});
	$("#main").css({width:$(window).width() - $("#sidemenu").width() - 80  });
	});


$(window).resize(function(event) {
	event.preventDefault();
	
	$("#sidemenu").css({height:$(window).height()});
	$("#main").css({width:$(window).width() - $("#sidemenu").width() - 80  });
	});
