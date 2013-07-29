<?php
$this->breadcrumbs=array(
	'Userdetails'=>array('index'),
	$model->ud_id,
);

$this->menu=array(
	array('label'=>'List Userdetails','url'=>array('index')),
	array('label'=>'Create Userdetails','url'=>array('create')),
	array('label'=>'Update Userdetails','url'=>array('update','id'=>$model->ud_id)),
	array('label'=>'Delete Userdetails','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ud_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Userdetails','url'=>array('admin')),
);
?>

<h1>View Userdetails #<?php echo $model->ud_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'ud_id',
		'u_id',
		'fname',
		'lname',
		'contact',
		'email',
		'gender',
		'dob',
		'country',
		'last_job',
		'h_edu',
		'work_exp',
		'curr_salary',
		'exp_salary',
		'availability',
		'resume1',
		'resume2',
		'resume_uploaded',
		'photo',
		'cover_letter',
		'modified',
	),
)); ?>
