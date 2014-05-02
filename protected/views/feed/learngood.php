<?php header("Content-type: text/xml"); ?>
<?php echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>"; ?>
<jobs>
<publisher>StartUp Jobs Asia</publisher>
<publisherurl>http://www.startupjobs.asia</publisherurl>
<lastBuildDate><?php echo date('Y-m-d H:i:s'); ?></lastBuildDate>

<?php
$length = sizeof($model);
for ($i=0; $i<$length; $i++)
{

$url2 = CHtml::encode($model[$i]->title)."-".CHtml::encode($model[$i]->category)."-job-at-".CHtml::encode($model[$i]->company->cname)."-".CHtml::encode($model[$i]->location);
$url2 = str_replace('/', '-', $url2);
$url2 = strtolower(str_replace(' ', '-', $url2));
$url2 = preg_replace("/[^a-zA-Z0-9\-]/","-",$url2);

$Title = strip_tags(CHtml::encode($model[$i]->title)." job at ".CHtml::encode($model[$i]->company->cname)." ".CHtml::encode($model[$i]->location));

?>  <job>
            <id><?php echo $model[$i]->JID; ?></id>
			<title><![CDATA[<?php echo CHtml::encode($model[$i]->title)." job at ".$model[$i]->company->cname." ".$model[$i]->location ?>]]></title>
			<reference_number><?php echo $model[$i]->JID; ?></reference_number>
			<job_categories><job_category><![CDATA[<?php echo CHtml::encode($model[$i]->category); ?>]]></job_category></job_categories>
			<employment_types>
			<?php if($model[$i]->full_time !=''): ?>			
			<employment_type><![CDATA[<?php echo CHtml::encode($model[$i]->full_time); ?>]]></employment_type>
<?php endif; ?>
<?php if($model[$i]->part_time !=''): ?>		
			<employment_type><![CDATA[<?php echo CHtml::encode($model[$i]->part_time); ?>]]></employment_type>
<?php endif; ?>
<?php if($model[$i]->internship !=''): ?>			
			<employment_type><![CDATA[<?php echo CHtml::encode($model[$i]->internship); ?>]]></employment_type>
<?php endif; ?>
<?php if($model[$i]->contract !=''): ?>			
			<employment_type><![CDATA[<?php echo CHtml::encode($model[$i]->contract); ?>]]></employment_type>
<?php endif; ?>
<?php if($model[$i]->co_founder !=''): ?>			
			<employment_type><![CDATA[<?php echo CHtml::encode($model[$i]->co_founder); ?>]]></employment_type>
<?php endif; ?>
<?php if($model[$i]->temporary !=''): ?>			
			<employment_type><![CDATA[<?php echo CHtml::encode($model[$i]->temporary); ?>]]></employment_type>
<?php endif; ?>
<?php if($model[$i]->freelance !=''): ?>			
			<employment_type><![CDATA[<?php echo CHtml::encode($model[$i]->freelance); ?>]]></employment_type>
<?php endif; ?>	
			</employment_types>

           <salary>
			<amount><![CDATA[
                <?php $salary =$model[$i]->min_salary."-".$model[$i]->max_salary;
                 echo CHtml::encode($salary); ?>
           ]]></amount>
		   <currency><![CDATA[<?php echo CHtml::encode($model[$i]->currency); ?>]]></currency>
		   </salary>
			<expiry_date><![CDATA[<?php echo CHtml::encode($model[$i]->expire); ?>]]></expiry_date>	
			<country><![CDATA[<?php echo CHtml::encode($model[$i]->location); ?>]]></country>
			<city><![CDATA[<?php echo CHtml::encode($model[$i]->location); ?>]]></city>
			<contact_name><![CDATA[<?php echo $model[$i]->company->cname; ?>]]></contact_name>
			<description><![CDATA[
            <?php echo CHtml::encode($model[$i]->description); ?>
			
			<?php echo CHtml::encode($model[$i]->responsibility); ?> 

			<?php echo CHtml::encode($model[$i]->requirement); ?>]]></description>
			<skills><![CDATA[<?php echo CHtml::encode($model[$i]->requirement); ?>]]></skills>
			<accepted_countries><country><?php echo CHtml::encode($model[$i]->location); ?></country></accepted_countries>
      </job>
<?php
}
?>
</jobs>