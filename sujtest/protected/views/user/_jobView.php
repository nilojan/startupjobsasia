<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?> 
<div class="clear">
	<div class ="span9" style="text-align:left;">
        <span class="JobRole">
			<?php $url2 = "{$data->title} {$data->company->cname} {$data->location}";?>
			<?php echo CHtml::link($data->title, array('job/job', 'JID' => $data->JID, 'title'=>$url2)); ?> 
		</span>	
		
		<div class="Border">
			<!--<div class="bottomLine <?php echo $data->type; ?>"></div>-->
					<!--<div class="bottomLine <?php echo $data->type; ?>"></div>-->
					<?php	
				if ($data->full_time != '' && $data->full_time != '0'){
				
					echo "<div class='bottomLine ".$data->full_time."'></div>";
					
				}elseif($data->part_time != '' && $data->part_time != '0'){
				
					echo "<div class='bottomLine ".$data->part_time."'></div>";
					
				}
				elseif ($data->freelance != '' && $data->freelance != '0'){
				
					echo "<div class='bottomLine ".$data->freelance."'></div>";
					
				}	
				elseif ($data->internship != '' && $data->internship != '0'){
				
					echo "<div class='bottomLine ".$data->internship."'></div>";
					
				}
				elseif ($data->temporary != '' && $data->temporary != '0'){
				
					echo "<div class='bottomLine ".$data->temporary."'></div>";
					
				}
					
				elseif ($data->co_founder != '' && $data->co_founder != '0'){
				
					echo "<div class='bottomLine ".$data->co_founder."'></div>";
					
				}else echo "";
		?>
		</div>
	
		<div class="clear"> 
		<?php $url1 = "{$data->company->cname} {$data->location}";?>		
			<span class="CompanyName"><?php echo CHtml::link($data->company->cname,array('company/view', 'CID'=>$data->CID,$url1)); ?> </span> / 
			<span class="CountryName"><?php echo CHtml::link($data->location,array('site/jobs', 'location'=>$data->location)); ?></span>
		</div>
		 
    </div>
	
	<div class="JobTypee type">
		<!--<div class ="<?php echo $data->type; ?>">
		                    <?php $job_type = str_replace('-','',$data->type);?> 
		                    <?php $job_type = strtolower ($job_type) ?>							
			<?php echo CHtml::link($data->type,array('site/'.$job_type)); ?>
		</div>-->
			<?php
			
				if ($data->full_time != '' && $data->full_time != '0'){
					echo "<div style='float:left;' class =".$data->full_time.">".$data->full_time."</div>";
				}
			
				elseif ($data->part_time != '' && $data->part_time != '0'){
					echo "<div style='float:left;' class =".$data->part_time.">".$data->part_time."</div>";
				}
			
				elseif ($data->freelance != '' && $data->freelance != '0'){
					echo "<div style='float:left;' class =".$data->freelance.">".$data->freelance."</div>";
					}
					
				elseif ($data->internship != '' && $data->internship != '0'){
					echo "<div style='float:left;' class =".$data->internship.">".$data->internship."</div>";
					}
			
				elseif ($data->temporary != '' && $data->temporary != '0'){
					echo "<div style='float:left;' class =".$data->temporary.">".$data->temporary."</div>";
					}
					
				elseif ($data->co_founder != '' && $data->co_founder != '0'){
					echo "<div style='float:left;' class =".$data->co_founder.">".$data->co_founder."</div>";
					}					
				else{ echo ""; }
			?>		
	</div> 	
       
</div><br /><br /><br /><br /><br />