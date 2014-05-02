<?php
$this->breadcrumbs = array(
    'Company' => array('/Update'),
    'Startup User',);
$this->pageTitle = 'Update Startup User | '.Yii::app()->params['pageTitle'];
?>

<h1>Update Startup Contact</h1>
<br>
<?php if(Yii::app()->user->hasFlash('warning')): ?>
 
<div class="flash-success">
    <?php echo Yii::app()->user->getFlash('warning'); ?>
</div><br />
 
<?php endif; ?>
 <div class ="span9">   
        <?php 		

		/** @var BootActiveForm $form */
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                                                                                'id'=>'horizontalForm',
                                                                                'type'=>'horizontal',
                                                                                'enableClientValidation'=>true,
                                                                                'clientOptions'=>array('validateOnSubmit'=>true,),
                                                                               
                                                                                )); ?>
               
                  
            <?php echo $form->errorSummary($CForm); ?>
            <?php echo $form->textFieldRow($CForm, 'name',array('class'=>'span4','onkeypress'=>'return textonly(event);')); ?>
            <?php echo $form->textFieldRow($CForm, 'contact',array('class'=>'span4','onkeypress'=>'return numericOnly(event);')); ?>
			<?php echo $form->textFieldRow($CForm, 'cemail'); ?>
            
            
            <div class="form-actions">
                <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Save')); ?>
            </div>
            
    <?php $this->endWidget();    ?>
 </div>           