<?php
$this->breadcrumbs = array(
    'Company' => array('/Update'),
    'Startup Password',);
$this->pageTitle = 'Update Startup Password | '.Yii::app()->params['pageTitle'];
?>

<h1>Change Startup Password</h1>
<br>
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


<?php if(Yii::app()->user->hasFlash('warning')): ?>
 
<div class="flash-success">
    <?php echo Yii::app()->user->getFlash('warning'); ?>
</div><br />
 
<?php endif; ?>


			
			<?php echo $form->passwordFieldRow($CForm, 'password1'); ?>
            <?php echo $form->passwordFieldRow($CForm, 'password2'); ?>
            <?php echo $form->passwordFieldRow($CForm, 'password3'); ?>

            
            
            <div class="form-actions">
                <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Save')); ?>
            </div>
            
    <?php $this->endWidget();    ?>
 </div>           