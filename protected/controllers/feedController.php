	<?php
// Importing the Xml Writer class
Yii::import('application.extensions.xmlgenerator.*');
require_once 'xmlgenerator.php';
// declaring this page as an xml file
header ("Content-Type:text/xml");

class FeedController extends Controller
{
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated users to access all actions
              //   'roles'=>array('1','2','0'),
            	 'users' => array('*'),
                ),
            array('allow',
                  'actions'=>array('FullTime'),
                  'users'=>array('*'),  
                 ),
            
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	 
	public function actionFullTime()
	{
		
		

		$xml=new XmlGenerator();
		 // retrieve the latest 20 posts
	    $jobs=job::model()->findAll(array(
	        'order'=>'JID',
	        
	    ));
	    
	    $xml->push('item');
	    $entries=array();
	    foreach($jobs as $job)
	    {	        
	        $xml->push('job', array('id' => $job->JID));
		   /* $xml->element('title', $job->title);
		    $xml->element('description', $job->description);
		    $xml->element('title', $job->title);*/
		    $xml->element('location', $job->location);
		    $xml->pop();
	    }
	    echo "<pre>";
		var_dump($xml);
		$xml->pop();
		
		echo $xml->getXml();
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
