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
		$this->render('view',array(
			'model'=>$this->loadEmployeeModel($id),
		));
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

	public function actionEdit($id)
	{
		$model=$this->loadEmployeeModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		
		if(isset($_POST['Employee']))
		{
			$model->attributes=$_POST['Employee'];
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
		$uuid=Yii::app()->user->getID();
		$model=Employee::model()->findBySql("Select * from employee1 where UID=".$uuid);
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
	public function actionProfile()    
	{
     //if ($ID = null)    { 
            $user=user::model()->find(':ID=ID', array('ID'=>Yii::app()->user->getID()));
     //}
      $this->render('profile', array('user'=>$user,));     
     
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
                        if ($record->save())	{
                               
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
