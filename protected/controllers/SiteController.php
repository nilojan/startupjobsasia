<?php

class SiteController extends Controller
{
	public function actions()   {
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',),);
	}
	public function actionIndex()   {
		$this->render('index');
	}
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()   {
		if($error=Yii::app()->errorHandler->error)  {
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
        public function actionContact() {
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))    {
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())  {
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					 "Reply-To: {$model->email}\r\n".
					 "MIME-Version: 1.0\r\n".
					 "Content-type: text/plain; charset=UTF-8";
                                mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}
        public function actionLogin() {
                $model = new LoginForm;
                // if it is ajax validation request
                if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                       
                }
                // collect user input data
                if (isset($_POST['LoginForm'])) {
                        $model->attributes = $_POST['LoginForm'];
                // validate user input and redirect to the previous page if valid
                        if ($model->validate()) {

                       // if ($employee->activationKey != 0) {
                         //   $this->redirect(array('registration/resend?memberEmail='.$member->email));
                        //} else {
                            $user =user::model()->find('username=:username', array('username' => $model->username));
                            $user ->last_login = new CDbExpression('NOW()');
                            $user->save();
                            $returnUrl = Yii::app()->user->returnUrl;
                            $model->login();
                            if($returnUrl == '/yii/suj/index.php')
                                    $this->redirect(array('site/index'));
                            
                            Yii::app()->request->redirect($returnUrl);
                        }
                }
        $this->render('login', array('model' => $model));
    }

      
      public function actionLogout()  {
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
      public function actionLatest() {
            $this->render('latest');
      }
         
      public function actionFullTime() {
        $location = '';
       // var_dump($_GET);
        if(isset($_GET['loc']) && $_GET['loc'] != '')
        {
            $location = $_GET['loc'];
        }
        $this->render('Full-time', array('location' => $location));
         //  $this->render('fullTime', array('posts' => $post));
           
       }
      public function actionPartTime() {
        
         $this->render('Part-time');
       }
      public function actionTemporary() {
       
         $this->render('temporary');
       }  
      public function actionInternship() {
         
         $this->render('internship');
       }
      /*public function actionLocation() {

         var_dump($_GET);
         
         $this->render('location');
       }*/	

      public function actionJobs() {

         $location = $_GET['location'];
         
         $this->render('location',array('location'=>$location));
       } 

     public function actionFreeLance() {
        $PAGE_SIZE = 10; 
        $model=new job();
        $criteria=new CDbCriteria;
        //  $criteria->order = 'created DESC';
        $type = "Freelance";
        $criteria->condition='type=:type';
        $criteria->params=array(':type'=>$type);
        $total = $model->count($criteria);
        $pages=new CPagination($total);
        $pages->pageSize=10;
        $pages->applyLimit($criteria);
        $list = $model->findAll($criteria);
        //$criteria=new CDbCriteria;
        //$posts=job::model()->with('company')->findAll($criteria);
        $this->render('freelance',array('list'=>$list,
                                        'pages'=>$pages,));
       }
      public function actionForgetPassword() {
        $forget = new forgetPassword;

        if (isset($_POST['forgetPassword'])) {
            $forget->attributes = $_POST['forgetPassword'];

            if ($user = user::model()->find('email=:email', array('email' => $forget->email))) {

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
                $message->from = 'noreply@startupjobs.asia';
                Yii::app()->mail->send($message);
                $this->redirect(array('site/page', 'view' => 'sentmail'));
            }
            $this->redirect(array('site/page', 'view' => 'emailNotFound'));
        }
        $this->render('forgetPassword', array('forget' => $forget));
    }   
    public function actionFeeds()    {

        $this->render('feeds'); 
                    //array('feed'=>$feed));
        
    }
    
        //  resume are stored
    public function actionDeposit_Resume()   {
             $model = new DepositResume();
             
             if (isset($_POST['DepositResume'])) {
                 $model->attributes = $_POST['DepositResume'];
                 if ($model->validate()) {
					
					$record = new resume;
                    
					$record->fullname = $model->fullname;
					$record->dob = $model->dob;
					$record->gender = $model->gender;
					$record->email = $model->email;
					$record->location = $model->location;
					$record->contact = $model->contact;
					$record->edu = $model->edu;
					$record->national = $model->national;
					$record->coverletter = "blah";
					
                    $uploadedFile=CUploadedFile::getInstance($model,'resume');
                    $uploadedPhoto=CUploadedFile::getInstance($model,'photo');
					
					$newFilePath = Yii::app()->basepath.'/../resume/'.$uploadedFile;
					$uploadSuccess = $uploadedFile->saveAs($newFilePath);
					
					if (!$uploadSuccess) {
					   throw new CHttpException('Error uploading file.');  
					}

					$Content = file_get_contents($newFilePath);
					$Content = preg_replace('/[^a-zA-Z0-9\s]+/', ' ', $Content);
					//unlink($newFilePath);
					$record->content = $Content;
					
					
                    //$user->coverLetter = nl2br($model->coverLetter);    //cannot safe cover letter very strange
                    //resume -> uploaded resume, resume2 -> resume;
                    if (!empty($uploadedFile)) {      //uploaded file is not empty
                                    $fileName = str_replace(' ', '-', "{$model->fullname}-{$uploadedFile}");  // random number + file name
									$record->resume = $fileName;
                                   // $user->resume = $fileName;
                                   // $user->resume2= $oldfilename;
                    }
                    if (!empty($uploadedPhoto)) {   // photo is not empty
                                    $photoName = str_replace(' ', '-', "{$model->fullname}-{$uploadedPhoto}");
									$record->photo = $photoName;
                                    //$user->photo = $photoName;                                    
                    }
                     if ($record->save())   {
                         if (!empty($uploadedFile)) {
                                $uploadedFile->saveAs(Yii::app()->basepath.'/../resume/'.$fileName);  // image will uplode to rootDirectory/banner    
                                 //if ($oldfilename != $fileName) {
                                 //       if ($oldfilename2 != null && $oldfilename2 != $fileName )  //delete the file
                                 //               unlink(Yii::app()->basePath . '/../resume/' . $oldfilename2);// image will uplode to rootDirectory/banner    
                                //}            
                         }   
                          if (!empty($uploadedPhoto)) {
                               $uploadedPhoto->saveAs(Yii::app()->basepath.'/../images/profile/'.$photoName);  
                                        //if ($oldphotoname != $photoName && $oldphotoname !=null) {
                                        //        unlink(Yii::app()->basePath . '/../images/profile/' . $oldphotoname);
                                        //}
                          }
                         
                    }
				Yii::app()->user->setFlash('deposit','Thank you for Uploading your Resume with us.');
				$this->refresh();
				
                 } 
				 				
             }
             $this->render('deposit', array('model'=>$model));

    }
}