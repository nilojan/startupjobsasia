<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$url2 = "{$data->title} {$data->category} {$data->company->cname} {$data->location}";
$url2 = str_replace('/', '-', $url2);
	
$url1 = "{$data->company->cname} {$data->location}";
$url1 = str_replace('/', '-', $url1);
?>   


<div class="clear SingleJob" style="text-align:left; padding-left:30px;">

    <div class ="span12">
        <span class="JobRole">
				<?php echo CHtml::link($data->title, array('job/job/JID/'.$data->JID, 'startup-hire'=>$url2)); ?> 
		</span>					
		<div class="clear">
			
			<span class="CompanyName"><?php echo CHtml::link($data->company->cname,array('company/view/CID/'.$data->CID,'startup-hire'=>$url1)); ?> </span> / <span class="CountryName"><?php echo CHtml::link($data->location,array('site/jobs/location/'.$data->location)); ?></span>
				
		</div>
<!--	</div>
		
	
  	<div class="JobTypeLeft span2">-->
	<span style="text-align:right;float:right;">
					<?php
			
				if ($data->full_time != '' && $data->full_time != '0'){
					echo CHtml::link($data->full_time,array('site/'.str_replace('-','',$data->full_time)));
				}
			
				elseif ($data->part_time != '' && $data->part_time != '0'){
					echo CHtml::link($data->part_time,array('site/'.str_replace('-','',$data->part_time)));
				}
			
				elseif ($data->freelance != '' && $data->freelance != '0'){
					echo CHtml::link($data->freelance,array('site/'.$data->freelance));
					}
					
				elseif ($data->internship != '' && $data->internship != '0'){
					echo CHtml::link($data->internship,array('site/'.$data->internship));
					}
			
				elseif ($data->temporary != '' && $data->temporary != '0'){
					echo CHtml::link($data->temporary,array('site/'.$data->temporary));
					}
					
				elseif ($data->co_founder != '' && $data->co_founder != '0'){
					echo CHtml::link($data->co_founder,array('site/'.str_replace('-','',$data->co_founder)));
					}
				elseif ($data->contract != '' && $data->contract != '0'){
					echo CHtml::link($data->contract,array('site/'.$data->contract));
					}					
				else{ echo ""; }	
				
			?>
		</span>	
			
	</div> 
	


       
</div>