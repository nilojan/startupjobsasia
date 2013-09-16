<?php
$this->breadcrumbs = array(
    'Company' => array('/DashBoard'),
    'DashBoard',);
$this->pageTitle = 'DashBoard | '.Yii::app()->params['pageTitle'];
?>

<h1>DashBoard</h1>
<br>
<div>
<?php echo CHtml::link('Jobs',array('admin/jobs')); ?>
</div>
<div>
<?php echo CHtml::link('user',array('admin/user')); ?>
</div>

            