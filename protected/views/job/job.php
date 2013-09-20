<?php

$this->pageTitle = "Startup Hire: {$job->title} {$company->cname} {$job->location}";
$this->pageDesc = substr($job->description,0,180);
$this->pageOgTitle = "{$job->title} {$company->cname} {$job->location}";
$this->pageOgDesc= substr($job->description,0,400);
$this->pageOgImage='/images/company/180/'.$company->image;

?>

<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "b824f821-ae9e-43bc-a63f-7f65b2405fe7", doNotHash: false, doNotCopy: false, hashAddressBar: true});</script>
<script type="text/javascript">
$(document).ready(function(){
	$('#applyjob').hide();
	$('#user_apply').click(function(){
		$('#applyjob').fadeToggle();
	});

});
</script>
<style type="text/css">
.abc
{
	<?php if(isset($company->coverpicture)){  ?>
    height: 250px;
	background-image:url("<?php echo Yii::app()->request->baseUrl.'/images/cover/'.$company->coverpicture; ?>");	
	<?php }else{  ?>
	height: 50px;
	<?php } ?>
    background-color: transparent;
    background-position: center center;
    background-repeat: no-repeat;
    margin-top: 0;
	border-top:2px solid #F97C30;
}
</style>

<?php
// to count total,unique visits
Yii::app()->user->CountVisitors($job->JID);

$this->breadcrumbs = array(
    $job->title,
);

?>

<div class ="abc"></div>

<div class="row-fluid">

	<div class="span6" style="text-align:right;margin-top:-40px;">
	<div class="span5" style="float:right;background:#F97C30;color:#fff;padding:10px;margin-left:15px;">
	
		 <?php $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                   'order'=>'t.created DESC',
                                                                   // show all jobs that are not expired
                                                                   //'condition'=>'expire >=today',
                                                                   //'params'=>array('today'=>date('Y-m-d H:i:s')),
                                                                    'with'=>array('company'),
																	'condition'=>'company.CID=:CID',
                                                                    'params'=>array(':CID'=>$company->CID),    
                                                                    ),
                                                                    'pagination'=>array(
                                                                                        'pageSize'=>15,),
                                                )); ?>
												
	 <div style="font-size: 190px;line-height: 147px;text-align: center;"><?php echo $dataProvider->totalItemCount ?></div>
	 <div style="text-align:center;">OPPORTUNITIES</div>
	 </div>
	 
	<div class="span6" style="float:right;border:3px solid #F97C30;background:#fff;">
	
	<?php $url = str_replace(' ','-',$company->cname);?> 
	 <?php $image='<img src='.Yii::app()->request->baseUrl.'/images/company/'. $company->image.' style="width:92%;padding:4%;" >'; 
	  echo CHtml::link($image, array('company/view', 'CID'=>$company->CID, 'title'=>$url)); ?>

	 </div>
	 <div class="span11" id="clear" style="text-align:right;border:3px solid #F97C30;float:right;margin-top:15px;">
	 <div style="text-align:left;background:#F97C30;color:#fff;padding:10px;"><h1 style="margin:0px;"></h1></div>
	 
	   <?php $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                   'order'=>'t.created DESC',
                                                                   // show all jobs that are not expired
                                                                   //'condition'=>'expire >=today',
                                                                   //'params'=>array('today'=>date('Y-m-d H:i:s')),
                                                                    'with'=>array('company'),
																	'condition'=>'company.CID=:CID',
                                                                    'params'=>array(':CID'=>$company->CID),    
                                                                    ),
                                                                    'pagination'=>array(
                                                                                        'pageSize'=>15,),
                                                )); ?>
												
		<?php       $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$dataProvider,
            //'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_jobView',   // refers to the partial view named '_post'
            //'ajaxUpdate'=>false,
            //'htmlOptions' => array("class"=>"table table-striped"),   
            //'sortableAttributes'=>array(
              //'job.title'=>'Title',
            
           // 'created'=>'Created',
   // ),
));
 ?>

	</div>
	</div> <!-- End of Span6 -->
	
	 <div class="span6">
	 		<p style="text-align:justify;font-family: 'FrutigerLT';"><?php echo str_replace('</br>',"",$company->address); ?></p>
			<?php if($company->privacy == 0) { ?>
			<p style="text-align:justify;font-family: 'FrutigerLT';">tel : <a href="tel:<?php echo CHtml::encode($company->contact) ?>"><?php echo CHtml::encode($company->contact) ?></a></p>
		
			<p style="text-align:justify;font-family: 'FrutigerLT';">email : <a href="mailto:<?php echo CHtml::encode($company->cemail) ?>"><?php echo CHtml::encode($company->cemail) ?></a></p>
			<?php } ?>

              <?php $url = str_replace(' ','-',$company->cname);?> 
              <h1><?php echo CHtml::encode($job->title); ?></h1>      

               <?php //echo CHtml::link($image, array('company/view', 'CID'=>$company->CID,'title'=>$url)); ?>

 
                     <div class="Border" style="float:left;width:85%;margin-top:20px;">
				<div class="bottomLine <?php echo $job->type; ?>"></div>
	           </div>
			   
 		<div id="JobType" class="type" style="float:left;">
		         <div class ="<?php echo $job->type; ?>">
		                    <?php echo $job->type; ?>
		         </div>
		</div> 
		Also this job available as 
		<?php 
			if ($job->full_time != ''){
				echo $job->full_time;}
			
			if ($job->part_time != ''){
				echo $job->part_time;}
		
			if ($job->freelance != ''){
				echo $job->freelance;}
				
			if ($job->internship != ''){
				echo $job->internship;}
		
			if ($job->temporary != ''){
				echo $job->temporary;}
			?>
		
		<br />
		
      <div class="span11">    

				<?php echo nl2br($job->description) ?>
				
				<?php if($job->responsibility != '') { ?>
				<h3>Responsibility </h3>
                <?php echo nl2br($job->responsibility) ?>
				<?php } ?>
				<?php if($job->requirement != '') { ?>
				<h3>Requirement </h3>
                <?php echo nl2br($job->requirement) ?>
				<?php } ?>
				<?php if($job->howtoapply != '') { ?>
				<h3> How to apply </h3>
                <?php echo nl2br($job->howtoapply) ?>
                <?php } ?>
				<!--
				<h3> Type </h3>
				<?php echo CHtml::encode($job->type) ?>-->
				
				<?php if($job->salary != '') { ?>
				<h3> Salary </h3>
				<?php echo CHtml::encode($job->salary) ?>
				 <?php } ?>
				<?php if($job->location != '') { ?>
				<h3> location </h3>
				<?php echo CHtml::encode($job->location)?>
				 <?php } ?>
				
				<div class="clear" style="padding:20px 0px;">
				<span style="font-size: 24px;font-weight: bold;">SHARE THIS </span>
				<span class='st_facebook_hcount' displayText='Facebook'></span>
				<span class='st_twitter_hcount' displayText='Tweet'></span>
				<span class='st_linkedin_hcount' displayText='LinkedIn'></span>
				</div>
     </div>
	<div class="clear"> 
		<p>Total applicants : <?php echo $total_applicants; ?></p>
		<p>Job expires in <?php echo $days_left; ?> days.</p>
		<p>Total Views : <?php echo $job->views; ?></p>
		<p>Unique Views : <?php echo $job->unique_views; ?></p>
	</div>
	<div class="clear">   
		<div id="job">
		  <?php 		

		  if(Yii::app()->user->isMember())
		  {

			  $this->widget('bootstrap.widgets.TbButton', array(
													'label'=>'Apply Online',
													'htmlOptions'   => array('id'=> 'user_apply'),
													'type'=>'primary', 
													'size'=>'large', 
													//'url'=>Yii::app()->createUrl("user/applyJob", array("JID"=>$job->JID )),    
			)); 
		  }
		  if(Yii::app()->user->isGuest)
		  {
		  	
			  $this->widget('bootstrap.widgets.TbButton', array(
													'label'=>'Apply Online',
													'htmlOptions'   => array('id'=> 'user_apply'),
													'type'=>'primary', 
													'size'=>'large', 
													//'url'=>Yii::app()->createUrl("user/apply_Job", array("JID"=>$job->JID )),    
			)); 
		  }
		  ?>  

		</div>
	</div>	

<div id="applyjob">
	<br> 
	<?php if(Yii::app()->user->isGuest){
	 $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                                                                                'id'=>'horizontalForm',
                                                                                //'type'=>'horizontal',
                                                                                'enableClientValidation'=>true,
                                                                                'enableAjaxValidation'=>true,
                                                                                'clientOptions'=>array('validateOnSubmit'=>false,),
                                                                                'htmlOptions' => array('enctype' => 'multipart/form-data'),
                                                                                )); ?>
    <!-- <p class="help-block">Fields with <span class="required">*</span> are required.</p> -->
    <?php echo $form->errorSummary($model); ?> 
       
    <?php echo $form->textFieldRow($model,'fname',array('class'=>'span5', 'rows'=>10)); ?>
    <?php echo $form->textFieldRow($model,'lname',array('class'=>'span5', 'rows'=>10)); ?>
    <?php echo $form->textFieldRow($model,'email',array('class'=>'span5', 'rows'=>10)); ?>

	
	<?php echo $form->dropDownListRow($myDate,'country_code', $myDate->getCountryCodes(), array('select'=>$myDate->country_code,'class'=>'span3')); ?>
	<?php echo $form->textField($model,'contact',array('class'=>'span3','maxlength'=>10)); ?><span id="errmsg"></span>
	
		<br><?php echo CHtml::encode($model->getAttributeLabel('dob')); ?><br>
	
	    <?php echo $form->dropDownList($myDate,'day', $myDate->getDates(), array('select'=>$myDate->day,'class'=>'span2')); ?>
   
        <?php echo $form->dropDownList($myDate,'month', $myDate->getMonths(), array('select'=>$myDate->month,'class'=>'span3')); ?>
   
        <?php echo $form->dropDownList($myDate,'year', $myDate->getYears(), array('select'=>$myDate->year,'class'=>'span2')); ?>
	
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
															

	
    <?php echo $form->textAreaRow($model,'coverLetter', array('class'=>'span8', 'rows'=>5)); ?>
    <?php echo $form->fileFieldRow($model,'resume'); ?>


<div id="job" class="apply-instructions">
    <h3>Are you sure you want to submit this? </h3>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Submit')); ?>

</div>
            
<?php $this->endWidget(); } 
if(Yii::app()->user->isMember()) {
	if($user->resume != null)
          echo 'You have uploaded ';   
          echo   CHtml::link(CHtml::encode($user->resume),Yii::app()->baseUrl . '/resume/'.$user->resume, array('target'=>'_blank')); ?>
 
          
		<br>
		Or upload another

		<?php  $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		                                                                                'id'=>'horizontalForm',
		                                                                                //'type'=>'horizontal',
		                                                                                'enableClientValidation'=>false,
		                                                                                'enableAjaxValidation'=>true,
		                                                                                'clientOptions'=>array('validateOnSubmit'=>false,),
		                                                                                'htmlOptions' => array('enctype' => 'multipart/form-data'),
		                                                                                )); ?>
		    <?php echo $form->errorSummary($model); ?> 
		    <?php echo $form->fileFieldRow($model, 'resume'); ?>
		    <?php echo $form->textAreaRow($model,'coverLetter', array('class'=>'span9', 'rows'=>10)); ?>
		        

		<div id="job" class="apply-instructions">
		    <h3>Are you sure you want to submit this? </h3>
		    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Submit')); ?>

		</div>
		            
		<?php $this->endWidget(); 
}
?>
</div>
</div>
</div>