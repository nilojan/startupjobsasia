<script type='text/javascript'>//<![CDATA[ 
  $(function() {
    $( "#DepositResume_dob" ).datepicker({
      changeMonth: true,
	  changeYear: true,
	  dateFormat: "yy-mm-dd",
	  yearRange: "1950:2000"
    });
  });//]]>
	</script>
	<?php
/* @var $this SiteController */
/* @var $model DepositResume */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Deposit Resume';
$this->breadcrumbs=array(
	'Deposit Resume',
);
?>
<h1>Deposit Resume</h1>

<div class="flash-success">
    <?php echo Yii::app()->user->getFlash('deposit'); ?>
</div>

<div class="hint">
<small>Please save resume into PDF or Microsoft Word format </small>
</div>
<?php /** @var BootActiveForm $form */
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                                                                                'id'=>'horizontalForm',
                                                                                'type'=>'horizontal',
                                                                                'enableClientValidation'=>true,
                                                                                'clientOptions'=>array('validateOnSubmit'=>true,),
                                                                                'htmlOptions' => array('enctype' => 'multipart/form-data'),
                                                                                )); ?>
   <?php echo $form->errorSummary($model); ?> 

    <?php echo $form->textFieldRow($model, 'fullname', array('class'=>'span3')); ?>
	<?php echo $form->textFieldRow($model, 'dob', array('class'=>'span3')); ?>
	<?php
	
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'name'=>'publishDate',
		// additional javascript options for the date picker plugin
		'options'=>array(
			'showAnim'=>'fold',
		),
		'htmlOptions'=>array(
			'style'=>'height:20px;display:none;'
		),
		));
	?>
    

	<?php echo $form->radioButtonListRow($model, 'gender', array(
        'Male' => 'Male',
        'Female' => 'Female',
    )); ?>
	   <?php echo $form->textFieldRow($model, 'email', array('class'=>'span3')); ?>
        <?php echo $form->dropDownListRow($model, 'location', array(''         =>'',
                                                                '+65' => 'Singapore',
                                                                '+1' => 'America',
                                                                '+44' => 'United Kingdom',
                                                                '+60'=> 'Malaysia',
                                                                '+61' => 'Australia'), 
                                                                 array('options' => array('M' => array('selected' => true)))); ?>
	<?php echo $form->textFieldRow($model, 'contact', array('class'=>'span3')); ?>
        <?php echo $form->dropDownListRow($model, 'edu', array(''         =>'Education',
                                                                'Doctorate' => 'Doctorate (PHD)',
                                                                'Master' => 'Master Degree',
                                                                'Bachelor' => 'Bachelor Degree',
                                                                'Diploma'=> 'High School / Diploma',
																'Cert'=> 'Professional Certification',
                                                                'Others' => 'Others'), 
                                                                 array('options' => array('M' => array('selected' => true)))); ?>
        <?php echo $form->dropDownListRow($model, 'national', array(''         =>'Nationality',
                                                                'American' => 'American',
                                                                'Singaporean' => 'Singaporean',
                                                                'Others' => 'Others'), 
                                                                 array('options' => array('M' => array('selected' => true)))); ?>																 
   <?php echo $form->fileFieldRow($model, 'resume'); ?>  
   <?php //echo $form->fileFieldRow($model, 'photo'); ?> 
   <?php //echo $form->textAreaRow($model,'coverletter', array('class'=>'span9', 'rows'=>10)); ?>
   <div class="control-group ">
<div class="controls">
                   <?php if(CCaptcha::checkRequirements()): ?>
                    	<?php echo $form->labelEx($model,'verifyCode'); ?>
                        <?php $this->widget('CCaptcha'); ?><br />
                        <?php echo $form->textField($model,'verifyCode'); ?>
                        <div class="hint"><small>Please enter the letters as they are shown in the image above.
                            <br/>Letters are not case-sensitive.</small></div>
                            <?php echo $form->error($model,'verifyCode'); ?>
                <?php endif; ?>
</div>
</div>

				
     <div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Submit')); ?>
     </div>                       
<?php $this->endWidget(); ?>
            


