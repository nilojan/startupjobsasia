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
         <div class ="JobTypeLeft span2">
			<?php
			
			//$job_type = str_replace('-','',$data->full_time); 
			//echo CHtml::link($data->full_time,array($job_type));
			
				if ($data->full_time != '' && $data->full_time != '0'){
					//echo "<div class ='Full-time'>Full-time</div>";
					echo CHtml::link($data->full_time,array('site/fulltime'));
				}
			
				elseif ($data->part_time != '' && $data->part_time != '0'){
					//echo "<div class ='Part-time'>Part-time</div>";
					echo CHtml::link($data->part_time,array('site/parttime'));
				}
			
				elseif ($data->freelance != '' && $data->freelance != '0'){
					//echo "<div class ='Freelance'>Freelance</div>";
					echo CHtml::link($data->freelance,array('site/freelance'));
					}
					
				elseif ($data->internship != '' && $data->internship != '0'){
					//echo "<div class ='Internship'>Internship</div>";
					echo CHtml::link($data->internship,array('site/internship'));
					}
			
				elseif ($data->temporary != '' && $data->temporary != '0'){
					//echo "<div class ='Temporary'>Temporary</div>";
					echo CHtml::link($data->temporary,array('site/temporary'));
					}
					
				elseif ($data->co_founder != '' && $data->co_founder != '0'){
					//echo "<div class ='Co-Founder'>Co-Founder</div>";
					echo CHtml::link($data->co_founder,array('site/cofounder'));
					}
				elseif ($data->contract != '' && $data->contract != '0'){
					//echo "<div class ='Contract'>Contract</div>";
					echo CHtml::link($data->contract,array('site/contract'));
					}					
				else{ echo ""; }
			?>
         </div>  
	

	<div class ="span7">
        
		<span class="JobRole">

			<strong><?php echo CHtml::link($data->title, array('job/job/JID/'.$data->JID, 'startup-hire'=>$url2,)); ?></strong>
		</span>					
        
		
		<div class="clear">
			
			<span class="CompanyName"><?php echo CHtml::link($data->company->cname,array('company/view/CID/'.$data->CID,'startup-hire'=>$url1)); ?> </span>
				
		</div>
		 
    </div>
	
	<!-- Rounded Ball for type -->
	<div class="JobLocation span3">

			<span class="CountryName"><?php echo CHtml::link($data->location,array('site/jobs/location/'.$data->location)); ?></span>

	</div> 
       
</div>