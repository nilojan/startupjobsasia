<?php
if(isset($_GET['status']))
{
	$message ='';
	if($_GET['status'] == '1')
	{
		$message_1 = 'Your account has been successfully activated';
		$message_2 = 'You can login to your account using this following link';
		$link = Yii::app()->getBaseUrl(true).'/site/login';
		$link_title = 'Login';
	}
	else if($_GET['status'] == '2')
	{
		$message_1 = 'Your account is already active';
		$message_2 = 'You can login to your account using this following link';
		$link = Yii::app()->getBaseUrl(true).'/site/login';
		$link_title = 'Login';
	}
	
	else if($_GET['status'] == '3')
	{
		$message_1 = 'Your account verification code is not valid or has been expired';
		$message_2 = 'You can create your account using this following link';
		$link = Yii::app()->getBaseUrl(true).'/user/registration';
		$link_title = 'Register';
	}
	
	else
	{
		
	}


}
$this->breadcrumbs=array(
		'User / Account'
		);
$this->pageTitle = 'Success | '.Yii::app()->params['pageTitle'];

?>
<h3><?php echo $message_1 ?></h3>
<p><?php echo $message_2 ?></p>
<a href='<?php echo $link ?>'><?php echo $link_title ?></a>


               
           <!--  <img src ="<?php //echo Yii::app()->request->baseUrl?>/images/email_sent.jpg" style="width=500px; height:500px; float:right;"> -->

