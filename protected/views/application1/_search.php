<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'AID',array('class'=>'span5')); ?>

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
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
