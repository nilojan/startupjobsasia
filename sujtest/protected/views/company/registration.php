<?php
$this->breadcrumbs = array(
    'Register a Company',
);
$this->pageTitle = 'Register Company | '.Yii::app()->params['pageTitle'];

?>

<p>
Please fill out the form with your particulars
</p>
 <?php /** @var BootActiveForm $form */
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                                                                                'id'=>'horizontalForm',
                                                                                'type'=>'horizontal',
                                                                                'enableClientValidation'=>true,
																				//'enableAjaxValidation' => true,
                                                                                'clientOptions'=>array(
																				'validateOnSubmit'=>true,
																				//'validateOnType' => true
																				),
                                                                                'htmlOptions' => array('enctype' => 'multipart/form-data'),
                                                                             
                                                                                )); ?>

	<p class="note"><span class="label">Fields with <span class="required">*</span> are required.</span></p>
	
	<?php echo $form->errorSummary($model); ?>
		<h4>StartUp Details</h4>	
		
		<?php echo $form->textFieldRow($model, 'cname', array('class' =>'span5')); ?>
		
		<?php echo $form->dropDownListRow($model, 'incorporated', array(
																'2013' => '2013',
																'2012' => '2012',
                                                                '2011' => '2011',
                                                                '2010' => '2010',
                                                                '2009' => '2009',
                                                                '2008' => '2008',
                                                                '2007' => '2007',
                                                                '2006' => '2006',
																'2005' => '2005',
																'2004' => '2004',), 
                                                                 array('options' => array('M' => array('selected' => true)))); ?>
																 
																 
		<?php echo $form->textFieldRow($model, 'website', array('class' =>'span5')); ?>
        <?php echo $form->textFieldRow($model, 'username', array('class' =>'span3')); ?>
        <?php echo $form->passwordFieldRow($model, 'password', array('class' =>'span3')); ?>
		<?php echo $form->passwordFieldRow($model, 'password2', array('class' =>'span3')); ?>
        
        <?php echo $form->fileFieldRow($model, 'image'); ?> 
		
		<h4>Contact Person Details</h4>		
        <?php echo $form->textFieldRow($model, 'name', array('class' => 'span3', 'rows' => 1)); ?>
		 <?php echo $form->textFieldRow($model, 'cemail', array('class' => 'span5', 'rows' => 1)); ?>
        <?php echo $form->textFieldRow($model, 'contact'); ?>
        <?php //echo $form->textAreaRow($model,'address', array('class'=>'span8', 'rows'=>3)); ?>
        <?php //echo $form->textAreaRow($model,'mission', array('class'=>'span8', 'rows'=>8)); ?>
        <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Submit')); ?>
        </div>    
<?php $this->endWidget(); ?>





