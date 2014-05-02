<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'application1-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'EID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'JID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'jobstatus',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'offered',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'shortlist',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'onhold',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'applied',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
