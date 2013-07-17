<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>   


<div class="clear">
	<div class="ListLogo">
		<?php $url1 = "{$data->company->cname} {$data->company->location}";
		
		list($width, $height, $typee, $attr)  = getimagesize('http://test.startupjobs.sg'.Yii::app()->request->baseUrl.'/images/company/'. $data->company->image);

		if($width == $height){
			$image='<img src='.Yii::app()->request->baseUrl.'/images/company/'. $data->company->image.' align="middle" style="height:70px; padding: 0px 18%;" >';
		}elseif($width < $height){
			$image='<img src='.Yii::app()->request->baseUrl.'/images/company/'. $data->company->image.' align="middle" style="height:70px; padding: 0px 18%;" >';
		}else{
			$image='<img src='.Yii::app()->request->baseUrl.'/images/company/'. $data->company->image.' align="middle" style="width:110px;" >';
		}
		   //$company= $data->company;
				
				echo CHtml::link($image, array('company/view', 'CID'=>$data->CID, 'title'=>$url1));?>
		<?php //$url = str_replace(' ','-',$data->title);?> 
				 
	</div>                      
    <div class ="span9">
        
		<span class="JobRole">
			<?php $url2 = "{$data->title} {$data->company->cname} {$data->location}";?>
			<?php echo CHtml::link($data->title, array('job/job', 'JID' => $data->JID, 'title'=>$url2,)); ?> 
		</span>					
        
		<div class="Border">
			<div class="bottomLine <?php echo $data->type; ?>"></div>
	    </div>
		
		<div class="clear">
			
			<span class="CompanyName"><?php echo CHtml::link($data->company->cname,array('company/view', 'CID'=>$data->CID,$url1)); ?> </span> / 			
			<span class="CountryName"><?php echo CHtml::link($data->location,array('site/', 'location'=>$data->location)); ?></span>
					
		</div>
		 
    </div>
	<div id="JobType" class="type">
		<div class ="<?php echo $data->type; ?>">
		                    <?php //echo $data->type; ?>
							<?php $job_type = str_replace('-','',$data->type);?> 
			<?php echo CHtml::link($data->type,array($job_type)); ?>
		</div>
	</div> 
       
</div><br /><br /><br /><br /><br />