$(document).ready(function(){

	$('div.stars').raty({ 
		path: imgRaty
	});

	$('.starscom').raty({
		score: function()
		{
			return $(this).attr("data-score")
		},
		path: imgRaty,
	});

});