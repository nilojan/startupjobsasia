<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'ud_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'u_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'fname',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'lname',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'contact',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'gender',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'dob',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'country',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'last_job',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'h_edu',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'work_exp',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'curr_salary',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'exp_salary',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'availability',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'resume1',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'resume2',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'resume_uploaded',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'photo',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textFieldRow($model,'cover_letter',array('class'=>'span5','maxlength'=>1500)); ?>

	<?php echo $form->textFieldRow($model,'modified',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
