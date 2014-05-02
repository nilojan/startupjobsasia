<?php header("Content-type: text/xml"); ?>
<?php echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>"; ?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<url>
	<loc>http://www.startupjobs.asia/</loc>
	<lastmod><?php date_default_timezone_set("Asia/Singapore"); echo date('Y-m-d')."T".date('H:i:s')."+00:00"; ?></lastmod>
	<changefreq>hourly</changefreq>
	<priority>1.0</priority>
</url>
<?php
$length = sizeof($model);
for ($i=0; $i<$length; $i++)
{

$url2 = CHtml::encode($model[$i]->title)."-".CHtml::encode($model[$i]->category)."-job-at-".CHtml::encode($model[$i]->company->cname)."-".CHtml::encode($model[$i]->location);
$url2 = str_replace('/', '-', $url2);
$url2 = strtolower(str_replace(' ', '-', $url2));
$url2 = preg_replace("/[^a-zA-Z0-9\-]/","-",$url2);
$Time = substr($model[$i]->created,11);
$PubDate = substr($model[$i]->created,0,10);
?><url>
        <loc>http://www.startupjobs.asia/job/job/JID/<?php echo $model[$i]->JID; ?>/startup-hire/<?php echo $url2; ?></loc>
		<lastmod><?php echo $PubDate; ?>T<?php echo $Time; ?>+00:00</lastmod>
		<changefreq>daily</changefreq>
		<priority>1.0</priority>
		<image:image>
			<image:loc>http://www.startupjobs.asia/images/company/400/<?php echo CHtml::encode($model[$i]->company->image); ?></image:loc>
			<image:caption><?php echo CHtml::encode($model[$i]->company->cname); ?> on Startup Jobs Asia</image:caption>
		</image:image>		
    </url>
<?php
}
?>
</urlset>