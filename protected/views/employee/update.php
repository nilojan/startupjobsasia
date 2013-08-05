<?php
$this->breadcrumbs=array(
	'Employees'=>array('index'),
	$model->EID=>array('view','id'=>$model->EID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Employee','url'=>array('index')),
	array('label'=>'Create Employee','url'=>array('create')),
	array('label'=>'View Employee','url'=>array('view','id'=>$model->EID)),
	array('label'=>'Manage Employee','url'=>array('admin')),
);
?>

<h1>Update Employee <?php echo $model->EID; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>