/*$(window).load(function() {
	$("html, body").animate({ scrollTop: 350 }, 500);
	//$("html, body").animate({ scrollTop: $('.abc').height() }, 900);
	//$('html, body').animate({ scrollTop: $('.abc').offset().top - 500 });
});
*/
  $(document).ready(function(){
 
    var i =0;
     $('#btn').click(function(){
      
      if(i==0){
            $(".theme_select").animate({marginLeft:'0'},800);
        i=1;
        }
        else{
            $(".theme_select").animate({marginLeft:'-150px'},800);
            i=0;
          }

      });
    var c_color = c_colorr;
    
    var bgc = c_color;
    changeThemeColor(bgc);
                    function changeThemeColor(bgc){
                            $(".nav > li > a").css("color",bgc);
                            $(".breadcrumb > li >a").css("color",bgc);
                            $(".span5").css("background",bgc);
							$("#Totalo").css("background",bgc);
							$("#Totalo").css("border-color",bgc);
                            $(".SearchForm input[type='text']").css("border-color",bgc);
                            $(".span11").css("border-color",bgc);
                            $("#bgchange").css("background",bgc);
                            $(".nav-pills > .active > a").css("background",bgc);
                            $(".nav-pills > .active > a").css("color","");
                            $(".topHeader").css("border-bottom-color",bgc);
                            $(".abc").css("border-top-color",bgc);
                            $(".span6").css("border-color",bgc);
                            $('textarea, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .uneditable-input').css("border-color",bgc);
                             }
        $("#full").spectrum({
            color: c_color,
            showInput: true,
            
            showInitial: true,
            showPalette: true,
            showSelectionPalette: true,
            maxPaletteSize: 10,
            preferredFormat: "hex",
            localStorageKey: "spectrum.demo",
           
            move: function(color) {
                
              var bgc=   color.toHexString();
               changeThemeColor(bgc);

                 

                
            },

           change: function(color) {
                
              var bgc=   color.toHexString();
                
             changeThemeColor(bgc);
                 $.ajax({  

				type: 'POST',  
				url: suj_url,
				//url: '/'.location.hostname.'/company/color', 
			
			   //url:'<?php echo $this->createUrl('company/color'); ?>', 
               data: 'cname='+bgc ,  

                           success: function(data)  
                               {                                                      

                                    $('#PackagingMetric_std_rate').html(data); 

                             } 

                               }); 
                 

                
            },
          show: function(color) {
                
              var bgc=   color.toHexString();
                
              changeThemeColor(bgc);

                 

                
            },
 
            palette: [
                ["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)",
                "rgb(204, 204, 204)", "rgb(217, 217, 217)","rgb(255, 255, 255)"],
                ["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
                "rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"], 
                ["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)", 
                "rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)", 
                "rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)", 
                "rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)", 
                "rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)", 
                "rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
                "rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
                "rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
                "rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)", 
                "rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
            ]
        });

    });