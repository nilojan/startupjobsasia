<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Deposit Resume';
$this->breadcrumbs=array(
	'Deposit Resume',
);
?>

<small>Please save resume into PDF or Microsoft Word format </small>

<?php /** @var BootActiveForm $form */
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                                                                                'id'=>'horizontalForm',
                                                                                'type'=>'horizontal',
                                                                                'enableClientValidation'=>true,
                                                                                'clientOptions'=>array('validateOnSubmit'=>true,),
                                                                                'htmlOptions' => array('enctype' => 'multipart/form-data'),
                                                                                )); ?>
   <?php echo $form->errorSummary($model); ?> 
   
   <?php //echo $form->textFieldRow($model, 'fullname', array('class' =>'span4')); ?>
   <?php //echo $form->textFieldRow($model, 'dob', array('class' =>'span4')); ?>
   
   <?php $resume=Yii::app()->request->baseUrl.'/resume/'.$user->resume?>
   <?php echo   '<H2>' .CHtml::link(CHtml::encode('Resume'),Yii::app()->baseUrl . '/resume/'.$user->resume, array('target'=>'_blank') );?></H2>
   <?php echo $form->fileFieldRow($model, 'resume'); ?>  
   <?php echo $form->fileFieldRow($model, 'photo'); ?> 
   <?php echo $form->textAreaRow($model,'coverLetter', array('class'=>'span9', 'rows'=>10)); ?>
     <div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Submit')); ?>
     </div>                       
<?php $this->endWidget(); ?>
            


