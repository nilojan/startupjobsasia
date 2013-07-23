<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'EID',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'username',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'birthDate',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'gender',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>45)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
