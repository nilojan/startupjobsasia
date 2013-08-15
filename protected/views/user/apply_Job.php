<?php

$this->breadcrumbs=array(
	'Apply',
);



?>

<h1>Apply for this Job</h1>
<!-- <h3>You are submitting</h3> -->
  
<?php  $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                                                                                'id'=>'horizontalForm',
                                                                                'type'=>'horizontal',
                                                                                'enableClientValidation'=>true,
                                                                                'clientOptions'=>array('validateOnSubmit'=>true,),
                                                                                'htmlOptions' => array('enctype' => 'multipart/form-data'),
                                                                                )); ?>
    <?php echo $form->errorSummary($model); ?> 
       
    <?php echo $form->textFieldRow($model,'fname',array('class'=>'span9', 'rows'=>10)); ?>
    <?php echo $form->textFieldRow($model,'lname',array('class'=>'span9', 'rows'=>10)); ?>
    <?php echo $form->textFieldRow($model,'email',array('class'=>'span9', 'rows'=>10)); ?>
    <?php echo $form->textFieldRow($model,'contact',array('class'=>'span9', 'rows'=>10)); ?>
    <?php echo $form->textFieldRow($model,'dob',array('class'=>'span9', 'rows'=>10)); ?>
	<?php echo $form->dropDownListRow($model, 'gender', array('Male'=>'Male', 'Female'=>'Female'), 
                                                                 array('options' => array('M' => array('selected' => true)))); ?>
	<?php echo $form->dropDownListRow($model, 'edu', array(	'Doctorate'=>'Doctorate (PHD)',
															'Master'=>'Master',
															'Bachelor'=>'Bachelor Degree',
															'Diploma'=>'High School / Diploma',
															'Cert'=>'Cert',
															'Others'=>'Others'), 
                                                                 array('options' => array('M' => array('selected' => true)))); ?>
    <?php echo $form->textFieldRow($model,'country',array('class'=>'span9', 'rows'=>10)); ?>
	<?php echo $form->dropDownListRow($model, 'country', array(	''=>'Nationality (PHD)',
															'Afghan'=>'Afghan',
															'Albanian'=>'Albanian',
															'Algerian'=>'Algerian',
															'American'=>'American',
															'Andorran'=>'Andorran',
															'Angolan'=>'Angolan',
															'Antiguans'=>'Antiguans',
															'Argentinean'=>'Argentinean',
															'Australian'=>'Australian',
															'Austrian'=>'Austrian',
															'Azerbaijani'=>'Azerbaijani',
															'Bahamian'=>'Bahamian',
															'Bahraini'=>'Bahraini',
															'Bangladeshi'=>'Bangladeshi',
															'Barbadian'=>'Barbadian',
															'Barbudans'=>'Barbudans',
															'Batswana'=>'Batswana',
															'Belarusian'=>'Belarusian',
															'American'=>'American',
															'American'=>'American',
															'American'=>'American',
															'American'=>'American',
															'American'=>'American',
															'American'=>'American',
															'American'=>'American',
															'American'=>'American',
															'American'=>'American',
															'American'=>'American',
															'Others'=>'Others'), 
                                                                 array('options' => array('M' => array('selected' => true)))); ?>	
    <?php echo $form->textAreaRow($model,'coverLetter', array('class'=>'span9', 'rows'=>10)); ?>
    <?php echo $form->fileFieldRow($model,'resume'); ?>


<div id="job" class="apply-instructions">
    <h3>Are you sure you want to submit this? </h3>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Submit')); ?>

</div>
            
<?php $this->endWidget(); ?>

