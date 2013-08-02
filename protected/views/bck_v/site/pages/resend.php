<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$this->pageTitle=Yii::app()->name . ' - Account Not Activated';
$this->breadcrumbs=array(
	'Account Activation',
);
?>



<div id="inspired_wrapper">    

    <div id="inspired_content_top"></div>

    <div id="inspired_content">
        <div id="inspired_big_content">
            
                <h3> Account not activated </h3><br>
                    We have sent you a new email for you.<br>
                    Please check your email and activate your account.<br>
                    <br>
                    Best Regards, <br>
                    uStyle Team
                    
            </div>
         <img src ="<?php echo Yii::app()->request->baseUrl?>/images/resend.png" style="width=100px; height:100px; float:right;">


        <div class="cleaner"></div>
    </div>
</div> <!-- end of wrapper -->
