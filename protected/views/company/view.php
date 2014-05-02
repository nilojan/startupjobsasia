<?php
 /*echo $company->themecolor;
 die;*/

$this->breadcrumbs = array(
    "{$company->cname} {$company->location}",
);
$this->pageTitle = "Startup Jobs with {$company->cname} {$company->location}";
$this->pageDesc = $company->mission;
$this->pageOgTitle = "Startup Jobs with {$company->cname} {$company->location}";
$this->pageOgDesc= $company->mission;
$this->pageOgImage=''.Yii::app()->getBaseUrl(true).'/images/company/400/'.$company->image;
$this->pageCanonical = "http://".$_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; // canonical URLs should always be absolute
$this->pageSiteName = "Start up Jobs Asia";
$this->pageAuthor = $company->cname;
?>
<script>
<?php if($company->coverpicture != ''):  ?>
$(window).load(function() {
	$("html, body").animate({ scrollTop: 350 }, 500);
});
<?php endif; ?>
var suj_url = '<?php echo $this->createUrl('company/color'); ?>';
var c_colorr = '<?php echo $company->themecolor; ?>';
</script>
<style type="text/css">
.outputt
{
	<?php if($company->coverpicture != '') { ?>
    height: 250px;
	background-image:url("<?php echo Yii::app()->request->baseUrl.'/images/cover/'.$company->coverpicture; ?>");	
	<?php }else{  ?>
	height: 50px;
	<?php } ?>
    background-color: transparent;
    background-position: center center;
    background-repeat: no-repeat;
    margin-top: 0;
	border-top:2px solid #F97C30;
	background-size: 100%;
	<?php echo (Yii::app()->user->isCompany()!='') ? "display:none" : ""; ?>
} 
#cropbox {
    background-color: #ccc;
    display: block;
  }
</style>

<?php if((Yii::app()->user->isCompany()) && (Yii::app()->user->getID()) && (Yii::app()->user->getID()==$company->ID)){ ?>
<div id="style-switcher" style="display:none">
    <div class="theme_select">
        <div id='btn' class="close_btn">&nbsp;</div>
        <div class="content_box">
            <h3>Style Switcher</h3>
            <input class="input" type='text' id='full' />
        </div>
    </div>
</div>
<script type="text/javascript">
  // this script executes when click on upload images link
    function uploadCoverImage() {
        $("#cover_image").click();
        return false;
}
</script>
<?php
	$company->coverpicture = ($company->coverpicture == '') ? "coversuj.jpg" : $company->coverpicture;

	$CoverImg = '<img src='.Yii::app()->request->baseUrl.'/images/cover/'. $company->coverpicture.' style= "z-index: -999;width:1200px; float:left; border:0px;" />';
	?>
	
<form name="form" method="POST" id="imgUpldCover" enctype="multipart/form-data">
<div style="display: none;">
		<input  name="cover_image" onSubmit="return false" id="cover_image" type="file" />
</div>
<div class="getoutCoverimg">
       <a href="" onclick="return uploadCoverImage();"><?php echo $CoverImg; ?></a> <!-- Image link to select imag -->

</div>
</form>
<div id="output"></div>
<?php }else{

echo "<div class =\"outputt\"></div>";

} ?>
<div class="row-fluid">
<?php if($company->coverpicture != '') { ?>
	<div class="span8" style="text-align:right;margin-top:-99px;">
<?php }else{ ?>
	<div class="span8" style="text-align:right;margin-top:0px;">
<?php } ?>
		<div class="span5" style="display:none;float:right;background:#F97C30;color:#fff;padding:10px;margin-left:15px;">
		 <?php $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
																	   'order'=>'t.created DESC',
																	   // show all jobs that are not expired
																		'with'=>array('company'),
																		'condition'=>'expire >= :today AND company.CID=:CID and t.status=1',
																		'params'=>array('today'=>date('Y-m-d H:i:s'),':CID'=>$company->CID),    
																		),
																		'pagination'=>array('pageSize'=>15),
													)); ?>

				<div style="font-size: 190px;line-height: 147px;text-align: center;"><?php echo $dataProvider->totalItemCount ?></div>
				<div style="text-align:center;">OPPORTUNITIES</div>
		</div>
	 
			<div class="span4 StartupLogo">
			<?php	
			$fbpage = $company->facebook;
			$twitter = $company->twitter;
			if (preg_match("#https?://#", $company->website) === 0) {
				$company->website = 'http://'.$company->website;
			}
			if (preg_match("#https?://#", $company->facebook) === 0) {
				$company->facebook = 'http://'.$company->facebook;
			}
			if (preg_match("#https?://#", $company->twitter) === 0) {
				$company->twitter = 'http://'.$company->twitter;
			}
			?>	
			<a href="<?php echo $company->website; ?>" target="_blank">
			 <?php
				$default_image = 'startup_default.jpg';
				$img_url = Yii::app()->getBaseUrl(true).'/images/company/400/'. $company->image; 
				 $file_headers = @get_headers($img_url);
				if(($file_headers[0] == 'HTTP/1.1 404 Not Found') || ($file_headers[0] == 'HTTP/1.0 404 Not Found') || ($company->image == '')) {
					$img_url = Yii::app()->request->baseUrl.'/images/company/'. $default_image; 
					echo '<img src="'.$img_url.'" class="JobLogo" alt="Startup Jobs Asia">';
				}
				else {
					echo '<img src="'.$img_url.'" class="JobLogo" alt="'.$company->cname.' on Startup Jobs Asia">';
				}

			 ?></a>
			 </div>
		
	 <div class="span11" id="clear" style="text-align:left;float:left;margin-top:15px;">
      
        <h1 style="display:none;"><?php echo CHtml::encode($company->cname); ?> on Startup Jobs Asia</h1>

			<div style="display:none;">
			
			<p style="text-align:justify;font-family: 'FrutigerLT';"><?php echo str_replace('</br>',"",$company->address); ?></p>
			
			<?php if($company->privacy == 0) { ?>
			<div style="display:none;">
            <p style="text-align:justify;font-family: 'FrutigerLT';">tel : <a href="tel:<?php echo CHtml::encode($company->contact) ?>"><?php echo CHtml::encode($company->contact) ?></a></p>
			
			<p style="text-align:justify;font-family: 'FrutigerLT';">email : <a href="mailto:<?php echo CHtml::encode($company->cemail) ?>"><?php echo CHtml::encode($company->cemail) ?></a></p>
			</div>
			<?php } ?>
			</div>
                        
				<?php if($company->summary != '') { ?>
				<h3 class="HomeLatestJobs">Summary Info</h3>
                <?php echo nl2br($company->summary) ?>
				<?php } ?>

				<?php if($company->mission != '') { ?>
				<h3 class="HomeLatestJobs">Our Mission </h3>
                <?php echo nl2br($company->mission) ?>
				<?php } ?>


				<?php if($company->culture != '') { ?>
				<h3 class="HomeLatestJobs">Our Culture </h3>
                <?php echo nl2br($company->culture) ?>
				<?php } ?>

				<?php if($company->benefits != '') { ?>
				<h3 class="HomeLatestJobs">Benefits </h3>
                <?php echo nl2br($company->benefits) ?>
				<?php } ?>

				<?php if($company->awards != '') { ?>
				<h3 class="HomeLatestJobs">Awards </h3>
                <?php echo nl2br($company->awards) ?>
				<?php } ?>
				
		</div><!-- span11 startup contents end-->
	</div><!-- span8 left area end-->
	<div class="span4">
	
		<div class="span12 SocialLeft clear" style="padding:5px 0">	

	<?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
	<?php $actual_link = urlencode($actual_link); ?>
	
	<!--<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $actual_link; ?>" target="_blank">
		<div class="Facebook"></div>
	</a>
	
	<a href="https://twitter.com/share?url=<?php echo $actual_link; ?>&via=StartupJobsAsia" target="_blank">
		<div class="Twitter"></div>
	</a>	
	
	
	<a href="https://plus.google.com/share?url=<?php echo $actual_link; ?>" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
	<div class="GPlus"></div>
	</a>
  
  
 	<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $actual_link; ?>" target="_blank">	
		<div class="LinkedIn"></div>
	</a>-->
	
	
			<span class='st_fblike_large' displayText='Facebook Like'></span>
		<span class='st_facebook_large' displayText='Facebook'></span>
		<span class='st_googleplus_large' displayText='Google +'></span>
		<span class='st_twitter_large' displayText='Tweet'></span>
		<span class='st_linkedin_large' displayText='LinkedIn'></span>
		<span class='st_email_large' displayText='Email'></span>
		<span class='st_sharethis_large' displayText='ShareThis'></span>
		
	</div>
	
	
		<div class="span12" style="<?php echo $dataProvider->totalItemCount == 0?'display:none;':''; ?>border:3px solid #F97C30; text-align: left; padding: 10px;margin:10px 0px 0px 0px;">
			
			 <div style="text-align:left;background:#F97C30;color:#fff;padding:10px;"><?php echo $dataProvider->totalItemCount ?> OPPORTUNITIES with <?php echo CHtml::encode($company->cname); ?></div>
	 
			<div style="margin-left:15px;">
													
			<?php     
				 $this->widget('bootstrap.widgets.TbListView', array(
				'dataProvider'=>$dataProvider,
				'itemView'=>'_jobView',   // refers to the partial view named '_post'

				));
				?>
			</div>
		</div>
		
		<?php if($fbpage != ''): ?>			
			<div class="span12" style="<?php //echo $dataProvider->totalItemCount == 0?'display:block;':'display:none;'; ?>border:3px solid #F97C30; text-align: left; padding: 10px;margin-top:10px;margin-left: 0;">		
					<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=597621436960848";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>

			<div class="fb-like-box" data-href="<?php echo $company->facebook; ?>" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="true" data-width="340px" data-show-border="true"></div>

			</div>
		<?php endif; ?>


		<?php if($twitter != ''): ?>			
		<div class="span12" style="<?php //echo $dataProvider->totalItemCount == 0?'display:block;':'display:none;'; ?>border:3px solid #F97C30; text-align: left; padding: 10px;margin-top:10px;margin-left: 0;display:none;">	
			
		<a class="twitter-timeline" href="https://twitter.com/<?php echo $company->twitter; ?>" data-widget-id="421258658740068352">Tweets by @<?php echo $company->twitter; ?></a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>
		<?php endif; ?>	

	
	</div><!-- span4 end-->
</div><!-- row fluid end-->
<?php if($company->coverpicture != ''):  ?>
<script>
$(window).load(function() {
	$("html, body").animate({ scrollTop: 320 }, 500);
});
</script>
<?php endif; ?>