<?php
$this->breadcrumbs = array(
    'Company' => array('/Update'),
    'Startup User',);
$this->pageTitle = 'Update Startup User | '.Yii::app()->params['pageTitle'];
?>

<h1>Update Startup User</h1>
<br>
 <div class ="span9">   
        <?php $this->widget('ImperaviRedactorWidget', array(
		// The textarea selector
		'selector' => '.redactor',
		// Some options, see http://imperavi.com/redactor/docs/
		'options' => array('class'=>'span8'),
		));
		

		/** @var BootActiveForm $form */
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                                                                                'id'=>'horizontalForm',
                                                                                'type'=>'horizontal',
                                                                                'enableClientValidation'=>true,
                                                                                'clientOptions'=>array('validateOnSubmit'=>true,),
                                                                               
                                                                                )); ?>
               
                  
            <?php echo $form->errorSummary($CForm); ?>
            <?php echo $form->textFieldRow($CForm, 'name'); ?>

			
			<?php echo $form->passwordFieldRow($CForm, 'password1'); ?>
            <?php echo $form->passwordFieldRow($CForm, 'password2'); ?>
            <?php echo $form->passwordFieldRow($CForm, 'password3'); ?>
            <?php echo $form->textFieldRow($CForm, 'contact'); ?>
			<?php echo $form->textFieldRow($CForm, 'cemail'); ?>
            
            
            <div class="form-actions">
                <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Save')); ?>
            </div>
            
    <?php $this->endWidget();    ?>
 </div>           