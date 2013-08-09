<?php
$this->breadcrumbs=array(
	'Application1s'=>array('index'),
	$model->AID,
);

$this->menu=array(
	array('label'=>'List Application1','url'=>array('index')),
	array('label'=>'Create Application1','url'=>array('create')),
	array('label'=>'Update Application1','url'=>array('update','id'=>$model->AID)),
	array('label'=>'Delete Application1','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->AID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Application1','url'=>array('admin')),
);
?>

<h1>View Application1 #<?php echo $model->AID; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'AID',
		'EID',
		'JID',
		'CID',
		'jobstatus',
		'offered',
		'shortlist',
		'onhold',
		'applied',
	),
)); ?>
