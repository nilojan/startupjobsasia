<?php
/* @var $this ProfileController */

//$this->breadcrumbs=array(
//	'Profile',
//);
?>
<!-- <h1><?php //echo $user->name ?> Profile</h1> -->


<?php
$this->breadcrumbs=array(
	'User'=>array('index'),
	//$model->EID,
	'Profile',
);

echo '<img src='.Yii::app()->request->baseUrl.'/images/profile/'. $model->photo.' style= " height:200px; width:200px; float:left; border:1px solid silver;" >';

?>

<?php //echo $user->username; ?>

<br/><h1><?php echo $model->fname." ".$model->lname; ?></h1> 
<?php $curent_user_id = (string)Yii::app()->user->getId();
if($_GET['id'] == $curent_user_id)
{ ?>
<p><a href="<?php echo Yii::app()->getBaseUrl(true).'/user/edit/1'; ?>" ><?php echo 'Edit Profile'; ?></a></p>
<?php } 

?>
<br/><br/>
<b><?php echo CHtml::encode($model->getAttributeLabel('EID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($model->EID),array('view','id'=>$model->EID)); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('fname')); ?>:</b>
	<?php echo CHtml::encode($model->fname); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('lname')); ?>:</b>
	<?php echo CHtml::encode($model->lname); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('coverLetter')); ?>:</b>
	<?php echo CHtml::encode($model->coverLetter); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('gender')); ?>:</b>
	<?php echo CHtml::encode($model->gender); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('contact')); ?>:</b>
	<?php echo CHtml::encode($model->contact); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($model->email); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('dob')); ?>:</b>
	<?php echo CHtml::encode($model->dob); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('location')); ?>:</b>
	<?php echo CHtml::encode($model->location); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('country')); ?>:</b>
	<?php echo CHtml::encode($model->country); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('lastjob')); ?>:</b>
	<?php echo CHtml::encode($model->lastjob); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('edu')); ?>:</b>
	<?php echo CHtml::encode($model->edu); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('work_exp')); ?>:</b>
	<?php echo CHtml::encode($model->work_exp); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('curr_salary')); ?>:</b>
	<?php echo CHtml::encode($model->curr_salary); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('exp_salary')); ?>:</b>
	<?php echo CHtml::encode($model->exp_salary); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('availability')); ?>:</b>
	<?php echo CHtml::encode($model->availability); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($model->content); ?>
	<br />

	
<br/><br/>

<?php /*$this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'EID',
		//'UID',
		//'registered',
		'fname',
		'lname',
		'contact',
		'email',
		//'photo',
		'coverLetter',
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
)); */?>

<?php if(Yii::app()->user->isCompany() || Yii::app()->user->isAdmin())
{ ?>
<div class ="span2">
                    <?php  echo CHtml::link(CHtml::encode('Download Resume'),Yii::app()->baseUrl . '/resume/'.$model->resume,array('target'=>'_blank')); ?>
</div>
<?php } ?>
