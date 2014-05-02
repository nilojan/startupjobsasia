<?php
$this->breadcrumbs=array(
	'Email not found',
);
$this->pageTitle = 'Email not found | '.Yii::app()->params['pageTitle'];
?>




<h4>Sorry! </h4>


<p>We are unable to find your email address</p>
<p><a href="<?php echo Yii::app()->request->baseUrl?>/user/forgetPassword">try again</a> with correct email address or <a href="<?php echo Yii::app()->request->baseUrl?>/company/registration">sign up</a> for new account</p>
                    