<?php
$this->breadcrumbs=array(
	'Contact',
);
$this->pageTitle = 'Contact Us | '.Yii::app()->params['pageTitle'];
?>

<h1>Connect with us</h1>
<?php if(Yii::app()->user->hasFlash('contact')): ?>
<div class="flash-success">
    <?php echo Yii::app()->user->getFlash('contact'); ?>
</div>
<?php else: ?>
    <p>
    If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>
    <div class="span8 ">
       <?php /** @var BootActiveForm $form */
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                                                                                'id'=>'verticalForm',
                                                                                //'type'=>'horizontal',
                                                                                'enableClientValidation'=>true,
                                                                                'clientOptions'=>array('validateOnSubmit'=>true,),
                                                                                'htmlOptions'=>array('class'=>'well'),)); ?>
        
        	<p class="note">Fields with <span class="required">*</span> are required.</p>
        	<?php echo $form->errorSummary($model); ?>
        	<?php echo $form->textFieldRow($model, 'name', array('class'=>'span3')); ?>
	        <?php echo $form->textFieldRow($model, 'email', array('class'=>'span3')); ?>
	        <?php echo $form->textFieldRow($model, 'subject', array('class'=>'span3')); ?>
        	<?php echo $form->textAreaRow($model, 'body', array('class'=>'span6', 'rows'=>10)); ?>
        
                <?php if(CCaptcha::checkRequirements()): ?>
                    	<?php echo $form->labelEx($model,'verifyCode'); ?>
                        <?php $this->widget('CCaptcha'); ?><br />
                        <?php echo $form->textField($model,'verifyCode'); ?>
                        <div class="hint"><small>Please enter the letters as they are shown in the image above.
                            <br/>Letters are not case-sensitive.</small></div>
                            <?php echo $form->error($model,'verifyCode'); ?>
                <?php endif; ?>
                <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Submit')); ?>
	<?php $this->endWidget(); ?>

     </div>
  
     <div class="span1 ">
        <!-- <h3> Address</h3> -->
     </div>

    <?php endif; ?>


