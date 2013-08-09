<?php
$this->breadcrumbs=array(
	'Application1s'=>array('index'),
	$model->AID=>array('view','id'=>$model->AID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Application1','url'=>array('index')),
	array('label'=>'Create Application1','url'=>array('create')),
	array('label'=>'View Application1','url'=>array('view','id'=>$model->AID)),
	array('label'=>'Manage Application1','url'=>array('admin')),
);
?>

<h1>Update Application1 <?php echo $model->AID; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>