$(document).ready(function(){
	function setw(){
		var gcolwidth = $("#gcol1").width(); 
		var thumbwidth = $(".mySwiper").width(); 
		var slidewidth = gcolwidth - thumbwidth;
		var gcolheight = slidewidth / 1.5;
		$("#gcol1").css({"height":gcolheight+"px"});
	}
	setw();
	$(window).resize(function(){
		setw();
	})
});


$(document).ready(function(){
	function setw(){
		var gcolmobilewidth = $("#gcolmobile").width(); 
		var gcolheight = gcolmobilewidth / 1.5;
		$("#gcolmobile").css({"height":gcolheight+"px"});
	}
	setw();
	$(window).resize(function(){
		setw();
	})
});


