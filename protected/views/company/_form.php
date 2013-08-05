<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'company-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'UID',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'cname',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'cemail',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textAreaRow($model,'address',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'image',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'contact',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'job_count',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'status',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'started',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'awards',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'summary',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'coverpicture',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textAreaRow($model,'mission',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'culture',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'benefits',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'location',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'twitter',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'facebook',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'website',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'created',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'modified',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'unique_views',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'views',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
