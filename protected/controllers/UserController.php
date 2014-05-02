<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated users to access all actions
              //   'roles'=>array('1','2','0'),
            	 'users' => array('*'),
                ),
            array('allow',
                  'actions'=>array('depositResume','captcha'),
                  'users'=>array('*'),  
                 ),
             array('allow',
                  'actions'=>array('registration'),
                  'users'=>array('*'),  
                  ),
                //'roles'=>array('0','1','2'),  
            array('allow',
                  'actions'=>array('registerCompany'),
                  'roles'=>array('*'),
                  ),
		/*	array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),*/
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function behaviors()
	{
		return array(
			'doccy' => array(
				'class' => 'ext.doccy.Doccy',
			),
		);
	}
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$id=Yii::app()->user->getID();
		$this->render('view',array(
			'model'=>$this->loadEmployeeModel($id),
		));
	}
	
	public function actions(){
		return array(
			// captcha action renders the CAPTCHA image displayed on the user registration page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
			'backColor'=>0xFFFFFF,
			),
		);
	}

	public function actionSearch()
    {
        $company = company::model()->find('ID=:ID', array('ID' => Yii::app()->user->getID()));
        if($company->addons != 1){
        		$this->redirect('../site/page/view/notAuthorized');
        }else{
                $query = $_GET['q'];
        
               // $this->redirect(array('site/page','view'=>'success'));
         
                $this->render('search', array('query'=>$query));
               }
    }
 
	public function actionDownload()
	{
		$id=Yii::app()->user->getID();
		$model= Employee::model()->find('UID=:id',array(':id'=>$id));
	
		$fname=$model->fname;
		$lname=$model->lname;
		$fullname=$fname.$lname;
		$this->doccy->newFile('template.docx'); // template.docx must be located in protected/views/report/template.docx  where "report" is the name of the curren controller view folder (alternatively you must configure option "templatePath")
		$this->doccy->phpdocx->assign("#Name#",$model->fname); // basic field mapping
		$this->doccy->phpdocx->assign("#Surname#",$model->lname);
		$this->doccy->phpdocx->assign("#email#",$model->email);
		$this->doccy->phpdocx->assign("#phone#",$model->contact);
		$this->doccy->phpdocx->assign("#gender#",$model->gender);
		$this->doccy->phpdocx->assign("#dob#",$model->dob);
		$this->doccy->phpdocx->assign("#nationality#",$model->country);
		$this->doccy->phpdocx->assign("#Lastjob#",$model->lastjob);
		$this->doccy->phpdocx->assign("#experience#",$model->work_exp);
		$this->doccy->phpdocx->assign("#education#",$model->edu);
		$this->doccy->phpdocx->assignToHeader("#HEADER1#","Resume verified by  STARTUP JOB ASIA"); // basic field mapping to header
		$this->doccy->phpdocx->assignToFooter("#FOOTER1#","Startup Job Asia | Resume Generator"); // basic field mapping to footer


		$this->renderDocx($fullname.".docx", true); // use $forceDownload=false in order to (just) store file in the outputPath folder.
	}
	
	
	public function actionPdf()
	{
	
		$id=Yii::app()->user->getID();
		$model= Employee::model()->find('UID=:id',array(':id'=>$id));
	
		$fname=$model->fname;
		$lname=$model->lname;
		$fullname=$fname.$lname;
		$html = <<<HTML
		<div >
        <h4 style="color:#adadad; font-size:18px;">$fname $lname</h4>
        <span style="color:#000000;font-size:12px;">$model->email</span><br />
        <span style="color:#000000;font-size:12px;">$model->contact</span><br />
        <hr>
       <br />
       <div>       
        <span style="color:#000000;font-weight:normal;font-size:12px;">Gender : $model->gender</span><br />
        <span style="color:#000000;font-weight:normal;font-size:12px;">DOB : $model->dob</span><br />
        <span style="color:#000000;font-weight:normal;font-size:12px;">Nationality : $model->country</span>
       </div>
        <hr><br />
        <div>
        <span style="color:#adadad; font-size:14px;">Experience</span><br /><br />
        <span style="color:#000000;font-weight:normal;font-size:12px;">Last Job : $model->lastjob</span><br />
        <span style="color:#000000;font-weight:normal;font-size:12px;">Work Experience : $model->work_exp years</span><br />
        </div>
        <hr>
        <div>
        <span style="color:#adadad; font-size:14px;">Education</span><br /><br />
        <span style="color:#000000;font-weight:normal;font-size:12px;">$model->edu</span><br />
        </div>
        <hr>
		<div></div>
		<div></div>
		<div></div><div></div>
		<div></div><div></div><div></div>
		<div></div>
		<div></div><div></div><div></div>
		<div></div><div></div><div></div><div></div><div></div>
		<div></div><div></div><div></div>
		<div></div>
		<div></div>
		<div>	</div>
  		</div>
  		<center><span style="color:#adadad; font-size:8px;">Startup Job Asia | Resume Generator</span>
		</center>


HTML;
	$pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf', 'P', 'cm', 'A4', true, 'UTF-8');
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor("Nilo");
	$pdf->SetTitle("Startup job Asia");
	$pdf->SetSubject("Startup job Asia Resume");
	$pdf->SetKeywords("TCPDF, PDF, example, test, guide");
	$pdf->setPrintHeader(false);
	$pdf->setPrintFooter(false);
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont("times", "BI", 12);
	$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
	$pdf->Output($fullname.".pdf", "D");

	}
	public function actionApplication()
	{
		
		if(Yii::app()->user->isGuest)
		{
		    $this->redirect(array('/site/login'));
		}
		else
		{
			$id = Yii::app()->user->getID();
			$user=$this->loadEmployeeModel($id);
			//var_dump($user->EID);
			//die();
			//$company = company::model()->find('ID=:ID', array('ID' => Yii::app()->user->getID()));
	        //$this->render('application',array('user' => $user));

	        $user = Employee::model()->find('EID=:ID', array('ID' => $user->EID));
	        
	        $this->render('application',array('user' => $user));
	    }
		
    }

	public function actionApplyJob1($JID)
	{
        //active record involved user, application, job

       $model = new ApplyJobForm;
       $ID = Yii::app()->user->getID();
       $user = Employee::model()->find('UID=:ID',array('ID'=>$ID));
       $model->coverLetter = str_replace('<br />', "", $user->coverLetter);
            if (isset($_POST['ApplyJobForm'])) {
                //check if applied
                $model->attributes = $_POST['ApplyJobForm'];
                if ($model->validate()) {
                    $check = Application::model()->find(':ID=EID&&:JID=JID',array(':ID'=>$ID,':JID'=>$JID));
                    $uploadedFile=CUploadedFile::getInstance($model,'resume');
                // if the user did not upload a file and also no resume stored
                     if ($check!=null||(empty($uploadfile)&&($user->resume == null)))  {    // already applied to the job
                             $this->redirect(array('site/page', 'view'=>'error'));
                     }
                // redirect if no resume is found
                    else 
                    {
                        $oldfilename = $user->resume;
                        $application = new Application;
                        $job = job::model()->find('JID=:JID', array('JID' => $JID));
                    
                        $user->coverLetter = nl2br($model->coverLetter);
                        $application->cover_letter = nl2br($model->coverLetter);
                        $application->EID =$ID;
                        $application->JID = $JID;
                        $application->CID = $job ->CID; 
                    // send resume to employer 
                    //$user = user::model()->find(':ID=ID', array(':ID'=>$ID)); 
                    if ($application->save()) 
                    {    
                          if (!empty($uploadedFile)) 
                          {      //uploaded file is not empty
                                    $fileName = str_replace(' ', '', "{$application->ID}-{$uploadedFile}");  // random number + file name
                                    $application->resume = $fileName;
                                    if ($application->save())   
                                    {
                                        $uploadedFile->saveAs(Yii::app()->basepath.'/../jobApplication/'.$fileName);
                                        
                                      // send email notification
                                        $company = company::model()->find('CID=:CID', array('CID' => $job->CID));
                                        $usr = user::model()->find('ID=:ID', array('ID' => $ID));
                                        
                                        $data = array(
					       				'name' => $user->name,
					       				'job' => $job->title,
					       				'company' =>  $company->cname,
					       				'username' => $usr->username,					       				
					       				'to' => $model->email,

					       				);					       		
							       		$sendEmail =  Yii::app()->user->sendEmail('applyjob_existing_user',$data);
	                                    
	                                    $this->redirect(array('site/page', 'view'=>'success'));
                                    }
                            }           //uploaded file is empty
                            else 
                            {      //use previous resume
                                    $fileName = $application->EID.'-'.$user->resume;
                                    $application->resume =$fileName;
                                    if ($application->save())   
                                    {       // copy the file to the job application folder
                                        copy(Yii::app()->basepath.'/../jobApplication/'.$user->resume,Yii::app()->basepath.'/../jobApplication/'.$fileName);
                                        
                                        // send email notification
                                        $company = company::model()->find('CID=:CID', array('CID' => $job->CID));
                                        $usr = user::model()->find('ID=:ID', array('ID' => $ID));
                                        
                                        $data = array(
					       				'name' => $user->name,
					       				'job' => $job->title,
					       				'company' =>  $company->cname,
					       				'username' => $usr->username,					       				
					       				'to' => $model->email,

					       				);					       		
							       		$sendEmail =  Yii::app()->user->sendEmail('applyjob_existing_user',$data);
	                                    
	                                    $this->redirect(array('site/page', 'view'=>'success'));
                                    }
                            }


                            // array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
                           
                    }
                }
            }
            }
            $this->render('applyJob', array('user'=>$user,
                                         'model'=>$model));
	}

	public function actionForgetPassword() 
	{
		// this is what working now
		
	    $model = new forgetPassword;

	        if (isset($_POST['forgetPassword'])) {
	            $model->attributes = $_POST['forgetPassword'];

	            if ($user = user::model()->find('email=:email', array('email' => $model->email))) {

	                $pwd1 = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789', 6)), 0, 6);
	                $key = 'AG*@#(129)!@K.><>]{[|sd`rjenfla0847&($#)!$Masdc$#@';
	                $pwd = hash('sha512', $key . ($pwd1));
	                $pwd = substr($pwd, 0, 100);
	                $user->password = $pwd;
	                if($user->save())
	                {
		                $data = array(
						       				'name' => $user->name,
						       				'account' => $user->username,
						       				'pwd' =>  $pwd1,					       									       				
						       				'to' => $model->email,

						       				);					       		
						$sendEmail =  Yii::app()->user->sendEmail('forgot_password',$data);					
	                
	                	$this->redirect(array('site/page/view/sentmail'));
	               	}
	            }
	            $this->redirect(array('site/page/view/emailNotFound'));
	        }
	        $this->render('forgetPassword', array('model' => $model));
	}

	public function actionApply_Job1($JID)
	{
        //active record involved user, application, job
			$model = new Employee();	

			/*  Using from Action Edit for myDate */
			$myDate = new myDate();
			$mydob = explode('-', $model->dob);
			
			$myDate->year = $mydob[0];
			$myDate->month = $mydob[1];
			$myDate->day = $mydob[2];


			$contact = explode('-', $model->contact);
			$myDate->country_code = $contact[0];
			$model->contact = $contact[1];

			
			if(isset($_POST['Employee'])) 
			{
            	$model->attributes = $_POST['Employee'];
            	$uploadedFile=CUploadedFile::getInstance($model,'resume');
            	$model->resume = $uploadedFile->name;
            	$saved = false;
            	if($existing_employee = Employee::model()->find('email=:email',array('email'=>$model->email)))
            	{
					$existing_employee->fname = $model->fname;      		
					$existing_employee->lname = $model->lname;
					$existing_employee->contact = $model->contact;
					$existing_employee->coverLetter = $model->coverLetter;
					$existing_employee->gender = $model->gender;
					$existing_employee->country = $model->country;
					$existing_employee->edu = $model->edu;
					$existing_employee->resume = $model->resume;
					$existing_employee->last_modified = date("d/m/y : H:i:s", time());
					
					$ID = $existing_employee->EID;
					$check = Application::model()->find(':ID=EID&&:JID=JID',array(':ID'=>$ID,':JID'=>$JID));
                    if($check)
                    {
                    	//you have already applied for this job
                    	echo "you have aready applied for this job!";
                    	$this->redirect(array('site/page', 'view'=>'already-applied'));
                    }                                       	

					if($existing_employee->save())
					{
						$saved = true;
						$fileName = str_replace(' ', '', "{$existing_employee->EID}-{$uploadedFile->name}");                                 
                        $uploadedFile->saveAs(Yii::app()->basepath.'/../jobApplication/'.$fileName);

                        $application = new Application;
                    	$job = job::model()->find('JID=:JID', array('JID' => $JID));
                    	$company = company::model()->find('CID=:CID', array('CID' => $job->CID));
                    	$application->cover_letter = nl2br($model->coverLetter);
                   		$application->EID = $EID;
                        $application->JID = $JID;
                        $application->CID = $job->CID;
                        $application->resume = $model->resume;

                      	if($application->save())  
                      	{
                        	//send email
                        	$data = array(
			       				'name' => $existing_employee->name,
			       				'job' => $job->title,
			       				'company' =>  $company->cname,
			       				'username' => $new_user->username,					       				
			       				'to' => $model->email,

			       				);
                        	$adminData = user::model()->findAll('role=:role',array('role'=>1));
					       	$dataAdmin = array(
					       				'name' => $new_user->name,
					       				'job' => $job->title,
					       				'company' =>  $company->cname,
					       				'to'=>$adminData[0]['email'],
					       							);


					       		$sendEmail =  Yii::app()->user->sendEmail('applyjob',$data);
					       		$sendEmail =  Yii::app()->user->sendEmail('applyjob',$dataAdmin);
                        }

                        $this->redirect(array('site/page', 'view'=>'success'));                        					 	
					}					 
            		
            	}
            	else
            	{
            			//guest user
            			$saved = true;
												
						$new_user = new user();
						$new_user->username = $model->fname.rand(11,999);
						
						$key = 'AG*@#(129)!@K.><>]{[|sd`rjenfla0847&($#)!$Masdc$#@';
                        $dt = date("dmY");
                        $pwd = hash('sha512', $key.($dt));
                        $pwd = substr($pwd, 0, 100);						
						$new_user->password = $pwd;
						
						$new_user->email = $model->email;
						$new_user->name = $model->fname;
						$new_user->activation_key = mt_rand().mt_rand().mt_rand().mt_rand();

						
							/*  Using from Action Edit for myDate */
							$myDate->attributes=$_POST['myDate'];
							$myDate->day = $_POST['myDate']['day'];
							$myDate->month = $_POST['myDate']['month'];
							$myDate->year = $_POST['myDate']['year'];
							$myDate->country_code = $_POST['myDate']['country_code'];
							$model->contact = $myDate->country_code.'-'.$model->contact;
						
							$model->dob = $myDate->year.'-'.$myDate->month.'-'.$myDate->day;
				
			       		if($new_user->save())
			       		{

				       		$ID = Yii::app()->db->getLastInsertID();
				       		$model->UID = $ID;            		
            				//$user = Employee::model()->find('EID=:ID',array('ID'=>$ID));
				       		if($model->save())
							{
					       		$baseUrl = Yii::app()->request->baseUrl;
		                        $serverPath = 'localhost/yii/uStyle';
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
		               
								$fileName = str_replace(' ', '', "{$model->EID}-{$uploadedFile->name}");                                 
		                        $uploadedFile->saveAs(Yii::app()->basepath.'/../jobApplication/'.$fileName);
		                        		  
		                    	$EID = Yii::app()->db->getLastInsertID();
		                    	$application = new Application;
		                    	$job = job::model()->find('JID=:JID', array('JID' => $JID));
		                    	$company = company::model()->find('CID=:CID', array('CID' => $job->CID));
		                    	$application->cover_letter = nl2br($model->coverLetter);
		                   		$application->EID = $EID;
		                        $application->JID = $JID;
		                        $application->CID = $job->CID;
		                        $application->resume = $model->resume;

		                        if($application->save())
		                        {
		                        	//send email
		                        	$data = array(
					       				'name' => $new_user->name,
					       				'job' => $job->title,
					       				'company' =>  $company->cname,
					       				'username' => $new_user->username,					       				
					       				'to' => $model->email,

					       				);	
		                        	$adminData = user::model()->findAll('role=:role',array('role'=>1));
					       			$dataAdmin = array(
					       				'name' => $new_user->name,
					       				'job' => $job->title,
					       				'company' =>  $company->cname,
					       				'to'=>$adminData[0]['email'],
					       							);	

							       		$sendEmail =  Yii::app()->user->sendEmail('applyjob',$data);
							       		$sendEmail =  Yii::app()->user->sendEmail('applyjob',$dataAdmin);
		                        }

		                        $this->redirect(array('site/page', 'view'=>'success'));

                     	}
                	} 
            	}
            }     
      	
            	
            /*$this->render('applyJob', array('user'=>$user,
                                         'model'=>$model)); */
			
			$this->render('apply_job',array('model'=>$model,'myDate'=>$myDate,'action'=>'applyjob'));		
	}

	public function actionDepositResume()
	{

			$model = new Employee();
			
			/*  Using from Action Edit for myDate */
			$myDate = new myDate();
			$mydob = explode('-', $model->dob);

			$contact = explode('-', $model->contact);
			$myDate->country_code = $contact[0];
		
			if(isset($_POST['ajax']) && $_POST['ajax']==='deposit-Resume')
			{
			  $model->attributes=$_POST['Employee'];
			  echo CActiveForm::validate($model);
			  Yii::app()->end();
			}

	 		if (isset($_POST['Employee'])){

             	$model->attributes = $_POST['Employee'];
             	$uploadedFile=CUploadedFile::getInstance($model,'resume');
				$fileType =  $uploadedFile->type;
				
				$fileName = str_replace(' ', '-', "{$uploadedFile->name}");
				$extt = pathinfo($fileName, PATHINFO_EXTENSION);

				if ($fileType=='' || $extt=='' || $extt!='pdf' || $extt!='doc' || $extt!='docx'){
					$this->redirect(array('user/depositResume'));

				}
				
				
				$fileName = preg_replace("/[^a-zA-Z0-9\-']/","",$fileName);
				$fileName = $fileName.".".$extt;
				$model->resume = $fileName;
				$model->validate();
				/*
				if($model->validate())
            {
                echo "true";
				exit;				
            }
			else{

                echo "false";  
				exit;
            }
				

*/
			
	            $new_user = new user();
				$new_user->username = trim(strtolower($model->fname.rand(11,999)));
				
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
				$model->source = "deposit";
				$model->ip = $_SERVER['REMOTE_ADDR'];
				$model->acc_status = 0;
			
				$model->dob = $myDate->year.'-'.$myDate->month.'-'.$myDate->day;
			
	       		if($new_user->save())
	       		{
			//echo'<pre>';print_r($model->attributes);echo'</pre>';
			//echo'<pre>';print_r($new_user->attributes);echo'</pre>';
			//echo'<pre>';var_dump($model->getErrors());echo'</pre>';
			//echo'<pre>';var_dump($new_user->getErrors());echo'</pre>';
			//exit;
		       		$ID = Yii::app()->db->getLastInsertID();
		       		$model->UID = $ID; 

		       		//$fileName = str_replace(' ', '', "{$ID}-{$uploadedFile->name}");
		       		//$model->resume = $fileName;       		
					//$user = Employee::model()->find('EID=:ID',array('ID'=>$ID));
		       		if($model->save(false))
					{
					
						//echo'<pre>';print_r($model->attributes);echo'</pre>';			
						//echo'<pre>';var_dump($model->getErrors());echo'</pre>';
						//exit;
					$EID = Yii::app()->db->getLastInsertID();
					
					$fileName = $EID.'-'.$fileName;
					$model->resume = $fileName;

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
			       		
			       		$sendEmail =  Yii::app()->user->sendEmail('deposit_resume',$data);
						$sendEmaill =  Yii::app()->user->sendEmail('deposit_resume_admin',$data);
        
						                                
	                    $uploadedFile->saveAs(Yii::app()->basepath.'/../jobApplication/'.$fileName);
	                    if(!$uploadedFile){
					  		 throw new CHttpException('Error uploading file.');  
						}

						$filee = Yii::app()->basepath.'/../jobApplication/'.$fileName;
						//$extt = $uploadedFile->getExtensionName();
						$extt = pathinfo($filee, PATHINFO_EXTENSION);
						$Content ='';
						if($extt == 'doc')
						{
							$Content = Yii::app()->user->read_file_doc(Yii::app()->basepath.'/../jobApplication/'.$model->resume);
						}
						if($extt == 'docx')
						{
							$Content = Yii::app()->user->read_file_docx(Yii::app()->basepath.'/../jobApplication/'.$model->resume);
						}
						if($extt == 'pdf')
						{
							$read_pdf = new ReadPDF();
							$Content = $read_pdf->decodePDF(Yii::app()->basepath.'/../jobApplication/'.$model->resume);							
						}
					
						$model->content = $Content;

						$model->save(false);

	                    $this->redirect(array('site/page/view/success-deposit'));

	            	}
	            }
	        }		               

            $outputJs = Yii::app()->request->isAjaxRequest;
            $this->render('apply_Job', array('model'=>$model,'myDate'=>$myDate,'action'=>'depositResume'), false, $outputJs);
											
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new user;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionEdit($id)
	{
		if(yii::app()->user->isAdmin())
		{
			$id = $_GET['id'];		
		}
		else
		{
			$id = Yii::app()->user->getId();
		}
	

		

		$model=$this->loadEmployeeModel($id);
		
			if(isset($_POST['ajax']) && $_POST['ajax']==='employee-form')
			{
			  $model->attributes=$_POST['Employee'];
			  echo CActiveForm::validate($model);
			  Yii::app()->end();
			}
			
			
		$myDate = new myDate();
		$mydob = explode('-', $model->dob);
		
		$myDate->year = $mydob[0];
		$myDate->month = $mydob[1];
		$myDate->day = $mydob[2];

		//var_dump($model->contact);

		$contact = explode('-', $model->contact);
		$myDate->country_code = $contact[0];
		$model->contact = $contact[1];
		
		/*if(isset($_POST) &&($_POST != NULL))
		{
			echo '<pre>';
		if(isset($_POST['p_scnt'])&& ($_POST['p_scnt']))
			{
				$string='';
				$size=sizeof($_POST['p_scnt']);
				if($size>=2)
				{
					for($i=0;$i<$size;$i++)
					{
						$string.= $_POST['p_scnt'][$i]."_||_";
					}	
					echo $string;
				}
				
				$estr=explode('_||_', $string);
				var_dump($estr);
			}
				die;
			
				
		}
		*/

		if(isset($_POST['Employee']))
		{
			/*var_dump($_POST['Employee']);
			die;	*/
			$model->validate();
			
			$model->attributes=$_POST['Employee'];
			//echo'<pre>';print_r($model->attributes);echo'</pre>';
			//echo'<pre>';var_dump($model->getErrors());echo'</pre>';
			//exit;			
			$uploadedImage = CUploadedFile::getInstance($model,'photo');
			if(isset($uploadedImage)){
			$ephoto = str_replace(' ', '-', "{$uploadedImage->name}");
			$ephoto = $model->EID.'_profile_pic_'.$ephoto;
			}
			
			$uploadedFile = CUploadedFile::getInstance($model,'resume');
			if(isset($uploadedFile)){
			$eresume = str_replace(' ', '-', "{$uploadedFile->name}");
			$eresume = $model->EID.'-'.$eresume;
			}

			$model->tags=$_POST['Employee']['tags'];
			$myDate->attributes=$_POST['myDate'];
			$myDate->day = $_POST['myDate']['day'];
			$myDate->month = $_POST['myDate']['month'];
			$myDate->year = $_POST['myDate']['year'];
			$myDate->country_code = $_POST['myDate']['country_code'];
			$model->contact = $myDate->country_code.'-'.$model->contact;
			$model->location = $myDate->country_code;
			
			$model->dob = $myDate->year.'-'.$myDate->month.'-'.$myDate->day;
			
	
			$model->last_modified = date("d/m/y : H:i:s", time());

			if(isset($_POST['p_scnt']))
			{
				$string='';
				$c_tb = array();
				$size=sizeof($_POST['p_scnt']);
				if($size>1)
				{
					for($i=0;$i<$size;$i++)
					{
						if($_POST['p_scnt'][$i] != '' || $_POST['p_scnt'][$i] != null)
						{
							array_push($c_tb,$_POST['p_scnt'][$i]);
						}
					}
					for($i=0;$i<count($c_tb);$i++)
					{
						if($i != (count($c_tb)-1))
						{
							$string.= $c_tb[$i].",";
							
						}
						else
						{
							$string.= $c_tb[$i];

						}
					}
					$model->edu = $string;
					
				}else{
					$string=$_POST['p_scnt'][0];
					$model->edu = $string;
				}
				
			}
			if(isset($_POST['work']))
			{
				$wstring='';
				$c_tb = array();
				$size=sizeof($_POST['work']);
				if($size>1)
				{
					for($i=0;$i<$size;$i++)
					{
						if($_POST['work'][$i] != '' || $_POST['work'][$i] != null)
						{
							array_push($c_tb,$_POST['work'][$i]);
						}
					}
					for($i=0;$i<count($c_tb);$i++)
					{
						if($i != (count($c_tb)-1))
						{
							$wstring.= $c_tb[$i].",";
							
						}
						else
						{
							$wstring.= $c_tb[$i];

						}
					}
					$model->work_exp = $wstring;
					
				}else{
					$wstring=$_POST['work'][0];
					$model->work_exp = $wstring;
				}
			}
			
			if(isset($ephoto))
            {
						$uploadedImage->saveAs(Yii::app()->basepath.'/../images/profile/'.$ephoto);
						$image = Yii::app()->image->load(Yii::app()->basepath.'/../images/profile/'.$ephoto);
						$image->resize(400, 0);								
						$image->save(Yii::app()->basepath.'/../images/profile/400/'.$ephoto);
						$croped_logo = Yii::app()->user->crop_logo(Yii::app()->basepath.'/../images/profile/400/'.$ephoto);
						$model->photo = $ephoto;
							

            }
            else
            {
            	if(isset($_POST['old_pic']) && $_POST['old_pic'] != '') 
            		$model->photo = $_POST['old_pic'];
            	else
            		$model->photo = '';
            }

            if(isset($eresume)) 
            {
						$uploadedFile->saveAs(Yii::app()->basepath.'/../jobApplication/'.$eresume);
                    	$filee = Yii::app()->basepath.'/../jobApplication/'.$eresume;

						$extt = pathinfo($filee, PATHINFO_EXTENSION);

						$Content ='';
						if($extt == 'doc')
						{
							$Content = Yii::app()->user->read_file_doc(Yii::app()->basepath.'/../jobApplication/'.$eresume);
						}
						if($extt == 'docx')
						{
							$Content = Yii::app()->user->read_file_docx(Yii::app()->basepath.'/../jobApplication/'.$eresume);
						}
						if($extt == 'pdf')
						{
							$read_pdf = new ReadPDF();
							$Content = $read_pdf->decodePDF(Yii::app()->basepath.'/../jobApplication/'.$eresume);							
						}
						$model->content = $Content;
						$model->resume = $eresume;
						//echo $Content;
						//exit;

            }
            else
            {
            	if(isset($_POST['old_resume']) && $_POST['old_resume'] != '') 
            		$model->resume = $_POST['old_resume'];
            	else
            		$model->resume = '';

            }

			
			if($model->save(false)) //second validation pass is not needed
				{
				
					$command = Yii::app()->db->createCommand();						
					if($command->update('user', array('email' => $model->email), 'ID=:id', array(':id'=>$id))){
					
					Yii::app()->user->name = $model->email;
					
					//$urll = Yii::app()->getBaseUrl(true).'/user/profile/'.$id;
					//$this->redirect($urll);
					$this->redirect(array('user/profile/'.$id.''));
					}
				}
				$this->redirect(array('user/profile/'.$id.''));
		}

		$this->render('edit',array(
			'model'=>$model,
			'myDate'=>$myDate,
		));
	}


	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('user');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new user('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadEmployeeModel($id)
	{
		//$model=Employee::model()->findByPk(Yii::app()->user->getID());		
		$model=Employee::model()->findBySql("Select * from employee where UID=".$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


 

	public function actionProfile($id)
	{
	
			$uid = Yii::app()->user->getID();
			if($uid == '')
			{
			//$id = Yii::app()->user->getId();
			//var_dump($id); 
		    $this->redirect(array('/site/page/view/notAuthorized'));

			}
			
			
		if(yii::app()->user->isMember())
		{
			//$uid = Yii::app()->user->getID();
			if((!$id) || ($id != $uid) || ($uid == ''))
			{
			//$id = Yii::app()->user->getId();
			var_dump($id); 
		    $this->redirect(array('/site/page/view/notAuthorized'));

			}
		}
			$this->render('profile',array(
			'model'=>$this->loadEmployeeModel($id),
			));
		
	}

 	public function actionRegistration()
	{
     
        //$model = new RegistrationForm;
        $model = new RegistrationForm;
     	$this->performAjaxValidation($model);
        if (isset($_POST['RegistrationForm'])) {
        	
              $model->attributes = $_POST['RegistrationForm'];
             
             
              if ($model->validate()) {       //generate activation key
               $activationKey = mt_rand() . mt_rand() . mt_rand() . mt_rand();
                // $model->activationKey= mt_rand() . mt_rand() . mt_rand() . mt_rand() . mt_rand();
                        $key = 'AG*@#(129)!@K.><>]{[|sd`rjenfla0847&($#)!$Masdc$#@';
                        $pwd = hash('sha512', $key . ($model->password));
                        $pwd = substr($pwd, 0, 100);
                        
                        $record = new user;  // Save into user
                        //die;
                        $record->username = strtolower(trim($model->name)).rand(100, 999);
						
                        $record->password = $pwd;
                        $record->name = $model->name;
                        $record->email = trim(strtolower($model->email));
                        $record->activation_key = $activationKey;

                        /*
							var_dump($record->save(false));
							die;
						*/
                       
                        if($record->save(false))	{
                               
                        		$uid = Yii::app()->db->getLastInsertID();
                        		$name = $model->name;
                        		$email = trim(strtolower($model->email));
                        		$date = new DateTime();
								//$date->getTimestamp();
                        		$command = Yii::app()->db->createCommand();
                        		if($command->insert('employee', array(
	                                'UID' => $uid,
			                        'fname' => $name, 
			                        'email' => $email,
			                      			                        
                    			)))
                        		{

						$verification_link = Yii::app()->getBaseUrl(true).'/user/verify/code/'.$activationKey.'/fresh/new';

	                                $data = array(
					       					'name'=>$record->name,
					       					'username'=> $record->name,
					       					'password'=>$model->password,
					       					'verify_link'=>$verification_link,
					       					'to'=> $record->email,

					       				);	

							     	$sendEmail =  Yii::app()->user->sendEmail('registration',$data);
									//$sendEmail =  Yii::app()->user->sendEmail('registration',$dataAdmin);
	                               $this->redirect(array('site/page/view/successUser'));
                                }
			}
		}
        }
        $this->render('registration', array('model' => $model));
    }

    public function actionVerify($code)
	{
        //if ($user = user::model()->find('activationKey=:activationKey', array('activationKey' => $code))) {
           // $user->activationKey = '0';
		  $fresh = FALSE;
          $code = $_GET['code'];
		  

		if($user_id = Yii::app()->db->createCommand()
                                    ->select('id')
                                    ->from('user')
                                    ->where('activation_key=:key',array(':key'=>$code))
                                   ->queryAll())
            	{
	            	if($register_status = Yii::app()->db->createCommand()
                                    ->select('registered')
                                    ->from('employee')
                                    ->where('UID=:id', array(':id'=>$user_id[0]['id']))
                                   ->queryAll())
	            	{
	            		if($register_status[0]['registered'] == '0')
	            		{
			            	$command = Yii::app()->db->createCommand();
							
			            	if($command->update('employee', array(
			                    'registered' => '1',
								'acc_status' => '0',
			                ),  'UID=:id', array(':id'=>$user_id[0]['id'])))
			            	{
			            		//echo "account activated!";	
			            		if(isset($_GET['fresh'])){
									$fresh = TRUE;
								}
								 
								if($fresh == FALSE){
									Yii::app()->session['user_id'] = $user_id[0]['id'];
									$this->redirect(array('user/activeuserregister','name'=> $user_id[4]['name']));
								}else{
									$this->redirect(array('site/page/view/verifyUser','status'=> '1'));
								}
			            	}
			            }
			            else
			            {
			            	//echo "account already activated!";	
			            	$this->redirect(array('site/page/view/verifyUser','status'=> '2'));
			            }
		            }
		            //$this->redirect(array('site/page/view/verifyUser'));
		        }
		        else
	            {
	            	//echo "varification code not found!";
	            	$this->redirect(array('site/page/view/verifyUser','status'=> '3'));
	            }

	        $this->render('verify', array('model' => $model));    
    }


 	public function actionActiveUserRegister()
	{

        $model = new ActiveUserRegister;

			if(isset($_POST['ajax']) && $_POST['ajax']==='activeuser-form')
			{
			  $model->attributes=$_POST['ActiveUserRegister'];
			  echo CActiveForm::validate($model);
			  Yii::app()->end();
			}
			
        if (isset($_POST['ActiveUserRegister'])) {
        	
              $model->attributes = $_POST['ActiveUserRegister'];
             
             
              if ($model->validate()) {       //generate activation key
                        $key = 'AG*@#(129)!@K.><>]{[|sd`rjenfla0847&($#)!$Masdc$#@';
                        $pwd = hash('sha512', $key . ($model->password));
                        $pwd = substr($pwd, 0, 100);
                        
                        $record = new user;  // Save into user
                        //die;
                        //$record->username = strtolower(trim($model->username));
                        $record->password = $pwd;

                        /*
							var_dump($record->save(false));
							die;
						*/
						$user_id = Yii::app()->session['user_id'];
						if($user_id){
						$command = Yii::app()->db->createCommand();
						
						if($command->update('user', array(
			                   // 'username' => $record->username,
								'password' => $record->password,
			                ),  'ID=:id', array(':id'=>$user_id)))
			            	{
			            		//echo "account activated!";	
								unset(Yii::app()->session['user_id']);
			            		$this->redirect(array('site/login'));
			            	}
							
						}

			}
        }
        $this->render('activeuserregister', array('model' => $model));
    }
	
	
	
    public function actionUpdatePassword($id)
	{
		if(!(yii::app()->user->isAdmin()))
		{
			$id = Yii::app()->user->getID();
		}
        
        $CForm = new updatePassword;

		$user = user::model()->find('ID=:ID', array('ID' => $id));
        //CActiveRecord for old one

			$CForm->attributes = $user->attributes;
			$CUR_PS = $user->password;
		
        if (isset($_POST['updatePassword'])) {
                   $CForm->attributes = $_POST['updatePassword'];
                   $CForm->password1 = $_POST['updatePassword']['password1'];
				   $CForm->password2 = $_POST['updatePassword']['password2'];
				   $CForm->password3 = $_POST['updatePassword']['password3'];

                   if ($CForm->validate()) {

					 
					 
					       $user = new user;  
							$user = user::model()->find('ID=:ID', array('ID' => $id));					   
                          //$user->ID = $id;
						  
						//generate activation key

                        $key = 'AG*@#(129)!@K.><>]{[|sd`rjenfla0847&($#)!$Masdc$#@';
                        $cur_pwd = hash('sha512', $key . ($CForm->password1));
                        $cur_pwd = substr($cur_pwd, 0, 100);
				
						if ($CUR_PS == $cur_pwd){
						
							if($CForm->password2 == $CForm->password3){
						
						$key = 'AG*@#(129)!@K.><>]{[|sd`rjenfla0847&($#)!$Masdc$#@';
                        $new_pwd = hash('sha512', $key . ($CForm->password2));
                        $new_pwd = substr($new_pwd, 0, 100);
						
						$user->password = $new_pwd;
                                     
            
                          if ($user->save()) {
						   
					 
                         if(!(yii::app()->user->isAdmin()))
                         {
				Yii::app()->user->setFlash('warning', '<span class="alert in alert-block fade alert-success">Your password has been changed <strong>successfully</strong>.</span>');
						 
                           //$this->redirect(array('company/updatePassword/12'));
                         }else{
						 
						 
                           $this->redirect(array('admin/startup/'.$company->ID));
                         }
						 
						 }

                         }else{ Yii::app()->user->setFlash('warning', '<span class="label label-important" style="font-size: 17px; padding: 5px;">New password did not matched the <strong>confirm new password</strong></span>');
						 }
                    
                   }else{
				  // Yii::app()->user->setFlash('warning', 'Your password was not changed because it did not matched the <strong>old password</strong>.');
				   
				   Yii::app()->user->setFlash('warning', '<span class="label label-important" style="font-size: 17px; padding: 5px;">Your password was not changed because your current password dis wrong</span>');
				   
				   }
				   }
                    
                    
                    }             
       
           $this->render('updatePassword', array('CForm' => $CForm,'user' => $user ));
    }




	public function actionEditUserStatus($EID) {
	
		$EID = Yii::app()->user->getID();

		$Employee = Employee::model()->find('UID=:UID',array(':UID'=>$EID));

		if($Employee->acc_status == 0)
		{
			$Employee->acc_status = 1;
			
		}
		else if($Employee->acc_status == 1)
		{
			$Employee->acc_status = 0;
		}
		 
		if($Employee->save(false))
		{
			$this->redirect(array('user/profile/'.$EID));
		}else{
		
		echo CHtml::errorSummary($Employee);
		
		}

	}
	
	
    public function actionDownloadResume() 
    {
            if(isset($_GET['filename']))
            {

            $filename=$_GET['filename'];
            $path=''. dirname(Yii::app()->request->scriptFile).'/jobApplication/'.$filename.'';
           
			/* var_dump($path);
			die;*/
          
			Yii::app()->user->download_file($path,$filename);
        
            }
            
    }


	
	public function actionUploadimage(){

		
		$EID = Yii::app()->user->getID();

		$model=$this->loadEmployeeModel($EID);
		//echo'<pre>';print_r($_POST);echo'</pre>';
		//exit;
		if(isset($_POST['profile_image'])){
		
		//echo var_dump($_POST);
			// populate input data to $model and $gallery
		$ImageName 		= str_replace(' ','-',strtolower($_FILES['profile_image']['name'])); //get image name
		$ImageSize 		= $_FILES['profile_image']['size']; // get original image size
		$TempSrc	 	= $_FILES['profile_image']['tmp_name']; // Temp name of image file stored in PHP tmp folder
		$ImageType	 	= $_FILES['profile_image']['type']; //get file type, returns "image/png", image/jpeg, text/plain etc.
			
			//echo'<pre>';print_r($_FILES['profile_image']);echo'</pre>';
			
			if(!$ImageType || !$TempSrc || !$ImageSize || !$ImageName){
				echo'This is not A image';
				exit;
			}

			//echo'<pre>';print_r($_POST);echo'</pre>';

			//check if this is an ajax request
			if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
				//die();
				die('This is not a image File!'); //output error and exit
			}
			
			// check $_FILES['profile_image'] not empty
			if(!isset($_FILES['profile_image']) || !is_uploaded_file($_FILES['profile_image']['tmp_name']))
			{
					die('Something wrong with uploaded file, something missing!'); // output error when above checks fail.
			}
			
			// Random number will be added after image name
			$RandomNumber 	= rand(0, 9999999999); 


			//Let's check allowed $ImageType, we use PHP SWITCH statement here
			switch(strtolower($ImageType))
			{
				case 'image/png':
					//Create a new image from file 
					$CreatedImage =  imagecreatefrompng($_FILES['profile_image']['tmp_name']);
					break;
				case 'image/gif':
					$CreatedImage =  imagecreatefromgif($_FILES['profile_image']['tmp_name']);
					break;			
				case 'image/jpeg':
				case 'image/jpg':
				case 'image/pjpeg':
					$CreatedImage = imagecreatefromjpeg($_FILES['profile_image']['tmp_name']);
					break;
				default:
					die('Unsupported File!'); //output error and exit
			}
			

			
			//Get file extension from Image name, this will be added after random name
			$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
			$ImageExt = str_replace('.','',$ImageExt);

			//remove extension from filename
			$ImageName 		= preg_replace("/\\.[^.\\s]{3,4}$/", "", $ImageName); 

			//Construct a new name with random number and extension.
			$NewImageName = $ImageName.'_'.$RandomNumber.'.'.$ImageExt;

			$NewImageName = $EID.'_profile_pic_'.$NewImageName;
			
			move_uploaded_file($TempSrc, "images/profile/".$NewImageName);
			
			
						$image = Yii::app()->image->load(Yii::app()->basepath.'/../images/profile/'.$NewImageName);
						$image->resize(400, 0);								
						$image->save(Yii::app()->basepath.'/../images/profile/400/'.$NewImageName);
						$croped_logo = Yii::app()->user->crop_logo(Yii::app()->basepath.'/../images/profile/400/'.$NewImageName);
						
	
	//echo'<pre>';print_r(Yii::app()->db);echo'</pre>';
	//exit;
	
			echo "<style type='text/css'>.getoutimg{display:none;}.clearButton{clear:both;}</style>";
			echo '<a href="" onclick="return uploadImage();"><img src="/images/profile/400/'.$NewImageName.'"  style= "width:200px; float:left; border:5px solid #F89406;" alt="Resized Image"></a>';
			
			

			$model->photo = $NewImageName;		 
			$model->save(false);			

			exit;

		}
		
	}
	

}