<?php
$this->pageTitle = "Startup Hire:{$job->title} job at {$company->cname} {$job->location}";
$this->pageDesc = strip_tags(trim(substr($job->description,0,190)));
$this->pageOgTitle = "{$job->title} job at {$company->cname} {$job->location}";
$this->pageOgDesc= strip_tags(trim(substr($job->description,0,400)));
$this->pageOgImage='/images/company/400/'.$company->image;
//$this->addMetaProperty('fb:app_id',Yii::app()->params['fbAppId']);
$this->pageCanonical = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; // canonical URLs should always be absolute
$this->pagePublishedTime = $job->created;
$this->pageModifiedTime = $job->modified;
$this->pageSiteName = "Start up Jobs Asia";
$this->pageAuthor = $company->cname;

$this->breadcrumbs=array(
	'About',
);
$this->pageTitle = 'About Startup Jobs Asia | '.Yii::app()->params['pageTitle'];
?>



<div class="row-fluid">
	<div class="About">
		<div class="clear">
			<h1 class="AboutUs">About Us</h1>
		</div>
		<div class="span6" style="margin-left:0;">
		<p class="AboutTitle">
			<span style="font-size:30px;">Building world class companies in Asia,</span><br />
			<span style="font-size:90px;line-height: 80px;">one</span>
			<span style="font-size:90px;line-height: 80px;color:#79cff7;">talent</span><br />
			<span style="font-size:90px;line-height: 80px;">at a time.</span></p>

			<div class="span4" style="margin-left:0;">
		<p style="text-align:justify;font-family: 'FrutigerLT';">Startup Jobs Asia was "brewing" yet recognizing the challenges of Talent Acquisition 
		that Startups faced both in Singapore and within Asia. We have identified the in-between 
		gaps and aim to drive through them to bridge the gaps narrower as we move forward.</p>

		<p style="text-align:justify;font-family: 'FrutigerLT';">We aim to to create a better leverage and platform for Startup Hire in Asia and help connect 
		the right talent fit within their growing and emerging business.</p>  
</div>
<div class="span4">
		<p style="text-align:justify;font-family: 'FrutigerLT';">We want to "sexify jobs @ startups and to grow the human capital eco-system for startup." 
		in short we want to be the voice for startup hire within asia.</p>
		</div>
		</div>

	</div>
</div>