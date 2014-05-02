<?php

$this->pageTitle = "{$job->title} job at {$company->cname} {$job->location} | Startup Jobs Asia";
$this->pageDesc = strip_tags(trim(substr($job->description,0,290)));
$this->pageOgTitle = "{$job->title} job at {$company->cname} {$job->location} | Startup Jobs Asia";
$this->pageOgDesc= strip_tags(trim(substr($job->description,0,400)));
$this->pageOgImage='https://farm4.staticflickr.com/3763/13373992133_9c0bc5e376_o_d.jpg';
//$this->addMetaProperty('fb:app_id',Yii::app()->params['fbAppId']);
$this->pageCanonical = "http://".$_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; // canonical URLs should always be absolute
$this->pagePublishedTime = $job->created;
$this->pageModifiedTime = $job->modified;
$this->pageSiteName = "Start up Jobs Asia";
$this->pageAuthor = $company->cname;
?>
<script type="text/javascript">
$(document).ready(function(){

	$('#applyjob').hide();
	$('#user_apply').click(function(){
		$('#applyjob').fadeToggle();
	});

});
	<?php if($company->coverpicture != ''):  ?>
	$(window).load(function() {
		$("html, body").animate({ scrollTop: 350 }, 500);
	});
	<?php endif; ?>
</script>

<style type="text/css">
.abc
{
	<?php if($company->coverpicture != ''){  ?>
    height: 250px;
	background-image:url("<?php echo Yii::app()->request->baseUrl.'/images/cover/'.$company->coverpicture; ?>");	
	<?php }else{  ?>
	height: 50px;
	<?php } ?>
    background-color: transparent;
    background-position: center center;
    background-repeat: no-repeat;
    margin-top: 0;
	border-top:2px solid #323232;
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
	<?php if($company->coverpicture != ''){  ?>
	<div class="span8" style="text-align:left;margin-top:-99px;">	
	<?php }else{  ?>
	<div class="span8" style="text-align:left;margin-top:0px;">
	<?php } ?>
	
	<div class="span5" style="display:none;float:right;background:#F97C30;color:#fff;padding:10px;margin-left:5px;">
	
		 <?php $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                   'order'=>'t.created DESC',
                                                                   // show all jobs that are not expired
                                                                   //'condition'=>'expire >=today',
                                                                   //'params'=>array('today'=>date('Y-m-d H:i:s')),
                                                                    'with'=>array('company'),
																	//'condition'=>array('t.status = 1','company.CID=:CID'),
																	'condition'=>'expire >= :today AND company.CID=:CID AND t.status=1',
                                                                    'params'=>array('today'=>date('Y-m-d H:i:s'),':CID'=>$company->CID),    
                                                                    ),
                                                                    'pagination'=>array('pageSize'=>15,),
                                                )); ?>
											
	 <div style="font-size: 190px;line-height: 147px;text-align: center;"><?php echo $dataProvider->totalItemCount ?></div>
	 <div style="text-align:center;">OPPORTUNITIES</div>
	 </div>
	 
	<div class="span4 StartupLogo">
	
	  
<?php
		$url = str_replace(' ','-',$company->cname.'-'.$company->location);
        $default_image = 'startup_default.jpg';
        $img_url = Yii::app()->getBaseUrl(true).'/images/company/400/'. $company->image; 
         $file_headers = @get_headers($img_url);
        if(($file_headers[0] == 'HTTP/1.1 404 Not Found') || ($file_headers[0] == 'HTTP/1.0 404 Not Found') || ($company->image == '')) {
            $img_url = Yii::app()->request->baseUrl.'/images/company/'. $default_image; 
            $image = '<img src="'.$img_url.'" class="JobLogo" alt="Startup Jobs Asia">';
        }
        else {
            $image = '<img src="'.$img_url.'" class="JobLogo" alt="'.$company->cname.' on Startup Jobs Asia">';
        }
		echo CHtml::link($image, array('company/view/CID/'.$company->CID, 'Start-up'=>$url));
     ?>
				
				
	 </div>
	 	  		<div class="clear" style="padding:10px 0px;">

				</div>

	
	
	
		 	
			<?php /*if($company->privacy == 0) { ?>
			<p style="text-align:justify;font-family: 'FrutigerLT';"><?php echo str_replace('</br>',"",$company->address); ?></p>
			<div style="display:none;">
			<p style="text-align:justify;font-family: 'FrutigerLT';">tel : <a href="tel:<?php echo CHtml::encode($company->contact) ?>"><?php echo CHtml::encode($company->contact) ?></a></p>
		
			<p style="text-align:justify;font-family: 'FrutigerLT';">email : <a href="mailto:<?php echo CHtml::encode($company->cemail) ?>"><?php echo CHtml::encode($company->cemail) ?></a></p>
			</div>
			<?php } */?>

              <?php $url = str_replace(' ','-',$company->cname);?> 
              <h1 class="HomeLatestJobs"><?php echo CHtml::encode($job->title); ?></h1>      

               <?php //echo CHtml::link($image, array('company/view', 'CID'=>$company->CID,'title'=>$url)); ?>

				<div class="clear">
				
								<?php if($job->location != '') { ?>
				<div class="type" style="float:left;margin-top:-10px;margin-bottom:-2px;"><?php echo CHtml::encode($job->location)?></div>
				 <?php } ?>
				 
	   
 		<div class="clear type m_title">
				<ul>
			<?php
				
				if ($job->full_time != '' && $job->full_time != '0'){
					echo "<li class ='Full-time'>".$job->full_time."</li>";
				}
			
				if ($job->part_time != '' && $job->part_time != '0'){
					echo "<li class ='Part-time'>".$job->part_time."</li>";
				}
			
				if ($job->freelance != '' && $job->freelance != '0'){
					echo "<li class ='Freelance'>".$job->freelance."</li>";
					}
					
				if ($job->internship != '' && $job->internship != '0'){
					echo "<li class ='Internship'>".$job->internship."</li>";
					}
			
				if ($job->temporary != '' && $job->temporary != '0'){
					echo "<li class ='Temporary'>".$job->temporary."</li>";
					}
					
				if ($job->co_founder != '' && $job->co_founder != '0'){
					echo "<li class ='Co-founder'>".$job->co_founder."</li>";
					}
				if ($job->contract != '' && $job->contract != '0'){
					echo "<li class ='Contract'>".$job->contract."</li>";
					}					
				
			?>
			</ul>
<br /><br />
			
		</div> 
		</div><!-- clear -->

		
      <div class="clear" style="display:block;overflow:hidden;">    

				<?php echo $job->description; ?>
				
				<?php if($job->responsibility != '') { ?>
				<h3 class="HomeLatestJobs">Responsibilities</h3>
                <?php echo $job->responsibility; ?>
				<?php } ?>
				
				
				
				<?php if($job->requirement != '') { ?>
				<h3 class="HomeLatestJobs">Requirements</h3>
                <?php echo $job->requirement; ?>
				<?php } ?>
				
				
				
				<?php if($job->min_salary != '' && $job->max_salary != '' && $job->no_salary == 1){ ?>
				<h4 class="HomeLatestJobs"> Salary </h4>
				<?php echo CHtml::encode($job->min_salary)." - ". CHtml::encode($job->max_salary)." ".CHtml::encode($job->currency) ?>
				 <?php } ?>
				 
				<?php if($job->min_salary == '' && $job->max_salary == '' && $job->no_salary == 0 && $job->no_salary_options !='' && $job->no_salary_options !='NIL'){ ?>
				<h5 class="HomeLatestJobs"> Components instead of salary </h5>
				<?php echo CHtml::encode($job->no_salary_options); ?>
				 <?php } ?>

     </div>
	 <br />


	<div class="clear"> 
		<p>
			 <?php
			if($total_applicants>0){
				echo "<span class='label'>Total applicants :".$total_applicants."</span>";
			}
			?>
			<span class="label label-info">Job expires in <?php echo $days_left; ?> days.</span>
			<span class="label label-success">Total Views : <?php echo $job->views; ?></span>
			<span class="label label-warning">Unique Views : <?php echo $job->unique_views; ?></span>
			<?php
			if($total_views_today>0){
				echo "<span class='label label-inverse'>Today Views : ".$total_views_today."</span>";
			}
			?>
		</p>
	</div>
	<br />
	<div class="clear">  
<?php if(Yii::app()->user->hasFlash('applyjob')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('applyjob'); ?>
</div>

<?php elseif(Yii::app()->user->hasFlash('error')): ?>

<div class="flash-error">
	<?php echo Yii::app()->user->getFlash('error'); ?>
</div>

<?php endif; ?>
<?php if((Yii::app()->user->isMember()) || (Yii::app()->user->isGuest)): ?>
		<div id="job">
		  <?php
/*
			  $this->widget('bootstrap.widgets.TbButton', array(
													'label'=>'Apply Now',
													'htmlOptions'   => array('id'=> 'user_apply'),
													'type'=>'primary', 
													'size'=>'large', 
													//'url'=>Yii::app()->createUrl("user/apply_Job", array("JID"=>$job->JID )),    
			)); 
*/
		  ?>

		</div>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'label'=>'Apply Now',
			'type'=>'primary',
			'htmlOptions'=>array(
				'data-toggle'=>'modal',
				'data-target'=>'#applyjob',
			),
		)); ?>


<?php endif; ?>	

	</div>	
<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'applyjob')); ?>

	<div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h3>Apply</h3>
    </div>
	
	<div id="rootwizard" style="padding:10px 40px 0;">
	
	<?php if(Yii::app()->user->isGuest){
	 $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array('id'=>'job-form',
                                                                       'type'=>'horizontal',
                                                                        'enableClientValidation'=>true,
                                                                        'enableAjaxValidation'=>true,
                                                                        'clientOptions'=>array(
																			'validateOnSubmit'=>true,
																			'validateOnChange' => true,
																			'validateOnType'=>true,
																			//'validationDelay'=>2000,
																			'afterValidate' => 'js: function(form, data, hasError) {
																			   if (hasError) {    
																					
												//$(".pager").addClass("hide");
												//$("#job-form").addClass("hide");
												//$("#job-form").replaceWith("#login-form");
												//$("form#login-form").clone().appendTo("form#job-form");
												//$("#job-form").html($("#login-form").html());
			return false;
								
																				}else{
																					 $(".pager").removeClass("show"); 
																					 return true;
																				}
																				console.log(data);
																				
																			}',
																			/*
																			'afterValidate'=>'js:function(form, data, hasError) {
																				if(hasError) {
																				for(var i in data) $("#"+i).addClass("error_input");
																				
																					return false;
																					}
																					else {
																					form.children().removeClass("error_input");
																					return true;
																					}
																				}',
																			*/	
																			'afterValidateAttribute' => 'js:function(form, attribute, data, hasError){					if(hasError){	

																			$(".pager").addClass("hide");
																			//$("#job-form").addClass("hide");
																			
												if(rr){
															$(".modal-header h3").replaceWith("<h3>Login to Quick Apply</h3>");
															$(".pager").addClass("hide");												$("#UEmail").val($("#Employee_email").val());
															setTimeout(
  function() 
  {
    $("#job-form").html($("#login-form").html());
	
  }, 500);
													}	
return false;																			}else{													$(".pager").removeClass("hide");					$(".pager").addClass("show");									console.log();	
												return true;					}														
																			}',	
																			
																			),
                                                                        'htmlOptions' => array('enctype' => 'multipart/form-data'),
                                                                        )); ?>
	<ul class="topNavigate">
	  	<li class="active"><a href="#tab1" data-toggle="tab"> Email </a></li>
		<li class="next"><a href="#tab2" data-toggle="tab"> Applicant info </a></li>
		<li class="next"><a href="#tab3" data-toggle="tab"> Contact Details </a></li>
		<li class="next"><a href="#tab4" data-toggle="tab"> Resume </a></li>
	</ul>
	
 	<div class="tab-content">
	<div class="tab-pane active" id="tab1">
	 <?php echo $form->textFieldRow($model,'email',array('class'=>'span7 MEmail','onkeypress'=>'return focusnext(event)','placeholder'=>'Email Address')); ?>
	 
	</div><!-- tab1 -->
	
		<div class="tab-pane" id="tab2">

	 
    <?php echo $form->textFieldRow($model,'fname',array('class'=>'span7','onkeypress'=>'return textonly(event);','placeholder'=>'First Name')); ?>
    <?php echo $form->textFieldRow($model,'lname',array('class'=>'span7','onkeypress'=>'return textonly(event);','placeholder'=>'Last Name')); ?>
			
<div class="control-group ">
<label class="control-label required" for="Employee_dob">Date of Birth<span class="required">*</span></label>
<div class="controls">
	    <?php echo $form->dropDownList($myDate,'day', $myDate->getDates(), array('select'=>$myDate->day,'class'=>'span3')); ?>
   
        <?php echo $form->dropDownList($myDate,'month', $myDate->getMonths(), array('select'=>$myDate->month,'class'=>'span5')); ?>
   
        <?php echo $form->dropDownList($myDate,'year', $myDate->getYears(), array('select'=>$myDate->year,'class'=>'span4')); ?>
</div>
</div>
	
		<?php echo $form->radioButtonListRow($model, 'gender', array('Male'=>'Male','Female'=>'Female')); ?>
		
		
	</div><!-- tab2 -->
	
	
	    <div class="tab-pane" id="tab3">	
		
		
		
   

<div class="control-group ">
<label class="control-label required" for="Employee_contact">Contact <span class="required">*</span></label>
<div class="controls">
<?php echo $form->dropDownList($myDate,'country_code', $myDate->getCountryCodes(), array('select'=>$myDate->country_code,'class'=>'span6')); ?>
	<?php echo $form->textField($model,'contact',array('class'=>'span5','onkeypress'=>'return numericOnly(event);','maxlength'=>15)); ?><span id="errmsg"></span>
</div>
</div>
	
    <?php /* echo $form->dropDownListRow($model,'location',$myDate->getCountry(), array('select'=>$model->location, 'prompt'=>'Select'), array('class'=>'span5','maxlength'=>255)); */ ?>

	<?php echo $form->dropDownListRow($model, 'edu', array(''=>'Education', 
															'Doctorate'=>'Doctorate (PHD)',
															'Master'=>'Master Degree',
															'Bachelor'=>'Bachelor Degree',
															'Diploma'=>'High School / Diploma',
															'Cert'=>'Professional Certification',
															'Others'=>'Others')); ?>
															
		<?php echo $form->dropDownListRow($model,'country',$myDate->getCountryList(), array('select'=>$model->country, 'prompt'=>'Select')); ?>
		
	</div><!-- tab3 -->
	    <div class="tab-pane" id="tab4">	
    <?php echo $form->textAreaRow($model,'coverLetter', array('class'=>'span11', 'placeholder'=>'Write about yourself','rows'=>3)); ?>
    <?php echo $form->fileFieldRow($model,'resume'); ?>

	<?php echo $form->checkboxRow($model, 'agree'); ?>

	<?php echo $form->errorSummary($model); ?> 



<div id="jobapply">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Submit')); ?>
</div>
</div><!-- tab4 -->
		
            
<?php  $this->endWidget(); ?>
 
 <ul class="pager wizard">
			<li class="previous first" style="display:none;"><a href="#">First</a></li>
			<li class="previous"><a href="#">Previous</a></li>
			<li class="next last" style="display:none;"><a href="#">Last</a></li>
		  	<li class="next"><a href="#" class="btn-next">Next</a></li>
		</ul>
<?php		
 }
if(Yii::app()->user->isMember()) {
	if($Employee->resume != null){
          echo 'You have uploaded resume ';   
          echo   CHtml::link(CHtml::encode($Employee->resume),Yii::app()->baseUrl . '/resume/'.$Employee->resume, array('target'=>'_blank')); ?>
     - Or upload another
<?php } ?> 
		<?php  $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		                                                                        'id'=>'ApplyJob-Form',
		                                                                        'type'=>'horizontal',
																				'enableClientValidation'=>true,
																				'enableAjaxValidation'=>true,
		                                                                        'clientOptions'=>array('validateOnSubmit'=>true,),
		                                                                        'htmlOptions' => array('enctype' => 'multipart/form-data'),
		                                                                                )); ?>
		    
		    <?php echo $form->fileFieldRow($model, 'resume'); ?>
		    <?php echo $form->textAreaRow($model,'coverLetter', array('class'=>'span11', 'placeholder'=>'Write about yourself', 'rows'=>5)); ?>
			
			<?php echo $form->errorSummary($model); ?> 
<div id="jobapply">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary','label'=>'Submit')); ?>
</div>


		
		<?php $this->endWidget(); 
}
?>
</div><!-- tab-content end -->


<div id="LoginonJobb"></div>

<?php if(Yii::app()->user->isGuest): ?>
<!-- this line is hack -->

</div><!-- rootwizard end -->



<?php endif; ?>
	<div class="modal-footer"></div>

<?php $this->endWidget(); ?>
<!-- applyjob end -->




</div> <!-- End of Span6 -->




	
	<div class="span4" style="text-align: left; padding: 0px;">

	<div class="span12 SocialLeft clear" style="padding:5px 0">	
		<span class='st_fblike_large' displayText='Facebook Like'></span>
		<span class='st_facebook_large' displayText='Facebook'></span>
		<span class='st_googleplus_large' displayText='Google +'></span>
		<span class='st_twitter_large' displayText='Tweet'></span>
		<span class='st_linkedin_large' displayText='LinkedIn'></span>
		<span class='st_email_large' displayText='Email'></span>
		<span class='st_sharethis_large' displayText='ShareThis'></span>
	</div>

	
	<div class="span12 clear" style="text-align:left;border:3px solid #F97C30;;margin-top:5px;margin-left:0px;">
	<div style="text-align:left;background:#F97C30;color:#fff;padding:10px;"><?php echo $dataProvider->totalItemCount ?> OPPORTUNITIES with <?php echo $company->cname; ?></div>
	<div style="margin-left:15px;">

												
		<?php $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$dataProvider,
            //'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_jobViewSidebar',   // refers to the partial view named '_post'
            //'ajaxUpdate'=>false,
            //'htmlOptions' => array("class"=>"table table-striped"),   
            //'sortableAttributes'=>array(
              //'job.title'=>'Title',
            
           // 'created'=>'Created',
   // ),
));

// dataProvider on line 64
 ?>

	</div>
	</div>
	
	<?php if($job->tags!=''): ?>
	
	<div class="span12 clear" style="text-align:left;border:3px solid #F97C30;;margin-top:5px;margin-left:0px;">
	<div style="text-align:left;background:#F97C30;color:#fff;padding:10px;">RELATED JOBS</div>
	<div style="margin-left:15px;">

		 <?php 
		 /*$dataProviderTags=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                   'order'=>'t.created DESC',
																	'condition'=>'expire >= :today AND tags LIKE "'%$job->tags%'" AND t.status=1',
                                                                    'params'=>array('today'=>date('Y-m-d H:i:s')),
                                                                    ),
                                                                    'pagination'=>array('pageSize'=>15,),
													)); 
		*/										
		$dataProviderTags=new CActiveDataProvider('job', array('criteria'=>array(
		'limit'=>5,
        'condition'=>'JID in(SELECT JID FROM job WHERE MATCH (category) AGAINST ("'.$job->category.'" IN BOOLEAN MODE) AND t.status=1 AND expire >= :today AND NOT (JID="'.$job->JID.'"))',
		'params'=>array('today'=>date('Y-m-d H:i:s')),
		),
		'sort'=>array('defaultOrder'=>'t.created DESC',
		),
		//'pagination'=>array('pageSize'=>6,),
		'pagination' => false,
        ));
		
		?>

		<?php $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$dataProviderTags,
            'itemView'=>'_jobViewSidebar',   // refers to the partial view named '_post'
			));

			?>

	</div>
	</div>
	
	<?php endif; ?>
	
</div>
</div>
<?php if(Yii::app()->user->isGuest): ?>
<div class="hide">
<div id="LoginonJob">
<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'login-form',
    'type'=>'horizontal',
    'enableClientValidation'=>true,
    'clientOptions'=>array('validateOnSubmit'=>true),
    
)); ?>
 
<?php echo $form->textFieldRow($modelLogin, 'email', array('id'=>'UEmail','placeholder'=>"Email")); ?>
<?php echo $form->passwordFieldRow($modelLogin, 'password', array('placeholder'=>"Password",)); ?>
<?php echo $form->checkboxRow($modelLogin, 'rememberMe'); ?>
 
<div>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Login')); ?>
     <?php $this->widget('bootstrap.widgets.TbButton', array(
                                        'label'=>'Forget Password',
                                        'type'=>'info', 
                                        'size'=>'', 
                                        'url'=>Yii::app()->createUrl("user/forgetPassword"),    
)); ?>
</div>
<?php $this->endWidget(); ?>
</div>
</div>

<?php endif; ?>