<?php
$this->breadcrumbs=array(
	'Userdetails'=>array('index'),
	$model->ud_id=>array('view','id'=>$model->ud_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Userdetails','url'=>array('index')),
	array('label'=>'Create Userdetails','url'=>array('create')),
	array('label'=>'View Userdetails','url'=>array('view','id'=>$model->ud_id)),
	array('label'=>'Manage Userdetails','url'=>array('admin')),
);
?>

<h1>Update Userdetails <?php echo $model->ud_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>