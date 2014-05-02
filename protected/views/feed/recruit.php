<?php header("Content-type: text/xml"); ?>
<?php echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>"; ?>
<jobslist>
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
            <title><![CDATA[
            <?php echo CHtml::encode($model[$i]->title)." job at ".$model[$i]->company->cname." ".$model[$i]->location ?>]]>
            </title>
			<link><![CDATA[http://www.startupjobs.asia/job/job/JID/<?php echo $model[$i]->JID; ?>/startup-hire/<?php echo $url2; ?>]]></link>
			<guid><?php echo $model[$i]->JID; ?></guid>
			<postDate><![CDATA[<?php echo $model[$i]->created; ?>]]></postDate>
           <description><![CDATA[
            <?php echo CHtml::encode($model[$i]->description); ?>
			
			<?php echo CHtml::encode($model[$i]->responsibility); ?> 

			<?php echo CHtml::encode($model[$i]->requirement); ?>			
            ]]></description>			
			<location><![CDATA[<?php echo CHtml::encode($model[$i]->location); ?>]]></location>
			<city><![CDATA[<?php echo CHtml::encode($model[$i]->location); ?>]]></city>
			<country><![CDATA[<?php echo CHtml::encode($model[$i]->location); ?>]]></country>
			<locale>en</locale>
			<jobType>Full time</jobType>
			<jobSalary><![CDATA[
                <?php $salary =$model[$i]->min_salary."-".$model[$i]->max_salary;
                 echo CHtml::encode($salary); ?>
           ]]></jobSalary>
		   <jobCategory><![CDATA[<?php echo CHtml::encode($model[$i]->category); ?>]]></jobCategory>
   
      </job>
<?php
}
?>
</jobslist>