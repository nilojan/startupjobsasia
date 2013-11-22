<?php
class PayController extends Controller  {   
    public function filters(){
        return array( 'accessControl' ); 
    }
 public function accessRules() {
        return array(
             array('allow', // allow only company accounts to access all actions
                  'roles'=>array('2'),
           ),
            array('deny',
                'users'=>array('*')),
        );
    }
public function actionJobPremium($JID)
{


                $job = job::model()->with('company')->find('JID=:JID&&ID=:ID',  array(':JID' => $JID, ':ID'=>Yii::app()->user->getID()));
                $company = company::model()->find('ID=:ID',array(':ID'=>Yii::app()->user->getID()));
               // $user = user::model()->find('ID=:ID',array(':ID'=>Yii::app()->user->getID()));
            if(($company->premium == 1)&&($company->premium_bal>0))
                {               $job->premium = 1;
                                date_default_timezone_set('Asia/Singapore');
                                $date = date('Y-m-d H:i:s');;
                                $job->pre_start_date = $date;
                                $job->save();
                                $company->job_post_balance--;
                                $company->premium_bal--;
                                $company->save();
                }else if($company->premium == 2)
                {
                                $job->premium = 1;
                                date_default_timezone_set('Asia/Singapore');
                                $date = date('Y-m-d H:i:s');;
                                $job->pre_start_date = $date;
                                $job->save();

                }
                $data = array(
                    
                    'job' => $job->title,
                    'job_url' => Yii::app()->getBaseUrl(true).'/job/job?JID='.$job->JID,
                    'company' =>$company->cname,
                    'name' => $company->cname,
                    'to' => $company->cemail,
                );                              
                $sendEmail =  Yii::app()->user->sendEmail('premium_job',$data);

                 $this->redirect(array('job/manageJobs'));
}
 public function actionBuy(){
  
   if(isset($_GET['type']))
   {
      $amount = $_GET['type'];
    if($amount == 'normal')
    {
      $amt = 9.99;
      $id = Yii::app()->user->getID();
      yii::app()->session['company']='normal';
    }else if($amount == 'enterprise'){
      $amt = 30;
      $id = Yii::app()->user->getID();
      yii::app()->session['company']='enterprise';
    }else if($amount == 'addons')
    {
      $amt = 100;
      $id = Yii::app()->user->getID();
      yii::app()->session['company']='enterprise';
    }
    
   }else{
$company = company::model()->find('ID=:ID', array('ID' => Yii::app()->user->getID()));
if(($company->premium == 1 )||($company->premium == 2))
{
    $this->actionJobPremium($_GET['JID']);
    
}
    $amt = 5;
    yii::app()->session['company']='';
    $id = $_GET['JID'];
  
    }

   
        
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
            Yii::app()->session['ID'] = $id;
            /*echo Yii::app()->session['ID'];
            die;*/
            $payPalURL = Yii::app()->Paypal->paypalUrl.$token; 
            $this->redirect($payPalURL); 
        }
    }
    public function actionConfirmPayment()  {
                if(Yii::app()->session['company'] != '')
                {

                    $CID = Yii::app()->session['ID'];
                   
                    $company = company::model()->find('ID=:CID',array(':CID'=>$CID));
                   
                    $user = user::model()->find('ID=:ID',array(':ID'=>Yii::app()->user->getID()));
                   if(Yii::app()->session['company'] = 'normal')
                   {
                        $company->premium = 1;
                        $post_bal = $company->job_post_balance;
                        $post_bal = $post_bal + 10; 
                        $company->job_post_balance = $post_bal;
                        date_default_timezone_set('Asia/Singapore');
                        
                        $company->premium_bal = 10;
                        $company->save();

                    }else if(Yii::app()->session['company'] = 'enterprise')
                    {
                        $company->premium = 2;
                        
                        $company->save();

                    }else if(Yii::app()->session['company'] = 'addons')
                    {

                        $company->addons = 1;
                        $compnay->save();
                    }
                            $user = user::model()->find('role=:role',array(':role'=>1));
                            $data = array(
                                'name' =>  $company->cname,
                                'url' => Yii::app()->getBaseUrl(true).'/company/company/'.$company->CID,
                                'company' =>  $company->cname,
                                'plan' => Yii::app()->session['company'],
                                'to' => $company->cemail,
                                 );    

                     $dataAdmin = array(
                            'name' =>  $company->cname,
                            'url' => Yii::app()->getBaseUrl(true).'/company/company/'.$company->CID,
                            'company' =>  $company->cname,
                            'plan' => Yii::app()->session['company'],
                            'username' => $user->username,
                            'to' => $user->email,
                            );                       
                $sendEmail =  Yii::app()->user->sendEmail('startup_premium',$data);
                $senAdmindEmail =  Yii::app()->user->sendEmail('startup_premium',$dataAdmin);
                Yii::app()->session['ID'] = null;
                yii::app()->session['company']='';
               // var_dump($sendEmail); die;
                $this->redirect(array('site/page/view/Activate'));
                //$this->render('confirm');
                //$this->redirect(array('site/page','view'=>'success'));
        
                }else{

                 $JID = Yii::app()->session['ID'];

               // echo $JID;
                //$job = job::model()->find('JID=:JID',  array('JID' => $JID, ));
                $job = job::model()->with('company')->find('JID=:JID&&ID=:ID',  array(':JID' => $JID, ':ID'=>Yii::app()->user->getID()));
                $company = company::model()->find('CID=:CID',array(':CID'=>$job->CID));
                $user = user::model()->find('ID=:ID',array(':ID'=>Yii::app()->user->getID()));
                $job->premium = 1;
                date_default_timezone_set('Asia/Singapore');
                $date = date('Y-m-d H:i:s');;
                $job->pre_start_date = $date;
                $job->save();

                $data = array(
                    
                    'job' => $job->title,
                    'job_url' => Yii::app()->getBaseUrl(true).'/job/job?JID='.$job->JID,
                    'company' =>  $company->cname,
                    'username' => $user->username,
                    'to' => $user->email,
                );                              
                $sendEmail =  Yii::app()->user->sendEmail('startup_premium',$data);
                Yii::app()->session['JID'] = null;
               // var_dump($sendEmail); die;
                $this->redirect(array('job/manageJobs'));
                //$this->render('confirm');
                //$this->redirect(array('site/page','view'=>'success'));


                }
                
               
    }

}
?>