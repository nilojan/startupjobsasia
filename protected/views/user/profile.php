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
echo "<div class=\"span12\">";

echo '<img src='.Yii::app()->request->baseUrl.'/images/profile/'. $model->photo.' style= "margin-left:20px;height:200px; width:200px; float:left; border:5px solid #F89406;" >';

?>

<span style="font-family: 'BebasNeue';font-size:60px;padding:0px 20px;"><?php echo $model->fname." ".$model->lname; ?></span>
<hr style="border:2px solid #F89406;margin: 80px 0 100px;" />
<div class="btn-toolbar">
    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'type'=>'info', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        'buttons'=>array(
            array('label'=>'Resume', 'items'=>array(
                array('label'=>'Export as word file', 'url'=>'../download'),
                '---',
                array('label'=>'Export as pdf file', 'url'=>'../pdf'),
            )),
        ),
    )); ?>
</div>

<?php $curent_user_id = (string)Yii::app()->user->getId();
if($_GET['id'] == $curent_user_id || Yii::app()->user->isAdmin())
{ ?>
<p><a href="<?php echo Yii::app()->getBaseUrl(true).'/user/edit/1'; ?>" ><?php echo 'Edit Profile'; ?></a></p>
<?php } 

?>
<br/>
	
	
<!--
	<b><?php echo CHtml::encode($model->getAttributeLabel('fname')); ?>:</b>
	<?php echo CHtml::encode($model->fname); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('lname')); ?>:</b>
	<?php echo CHtml::encode($model->lname); ?>
	<br />
-->
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


	<b><?php //echo CHtml::encode($model->getAttributeLabel('content')); ?></b>
	<?php //echo CHtml::encode($model->content); ?>

	<b><?php echo CHtml::encode($model->getAttributeLabel('tags')); ?>:</b>
	<?php echo CHtml::encode($model->tags); ?>

	<br />

	
<br/><br/>




 
<?php if(Yii::app()->user->isCompany() || Yii::app()->user->isAdmin()) { ?>
<div class ="span2">
                    <?php  echo CHtml::link(CHtml::encode('Download Resume'),Yii::app()->baseUrl . '/resume/'.$model->resume,array('target'=>'_blank')); ?>
</div>
<?php } ?>
    
</div>
<div>
	<h2>Suggested Jobs</h2>
	<?php
$query=$model->tags;
$query = str_replace(","," +",$query);
$query = '+'.$query;
 $dataProvider=new CActiveDataProvider('job', array( 
                                                'criteria'=>array(
                                                        'order'=>'created DESC',
                                                         'condition'=>'JID in(SELECT JID FROM job WHERE status = 1 && MATCH (title,description) 
                                                             AGAINST ("'.$query.'" IN BOOLEAN MODE))',  
                                                           ),
                                                        'pagination'=>array(
                                                                            'pageSize'=>20,
                                                        ),
                                                ));
        $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_jobView',   // refers to the partial view named '_post'
            'sortableAttributes'=>array(
           // 'title',
           // 'type' => 'Type',    
           // 'created'=>'Created',
    ),
));
	?>
	</div>
