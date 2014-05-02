<?php
class JobController extends Controller {
	public function filters()   {
		return array( 'accessControl' ); // perform access control for CRUD operations
	}



	public function accessRules()   {
		return array(
				array('allow', // allow authenticated users to access all actions
						'roles'=>array('2'),
				),
				array('allow',
						'actions'=>array('apply','editjobstatus','search','JobSearch','Jsearch','QuickSearch'),
						'users'=>array('*'),
				),
				array('allow',
						'actions'=>array('job'),
						'users'=>array('*'),
				),
				array('deny',
						'users'=>array('*')),
		);
	}




	public function actions() {
		return array(
				// captcha action renders the CAPTCHA image displayed on the contact page
				'captcha' => array(
						'class' => 'CCaptchaAction',
						'backColor' => 0xFFFFFF,
				),
				// page action renders "static" pages stored under 'protected/views/site/pages'
				// They can be accessed via: index.php?r=site/page&view=FileName
				'page' => array(
						'class' => 'CViewAction',
				),
		);
	}




	public function actionEditjobstatus($JID) {

		$job = job::model()->find('JID=:JID',array(':JID'=>$JID));
		if($job->status == 0)
		{
			$job->status = 1;
		}
		else if($job->status == 1)
		{
			$job->status = 0;
		}
		 
		if($job->save(false))
		{
			$this->redirect(array('job/manageJobs'));
		}

	}


	public function actionSearch()
	{
		 
		$query = $_GET['q'];
		$query = trim($query);
		
		$search_stats = new Searchstats();
		
		$search_stats->searchterm = $query;
		$search_stats->location = $_GET['l'];
		$search_stats->IP = $_SERVER['REMOTE_ADDR'];
		$search_stats->save(false);
		
		
		$query = str_replace("and","+",$query);		
		$query = str_replace("or"," ",$query);
		$query = str_replace("not","-",$query);
		$query = str_replace("/","",$query);
		$query = str_replace("  ","",$query);
		
		if(isset($_GET['l']) && $_GET['l']!="Anywhere"){
			$location = $_GET['l'];
			
			$locat = " AND location = '".$location."'";
		}else{		
			$location = "Anywhere";
			
			$locat = "";
		}

		if(isset($_GET['w']) && $_GET['w']!="startups"){
		// jobs
			$what = $_GET['w'];
		}else{		
			$what = "startups";
		}		
		
		if(isset($_GET['t']) && $_GET['t']!="any"){
			$type = $_GET['t'];
			if($type == "Full-time"){
				$TypeSearch = " AND full_time = 'Full-time'";
			}elseif($type == "Part-time"){
				$TypeSearch = " AND part_time = 'Part-time'";
			}elseif($type == "Freelance"){
				$TypeSearch = " AND freelance = 'Freelance'";
			}elseif($type == "Internship"){
				$TypeSearch = " AND internship = 'Internship'";
			}elseif($type == "Temporary"){
				$TypeSearch = " AND temporary = 'Temporary'";
			}elseif($type == "Co-Founder"){
				$TypeSearch = " AND co_founder = 'Co-Founder'";
			}elseif($type == "Contract"){
				$TypeSearch = " AND contract = 'Contract'";
			}else{
				$TypeSearch = " AND full_time = 'Full-time'";
			}

		}else{
			$TypeSearch = "";
		}

		if($what == "jobs"){
			if($query != ""){
				$dataProvider=new CActiveDataProvider('job', array(
				'criteria'=>array(
				'order'=>'created DESC',
				'condition'=>'JID in(SELECT JID FROM job WHERE MATCH (title,tags) AGAINST ("'.$query.'" IN BOOLEAN MODE)'.$locat.''.$TypeSearch.' AND expire >= :today AND status=1)',
				'params'=>array('today'=>date('Y-m-d H:i:s')),),
				'pagination'=>array('pageSize'=>30),
			));
			}else{
				$dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                   'order'=>'t.created DESC',
                                                                   // show all jobs that are not expired
																   'condition'=>'expire >= :today AND t.status=1'.$locat.''.$TypeSearch.'',
                                                                   //'condition'=>'t.status = 1',
                                                                   'params'=>array('today'=>date('Y-m-d H:i:s')),
                                                                    ),'pagination'=>array('pageSize'=>20,),
																));
			}
		
		}else{ // what = startups
			if($query != ""){
				$dataProvider=new CActiveDataProvider('job', array(
				'criteria'=>array(
				'order'=>'created DESC',
				'condition'=>'JID in(SELECT JID FROM job WHERE MATCH (cmpny) AGAINST ("'.$query.'" IN BOOLEAN MODE)'.$locat.''.$TypeSearch.' AND expire >= :today AND status=1)',
				'params'=>array('today'=>date('Y-m-d H:i:s')),),
				'pagination'=>array('pageSize'=>30),
			));
			}else{
				$dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                   'order'=>'t.created DESC',
                                                                   // show all jobs that are not expired
																   'condition'=>'expire >= :today AND t.status=1'.$locat.''.$TypeSearch.'',
                                                                   //'condition'=>'t.status = 1',
                                                                   'params'=>array('today'=>date('Y-m-d H:i:s')),
                                                                    ),'pagination'=>array('pageSize'=>20,),
																));
			}
		
		}

		
		$this->render('search', array('query'=>$query,'location'=>$location,'what'=>$what,'type'=>$type,'dataProvider'=>$dataProvider));
		 
	}



	public function actionManageJobs() {

		$this->render('manageJobs');
	}
	
	
	public function actionPostJobSearch()
    {
        $company = company::model()->find('ID=:ID', array('ID' => Yii::app()->user->getID()));

                $query = $_GET['q'];
				
				$query = str_replace(" and ","+",$query);
				$query = str_replace(" or "," ",$query);
				$query = str_replace(" not ","-",$query);
				$query = str_replace("/","",$query);
				$query = str_replace(" ","+",$query);
        
               // $this->redirect(array('site/page','view'=>'success'));
         
                $this->render('postjobsearch', array('query'=>$query,'company' => $company));

    }
	
	
	public function ActionPostJobLastOneMonth()
	{
		$company = company::model()->find('ID=:ID', array('ID' => Yii::app()->user->getID()));
        
            $this->render('postjoblastonemonth', array('company' => $company));
	}

	
	public function ActionPostJobLastThreeMonth()
	{
		$company = company::model()->find('ID=:ID', array('ID' => Yii::app()->user->getID()));
        
            $this->render('postjoblastthreemonth', array('company' => $company));
	}

	public function ActionPostJobLastSixMonth()
	{
		$company = company::model()->find('ID=:ID', array('ID' => Yii::app()->user->getID()));
        
            $this->render('postjoblastsixmonth', array('company' => $company));
	}

	public function ActionExpiredJobs()
	{
		$company = company::model()->find('ID=:ID', array('ID' => Yii::app()->user->getID()));
        
            $this->render('expiredjobs', array('company' => $company));
	}

	/*Approve job post only if company is approved ( status = 1)
	 * else redirect to not approved
	*/
	public function actionJsearch() {
		$post_key = Yii::app()->request->getQuery('key', 0);
		$post_type = Yii::app()->request->getQuery('type', 0);

		/*var_dump($post_key);
		 die;*/
		$this->render('Jsearch',array('key'=>$post_key,'type'=>$post_type));
	}





	public function actionJobSearch() {

		$model= job::model()->findAll();
		if(isset($_POST['keywords']))
		{
			$post_key = $_POST['keywords'];
			$post_type = $_POST['search_type'];

			$this->redirect(array('job/Jsearch','key'=>$post_key,'type'=>$post_type));
			 
		}
		$this->render('AdvanceJobSearch',array('model'=>$model));
	}
	
	
	
	
	
	
	
	public function actionSubmitJob(){
		 
		$model = new JobForm;
		$company = company::model()->find('ID=:ID', array('ID' => Yii::app()->user->getID()));

		if ($company->registered == 0) {
			$this->redirect(array('site/page/view/notApproved'));
		}

		$model->description = $company->summary;

		if (isset($_POST['JobForm'])) {
			 

			$model->attributes = $_POST['JobForm'];
			$model->title = $_POST['JobForm']['title'];
			$model->full_time = $_POST['JobForm']['full_time'];
			$model->part_time = $_POST['JobForm']['part_time'];
			$model->freelance = $_POST['JobForm']['freelance'];
			$model->internship = $_POST['JobForm']['internship'];
			$model->temporary = $_POST['JobForm']['temporary'];
			$model->co_founder = $_POST['JobForm']['co_founder'];
			$model->contract = $_POST['JobForm']['contract'];
			$model->howtoapply =$_POST['JobForm']['howtoapply'];
			$model->tags =$_POST['JobForm']['tags'];
			$model->location =$_POST['JobForm']['location'];
			$model->category=$_POST['JobForm']['category'];
			$model->min_salary=$_POST['JobForm']['min_salary'];
			$model->max_salary=$_POST['JobForm']['max_salary'];
			$model->currency=$_POST['JobForm']['currency'];
			$model->no_salary=$_POST['JobForm']['no_salary'];
			$model->no_salary_options=$_POST['JobForm']['no_salary_options'];


			/*echo '<pre>';
			var_dump($model->attributes);
			echo '</pre>';
			 echo"<pre>";print_r($_POST['JobForm']);echo"</pre>";
			 exit;*/
			
			if ($company ->registered == 1) {
				if ($model->validate()) {
					$record = new job;

					$job_title = str_replace('/','-',$model->title);

					$record->title = $job_title;
					$record->description = $model->description;
					$record->responsibility = $model->responsibility;
					$record->requirement = $model->requirement;
					$record->full_time = $model->full_time;
					$record->part_time = $model->part_time;
					$record->freelance = $model->freelance;
					$record->internship = $model->internship;
					$record->temporary = $model->temporary;
					$record->co_founder = $model->co_founder;
					$record->contract = $model->contract;
					/*
					if($model->salary == NULL)
					{
						$record->min_salary=0;
						$record->max_salary=0;
					}else{

						$salary= explode('-',$model->salary);
						$record->min_salary=$salary[0];
						$record->max_salary=$salary[1];
					}
					*/
					//$record->salary = $model->salary;
					
					$record->min_salary = $model->min_salary;
					$record->max_salary = $model->max_salary;
					$record->currency = $model->currency;
					$record->no_salary = $model->no_salary;
					$record->no_salary_options = $model->no_salary_options;
			
					$record->location = $model->location;
					$record->category = $model->category;
					$record->howtoapply = $model->howtoapply;
					$record->tags = $model->tags;
					$record->cmpny = $company->cname;
					$record->CID = $company->CID;
					$record->status = 1;
					//$time = new CDbExpression('NOW()');
					//$date = new DateTime($time);
					//$record->created = $date;
					//$record->expiration = $date->add(new DateInterval('P30D'));;
					if ($record->save()) {

						$company->job_post_balance--;
						$company->save();


						$JID=$record->JID;

						// send email notification

						$url3 = $model->title."-".$model->category."-".$company->cname."-".$model->location;
						$url3 = strtolower(str_replace('/', '-', $url3));
						$url3 = preg_replace("/[^a-zA-Z0-9\-]/","-",$url3);

						$data = array(
								'job' => $job_title,
								'company' =>  $company->cname,
								'job_url' => Yii::app()->getBaseUrl(true).'/job/job/JID/'.$JID.'/startup-hire/'.$url3,

						);
						$sendEmail =  Yii::app()->user->sendEmail('submit_job',$data);

						if(isset($_POST['JobForm']['featured']) && $_POST['JobForm']['featured']==1){
						
							$this->redirect(array('pay/buy/JID/'.$JID));
							
						}else{
						
							$this->redirect(array('job/manageJobs'));
						}


					}
				}
			}
			else
				$this->redirect(array('site/page', 'view'=>'notApproved'));
				
		}
		$this->render('submitJob', array('model' => $model, 'company' => $company,'premium'=>$company->premium,'job_post_balance'=>$company->job_post_balance));
	}



	public function actionRepost($JID) {
	
		$ID = Yii::app()->user->getID();
		 
		if(yii::app()->user->isAdmin())
		{

		$model = job::model()->with('company')->find('JID=:JID',  array(':JID' => $JID));

		$job = job::model()->with('company')->find('JID=:JID',  array(':JID' => $JID));
			
		}else{
		$model = job::model()->with('company')->find('JID=:JID && ID=:ID',  array(':JID' => $JID,':ID'=>$ID));


		$job = job::model()->with('company')->find('JID=:JID && ID=:ID',  array(':JID' => $JID,':ID'=>$ID));
		
		$company = company::model()->find('ID=:ID', array('ID' => Yii::app()->user->getID()));

		}
		
		if ($job !=null)
			$model->attributes = $job->attributes;
		//$model->salary =  $job->min_salary.'-'.$job->max_salary;
		
		
		if (isset($_POST['job'])) {
		
			/*
			echo"<pre>";print_r($_POST['job']);echo"</pre>";
		 	exit;
			*/
			 
			 
			$model->attributes = $_POST['job'];
			$model->title = $_POST['job']['title'];
			$model->full_time = $_POST['job']['full_time'];
			$model->part_time = $_POST['job']['part_time'];
			$model->freelance = $_POST['job']['freelance'];
			$model->internship = $_POST['job']['internship'];
			$model->temporary = $_POST['job']['temporary'];
			$model->co_founder = $_POST['job']['co_founder'];
			$model->contract = $_POST['job']['contract'];
			$model->howtoapply =$_POST['job']['howtoapply'];
			$model->tags =$_POST['job']['tags'];
			$model->location =$_POST['job']['location'];
			$model->category=$_POST['job']['category'];
			$model->min_salary=$_POST['job']['min_salary'];
			$model->max_salary=$_POST['job']['max_salary'];
			$model->currency=$_POST['job']['currency'];
			$model->no_salary_options=$_POST['job']['no_salary_options'];
			$model->no_salary=$_POST['job']['no_salary'];

			$job_title = str_replace('/','-',$model->title);
			 /*
			 var_dump($_POST['job']['tags']);
			 die;
			 */
			 
			$job = new job;
			 
			$job->title = $job_title;
			$job->description = $model->description;
			$job->responsibility = $model->responsibility;
			$job->requirement = $model->requirement;
			$job->full_time = $model->full_time;
			$job->part_time = $model->part_time;
			$job->freelance = $model->freelance;
			$job->internship = $model->internship;
			$job->temporary = $model->temporary;
			$job->co_founder = $model->co_founder;
			$job->contract = $model->contract;
			/*
			if($model->salary== NULL)
			{
				$job->min_salary=0;
				$job->max_salary=0;
			}else{
				$salary= explode('-',$model->salary);
				 
				$job->min_salary=$salary[0];
				$job->max_salary=$salary[1];
				 
			}
			*/
			$job->min_salary = $model->min_salary;
			$job->max_salary = $model->max_salary;
			$job->currency = $model->currency;
			$job->no_salary = $model->no_salary;
			$job->no_salary_options = $model->no_salary_options;
			
			$job->location = $model->location;
			$job->category = $model->category;
			$job->howtoapply = $model->howtoapply;
			$job->tags = $model->tags;
			$job->cmpny = $company->cname;
			$job->CID = $company->CID;
			$job->status = 1;
			//var_dump($job->attributes);die;
			if ($job->save()) {
			
						$company->job_post_balance--;
						$company->save();

						$url3 = $model->title."-".$model->category."-".$company->cname."-".$model->location;
						$url3 = strtolower(str_replace('/', '-', $url3));
						$url3 = preg_replace("/[^a-zA-Z0-9\-]/","-",$url3);
						
						$JID=$job->JID;
					
							$data = array(
								'job' => $job_title,
								'company' =>  $company->cname,
								'job_url' => Yii::app()->getBaseUrl(true).'/job/job/JID/'.$JID.'/startup-hire/'.$url3,

						);
						$sendEmail =  Yii::app()->user->sendEmail('submit_job',$data);
				//redirect
				//$this->redirect(array('job/job/JID/'.$JID));
				$this->redirect(array('job/manageJobs'));
			}
			 
		}
		$this->render('repost', array('model' => $model,'job' => $job, 'company' => $company,));
	}

	
	//Not completed
	//Upgrade job posting to premium
	
	public function actionQuickSearch()
	{
		if(isset($_POST['Min_salary'])||isset($_POST['Max_salary']))
		{
			$syntax="SELECT JID FROM job WHERE";
			if(isset($_POST['Min_salary'])&&isset($_POST['Max_salary'])&&isset($_POST['salary_option']))
				$syntax.=  " ((min_salary >= ".$_POST['Min_salary']." AND max_salary <= ".$_POST['Max_salary']." )OR( min_salary = 0 AND max_salary = 0))";
			else
				$syntax.=  " ((min_salary >= ".$_POST['Min_salary']." AND max_salary <= ".$_POST['Max_salary'].")) ";

			//var_dump($_POST);
			$syntax_desig=array();
			if(isset($_POST['senior_manager']))
				array_push($syntax_desig," designation = 'Senior Manager '");
			if(isset($_POST['senior_executive']))
				array_push($syntax_desig,"designation = 'Senior Executive'");
			if(isset($_POST['Fresh/Entry']))
				array_push($syntax_desig,"designation = 'Fresh/Entry Level'");
			if(isset($_POST['Manager']))
				array_push($syntax_desig,"designation = 'Manager'");
			if(isset($_POST['Junior_executive']))
				array_push($syntax_desig,"designation = 'Junior Executive'");
			if(isset($_POST['Nonexecutive']))
				array_push($syntax_desig, "designation = 'Non-Executive'");

			$size=sizeof($syntax_desig);
			$desig="";
			for($i=0;$i<$size;$i++)
			{
				if($i==0)
				{
					$desig .="AND (";

				}
				$desig .= $syntax_desig[$i];
				if($i != ($size-1))
				{
					$desig .= " OR ";
				}
				if($i==$size-1)
				{
					$desig.= ")";
				}
			}

			$syntax.=$desig;
			$syntax_job=array();
			if(isset($_POST['full_time']))
				array_push($syntax_job,"type = 'Full-Time'");
			if(isset($_POST['part_time']))
				array_push($syntax_job,"type = 'Part-Time'");
			if(isset($_POST['internship']))
				array_push($syntax_job,"type = 'Internship'");
			if(isset($_POST['freelance']))
				array_push($syntax_job,"type = 'Freelance'");
			if(isset($_POST['temporary']))
				array_push($syntax_job,"type = 'Temporary'");
			if(isset($_POST['co_founder']))
				array_push($syntax_job,"type = 'Co-Founder'");
			if(isset($_POST['contract']))
				array_push($syntax_job,"type = 'Contract'");				
			$size=sizeof($syntax_job);
			$job="";
			for($i=0;$i<$size;$i++)
			{
				if($i==0)
				{
					$job .="AND (";

				}
				$job .= $syntax_job[$i];
				if($i!=($size-1))
				{
					$job .= " OR ";
				}
				if($i==$size-1)
				{
					$job.= ")";
				}
			}
			$syntax.=$job;

			if(isset($_POST['job_posted']) && ($_POST['job_posted']!='all'))
			{
				date_default_timezone_set('Asia/Singapore');
				$c_date = date('Y-m-d H:i:s');
				if($_POST['job_posted']=='1')
				{
					$date = strtotime($c_date);
					$date = strtotime("-1 day", $date);
					$date =date('Y-m-d H:i:s',$date);
				}
				if($_POST['job_posted']=='3')
				{
					$date = strtotime($c_date);
					$date = strtotime("-3 day", $date);
					$date =date('Y-m-d H:i:s',$date);

				}
				if($_POST['job_posted']=='7')
				{
					$date = strtotime($c_date);
					$date = strtotime("-7 day", $date);
					$date =date('Y-m-d H:i:s',$date);

				}
				if($_POST['job_posted']=='14')
				{
					$date = strtotime($c_date);
					$date = strtotime("-14 day", $date);
					$date =date('Y-m-d H:i:s',$date);

				}
				$datediff='';
				$datediff.="AND(created between '".$date."' and '".$c_date."' )";

			}


			if(isset($_POST['location']))
			{
				$locate='';
				$locate.=" AND (location='".$_POST['location']."')";
				$syntax.= $locate;
			}

		}
		$job=job::model()->find("JID in(".$syntax.")");

		$this->render('AdSearch',array('job'=>$job));



	}
	
	
	
	
	
	
	public function actionPremium($JID) {

		$ID = Yii::app()->user->getID();
		if($job = job::model()->with('company')->find('JID=:JID&&ID=:ID',  array(':JID' => $JID, ':ID'=>$ID)))
		{
			Yii::app()->session['JID'] = $JID;
			$abc =  Yii::app()->session['JID'];
			$this->render('premium', array('JID'=>$JID, 'abc'=>$abc));
		}
		else
		{
			$this->render('premium', array('JID'=>$JID, 'abc'=>$abc));
		}

	}

	

	public function actionUpdate($JID) {
		$ID = Yii::app()->user->getID();
		//$model = new JobForm;
		//$job = job::model()->with('company')->find('JID=:JID' ,  array(':JID' => $JID, ));
		 
		//  if (!($favourite = favourite::model()->find('profileID=:profileID&&friendID=:friendID', array(':profileID' => $model1->profileID,
		//   ':friendID' => $model1->friendID))))
		 
		//need to check company id as well...
		//potential error
		//$job = job::model()->with('company')->find('JID=:JID&&ID=:ID',  array(':JID' => $JID));
		if(yii::app()->user->isAdmin())
		{

		$model = job::model()->with('company')->find('JID=:JID',  array(':JID' => $JID));

		$job = job::model()->with('company')->find('JID=:JID',  array(':JID' => $JID));
			
		}else{
		$model = job::model()->with('company')->find('JID=:JID && ID=:ID',  array(':JID' => $JID,':ID'=>$ID));


		$job = job::model()->with('company')->find('JID=:JID && ID=:ID',  array(':JID' => $JID,':ID'=>$ID));
		
		$CID=$job->CID;
		$company = company::model()->find('CID=:CID', array('CID'=> $CID));
		//echo '<pre>';
		//var_dump($job);
		//die;
			
		}
		//var_dump($job);die;
		//CActiveRecord for old one
		
			//echo '<pre>';
			//var_dump($model->attributes);
			//echo '</pre>';
			

			 

			 
		if ($job !=null)
			$model->attributes = $job->attributes;
		//$model->salary =  $job->min_salary.'-'.$job->max_salary;
		//$model->about = str_replace('<br />', "", $company->about);
		if (isset($_POST['job'])) {
		
			/*echo"<pre>";print_r($_POST['job']);echo"</pre>";
		 	exit;*/
			 
			 
			$model->attributes = $_POST['job'];
			$model->title = $_POST['job']['title'];
			$model->full_time = $_POST['job']['full_time'];
			$model->part_time = $_POST['job']['part_time'];
			$model->freelance = $_POST['job']['freelance'];
			$model->internship = $_POST['job']['internship'];
			$model->temporary = $_POST['job']['temporary'];
			$model->co_founder = $_POST['job']['co_founder'];
			$model->contract = $_POST['job']['contract'];
			$model->howtoapply =$_POST['job']['howtoapply'];
			$model->tags =$_POST['job']['tags'];
			$model->location =$_POST['job']['location'];
			$model->category=$_POST['job']['category'];
			$model->description=$_POST['job']['description'];
			$model->responsibility=$_POST['job']['responsibility'];
			$model->requirement=$_POST['job']['requirement'];
			$model->min_salary=$_POST['job']['min_salary'];
			$model->max_salary=$_POST['job']['max_salary'];
			$model->currency=$_POST['job']['currency'];
			$model->no_salary=$_POST['job']['no_salary'];
			$model->no_salary_options=$_POST['job']['no_salary_options'];			

			$job_title = str_replace('/','-',$model->title);
			 /*var_dump($_POST['job']['tags']);
			 die;*/
			$job->title = $job_title;
			$job->description = $model->description;
			$job->responsibility = $model->responsibility;
			$job->requirement = $model->requirement;
			$job->full_time = $model->full_time;
			$job->part_time = $model->part_time;
			$job->freelance = $model->freelance;
			$job->internship = $model->internship;
			$job->temporary = $model->temporary;
			$job->co_founder = $model->co_founder;
			$job->contract = $model->contract;
			$job->min_salary = $model->min_salary;
			$job->max_salary = $model->max_salary;
			$job->currency = $model->currency;
			$job->no_salary = $model->no_salary;
			$job->no_salary_options = $model->no_salary_options;			
			/*
			if($model->salary== NULL)
			{
				$job->min_salary=0;
				$job->max_salary=0;
			}else{
				$salary= explode('-',$model->salary);
				 
				$job->min_salary=$salary[0];
				$job->max_salary=$salary[1];
				 
			}
			*/
			$job->location = $model->location;
			$job->category = $model->category;
			$job->howtoapply = $model->howtoapply;
			$job->tags = $model->tags;
			$job->status = 1;
			$job->modified = new CDbExpression('NOW()');
			//var_dump($job->attributes);die;
			if ($job->save()) {
				//redirect
				//$this->redirect(array('job/job/JID/'.$JID));
					if(yii::app()->user->isAdmin())
					{
						$this->redirect(array('admin/jobs'));
						
					}else{
					
						$this->redirect(array('job/manageJobs'));
					}
			}

		}
		$this->render('update', array('model' => $model,'job' => $job, 'company' => $company));
	}

	public function actionJob($JID) {
		$job = job::model()->find('JID=:JID', array('JID' => $JID));
		$CID=$job->CID;
		$company = company::model()->find('CID=:CID', array('CID'=> $CID));
		$aplicants = Application::model()->findAll('JID=:JID', array('JID'=> $JID));
		$total_applicants = count($aplicants);

		$today = date('Y-m-d H:i:s');
		$today_date = date('Y-m-d');

		//$stats = Stats::model()->findAll('JID=:JID AND last_visit_date=:today', array('JID'=> $JID,'today'=>$today_date));
												
		$total_views_today = Yii::app()->db->createCommand("SELECT SUM(visits) as sum FROM `stats` WHERE `JID`= $JID AND last_visit_date='".$today_date."'")->queryScalar();
		
		//echo"<pre>";
		//print_r($total_views_today);
		//echo"</pre>";
		//exit;
		//$total_views_today = $dbCommand->queryAll();
		//$total_views_today = $total_views_today['sum'];
		//SUM(visits)
   

				
		/*	$criteria = new CDbCriteria();
			$criteria->condition = "JID =:JID AND last_visit_date =:today";
			$criteria->params = array(':JID' => $JID,':today' => $today_date);
			$stats = Stats::model()->findAll($criteria);
		*/	

		//$total_views_today = count($stats);
		
		$days_left = Yii::app()->user->dateDiff($today, $job->expire);

		//code from usercontroller.php -> actionApply_Job($JID)

		if(Yii::app()->user->isGuest)
		{

			$model = new Employee();
			//$this->performAjaxValidation($model);
			/* Using from Action Edit for myDate */
			$myDate = new myDate();
			$mydob = explode('-', $model->dob);

			//$myDate->year = $mydob[0];
			//$myDate->month = $mydob[1];
			//$myDate->day = $mydob[2];


			$contact = explode('-', $model->contact);
			$myDate->country_code = $contact[0];

			// echo myDate::getCountryName($model->location); 
			//$model->contact = $contact[1];


			if(isset($_POST['ajax']) && $_POST['ajax']==='job-form')
			{
			  $model->attributes=$_POST['Employee'];
			  echo CActiveForm::validate($model);
			  Yii::app()->end();
			}


			if(isset($_POST['Employee']))
			{
				$model->attributes = $_POST['Employee'];
				$uploadedFile=CUploadedFile::getInstance($model,'resume');
				$fileType =  $uploadedFile->type;
				
				$fileName = str_replace(' ', '-', "{$uploadedFile->name}");
				$extt = pathinfo($fileName, PATHINFO_EXTENSION);

				if ($fileType=='' || $extt=='' || $extt!='pdf' || $extt!='doc' || $extt!='docx'){
					$this->redirect(array('job/job/JID/'.$job->JID.''));

				}
				
				$fileName = preg_replace("/[^a-zA-Z0-9\-]/","-",$fileName);
				$fileName = $fileName.".".$extt;
				$model->resume = $fileName;
				$model->validate();

				$saved = false;
				if($existing_employee = Employee::model()->find('email=:email',array('email'=>$model->email)))
				{
					$existing_employee->fname = $model->fname;
					$existing_employee->lname = $model->lname;
					$existing_employee->contact = $model->contact;
					$existing_employee->coverLetter = $model->coverLetter;
					$existing_employee->gender = $model->gender;
					$existing_employee->country = $model->country;
					$existing_employee->location = $myDate->country_code;
					$existing_employee->edu = $model->edu;
					$existing_employee->resume = $model->resume;
					$existing_employee->last_modified = date("Y-m-d : H:i:s", time());

					$ID = $existing_employee->EID;
					$check = Application::model()->find(':ID=EID && :JID=JID',array(':ID'=>$ID,':JID'=>$JID));
					if($check)
					{
						//you have already applied for this job
						//echo "you have aready applied for this job!";
						$this->redirect(array('site/page', 'view'=>'already-applied'));
					}


						$fileName = str_replace(' ', '-', "{$existing_employee->EID}-{$fileName}");
						$uploadedFile->saveAs(Yii::app()->basepath.'/../jobApplication/'.$fileName);

						$filee = Yii::app()->basepath.'/../jobApplication/'.$fileName;
									
						//$extt = $filee->getExtensionName();
						$extt = pathinfo($filee, PATHINFO_EXTENSION);


						$Content ='';
						if($extt == 'doc')
						{
							$Content = Yii::app()->user->read_file_doc(Yii::app()->basepath.'/../jobApplication/'.$fileName);
						}
						if($extt == 'docx')
						{
							$Content = Yii::app()->user->read_file_docx(Yii::app()->basepath.'/../jobApplication/'.$fileName);
						}
						if($extt == 'pdf')
						{
							$read_pdf = new ReadPDF();
							$Content = $read_pdf->decodePDF(Yii::app()->basepath.'/../jobApplication/'.$fileName);
						}
								
						$existing_employee->content = $Content;

						
					if($existing_employee->save())
					{
						$saved = true;

						$application = new Application;
						$job = job::model()->find('JID=:JID', array('JID' => $JID));
						$company = company::model()->find('CID=:CID', array('CID' => $job->CID));
						//$application->cover_letter = nl2br($model->coverLetter);
						$application->EID = $EID;
						$application->JID = $JID;
						$application->CID = $job->CID;
						//$application->resume = $model->resume;

							$fileName = str_replace(' ', '-', $model->resume);
							$application->resume = $fileName;
								
						if($application->save()){
						
						
						
						$url3 = $job->title."-".$job->category."-".$company->cname."-".$job->location;
						$url3 = strtolower(str_replace('/', '-', $url3));
						$url3 = preg_replace("/[^a-zA-Z0-9\-]/","-",$url3);
					
							//send email
							$data = array(
									'name' => $existing_employee->fname,
									'job' => $job->title,
									'company' =>  $company->cname,
									'company_email' =>  $company->cemail,
									'howtoapply' =>  $job->howtoapply,
									'username' => $new_user->username,
									'to' => $model->email,
									'file' => Yii::app()->getBaseUrl(true).'/company/downloadResume?filename='.$application->EID.'-'.$fileName,
									'job_url' => Yii::app()->getBaseUrl(true).'/job/job/JID/'.$job->JID.'/startup-hire/'.$url3,

							);
							$sendEmail = Yii::app()->user->sendEmail('applyjob',$data);
							//$sendEmaill = Yii::app()->user->sendEmail('applyjob_admin',$data);
							//$sendEmailll = Yii::app()->user->sendEmail('applyjob_startup',$data);
							
							/*$mail = new YiiMailer('apply', array('message' => $job->title, 'name' => $company->cname, 'jid' => $job->JID, 'applicant' => $Employee->fname." ".$Employee->lname));
								
								//set properties
								$mail->setFrom($Employee->email, $Employee->fname." ".$Employee->lname);
								$mail->setSubject("New Applicant - Startup Jobs");
								$mail->setTo($company->cemail);
								$exMail = explode(',',$job->howtoapply);
								$totalexMail = count($exMail);
								if ($totalexMail == 2) {
								  $mail->setCc(array($exMail[0],$exMail[1]));
								} elseif ($totalexMail == 3){
								  $mail->setCc(array($exMail[0],$exMail[1],$exMail[2]));
								} else {
								  $mail->setCc($job->howtoapply);
								}
								//$mail->setCc($job->howtoapply);
								$mail->setBcc(array('nilojan@startupjobs.asia','partners@startupjobs.asia'));
								$mail->setAttachment($_SERVER["DOCUMENT_ROOT"].'/jobApplication/'.$fileName);
								//send
								if ($mail->send()) {
									Yii::app()->user->setFlash('applyjob','<div class="alert in alert-block fade alert-success"><a class="close" data-dismiss="alert">×</a><strong>Well done!</strong> Thank you for applying to this job. We will respond to you as soon as possible</div>');
								} else {
									Yii::app()->user->setFlash('error','<div class="alert in alert-block fade alert-error"><a class="close" data-dismiss="alert">×</a><strong>Sorry!</strong> Error while applying for this job : '.$mail->getError().'</div>');
								}
								
								$this->refresh();
								*/
								
						}

						$this->redirect(array('site/page/view/successApply'));
					}

				}
				else
				{
				if(filter_var($model->email, FILTER_VALIDATE_EMAIL)){
					//guest user
					$saved = true;

					$new_user = new user();
					$new_user->username = strtolower(trim($model->fname.rand(111,999)));


					$key = 'AG*@#(129)!@K.><>]{[|sd`rjenfla0847&($#)!$Masdc$#@';
					$dt = date("dmY");
					$pwd = hash('sha512', $key.($dt));
					$pwd = substr($pwd, 0, 100);
					$new_user->password = $pwd;

					$new_user->email = trim(strtolower($model->email));
					$new_user->name = $model->fname." ".$model->lname;
					$new_user->activation_key = mt_rand().mt_rand().mt_rand().mt_rand();

					/*  Using from Action Edit for myDate */
					$myDate->attributes=$_POST['myDate']; 
					$myDate->day = $_POST['myDate']['day'];
					$myDate->month = $_POST['myDate']['month'];
					$myDate->year = $_POST['myDate']['year'];
					$myDate->country_code = $_POST['myDate']['country_code'];
					$model->contact = $myDate->country_code.'-'.$model->contact;
					$model->location = $myDate->country_code;
					$model->dob = $myDate->year.'-'.$myDate->month.'-'.$myDate->day;
					
					$model->source = "apply";
					$model->ip = $_SERVER['REMOTE_ADDR'];
					$model->acc_status = 0;
				
					
					if($new_user->save())
					{
						$ID = Yii::app()->db->getLastInsertID();
						$model->UID = $ID;
						//$user = Employee::model()->find('EID=:ID',array('ID'=>$ID));
						
						/*
						echo "<pre>";
						var_dump($model->attributes);
						echo "</pre>";
						die;
						*/
						//echo'<pre>';print_r($model->attributes);echo'</pre>';	
						//if(!$model->save(false)){
						//   var_dump($model->getErrors());
						//}
						if(filter_var($model->email, FILTER_VALIDATE_EMAIL)){
						if($model->save(false))
						{
						$EID = Yii::app()->db->getLastInsertID();

						//print_r($model->getErrors());
						/*
						echo "<pre>";
						var_dump($model->attributes);
						echo "</pre>";
						die;
						*/
							$baseUrl = Yii::app()->request->baseUrl;
							$verification_link = Yii::app()->getBaseUrl(true).'/user/verify/code/'.$new_user->activation_key;

							//send email
							$data = array(
									'name' => $new_user->name,
									'activation_key' => $verification_link,
									'verify_link' =>  $verification_link,
									'username' => $new_user->username,
									'password' => $dt,
									'to' => $model->email,
									
							);
							$sendEmail =  Yii::app()->user->sendEmail('registration',$data);

							$application = new Application;
							$job = job::model()->find('JID=:JID', array('JID' => $JID));
							$company = company::model()->find('CID=:CID', array('CID' => $job->CID));
							//$application->cover_letter = nl2br($model->coverLetter);
							$application->EID = $EID;
							$application->JID = $JID;
							$application->CID = $job->CID;
							//$application->resume = $model->resume;
							
							if($application->save()){
							$AID = Yii::app()->db->getLastInsertID();
							$fileName = $AID.'-'.$fileName;
								

							$uploadedFile->saveAs(Yii::app()->basepath.'/../jobApplication/'.$fileName);
							// UP Load Here
							
							$filee = Yii::app()->basepath.'/../jobApplication/'.$fileName;

							$extt = pathinfo($filee, PATHINFO_EXTENSION);
								
							$Content ='';
							if($extt == 'doc')
							{
								$Content = Yii::app()->user->read_file_doc(Yii::app()->basepath.'/../jobApplication/'.$fileName);
							}
							if($extt == 'docx')
							{
								$Content = Yii::app()->user->read_file_docx(Yii::app()->basepath.'/../jobApplication/'.$fileName);
							}
							if($extt == 'pdf')
							{
								$read_pdf = new ReadPDF();
								$Content = $read_pdf->decodePDF(Yii::app()->basepath.'/../jobApplication/'.$fileName);
							}								
							$ResumeContent = $Content;
							//exit;
	// update employee tbl								
	Yii::app()->db->createCommand("UPDATE employee SET content = :Content,resume = :Resume WHERE EID=:id")->bindValues(array(':id' => $EID, ':Content' => $ResumeContent, ':Resume' => $fileName))->execute();

	// update application tbl	
	Yii::app()->db->createCommand("UPDATE application SET EID = :EID,resume = :Resume WHERE AID=:id")->bindValues(array(':id' => $AID,':EID' => $EID, ':Resume' => $fileName))->execute();
	
	
						$url3 = $job->title."-".$job->category."-".$company->cname."-".$job->location;
						$url3 = strtolower(str_replace('/', '-', $url3));
						$url3 = preg_replace("/[^a-zA-Z0-9\-]/","-",$url3);

					//send email
								$data = array(
										'name' => $new_user->name,
										'job' => $job->title,
										'company' =>  $company->cname,
										'company_email' =>  $company->cemail,
										'username' => $new_user->username,
										'howtoapply' =>  $job->howtoapply,
										'to' => $model->email,
										//'file' => Yii::app()->getBaseUrl(true).'/company/downloadResume?filename='.$fileName,
										'job_url' => Yii::app()->getBaseUrl(true).'/job/job/JID/'.$job->JID.'/startup-hire/'.$url3,

								);
								// send email
								if(filter_var($model->email, FILTER_VALIDATE_EMAIL)){
									$sendEmail = Yii::app()->user->sendEmail('applyjob',$data);
									//$sendEmaill = Yii::app()->user->sendEmail('applyjob_admin',$data);
									//$sendEmailll = Yii::app()->user->sendEmail('applyjob_startup',$data);
									
								$mail = new YiiMailer('apply', array('message' => $job->title, 'name' => $company->cname, 'coverLetter' => $model->coverLetter,'jid' => $job->JID.'/startup-hire/'.$url3, 'applicant' => $new_user->name));
								
								//set properties
								$mail->setFrom($model->email, $new_user->name);
								$mail->setSubject("New Applicant - Startup Jobs Asia");
								$mail->setTo($company->cemail);
								$exMail = explode(',',$job->howtoapply);
								$totalexMail = count($exMail);
								if ($totalexMail == 2) {
								  $mail->setCc(array($exMail[0],$exMail[1]));
								} elseif ($totalexMail == 3){
								  $mail->setCc(array($exMail[0],$exMail[1],$exMail[2]));
								} else {
								  $mail->setCc($job->howtoapply);
								}
								//$mail->setCc($job->howtoapply);
								$mail->setBcc(array('tamilnilo@gmail.com','benchew1975@gmail.com'));
								$mail->setAttachment($_SERVER["DOCUMENT_ROOT"].'/jobApplication/'.$fileName);
								//send
								if ($mail->send()) {
									Yii::app()->user->setFlash('applyjob','<div class="alert in alert-block fade alert-success"><a class="close" data-dismiss="alert">×</a><strong>Well done!</strong> Thank you for applying to this job.</div>');
								} else {
									Yii::app()->user->setFlash('error','<div class="alert in alert-block fade alert-error"><a class="close" data-dismiss="alert">×</a><strong>Sorry!</strong> Error while applying for this job : '.$mail->getError().'</div>');
								}
								
								$this->refresh();
								
								}
								
							}//						

							Yii::app()->session['startup_name'] = $company->cname;
							Yii::app()->session['candidate_email'] = $model->email;
							$this->redirect(array('site/page/view/successApply#FirstTime'));

						}
						}else{$this->redirect(array('site/error'));}
					}
				}else{$this->redirect(array('site/error'));}
				}
			}
			

				$modelLogin = new LoginForm;
                // if it is ajax validation request
                if (isset($_POST['ajax']) && $_POST['ajax'] === 'LoginonJob') {
                        echo CActiveForm::validate($modelLogin);
                        Yii::app()->end();
                       
                }
                // collect user input data
                if (isset($_POST['LoginForm'])) {
                        $modelLogin->attributes = $_POST['LoginForm'];
                // validate user input and redirect to the previous page if valid
                        if ($modelLogin->validate()) {
							$modelLogin->email = strtolower($modelLogin->email);
                            $user =user::model()->find('email=:email', array('email' => $modelLogin->email));
                            $user->last_login = new CDbExpression('NOW()');
                            $user->save();
                            $modelLogin->login();
                            if(Yii::app()->user->isMember())
                            {
                                $this->redirect(array('job/job/JID/'.$JID.'#applyjob'));
									
                            }else{
								$this->redirect(array('site/logout'));
							}
                        }
                }	

				
			$this->render('job', array('job' => $job,
					'company'=>$company,
					'total_applicants'=> $total_applicants,
					'total_views_today'=>$total_views_today,
					'days_left' => $days_left,
					'model'=>$model,
					'modelLogin'=>$modelLogin,
					'myDate'=>$myDate,
					'action'=>'applyjob'
			));
		}
		if(!Yii::app()->user->isGuest)
		{
			$model = new ApplyJobForm;
			$ID = Yii::app()->user->getID();
			$Employee = Employee::model()->find('UID=:ID',array('ID'=>$ID));
			$model->coverLetter = nl2br($Employee->coverLetter);			

                if (isset($_POST['ajax']) && $_POST['ajax'] === 'ApplyJob-Form') {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                       
                }
				
			//print_r($model->getErrors());
			//echo'<pre>';print_r($model->attributes);echo'</pre>';
			//exit;
			
			if (isset($_POST['ApplyJobForm'])){
				//check if applied
				$model->attributes = $_POST['ApplyJobForm'];
				$uploadedFile=CUploadedFile::getInstance($model,'resume');

				$fileName = str_replace(' ', '-', "{$uploadedFile->name}");				
				$extt = pathinfo($fileName, PATHINFO_EXTENSION);				
				$fileName = preg_replace("/[^a-zA-Z0-9\-]/","-",$fileName);
				$fileName = $fileName.".".$extt;
				$model->resume = $fileName;
				//echo'<pre>';print_r($model->attributes);echo'</pre>';
				//echo'<pre>';var_dump($model->getErrors());echo'</pre>';
				//exit;
				
				if ($model->validate()) {
					$check = Application::model()->find(':ID=EID&&:JID=JID',array(':ID'=>$Employee->EID,':JID'=>$JID));
					
					
					// if the user did not upload a file and also no resume stored
					if ($check!=null)  {  // already applied to the job
						$this->redirect(array('site/page', 'view'=>'already-applied'));
					}
					
					// if the user did not upload a file and also no resume stored
					if (empty($uploadedFile)&&($Employee->resume == null))  {  // empty resume
						$this->redirect(array('site/page', 'view'=>'error'));
					}

					
					// redirect if no resume is found
					else
					{
						$application = new Application;
						$job = job::model()->find('JID=:JID', array('JID' => $JID));

						if($model->coverLetter != ''){
							$Employee->coverLetter = $model->coverLetter;
						}else{
							$Employee->coverLetter = $Employee->coverLetter;
						}
						//$application->cover_letter = nl2br($model->coverLetter);
						$application->EID =$Employee->EID;
						$application->JID = $JID;
						$application->CID = $job ->CID;
						// send resume to employer

						if ($application->save())
						{
						$AID = Yii::app()->db->getLastInsertID();
						//echo $AID;
						//exit;
							if (!empty($uploadedFile))
							{      //uploaded file is not empty
								
								$fileName = $AID."-".$fileName;  // application number - file name
								
								$application->resume = $fileName;
								if($application->save())
								{
									$uploadedFile->saveAs(Yii::app()->basepath.'/../jobApplication/'.$fileName);
									
									$filee = Yii::app()->basepath.'/../jobApplication/'.$fileName;
									
									//$extt = $filee->getExtensionName();
									$extt = pathinfo($filee, PATHINFO_EXTENSION);
								
									$Content ='';
									if($extt == 'doc')
									{
										$Content = Yii::app()->user->read_file_doc(Yii::app()->basepath.'/../jobApplication/'.$fileName);
									}
									if($extt == 'docx')
									{
										$Content = Yii::app()->user->read_file_docx(Yii::app()->basepath.'/../jobApplication/'.$fileName);
									}
									if($extt == 'pdf')
									{
										$read_pdf = new ReadPDF();
										$Content = $read_pdf->decodePDF(Yii::app()->basepath.'/../jobApplication/'.$fileName);							
									}
								
									$ResumeContent = $Content;
									//exit;
									

	Yii::app()->db->createCommand("UPDATE employee SET content = :Content,resume = :Resume WHERE EID=:id")->bindValues(array(':id' => $Employee->EID, ':Content' => $ResumeContent, ':Resume' => $fileName))->execute();		
	
									// send email notification
									$company = company::model()->find('CID=:CID', array('CID' => $job->CID));
									
								$url3 = $job->title."-".$job->category."-".$company->cname."-".$job->location;
								$url3 = strtolower(str_replace('/', '-', $url3));
								$url3 = preg_replace("/[^a-zA-Z0-9\-]/","-",$url3);

								$data = array(
											'name' => $Employee->fname." ".$Employee->lname,
											'job' => $job->title,
											'company' =>  $company->cname,
											'company_email' =>  $company->cemail,
											'username' => $Employee->fname." ".$Employee->lname,
											'howtoapply' =>  $job->howtoapply,
											'to' => $Employee->email,
											'file' => Yii::app()->getBaseUrl(true).'/company/downloadResume?filename='.$fileName,
											'job_url' => Yii::app()->getBaseUrl(true).'/job/job/JID/'.$job->JID.'/startup-hire/'.$url3,

									);

									$sendEmail = Yii::app()->user->sendEmail('applyjob_existing_user',$data);
									//$sendEmaill = Yii::app()->user->sendEmail('applyjob_admin',$data);
									//$sendEmailll = Yii::app()->user->sendEmail('applyjob_startup',$data);
								
								$mail = new YiiMailer('apply', array('message' => $job->title, 'name' => $company->cname, 'jid' => $job->JID.'/startup-hire/'.$url3, 'applicant' => $Employee->fname." ".$Employee->lname));
								
								//set properties
								$mail->setFrom($Employee->email, $Employee->fname." ".$Employee->lname);
								$mail->setSubject("New Applicant - Startup Jobs Asia");
								$mail->setTo($company->cemail);
								$exMail = explode(',',$job->howtoapply);
								$totalexMail = count($exMail);
								if ($totalexMail == 2) {
								  $mail->setCc(array($exMail[0],$exMail[1]));
								} elseif ($totalexMail == 3){
								  $mail->setCc(array($exMail[0],$exMail[1],$exMail[2]));
								} else {
								  $mail->setCc($job->howtoapply);
								}
								//$mail->setCc($job->howtoapply);
								$mail->setBcc(array('tamilnilo@gmail.com','benchew1975@gmail.com'));
								$mail->setAttachment($_SERVER["DOCUMENT_ROOT"].'/jobApplication/'.$fileName);
								//send
								if ($mail->send()) {
									Yii::app()->user->setFlash('applyjob','<div class="alert in alert-block fade alert-success"><a class="close" data-dismiss="alert">×</a><strong>Well done!</strong> Thank you for applying to this job. We will respond to you as soon as possible</div>');
								} else {
									Yii::app()->user->setFlash('error','<div class="alert in alert-block fade alert-error"><a class="close" data-dismiss="alert">×</a><strong>Sorry!</strong> Error while applying for this job : '.$mail->getError().'</div>');
								}
								
								$this->refresh();
								
									//$this->redirect(array('site/page/view/successApply'));
								}
							}           //uploaded file is empty
							else
							{

							//use previous resume
								$application->resume = $Employee->resume;
								//$application->resume = str_replace(' ', '-', "{$AID}-{$Employee->resume}"); 
								//echo'<pre>';print_r($Employee->attributes);echo'</pre>';
								
								if ($application->save()){
								
								// copy the file to the job application folder
									//copy(Yii::app()->basepath.'/../resume/'.$Employee->resume,Yii::app()->basepath.'/../jobApplication/'.$fileName);
/*
									$filee = Yii::app()->basepath.'/../jobApplication/'.$fileName;
									
									//$extt = $filee->getExtensionName();
									$extt = pathinfo($filee, PATHINFO_EXTENSION);

									
									$Content ='';
									if($extt == 'doc')
									{
										$Content = Yii::app()->user->read_file_doc(Yii::app()->basepath.'/../jobApplication/'.$fileName);
									}
									if($extt == 'docx')
									{
										$Content = Yii::app()->user->read_file_docx(Yii::app()->basepath.'/../jobApplication/'.$fileName);
									}
									if($extt == 'pdf')
									{
										$read_pdf = new ReadPDF();
										$Content = $read_pdf->decodePDF(Yii::app()->basepath.'/../jobApplication/'.$fileName);							
									}
								
									$ResumeContent = $Content;
									

	Yii::app()->db->createCommand("UPDATE employee SET content = :Content WHERE EID=:id")->bindValues(array(':id' => $Employee->EID, ':Content' => $ResumeContent))->execute();

*/
	
									// send email notification
									$company = company::model()->find('CID=:CID', array('CID' => $job->CID));
									
								$url3 = $job->title."-".$job->category."-".$company->cname."-".$job->location;
								$url3 = strtolower(str_replace('/', '-', $url3));
								$url3 = preg_replace("/[^a-zA-Z0-9\-]/","-",$url3);
								
									$data = array(
											'name' => $Employee->fname." ".$Employee->lname,
											'job' => $job->title,
											'company' =>  $company->cname,
											'company_email' =>  $company->cemail,
											'username' => $Employee->fname." ".$Employee->lname,
											'howtoapply' =>  $job->howtoapply,
											'to' => $Employee->email,
											'file' => Yii::app()->getBaseUrl(true).'/company/downloadResume?filename='.$fileName,
											'job_url' => Yii::app()->getBaseUrl(true).'/job/job/JID/'.$job->JID.'/startup-hire/'.$url3,

									);

									$sendEmail = Yii::app()->user->sendEmail('applyjob_existing_user',$data);
									//$sendEmaill = Yii::app()->user->sendEmail('applyjob_admin',$data);
									//$sendEmailll = Yii::app()->user->sendEmail('applyjob_startup',$data);
									
									//$this->redirect(array('site/page/view/successApply'));
									
								$mail = new YiiMailer('apply', array('message' => $job->title, 'name' => $company->cname, 'jid' => $job->JID.'/startup-hire/'.$url3, 'applicant' => $Employee->fname." ".$Employee->lname));
								
								//set properties
								$mail->setFrom($Employee->email, $Employee->fname." ".$Employee->lname);
								$mail->setSubject("New Applicant - Startup Jobs Asia");
								$mail->setTo($company->cemail);
								$exMail = explode(',',$job->howtoapply);
								$totalexMail = count($exMail);
								if ($totalexMail == 2) {
								  $mail->setCc(array($exMail[0],$exMail[1]));
								} elseif ($totalexMail == 3){
								  $mail->setCc(array($exMail[0],$exMail[1],$exMail[2]));
								} else {
								  $mail->setCc($job->howtoapply);
								}
								//$mail->setCc($job->howtoapply);
								$mail->setBcc(array('tamilnilo@gmail.com','benchew1975@gmail.com'));
								$mail->setAttachment($_SERVER["DOCUMENT_ROOT"].'/jobApplication/'.$Employee->resume);
								//send
								if ($mail->send()) {
									Yii::app()->user->setFlash('applyjob','<div class="alert in alert-block fade alert-success"><a class="close" data-dismiss="alert">×</a><strong>Well done!</strong> Thank you for applying to this job. We will respond to you as soon as possible</div>');
								} else {
									Yii::app()->user->setFlash('error','<div class="alert in alert-block fade alert-error"><a class="close" data-dismiss="alert">×</a><strong>Sorry!</strong> Error while applying for this job : '.$mail->getError().'</div>');
								}
								
								$this->refresh();									
								}
							}
						}
					}
				}
			}
	
			$this->render('job', array('Employee'=>$Employee,
					'model'=>$model,
					'job' => $job,
					'company'=>$company,
					'total_applicants'=> $total_applicants,
					'total_views_today'=>$total_views_today,
					'days_left' => $days_left));
		}

		 
	}


	public function deleteJob($JID) {
		$job = job::model()->with('company')->find('JID=:JID&&ID=:ID',  array(':JID' => $JID, ':ID'=>Yii::app()->user->getID()));
		$job->delete();
		 
	}

	public function actionDelete($JID) {
		$job = job::model()->with('company')->find('JID=:JID&&ID=:ID',  array(':JID' => $JID, ':ID'=>Yii::app()->user->getID()));
		$job->delete();
		$this->redirect(array('job/manageJobs'));
		 
	}

	public function actionJobList()  {
		$CID = Yii::app()->user->getID();
		//$jobList=job::model()->findAll('CID=:CID',array('CID'=>$CID,
		$jobList = new Job();
		$this-> render('jobList', array('jobList' =>$jobList));
	}

	
		/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	 
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='job-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	
	//http://www.yiiframework.com/wiki/219/how-to-ensure-unicity-to-url/
	/*
public function beforeAction($action)
{
    $normalizedUrl = CHtml::normalizeUrl(array_merge(array("/".$this->route), $_GET));
    if (Yii::app()->request->url != $normalizedUrl && strpos($normalizedUrl, Yii::app()->errorHandler->errorAction) === false) {
        $this->redirect($normalizedUrl, true, 301);
    }
 
    return parent::beforeAction($action);
}
	
*/
}
?>