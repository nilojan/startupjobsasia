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
                  'actions'=>array('depositResume'),
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

	public function actionApplication() {
		
		$id = Yii::app()->user->getID();
		$user=$this->loadEmployeeModel($id);
		//var_dump($user->EID);
		//die();
		//$company = company::model()->find('ID=:ID', array('ID' => Yii::app()->user->getID()));
        //$this->render('application',array('user' => $user));

        $user = Employee::model()->find('EID=:ID', array('ID' => $user->EID));
        
        $this->render('application',array('user' => $user));
		
    }

	public function actionApplyJob($JID) {
        //active record involved user, application, job

       $model = new ApplyJobForm;
       $ID = Yii::app()->user->getID();
       $user = Employee::model()->find('UID=:ID',array('ID'=>$ID));
       $model->coverLetter = str_replace('<br />', "", $user->coverLetter);
            if (isset($_POST['ApplyJobForm'])) {
                //check if applied
                $model->attributes = $_POST['ApplyJobForm'];
                if ($model->validate()) {
                    $check = Application1::model()->find(':ID=EID&&:JID=JID',array(':ID'=>$ID,':JID'=>$JID));
                    $uploadedFile=CUploadedFile::getInstance($model,'resume');
                // if the user did not upload a file and also no resume stored
                     if ($check!=null||(empty($uploadfile)&&($user->resume == null)))  {    // already applied to the job
                             $this->redirect(array('site/page', 'view'=>'error'));
                     }
                // redirect if no resume is found
                    else {
                        $oldfilename = $user->resume;
                        $application = new Application1;
                        $job = job::model()->find('JID=:JID', array('JID' => $JID));
                    
                        $user->coverLetter = nl2br($model->coverLetter);
                        $application->cover_letter = nl2br($model->coverLetter);
                        $application->EID =$ID;
                        $application->JID = $JID;
                        $application->CID = $job ->CID; 
                    // send resume to employer 
                    //$user = user::model()->find(':ID=ID', array(':ID'=>$ID)); 
                    if ($application->save()) {    
                          if (!empty($uploadedFile)) {      //uploaded file is not empty
                                    $fileName = str_replace(' ', '', "{$application->ID}-{$uploadedFile}");  // random number + file name
                                    $application->resume = $fileName;
                                    if ($application->save())   {
                                        $uploadedFile->saveAs(Yii::app()->basepath.'/../jobApplication/'.$fileName);
                                        $this->redirect(array('site/page', 'view'=>'success'));
                                    }
                            }           //uploaded file is empty
                            else {      //use previous resume
                                    $fileName = $application->EID.'-'.$user->resume;
                                    $application->resume =$fileName;
                                    if ($application->save())   {       // copy the file to the job application folder
                                        copy(Yii::app()->basepath.'/../resume/'.$user->resume,Yii::app()->basepath.'/../jobApplication/'.$fileName);
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

		public function actionApply_Job($JID) {
        //active record involved user, application, job
			$model = new Employee();				
			if(isset($_POST['Employee'])) {
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
					$check = Application1::model()->find(':ID=EID&&:JID=JID',array(':ID'=>$ID,':JID'=>$JID));
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
                        $this->redirect(array('site/page', 'view'=>'success'));                        					 	
					}					 
            		
            	}
            	else
            	{
            			$saved = true;
												
						$new_user = new User();
						$new_user->username = $model->fname.rand(11,999);
						
						$key = 'AG*@#(129)!@K.><>]{[|sd`rjenfla0847&($#)!$Masdc$#@';
                        $dt = date("dmY");
                        $pwd = hash('sha512', $key.($dt));
                        $pwd = substr($pwd, 0, 100);						
						$new_user->password = $pwd;
						
						$new_user->email = $model->email;
						$new_user->name = $model->fname;
						$new_user->activation_key = mt_rand().mt_rand().mt_rand().mt_rand();

			       		if($new_user->save())
			       		{

				       		$ID = Yii::app()->db->getLastInsertID();
				       		$model->UID = $ID;            		
            				//$user = Employee::model()->find('EID=:ID',array('ID'=>$ID));
				       		if($model->save())
							{
					       		Yii::import('ext.yii-mail.YiiMailMessage');
								                        		
		                        $message = new YiiMailMessage;
		                        $baseUrl = Yii::app()->request->baseUrl;
		                        $serverPath = 'localhost/yii/uStyle';
		                        $verification_link = Yii::app()->getBaseUrl(true).'/user/verify/code/'.$new_user->activation_key;
		                        $body = "Hi <font type=\"bold\">" . $new_user->name . "</font><br>
		                        <br>
		                        Welcome to StartUp Jobs Asia! Your account <font type=\"bold\">" . $new_user->username . "</font> has been registered.<br>
		                        <br>
		                        In order to ensure that you have received this confirmation, we ask that you follow the link below and confirm that this is in fact the correct email address.<br>
		                        <br>
		                        <a href='".$verification_link."'>Verify Your Email Here</a><br>
		                        <br>
		                        You can use follwing username and passsword to login into your account.
		                        <br>
		                        Username : " . $new_user->username . "
		                        <br>" . "
		                        Password : " . $dt . "
		                        <br>
		                        <br>
		                        Accounts that have not been confirmed will be deactivated and removed from our system within 7 days, including all email addresses.<br> 
		                        <br>
		                        If you have NOT attempted to create an account at startupjobs please ignore this email - it might have been sent because someone mistyped his/her own email address.<br>
		                        THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!<br>
		                        <br>
		                        -------------<br>
		                        StartUp Jobs Asia Team";
		                        $message->setBody($body, 'text/html');
		                        $message->subject = "StartUp Jobs Asia Account Verification";
		                        $message->addTo($model->email);
		                        $message->from = 'noreply@StartUpJobsAsia.com';
		                        Yii::app()->mail->send($message);		                        
		               

								$fileName = str_replace(' ', '', "{$model->EID}-{$uploadedFile->name}");                                 
		                        $uploadedFile->saveAs(Yii::app()->basepath.'/../jobApplication/'.$fileName);
		                        //$this->redirect(array('site/page', 'view'=>'success'));
		  
		                    	$EID = Yii::app()->db->getLastInsertID();
		                    	$application = new Application1;
		                    	$job = job::model()->find('JID=:JID', array('JID' => $JID));
		                    	$application->cover_letter = nl2br($model->coverLetter);
		                   		$application->EID = $EID;
		                        $application->JID = $JID;
		                        $application->CID = $job->CID;
		                        $application->resume = $model->resume;

		                        if($application->save())
		                        {
		                        	//send mail

		                        }
		                        $this->redirect(array('site/page', 'view'=>'success'));

                     	}
                	} 
            	}
            }
            

            	
            	/*if($model->save())
            	{
            		$ID = Yii::app()->db->getLastInsertID();            		
            		$user = Employee::model()->find('EID=:ID',array('ID'=>$ID));
            		if ($model->validate()) {
	                    $check = Application1::model()->find(':ID=EID&&:JID=JID',array(':ID'=>$ID,':JID'=>$JID));
	                    if($check)
	                    {
	                    	//you have already applied for this job
	                    	//$this->redirect(array('site/page', 'view'=>'error'));
	                    }
	                    else
	                    {
	                    	$application = new Application1;
	                    	$job = job::model()->find('JID=:JID', array('JID' => $JID));
	                    	$user->coverLetter = nl2br($model->coverLetter);
                       		$application->cover_letter = nl2br($model->coverLetter);
                       		$application->EID = $ID;
	                        $application->JID = $JID;
	                        $application->CID = $job->CID; 


	                    }
	                    //$uploadedFile=CUploadedFile::getInstance($model,'resume');
	                    //  if the user did not upload a file and also no resume stored
	                   // if ($check!=null||(empty($uploadfile)&&($user->resume == null)))  {    // already applied to the job
	                            // $this->redirect(array('site/page', 'view'=>'error'));
                     	//}

                    }

            	}*/

             	    
				
				
		

       /*$model = new ApplyJobForm;
       if(Yii::app()->user->isGuest)
       	{
	        //$user = Employee::model()->find('UID=:ID',array('ID'=>$ID));
	        //$model->coverLetter = str_replace('<br />', "", $user->coverLetter);
	            if (isset($_POST['ApplyJobForm'])) {
	                //check if applied
	                $model->attributes = $_POST['ApplyJobForm'];
	                if ($model->validate()) {
	                    $check = Application1::model()->find(':ID=EID&&:JID=JID',array(':ID'=>$ID,':JID'=>$JID));
	                    $uploadedFile=CUploadedFile::getInstance($model,'resume');
	                // if the user did not upload a file and also no resume stored
	                     if ($check!=null||(empty($uploadfile)&&($user->resume == null)))  {    // already applied to the job
	                             $this->redirect(array('site/page', 'view'=>'error'));
	                     }
	                // redirect if no resume is found
	                    else {
	                        $oldfilename = $user->resume;
	                        $application = new Application1;
	                        $job = job::model()->find('JID=:JID', array('JID' => $JID));
	                    
	                        $user->coverLetter = nl2br($model->coverLetter);
	                        $application->cover_letter = nl2br($model->coverLetter);
	                        $application->EID =$ID;
	                        $application->JID = $JID;
	                        $application->CID = $job ->CID; 
	                    // send resume to employer 
	                    //$user = user::model()->find(':ID=ID', array(':ID'=>$ID)); 
	                    if ($application->save()) {    
	                          if (!empty($uploadedFile)) {      //uploaded file is not empty
	                                    $fileName = str_replace(' ', '', "{$application->ID}-{$uploadedFile}");  // random number + file name
	                                    $application->resume = $fileName;
	                                    if ($application->save())   {
	                                        $uploadedFile->saveAs(Yii::app()->basepath.'/../jobApplication/'.$fileName);
	                                        $this->redirect(array('site/page', 'view'=>'success'));
	                                    }
	                            }           //uploaded file is empty
	                            else {      //use previous resume
	                                    $fileName = $application->EID.'-'.$user->resume;
	                                    $application->resume =$fileName;
	                                    if ($application->save())   {       // copy the file to the job application folder
	                                        copy(Yii::app()->basepath.'/../resume/'.$user->resume,Yii::app()->basepath.'/../jobApplication/'.$fileName);
	                                        $this->redirect(array('site/page', 'view'=>'success'));
	                                    }
	                            }
	                            // array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
	                           
	                    }
	                }
	            }
	            }
	        }
            $this->render('applyJob', array('user'=>$user,
                                         'model'=>$model)); */
			
			$this->render('apply_Job',array('model'=>$model));		
	    }

	 public function actionDepositResume()   {
             $model = new ApplyJobForm();
             $user=user::model()->find(':ID=ID', array('ID'=>Yii::app()->user->getID()));
             $model->coverLetter = str_replace('<br />', "", $user->coverLetter);
             
             if (isset($_POST['ApplyJobForm'])) {
                 $model->attributes = $_POST['ApplyJobForm'];
                 if ($model->validate()) {
                    
                    $uploadedFile=CUploadedFile::getInstance($model,'resume');
                    $uploadedPhoto=CUploadedFile::getInstance($model,'photo');
                    $oldphotoname= $user->photo;
                    $oldfilename = $user->resume;
                    $oldfilename2 = $user->resume2;
                    $user->coverLetter = nl2br($model->coverLetter);    //cannot safe cover letter very strange
                    ////resume -> uploaded resume, resume2 -> resume;
                    if (!empty($uploadedFile)) {      //uploaded file is not empty
                                    $fileName = str_replace(' ', '', "{$user->ID}-{$uploadedFile}");  // random number + file name
                                    $user->resume = $fileName;
                                    $user->resume2= $oldfilename;
                    }                
                    if (!empty($uploadedPhoto)) {   // photo is not empty
                                    $photoName = str_replace(' ', '', "{$user->ID}-{$uploadedPhoto}");
                                    $user->photo = $photoName;
                                    
                    }
                     if ($user->save())   {
                         if (!empty($uploadedFile)) {      
                                $uploadedFile->saveAs(Yii::app()->basepath.'/../resume/'.$fileName);  // image will uplode to rootDirectory/banner    
                                 if ($oldfilename != $fileName) {
                                        if ($oldfilename2 != null && $oldfilename2 != $fileName )  //delete the file
                                                unlink(Yii::app()->basePath . '/../resume/' . $oldfilename2);// image will uplode to rootDirectory/banner    
                                }            
                         }   
                          if (!empty($uploadedPhoto)) {    
                               $uploadedPhoto->saveAs(Yii::app()->basepath.'/../images/profile/'.$photoName);  
                                        if ($oldphotoname != $photoName && $oldphotoname !=null) {
                                                unlink(Yii::app()->basePath . '/../images/profile/' . $oldphotoname);
                                        }
                          }
                         
                     }     
                 } 
             }
             $this->render('deposit', array('model'=>$model,
                                            'user'=>$user));
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;

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

	public function actionEdit()
	{
		$id = Yii::app()->user->getId();
		$model=$this->loadEmployeeModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);


		if(isset($_POST['Employee']))
		{
			
			$model->attributes=$_POST['Employee'];
			     	
			$ephoto = CUploadedFile::getInstance($model,'photo');
			$eresume = CUploadedFile::getInstance($model,'resume');
			$model->photo = $ephoto;
			$model->resume = $eresume;
			$model->last_modified = date("d/m/y : H:i:s", time());
			// var_dump($ephoto);
			// die;
			if(isset($ephoto->name) && $ephoto->name != '') 
            {
                       // file_put_contents("Profile_update.txt","\n profile upd : ".$profile_pic,FILE_APPEND);
                    	$ext = $model->photo->extensionName;
                    	$new_name = Yii::app()->user->getID()."_profile_pic.".$ext;
                        move_uploaded_file($ephoto->tempName,"./images/profile/".$new_name);
						$model->photo = $new_name;
            }
            else
            {
            	$model->photo = $_POST['old_pic'];
            }

            if(isset($eresume->name) && $eresume->name != '') 
            {
                       // file_put_contents("Profile_update.txt","\n profile upd : ".$profile_pic,FILE_APPEND);
                    	$ext = $model->resume->extensionName;
                    	$new_name = Yii::app()->user->getID()."_user_resume.".$ext;
                        move_uploaded_file($eresume->tempName,"./resume/".$new_name);
						$model->resume = $new_name;
            }
            else
            {
            	$model->resume = $_POST['old_resume'];
            }
			if($model->save())
				{
					echo "saved";
					//$this->redirect(array('admin'));
				}
		}

		$this->render('edit',array(
			'model'=>$model,
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
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
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
		$model=Employee::model()->findBySql("Select * from employee1 where UID=".$id);
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
/*	public function actionProfile()    
	{
     //if ($ID = null)    { 
            $user=user::model()->find(':ID=ID', array('ID'=>Yii::app()->user->getID()));
     //}
      $this->render('profile', array('user'=>$user,));     
     
 	}*/

 	/*public function actionProfile()
	{
		$id = Yii::app()->user->getId();
		$this->render('profile',array(
			'model'=>$this->loadEmployeeModel($id),
		));
	}*/

	public function actionProfile($id)
	{
		if(!$id)
		{
			$id = Yii::app()->user->getId();
		}
			$this->render('profile',array(
			'model'=>$this->loadEmployeeModel($id),
			));
		
	}

 	public function actionRegistration() {
        
        $model = new RegistrationForm;
        
        if (isset($_POST['RegistrationForm'])) {
              $model->attributes = $_POST['RegistrationForm'];
              if ($model->validate()) {       //generate activation key
               $activationKey = mt_rand() . mt_rand() . mt_rand() . mt_rand();
                // $model->activationKey= mt_rand() . mt_rand() . mt_rand() . mt_rand() . mt_rand();
                        $key = 'AG*@#(129)!@K.><>]{[|sd`rjenfla0847&($#)!$Masdc$#@';
                        $pwd = hash('sha512', $key . ($model->password));
                        $pwd = substr($pwd, 0, 100);
                        
                        $record = new user;  // Save into user

                        $record->username = $model->username;
                        $record->password = $pwd;
                        $record->name = $model->name;
                        $record->email = $model->email;
                        $record->activation_key = $activationKey;
                        if($record->save())	{
                               
                        		$uid = Yii::app()->db->getLastInsertID();
                        		$name = $model->name;
                        		$email = $model->email;
                        		$date = new DateTime();
								echo $date->getTimestamp();
                        		$command = Yii::app()->db->createCommand();
                        		if($command->insert('employee1', array(
	                                'UID' => $uid,
			                        'fname' => $name, 
			                        'email' => $email,
			                      			                        
                    			)))
                        		{
                        			Yii::import('ext.yii-mail.YiiMailMessage');
									                        		
	                                $message = new YiiMailMessage;
	                                $baseUrl = Yii::app()->request->baseUrl;
	                                $serverPath = 'localhost/yii/uStyle';
	                                $verification_link = Yii::app()->getBaseUrl(true).'/user/verify/code/'.$activationKey;
	                                $body = "Hi <font type=\"bold\">" . $record->name . "</font><br>
	                                <br>
	                                Welcome to StartUp Jobs Asia! Your account <font type=\"bold\">" . $record->username . "</font> has been registered.<br>
	                                <br>
	                                In order to ensure that you have received this confirmation, we ask that you follow the link below and confirm that this is in fact the correct email address.<br>
	                                <br>
	                                <a href='".$verification_link."'>Verify Your Email Here</a><br>
	                                <br>
	                                Accounts that have not been confirmed will be deactivated and removed from our system within 7 days, including all email addresses.<br> 
	                                <br>
	                                If you have NOT attempted to create an account at startupjobs please ignore this email - it might have been sent because someone mistyped his/her own email address.<br>
	                                THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!<br>
	                                <br>
	                                -------------<br>
	                                StartUp Jobs Asia Team";
	                                $message->setBody($body, 'text/html');
	                                $message->subject = "StartUp Jobs Asia Account Verification";
	                                $message->addTo($model->email);
	                                $message->from = 'noreply@StartUpJobsAsia.com';
	                                Yii::app()->mail->send($message);
	                                $this->redirect(array('site/page', 'view' => 'success'));
                                }
			}
		}
        }
        $this->render('registration', array('model' => $model));
    }

    public function actionVerify($code) {
        //if ($user = user::model()->find('activationKey=:activationKey', array('activationKey' => $code))) {
           // $user->activationKey = '0';
          $code = $_GET['code'];

		if($user_id = Yii::app()->db->createCommand()
                                    ->select('id')
                                    ->from('user1')
                                    ->where('activation_key=:key',array(':key'=>$code))
                                   ->queryAll())
            	{
	            	if($register_status = Yii::app()->db->createCommand()
                                    ->select('registered')
                                    ->from('employee1')
                                    ->where('UID=:id', array(':id'=>$user_id[0]['id']))
                                   ->queryAll())
	            	{
	            		if($register_status[0]['registered'] == '0')
	            		{	            	
			            	$command = Yii::app()->db->createCommand();
			            	if($command->update('employee1', array(                    
			                    'registered' => '1',                     
			                ),  'UID=:id', array(':id'=>$user_id[0]['id'])))
			            	{  
			            		echo "account activated!";	
			            		$this->redirect(array('site/page', 'view' => 'verifyUser','status'=> '1'));
			            	}
			            }
			            else
			            {
			            	echo "account already activated!";	
			            	$this->redirect(array('site/page', 'view' => 'verifyUser','status'=> '2'));
			            }
		            }
		           // $this->redirect(array('site/page', 'view' => 'verify'));
		        }
		        else
	            {
	            	echo "varification code not found!";
	            	$this->redirect(array('site/page', 'view' => 'verifyUser','status'=> '3'));
	            }

	        $this->render('verify', array('model' => $model));    
    }

    public function actionForgetPassword() {
        $model = new forgetPassword;

        if (isset($_POST['forgetPassword'])) {
            $model->attributes = $_POST['forgetPassword'];

            if ($user = user::model()->find('email=:email', array('email' => $model->email))) {

                $pwd1 = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789', 6)), 0, 6);
                $key = 'AG*@#(129)!@K.><>]{[|sd`rjenfla0847&($#)!$Masdc$#@';
                $pwd = hash('sha512', $key . ($pwd1));
                $pwd = substr($pwd, 0, 100);
                $user->password = $pwd;
                $user->save();

                $message = new YiiMailMessage;
                $baseUrl = Yii::app()->request->baseUrl;
                $serverPath = 'localhost/yii/uStyle';
                $body = "Hi <font type=\"bold\">" . $user->name . "</font><br>
                        <br>
                        Your account <font type=\"bold\">" . $member->username . "</font>'s password has been reset.<br>
                        <br>
                        This is your new password : ".$pwd1."<br>
                        <br>
                        ------------------------------------------------------------------------<br>
                        THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!<br>
                        ------------------------------------------------------------------------<br>
                        <br>
                        -------------<br>
                        uStyle Team";
                $message->setBody($body, 'text/html');
                $message->subject = "uStyle Account Verification";
                $message->addTo($model->email);
                $message->from = 'noreply@uStyle.com';
                Yii::app()->mail->send($message);
                $this->redirect(array('site/page', 'view' => 'sentmail'));
            }
            $this->redirect(array('site/page', 'view' => 'emailNotFound'));
        }
        $this->render('forgetPassword', array('model' => $model));
    }


}
