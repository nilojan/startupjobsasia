<?php
if($action=='applyjob')
{
    $this->breadcrumbs=array(
    	'Apply Job',
    );
}
else if($action=='depositResume')
{
    $this->breadcrumbs=array(
        'Deposit Resume',
    );
}




if($action=='applyjob')
{ 
  ?>
    <h1>Apply for this Job</h1>
  <?php 
}
else if($action=='depositResume')
{
   ?>
    <h1>Deposit Resume</h1>
  <?php
}
?>  
<?php  $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                                                                                'id'=>'horizontalForm',
                                                                                //'type'=>'horizontal',
                                                                                'enableClientValidation'=>false,
                                                                                'enableAjaxValidation'=>false,
                                                                                'clientOptions'=>array('validateOnSubmit'=>true,),
                                                                                'htmlOptions' => array('enctype' => 'multipart/form-data'),
                                                                                )); ?>
    <p class="help-block">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->errorSummary($model); ?> 
       
    <?php echo $form->textFieldRow($model,'fname',array('class'=>'span3', 'rows'=>10)); ?>
    <?php echo $form->textFieldRow($model,'lname',array('class'=>'span3', 'rows'=>10)); ?>
    <?php echo $form->textFieldRow($model,'email',array('class'=>'span3', 'rows'=>10)); ?>

	
	<?php echo $form->dropDownListRow($myDate,'country_code', $myDate->getCountryCodes(), array('select'=>$myDate->country_code,'class'=>'span2')); ?>
	<?php echo $form->textField($model,'contact',array('class'=>'span2','maxlength'=>10)); ?><span id="errmsg"></span>
	
    <?php /* echo $form->textFieldRow($model,'dob',array('class'=>'span3', 'rows'=>10)); 
       
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'model' => $model,
       // 'name'=>'bdate',  
        'attribute'=>'dob', 
        // additional javascript options for the date picker plugin
        'options'=>array(
            'showAnim'=>'fold',
            'changeYear'=>'true',
            'changeMonth'=>'true',
            'yearRange'=> '1940:2013',
        ),
        'htmlOptions'=>array(
            'style'=>'height:20px;display:none;'
        ),
        ));
		*/
    ?>
	
		<br><?php echo CHtml::encode($model->getAttributeLabel('dob')); ?><br>
	
	    <?php echo $form->dropDownList($myDate,'day', $myDate->getDates(), array('select'=>$myDate->day,'class'=>'span1')); ?>
   
        <?php echo $form->dropDownList($myDate,'month', $myDate->getMonths(), array('select'=>$myDate->month,'class'=>'span2')); ?>
   
        <?php echo $form->dropDownList($myDate,'year', $myDate->getYears(), array('select'=>$myDate->year,'class'=>'span1')); ?>
	
    <?php echo $form->dropDownListRow($model,'location',$myDate->getCountryList(), array('select'=>$model->location, 'prompt'=>'Select'), array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->dropDownListRow($model,'country',$myDate->getCountryList(), array('select'=>$model->country, 'prompt'=>'Select'), array('class'=>'span5','maxlength'=>50)); ?>

	
    <?php echo $form->radioButtonListRow($model, 'gender', array(
        'Male' => 'Male',
        'Female' => 'Female'
    )); ?>
   
    

	<?php echo $form->dropDownListRow($model, 'edu', array(''=>'Education', 
															'Doctorate'=>'Doctorate (PHD)',
															'Master'=>'Master Degree',
															'Bachelor'=>'Bachelor Degree',
															'Diploma'=>'High School / Diploma',
															'Cert'=>'Professional Certification',
															'Others'=>'Others')); ?>
															

	
    <?php echo $form->textAreaRow($model,'coverLetter', array('class'=>'span5', 'rows'=>5)); ?>
    <?php echo $form->fileFieldRow($model,'resume'); ?>


<div id="job" class="apply-instructions">
    <h3>Are you sure you want to submit this? </h3>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Submit')); ?>

</div>
            
<?php $this->endWidget(); ?>

