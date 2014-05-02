<?php

/*
 * This is Normal Job List
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 
$url1 = $data->company->cname."-".$data->company->location;
$url1 = strtolower(str_replace('/', '-', $url1));
$url1 = preg_replace("/[^a-zA-Z0-9\-]/","-",$url1);


$url2 = $data->title."-".$data->category."-".$data->company->cname."-".$data->location;
$url2 = strtolower(str_replace('/', '-', $url2));
$url2 = preg_replace("/[^a-zA-Z0-9\-]/","-",$url2);

?>   


<div class="clear SingleJob">


	<div class ="span7" style="padding-left:10px;">
        
		<span class="JobRole">

			<strong><?php echo CHtml::link($data->title, array('job/job/JID/'.$data->JID, 'startup-hire'=>$url2,)); ?></strong>
		</span>					
        
		
		<div class="clear">
			
			<span class="CompanyName"><?php echo CHtml::link($data->company->cname,array('company/view/CID/'.$data->CID,'startup-hire'=>$url1)); ?> </span>
				
		</div>

    </div>
	
	<!-- Rounded Ball for type -->
	<div class="JobLocation span5">

			<span class="CountryName"><?php echo CHtml::link($data->location,array('site/jobs/location/'.$data->location)); ?></span>
		 	<div style="padding:4px 0px 0px 15px;"><?php
			
			//$job_type = str_replace('-','',$data->full_time); 
			//echo CHtml::link($data->full_time,array($job_type));
			
				if ($data->full_time != '' && $data->full_time != '0'){
					echo "<a href='/site/fulltime'>Full-time</a>";
				}
			
				elseif ($data->part_time != '' && $data->part_time != '0'){
					echo "<a href='/site/parttime'>Part-time</a>";
				}
			
				elseif ($data->freelance != '' && $data->freelance != '0'){
					echo "<a href='/site/freelance'>Freelance</a>";
					}
					
				elseif ($data->internship != '' && $data->internship != '0'){
					echo "<a href='/site/internship'>Internship</a>";
					}
			
				elseif ($data->temporary != '' && $data->temporary != '0'){
					echo "<a href='/site/temporary'>Temporary</a>";
					}
					
				elseif ($data->co_founder != '' && $data->co_founder != '0'){
					echo "<a href='/site/cofounder'>Co-founder</a>";
					}
				elseif ($data->contract != '' && $data->contract != '0'){
					echo "<a href='/site/contract'>Contract</a>";
					}					
				else{ echo ""; }
			?></div>
	</div> 
       
</div>