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
                                                                                'htmlOptions'=>array('class'=>'well ContactForm'),)); ?>
        
        	<p class="note">Fields with <span class="required">*</span> are required.</p>
        	
        	<?php echo $form->textFieldRow($model, 'name', array('class'=>'span6')); ?>
	        <?php echo $form->textFieldRow($model, 'email', array('class'=>'span6')); ?>
			<div style="clear:both;float:none;">
			<?php echo $form->radioButtonList($model,'type',array('Job seeker'=>'Job seeker','Startup'=>'Startup')); ?>
			</div>
			<div style="clear:both;float:none;">
			<?php echo $form->dropDownListRow($model, 'subject', array('Feedback-Testimonial on Jobs' => 'Feedback-Testimonial on Jobs',
                                                                'Featured Jobs' => 'Featured Jobs',
                                                                'Resume database' => 'Resume database',
                                                                'Exploring Partnership' => 'Exploring Partnership',
                                                                'Upcoming Events'=> 'Upcoming Events',
                                                                'Your feedback on our blogs' => 'Your feedback on our blogs',
																'Report an issue' => 'Report an issue',
																'Others' => 'Others',), 
                                                                 array('class'=>'span6','options' => array('M' => array('selected' => true)))); ?>
			</div>
        	<?php echo $form->textAreaRow($model, 'body', array('class'=>'span6', 'rows'=>6)); ?>

                <?php if(CCaptcha::checkRequirements()): ?>
                    	<?php echo $form->labelEx($model,'verifyCode'); ?>
                        <?php $this->widget('CCaptcha'); ?><br />
                        <?php echo $form->textField($model,'verifyCode'); ?>
                        <div class="hint">
							<small>Please enter the letters as they are shown in the image above.
                            <br/>Letters are not case-sensitive.</small>
						</div>
                            <?php echo $form->error($model,'verifyCode'); ?>
                <?php endif; ?>
		<?php echo $form->errorSummary($model); ?>		
                <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Submit')); ?>
	<?php $this->endWidget(); ?>

     </div>

    <?php endif; ?>