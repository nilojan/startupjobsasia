<?php

class UserController extends Controller
{   public function filters()   {
        return array( 'accessControl' ); // perform access control for CRUD operations
    }
 
    public function accessRules()   {
        return array(
           
            array('allow', // allow authenticated users to access all actions
                 'roles'=>array('1','2','0'),
            // 'users' => array('*'),
                ),
            array('allow',
                  'actions'=>array('depositResume'),
                  'users'=>array('*'),  
                 ),
            array('deny',
                  'users'=>array('*'),
                ),
           
			// array('deny'),
            //     'users'=>array('*'),
        );
    }
    // 2 versions of resume are stored
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
        
    public function actionApplication() {
		$this->render('application');
    }
    
   
    public function actionApplyJob($JID) {
        //active record involved user, application, job
       $model = new ApplyJobForm;
       $ID = Yii::app()->user->getID();
       $user = user::model()->find('ID=:ID',array('ID'=>$ID));
       $model->coverLetter = str_replace('<br />', "", $user->coverLetter);
            if (isset($_POST['ApplyJobForm'])) {
                //check if applied
                $model->attributes = $_POST['ApplyJobForm'];
                if ($model->validate()) {
                    $check = application::model()->find(':ID=ID&&:JID=JID',array(':ID'=>$ID,':JID'=>$JID));
                    $uploadedFile=CUploadedFile::getInstance($model,'resume');
                // if the user did not upload a file and also no resume stored
                     if ($check!=null||(empty($uploadfile)&&($user->resume == null)))  {    // already applied to the job
                             $this->redirect(array('site/page', 'view'=>'error'));
                     }
                // redirect if no resume is found
                    else {
                        $oldfilename = $user->resume;
                        $application = new application;
                        $job = job::model()->find('JID=:JID', array('JID' => $JID));
                    
                        $user->coverLetter = nl2br($model->coverLetter);
                        $application->cover_letter = nl2br($model->coverLetter);
                        $application->ID =$ID;
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
                                    $fileName = $application->ID.'-'.$user->resume;
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
    
public function actionChangePassword()  {
        $model = new EditProfileForm;
        $user=user::model()->find(':ID=ID', array('ID'=>Yii::app()->user->getID()));
        //CActiveRecord for old one
        if (isset($_POST['EditProfileForm'])) {
            $pForm->attributes = $_POST['EditProfileForm'];
            $key = 'AG*@#(129)!@K.><>]{[|sd`rjenfla0847&($#)!$Masdc$#@';
            $pwd = hash('sha512', $key . ($model->oldPassword));
            $pwd = substr($pwd, 0, 100);

            $oldPwd = $user->password;
            if ($pwd == $oldPwd) {
                    $pwd1 = hash('sha512', $key . ($model->newPassword));
                    $user->password = substr($pwd1, 0, 100);
                    if ($user->save())  
                        $this->redirect();
                }
            } 
        }
 public function actionProfile()    {
     //if ($ID = null)    { 
            $user=user::model()->find(':ID=ID', array('ID'=>Yii::app()->user->getID()));
     //}
      $this->render('profile', array('user'=>$user,));
     
     
 }

}