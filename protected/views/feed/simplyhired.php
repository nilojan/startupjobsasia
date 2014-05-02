<?php header("Content-type: text/xml"); ?>
<?php echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>"; ?>
<jobs>
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
            <title><![CDATA[
            <?php echo CHtml::encode($model[$i]->title)." job at ".$model[$i]->company->cname." ".$model[$i]->location ?>]]>
            </title>
			<job-code><![CDATA[<?php echo $model[$i]->JID; ?>]]></job-code>
			<job-board-name><![CDATA[StartUp Jobs Asia]]></job-board-name>
			<job-board-url><![CDATA[http://www.startupjobs.asia]]></job-board-url>
			<detail-url><![CDATA[http://www.startupjobs.asia/job/job/JID/<?php echo $model[$i]->JID; ?>/startup-hire/<?php echo $url2; ?>]]></detail-url>
			<job-category><![CDATA[<?php echo CHtml::encode($model[$i]->category); ?>]]></job-category>			
			<description>
			<summary><![CDATA[<?php echo CHtml::encode($model[$i]->description); ?>]]></summary>
			<required-skills><![CDATA[<?php echo CHtml::encode($model[$i]->responsibility); ?> <?php echo CHtml::encode($model[$i]->requirement); ?>]]></required-skills>
			<required-education><![CDATA[<?php echo CHtml::encode($model[$i]->responsibility); ?> <?php echo CHtml::encode($model[$i]->requirement); ?>]]></required-education>
			<required-experience><![CDATA[<?php echo CHtml::encode($model[$i]->responsibility); ?> <?php echo CHtml::encode($model[$i]->requirement); ?>]]></required-experience>	
<?php if($model[$i]->full_time !=''): ?>			
			<full-time><![CDATA[<?php echo CHtml::encode($model[$i]->full_time); ?>]]></full-time>
<?php endif; ?>
<?php if($model[$i]->part_time !=''): ?>		
			<part-time><![CDATA[<?php echo CHtml::encode($model[$i]->part_time); ?>]]></part-time>
<?php endif; ?>
<?php if($model[$i]->internship !=''): ?>			
			<internship><![CDATA[<?php echo CHtml::encode($model[$i]->internship); ?>]]></internship>
<?php endif; ?>
<?php if($model[$i]->contract !=''): ?>			
			<contract><![CDATA[<?php echo CHtml::encode($model[$i]->contract); ?>]]></contract>
<?php endif; ?>
<?php if($model[$i]->co_founder !=''): ?>			
			<co-founder><![CDATA[<?php echo CHtml::encode($model[$i]->co_founder); ?>]]></co-founder>
<?php endif; ?>
<?php if($model[$i]->temporary !=''): ?>			
			<temporary><![CDATA[<?php echo CHtml::encode($model[$i]->temporary); ?>]]></temporary>
<?php endif; ?>
<?php if($model[$i]->freelance !=''): ?>			
			<freelance><![CDATA[<?php echo CHtml::encode($model[$i]->freelance); ?>]]></freelance>
<?php endif; ?>			
			</description>
			<compensation>
			<salary-range><![CDATA[<?php $salary =$model[$i]->min_salary."-".$model[$i]->max_salary;
                 echo CHtml::encode($salary); ?>]]></salary-range>
			<salary-amount><![CDATA[<?php $salary =$model[$i]->min_salary."-".$model[$i]->max_salary;
                 echo CHtml::encode($salary); ?>]]></salary-amount>
			<salary-currency><![CDATA[<?php echo CHtml::encode($model[$i]->currency); ?>]]></salary-currency>
			</compensation>	
			<posted-date><![CDATA[<?php echo CHtml::encode($model[$i]->created); ?>]]></posted-date>
			<close-date><![CDATA[<?php echo CHtml::encode($model[$i]->expire); ?>]]></close-date>			
			<location>
			<address><![CDATA[<?php echo CHtml::encode($model[$i]->location); ?>]]></address>
			<city><![CDATA[<?php echo CHtml::encode($model[$i]->location); ?>]]></city>
			<country><![CDATA[<?php echo CHtml::encode($model[$i]->location); ?>]]></country>
			</location>
			<contact>
			  <name><![CDATA[<?php echo $model[$i]->company->cname; ?>]]></name>
			</contact>
			<company>
			  <name><![CDATA[<?php echo $model[$i]->company->cname; ?>]]></name>
			</company>			
      </job>
<?php
}
?>
</jobs>