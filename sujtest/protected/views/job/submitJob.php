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

<div class ="span9">
<div class="hint"><p>Please fill out the form with your particulars</p></div>
    <?php 	   /* $this->widget('ImperaviRedactorWidget', array(
		// The textarea selector
		'selector' => '.redactor',
		// Some options, see http://imperavi.com/redactor/docs/
		'options' => array('class'=>'span8'),
		));*/
		
		/** @var BootActiveForm $form */
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array('id'=>'verticalForm',
                                                                                'type'=>'horizontal',
                                                                                'enableClientValidation'=>true,
                                                                                'clientOptions'=>array('validateOnSubmit'=>true,),
                                                                                )); ?>

	<p class="note"><span class="label">Fields with <span class="required">*</span> are required.</span></p>
	<?php echo $form->errorSummary($model); ?>
        <?php echo $form->textFieldRow($model, 'title',array('class'=>'span12 jobtitle')); ?>

        <?php /* echo $form->dropDownListRow($model, 'type', array(''         =>'',
                                                                'Full-time' => 'Full-time',
                                                                'Part-time' => 'Part-time',
                                                                'Freelance' => 'Freelance',
                                                                'Internship'=> 'Internship',
                                                                'Temporary' => 'Temporary'), 
                                                                 array('options' => array('M' => array('selected' => true))));*/ ?>
	<div class="control-group ">
	<label class="control-label required" id="lbl" for="JobForm_location">Type<span class="required">*</span></label>
	<div class="controls CheckBox">


    <?php echo $form->checkBoxRow($model, 'full_time', array('value' => 'Full-time', 'uncheckValue'=>'0'));
		echo $form->checkBoxRow($model, 'part_time', array('value' => 'Part-time', 'uncheckValue'=>'0'));
		echo $form->checkBoxRow($model, 'freelance', array('value' => 'Freelance', 'uncheckValue'=>'0'));
		echo $form->checkBoxRow($model, 'internship', array('value' => 'Internship', 'uncheckValue'=>'0'));
		echo $form->checkBoxRow($model, 'temporary', array('value' => 'Temporary', 'uncheckValue'=>'0'));
		echo $form->checkBoxRow($model, 'co_founder', array('value' => 'Co-Founder', 'uncheckValue'=>'0'));
			
		/*	echo $form->ListBox($model,'types',array('id'=>'Select Skill','Full-time',
        'Part-time',
        'Freelance',
		'Internship',
		'Temporary',), array('multiple' => 'multiple'));
		*/
			?>
            <span id='err_msg'></span>
	</div>
	</div>
        <?php echo $form->dropDownListRow($model, 'location', array(
																'Asia' => 'Asia',
																'Singapore' => 'Singapore',
                                                                'China' => 'China',
                                                                'India' => 'India',
                                                                'Indonesia' => 'Indonesia',
                                                                'Japan'=> 'Japan',
                                                                'Korea' => 'Korea',
                                                                'Malaysia' => 'Malaysia',
                                                                'Myanmar' => 'Myanmar',
                                                                'Taiwan' => 'Taiwan',
                                                                'Thailand' => 'Thailand',
                                                                'Vietnam' => 'Vietnam',), 
                                                                 array('options' => array('M' => array('selected' => true)))); ?>
																 
        <?php echo $form->dropDownListRow($model, 'salary', array(''=>'',
                                                                 '0-1000' => '$0 - $1000',
                                                                 '1001-2000' => '$1001-$2000',
                                                                 '2001-4000' => '$2001-$4000',
                                                                 '4001-6000'=> '$4001-$6000',
                                                                 '>10000' => 'Above $10000'), 
                                                                 array('options' => array('M' => array('selected' => true)))); ?>
        <?php echo $form->dropDownListRow($model, 'category', array(''         =>'',
                                                                 'Analytics' => 'Analytics',
                                                                 'Business Development' => 'Business Development',
                                                                 'Coporate Support' => 'Coporate Support',
                                                                 'Customer Service'=> 'Customer Service',
                                                                 'Design' => 'Design',
                                                                 'Marketing'=>'Marketing',
                                                                 'Public Relations'=>'Public Relations',
                                                                 'Technical' =>'Technical',
                                                                 'UX-UI'=>'UX-UI',
																 'Others'=>'Others'),                                                          
                                                                 array('options' => array('M' => array('selected' => true)))); ?>
          
       <?php echo $form->textAreaRow($model,'description', array('class'=>'span12 redactor', 'rows'=>10)); ?>
	   <?php echo $form->textAreaRow($model,'responsibility', array('class'=>'span12 redactor', 'rows'=>10)); ?>
	   <?php echo $form->textAreaRow($model,'requirement', array('class'=>'span12 redactor', 'rows'=>10)); ?>
	   
	   


		<div class="controls">		
				<p class="note"><span class="label">Job Applications will be sent to your registered email address.</span></p>
				<p class="note"><span class="label">You can add more email address to receive Job Applications.</span></p>
		</div>


       <?php echo $form->textFieldRow($model,'howtoapply', array('class'=>'span8', 'rows'=>2,'placeholder'=>'abc@mail.com,xyz@mail.com')); ?> 
	   <?php echo $form->textAreaRow($model,'tags', array('class'=>'span8', 'rows'=>2, 'placeholder'=>'To help users search more effectively')); ?> 
       <?php

       if(($premium == 1) || ($premium == 2) ) 
            echo $form->CheckboxRow($model,'premium', array('class'=>'span1', 'rows'=>2));
        ?> 
       <div class="form-actions">
       <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Submit')); ?>
       </div>
    <?php $this->endWidget(); ?>
</div>
<?php 
}
?>
<script>
$(document).ready(function(){
 function onSubmit() 
{ 
    
    if(($("#JobForm_full_time").prop('checked') == true) || ( $("#JobForm_part_time").prop('checked') == true) || ( $("#JobForm_temporary").prop('checked') == true) ||( $("#JobForm_co_founder").prop('checked') == true) || ( $("#JobForm_internship").prop('checked') == true) ||($("#JobForm_freelance").prop('checked') == true ))
    {

    }
    else
    {
       $('#err_msg').html('Type cannot be Blank');
       $('#err_msg').css('color','#B94A48');
       $('#lbl').css('color','#B94A48');
       return false;
    }
}

$('#verticalForm').submit(onSubmit)
});
</script>


