<?php
$this->breadcrumbs = array(
    'User Registration',
);
$this->pageTitle = 'Getting Username and Password | '.Yii::app()->params['pageTitle'];
?>

Hi <?php echo $_GET['name']; ?>,

<p>Your user account is activated</p>
<p>type your password to continue</p>

<?php /** @var BootActiveForm $form */
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                                                                                'id'=>'activeuser-form',
                                                                                'type'=>'horizontal',
																				'enableAjaxValidation'=>true,
                                                                                'enableClientValidation'=>true,
                                                                                'focus'=>array($model,'username'),
                                                                                'clientOptions'=>array('validateOnSubmit'=>true,),
                                                                                )); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	
        <?php //echo $form->textFieldRow($model, 'username', array('style' => 'text-transform:lowercase;', 'maxlength' => 15)); ?>
        <?php echo $form->passwordFieldRow($model, 'password', array('size' => 20, 'maxlength' => 15)); ?>
        <?php echo $form->passwordFieldRow($model, 'password2', array('size' => 20, 'maxlength' => 15)); ?>
        <?php echo $form->errorSummary($model); ?>


            
      <div class="form-actions">
      <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 
                                                              'type'=>'primary',
                                                              'size'=>'Normal',
                                                              'label'=>'Save')); ?>
      </div>    
<?php $this->endWidget(); ?>