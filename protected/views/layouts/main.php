<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php $this->display_seo(); ?>
<?php error_reporting(E_ALL);?>
<link rel="publisher" href="https://plus.google.com/+StartupjobsAsia "/>
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.startupjobs.asia/feed/" />

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/custom.js"></script>
<?php if(Yii::app()->controller->id=="job" && (Yii::app()->controller->action->id=="submitjob" || Yii::app()->controller->action->id=="update" || Yii::app()->controller->action->id=="repost")): ?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/postjob.js"></script>
<?php endif; ?>
<?php if(Yii::app()->controller->id=="job" && Yii::app()->controller->action->id=="job"): ?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/startupjobs_header.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.bootstrap.wizard.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<?php endif; ?>
<?php if(Yii::app()->controller->id=="user" && Yii::app()->controller->action->id=="profile"): ?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/upload_img.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.form.min.js"></script>
<?php endif; ?>
<?php if(Yii::app()->controller->id=="company" && (Yii::app()->controller->action->id=="view" || Yii::app()->controller->action->id=="company")): ?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/upload_company_img.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.Jcrop.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.form.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.Jcrop.css" />
<?php endif; ?>	
</head>
<body itemscope="itemscope" itemtype="http://schema.org/WebPage">
<div id="MicrosoftTranslatorWidget" style="width: 200px; min-height: 0px; border-color: #3A5770; background-color: #78ADD0; display: none;">
<noscript>
<a href="http://www.microsofttranslator.com/bv.aspx?a=http%3a%2f%2fwww.startupjobs.asia%2f">Translate this page</a>
<br />Powered by <a href="http://www.bing.com/translator">Microsoft® Translator</a>
</noscript>
</div>
<script type="text/javascript">
/* <![CDATA[ */
	setTimeout(function() {
		var s = document.createElement("script");
		s.type = "text/javascript"; 
		s.charset = "UTF-8"; 
		s.src = ((location && location.href && location.href.indexOf('https') == 0) ? "https://ssl.microsofttranslator.com" : "http://www.microsofttranslator.com" ) + "/ajax/v2/widget.aspx?mode=auto&widget=none&from=en&layout=ts"; 
		var p = document.getElementsByTagName('head')[0] || document.documentElement; 
		p.insertBefore(s, p.firstChild);
	}, 0);
/* ]]> */
</script>

<div class="container" id="page">

	<div class="row-fluid">
		<div id="header">

        <?php Yii::app()->bootstrap->register(); ?>
        <?php $this->widget('bootstrap.widgets.TbNavbar', array(
                            'type'=>'', // null or 'inverse'
                            'brand'=>'<img src="'.Yii::app()->request->baseUrl.'/images/suj.png" alt="Startup jobs Asia" style= "width: 120px">',
                            'collapse'=>true, // requires bootstrap-responsive.css
                            'items'=>array(
                                     array(
                                        'class'=>'bootstrap.widgets.TbMenu',
                                        'items'=>array(

        array('label'=>'Deposit Resume', 'url'=>array('/user/depositResume'),'visible'=>Yii::app()->user->isGuest),

		array('label'=>'Update', 'items'=>array(
		array('label'=>'Update Profile', 'url'=>array('/user/edit'),'visible'=>Yii::app()->user->isMember()),
		array('label'=>'Change Password', 'url'=>array('/user/updatePassword/12'),'visible'=>Yii::app()->user->isMember()),
		
		),'visible'=>Yii::app()->user->isMember()),
		
        array('label'=>'Applications', 'url'=>array('/user/application'),'visible'=>Yii::app()->user->isMember()),
        array('label'=>'Profile', 'url'=>array('/user/profile/'.Yii::app()->user->getId()),'visible'=>Yii::app()->user->isMember()),
		
		
        array('label'=>'Dashboard', 'url'=>array('/company/Dashboard'),'visible'=>Yii::app()->user->isCompany()),
		array('label'=>'Post job', 'url'=>array('/job/submitJob'),'visible'=>Yii::app()->user->isCompany()),
		array('label'=>'Manage Jobs', 'url'=>array('/job/manageJobs'),'visible'=>Yii::app()->user->isCompany()),
		array('label'=>'Applications', 'url'=>array('/company/application'),'visible'=>Yii::app()->user->isCompany()),
		
		
		array('label'=>'Profile', 'items'=>array(
									
            array('label'=>'View Profile', 'url'=>array('/company/company/12'),'visible'=>Yii::app()->user->isCompany()),
			array('label'=>'Update Profile', 'url'=>array('/company/update/12'),'visible'=>Yii::app()->user->isCompany()),
            array('label'=>'Update Contact', 'url'=>array('/company/updateStartup/12'),'visible'=>Yii::app()->user->isCompany()),
			array('label'=>'Change Password', 'url'=>array('/company/updatePassword/12'),'visible'=>Yii::app()->user->isCompany()),            
            ),'visible'=>Yii::app()->user->isCompany()),
		//array('label'=>'Featured', 'url'=>array('/company/premium'),'visible'=>Yii::app()->user->isCompany()),	
			
	
		array('label'=>'DashBoard', 'url'=>array('/admin/manage'),'visible'=>Yii::app()->user->isAdmin()),
        array('label'=>'Startups', 'url'=>array('/admin/startup'),'visible'=>Yii::app()->user->isAdmin()),
        array('label'=>'Users', 'url'=>array('/admin/user'),'visible'=>Yii::app()->user->isAdmin()),
        array('label'=>'Jobs', 'url'=>array('/admin/jobs'),'visible'=>Yii::app()->user->isAdmin()),

			),
            ),
       '<form class="navbar-search pull-left" action="'.Yii::app()->request->baseUrl.'/job/search" method = "get"><input type="text" name="q" class="search-query span12" placeholder="Search"></form>',
                            array(
                                    'class'=>'bootstrap.widgets.TbMenu',
                                    'htmlOptions'=>array('class'=>'pull-right'),
                                    'items'=>array(
                                                    
		array('label'=>'Signup', 'url'=>'#', 'items'=>array(
        array('label'=>'Job Seeker', 'url'=>array('/user/registration')),
                    // '---',
        array('label'=>'StartUp', 'url'=>array('/company/registration')),
		
                                                    ),'visible'=>Yii::app()->user->isGuest),

        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                                                    ),
                            ),
                    ),
            )); ?>
 
	<div class="">
		<div id="headerTop">
		<?php //if((Yii::app()->user->isMember()) || (Yii::app()->user->isGuest)): ?>
			<ul class="pull-left nav nav-pills">   
				<li><a href ="<?php echo Yii::app()->request->baseUrl?>/aboutus">ABOUT US</a></li>
				<li><a href ="<?php echo Yii::app()->request->baseUrl?>/testimonial">TESTIMONIAL</a></li>
				<li><a href ="<?php echo Yii::app()->request->baseUrl?>/resources">RESOURCES</a></li>
				<li><a href ="<?php echo Yii::app()->request->baseUrl?>/blognewsroom">MEDIA</a></li>
				<li><a href ="<?php echo Yii::app()->request->baseUrl?>/advisors">ADVISORS</a></li>						
				<li><a href ="<?php echo Yii::app()->request->baseUrl?>/events">EVENTS</a></li>
				<li><a href ="<?php echo Yii::app()->request->baseUrl?>/connect-with-us">CONNECT</a></li>
			</ul>
		<?php //endif; ?>
			
<?php
	
	$this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
	'htmlOptions'=>array('class'=>'pull-right'),
    'items'=>array(

         array('label'=>'DEPOSIT RESUME', 'url'=>array('/user/depositResume'),'visible'=>Yii::app()->user->isGuest),
         array('label'=>'SIGN UP', 'items'=>array(
            array('label'=>'Job Seeker', 'url'=>array('/user/registration'),'visible'=>Yii::app()->user->isGuest),
            array('label'=>'StartUP', 'url'=>array('/company/registration'),'visible'=>Yii::app()->user->isGuest),            
            ),'visible'=>Yii::app()->user->isGuest),
	

        
        
        //array('label'=>'Job Search', 'url'=>array('/job/jobSearch'),'visible'=>Yii::app()->user->isMember()),
		array('label'=>'My Profile', 'url'=>array('/user/profile/'.Yii::app()->user->getId()),'visible'=>Yii::app()->user->isMember()),
		array('label'=>'My Applications', 'url'=>array('/user/application'),'visible'=>Yii::app()->user->isMember()),
		array('label'=>'Update', 'items'=>array(
			array('label'=>'Edit Profile', 'url'=>array('/user/edit/1'),'visible'=>Yii::app()->user->isMember()),
			array('label'=>'Change Password', 'url'=>array('/user/updatePassword/1'),'visible'=>Yii::app()->user->isMember()),
			//array('label'=>'Privacy Settings', 'url'=>array('/user/updatePassword/1'),'visible'=>Yii::app()->user->isMember()),
		),'visible'=>Yii::app()->user->isMember()),
 //       array('label'=>'Profile', 'url'=>array('/company/company/12'),'visible'=>Yii::app()->user->isCompany()),
 //       array('label'=>'Update Profile', 'url'=>array('/company/update/12'),'visible'=>Yii::app()->user->isCompany()),
//		array('label'=>'Update User', 'url'=>array('/company/updateStartup/12'),'visible'=>Yii::app()->user->isCompany()),


        array('label'=>'Dashboard', 'url'=>array('/company/Dashboard'),'visible'=>Yii::app()->user->isCompany()),
		array('label'=>'Post job', 'url'=>array('/job/submitJob'),'visible'=>Yii::app()->user->isCompany()),
		array('label'=>'Manage Jobs', 'url'=>array('/job/manageJobs'),'visible'=>Yii::app()->user->isCompany()),
		array('label'=>'Applications', 'url'=>array('/company/application'),'visible'=>Yii::app()->user->isCompany()),
		array('label'=>'Profile', 'items'=>array(
            array('label'=>'View Profile', 'url'=>array('/company/company/12'),'visible'=>Yii::app()->user->isCompany()),
			array('label'=>'Update Profile', 'url'=>array('/company/update/12'),'visible'=>Yii::app()->user->isCompany()),
            array('label'=>'Update Contact', 'url'=>array('/company/updateStartup/12'),'visible'=>Yii::app()->user->isCompany()),
			array('label'=>'Change Password', 'url'=>array('/company/updatePassword/12'),'visible'=>Yii::app()->user->isCompany()),            
            ),'visible'=>Yii::app()->user->isCompany()),
		//array('label'=>'Featured', 'url'=>array('/company/premium'),'visible'=>Yii::app()->user->isCompany()),	
			
			
			
        array('label'=>'DashBoard', 'url'=>array('/admin/manage'),'visible'=>Yii::app()->user->isAdmin()),
        array('label'=>'Startups', 'url'=>array('/admin/startup'),'visible'=>Yii::app()->user->isAdmin()),
        array('label'=>'Users', 'url'=>array('/admin/user'),'visible'=>Yii::app()->user->isAdmin()),
        array('label'=>'Jobs', 'url'=>array('/admin/jobs'),'visible'=>Yii::app()->user->isAdmin()),
        
        

		//array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),

        array('label'=>'LOGIN', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
        array('label'=>'LOGOUT ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>true),		
			),

			
		));
?>
		</div>
	</div>
	<div class="topHeader clear" itemscope="itemscope" itemtype="http://schema.org/Organization">
	<span class="site-title" itemprop="name">
		<a href="<?php echo globals::site_url ?>" itemprop="url" title="Startup Jobs Asia">
			<img itemprop="logo" src="http://startupjobs.asia/wp-content/uploads/company_logos/2012/12/StartupJobsAsia_Asia_Logo-300x56.png" class="SiteLogo" alt="Startup jobs asia">
		</a>
	</span>
	
	<?php if((Yii::app()->user->isMember()) || (Yii::app()->user->isGuest)): ?>

	<ul class="nav nav-pills" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
        <li><a href ="<?php echo Yii::app()->request->baseUrl?>/site/latest">Latest Jobs</a></li>
		<li><a href ="<?php echo Yii::app()->request->baseUrl?>/site/fulltime">Full Time</a></li>
		<li><a href ="<?php echo Yii::app()->request->baseUrl?>/site/contract">Contract</a></li>
		<li><a href ="<?php echo Yii::app()->request->baseUrl?>/site/temporary">Temporary</a></li>		
		<li><a href ="<?php echo Yii::app()->request->baseUrl?>/site/parttime">Part Time</a></li>        
		<li><a href ="<?php echo Yii::app()->request->baseUrl?>/site/internship">Internship</a></li>
		<li><a href ="<?php echo Yii::app()->request->baseUrl?>/site/freelance">Freelance</a></li>		
		<li><a href ="<?php echo Yii::app()->request->baseUrl?>/site/cofounder">Co-Founder</a></li>
    </ul>
	
	<?php endif; ?>

	</div><!-- topHeader -->


 
	 <?php 
	 /*
		if(isset($this->breadcrumbs)):
				    
			$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
									'links'=>$this->breadcrumbs,
								));
		endif; 
		*/
		?>


<?php if(!Yii::app()->user->isAdmin() && !Yii::app()->user->isCompany()): ?>
	
<div class="topSearchFrom">
	<form id="searchform" method="get" action="<?php echo globals::site_url ?>/job/search">
		<div class="search-wrap">
			<div class="input-container">
			<select name="w" class="joborstartup">
			<option value="jobs" <?php echo ($_GET['w']=="jobs") ? 'selected' : ''; ?>>Jobs</option>
			<option value="startups" <?php echo ($_GET['w']=="startups") ? 'selected' : ''; ?>>Startups</option>
			</select>
			<?php
			$keyword = '';
			if(isset($_GET['q'])){
				$keyword = $_GET['q'];
				$keyword = "value=\"$keyword\"";
			}			
			?>

			<input id="search" class="navbar-text" <?php echo $keyword; ?>  type="text" placeholder="Job Keywords" name="q">


			<select id="near" name="l" class="joblocation nav-bar-drop-down">
			<option value="Anywhere" <?php echo ($_GET['l']=="Anywhere" || $_GET['location']=="Anywhere") ? 'selected' : ''; ?>>Anywhere</option>
			<option value="Singapore" <?php echo ($_GET['l']=="Singapore" || $_GET['location']=="Singapore") ? 'selected' : ''; ?>>Singapore</option>
			<option value="Malaysia" <?php echo ($_GET['l']=="Malaysia" || $_GET['location']=="Malaysia") ? 'selected' : ''; ?>>Malaysia</option>
			<option value="Thailand" <?php echo ($_GET['l']=="Thailand" || $_GET['location']=="Thailand") ? 'selected' : ''; ?>>Thailand</option>
			<option value="Indonesia" <?php echo ($_GET['l']=="Indonesia" || $_GET['location']=="Indonesia") ? 'selected' : ''; ?>>Indonesia</option>
			<option value="China" <?php echo ($_GET['l']=="China" || $_GET['location']=="China") ? 'selected' : ''; ?>>China</option>
			<option value="Hong-Kong" <?php echo ($_GET['l']=="Hong-Kong" || $_GET['location']=="Hong-Kong") ? 'selected' : ''; ?>>Hong Kong</option>
			<option value="Taiwan" <?php echo ($_GET['l']=="Taiwan" || $_GET['location']=="Taiwan") ? 'selected' : ''; ?>>Taiwan</option>
			<option value="Japan" <?php echo ($_GET['l']=="Japan" || $_GET['location']=="Japan") ? 'selected' : ''; ?>>Japan</option>
			<option value="Korea" <?php echo ($_GET['l']=="Korea" || $_GET['location']=="Korea") ? 'selected' : ''; ?>>Korea</option>
			<option value="Vietnam" <?php echo ($_GET['l']=="Vietnam" || $_GET['location']=="Vietnam") ? 'selected' : ''; ?>>Vietnam</option>
			<option value="Philippines" <?php echo ($_GET['l']=="Philippines" || $_GET['location']=="Philippines") ? 'selected' : ''; ?>>Philippines</option>
			<option value="India" <?php echo ($_GET['l']=="India" || $_GET['location']=="India") ? 'selected' : ''; ?>>India</option>
			<option value="Nepal" <?php echo ($_GET['l']=="Nepal" || $_GET['location']=="Nepal") ? 'selected' : ''; ?>>Nepal</option>
			</select>


			<select name="t" class="jobtype">
			<option value="any" <?php echo ($_GET['t']=="any") ? 'selected' : ''; ?>>Any type</option>
			<option value="Full-time" <?php echo ($_GET['t']=="Full-time" || (Yii::app()->controller->id=="site" && Yii::app()->controller->action->id=="fulltime")) ? 'selected' : ''; ?>>Full Time</option>
			<option value="Part-time" <?php echo ($_GET['t']=="Part-time" || (Yii::app()->controller->id=="site" && Yii::app()->controller->action->id=="parttime")) ? 'selected' : ''; ?>>Part Time</option>
			<option value="Temporary" <?php echo ($_GET['t']=="Temporary" || (Yii::app()->controller->id=="site" && Yii::app()->controller->action->id=="temporary")) ? 'selected' : ''; ?>>Temporary</option>
			<option value="Internship" <?php echo ($_GET['t']=="Internship" || (Yii::app()->controller->id=="site" && Yii::app()->controller->action->id=="internship")) ? 'selected' : ''; ?>>Internship</option>
			<option value="Freelance" <?php echo ($_GET['t']=="Freelance" || (Yii::app()->controller->id=="site" && Yii::app()->controller->action->id=="freelance")) ? 'selected' : ''; ?>>Freelance</option>
			<option value="Contract" <?php echo ($_GET['t']=="Contract" || (Yii::app()->controller->id=="site" && Yii::app()->controller->action->id=="contract")) ? 'selected' : ''; ?>>Contract</option>
			<option value="Co-Founder" <?php echo ($_GET['t']=="Co-Founder" || (Yii::app()->controller->id=="site" && Yii::app()->controller->action->id=="cofounder")) ? 'selected' : ''; ?>>Co-Founder</option>
			</select>

			<button id="search" class="btn btn-success submit" style="margin-bottom: 10px;" title="Search" type="submit">Search</button>

			</div>
		</div>
	</form>
</div>

<?php endif; ?>
		</div> <!-- header -->
	</div><!-- row-fluid -->

	<div class="row-fluid">
	<?php echo $content; ?>

		
		
		
	</div>

	<div class="clear"></div>

	
	<div class="row-fluid">
		<div id="footer">
			<div>
				<small>Copyright &copy; <?php echo date('Y'); ?> by  Startup Jobs Asia. All Rights Reserved.</small>
			</div>

		</div><!-- footer -->
	</div>
<?php if((Yii::app()->user->isMember()) || (Yii::app()->user->isGuest)): ?>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-37616134-1']);
  _gaq.push(['_setDomainName', 'startupjobs.asia']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<?php endif; ?>

<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "b824f821-ae9e-43bc-a63f-7f65b2405fe7", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
</body>
</html>