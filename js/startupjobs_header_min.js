$(window).load(function() {
	$(function() {
		var e = $(".navbar-inner");
		$(window).scroll(function() {
			var t = $(window).scrollTop();
			if (t >= 160) {
				e.attr("style", "display:block;")
			} else {
				e.attr("style", "display:none;")
			}
		})
	})
});
$(document).ready(
		function() {
			$("#Employee_contact")
					.keypress(
							function(e) {
								if (e.which != 8 && e.which != 0
										&& (e.which < 48 || e.which > 57)) {
									$("#errmsg").html("Digits Only").css(
											"color", "red").show().fadeOut(
											"slow");
									return false
								}
							})
		})