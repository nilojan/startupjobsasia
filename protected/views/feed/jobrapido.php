<?php header("Content-type: text/xml"); ?>
<?php echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>"; ?>
<jobs>
<publisher>StartUp Jobs Asia</publisher>
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
            <url><![CDATA[http://www.startupjobs.asia/job/job/JID/<?php echo $model[$i]->JID; ?>/startup-hire/<?php echo $url2; ?>]]></url>
			<title><![CDATA[
            <?php echo CHtml::encode($model[$i]->title)." job at ".$model[$i]->company->cname." ".$model[$i]->location ?>]]>
            </title>
			<publishDate><![CDATA[<?php echo $model[$i]->created; ?>]]></publishDate>
			<expiryDate><![CDATA[<?php echo $model[$i]->expire; ?>]]></expiryDate>
			<referencenumber><?php echo $model[$i]->JID; ?></referencenumber>
			<company><![CDATA[<?php echo $model[$i]->company->cname; ?>]]></company>
			<enclosure url="http://www.startupjobs.asia/images/company/400/<?php echo $model[$i]->company->image; ?>" length="400" type="image/jpg"/>
		
			<location><![CDATA[<?php echo CHtml::encode($model[$i]->location); ?>]]></location>
			<country><![CDATA[<?php echo CHtml::encode($model[$i]->location); ?>]]></country>
           <description><![CDATA[
            <?php echo CHtml::encode($model[$i]->description); ?>
			
			<?php echo CHtml::encode($model[$i]->responsibility); ?> 

			<?php echo CHtml::encode($model[$i]->requirement); ?>			
            ]]></description>
           <salary><![CDATA[
                <?php $salary =$model[$i]->min_salary."-".$model[$i]->max_salary;
                 echo CHtml::encode($salary); ?>
           ]]></salary>
  
      </job>
<?php
}
?>
</jobs>