<?php

class AdminController extends Controller
{
     public function filters()  {
        return array( 'accessControl' ); // perform access control for CRUD operations
    }
 
    public function accessRules()   {
        return array(
            array('allow', // allow authenticated users to access all actions
                  'roles'=>array('1'),
            ),
            array('deny',
                'users'=>array('*')),
        );
    }    
    
    public function actionManage() {
          
          $this->render('jobs');
          
    }
    public function actionUser() {
          
          $this->render('user');
          
    }

    public function actionEditJobStatus($JID) {
          
       $job = job::model()->find('JID=:JID',array(':JID'=>$JID));
       if($job->status == 0)
       {
          $job->status = 1;
       }
       else if($job->status == 1)
       {
          $job->status = 0;
       }
         
         if($job->save())
         {
          $this->redirect(array('admin/manage'));
         } 

    }

    public function actionApprove($CID)   {
                $company = company::model()->find('CID=:CID',array(':CID'=>$CID));
                $company->status = 1;
                $company->save();
                $approve = approve::model()->find('CID=:CID',array(':CID'=>$CID));
                $approve -> approved = new CDbExpression('NOW()');
               // $approve ->status = 1;
                if ($approve->save())
                      $message = new YiiMailMessage;
                      $serverPath = 'localhost/yii/uStyle';
                      $body = "Hi <font type=\"bold\">" . $company->cname . "</font><br>
                              <br>
                              Welcome to StartUp Jobs Asia! Your coporate account <font type=\"bold\">" . $company->cname . "</font> has been approved.<br>
                              <br>
                              You may start posting jobs
                              <br>
                              If you have NOT attempted to create an account at uStyle please ignore this email - it might have been sent because someone mistyped his/her own email address.<br>
                              THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!<br>
                              <br>
                              -------------<br>
                              StartUp Jobs Asia Team";
                      $message->setBody($body, 'text/html');
                      $message->subject = "StartUp Jobs Asia Coporate Accounts";

                     $message->addTo($company->cemail);
                     $message->from = 'noreply@startupjobs.asia';
                     Yii::app()->mail->send($message);
                     $this->redirect(array('admin/manage'));
              
    }

    public function actionModify($id) {
                $this->redirect(array('admin/setAdmin','id'=>$id));
    }
    
    public function actionSetAdmin($id) {
                $model= new setAdmin;
                $record = member::model()->find('profileID=:profileID', array('profileID' => $id));
                $model->attributes=$record->attributes;
                
                if (isset($_POST['setAdmin']))   {
                $model->attributes =$_POST['setAdmin'];
                $record->role=$model->role;
                
                if($record->save()) {
                    $this->redirect(array('admin/manage'));
                }    
                }
                $this->render('setAdmin',array('model'=>$model));
                        
    }

    public function actiontransaction() {
        $this->render("transaction");
    }
    
}
?>