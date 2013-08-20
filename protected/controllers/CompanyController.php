<?php

class CompanyController extends Controller  {   
    public function filters(){
        return array( 'accessControl' ); 
    }
 
    public function accessRules() {
        return array(
             array('allow', // allow only company accounts to access all actions
                  'roles'=>array('2'),
           ),
            array('allow',  // allow all users to view company account
                  'actions'=>array('view','registration'),
                  'users'=>array('*'),
                ),
            array('deny',
                'users'=>array('*')),
        );
    }
 
  
           
    public function actionCompany() {
        $ID = Yii::app()->user->getID();
        $company = company::model()->find('ID=:ID', array('ID' => $ID));
        $this->actionView($company->CID);
    }

    public function actionView($CID) {
        $company = company::model()->find('CID=:CID', array('CID' => $CID));
        $job=job::model()->findAll('CID=:CID',array('CID'=>$CID,));

        $this->render('view', array('company' => $company,
                                     'job'=>$job));
    }
    
    public function actionUpdate() {
        $ID = Yii::app()->user->getID();
        $CForm = new UpdateForm;
        $company = company::model()->find('ID=:ID', array('ID' => $ID));
        //CActiveRecord for old one
        $CForm->attributes = $company->attributes;
        $CForm->address = str_replace('<br />', "", $company->address);
        $CForm->mission = str_replace('<br />', "", $company->mission);
        $CForm->culture = str_replace('<br />', "", $company->culture);
        $CForm->benefits = str_replace('<br />', "", $company->benefits);
        
        if (isset($_POST['UpdateForm'])) {
                   $CForm->attributes = $_POST['UpdateForm'];
                   if ($CForm->validate()) {
                    $company->cname = $CForm->cname;
					$company->website = $CForm->website;
					$company->facebook = $CForm->facebook;
					
                    $company->culture = nl2br($CForm ->culture);
                    $company->benefits = nl2br($CForm ->benefits);
                    $company->mission = nl2br($CForm->mission);
                    $company->address = nl2br($CForm->address);
                    $company->privacy = $CForm->privacy;
					
                    $company->contact=$CForm->contact;
                    $uploadedFile=CUploadedFile::getInstance($CForm,'image');
                    $uploadedFile2=CUploadedFile::getInstance($CForm,'coverpicture');
                    $oldfilename = $company->image;
                    $oldfilename2 = $company->coverpicture;
                    
                    if (!empty($uploadedFile)) {      
                                    $fileName = str_replace(' ', '',"{$company->CID}-{$uploadedFile}");  // random number + file name
                                    $company->image = $fileName;
                         }
                    if (!empty($uploadedFile2)) {      
                                    $fileName2 = str_replace(' ', '',"{$company->CID}-{$uploadedFile2}");  // random number + file name
                                    $company->coverpicture = $fileName2;
                         }          
                         
                     if ($company->save())   {
                         if (!empty($uploadedFile)) {      
                                $uploadedFile->saveAs(Yii::app()->basepath.'/../images/company/'.$fileName);
                                $image = Yii::app()->image->load(Yii::app()->basepath.'/../images/company/'.$fileName);
                                $image->resize(180, 180);
                                $image->save(Yii::app()->basepath.'/../images/company/180/'.$fileName);
                                
                                if ($oldfilename != $fileName && $oldfilename !=null) {
                                        unlink(Yii::app()->basePath . '/../images/company/' . $oldfilename);// image will uplode to rootDirectory/banner    
                                }    
                         }       
                         if (!empty($uploadedFile2)) {      
                                $uploadedFile2->saveAs(Yii::app()->basepath.'/../images/cover/'.$fileName2);
                                if ($oldfilename2 != $fileName2 && $oldfilename !=null) {
                                        unlink(Yii::app()->basePath . '/../images/cover/' . $oldfilename2);// image will uplode to rootDirectory/banner    
                                }               
                                        
                         }   
                     }    
                   
                     $this->redirect(array('company/Company'));
                   }      
                    
                    
                    }             
       
           $this->render('update', array('CForm' => $CForm, 
                                         'company' => $company, ));
    }
    //upgrade company account TBD    
    public function actionUpgrade() {
            
            
            $this->render('upgrade');
    }
       
   public function actionApplication()  {
            $company = company::model()->find('ID=:ID', array('ID' => Yii::app()->user->getID()));
        
            $this->render('application',array('company' => $company));
   }

   public function actionRegistration() {
<<<<<<< HEAD
            $model = new CompanyForm;
            if (isset($_POST['CompanyForm'])) {
=======
            
          $model  = new StartupRegistrationForm;
           // $model = new CompanyForm;
            /*if (isset($_POST['CompanyForm'])) {
>>>>>>> viv_changes
                  $model->attributes = $_POST['CompanyForm'];
                  if ($model->validate())   {  
                  $ID = Yii::app()->user->getID();*/

          if (isset($_POST['StartupRegistrationForm'])) {
              $model->attributes = $_POST['StartupRegistrationForm'];
              if ($model->validate()) {       //generate activation key
               $activationKey = mt_rand() . mt_rand() . mt_rand() . mt_rand();
                // $model->activationKey= mt_rand() . mt_rand() . mt_rand() . mt_rand() . mt_rand();
                        $key = 'AG*@#(129)!@K.><>]{[|sd`rjenfla0847&($#)!$Masdc$#@';
                        $pwd = hash('sha512', $key . ($model->password));
                        $pwd = substr($pwd, 0, 100);

                     //generate activation ke
                        $record = new user;  // Save into user

                        $record->username = $model->username;
                        $record->password = $pwd;
                        $record->name = $model->cname;
                        $record->email = $model->cemail;
                        $record->activation_key = $activationKey;
                        $record->role = 2;
                        if($record->save()) {
                          $uid = Yii::app()->db->getLastInsertID();
                          $company = new company;                 
                          $company->ID = $uid;
                          $company->address = $model->address;
                          $company->contact = $model->contact;
                          $company->cname = $model->cname;
                          $company->mission = nl2br($model->mission);
                          $company->cemail = $model->cemail;
                          $company->status = 0;
                          $uploadedFile=CUploadedFile::getInstance($model,'image');
                          if (!empty($uploadedFile)) {
                                    $fileName = "{$company->ID}-{$uploadedFile}";  // random number + file name
                                    $company->image = $fileName;
                                      // image will uplode to rootDirectory/banner    
                          }              
                          if ($company->save()) {
                                    if (!empty($uploadedFile)) {
                                            $uploadedFile->saveAs(Yii::app()->basepath.'/../images/company/'.$fileName);
                                          $this->redirect(array('site/page', 'view' => 'success'));  
                                    }
                          } 

                          
                          //$record->CID = $company->CID;
                         // $record->save(); 
                                            
                  /*$user=user::model()->find(':ID=ID', array('ID'=>$ID));
                  $user->role = 2;
                  $user->CID = $company->CID;
                  $user->save();*/

                
                  /*$approve = new approve; 
                  $approve->CID = $company->CID;
                  if ($approve->save())
                            $this->redirect(array('company/company')); */
            
                  } } 
            }
        $this->render('registration', array('model' => $model));
    }
        

}
   
  
 