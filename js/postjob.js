$(document).ready(function(){
        
   
        $(function() {
                var scntDiv = $('#p_scents');
                var i = $('#p_scents p').size() + 1;
                
                $('#addScnt').live('click', function() {
                        $('<p><label for="p_scnts"><input type="text" id="p_scnt" size="20" name="p_scnt[]" value="" placeholder="Masters,graduation,school etc..." /></label> <a href="#" id="remScnt">Remove</a></p>').appendTo(scntDiv);
                        i++;
                        return false;
                });
                
                $('#remScnt').live('click', function() { 
                        if( i > 2 ) {
                                $(this).parents('p').remove();
                                i--;
                        }
                        return false;
                });
        });

        $(function() {
                var scntDivw = $('#p_scents_w');
                var i = $('#p_scents_w p').size() + 1;
                
                $('#addScnt_w').live('click', function() {
                        $('<p><label for="w_scnts"><input type="text" id="w_scnt" size="20" name="work[]" value="" placeholder="Masters,graduation,school etc..." /></label> <a href="#" id="remScnt_w">Remove</a></p>').appendTo(scntDivw);
                        i++;
                        return false;
                });
                
                $('#remScnt_w').live('click', function() { 
                        if( i > 2 ) {
                                $(this).parents('p').remove();
                                i--;
                        }
                        return false;
                });
        });
		
		
		//$('#Sortable').html($('.sorter').html());
		$(".sorter ul").clone().appendTo("#Sortable");
		
     
});

	function textonly(e){
		var code;
		if (!e) var e = window.event;
		if (e.keyCode) code = e.keyCode;
		else if (e.which) code = e.which;
		var character = String.fromCharCode(code);
		var AllowRegex  = /^[\ba-zA-Z\s-]$/;
		if (AllowRegex.test(character)) return true;     
		return false; 
	}
	
	
	function numericOnly(e){
		var code;
		if (!e) var e = window.event;
		if (e.keyCode) code = e.keyCode;
		else if (e.which) code = e.which;
		var character = String.fromCharCode(code);
		var AllowRegex  = /^[\b0-9\s-.]$/;
		if (AllowRegex.test(character)) return true;     
		return false; 
	}

	function noZero(e){
		var code;
		if (!e) var e = window.event;
		if (e.keyCode) code = e.keyCode;
		else if (e.which) code = e.which;
		var character = String.fromCharCode(code);
		var AllowRegex  = /^0+/;
		if (AllowRegex.test(character)) return true;     
		return false; 
	}	
	
	
	
	

// Email Regex
var Email = {
  _validator : function(email) {
      return (/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i.test(email) && /^[a-z0-9!\#$%&\'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!\#$%&\'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+(?:[A-Z]{2}|aero|arpa|asia|biz|cat|com|coop|edu|gov|info|int|jobs|mil|mobi|museum|name|net|org|pro|tel|travel)$/i.test(email)); 
}, 
    isValid: function(email) {
        return Email._validator(email); 
    }
};  

$(document).ready(function() {
	$('#verticalForm').submit(function(e) {
	  var emailValue = $('#JobForm_howtoapply').val();
	  var emailSplit = emailValue.split(/[\s,]+/);
	  var invalidEmails = [], invalidMessages = 'Invalid e-mails:  ';

	  if (emailValue) {//if defined, non-empty string etc.
		  $('#emailErrorEmpty').hide();

		  invalidEmails = $(emailSplit).filter(function(idx) {
			   return !(Email.isValid(this));        
		  });

		  //console.log(invalidEmails);

		  if (invalidEmails.length > 0) {

			 for (var j = 0, len = invalidEmails.length; j < len; ++j) {
				 invalidMessages += '<b>' + invalidEmails[j] + '</b>';
				 $('#JobForm_howtoapply_em_').html(invalidMessages).show();
				 $('#addEmail').html(invalidMessages).show();
			 }
			 
			 //stop submit action           
			 e.preventDefault();           
		  } else {
			 $('#JobForm_howtoapply_em').hide();  
			 $('#addEmail').hide();
		  }

	  }
/*	  else {//empty string, undefined etc.
		 e.preventDefault(); //stop submit action
		 $('#emailErrorEmpty').show();
	  }
*/
		/* submits to server if action wasn't stopped above */
	});
});	

$().ready(function() {

function onSubmit(){
    if(($("#JobForm_full_time").prop('checked') == true) || ($("#JobForm_contract").prop('checked') == true) || ($("#JobForm_part_time").prop('checked') == true) || ($("#JobForm_temporary").prop('checked') == true) || ($("#JobForm_co_founder").prop('checked') == true) || ($("#JobForm_internship").prop('checked') == true) || ($("#JobForm_freelance").prop('checked') == true )){

	
		$('#err_msg').html('');
		$('#errr_msg').html('');
		return true;
    }
    else
    {
       $('#err_msg').html('<div style="color:#B94A48">Type cannot be Blank</div>');
       $('#errr_msg').html('<div class="alert alert-error" style="margin-top:-20px;">Type cannot be Blank</div>');   
       $('#lbl').css('color','#B94A48');
       return false;
    }
}

function onSubmity(){
	//if(!$("input#JobForm_no_salary").prop('checked', true)){
	//if($('input#JobForm_no_salary').not(':checked')){
	//if ($(":input#JobForm_min_salary:not([readonly])")){
	//if(!$('input[type=checkbox]#JobForm_no_salary:checked').length) {
	//if(!$('input#JobForm_no_salary').is(':checked')){
	if(!$('select#JobForm_no_salary').val()==1){
				if(!$('#JobForm_min_salary').val() && !$('#JobForm_max_salary').val()) {
				$(".salaryBox").find("label").css('color', '#B94A48');
				$('#JobForm_min_salary').css('border-color', '#B94A48');
				$('#JobForm_max_salary').css('border-color', '#B94A48');
				$('#sal_errr_msg').html('<div class="alert alert-error" style="margin-top:-20px;">Min and Max Salary cannot be Blank</div>');
				$('#sal_err_msg').html('<div class="controls"><div style="color:#B94A48">Min and Max Salary cannot be Blank</div></div>');
			
				return false;
			}
			if(!$('#JobForm_min_salary').val()) {
			 //alert("Min Salary cannot be blank");
				$('#JobForm_min_salary').css('border-color', '#B94A48');
				$('#sal_errr_msg').html('<div class="alert alert-error" style="margin-top:-20px;">Min Salary cannot be Blank</div>');
				$('#sal_err_msg').html('<div class="controls"><div style="color:#B94A48">Min Salary cannot be Blank</div></div>');
				return false;
			}
			if(!$('#JobForm_max_salary').val()) {
			//alert("Max Salary cannot be blank");
				$('#JobForm_max_salary').css('border-color', '#B94A48');
				$('#sal_errr_msg').html('<div class="alert alert-error" style="margin-top:-20px;">Max Salary cannot be Blank</div>');
				$('#sal_err_msg').html('<div class="controls"><div style="color:#B94A48;margin-left:200px;">Max Salary cannot be Blank</div></div>');
				return false;
			}
		}else{
				$('#sal_errr_msg').html('');
				$('#sal_err_msg').html('');
				$('#JobForm_min_salary').css('border-color', '#F97C30');
				$('#JobForm_max_salary').css('border-color', '#F97C30');				
				$(".salaryBox").find("label").css('color', '#000');
				return true;	
		
		
		}	
}
$('#verticalForm').submit(onSubmit);
$('#verticalForm').submit(onSubmity);




function onSubmitt(){
// Edit Job

    if(($("#job_full_time").prop('checked') == true) || ($("#job_part_time").prop('checked') == true) || ($("#job_temporary").prop('checked') == true) || ($("#job_co_founder").prop('checked') == true) || ($("#job_internship").prop('checked') == true) || ($("#job_freelance").prop('checked') == true ) || ($("#job_contract").prop('checked') == true )){
		return true;
    }
    else
    {
       $('#err_msg').html('<span style="color:#B94A48">Type cannot be Blank</span>');
       $('#errr_msg').html('<span style="color:#B94A48">Type cannot be Blank</span>');   
       $('#lbl').css('color','#B94A48');
       return false;
    }	
}


function onSubmityy(){

// Edit Job

	//if(!$('input#job_no_salary').is(':checked')){
	if(!$('select#job_no_salary').val()==1){
		if(!$('#job_min_salary').val() && !$('#job_max_salary').val()) {
			$(".salaryBox").find("label").css('color', '#B94A48');
			$('#job_min_salary').css('border-color', '#B94A48');
			$('#job_max_salary').css('border-color', '#B94A48');
			$('#sal_errr_msg').html('<div class="alert alert-error" style="margin-top:-20px;">Min and Max Salary cannot be Blank</div>');
			$('#sal_err_msg').html('<div class="controls"><div style="color:#B94A48">Min and Max Salary cannot be Blank</div></div>');
		return false;
		}
		else if(!$('#job_min_salary').val()) {
			//alert("Min Salary cannot be blank");
			$(".salaryBox:first-child").find("label").css('color', '#B94A48');
			$('#job_min_salary').css('border-color', '#B94A48');
			$('#sal_errr_msg').html('<div class="alert alert-error" style="margin-top:-20px;">Min Salary cannot be Blank</div>');
			$('#sal_err_msg').html('<div class="controls"><div style="color:#B94A48">Min Salary cannot be Blank</div></div>');
			return false;
		}
		else if(!$('#job_max_salary').val()) {
			//alert("Max Salary cannot be blank");
			$('#job_max_salary').css('border-color', '#B94A48');
			$('#sal_errr_msg').html('<div class="alert alert-error" style="margin-top:-20px;">Max Salary cannot be Blank</div>');
			$('#sal_err_msg').html('<div class="controls"><div style="color:#B94A48;margin-left:200px;">Max Salary cannot be Blank</div></div>');
			return false;
		}
	}else{
			$('#sal_errr_msg').html('');
			$('#sal_err_msg').html('');
			$('#job_min_salary').css('border-color', '#F97C30');
			$('#job_max_salary').css('border-color', '#F97C30');				
			$(".salaryBox").find("label").css('color', '#000');
			return true;	
		
		
		}
}
$('#re-post').submit(onSubmitt);
$('#re-post').submit(onSubmityy);

		$("#JobForm_full_time").change(function() {
			if(this.checked) {
			$('#err_msg').html('');
			$('#errr_msg').html('');
			$('#lbl').css('color','#468847');
			}
		});
		$("#JobForm_contract").change(function() {
			if(this.checked) {
			$('#err_msg').html('');
			$('#errr_msg').html('');
			$('#lbl').css('color','#468847');
			}
		});
		$("#JobForm_part_time").change(function() {
			if(this.checked) {
			$('#err_msg').html('');
			$('#errr_msg').html('');
			$('#lbl').css('color','#468847');
			}
		});	
		$("#JobForm_temporary").change(function() {
			if(this.checked) {
			$('#err_msg').html('');
			$('#errr_msg').html(''); 
			$('#lbl').css('color','#468847');
			}
		});	
		$("#JobForm_co_founder").change(function() {
			if(this.checked) {
			$('#err_msg').html('');
			$('#errr_msg').html('');
			$('#lbl').css('color','#468847');
			}
		});
		$("#JobForm_internship").change(function() {
			if(this.checked) {
			$('#err_msg').html('');
			$('#errr_msg').html(''); 
			$('#lbl').css('color','#468847');
			}
		});
		$("#JobForm_freelance").change(function() {
			if(this.checked) {
			$('#err_msg').html('');
			$('#errr_msg').html(''); 
			$('#lbl').css('color','#468847');
			}
		});	

/*
$("#JobForm_category").on("change", function() {
    alert("Change to " + this.value);
});
*/
$('select#JobForm_category').on('focus', function (e) {
    if(($("#JobForm_full_time").prop('checked') == true) || ($("#JobForm_contract").prop('checked') == true) || ($("#JobForm_part_time").prop('checked') == true) || ($("#JobForm_temporary").prop('checked') == true) || ($("#JobForm_co_founder").prop('checked') == true) || ($("#JobForm_internship").prop('checked') == true) || ($("#JobForm_freelance").prop('checked') == true )){

		$('#err_msg').html('');
		$('#errr_msg').html('');
		return true;
    }
    else
    {
       $('#err_msg').html('<div style="color:#B94A48">Type cannot be Blank</div>');
       $('#lbl').css('color','#B94A48');
       return false;
    }
});


	$('#JobForm_full_time,#JobForm_contract').on('focus', function (e) {
		if($('#JobForm_title').val()=='') {
			  //alert('Min Title cannot be blank');
				$('#JobForm_max_salary').css('border-color', '#F97C30');			  
				$('#JobForm_title_em_').show();
				$('#JobForm_title_em_').html('<div style="color:#B94A48">Job Title cannot be blank.</div>');
		}
	});


	$("select#JobForm_category").change(function() {
		if(this.checked) {
			$('#err_msg').html('');
			$('#errr_msg').html(''); 
			$('#lbl').css('color','#468847');
		}
	});
		
		
	$('#JobForm_min_salary').on('focus', function (e) {
		if($('#JobForm_category').val()=='') {
			  //alert('Job category cannot be blank');			  
				$('#JobForm_category_em_').show();
				$('#JobForm_category_em_').html('<div style="color:#B94A48">Job category cannot be blank.</div>');
		}
	});
	
if(!$('input#JobForm_no_salary').is(':checked')){
	$('#JobForm_max_salary').on('focus', function (e) {
		if($('#JobForm_min_salary').val()=='') {
			  //alert('Min Salary cannot be blank');			  
				$('#JobForm_min_salary_em_').show();
				$('#JobForm_min_salary_em_').html('<div style="color:#B94A48">Min Salary cannot be blank.</div>');
		}
	});


	$('#JobForm_location').on('focus', function (e) {
		if(($('#JobForm_max_salary').val()=='') && ($('#JobForm_min_salary').val()=='')) {
				$(".salaryBox").find("label").css('color', '#B94A48');			  
				$('#JobForm_max_salary_em_').show();
				$('#JobForm_max_salary_em_').html('<div style="color:#B94A48">Max Salary cannot be blank.</div>');		
				$('#JobForm_min_salary_em_').show();
				$('#JobForm_min_salary_em_').html('<div style="color:#B94A48">Min Salary cannot be blank.</div>');		
		}
		if($('#JobForm_max_salary').val()=='') {
			  //alert('Max Salary cannot be blank');
				$(".salaryBox:first-child").find("label").css('color', '#B94A48');			  
				$('#JobForm_max_salary_em_').show();
				$('#JobForm_max_salary_em_').html('<div style="color:#B94A48">Max Salary cannot be blank.</div>');
		}
		else if($('#JobForm_min_salary').val()=='') {
			  //alert('Min Salary cannot be blank');			  
				$('#JobForm_min_salary_em_').show();
				$('#JobForm_min_salary_em_').html('<div style="color:#B94A48">Min Salary cannot be blank.</div>');
		}		
	});

}
// Validation for JobForm Salary not applicable checkbox	
	
	$("#JobForm_no_salary").change(function() {
		if(this.checked) {
			// alert('checked');
		   $('#JobForm_min_salary').attr({ readonly: 'readonly' }).val('');
		   $('#JobForm_max_salary').attr({ readonly: 'readonly' }).val('');
		   $('#JobForm_currency').attr({ readonly: 'readonly' }).val('');
		   $('#JobForm_min_salary_em_').hide();
		   $('#JobForm_max_salary_em_').hide();
		   
				$('#sal_errr_msg').html('');
				$('#sal_err_msg').html('');
				$('#JobForm_min_salary').css('border-color', '#F97C30');
				$('#JobForm_max_salary').css('border-color', '#F97C30');				
				$(".salaryBox").find("label").css('color', '#000');		   
		   
		}
		else {
			// alert('not checked');
			$('#JobForm_min_salary').removeAttr('readonly');
			$('#JobForm_max_salary').removeAttr('readonly');
			$('#JobForm_currency').removeAttr('readonly');
			
		}
	});
	
	$('#JobForm_responsibility').redactor({
	focusCallback: function(e)
		{
			if($('#JobForm_description').val()=='') {
				//alert('Startup Description cannot be blank.');
				$('#JobForm_description_em_').show();
				$('#JobForm_description_em_').html('<div style="color:#B94A48">Startup Description cannot be blank</div>');
			}	
		}
	});


	$('#JobForm_requirement').redactor({
	focusCallback: function(e)
		{
			if($('#JobForm_responsibility').val()=='') {
				//alert('Job Responsibilities cannot be blank.');
				$('#JobForm_responsibility_em_').show();
				$('#JobForm_responsibility_em_').html('<div style="color:#B94A48">Job Responsibilities cannot be blank.</div>');
			}	
		}
	});

	
	$('#JobForm_howtoapply').on('focus', function (e) {
		if($('#JobForm_requirement').val()=='') {
			  //alert('Job Requirement cannot be blank');			  
				$('#JobForm_requirement_em_').show();
				$('#JobForm_requirement_em_').html('<div style="color:#B94A48">Job Requirement cannot be blank.</div>');
		}
	});


	$('#JobForm_tags').on('focus', function (e) {
		if($('#JobForm_requirement').val()=='') {
			  //alert('Job Requirement cannot be blank');			  
				$('#JobForm_requirement_em_').show();
				$('#JobForm_requirement_em_').html('<div style="color:#B94A48">Job Requirement cannot be blank.</div>');
		}
	});


	$("#JobForm_no_salary").change(function() {
		if($('#JobForm_no_salary').val()==0) {
			// alert('checked');
		   $('#JobForm_min_salary').attr({ readonly: 'readonly' }).val('');
		   $('#JobForm_max_salary').attr({ readonly: 'readonly' }).val('');
		   $('#JobForm_currency').attr({ readonly: 'readonly' }).val('');
		   $('.salaryBox').hide();
				
		}
		else {
			// alert('not checked');
			$('#JobForm_min_salary').removeAttr('readonly');
			$('#JobForm_max_salary').removeAttr('readonly');
			$('#JobForm_currency').removeAttr('readonly');
			$('.salaryBox').show();
		}
	});



	$("#job_no_salary").change(function() {
		if($('#job_no_salary').val()==0) {
			// alert('checked');
		   $('#job_min_salary').attr({ readonly: 'readonly' }).val('');
		   $('#job_max_salary').attr({ readonly: 'readonly' }).val('');
		   $('#job_currency').attr({ readonly: 'readonly' }).val('');
		   $('#job_no_salary_options').removeAttr('readonly');
		   $('#no_salary_optionsx').show();
		   $('.salaryBox').hide();
				
		}
		else {
			// alert('not checked');
			$('#job_min_salary').removeAttr('readonly');
			$('#job_max_salary').removeAttr('readonly');
			$('#job_currency').removeAttr('readonly');
			$('#no_salary_optionsx').show();
			$('.salaryBox').show();
			$('#job_no_salary_options').attr({ readonly: 'readonly' }).val('');
		}
	});

	if( !$('#job_min_salary').val() ) {
			$('#job_min_salary').attr({ readonly: 'readonly' });
			$('#job_max_salary').attr({ readonly: 'readonly' });
			$('#job_currency').attr({ readonly: 'readonly' });
			$('#job_no_salary').attr('checked', 'checked');
			$('#no_salary_optionsx').show();
			$('#job_no_salary_options').removeAttr('readonly');
	  
    }else{
		$('#no_salary_optionsx').hide();
		$('#job_no_salary_options').attr({ readonly: 'readonly' }).val('');
	}
	
	// onload , update/repost  job salary = 0 --hide salary
		if($('#job_no_salary').val()==0) {
		   $('#job_min_salary').attr({ readonly: 'readonly' }).val('');
		   $('#job_max_salary').attr({ readonly: 'readonly' }).val('');
		   $('#job_currency').attr({ readonly: 'readonly' }).val('');
		   $('#job_no_salary_options').removeAttr('readonly');
		   $('#no_salary_optionsx').show();
		   $('.salaryBox').hide();
				
		}
		else {
			$('#job_min_salary').removeAttr('readonly');
			$('#job_max_salary').removeAttr('readonly');
			$('#job_currency').removeAttr('readonly');
			$('#no_salary_optionsx').show();
			$('.salaryBox').show();
			$('#job_no_salary_options').attr({ readonly: 'readonly' }).val('');
		}

		
});