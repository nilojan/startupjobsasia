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

$(document).ready(function () {	
  //called when key is pressed in textbox
  $("#Employee_contact").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").css('color','red').show().fadeOut("slow");
               return false;

    }
   });
});
