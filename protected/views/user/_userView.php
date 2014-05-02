<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$timestamp = strtotime($data->last_modified);
$last_update = date('d-M-Y', $timestamp);


$bday = new DateTime($data->dob);
$today = new DateTime(date("Y-m-d"));
$age = $today->diff($bday)->y;
$extt = substr(strrchr($data->resume,'.'),1);
   
?> 
<div class="clear">
	<div class ="span11" style="padding-bottom:40px;">
		<div class ="span3">
			<span class="JobRole">
				<?php echo CHtml::link($data->fname, array('user/profile/'.$data->UID)); ?> 
				
			</span>	
			<div>
				<div><?php echo $age.' Years Old'; ?></div>
				<small>
				<div>Last Update: <?php echo $last_update; ?> </div></small>
			</div>
			
			<div>		          
				<?php if($extt == 'doc' or $extt == 'docx'){
					echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/icons/doc_icon_small.png'),Yii::app()->baseUrl . '/resume/'.$data->resume,array('target'=>'_blank')); 
					}
					if($extt == 'pdf') {
					echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/images/icons/pdf_icon_small.png'),Yii::app()->baseUrl . '/resume/'.$data->resume,array('target'=>'_blank')); 
					}
				?>

			</div>
			
		</div>
		
		<div class ="span3">
			<div> 		
				<span>Email:</span> 	
				<span><?php echo $data->email ?></span><br> 
				<span>Contact:</span>	
				<span><?php echo '+'.$data->contact ?></span> 
			</div>
		</div>

		<div class ="span3">
			<div> 		
				<span>Nationality:</span> 	
				<span><?php echo $data->country ?></span><br> 
				<span>Current Location:</span>	
				<span><?php echo $data->location ?></span> 
			</div>

		</div>
		 
    </div>
	

       
</div><br /><br /><br /><br /><br />