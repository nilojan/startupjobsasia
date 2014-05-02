<?php
$this->breadcrumbs = array(
    'Company' => array('/company/DashBoard'),
    'DashBoard',);
	
$this->pageTitle = 'DashBoard | '.Yii::app()->params['pageTitle'];
?>

<h1>DashBoard</h1>
<br>
<div class="clear DashBoard">
	<div class="span12">
		<a href ="<?php echo Yii::app()->request->baseUrl?>/job/submitJob">
			<div class="SubmitJob">
				&nbsp;
			</div>		
		</a>
		<a href ="<?php echo Yii::app()->request->baseUrl?>/job/manageJobs">
			<div class="ManageJob">
				&nbsp;
			</div>	
		</a>
		<a href ="<?php echo Yii::app()->request->baseUrl?>/company/application">
			<div class="View_Applications">
				&nbsp;
			</div>	
		</a>
		<a href ="<?php echo Yii::app()->request->baseUrl?>/company/company/12">
			<div class="View_Profile">
				&nbsp;
			</div>	
		</a>
		<a href ="<?php echo Yii::app()->request->baseUrl?>/company/update/12">
			<div class="Update_Profile">
				&nbsp;
			</div>	
		</a>
		<a href ="<?php echo Yii::app()->request->baseUrl?>/company/premium">
			<div class="Premium_Features">
				&nbsp;
			</div>	
		</a>
	</div>
</div>