<?php
$this->breadcrumbs = array(
    'Submit a Job',);
$this->pageTitle = 'Submit Job | '.Yii::app()->params['pageTitle'];
if($job_post_balance == 0)
{ ?>
   <div><p>You have used all your free job post quota. Please buy some credits to post more jobs.</p> </div> 
<?php
}
else
{
?>

<div class="hint"><p>Please fill out the form with your particulars</p></div>
<div class ="span8">
    <?php /** @var BootActiveForm $form */
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array('id'=>'verticalForm',
                                                                                'type'=>'horizontal',
                                                                                'enableClientValidation'=>true,
                                                                                'clientOptions'=>array('validateOnSubmit'=>true,),
                                                                                )); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model); ?>
        <?php echo $form->textFieldRow($model, 'title',array('class'=>'span5')); ?>
        <?php echo $form->dropDownListRow($model, 'type', array(''         =>'',
                                                                'Full-time' => 'Full-time',
                                                                'Part-time' => 'Part-time',
                                                                'Freelance' => 'Freelance',
                                                                'Internship'=> 'Internship',
                                                                'Temporary' => 'Temporary'), 
                                                                 array('options' => array('M' => array('selected' => true)))); ?>

    <?php echo $form->checkBoxRow($model, 'full_time', array('value' => 'Full-time', 'uncheckValue'=>'0'));
		echo $form->checkBoxRow($model, 'part_time', array('value' => 'Part-time', 'uncheckValue'=>'0'));
		echo $form->checkBoxRow($model, 'freelance', array('value' => 'Freelance', 'uncheckValue'=>'0'));
		echo $form->checkBoxRow($model, 'internship', array('value' => 'Internship', 'uncheckValue'=>'0'));
		echo $form->checkBoxRow($model, 'temporary', array('value' => 'Temporary', 'uncheckValue'=>'0'));
			
		/*	echo $form->ListBox($model,'types',array('id'=>'Select Skill','Full-time',
        'Part-time',
        'Freelance',
		'Internship',
		'Temporary',), array('multiple' => 'multiple'));
		*/
			?>
	
        <?php echo $form->dropDownListRow($model, 'location', array(
																'Asia' => 'Asia',
																'Singapore' => 'Singapore',
                                                                'China' => 'China',
                                                                'India' => 'India',
                                                                'Indonesia' => 'Indonesia',
                                                                'Japan'=> 'Japan',
                                                                'Korea South' => 'Korea South',
                                                                'Malaysia' => 'Malaysia',
                                                                'Myanmar' => 'Myanmar',
                                                                'Taiwan' => 'Taiwan',
                                                                'Thailand' => 'Thailand',
                                                                'Vietnam' => 'Vietnam',), 
                                                                 array('options' => array('M' => array('selected' => true)))); ?>
        <?php echo $form->dropDownListRow($model, 'salary', array(''         =>'',
                                                                 '0 -1000' => '$0 - $1000',
                                                                 '1001-2000' => '$1001-$2000',
                                                                 '2001-4000' => '$2001-$4000',
                                                                 '4001-7000'=> '$4001-$6000',
                                                                 'Above 10000' => 'Above $10000'), 
                                                                 array('options' => array('M' => array('selected' => true)))); ?>
        <?php echo $form->dropDownListRow($model, 'category', array(''         =>'',
                                                                 'Analytics' => 'Analytics',
                                                                 'Business Development' => 'Business Development',
                                                                 'Coporate Support' => 'Coporate Support',
                                                                 'Customer Service'=> 'Customer Service',
                                                                 'Design' => 'Design',
                                                                 'Feature'=>'Featured',
                                                                 'Marketing'=>'Marketing',
                                                                 'Public Relations'=>'Public Relations',
                                                                 'Technical' =>'Technical',
                                                                 'UX/UI'=>'UX/UI'),                                                          
                                                                 array('options' => array('M' => array('selected' => true)))); ?>
          
       <?php echo $form->textAreaRow($model,'description', array('class'=>'span8', 'rows'=>10)); ?>
	   <?php echo $form->textAreaRow($model,'responsibility', array('class'=>'span8', 'rows'=>10)); ?>
	   <?php echo $form->textAreaRow($model,'requirement', array('class'=>'span8', 'rows'=>10)); ?>
       <?php echo $form->textAreaRow($model,'howtoapply', array('class'=>'span8', 'rows'=>2)); ?> 
	   <?php echo $form->textAreaRow($model,'tags', array('class'=>'span8', 'rows'=>2)); ?> 
       <div class="form-actions">
       <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Submit')); ?>
       </div>
    <?php $this->endWidget(); ?>
</div>
<?php 
}
?>



