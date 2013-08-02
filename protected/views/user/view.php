<?php
$this->breadcrumbs=array(
	'User'=>array('index'),
	//$model->EID,
	'Profile',
);


?>

<h1><?php echo $model->fname." ".$model->lname; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'EID',
		//'UID',
		//'registered',
		'fname',
		'lname',
		'contact',
		'email',
		'photo',
		'coverletter',
		'gender',
		'dob',
		'location',
		'country',
		'lastjob',
		'edu',
		'work_exp',
		'curr_salary',
		'exp_salary',
		'availability',
		'resume',
		'content',
		//'source',
		//'ip',
		//'acc_status',
		//'views',
		//'last_modified',
	),
)); ?>
