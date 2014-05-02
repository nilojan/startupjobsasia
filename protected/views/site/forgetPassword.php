<?php
$this->breadcrumbs=array(
	'Forget Password',
);
$this->pageTitle = 'Forget Password | '.Yii::app()->params['pageTitle'];
?>

         
                <h3>Request for Username and Password</h3>
                <br>
           
                Enter your Email address
<?php /** @var BootActiveForm $form */
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                                                                                'id'=>'horizontalForm',
                                                                                'type'=>'horizontal',
                                                                                'enableClientValidation'=>true,
                                                                                'clientOptions'=>array('validateOnSubmit'=>true,),
                                                                                )); ?>
        
        <?php echo $form->textFieldRow($model, 'email', array('class' =>'span3')); ?>
        
 <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Submit')); ?>
        </div>    
<?php $this->endWidget(); ?>
