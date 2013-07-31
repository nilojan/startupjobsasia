<?php
$this->breadcrumbs=array(
	'Register / Success',
);
$this->pageTitle = 'Success | '.Yii::app()->params['pageTitle'];

?>
<h3> You have been successfully registered </h3>
                <p>A mail will be sent to your email in the next 15 minutes.<br/>
                    Please verify your email account.</p>


               
            <img src ="<?php echo Yii::app()->request->baseUrl?>/images/email_sent.jpg" style="width=500px; height:500px; float:right;">

