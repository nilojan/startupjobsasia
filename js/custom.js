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
	
 



$(document).ready(function() {

var hash = window.location.hash;
if (hash.substring(1) == 'FirstTime') {
  $('#FirstTime').modal('show');
}

/*
var $input =  $this.find('#Employee_resume').val();
//var $input =  $this.find('input:file').val();
 if($input == '') {
   alert ("you must choose a file");
	}
	*/
});


$(document).ready(function() {
function onSubmitt(){
var $input =  $('.FileResume').val();
//var $input =  $this.find('input:file').val();
 if($input == '') {
   alert ("you must attach a resume file");
			$('#ResumeError').html('<div class="alert alert-block alert-error" style="margin-top:-50px;">You must attach your resume.</div>');
			$('.FileResume').css('color','#B94A48');
			return false;

	}else{
		$('#ResumeError').html('');
		$('.FileResume').css('color','#468847');
		
		var ext = $('.FileResume').val().split('.').pop().toLowerCase();
		if($.inArray(ext, ['pdf','doc','docx']) == -1) {
			alert('invalid file extension!');
			$('#ResumeError').html('<div class="alert alert-block alert-error">Resume should be pdf/doc or docx only.</div>');
			$('.FileResume').css('color','#B94A48');
			return false;
		}else{
			$('#ResumeError').html('');
			$('.FileResume').css('color','#468847');
			return true;			
		}
	}

}
$('#deposit-Resume').submit(onSubmitt);
});

$(document).ready(function() {
function onSubmittt(){

var input =  $('.FileResume').val();
var ext = $('.FileResume').val().split('.').pop().toLowerCase();

if(input !== ''){
	if($.inArray(ext, ['pdf','doc','docx']) == -1) {
			//alert('invalid file extension!');
			$('#ResumeError').html('<div class="alert alert-block alert-error">Resume should be pdf/doc or docx only.</div>');
			$('.FileResume').css('color','#B94A48');
			return false;
	}else{
			$('#ResumeError').html('');
			$('.FileResume').css('color','#468847');
			return true;
	}
}
}

$('#employee-form').submit(onSubmittt);
});


$(document).ready(function() {


// search bar place holder
	$('.joborstartup').on('change', function() {
		if(this.value=='jobs'){ // If Job is selected
			$('#search').attr("placeholder", "Job Keywords");
		}
		else{
			$('#search').attr("placeholder", "Startup Name");
		}
	});
	
	
	
	
function bytesToSize(bytes) {
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Bytes';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}


function onSubmi(){

var input =  $('#Employee_resume').val();
var ext = $('#Employee_resume').val().split('.').pop().toLowerCase();
var fsize = $('#Employee_resume')[0].files[0].size; //get file size

if(input !== ''){
	if($.inArray(ext, ['pdf','doc','docx']) == -1) {
		//alert('invalid file extension!');
		$('#Employee_resume_em_').html('<div class="alert alert-block alert-error">Resume should be pdf/doc or docx only.</div>');
		$('#Employee_resume_em_').show();
		$('#Employee_resume').css('color','#B94A48');		
		return false;
	}else{
		
			$('#ResumeError').html('');
			$('#Employee_resume_em_').hide();
			$('#Employee_resume').css('color','#468847');
			return true;
	}
}
}

$('#job-form').submit(onSubmi);
});