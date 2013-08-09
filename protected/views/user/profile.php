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


<?php $this->widget('bootstrap.widgets.TbDetailView',array(
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
)); ?>

<?php if(Yii::app()->user->isCompany() || Yii::app()->user->isAdmin())
{ ?>
<div class ="span2">
                    <?php  echo CHtml::link(CHtml::encode('Download Resume'),Yii::app()->baseUrl . '/resume/'.$model->resume,array('target'=>'_blank')); ?>
</div>
<?php } ?>

    


