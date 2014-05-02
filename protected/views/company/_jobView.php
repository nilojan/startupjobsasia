<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>   


<div class="clear">
                    
    <div class="span10" style="text-align:left;">
                    <span class="JobRole">
					<?php $url2 = "{$data->title} {$data->company->cname} {$data->location}";?>
					<?php echo CHtml::link($data->title, array('job/job', 'JID' => $data->JID, 'title'=>$url2)); ?> 
					</span>					
                    <div class="Border">
				<div class="bottomLine <?php echo $data->type; ?>"></div>
	           </div>
			   		<div class="clear">
      <?php $url1 = "{$data->company->cname} {$data->location}";?>
	 <span class="CompanyName"><?php echo CHtml::link($data->company->cname,array('company/view', 'CID'=>$data->CID,$url1)); ?> </span> / 
	 <span class="CountryName"><?php echo CHtml::link($data->location,array('site/jobs', 'location'=>$data->location)); ?></span>
         </div>
		 
         </div>
	<div id="JobType" class="type">
		<div class ="<?php echo $data->type; ?>">
		                    <?php $job_type = str_replace('-','',$data->type);?> 
		                    <?php $job_type = strtolower ($job_type) ?>
							<?php echo CHtml::link($data->type,array('site/'.$job_type)); ?>
		</div>
	</div> 
       
</div><br /><br /><br /><br /><br />