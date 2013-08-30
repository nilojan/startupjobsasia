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
	<div class ="span9" style="text-align:left;">
        <span class="JobRole">
			<?php echo CHtml::link($data->fname, array('user/profile/'.$data->UID)); ?> 
			
		</span>	
		<div>
			<div><?php echo $age.' Years Old'; ?></div>
			<div>Last Update:</div>
			<div><?php echo $last_update; ?></div>
		</div>
	
		<div> 		
			<span>Email:</span> 	
			<span><?php echo $data->email ?></span><br> 
			<span>Contact:</span>	
			<span><?php echo '+'.$data->contact ?></span> 
		</div>

		<div> 		
			<span>Nationality:</span> 	
			<span><?php echo $data->country ?></span><br> 
			<span>Current Location:</span>	
			<span><?php echo $data->location ?></span> 
		</div>

		<div class ="span2">		          
            <?php if($extt == 'doc'){
            	echo CHtml::link(CHtml::image(Yii::app()->baseUrl.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'icons'.DIRECTORY_SEPARATOR.'doc_icon_small.png'),Yii::app()->baseUrl . '/resume/'.$data->resume,array('target'=>'_blank')); 
            	}
            	if($extt == 'pdf') {
            	echo CHtml::link(CHtml::image(Yii::app()->baseUrl.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'icons'.DIRECTORY_SEPARATOR.'pdf_icon_small.png'),Yii::app()->baseUrl . '/resume/'.$data->resume,array('target'=>'_blank')); 
            	}
            ?>

        </div>
		 
    </div>
	
	<div id="JobType" class="type">
		<div class ="<?php //echo $data->type; ?>">
		                    <?php //$job_type = str_replace('-','',$data->type);?> 
		                    <?php //$job_type = strtolower ($job_type) ?>							
			<?php //echo CHtml::link($data->type,array('site/'.$job_type)); ?>
		</div>
	</div> 
       
</div><br /><br /><br /><br /><br />