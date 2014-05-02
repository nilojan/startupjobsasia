<?php

/*
 * This is Premium Job List
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 
$url1 = "{$data->company->cname} {$data->company->location}";
$url1 = str_replace('/', '-', $url1);

					
$url2 = "{$data->title} {$data->company->cname} {$data->location}";
$url2 = str_replace('/', '-', $url2);
		
?>   

<div class="clear SingleJob">

		 
         <div class ="ListLogo">

                    <?php $image='<img src='.Yii::app()->request->baseUrl.'/images/company/'. $data->company->image.' height="110" width="110" >'?>
                    <?php echo CHtml::link($image, array('company/view', 'CID'=>$data->CID,$url1)); ?>
         </div>

		 	<div class ="span9">
        
		<span class="JobRole">

			<?php echo CHtml::link($data->title, array('job/job/JID/'.$data->JID, 'startup-hire'=>$url2,)); ?> 
		</span>					
        
	<!--	<div class="Border">
			
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
					
				}elseif ($data->contract != '' && $data->contract != '0'){
				
					echo "<div class='bottomLine ".$data->contract."'></div>";
					
					}else echo "";
		?>		
					
	    </div>-->
		
		<div class="clear">
			
			<span class="CompanyName"><?php echo CHtml::link($data->company->cname,array('company/view/CID/'.$data->CID,'startup-hire'=>$url1)); ?> </span> / 			
			<span class="CountryName"><?php echo CHtml::link($data->location,array('site/jobs/location/'.$data->location)); ?></span>
			<div style="padding-top:10px;"><span class="label label-success">Total Views : <?php echo $data->views; ?></span>
			<span class="label label-warning" style="display:none;">Unique Views : <?php echo $data->unique_views; ?></span></div>
		</div>
		 
    </div>
	
		<div class="JobTypee type">

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
				elseif ($data->contract != '' && $data->contract != '0'){
					echo "<div style='float:left;' class =".$data->contract.">".$data->contract."</div>";
					}					
				else{ echo ""; }
			?>
	</div> 
	<!--
         <div class ="span9">
				<?php  $PremiumTitle = substr($data->title,0,10); ?>
				<?php echo CHtml::link($PremiumTitle, array('job/job', 'JID' => $data->JID,$url2)) ; ?>
         </div>

		 
         <div class ="PremiumType">
                    <?php echo $data->type; ?>
         </div>

         <div class ="PremiumTitle">
                    <?php echo CHtml::link($data->title, array('job/job', 'JID' => $data->JID,$url2)) ; ?>
         </div>
         <div class ="PremiumDescription">
					<?php  $PremiumDescription = substr($data->description,0,300); ?>
                    <?php echo $PremiumDescription ; ?> ...
         </div>    -->     
</div>
         
