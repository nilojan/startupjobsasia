<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css" />
<meta charset="UTF-8">
<?php $this->display_seo(); ?>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/startupjobs_header.js"></script>

</head>
<body>

<div class="container" id="page">

	<div id="header">

        <?php Yii::app()->bootstrap->register(); ?>
        <?php $this->widget('bootstrap.widgets.TbNavbar', array(
                            'type'=>'', // null or 'inverse'
                            'brand'=>'<img src="'.Yii::app()->request->baseUrl.'/images/suj.png" style= "width: 120px">',
                            'collapse'=>true, // requires bootstrap-responsive.css
                            'items'=>array(
                                     array(
                                        'class'=>'bootstrap.widgets.TbMenu',
                                        'items'=>array(
                                                        // array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
                                                        //array('label'=>'Contact', 'url'=>array('/site/contact')),
                                                        //array('label'=>'Register', 'url'=>array('/registration/registration')),
                                                        //array('label'=>'Jobs', 'url'=>array('/job/all')),
                                                        array('label'=>'User Registration', 'url'=>array('/registration/registration1'),'visible'=>Yii::app()->user->isGuest),
                                                        array('label'=>'Register Company', 'url'=>array('/registration/registerCompany'),'visible'=>Yii::app()->user->isMember()),
                                                        array('label'=>'Submit a job', 'url'=>array('/job/submitJob'),'visible'=>Yii::app()->user->isCompany()),
                                                        array('label'=>'Update Profile', 'url'=>array('/user/edit'),'visible'=>Yii::app()->user->isMember()),
                                                        array('label'=>'Company', 'url'=>array('/company/company'),'visible'=>Yii::app()->user->isCompany()),
                                                        array('label'=>'Update Profile', 'url'=>array('/company/update'),'visible'=>Yii::app()->user->isCompany()),
                                                        array('label'=>'Manage', 'url'=>array('/admin/manage'),'visible'=>Yii::app()->user->isAdmin()),
                                                        array('label'=>'Manage Jobs', 'url'=>array('/job/manageJobs'),'visible'=>Yii::app()->user->isCompany()),
                                                        array('label'=>'Applications', 'url'=>array('/company/application'),'visible'=>Yii::app()->user->isCompany()),
                                                        array('label'=>'Applications', 'url'=>array('/user/application'),'visible'=>Yii::app()->user->isMember()),
                                                        array('label'=>'Profile', 'url'=>array('/user/profile/'.Yii::app()->user->getId()),'visible'=>Yii::app()->user->isMember()),
                                                     
                                                        //   array('label'=>'Upgrade', 'url'=>array('/company/upgrade'),'visible'=>Yii::app()->user->isCompany()),
                                                      ),
                                    ),
                            '<form class="navbar-search pull-left" action="'.Yii::app()->request->baseUrl.'/job/search" method = "get"><input type="text" name="q" class="search-query span2" placeholder="Search"></form>',
                            array(
                                    'class'=>'bootstrap.widgets.TbMenu',
                                    'htmlOptions'=>array('class'=>'pull-right'),
                                    'items'=>array(
                                                    array('label'=>'Register', 'url'=>'#', 'items'=>array(
                                                            array('label'=>'A User', 'url'=>array('/user/registration')),
                                                            '---',
                                                            array('label'=>'A StartUp', 'url'=>'#'),
                                                    )),
                                                    array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                                                    array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                                                    ),
                            ),
                    ),
            )); ?>
 

	<div class="topHeader">
		<a href="<?php echo Yii::app()->request->baseUrl;?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/suj.png" style= "width: 320px"></a>	

	<?php $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'pills', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
       // array('label'=>'SIGN UP', 'url'=>array('/registration/registration'),'visible'=>Yii::app()->user->isGuest),
         array('label'=>'SIGN UP', 'items'=>array(
            array('label'=>'User', 'url'=>array('/user/registration')),
            array('label'=>'Employee', 'url'=>array('/employee/register')),            
            ),'visible'=>Yii::app()->user->isGuest),
		//array('label'=>'Deposit Resume', 'url'=>array('/site/depositResume'),'visible'=>Yii::app()->user->isGuest()),
        //array('label'=>'Register Company', 'url'=>array('/registration/registerCompany'),'visible'=>Yii::app()->user->isMember()),
        array('label'=>'Submit a job', 'url'=>array('/job/submitJob'),'visible'=>Yii::app()->user->isCompany()),
        array('label'=>'Edit Profile', 'url'=>array('/user/edit'),'visible'=>Yii::app()->user->isMember()),
        array('label'=>'Company', 'url'=>array('/company/company'),'visible'=>Yii::app()->user->isCompany()),
        array('label'=>'Update Profile', 'url'=>array('/company/update'),'visible'=>Yii::app()->user->isCompany()),
        array('label'=>'Manage', 'url'=>array('/admin/manage'),'visible'=>Yii::app()->user->isAdmin()),
        array('label'=>'Manage Jobs', 'url'=>array('/job/manageJobs'),'visible'=>Yii::app()->user->isCompany()),
        array('label'=>'Applications', 'url'=>array('/company/application'),'visible'=>Yii::app()->user->isCompany()),
        array('label'=>'Applications', 'url'=>array('/user/application'),'visible'=>Yii::app()->user->isMember()),
        array('label'=>'Profile', 'url'=>array('/user/profile/'.Yii::app()->user->getId()),'visible'=>Yii::app()->user->isMember()),
		//array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),

        array('label'=>'LOGIN', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
        array('label'=>'LOGOUT ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest, 'active'=>true),		
    ),
)); ?>
	</div>


	<ul class="nav nav-pills">
        <li><a href ="<?php echo Yii::app()->request->baseUrl?>/site/latest">Latest</a></li>
		<li><a href ="<?php echo Yii::app()->request->baseUrl?>/site/fullTime">Full Time</a></li>
		<li><a href ="<?php echo Yii::app()->request->baseUrl?>/site/partTime">Part Time</a></li>
        <li><a href ="<?php echo Yii::app()->request->baseUrl?>/site/freelance">Freelance</a></li>
		<li><a href ="<?php echo Yii::app()->request->baseUrl?>/site/internship">Internship</a></li>
		<li><a href ="<?php echo Yii::app()->request->baseUrl?>/site/Temporary">Temporary</a></li>
    </ul>
	

 
 <?php if(isset($this->breadcrumbs)):?>
               <?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                                'links'=>$this->breadcrumbs,
                )); ?>
<?php endif?>




</div>
<?php echo $content; ?>

<div class="clear"></div>

    <div id="footer">
	<ul class="nav nav-pills">    
		<li><a href ="<?php echo Yii::app()->request->baseUrl?>/site/page/view/about"> ABOUT US </a></li>
		<li><a href ="<?php echo Yii::app()->request->baseUrl?>/site/page/view/advisors">ADVISORS</a></li>
        <li><a href ="<?php echo Yii::app()->request->baseUrl?>/site/page/view/testimonials">TESTIMONIAL</a></li>
        <li><a href ="<?php echo Yii::app()->request->baseUrl?>/site/page/view/blog">BLOG</a></li>
        
        <li><a>EVENTS</a></li>
        <li><a>PRESS RELEASE</a></li>
        <li><a href ="<?php echo Yii::app()->request->baseUrl?>/site/contact">CONNECT</a></li>
    </ul>
	<div><small>Copyright &copy; <?php echo date('Y'); ?> by  Startup Jobs Asia. All Rights Reserved.</small></div>

	</div><!-- footer -->
	</body>
</html>
