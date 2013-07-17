<?php
$this->breadcrumbs = array(
    'Register a Company',
);
$this->pageTitle = 'Register Company | '.Yii::app()->params['pageTitle'];

?>

<p>
Please fill out the form with your particulars
</p>
 <?php /** @var BootActiveForm $form */
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                                                                                'id'=>'horizontalForm',
                                                                                'type'=>'horizontal',
                                                                                'enableClientValidation'=>true,
                                                                                'clientOptions'=>array('validateOnSubmit'=>true,),
                                                                                'htmlOptions' => array('enctype' => 'multipart/form-data'),
                                                                             
                                                                                )); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model); ?>
        <?php echo $form->textFieldRow($model, 'cname', array('class' =>'span5')); ?>
        <?php echo $form->fileFieldRow($model, 'image'); ?>  
        <?php echo $form->textFieldRow($model, 'cemail', array('class' => 'span5', 'rows' => 1)); ?>
        <?php echo $form->textFieldRow($model, 'contact'); ?>
        <?php echo $form->textAreaRow($model,'address', array('class'=>'span8', 'rows'=>3)); ?>
        <?php echo $form->textAreaRow($model,'mission', array('class'=>'span8', 'rows'=>8)); ?>
        <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Submit')); ?>
        </div>    
<?php $this->endWidget(); ?>





