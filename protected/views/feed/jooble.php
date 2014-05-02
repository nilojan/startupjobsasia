<?php header("Content-type: text/xml"); ?>
<?php date_default_timezone_set('Asia/Singapore'); ?>
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

//$TwentyEightDay = date($model[$i]->created, strtotime("+28 day"));
$TwentyEightDay = date('Y-m-d H:i:s', strtotime(trim($model[$i]->created).' +28 day'));

?>  <job>
 		<name><![CDATA[
            <?php echo CHtml::encode($model[$i]->title)." job at ".$model[$i]->company->cname." ".$model[$i]->location ?>]]></name>
		<link><![CDATA[http://www.startupjobs.asia/job/job/JID/<?php echo $model[$i]->JID; ?>/startup-hire/<?php echo $url2; ?>]]></link>
		<updated><![CDATA[<?php echo $model[$i]->created; ?>]]></updated>
		<expire><![CDATA[<?php echo $TwentyEightDay; ?>]]></expire>
		<company><![CDATA[<?php echo $model[$i]->company->cname; ?>]]></company>
		<region>Asia</region>
		<city><![CDATA[<?php echo CHtml::encode($model[$i]->location); ?>]]></city>
		<description><![CDATA[
            <?php echo CHtml::encode($model[$i]->description); ?>
			
			<?php echo CHtml::encode($model[$i]->responsibility); ?> 

			<?php echo CHtml::encode($model[$i]->requirement); ?>]]></description>
  
      </job>
<?php
}
?>
</jobs>