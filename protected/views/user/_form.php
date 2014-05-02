
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'employee-form',
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
		'validateOnChange'=>true,
		'validateOnType'=>true,
		),
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>
	<div class="row-fluid">
	<div class="span6">


	<?php echo $form->textFieldRow($model,'fname',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'lname',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->dropDownListRow($myDate,'country_code', $myDate->getCountryCodes(), array('select'=>$myDate->country_code)); ?>
	<?php echo $form->textField($model,'contact',array('class'=>'span3','maxlength'=>16)); ?><span id="errmsg"></span>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>100)); ?>
  
	<div style="display:none">
    <?php echo $form->fileFieldRow($model, 'photo');  
    if($model->photo != '')
    	echo '<input type="hidden" name="old_pic" value="'.$model->photo.'" />';        
    ?> 
    </div>

	<?php echo $form->dropDownListRow($model,'gender',array('Male'=>'Male', 'Female'=>'Female'), array('class'=>'span5','maxlength'=>10)); ?>

	<br><?php echo CHtml::encode($model->getAttributeLabel('dob')); ?>
	
	    <?php echo $form->dropDownListRow($myDate,'day', $myDate->getDates(), array('select'=>$myDate->day,'class'=>'span2')); ?>
   
    
        <?php echo $form->dropDownList($myDate,'month', $myDate->getMonths(), array('select'=>$myDate->month,'class'=>'span3')); ?>
   
   
        <?php echo $form->dropDownList($myDate,'year', $myDate->getYears(), array('select'=>$myDate->year,'class'=>'span3')); ?>

		<?php echo $form->textAreaRow($model,'coverLetter',array('rows'=>6, 'cols'=>50, 'class'=>'span9')); ?>
		
		<?php echo $form->radioButtonListRow($model, 'acc_status', array(
        '0' => 'Visible',
        '1' => 'Invisible'
    )); ?>
	<div class="alert in alert-block fade alert-success"><small>
<b>Visible</b> – Your resume can be seen by any Startups that is registered with us<br />
<b>Invisible  </b> – Your resume can only be seen by Startups which you have applied with</small>
	</div>
	</div>
	<div class="span6">




    <?php echo $form->dropDownListRow($model,'location',$myDate->getCountryName(), array('select'=>$model->location, 'prompt'=>'Select'), array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->dropDownListRow($model,'country',$myDate->getCountryList(), array('select'=>$model->country, 'prompt'=>'Select'), array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'lastjob',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->dropDownListRow($model, 'edu', array(''=>'Education', 
															'Doctorate'=>'Doctorate (PHD)',
															'Master'=>'Master Degree',
															'Bachelor'=>'Bachelor Degree',
															'Diploma'=>'High School / Diploma',
															'Cert'=>'Professional Certification',
															'Others'=>'Others')); ?>

	
	<?php echo $form->textFieldRow($model,'curr_salary',array('class'=>'span2')); ?>

	<?php echo $form->textFieldRow($model,'exp_salary',array('class'=>'span2')); ?>

	<?php echo $form->textFieldRow($model,'tags',array('class'=>'span5')); ?>

		<div class="controls">		
				<p class="note">
					<span class="label">Add key words to your profile to be easily found by more Startups</span>
				</p>
		</div>
		
	<?php echo $form->dropDownListRow($model,'availability',array(''=>'Select',
																'immediately'=>'immediately',
																'1 week'=>'1 week',
																'2 week'=>'2 week',
																'1 month'=>'1 month')); ?>

	<?php //echo $form->textFieldRow($model,'resume',array('class'=>'span5','maxlength'=>256)); ?>
	 <?php //echo   '<H2>' .CHtml::link(CHtml::encode('Resume'),Yii::app()->baseUrl . '/resume/'.$model->resume, array('target'=>'_blank') );?></H2>
	<?php echo $form->fileFieldRow($model, 'resume',array('class'=>'FileResume'));
	if($model->resume != ''){
    	echo '<input type="hidden" name="old_resume" value="'.$model->resume.'" />';     
		echo "<br /><br /> Your Current resume is ";
		echo CHtml::link(CHtml::encode($model->resume),Yii::app()->baseUrl . '/user/downloadResume?filename='.$model->resume,array('target'=>'_blank'));
		
	}	?> 


</div></div>
	<?php echo $form->errorSummary($model); ?>
	<span id="ResumeError"></span>
	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>


<?php $this->endWidget(); ?>
