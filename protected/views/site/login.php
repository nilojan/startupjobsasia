
<?php if(!(Yii::app()->user->isGuest))
   {
     $this->redirect(Yii::app()->getBaseUrl(true));
     //Yii::app()->getBaseUrl(true)
   }
   else
   {
$this->breadcrumbs=array(
	'Login',
);
$this->pageTitle = 'Login | '.Yii::app()->params['pageTitle'];

?>
<div>
<h1>Login</h1>

<p>Please fill out the following form with your login credentials:</p>
<br>
 


<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'horizontalForm',
    'type'=>'horizontal',
    'enableClientValidation'=>true,
    'clientOptions'=>array('validateOnSubmit'=>true),
    
)); ?>
 
<?php echo $form->textFieldRow($model, 'username', array('class'=>'span3',
                                                         'placeholder'=>"Username",)); ?>
<?php echo $form->passwordFieldRow($model, 'password', array('class'=>'span3',
                                                             'placeholder'=>"Password")); ?>
<?php echo $form->checkboxRow($model, 'rememberMe'); ?>
 
<?php // $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'Login')); ?>
 <div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Login')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
     <?php $this->widget('bootstrap.widgets.TbButton', array(
                                        'label'=>'Forget Password',
                                        'type'=>'info', 
                                        'size'=>'', 
                                        'url'=>Yii::app()->createUrl("user/forgetPassword"),    
)); ?>  

 </div>

<?php $this->endWidget();
}
 ?>

<div id="err_msg" ></div>

</div>

