<?php
$this->breadcrumbs=array(
	'Application1s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Application1','url'=>array('index')),
	array('label'=>'Manage Application1','url'=>array('admin')),
);
?>

<h1>Create Application1</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>