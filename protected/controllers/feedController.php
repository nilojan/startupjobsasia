<?php

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
                  'actions'=>array('FullTime','PartTime','Internship','Freelance','Temporary','Startup','Company'),
                  'users'=>array('*'),  
                 ),
            
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	  
   
	 
	public function actionFullTime()
	{
		$model = job::model()->findAll('type=:type',array('type'=>'Full-time'));

		
		$this->layout = "xml.php";
		$this->render("categories",array('model'=>$model));
	}
	public function actionPartTime()
	{
		$model = job::model()->findAll('type=:type',array('type'=>'Part-time'));

		
		$this->layout = "xml.php";
		$this->render("categories",array('model'=>$model));
	}
	public function actionInternship()
	{
		$model = job::model()->findAll('type=:type',array('type'=>'Internship'));

		
		$this->layout = "xml.php";
		$this->render("categories",array('model'=>$model));
	}
	public function actionFreelance()
	{
		$model = job::model()->findAll('type=:type',array('type'=>'Freelance'));

		
		$this->layout = "xml.php";
		$this->render("categories",array('model'=>$model));
	}
	public function actionTemporary()
	{
		$model = job::model()->findAll('type=:type',array('type'=>'Temporary'));

		
		$this->layout = "xml.php";
		$this->render("categories",array('model'=>$model));
	}
	public function actionCompany()
	{
		$user= company::model()->find('ID=:ID',array(':ID'=>Yii::app()->user->getID()));
		
		$model = job::model()->findAll('CID=:CID',array(':CID'=> $user->CID));
		
		$this->layout ='xml.php';
		$this->render('job',array('model'=>$model));
	}
	public function actionStartup()
	{
		$model = company::model()->findAll();
		$imgpath =Yii::app()->getBaseUrl(true).'/images/company/';
		
		$this->layout = "xml.php";
		$this->render("startups",array('model'=>$model,'imgpath'=>$imgpath));
	}

}