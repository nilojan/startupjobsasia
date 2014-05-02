$(document).ready(function() {

$('input[type=file]').change(function() { 
    // select the form and submit
	 //$("#output").html("Sucess form submit");
	 //$("#imgUpldCover").html("");
    $('form#imgUpldCover').submit();
});


	$('#imgUpldCover').submit(function(){
			$(this).ajaxSubmit({
			target:   		'#output',   // target element(s) to be updated with server response 
			beforeSubmit:  	beforeSubmit,  // pre-submit callback 
			type:			'post',
			url:        	'/company/uploadcoverimage', 
			data: 			{ cover_image: $('#cover_image').val()},
			success:       afterSuccess,  // post-submit callback 
			resetForm: true        // reset the form after successful submit 
		});
			// return false to prevent standard browser submit and page navigation 
			return false; 
	});	


//after succesful upload
function afterSuccess()
{
	//$("#output").html("afterSuccess");
	$('#output').html(data);
	//location.reload();
}

//function to check file size before uploading.
function beforeSubmit(){
    //check whether browser fully supports all File API
   if (window.File && window.FileReader && window.FileList && window.Blob)
	{

		if( !$('#cover_image').val()) //check empty input filed
		{
			$("#output").html("Are you kidding me?");
			return false
		}
		
		var fsize = $('#cover_image')[0].files[0].size; //get file size
		var ftype = $('#cover_image')[0].files[0].type; // get file type
		
		//allow only valid image file types 
		switch(ftype)
        {
            case 'image/png': case 'image/gif': case 'image/jpeg': case 'image/pjpeg':
                break;
            default:
                $("#output").html("<b>"+ftype+"</b> Unsupported file type!");
				return false
        }
		
		//Allowed file size is less than 1 MB (1048576)
		if(fsize>1048576) 
		{
			$("#output").html("<b>"+bytesToSize(fsize) +"</b> Too big Image file! <br />Please reduce the size of your photo using an image editor.");
			return false
		}
		
		//$("#output").html("Submiting");  
	}
	else
	{
		//Output error to older unsupported browsers that doesn't support HTML5 File API
		$("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
		return false;
	}
}

//function to format bites bit.ly/19yoIPO
function bytesToSize(bytes) {
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Bytes';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}

}); 