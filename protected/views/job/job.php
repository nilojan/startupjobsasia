<?php

$this->pageTitle = "Startup Hire: {$job->title} {$company->cname} {$job->location}";
$this->pageDesc = substr($job->description,0,180);
$this->pageOgTitle = "{$job->title} {$company->cname} {$job->location}";
$this->pageOgDesc= substr($job->description,0,400);
$this->pageOgImage='/images/company/'.$company->image;

$this->breadcrumbs = array(
    $job->title,
);

?>

<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "b824f821-ae9e-43bc-a63f-7f65b2405fe7", doNotHash: false, doNotCopy: false, hashAddressBar: true});</script>

<style type="text/css">
.abc
{
	<?php if(isset($company->coverpicture)){  ?>
    height: 250px;
	background-image:url("<?php echo Yii::app()->request->baseUrl.'/images/cover/'.$company->coverpicture; ?>");	
	<?php }else{  ?>
	height: 0px;
	<?php } ?>
    background-color: transparent;
    background-position: center center;
    background-repeat: no-repeat;
    margin-top: 0;
	border-top:2px solid #F97C30;
}
</style>

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
			
			<p style="text-align:justify;font-family: 'FrutigerLT';">tel : <a href="tel:<?php echo CHtml::encode($company->contact) ?>"><?php echo CHtml::encode($company->contact) ?></a></p>
			
			<p style="text-align:justify;font-family: 'FrutigerLT';">email : <a href="mailto:<?php echo CHtml::encode($company->cemail) ?>"><?php echo CHtml::encode($company->cemail) ?></a></p>
			

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
		
      <div class="span11">    

				<?php echo nl2br($job->description) ?>
				
				
				<h3>Responsibility </h3>
                <?php echo nl2br($job->responsibility) ?>
				
				<h3>Requirement </h3>
                <?php echo nl2br($job->requirement) ?>
				
				<h3> How to apply </h3>
                <?php echo nl2br($job->howtoapply) ?>
				<!--
				<h3> Type </h3>
				<?php echo CHtml::encode($job->type) ?>-->
				
				<h3> Salary </h3>
				<?php echo CHtml::encode($job->salary) ?>
				
				<h3> location </h3>
				<?php echo CHtml::encode($job->location)?>
				
				
				<div class="clear" style="padding:20px 0px;">
				<span style="font-size: 24px;font-weight: bold;">SHARE THIS </span>
				<span class='st_facebook_hcount' displayText='Facebook'></span>
				<span class='st_twitter_hcount' displayText='Tweet'></span>
				<span class='st_linkedin_hcount' displayText='LinkedIn'></span>
				</div>
     </div>
	<div class="clear"> 
		Total applicants : <?php echo $total_applicants; ?>
	</div>
	<div class="clear">   
		<div id="job">
		  <?php 
		  if(Yii::app()->user->isMember())
		  {

			  $this->widget('bootstrap.widgets.TbButton', array(
													'label'=>'Apply Online',
													'type'=>'primary', 
													'size'=>'large', 
													'url'=>Yii::app()->createUrl("user/applyJob", array("JID"=>$job->JID )),    
			)); 
		  }
		  if(Yii::app()->user->isGuest)
		  {
		  	
			  $this->widget('bootstrap.widgets.TbButton', array(
													'label'=>'Apply Online',
													'type'=>'primary', 
													'size'=>'large', 
													'url'=>Yii::app()->createUrl("user/apply_Job", array("JID"=>$job->JID )),    
			)); 
		  }
		  ?>  

		</div>
	</div>
</div>
</div>