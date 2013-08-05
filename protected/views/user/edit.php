<?php
$this->breadcrumbs=array(
	'User'=>array('index'),
//	$model->EID=>array('view','id'=>$model->EID),
	'Edit',
);


?>

<h1>Edit Profile</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>