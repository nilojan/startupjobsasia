<?php
$this->breadcrumbs=array(
	'Employee Registration',
);

/*$this->menu=array(
	array('label'=>'List Employee','url'=>array('index')),
	array('label'=>'Manage Employee','url'=>array('admin')),
);*/
?>

<h1>Register Employee</h1>
<p>
Please fill out the form with your particulars
</p>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>