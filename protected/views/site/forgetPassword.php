<?php
$this->breadcrumbs=array(
	'Forget Password',
);
$this->pageTitle = 'Forget Password | '.Yii::app()->params['pageTitle'];
?>

         
                <h3>Request for Username and Password</h3>
                <br>
 <?php if(Yii::app()->user->hasFlash('forgetPassword')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('forgetPassword'); ?>
</div>

<?php else: ?>
<p>
please type your email and hit submit to retrieve your password.
</p>


<?php /** @var BootActiveForm $form */
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                                                                                'id'=>'horizontalForm',
                                                                                'type'=>'horizontal',
                                                                                'enableClientValidation'=>true,
                                                                                'clientOptions'=>array('validateOnSubmit'=>true,),
                                                                                )); ?>
        
        <?php echo $form->textFieldRow($model, 'email', array('class' =>'span3')); ?>
        
 <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Retrieve')); ?>
        </div>    
<?php $this->endWidget(); ?>
<?php endif; ?>