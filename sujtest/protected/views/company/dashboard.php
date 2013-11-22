<?php
/*$this->breadcrumbs = array(
    'Company' => array('/DashBoard'),
    'DashBoard',);
	*/
$this->pageTitle = 'DashBoard | '.Yii::app()->params['pageTitle'];
?>

<h1>DashBoard</h1>
<br>
<div class="clear DashBoard">
	<div class="span12">
		<a href ="<?php echo Yii::app()->request->baseUrl?>/job/submitJob">
			<div class="span4 dashboard-a">
				<div class="Post-Job">Post Job</div>		
			</div>
		</a>
		<a href ="<?php echo Yii::app()->request->baseUrl?>/job/manageJobs">
			<div class="span4 dashboard-b">
				<div class="Manage-Job">Manage Jobs</div>
			</div>
		</a>
		<a href ="<?php echo Yii::app()->request->baseUrl?>/company/application">
			<div class="span4 dashboard-c">
				<div class="Application">Applications</div>
			</div>
		</a>
		<a href ="<?php echo Yii::app()->request->baseUrl?>/company/company/12">
			<div class="span4 dashboard-d">
				<div class="Profile">Profile</div>
			</div>
		</a>
		<a href ="<?php echo Yii::app()->request->baseUrl?>/company/update/12">
			<div class="span4 dashboard-e">
				<div class="UpdateProfile">Update Profile</div>
			</div>	
		</a>
		<a href ="<?php echo Yii::app()->request->baseUrl?>/company/premium">
			<div class="span4 dashboard-f">
				<div class="Premiumm">Featured</div>
			</div>
		</a>		
	</div>
</div>