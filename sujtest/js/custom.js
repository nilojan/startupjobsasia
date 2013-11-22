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
     
});