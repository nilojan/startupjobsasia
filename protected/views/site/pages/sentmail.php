<?php
$this->pageTitle=Yii::app()->name . ' - Mail Sent';
$this->breadcrumbs=array(
	'Mail Sent',
);
?>


<div id="inspired_wrapper">    

    <div id="inspired_content_top"></div>

    <div id="inspired_content">
        <div id="inspired_big_content">
        

                <h3>Your username and password has been sent </h3>
                <br>
                <br>
                Please check your email<br>
                You will receive the email in the next 15 minutes
                 <br>
                 <br>
                 
            Best Regards, <br>
            uStyle Team   
        <img src ="<?php echo Yii::app()->request->baseUrl?>/images/resend.png" style="width=300px; height:300px; float:right;">

        </div>
        

        <div class="cleaner"></div>
    </div>
</div> <!-- end of wrapper -->
