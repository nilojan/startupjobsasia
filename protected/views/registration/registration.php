<?php
$this->breadcrumbs = array(
    'Registration',
);
$this->pageTitle = 'Registration | '.Yii::app()->params['pageTitle'];
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
                                                                                )); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model); ?>
        <?php echo $form->textFieldRow($model, 'username'); ?>
        <?php echo $form->passwordFieldRow($model, 'password', array('size' => 20, 'maxlength' => 15)); ?>
        <?php echo $form->passwordFieldRow($model, 'password2', array('size' => 20, 'maxlength' => 15)); ?>
        <?php echo $form->textFieldRow($model, 'name', array('size' =>40)); ?>
        <?php echo $form->textFieldRow($model, 'email', array('size' => 40, 'rows' => 1)); ?>
        <?php echo $form->captchaRow($model, 'verifyCode'); ?>
        <div class="hint">Please enter the letters as they are shown in the image above.
                          <br/>Letters are not case-sensitive.
        </div>
            
      <div class="form-actions">
      <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 
                                                              'type'=>'primary',
                                                              'size'=>'Normal',
                                                              'label'=>'Submit')); ?>
      </div>    
<?php $this->endWidget(); ?>








