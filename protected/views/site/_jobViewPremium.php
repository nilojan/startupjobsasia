<?php

/*
 * This is Premium Job List
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 
$url1 = "{$data->company->cname} {$data->company->location}";
$url1 = str_replace('/', '-', $url1);
$url1 = strtolower(str_replace(' ', '-', $url1));
$url1 = preg_replace("/[^a-zA-Z0-9\-]/","-",$url1);


$url2 = "{$data->title} {$data->company->cname} {$data->location}";
$url2 = str_replace('/', '-', $url2);
$url2 = strtolower(str_replace(' ', '-', $url2));
$url2 = preg_replace("/[^a-zA-Z0-9\-]/","-",$url2);

$today_date = date('Y-m-d');

$total_views_today = Yii::app()->db->createCommand("SELECT SUM(visits) as sum FROM `stats` WHERE `JID`= $data->JID AND last_visit_date='".$today_date."'")->queryScalar();


//$stats = Stats::model()->findAll('JID=:JID AND last_visit_date=:today', array('JID'=> $data->JID,'today'=>$today_date));
//$total_views_today = count($stats);

?>   

<div class="clear SingleJob">		 
         <div class ="JobTypeLeftP span2">
			<?php
			
        $default_image = 'startup_default.jpg';
        $img_url = Yii::app()->getBaseUrl(true).'/images/company/400/'. $data->company->image; 
         $file_headers = @get_headers($img_url);
        if(($file_headers[0] == 'HTTP/1.1 404 Not Found') || ($file_headers[0] == 'HTTP/1.0 404 Not Found') || ($data->company->image == '')) {
            $img_url = Yii::app()->request->baseUrl.'/images/company/'. $default_image; 
            $image = '<img src="'.$img_url.'" class="premiumLogo">';
        }
        else {
            $image = '<img src="'.$img_url.'" class="premiumLogo">';
        }
		echo CHtml::link($image, array('company/view/CID/'.$data->company->CID, 'startup-hire'=>$url1));


			?>
         </div>

		<div class ="span8 margintop5px">
        <div class="FeaturedJobs">Featured</div>
			<span class="JobRole premiumRole">
				<?php echo CHtml::link($data->title, array('job/job/JID/'.$data->JID, 'startup-hire'=>$url2,)); ?> 
			</span>

		
			<div class="clear">			
				<span class="CompanyName"><?php echo CHtml::link($data->company->cname,array('company/view/CID/'.$data->CID,'startup-hire'=>$url1)); ?> </span>
				<div style="float:right;font-size:12px;color:#999999;">					
					<span class="label" style="display:none;">Unique Views : <?php echo $data->unique_views; ?></span>
					<br /><small>Total Views : <?php echo $data->views; ?><?php if($total_views_today !=''):?> , Today Views :  <?php echo $total_views_today; ?><?php endif; ?></small>
				</div>
			</div>
		 
		</div>

		<div class="JobLocation span2">
			
			<span class="CountryName"><?php echo CHtml::link($data->location,array('site/jobs/location/'.$data->location)); ?></span>
			<span style="margin-left:15px;"><?php

			if ($data->full_time != '' && $data->full_time != '0'){
					echo CHtml::link($data->full_time,array(str_replace('-','',$data->full_time)));
				}
			
				elseif ($data->part_time != '' && $data->part_time != '0'){
					echo CHtml::link($data->part_time,array(str_replace('-','',$data->part_time)));
				}
			
				elseif ($data->freelance != '' && $data->freelance != '0'){
					echo CHtml::link($data->freelance,array($data->freelance));
					}
					
				elseif ($data->internship != '' && $data->internship != '0'){
					echo CHtml::link($data->internship,array($data->internship));
					}
			
				elseif ($data->temporary != '' && $data->temporary != '0'){
					echo CHtml::link($data->temporary,array($data->temporary));
					}
					
				elseif ($data->co_founder != '' && $data->co_founder != '0'){
					echo CHtml::link($data->co_founder,array(str_replace('-','',$data->co_founder)));
					}
				elseif ($data->contract != '' && $data->contract != '0'){
					echo CHtml::link($data->contract,array($data->contract));
					}					
				else{ echo ""; }
				
				?></span>
		</div>
   
</div>	
         
