<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'employee-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'UID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'registered',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fname',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'lname',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'contact',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>100)); ?>

<<<<<<< HEAD
	<?php echo $form->textFieldRow($model,'photo',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textAreaRow($model,'coverletter',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'gender',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'dob',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'location',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'country',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'lastjob',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'edu',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'work_exp',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'curr_salary',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'exp_salary',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'availability',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'resume',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textAreaRow($model,'content',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'source',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'ip',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'acc_status',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'views',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'last_modified',array('class'=>'span5')); ?>

=======
>>>>>>> e2d716017bcd3f63195d5861e12885e5e6e75fe4
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
<<<<<<< HEAD
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
=======
			'label'=>$model->isNewRecord ? 'Register' : 'Save',
		//	'label'=>$model->isNewRecord ? 'Create' : 'Save',
>>>>>>> e2d716017bcd3f63195d5861e12885e5e6e75fe4
		)); ?>
	</div>

<?php $this->endWidget(); ?>
