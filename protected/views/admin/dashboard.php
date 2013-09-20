<?php
$this->breadcrumbs = array(
    'Company' => array('/DashBoard'),
    'DashBoard',);
$this->pageTitle = 'DashBoard | '.Yii::app()->params['pageTitle'];
?>

<h1>DashBoard</h1>


<div class="clear">
	<div class="span12">
		<?php echo CHtml::link('<div class="span3 dashboard-a"><i class="icon-large icon-cloud"></i>Manage User</div>',array('admin/user')); ?>

		</a>
		<?php echo CHtml::link('<div class="span3 dashboard-b"><i class=" icon-largeicon-cloud"></i>Manage Jobs</div>',array('admin/jobs')); ?>
		
	</div>
</div>