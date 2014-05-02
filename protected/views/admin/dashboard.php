<?php
$this->breadcrumbs = array(
    'Company' => array('/DashBoard'),
    'DashBoard',);
$this->pageTitle = 'DashBoard | '.Yii::app()->params['pageTitle'];
?>

<h1>DashBoard</h1>


<div class="clear">
	<div class="span12">
	
		<a href ="<?php echo Yii::app()->request->baseUrl?>/admin/user">
			<div class="View_Applications">
				&nbsp;
			</div>
		</a>
		<a href ="<?php echo Yii::app()->request->baseUrl?>/admin/jobs">
			<div class="ManageJob">
				&nbsp;
			</div>
		</a>
		<a href ="<?php echo Yii::app()->request->baseUrl?>/admin/startup">
			<div class="View_Profile">
				&nbsp;
			</div>	
		</a>
		
		
		
		<?php //echo CHtml::link('<div class="span3 dashboard-a"><i class="icon-large icon-cloud"></i>Manage User</div>',array('admin/user')); ?>


		<?php //echo CHtml::link('<div class="span3 dashboard-b"><i class=" icon-largeicon-cloud"></i>Manage Startup</div>',array('admin/startup')); ?>


		<?php //echo CHtml::link('<div class="span3 dashboard-c"><i class=" icon-largeicon-cloud"></i>Manage Jobs</div>',array('admin/jobs')); ?>
		
	</div>
</div>