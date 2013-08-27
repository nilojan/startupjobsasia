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
                                                                                'type'=>'horizontal',
                                                                                'enableClientValidation'=>true,
                                                                                'clientOptions'=>array('validateOnSubmit'=>true,),
                                                                                'htmlOptions' => array('enctype' => 'multipart/form-data'),
                                                                                )); ?>
    <?php echo $form->errorSummary($model); ?> 
       
    <?php echo $form->textFieldRow($model,'fname',array('class'=>'span3', 'rows'=>10)); ?>
    <?php echo $form->textFieldRow($model,'lname',array('class'=>'span3', 'rows'=>10)); ?>
    <?php echo $form->textFieldRow($model,'email',array('class'=>'span3', 'rows'=>10)); ?>
    <?php echo $form->textFieldRow($model,'contact',array('class'=>'span3', 'rows'=>10)); ?>
    <?php echo $form->textFieldRow($model,'dob',array('class'=>'span3', 'rows'=>10)); ?>
    <?php    
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
    ?>
    <?php echo $form->radioButtonListRow($model, 'gender', array(
        'Male' => 'Male',
        'Female' => 'Female'
    )); ?>
   
    
    <?php echo $form->textFieldRow($model,'edu',array('class'=>'span3', 'rows'=>10)); ?>
    <?php echo $form->textFieldRow($model,'country',array('class'=>'span3', 'rows'=>10)); ?>
    <?php echo $form->textAreaRow($model,'coverLetter', array('class'=>'span5', 'rows'=>5)); ?>
    <?php echo $form->fileFieldRow($model,'resume'); ?>


<div id="job" class="apply-instructions">
    <h3>Are you sure you want to submit this? </h3>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Submit')); ?>

</div>
            
<?php $this->endWidget(); ?>

