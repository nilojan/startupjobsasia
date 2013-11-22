<?php
$this->breadcrumbs=array(
	'Employees'=>array('index'),
	$model->EID,
);

$this->menu=array(
	array('label'=>'List Employee','url'=>array('index')),
	array('label'=>'Create Employee','url'=>array('create')),
	array('label'=>'Update Employee','url'=>array('update','id'=>$model->EID)),
	array('label'=>'Delete Employee','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->EID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Employee','url'=>array('admin')),
);
?>

<h1>View Employee #<?php echo $model->EID; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'EID',
		'UID',
		'registered',
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
		'source',
		'ip',
		'acc_status',
		'views',
		'last_modified',
	),
)); ?>
