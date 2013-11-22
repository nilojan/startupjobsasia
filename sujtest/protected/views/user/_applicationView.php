<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/*var_dump($data->attributes);
var_dump($data->company->cname); */

//var_dump($data->JID); 
?>   

	<div class ="span10">
		 
        <span class="JobRole">
			<?php echo CHtml::link($data->job->title, array('job/job', 'JID' => $data->JID)) ; ?>
		</span>	
		<div class="Border">
					<?php	
				if ($data->job->full_time != '' && $data->job->full_time != '0'){
				
					echo "<div class='bottomLine ".$data->job->full_time."'></div>";
					
				}elseif($data->job->part_time != '' && $data->job->part_time != '0'){
				
					echo "<div class='bottomLine ".$data->job->part_time."'></div>";
					
				}
				elseif ($data->job->freelance != '' && $data->job->freelance != '0'){
				
					echo "<div class='bottomLine ".$data->job->freelance."'></div>";
					
				}	
				elseif ($data->job->internship != '' && $data->job->internship != '0'){
				
					echo "<div class='bottomLine ".$data->job->internship."'></div>";
					
				}
				elseif ($data->job->temporary != '' && $data->job->temporary != '0'){
				
					echo "<div class='bottomLine ".$data->job->temporary."'></div>";
					
				}
					
				elseif ($data->job->co_founder != '' && $data->job->co_founder != '0'){
				
					echo "<div class='bottomLine ".$data->job->co_founder."'></div>";
					
				}else echo "";
		?>
		</div>
		
		<div class="clear"> 
	
			<span class="CompanyName"><?php echo CHtml::link($data->company->cname, array('company/view/CID/'.$data->CID)) ; ?>  </span> / 
			<span class="CountryName"><?php echo CHtml::link($data->job->location,array('site/jobs/location/'.$data->job->location)); ?></span>
		</div>
		
		</div>
		
		<div class="JobTypee type">
			<?php
			
				if ($data->job->full_time != '' && $data->job->full_time != '0'){
					echo "<div style='float:left;' class =".$data->job->full_time.">".$data->job->full_time."</div>";
				}
			
				elseif ($data->job->part_time != '' && $data->job->part_time != '0'){
					echo "<div style='float:left;' class =".$data->job->part_time.">".$data->job->part_time."</div>";
				}
			
				elseif ($data->job->freelance != '' && $data->job->freelance != '0'){
					echo "<div style='float:left;' class =".$data->job->freelance.">".$data->job->freelance."</div>";
					}
					
				elseif ($data->job->internship != '' && $data->job->internship != '0'){
					echo "<div style='float:left;' class =".$data->job->internship.">".$data->job->internship."</div>";
					}
			
				elseif ($data->job->temporary != '' && $data->job->temporary != '0'){
					echo "<div style='float:left;' class =".$data->job->temporary.">".$data->job->temporary."</div>";
					}
					
				elseif ($data->job->co_founder != '' && $data->job->co_founder != '0'){
					echo "<div style='float:left;' class =".$data->job->co_founder.">".$data->job->co_founder."</div>";
					}					
				else{ echo ""; }
			?>		
	</div> 
	
        <!--  <div class ="span2">
                    <?php  //echo CHtml::link(CHtml::encode('Resume'),Yii::app()->baseUrl . '/resume/'.$data->Employee->resume,array('target'=>'_blank')); ?>
         </div> 
        <div class ="span2">                  
                   <?php echo $data->jobstatus; ?>                     
        </div>  
         <div class ="span2">
                    <?php echo $data->applied; ?>
         </div>-->
         <div class ="span2">
                    <?php if($data->last_reviewed == '0000-00-00 00:00:00')
                          {
                              echo "Not Reviewed Yet";
                          }
                          else
                          {
                              echo $data->last_reviewed;         
                          }
                    ?>
         </div>

        
         
