<?php header("Content-type: text/xml"); ?>
<?php echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>"; ?>
<trovit>
<?php
$length = sizeof($model);
for ($i=0; $i<$length; $i++)
{

$url2 = CHtml::encode($model[$i]->title)."-".CHtml::encode($model[$i]->category)."-job-at-".CHtml::encode($model[$i]->company->cname)."-".CHtml::encode($model[$i]->location);
$url2 = str_replace('/', '-', $url2);
$url2 = strtolower(str_replace(' ', '-', $url2));
$url2 = preg_replace("/[^a-zA-Z0-9\-]/","-",$url2);

$Title = strip_tags(CHtml::encode($model[$i]->title)." job at ".CHtml::encode($model[$i]->company->cname)." ".CHtml::encode($model[$i]->location));

?><ad>
			<id><![CDATA[<?php echo $model[$i]->JID; ?>]]></id>
            <title><![CDATA[
            <?php echo CHtml::encode($model[$i]->title)." job at ".$model[$i]->company->cname." ".$model[$i]->location ?>]]>
            </title>			
			<url><![CDATA[http://www.startupjobs.asia/job/job/JID/<?php echo $model[$i]->JID; ?>/startup-hire/<?php echo $url2; ?>]]></url>
			<content>
			<![CDATA[<?php echo CHtml::encode($model[$i]->description); ?>
			
			<?php echo CHtml::encode($model[$i]->responsibility); ?> 
			
			<?php echo CHtml::encode($model[$i]->requirement); ?>]]>
			</content>
			
			<company><![CDATA[<?php echo $model[$i]->company->cname; ?>]]></company>	
			<experience><![CDATA[<?php echo CHtml::encode($model[$i]->responsibility); ?> <?php echo CHtml::encode($model[$i]->requirement); ?>]]></experience>
			<requirements><![CDATA[<?php echo CHtml::encode($model[$i]->requirement); ?>]]></requirements>			
			<category><![CDATA[<?php echo CHtml::encode($model[$i]->category); ?>]]></category>			
			<salary><![CDATA[<?php $salary =$model[$i]->min_salary."-".$model[$i]->max_salary;
                 echo CHtml::encode($salary); ?>]]></salary>
			<city_area><![CDATA[<?php echo CHtml::encode($model[$i]->location); ?>]]></city_area>
			<city><![CDATA[<?php echo CHtml::encode($model[$i]->location); ?>]]></city>
			<region><![CDATA[<?php echo CHtml::encode($model[$i]->location); ?>]]></region>

			<date><![CDATA[<?php echo CHtml::encode($model[$i]->created); ?>]]></date>
			<expiration_date><![CDATA[<?php echo CHtml::encode($model[$i]->expire); ?>]]></expiration_date>				 

      </ad>
<?php
}
?>
</trovit>