<?php
/* @var $this ProfileController */

$this->breadcrumbs=array(
	'Profile',
);
?>
<h1><?php echo $user->name ?> Profile</h1>


<?php echo '<img src='.Yii::app()->request->baseUrl.'/images/profile/'. $user->photo.' style= " height:200px; width:200px float:right" >'?>


<?php echo $user->coverLetter; ?>
    


