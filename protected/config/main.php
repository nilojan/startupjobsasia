<?php
include("dbconfig.php");
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
Yii::setPathOfAlias('paypal', dirname(__FILE__).'/../extensions/paypal');
//Yii::setPathOfAlias('editable', dirname(__FILE__).'/../extensions/x-editable');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.


return array(
	
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Startup Jobs Asia',
        
	// preloading 'log' component
	'preload'=>array('log'),
        

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
               // 'application.extensions.yii-mail.*',
                'application.helpers.*',
				'application.extensions.imperavi-redactor.ImperaviRedactorWidget',
				'application.extensions.easyPaypal.*',
				'ext.YiiMailer.YiiMailer',
               // 'editable.*',
				//'ext.EDataTables.*',
               // 'application.modules.PcViewsCounter.*',
		       // 'application.modules.PcViewsCounter.models.*',
		      //  'application.modules.PcViewsCounter.controllers.*',
		      ///  'application.modules.PcViewsCounter.components.*',
		      //  'application.modules.PcViewsCounter.extensions.ViewsCountWidget.*',
               
            ),

   
       // 'theme'=>'bootstrap', // requires you to copy the theme under your themes directory
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		/*
			'gii'=>array(
		
                'generatorPaths'=>array(
                	'bootstrap.gii',
                 ),
           
            'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			//'ipFilters'=>array('127.0.0.1','::1'),
			),
		*/
		/*
			'contentViewsCounter' => array(
           			'class' => 'application.modules.PcViewsCounter.PcViewsCounterModule',
       		 ),
		*/	 
		/*'payPal'=>array(
			'env'=>'sandbox',
			'account'=>array(
				'username'=>'tamilnilo-facilitator_api1.gmail.com',
				'password'=>'1370868718',
				'signature'=>'At.8WFjicwkSqrcV9gGhYiblkBz4AlVmR0O5Ff5T07tDh--84I2.VuTT',
				'email'=>'tamilnilo-facilitator@gmail.com',
				'identityToken'=>'BcxTQ1ohRQvULOtEi502DV3Hg7Vv0KaZSoVkndjbdND6Uoqkmhl5dNfV1oy',
			),
			'components'=>array(
				'buttonManager'=>array(
					//'class'=>'payPal.components.PPDbButtonManager'
					'class'=>'payPal.components.PPPhpButtonManager',
				 ),
			),
		),		*/
	),
							
	// application components
	'components'=>array(
		'widgetFactory' => array(
			'widgets' => array(
				'YiiSelectize' => array(
					'defaultOptions' => array(
						'create' => false,
					),
				),
			),
		),
		'user'=>array(
			// enable cookie-based authentication
			 'class'=>'WebUser',
              'allowAutoLogin'=>true,
		),
                'bootstrap'=>array(
                'class'=>'bootstrap.components.Bootstrap',
                
                 ),

       /*     'editable' => array(
            'class'     => 'editable.EditableConfig',
            'form'      => 'bootstrap',        //form style: 'bootstrap', 'jqueryui', 'plain' 
            'mode'      => 'inline',            //mode: 'popup' or 'inline'  
            'defaults'  => array(              //default settings for all editable elements
               'emptytext' => 'Pending'
            )
        	),        
		*/
            'mail' => array(
			    'class' => 'ext.yii-mail.YiiMail',
			     'transportType'=>'smtp',
			     'transportOptions'=>array(
					'host'=>'smtp.gmail.com',
					'username'=>'inspiredwearntu@gmail.com',
					// or email@googleappsdomain.com
					'password'=>'2011inspiredwear',
					'port'=>'465',
					'encryption'=>'ssl',
			     	),
			    'viewPath' => 'application.views.mail',
			    'logging' => true,
			    'dryRun' => false
			), 

		// uncomment the following to enable URLs in path-format
		'image'=>array(
                            'class'=>'application.extensions.image.CImageComponent',
                            // GD or ImageMagick
                            'driver'=>'GD',
                            // ImageMagick setup path
                            'params'=>array('directory'=>'/opt/local/bin'),
                ),
            
                'Paypal' => array(
                            'class'=>'paypal.components.Paypal',
                         //   'apiUsername' => 'tamilnilo-facilitator_api1.gmail.com',
                        //    'apiPassword' => '1370868718',
                        //    'apiSignature' => 'At.8WFjicwkSqrcV9gGhYiblkBz4AlVmR0O5Ff5T07tDh--84I2.VuTT',
                        //    'apiLive' => false,
 
                             'apiUsername' => 'payment_api1.startupjobs.asia',
                            'apiPassword' => 'V3NWKAB9DQLTMYU8',
                            'apiSignature' => 'A8HURf2Xu4TL8J-s8kexgHMqwHaSABQejSmdc0dILJZ9v3vRDK81baA6',
                            'apiLive' => true,


							'returnUrl' => 'pay/confirmPayment', //regardless of url management component
                            'cancelUrl' => 'job/manageJobs', //regardless of url management component
 
                            // Default currency to use, if not set USD is the default
                            'currency' => 'USD',
 
                            // Default description to use, defaults to an empty string
                            //'defaultDescription' => '',
 
                            // Default Quantity to use, defaults to 1
                            //'defaultQuantity' => '1',
 
                           //The version of the paypal api to use, defaults to '3.0' (review PayPal documentation to include a valid API version)
                           //'version' => '1.0',
                ),
		'urlManager'=>array(
			'urlFormat'=>'path',
                        'showScriptName'=>false,
						'caseSensitive'=>false,
			'rules'=>array(
				'connect-with-us'=>'site/contact',
				'testimonial'=>'/site/page/view/testimonials',
				'aboutus'=>'/site/page/view/about',
				'resources'=>'/site/page/view/resources',
				'blognewsroom'=>'/site/page/view/blognewsroom',
				'events'=>'/site/page/view/events',
				'advisors'=>'/site/page/view/advisors',
				
				'feed'=>'feed/feed',
				'sitemap.xml'=>'feed/sitemap',
				'job/<id:\d+>'=>'job/job',

				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                               // '<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				//'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                                //'<controller>'=>'<controller:\w+>/<action:\w+>/<id:\d+><title>',
                                '<controller>'=>'<controller:\w+>/<action:\w+>/<JID:\d+>/<title:\w+>',
                                'company'=>'company/<CID:\d+>/title/',
                                //'<controller>/<title>'=>'<controller>/<action>',
				'<controller>'=>'<controller:\w+>/<action:\w+>',
				'http://<CID:\w+>.startupjobs.asia/company/view/CID' => 'company/view/CID',

			),
	/*array(
	        'post/<id:\d+>/<title:.*?>'=>'post/view',
	        'posts/<tag:.*?>'=>'post/index',
	      //  'api/<controller:\w+>/<id:\w+>/<var:\w+>'=>array('<controller>/restView', 'verb'=>'GET'),
	        // REST patterns
	        array('api/list', 'pattern'=>'api/<model:\w+>', 'verb'=>'GET'),
	        array('api/view', 'pattern'=>'api/<model:\w+>/<id:\d+>', 'verb'=>'GET'),
	        array('api/relational', 'pattern'=>'api/<model1:\w+>/<var1:\w+>/<model2:\w+>', 'verb'=>'GET'),

//	        array('api/registerdevice', 'pattern'=>'api/<para:\w+>/<para_appname:\w+>/<para_appversion:\w+>/<para_deviceuid:\w+>/<para_devicetoken:\w+>/<para_devicemodel:\w+>/<para_devicename:\w+>/<para_deviceversion:\w+>/<para_pushbadge:\w+>/<para_pushalert:\w+>/<para_pushsound:\w+>', 'verb'=>'GET'),
	        array('api/registerdevice', 'pattern'=>'api/<action:\w+>', 'verb'=>'POST'),
	        

	        //array('api/register', 'pattern'=>'api/<model1:\w+>/<var1:\w+>/<model2:\w+>/<var2:\w+>/<model3:\w+>', 'verb'=>'GET'),
	        //array('api/login', 'pattern'=>'api/<model:\w+>/<uname:\w+>/<pwd:\w+>', 'verb'=>'GET'),

	        array('api/update', 'pattern'=>'api/<model:\w+>/<id:\d+>', 'verb'=>'PUT'),
	        array('api/delete', 'pattern'=>'api/<model:\w+>/<id:\d+>', 'verb'=>'DELETE'),
	        array('api/create', 'pattern'=>'api/<model:\w+>', 'verb'=>'POST'),
	        // Other controllers
	        '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
	    ),*/
		),
		
		'db'=>array(
	     'connectionString' => 'mysql:host='.global_dbhost.';dbname='.global_dbdatabase.'',
	     'emulatePrepare' => global_emulatePrepare,
	     'username' => global_dbusername,
	     'password' => global_dbpassword,
	     'charset' => global_charset,
	    ),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
				array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning ,trace, info',
                    'categories'=>'system.*',
                ),
				/*
                array(
                    'class'=>'CEmailLogRoute',
                    'levels'=>'error, warning',
                    'emails'=>'nilojan@outlook.com',
                ),
				*/
				
				
			),
		),
	
     //  'mail' => array(
     //   'class' => 'application.extensions.yii-mail.YiiMail',
     //   'transportType'=>'smtp', /// case sensitive!
       /* 'transportOptions'=>array(
            'host'=>'smtp.gmail.com',
            'username'=>'inspiredwearntu@gmail.com',
            // or email@googleappsdomain.com
            'password'=>'2011inspiredwear',
            'port'=>'465',
            'encryption'=>'ssl',
            ),
        * */
        
    //    'viewPath' => 'application.views.mail',
    //    'logging' => true,
    //    'dryRun' => false
   // ),
		
            
      
         ),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
        // global variables
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'nilojan@startupjobs.asia,partners@startupjobs.asia',
                'job_limit'=>'100',
                'job_expire'=>'180',
				'pre_job_expire'=>'30',
                'pageTitle'=>'StartUp Jobs Asia | Startup Hire | Startup Hiring | Startup Recruiting | Startup Jobs | VC Hire | VC Jobs | Work In Startups',
                'pageDescription'=>'We bring great talents to great startups. StartUp Jobs Asia | Startup Hire | Startup Hiring | Startup Recruiting | Startup Jobs | Starup Careers | Startup Career',
                'image'=> "/images/suj.png",
				
                        'PAYPAL_API_USERNAME'=>'nilojan_api1.startupjobs.asia',
                        'PAYPAL_API_PASSWORD'=>'1395842128',
                        'PAYPAL_API_SIGNATURE'=>'AGOM5VcRO5OlPgXyycytnHmiBdetAtrE5y-GPIS1mT-QSU3ifT7YLEuF',
                        'PAYPAL_MODE'=>'sandbox'   // sandbox/live  default=sandbox					
            ),
);