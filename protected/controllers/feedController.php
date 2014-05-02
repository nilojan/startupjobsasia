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
	 /* 
      $dataProvider=new CActiveDataProvider('job', array('criteria'=>array(
                                                                  
                                                                    'order'=>'created DESC',
                                                                    'condition'=>'expire >= :today and t.status=1',
																   // 'condition'=>'t.status=1',
                                                                    'params'=>array(':today'=>date('Y-m-d H:i:s')),
                                                                    ),
                                                                    'pagination'=>array(
                                                                                        'pageSize'=>25,
                                                                    ),
                                                              )); 
															  
        $dataProvider=new CActiveDataProvider('job', array('criteria'=>array(
                                                                    'order'=>'t.created DESC',
                                                                    'condition'=>'expire >= :today AND t.status=1 AND full_time=:type2',
                                                                    'params'=>array('today'=>date('Y-m-d H:i:s'),':type2'=>'Full-time'),
                                                                    ),
                                                                    'pagination'=>array(
                                                                                        'pageSize'=>20,
                                                                    ),
                                                ));
												
	 */
	public function actionFeed()
	{
		$model = job::model()->findAll(array('order'=>'JID DESC LIMIT 0,1000','condition'=>'status=:status','params'=>array(':status'=>'1')));

		$this->layout ='xml.php';
		$this->render('job',array('model'=>$model));
	}
	public function actionIndeed()
	{
		$model = job::model()->findAll(array('order'=>'JID DESC LIMIT 0,1000','condition'=>'status=:status','params'=>array(':status'=>'1')));

		$this->layout ='xml.php';
		$this->render('indeed',array('model'=>$model));
	}
	public function actionSimplyhired()
	{
		$model = job::model()->findAll(array('order'=>'JID DESC LIMIT 0,1100','condition'=>'status=:status','params'=>array(':status'=>'1')));

		$this->layout ='xml.php';
		$this->render('simplyhired',array('model'=>$model));
	}
	public function actionTrovit()
	{
		$model = job::model()->findAll(array('order'=>'JID DESC LIMIT 0,1000','condition'=>'status=:status','params'=>array(':status'=>'1')));

		$this->layout ='xml.php';
		$this->render('trovit',array('model'=>$model));
	}
	public function actionRecruit()
	{
		$model = job::model()->findAll(array('order'=>'JID DESC LIMIT 0,1000','condition'=>'status=:status','params'=>array(':status'=>'1')));

		$this->layout ='xml.php';
		$this->render('recruit',array('model'=>$model));
	}
	public function actionJobrapido()
	{
		$model = job::model()->findAll(array('order'=>'JID DESC LIMIT 0,1000','condition'=>'status=:status','params'=>array(':status'=>'1')));

		$this->layout ='xml.php';
		$this->render('recruit',array('model'=>$model));
	}	
	public function actionJooble()
	{
		$TwentyEightDay = date('Y-m-d H:i:s', strtotime("-28 day"));
	
		$model = job::model()->findAll(array('order'=>'JID DESC LIMIT 0,1000','condition'=>'status=:status AND created >= :twentyeight','params'=>array(':status'=>'1',':twentyeight'=>$TwentyEightDay)));

		$this->layout ='xml.php';
		$this->render('jooble',array('model'=>$model));
	}	
	public function actionLearngood()
	{
		$model = job::model()->findAll(array('order'=>'JID DESC LIMIT 0,1000','condition'=>'status=:status','params'=>array(':status'=>'1')));

		$this->layout ='xml.php';
		$this->render('learngood',array('model'=>$model));
	}	
	public function actionSitemap()
	{
		$model = job::model()->findAll(array('order'=>'JID DESC LIMIT 0,1000','condition'=>'status=:status','params'=>array(':status'=>'1')));

		$this->layout ='xml.php';
		$this->render('sitemap',array('model'=>$model));
	}	
	
// jobs by location

	public function actionLocation()
	{
		if(isset($_GET['singapore'])){
		$model = job::model()->findAll(array('order'=>'JID DESC LIMIT 0,1000','condition'=>'status=:status AND location=:location','params'=>array(':status'=>'1',':location'=>'singapore')));
		}elseif(isset($_GET['malaysia'])){
		$model = job::model()->findAll(array('order'=>'JID DESC LIMIT 0,1000','condition'=>'status=:status AND location=:location','params'=>array(':status'=>'1',':location'=>'malaysia')));		
		}elseif(isset($_GET['thailand'])){
		$model = job::model()->findAll(array('order'=>'JID DESC LIMIT 0,1000','condition'=>'status=:status AND location=:location','params'=>array(':status'=>'1',':location'=>'thailand')));		
		}elseif(isset($_GET['indonesia'])){
		$model = job::model()->findAll(array('order'=>'JID DESC LIMIT 0,1000','condition'=>'status=:status AND location=:location','params'=>array(':status'=>'1',':location'=>'indonesia')));		
		}elseif(isset($_GET['china'])){
		$model = job::model()->findAll(array('order'=>'JID DESC LIMIT 0,1000','condition'=>'status=:status AND location=:location','params'=>array(':status'=>'1',':location'=>'china')));		
		}elseif(isset($_GET['hong-kong'])){
		$model = job::model()->findAll(array('order'=>'JID DESC LIMIT 0,1000','condition'=>'status=:status AND location=:location','params'=>array(':status'=>'1',':location'=>'hong-kong')));		
		}elseif(isset($_GET['taiwan'])){
		$model = job::model()->findAll(array('order'=>'JID DESC LIMIT 0,1000','condition'=>'status=:status AND location=:location','params'=>array(':status'=>'1',':location'=>'taiwan')));		
		}elseif(isset($_GET['japan'])){
		$model = job::model()->findAll(array('order'=>'JID DESC LIMIT 0,1000','condition'=>'status=:status AND location=:location','params'=>array(':status'=>'1',':location'=>'japan')));		
		}elseif(isset($_GET['korea'])){
		$model = job::model()->findAll(array('order'=>'JID DESC LIMIT 0,1000','condition'=>'status=:status AND location=:location','params'=>array(':status'=>'1',':location'=>'korea')));		
		}elseif(isset($_GET['vietnam'])){
		$model = job::model()->findAll(array('order'=>'JID DESC LIMIT 0,1000','condition'=>'status=:status AND location=:location','params'=>array(':status'=>'1',':location'=>'vietnam')));		
		}elseif(isset($_GET['philippines'])){
		$model = job::model()->findAll(array('order'=>'JID DESC LIMIT 0,1000','condition'=>'status=:status AND location=:location','params'=>array(':status'=>'1',':location'=>'philippines')));		
		}elseif(isset($_GET['india'])){
		$model = job::model()->findAll(array('order'=>'JID DESC LIMIT 0,1000','condition'=>'status=:status AND location=:location','params'=>array(':status'=>'1',':location'=>'india')));		
		}elseif(isset($_GET['nepal'])){
		$model = job::model()->findAll(array('order'=>'JID DESC LIMIT 0,1000','condition'=>'status=:status AND location=:location','params'=>array(':status'=>'1',':location'=>'nepal')));		
		}else{
		$model = job::model()->findAll(array('order'=>'JID DESC LIMIT 0,1000','condition'=>'status=:status AND location=:location','params'=>array(':status'=>'1',':location'=>'singapore')));		
		}

		$this->layout ='xml.php';
		$this->render('location',array('model'=>$model));
	}




// jobs by type	
	public function actionFullTime()
	{
		//$model = job::model()->findAll('full_time=:type',array('type'=>'Full-time'));
		$model = job::model()->findAll(array('order'=>'JID DESC LIMIT 0,20','condition'=>'status=:status AND full_time=:type','params'=>array(':status'=>'1',':type'=>'Full-time')));

		$this->layout = "xml.php";
		$this->render("categories",array('model'=>$model));
	}
	public function actionPartTime()
	{
		//$model = job::model()->findAll('part_time=:type',array('type'=>'Part-time'));
		$model = job::model()->findAll(array('order'=>'JID DESC LIMIT 0,20','condition'=>'status=:status AND part_time=:type','params'=>array(':status'=>'1',':type'=>'Part-time')));

		$this->layout = "xml.php";
		$this->render("categories",array('model'=>$model));
	}
	public function actionInternship()
	{
		//$model = job::model()->findAll('internship=:type',array('type'=>'Internship'));
		$model = job::model()->findAll(array('order'=>'JID DESC LIMIT 0,20','condition'=>'status=:status AND internship=:type','params'=>array(':status'=>'1',':type'=>'Internship')));

		$this->layout = "xml.php";
		$this->render("categories",array('model'=>$model));
	}
	public function actionFreelance()
	{
		//$model = job::model()->findAll('freelance=:type',array('type'=>'Freelance'));
		$model = job::model()->findAll(array('order'=>'JID DESC LIMIT 0,20','condition'=>'status=:status AND freelance=:type','params'=>array(':status'=>'1',':type'=>'Freelance')));

		$this->layout = "xml.php";
		$this->render("categories",array('model'=>$model));
	}
	public function actionTemporary()
	{
		//$model = job::model()->findAll('temporary=:type',array('type'=>'Temporary'));
		$model = job::model()->findAll(array('order'=>'JID DESC LIMIT 0,20','condition'=>'status=:status AND temporary=:type','params'=>array(':status'=>'1',':type'=>'Temporary')));

		$this->layout = "xml.php";
		$this->render("categories",array('model'=>$model));
	}
	public function actionCompany($id)
	{
		$model = job::model()->findAll('CID=:CID',array(':CID'=> $id));

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