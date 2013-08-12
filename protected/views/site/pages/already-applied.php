<?php
$this->breadcrumbs=array(
	'Apply Job / Error',
);
$this->pageTitle = 'Already Applied | '.Yii::app()->params['pageTitle'];

?>
<h3> You have already applied for this job</h3>
                <p>A mail will be sent to your email in the next 15 minutes.<br/>
                    Please verify your email account.</p>


               
            <img src ="<?php echo Yii::app()->request->baseUrl?>/images/email_sent.jpg" style="width=500px; height:500px; float:right;">

