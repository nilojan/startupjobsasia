<?php
$this->breadcrumbs=array(
	'User'=>array('index'),
	//$model->EID,
	'Profile',
);
echo "<div class=\"span12\">";

	
	$model->photo = ($model->photo == '') ? "profile_default.jpg" : $model->photo;

	$ProImg = '<img src='.Yii::app()->request->baseUrl.'/images/profile/400/'. $model->photo.' style= "width:200px; float:left; border:5px solid #F89406;" >';

?>
<?php if(yii::app()->user->isMember()){ ?>
<form name="form" method="POST" id="imgUpld" enctype="multipart/form-data">
<div style="display: none;">
		<input  name="profile_image" onSubmit="return false" id="profile_image" type="file" />
</div>
<div class="getoutimg">
       <a href="" onclick="return uploadImage();"><?php echo $ProImg; ?></a> <!-- Image link to select imag -->

</div>
</form>
<div id="output"></div>

<script>
// this script executes when click on upload images link
    function uploadImage() {
        $("#profile_image").click();
        return false;
}
</script>
<?php }else{ ?>

<?php echo $ProImg; } ?>


<div style="font-family: 'BebasNeue';font-size:60px;padding:20px;margin-top:45px;margin-left:210px;"><?php echo $model->fname." ".$model->lname; ?></div>
<hr style="border:2px solid #F89406;margin: 8px 0 100px;" />
<div class="btn-toolbar clearButton">
    <?php 

if(Yii::app()->user->isMember())
{
	$this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'info', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons'=>array(

			array('label'=>'Edit Profile', 'url'=>''.Yii::app()->baseUrl . '/user/edit/'.$model->UID),
/*
			array('label'=>'Private it','htmlOptions'=>array(
																'onclick'=>'return confirm("Are you sure want to make your profile Private?");'
															), 'url'=>Yii::app()->createUrl('user/EditUserStatus', array('EID'=>$model->UID)),'visible'=>$model->acc_status == 0),

			array('label'=>'Public it','htmlOptions'=>array(
																'onclick'=>'return confirm("Are you sure want to make your profile Public?");'
															), 'url'=>Yii::app()->createUrl('user/EditUserStatus', array('EID'=>$model->UID)),'visible'=>$model->acc_status == 1),	

			array('label'=>'Resume', 'items'=>array(
                array('label'=>'Export as word file', 'url'=>'../download'),
                '---',
                array('label'=>'Export as pdf file', 'url'=>'../pdf'),
            )),
			*/
        ),
    ));
}
?>
</div>

<?php if(Yii::app()->user->isCompany() || Yii::app()->user->isAdmin()) { ?>

<?php if($model->resume !='' ): ?>
<div class ="span12">
    <?php  echo CHtml::link(CHtml::encode('Download Resume'),Yii::app()->baseUrl . '/company/downloadResume?filename='.$model->resume,array('target'=>'_blank')); ?>
</div>
<?php endif; ?>
<?php }else{ ?>


<?php if($model->lname == NULL ): ?>
<div class="row-fluid">
	Please Edit Your Profile , informative profile with resume can be index by employers
</div><br /><br />
<?php endif; ?>
<?php } ?>
<div class="span5">	



<?php if($model->gender !='' ): ?>
<div class="row">
	<div class="span5"><b><?php echo CHtml::encode($model->getAttributeLabel('gender')); ?>:</b></div>
	<div class="span5"><?php echo CHtml::encode($model->gender); ?></div>
</div>
<?php endif; ?>


<?php if($model->contact !='' ): ?>
<div class="row">
	<div class="span5"><b><?php echo CHtml::encode($model->getAttributeLabel('contact')); ?>:</b></div>
	<div class="span5"><?php echo CHtml::encode($model->contact); ?></div>
</div>
<?php endif; ?>


<?php if($model->email !='' ): ?>
<div class="row">
	<div class="span5"><b><?php echo CHtml::encode($model->getAttributeLabel('email')); ?>:</b></div>
	<div class="span5"><?php echo CHtml::encode($model->email); ?></div>
</div>
<?php endif; ?>


<?php if($model->dob == NULL ): ?>
<div class="row">
	<div class="span5"><b><?php echo CHtml::encode($model->getAttributeLabel('dob')); ?>:</b></div>
	<?php
	$model->dob = date("jS F Y",strtotime($model->dob));
	?>
	<div class="span5"><?php echo CHtml::encode($model->dob); ?></div>
</div>
<?php endif; ?>


<?php if($model->location !='' ): ?>
<div class="row">
	<div class="span5"><b><?php echo CHtml::encode($model->getAttributeLabel('location')); ?>:</b></div>
	<div class="span5"><?php echo myDate::getCountryName($model->location); ?></div>
</div>
<?php endif; ?>


<?php if($model->country !='' ): ?>
<div class="row">
	<div class="span5"><b><?php echo CHtml::encode($model->getAttributeLabel('country')); ?>:</b></div>
	<div class="span5"><?php echo CHtml::encode($model->country); ?></div>
</div>
<?php endif; ?>



<?php if($model->lastjob !='' ): ?>
<div class="row">
	<div class="span5"><b><?php echo CHtml::encode($model->getAttributeLabel('lastjob')); ?>:</b></div>
	<div class="span5"><?php echo CHtml::encode($model->lastjob); ?></div>
</div>
<?php endif; ?>

<?php if($model->edu !='' ): ?>
<div class="row">
	<div class="span5"><b><?php echo CHtml::encode($model->getAttributeLabel('edu')); ?>:</b></div>
	<div class="span5"><?php echo CHtml::encode($model->edu); ?></div>
</div>
<?php endif; ?>

<?php if($model->work_exp !='' ): ?>
<div class="row">
	<div class="span5"><b><?php echo CHtml::encode($model->getAttributeLabel('work_exp')); ?>:</b></div>
	<div class="span5"><?php echo CHtml::encode($model->work_exp); ?></div>
</div>
<?php endif; ?>

<?php if($model->curr_salary !='' ): ?>
<div class="row">
	<div class="span5"><b><?php echo CHtml::encode($model->getAttributeLabel('curr_salary')); ?>:</b></div>
	<div class="span5"><?php echo CHtml::encode($model->curr_salary); ?></div>
</div>
<?php endif; ?>

<?php if($model->exp_salary !='' ): ?>
<div class="row">
	<div class="span5"><b><?php echo CHtml::encode($model->getAttributeLabel('exp_salary')); ?>:</b></div>
	<div class="span5"><?php echo CHtml::encode($model->exp_salary); ?></div>
</div>
<?php endif; ?>

</div>	


<?php if(!Yii::app()->user->isCompany() && !Yii::app()->user->isAdmin()) { ?>
<div class="span6">

	 <div class="span12" id="clear" style="border:3px solid #F97C30;float:left;">
	 <div style="text-align:left;background:#F97C30;color:#fff;padding:10px;"><h2>Recommended Jobs</h2></div>
	 <div style="margin-left:20px;">
	<?php
$query = $model->tags;
$query = str_replace(","," +",$query);
$query = '+'.$query;
 $dataProvider=new CActiveDataProvider('job', array( 
                                            'criteria'=>array(
                                                'order'=>'created DESC',
                                                'condition'=>'JID in(SELECT JID FROM job WHERE status = 1 && MATCH (title,description,responsibility,requirement,tags) 
                                                             AGAINST ("'.$query.'" IN BOOLEAN MODE))'),
                                                'pagination'=>array('pageSize'=>20),
                                                ));
        $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            //'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_jobView',   // refers to the partial view named '_post'
            'sortableAttributes'=>array(
           // 'title',
           // 'type' => 'Type',    
           // 'created'=>'Created',
    ),
));
	?>

	</div>
	</div>
	</div>
<?php }else{ ?>



<div class="span5">
<b>Achievements / Summary</b><br />
	<?php echo CHtml::encode($model->coverLetter); ?>
</div>
<?php } ?>

</div><!-- span12 end-->