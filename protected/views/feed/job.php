<?php header("Content-type: text/xml"); ?>
<rss xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:wfw="http://wellformedweb.org/CommentAPI/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" xmlns:slash="http://purl.org/rss/1.0/modules/slash/" version="2.0">
<channel>
<title>StartUp Jobs Asia - Startup Jobs in Singapore , Malaysia , HongKong ,Thailand</title>
<atom:link href="http://www.startupjobs.asia/feed/feed" rel="self" type="application/rss+xml"/>
<link>http://www.startupjobs.asia</link>
<description>
Startup Hire, Startup Hiring,IT Jobs, Work and Jobs in Singapore Malaysia Thailand Vietnam HongKong</description>
<lastBuildDate><?php echo date('Y-m-d H:i:s'); ?></lastBuildDate>
<language>en-US</language>
<sy:updatePeriod>hourly</sy:updatePeriod>
<sy:updateFrequency>1</sy:updateFrequency>

<?php
$length = sizeof($model);
for ($i=0; $i<$length; $i++)
{

$url2 = CHtml::encode($model[$i]->title)."-".CHtml::encode($model[$i]->category)."-job-at-".CHtml::encode($model[$i]->company->cname)."-".CHtml::encode($model[$i]->location);
$url2 = str_replace('/', '-', $url2);
$url2 = strtolower(str_replace(' ', '-', $url2));
$url2 = preg_replace("/[^a-zA-Z0-9\-]/","-",$url2);

$Title = strip_tags(CHtml::encode($model[$i]->title)." job at ".CHtml::encode($model[$i]->company->cname)." ".CHtml::encode($model[$i]->location));

$logo = ($model[$i]->company->image!=''? $model[$i]->company->image : "default.jpg");

?> <item>
            <title>
            <?php echo $Title; ?>
            </title>
			<link>
			http://www.startupjobs.asia/job/job/JID/<?php echo $model[$i]->JID; ?>/startup-hire/<?php echo $url2; ?>
			</link>
			<enclosure url="http://www.startupjobs.asia/images/company/400/<?php echo $logo; ?>" length="400" type="image/jpg"/>
			<pubDate><?php echo $model[$i]->created; ?></pubDate>
			<author><?php echo CHtml::encode($model[$i]->company->cname); ?></author>
			<postID><?php echo $model[$i]->JID; ?></postID>
            <description>
            <?php echo strip_tags(CHtml::encode($model[$i]->description)); ?>
			
			<?php echo strip_tags(CHtml::encode($model[$i]->responsibility)); ?> 

			<?php echo strip_tags(CHtml::encode($model[$i]->requirement)); ?>
            </description>
            <location>
                <?php echo CHtml::encode($model[$i]->location); ?>
            </location>
           <salary>
                <?php if($model[$i]->min_salary !=''):
				
				$salary =$model[$i]->min_salary."-".$model[$i]->max_salary;
                 echo CHtml::encode($salary);
				 endif;				 
				 ?>
            </salary>
      </item>
<?php
}
?>
</channel>
</rss>