<?php
$this->breadcrumbs = array(
    'Company' => array('/DashBoard'),
    'DashBoard',);
$this->pageTitle = 'DashBoard | '.Yii::app()->params['pageTitle'];
?>

<h1>DashBoard</h1>
<br>
<div class="clear">
	<div class="span12">
		<a href ="<?php echo Yii::app()->request->baseUrl?>/user/edit">
			<div class="span3 dashboard-a">
				<i class="icon-large icon-cloud"></i>Edit Profile
			</div>
		</a>
		<a href ="<?php echo Yii::app()->request->baseUrl?>/user/application">
			<div class="span3 dashboard-c">
				<i class="icon-large icon-cloud"></i>Applications
			</div>
		</a>
		<a href ="<?php echo Yii::app()->request->baseUrl?>/user/profile/<?php Yii::app()->user->getId(); ?>">
			<div class="span3 dashboard-d">
				<i class="icon-large icon-cloud"></i>Profile
			</div>
		</a>
	</div>
</div>


            