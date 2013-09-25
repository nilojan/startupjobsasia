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
 
  
           
    public function actionCompany($id) {
      if(!(Yii::app()->user->isAdmin()))
      {
         $id = Yii::app()->user->getID();
      }
        

        $company = company::model()->find('ID=:ID', array('ID' => $id));
        
        $this->actionView($company->CID);
    }

    public function actionView($CID) {
        $company = company::model()->find('CID=:CID', array('CID' => $CID));
        $job=job::model()->findAll('CID=:CID',array('CID'=>$CID,));

        $this->render('view', array('company' => $company,
                                     'job'=>$job));
    }
    
    public function actionUpdate($id) {
      if(!(yii::app()->user->isAdmin()))
      {
        
        $id = Yii::app()->user->getID();
      }
        
        $CForm = new updateForm;
        $company = company::model()->find('ID=:ID', array('ID' => $id));
        //CActiveRecord for old one

        $CForm->attributes = $company->attributes;
        $CForm->address = str_replace('<br />', "", $company->address);
        $CForm->mission = str_replace('<br />', "", $company->mission);
        $CForm->culture = str_replace('<br />', "", $company->culture);
        $CForm->benefits = str_replace('<br />', "", $company->benefits);
        $CForm->website = $company->website;
        $CForm->facebook = $company->facebook;
        $CForm->summary = $company->summary;
        $CForm->awards = $company->awards;
        
        if (isset($_POST['UpdateForm'])) {
                   $CForm->attributes = $_POST['UpdateForm'];
                   $CForm->website = $_POST['UpdateForm']['website'];
                   $CForm->facebook = $_POST['UpdateForm']['facebook'];
                   $CForm->summary = $_POST['UpdateForm']['summary'];
                   $CForm->awards = $_POST['UpdateForm']['awards'];
                   if ($CForm->validate()) {
                    $company->cname = $CForm->cname;
					         $company->website = $CForm->website;
					         $company->facebook = $CForm->facebook;
                   $company->summary = $CForm->summary;
                   $company->awards = $CForm->awards;

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
                         if(!(yii::app()->user->isAdmin()))
                         {
                           $this->redirect(array('company/Company'));
                         }else{
                           $this->redirect(array('admin/startup/'.$company->ID));
                         }
                    
                   }      
                    
                    
                    }             
       
           $this->render('update', array('CForm' => $CForm, 
                                         'company' => $company, ));
    }
    //upgrade company account TBD    
    public function actionUpgrade() {
            
            
            $this->render('upgrade');
    }
     public function actionPremium() {
            
            
            $this->render('premium');
    }
    public function actionDashboard() {
            
            
            $this->render('Dashboard');
    }
       
   public function actionApplication()  {
            $company = company::model()->find('ID=:ID', array('ID' => Yii::app()->user->getID()));
        
            $this->render('application',array('company' => $company));
   }


   public function actionBuy(){
  
   if(isset($_GET['amt']))
   {
      $amount = $_GET['amt'];
    if($amount == 'normal')
    {
      $amt = 9.99;
      $id = Yii::app()->user->getID();
    }else if($amount == 'enterprise'){
      $amt = 30;
      $id = Yii::app()->user->getID();
    }else if($amount == 'elite')
    {
      $amt = 100;
      $id = Yii::app()->user->getID();
    }
    
   }else{
    $amt = 5;
      $id = $_GET['JID'];
   }

   var_dump($_GET);

    die;
        
        
        $paymentInfo['Order']['theTotal'] = $amt;
        $paymentInfo['Order']['description'] = "Some payment description here";
        $paymentInfo['Order']['quantity'] = '1';
 
        // call paypal 
        $result = Yii::app()->Paypal->SetExpressCheckout($paymentInfo); 
        //Detect Errors 
        if(!Yii::app()->Paypal->isCallSucceeded($result)){ 
            if(Yii::app()->Paypal->apiLive === true){
                //Live mode basic error message
                $error = 'We were unable to process your request. Please try again later';
            }else{
                //Sandbox output the actual error message to dive in.
                $error = $result['L_LONGMESSAGE0'];
            }
            echo $error;
            Yii::app()->end();
 
        }else { 
            // send user to paypal 
            $token = urldecode($result["TOKEN"]); 
            Yii::app()->session['ID'] = $cid;
            $payPalURL = Yii::app()->Paypal->paypalUrl.$token; 
            $this->redirect($payPalURL); 
        }
    }
 
public function actionConfirmPayment()  {
                $CID = Yii::app()->session['CID'];
               // echo $JID;
                //$job = job::model()->find('JID=:JID',  array('JID' => $JID, ));
                //$job = job::model()->with('company')->find('JID=:JID&&ID=:ID',  array(':JID' => $JID, ':ID'=>Yii::app()->user->getID()));
                $company = company::model()->find('CID=:CID',array(':CID'=>$CID));
                $user = user::model()->find('ID=:ID',array(':ID'=>Yii::app()->user->getID()));
                $company->premium = 1;
                $post_bal = $company->job_post_balance;
                $post_bal = $post_bal + 10; 
                $company->job_post_balance = $post_bal;
                $company->save();

                $data = array(
                    'name' => $company->cname,
                    'job_url' => Yii::app()->getBaseUrl(true).'/company/company/'.$company->CID,
                    'company' =>  $company->cname,
                    'username' => $user->username,
                    'to' => $user->email,
                );                              
                $sendEmail =  Yii::app()->user->sendEmail('startup_premium',$data);
                Yii::app()->session['CID'] = null;
               // var_dump($sendEmail); die;
                $this->redirect(array('company/manageJobs'));
                //$this->render('confirm');
                //$this->redirect(array('site/page','view'=>'success'));
    }
   public function actionRegistration() {
            
          $model  = new StartupRegistrationForm;
           // $model = new CompanyForm;
            /*if (isset($_POST['CompanyForm'])) {
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
                            $adminData = user::model()->findAll('role=:role',array('role'=>1));
                                $datastartup=  array(
                                   'name'=> 'admin',
                                   'company' =>$company->cname,
                                   'to'=>$adminData[0]['email'],
                                     );
                                  $sendEmail= yii::app()->user->sendEmail('startup_registration',$datastartup);


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
   
  
 