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
/*
jQuery(function($) {
	$('#job-form').yiiactiveform({
		js:function(form, attribute, data, hasError) {
              if(hasError) 
                 $("#"+attribute.id).addClass("error_input");
              else 
                 $("#"+attribute.id).removeClass("error_input"); 
          }'
	});
});


function afterValidate(form, data, hasError) {
   if (!hasError) {    
        $("li.next").removeClass("show"); 
    }else{
		$("li.next").addClass("show"); 
	}
    return false;
}
*/

$(document).ready(function() {

	
  	var $validator = $("#job-form").validate({
		  rules: {
		    'Employee[fname]':{
		      required: true,
		      minlength: 1
		    },
		    'Employee[lname]':{
		      required: true,
		      minlength: 1
		    },
			'Employee[gender]':{
		      required: true,
		    },			
		    'Employee[country]':{
		      required: true,
		    },		    
			'Employee[email]':{
		      required: true,
			  email: true,
		    },
			'Employee[contact]':{
		      required: true,
		    },
			'Employee[edu]':{
		      required: true,
		    },
			'Employee[resume]':{
		      required: true,
		    }
		  }
		});
 
	  	$('#rootwizard').bootstrapWizard({
	  		'onNext': function(tab, navigation, index) {
			//alert('next');
	  			var $valid = $("#job-form").valid();
	  			if(!$valid) {
					e.preventDefualt();
	  				$validator.focusInvalid();
	  				return true;
	  			}
	  		},
			'onTabShow': function(tab, navigation, index) {
				var $total = navigation.find('li').length;
				var $current = index+1;
		
				if($current == 4) {
					$('#rootwizard').find('.pager .next').hide();
					$('#rootwizard').find('.pager .first').hide();
					$('#rootwizard').find('.pager .last').hide();
				}else if($current == 1){
					$('#rootwizard').find('.pager .previous').hide();
					$('#rootwizard').find('.pager .first').hide();
					$('#rootwizard').find('.pager .last').hide();
				}else {
					$('#rootwizard').find('.pager .next').show();
					$('#rootwizard').find('.pager .previous').show();
					$('#rootwizard').find('.pager .first').hide();
					$('#rootwizard').find('.pager .last').hide();
				}
		
			}
			

	  	});	
});


function focusNext(elemName, evt) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode :
        ((evt.which) ? evt.which : evt.keyCode);
    if (charCode == 13) {
                document.getElementById(elemName).focus();
                return false;
    } 
    return true;
}
$(document).ready(function() {

var hash = window.location.hash;
if (hash.substring(1) == 'applyjob') {
  $('#applyjob').modal('show');
}
	
});