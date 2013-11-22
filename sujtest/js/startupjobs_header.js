// header scroll
$(window).load(function(){
$(function() {	
	var headerlabels = $('.navbar-inner');
	//var alert_placeholder = $('#alert_placeholder');
	$(window).scroll(function() {
		var scroll = $(window).scrollTop();
		if (scroll >= 160) {
			headerlabels.attr('style', 'display:block;');
			//headerlabels.removeClass('navbar-hide').addClass('navbar-inner').fadeIn();
			//alert_placeholder.removeClass('navbar-hide').addClass('navbar-inner').fadeIn();
		} else {
			headerlabels.attr('style', 'display:none;');
			//headerlabels.removeClass('navbar-inner').fadeOut().addClass('navbar-hide');
		}
	});
});
});
