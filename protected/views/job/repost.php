<?php
//Yii::app()->cache->flush();

Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget'); 

$this->breadcrumbs = array(
    'Update Job',);
$this->pageTitle = 'Update Job | '.Yii::app()->params['pageTitle'];
?>

<div class ="span10">
<!--<div class="hint"><p>Please fill out the form with your particulars</p></div>-->
<h1>Repost Job</h1>
    <?php $this->widget('ImperaviRedactorWidget', array(
		// The textarea selector
		'selector' => '.redactor',
		// Some options, see http://imperavi.com/redactor/docs/
		'options' => array('shortcuts'=>true,'style'=>'height:240px'),
		));
		
		/** @var BootActiveForm $form */
          
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array('id'=>'re-post',
                                                                                'type'=>'horizontal',
                                                                                'enableClientValidation'=>true,
                                                                                'clientOptions'=>array('validateOnSubmit'=>true,),
                                                                                'focus'=>array($model,'title'),
                                                                                )); ?>

	<p class="note"><span class="label">Fields with <span class="required">*</span> are required.</span></p><br />

        <?php if (Yii::app()->user->isAdmin())
        {
            echo $form->textFieldRow($model,'meta_title', array('class'=>'span8', 'rows'=>15));
            echo $form->textFieldRow($model,'meta', array('class'=>'span8', 'rows'=>15));
            echo $form->textFieldRow($model,'url', array('class'=>'span8', 'rows'=>15));

        }
        ?>

        <?php echo $form->textFieldRow($model, 'title',array('class'=>'span12 jobtitle')); ?>

        <?php/* echo $form->dropDownListRow($model, 'type', array(''         =>'',
                                                                'Full-time' => 'Full-time',
                                                                'Part-time' => 'Part-time',
                                                                'Freelance' => 'Freelance',
                                                                'Internship'=> 'Internship',
                                                                'Temporary' => 'Temporary'), 
                                                                 array('options' => array('M' => array('selected' => true)))); */?>
	<div class="control-group ">
	<label class="control-label required " id="lbl" for="JobForm_Type">Type<span class="required">*</span></label>
	<div class="controls CheckBox">
    <?php
	
	echo $form->checkBoxRow($model, 'full_time', array('value' => 'Full-time', 'uncheckValue'=>'0'), array('checked'=>'checked'));	
	echo $form->checkBoxRow($model, 'part_time', array('value' => 'Part-time', 'uncheckValue'=>'0'), array('checked'=>'checked'));	
	echo $form->checkBoxRow($model, 'freelance', array('value' => 'Freelance', 'uncheckValue'=>'0'), array('checked'=>'checked'));	
	echo $form->checkBoxRow($model, 'internship', array('value' => 'Internship', 'uncheckValue'=>'0'), array('checked'=>'checked'));	
	echo $form->checkBoxRow($model, 'temporary', array('value' => 'Temporary', 'uncheckValue'=>'0'), array('checked'=>'checked'));	
	echo $form->checkBoxRow($model, 'co_founder', array('value' => 'Co-founder', 'uncheckValue'=>'0'), array('checked'=>'checked'));	
	echo $form->checkBoxRow($model, 'contract', array('value' => 'Contract', 'uncheckValue'=>'0'), array('checked'=>'checked'));
	
	?><span id='err_msg' style='clear:both;'></span>
	</div>
	</div>
	
        <?php echo $form->dropDownListRow($model, 'category', array(''         =>'',
                                                                 'Analytics' => 'Analytics',
                                                                 'Business Development' => 'Business Development',
                                                                 'Corporate Support' => 'Corporate Support',
                                                                 'Customer Service'=> 'Customer Service',
                                                                 'Design' => 'Design',
                                                                 'Marketing'=>'Marketing',
                                                                 'Public Relations'=>'Public Relations',
                                                                 'Technical' =>'Technical',
                                                                 'UI-UX'=>'UI-UX',
																 'Others'=>'Others',),                                                          
                                                                 array('options' => array('M' => array('selected' => true)))); ?>

    <?php echo $form->dropDownListRow($model, 'no_salary', array('1' => 'Show Salary',
                                                                '0' => 'Hide Salary',) , 
                                                                 array('options' => array('M' => array('selected' => true)))); ?>																 
 
	<div class="control-group ">
	<div class="controls salaryBox">

	<?php echo $form->textFieldRow($model, 'min_salary',array('class'=>'span11','onkeypress'=>'return numericOnly(event);','onblur'=>'this.value=this.value.replace(/^0+/, \'\')')); ?>
	<?php echo $form->textFieldRow($model, 'max_salary',array('class'=>'span11','onkeypress'=>'return numericOnly(event);','onblur'=>'this.value=this.value.replace(/^0+/, \'\')')); ?>
	<?php echo $form->dropDownListRow($model, 'currency', array( 'SGD' => 'SGD',
                                                                 'MYR' => 'MYR',
																 'THB' => 'THB',
																 'BDT' => 'BDT',
																 'CNY' => 'CNY',
																 'PHP' => 'PHP',
																 'HKD' => 'HKD',
																 'TWD' => 'TWD',
																 'JPY' => 'JPY',
                                                                 'INR'=> 'INR',
																 'IDR'=> 'IDR',
																 'VND' => 'VND'),
                                                                 array('options' => array('M' => array('selected' => true)))); ?>
	</div>
	<div id='sal_err_msg'></div>
	</div>
	<div id="no_salary_optionsx">
    <?php echo $form->dropDownListRow($model, 'no_salary_options', array('' => 'Select','NIL' => 'NIL','Equity' => 'Equity',
                                                                'Profit Sharing'=>'Profit Sharing',) , 
                                                                 array('options' => array('M' => array('selected' => true)))); ?>
	</div>

	<?php echo $form->dropDownListRow($model, 'location', array('Anywhere' => 'Anywhere',
                                                                'Singapore' => 'Singapore',
                                                                'Malaysia' => 'Malaysia',
                                                                'Thailand' => 'Thailand',
                                                                'Indonesia'=> 'Indonesia',
                                                                'China' => 'China',
                                                                'Hong-Kong' => 'Hong Kong',
                                                                'Taiwan' => 'Taiwan',
                                                                'Japan' => 'Japan',
                                                                'Korea' => 'Korea',
                                                                'Vietnam' => 'Vietnam',
                                                                'Philippines' => 'Philippines',
																'India' => 'India',
																'Nepal' => 'Nepal',)
                                                                 //array('options' => array('M' => array('selected' => true)))
                                                                 ); ?>
																 
          
        <?php echo $form->textAreaRow($model,'description', array('class'=>'span8 redactor', 'rows'=>10)); ?>
		<?php echo $form->textAreaRow($model,'responsibility', array('class'=>'span8 redactor', 'rows'=>10)); ?>
		<?php echo $form->textAreaRow($model,'requirement', array('class'=>'span8 redactor', 'rows'=>10)); ?>
		<div class="controls">		
				<p class="note"><span class="label">Job Applications will be sent to your registered email address.</span></p>
				<p class="note"><span class="label">You can add more email address to receive Job Applications.</span></p>
		</div>
        <?php echo $form->textFieldRow($model,'howtoapply', array('class'=>'span8', 'rows'=>2,'placeholder'=>'abc@mail.com,xyz@mail.com')); ?>
		<?php echo $form->textAreaRow($model,'tags', array('class'=>'span8', 'rows'=>2, 'placeholder'=>'add keywords and septate them by coma to help users search more effectively'));
            
         ?> 
		 	<?php echo $form->errorSummary($model); ?>
			<span id='errr_msg'></span>
			<span id='erra_msg'></span>
			<span id='sal_errr_msg'></span>
        <div class="form-actions">
		<button id="JobPreview" class="btn btn-info">Preview</button>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Submit')); ?>
         </div>
        <?php $this->endWidget(); ?>
</div>

<script>
$(document).ready(function(){

	$('#JobPreview').click(function(e){
      e.preventDefault();
      //alert($('#job_title').val());
	  JType = '';
	  JType = JType + '<ul>';
	  if($('#job_full_time').is(':checked')){ JType = JType + '<li>' + $('#job_full_time').val()  + '</li>'; }
	  if($('#job_contract').is(':checked')){ JType = JType + '<li>' + $('#job_contract').val()  + '</li>'; }
	  if($('#job_temporary').is(':checked')){ JType = JType + '<li>' + $('#job_temporary').val()  + '</li>'; }
	  if($('#job_part_time').is(':checked')){ JType = JType + '<li>' + $('#job_part_time').val()  + '</li>'; }
	  if($('#job_freelance').is(':checked')){ JType = JType + '<li>' + $('#job_freelance').val()  + '</li>'; }
	  if($('#job_internship').is(':checked')){ JType = JType + '<li>' + $('#job_internship').val()  + '</li>'; }
	  if($('#job_co_founder').is(':checked')){ JType = JType + '<li>' + $('#job_co_founder').val()  + '</li>'; }
	  JType = JType + '</ul>';

		$('#JobType').html(JType);
		$('#JobTitle').html($('#job_title').val());
		$('#JobLocation').html($('#job_location').val());
		$('#JobDescription').html($('#job_description').val());
		$('#JobFormResponsibility').html($('#job_responsibility').val());
		$('#JobFormRequirement').html($('#job_requirement').val());
		$('#JobFormMinSalary').html($('#job_min_salary').val());
		$('#JobFormMaxSalary').html($('#job_max_salary').val());
		$('#JobFormCurrency').html($('#job_currency').val());
	   
	  $('#previewjob').modal('show');
	  $("#previewjob").css({"width":"900px","left":"38%"});
	
	});
	
	
	
});
</script>
<?php

        $default_image = 'startup_default.jpg';
        $img_url = Yii::app()->getBaseUrl(true).'/images/company/400/'. $company->image; 
         $file_headers = @get_headers($img_url);
        if(($file_headers[0] == 'HTTP/1.1 404 Not Found') || ($file_headers[0] == 'HTTP/1.0 404 Not Found') || ($company->image == '')) {
            $img_url = Yii::app()->request->baseUrl.'/images/company/'. $default_image; 
            $image = '<img src="'.$img_url.'" style="width:200px;margin-left:5px;float:left;" >';
        }
        else {
			if($company->coverpicture != ''){
            $image = '<img src="'.$img_url.'" style="width:200px;margin-left:5px;float:left;margin-top:-120px;border:3px solid #F97C30;" >';
			}else{
			$image = '<img src="'.$img_url.'" style="width:200px;margin-left:5px;float:left;border:3px solid #F97C30;" >';
			}
        }

     ?>
<style type="text/css">
.abc
{
	<?php if($company->coverpicture != ''){  ?>
    height: 200px;
	background-image:url("<?php echo Yii::app()->request->baseUrl.'/images/cover/'.$company->coverpicture; ?>");	
	<?php }else{  ?>
	height: 0px;
	<?php } ?>
    background-color: transparent;
    background-position: center center;
    background-repeat: no-repeat;
    margin-top: 0;
	border-top:0px solid #323232;
}
</style>

<div id="previewjob" class="modal hide fade">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">&times;</a>
		<h4>Preview Job</h4>
	</div>
	<div class="modal-body" id="content" style="padding:10px 20px;">
	<div class ="abc"></div>
	<div class="clear"><?php  echo $image; ?></div>
	<div class="clear" style="padding:10px 0px;"></div>
		<div class="clear"><h1><span id="JobTitle"></span></h1></div>
		
		<div class="clear">
		<div class="type" style="float:left;margin-top:-10px;margin-bottom:-2px;"><span id="JobLocation"></span></div>
		<div class="clear type m_title">
			<span id="JobType"></span>
			<br /><br />
		</div>
		</div>
		<div class="clear">
			<p><span id="JobDescription"></span></p>
			<h3>Responsibilities</h3>
			<p><span id="JobFormResponsibility"></span></p>
			<h3>Requirements</h3>
			<p><span id="JobFormRequirement"></span></p>
			<h4> Salary </h4><span id="JobFormMinSalary"></span> - <span id="JobFormMaxSalary"></span> <span id="JobFormCurrency"></span></div>
			<br />
			<div class="clear">
			<p>
			<span class="label">Total applicants : 0 </span>	<span class="label label-info">Job expires in 180 days </span> <span class="label label-success">Total Views : 1 </span> <span class="label label-warning">Unique Views : 1 </span>
			</p>
			</div>
	</div>
	<div class="modal-footer"></div>
</div>