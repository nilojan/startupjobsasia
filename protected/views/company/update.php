<?php

Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget'); 

$this->breadcrumbs = array(
    'Company' => array('/Update'),
    'Update',);
$this->pageTitle = 'Update Company | '.Yii::app()->params['pageTitle'];
?>

<h1>Update Company Profile</h1>
<br>
 <div class ="span9">   
        <?php $this->widget('ImperaviRedactorWidget', array(
		// The textarea selector
		'selector' => '.redactor',
		// Some options, see http://imperavi.com/redactor/docs/
		'options' => array('class'=>'span8'),
		));
		

		/** @var BootActiveForm $form */
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                                                                                'id'=>'horizontalForm',
                                                                                'type'=>'horizontal',
                                                                                'enableClientValidation'=>true,
                                                                                'clientOptions'=>array('validateOnSubmit'=>true,),
                                                                                'htmlOptions' => array('enctype' => 'multipart/form-data'),
                                                                                )); ?>
               
                  
            <?php echo $form->errorSummary($CForm); ?>
            <?php echo $form->textFieldRow($CForm, 'cname', array('class' =>'span5')); ?>
            <?php echo $form->fileFieldRow($CForm, 'image'); ?> <div class="controls">(400px X 400px)</div>

<?php if($company->image != ''): ?> 
			<div class="control-group">
				<label ></label>
				<div class="controls">
					<img src="<?php echo Yii::app()->request->baseUrl.'/images/company/'.$company->image; ?>" style="float: left;width:100px;">
				</div>
			</div>
<?php endif; ?>

			
            <?php echo $form->textFieldRow($CForm, 'website', array('class' =>'span5','placeholder' =>'http://www.startup.com')); ?>
            <?php echo $form->textFieldRow($CForm, 'facebook', array('class' =>'span5','placeholder' =>'http://www.facebook.com/startup')); ?>
			<?php echo $form->textFieldRow($CForm, 'twitter', array('class' =>'span5','placeholder' =>'http://www.twitter.com/startup')); ?>
			<?php echo $form->textFieldRow($CForm, 'gplus', array('class' =>'span5','placeholder' =>'https://plus.google.com/+Startup')); ?>
			<?php echo $form->textFieldRow($CForm, 'linkedin', array('class' =>'span5','placeholder' =>'http://www.linkedin.com/company/startup')); ?>
            <?php //echo $form->textFieldRow($CForm, 'contact'); ?>
            
            <?php echo $form->textAreaRow($CForm, 'address', array('class' => 'span8', 'rows' => 3)); ?>
			<?php echo $form->textAreaRow($CForm, 'summary', array('class' => 'span8 redactor', 'rows' => 3)); ?>
            <?php echo $form->textAreaRow($CForm, 'mission', array('class' => 'span8 redactor', 'rows' => 5)); ?>
            <?php echo $form->textAreaRow($CForm, 'culture', array('class' => 'span8 redactor', 'rows' => 5)); ?>
            <?php echo $form->textAreaRow($CForm, 'benefits', array('class' => 'span8 redactor', 'rows' => 5)); ?>
            <?php echo $form->textAreaRow($CForm, 'awards', array('class' => 'span8 redactor', 'rows' => 3)); ?>

            <?php //echo $form->radioButtonListInlineRow($CForm, 'privacy',array('1' => 'On', '0'=>'Off')); ?>
            
            <div class="form-actions">
                <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Submit')); ?>
            </div>
            
    <?php $this->endWidget();    ?>
 </div>   

<script type="text/javascript">
$(function() {
  $("#UpdateForm_cname").focus();
});
</script> 