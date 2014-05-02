<?php

/*
 * This is Normal Job List
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>   


<div class="clear SingleJob">
	<!-- Startup Logo -->
	<div class="ListLogo">
		<?php $url1 = "{$data->company->cname} {$data->company->location}";
			$url1 = str_replace('/', '-', $url1);
		/*
		list($width, $height, $typee, $attr)  = getimagesize('http://test.startupjobs.sg'.Yii::app()->request->baseUrl.'/images/company/'. $data->company->image);

		if($width == $height){
			$image='<img src='.Yii::app()->request->baseUrl.'/images/company/'. $data->company->image.' align="middle" style="height:70px; padding: 0px 18%;" >';
		}elseif($width < $height){
			$image='<img src='.Yii::app()->request->baseUrl.'/images/company/'. $data->company->image.' align="middle" style="height:70px; padding: 0px 18%;" >';
		}else{
			$image='<img src='.Yii::app()->request->baseUrl.'/images/company/'. $data->company->image.' align="middle" style="width:110px;" >';
		}
		*/
		   //$company= $data->company;
		   $image='<img src='.Yii::app()->request->baseUrl.'/images/company/'. $data->company->image.' align="middle" style="width:110px;" >';
				
				echo CHtml::link($image, array('company/view/CID/'.$data->CID, 'startup'=>$url1));?>
		<?php //$url = str_replace(' ','-',$data->title);?> 
				 
	</div>   
	
	<!-- Titile , Startup and Location -->
    <!--<div class ="ListTitle">-->
	<div class ="span9">
        
		<span class="JobRole">
			<?php $url2 = "{$data->title} {$data->category} {$data->company->cname} {$data->location}";?>
			<?php $url2 = str_replace('/', '-', $url2); ?>
			<?php echo CHtml::link($data->title, array('job/job/JID/'.$data->JID, 'startup-hire'=>$url2,)); ?> 
		</span>					
        
		<div class="Border">
			
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
			
			<span class="CompanyName"><?php echo CHtml::link($data->company->cname,array('company/view/CID/'.$data->CID,'startup-hire'=>$url1)); ?> </span> / 			
			<span class="CountryName"><?php echo CHtml::link($data->location,array('site/jobs/location/'.$data->location)); ?></span>
					
		</div>
		 
    </div>
	
	<!-- Rounded Ball for type -->
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
       
</div>