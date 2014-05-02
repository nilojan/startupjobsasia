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
                {
					$job->premium = 1;
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
				$amt = 13.99;
				$id = Yii::app()->user->getID();
				yii::app()->session['company']='normal';
				
			}else if($amount == 'enterprise'){
			
				$amt = 30;
				$id = Yii::app()->user->getID();
				yii::app()->session['company']='enterprise';
				
			}else if($amount == 'addons'){
			
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
			
			$amt = 13.99;
			yii::app()->session['company']='';
			$id = $_GET['JID'];
  
		}

   
        
        $paymentInfo['Order']['theTotal'] = $amt;
		Yii::app()->session['theTotal'] = $amt;
        $paymentInfo['Order']['description'] = "Featured Job (ID : ".$id.")";
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
	
	
    public function actionConfirmpayment(){
	
		$token = trim($_GET['token']);
		$payerId = trim($_GET['PayerID']);		
		
		$result = Yii::app()->Paypal->GetExpressCheckoutDetails($token);

		$result['PAYERID'] = $payerId; 
		$result['TOKEN'] = $token; 
		//$result['ORDERTOTAL'] = 0.00;
		$result['ORDERTOTAL'] = Yii::app()->session['theTotal'];		

		//	echo "<pre>";
		//	print_r($result);
		//	echo "</pre>";
			
		//exit;
		if(!Yii::app()->Paypal->isCallSucceeded($result)){ 
			if(Yii::app()->Paypal->apiLive === true){
				//Live mode basic error message
				$error = 'We were unable to process your request. Please try again later - call failed';
				//$error .= APIError();
			}else{
				//Sandbox output the actual error message to dive in.
				$error = $result['L_LONGMESSAGE0'];
			}
			echo $error;
			Yii::app()->end();
		}else{ 
			
			$paymentResult = Yii::app()->Paypal->DoExpressCheckoutPayment($result);
			//Detect errors  
			if(!Yii::app()->Paypal->isCallSucceeded($paymentResult)){
				if(Yii::app()->Paypal->apiLive === true){
					//Live mode basic error message
					$error = 'We were unable to process your request. Please try again later - express';
					//$error .= APIError();
				}else{
					//Sandbox output the actual error message to dive in.
					$error = $paymentResult['L_LONGMESSAGE0'];
				}
				echo $error;
				Yii::app()->end();
			}else{
				//payment was completed successfully
				
				//$this->render('confirm');

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
                                'url' => Yii::app()->getBaseUrl(true).'/company/view/CID/'.$company->CID,
                                'company' =>  $company->cname,
                                'plan' => Yii::app()->session['company'],
                                'to' => $company->cemail,
                                 );
								 
                $sendEmail =  Yii::app()->user->sendEmail('startup_premium',$data);
                $senAdmindEmail =  Yii::app()->user->sendEmail('startup_premium_admin',$data);
                Yii::app()->session['ID'] = null;
                yii::app()->session['company']='';
				
               // var_dump($sendEmail); die;
                $this->redirect(array('site/page/view/Activate'));
                //$this->render('confirm');
                //$this->redirect(array('site/page','view'=>'success'));
        
            }else{

				$JID = Yii::app()->session['ID'];

				// echo $JID;
				 //exit;
                //$job = job::model()->find('JID=:JID',  array('JID' => $JID, ));
                $job = job::model()->with('company')->find('JID=:JID&&ID=:ID',  array(':JID' => $JID, ':ID'=>Yii::app()->user->getID()));
                $company = company::model()->find('CID=:CID',array(':CID'=>$job->CID));
                $user = user::model()->find('ID=:ID',array(':ID'=>Yii::app()->user->getID()));
                $job->premium = 1;
                date_default_timezone_set('Asia/Singapore');
                $date = date('Y-m-d H:i:s');
                $job->pre_start_date = $date;
				
				$end_datee = strtotime("$date +1 months");
				$end_date = date('Y-m-d H:i:s',$end_datee);
				$job->pre_end_date = $end_date;
				
                if($job->save(false)){

					$data = array(
						
						'job' => $job->title,
						'job_url' => Yii::app()->getBaseUrl(true).'/job/job?JID='.$job->JID,
						'url' => Yii::app()->getBaseUrl(true).'/company/view/CID/'.$company->CID,
						'company' =>  $company->cname,
						'username' => $user->username,
						'to' => $company->cemail,
					);
					
								//echo "<pre>";
								//print_r($data);
								//echo "</pre>";
		
					//exit;
					$sendEmail =  Yii::app()->user->sendEmail('startup_premium',$data);
					$senAdmindEmail =  Yii::app()->user->sendEmail('startup_premium_admin',$data);
					
					Yii::app()->session['JID'] = null;
					Yii::app()->session['ID'] = null;
					Yii::app()->user->setFlash('success', '<div class="alert in alert-block fade alert-success"><a class="close" data-dismiss="alert">×</a><strong>Success!</strong> Your jobs is added featured job.</div>');
				}else{
					Yii::app()->user->setFlash('error', '<div class="alert in alert-block fade alert-error"><a class="close" data-dismiss="alert">×</a><strong>Sorry!</strong> Failed to add as featured job.</div>');
				}
               // var_dump($sendEmail); die;
                $this->redirect(array('job/manageJobs'));
                //$this->render('confirm');
                //$this->redirect(array('site/page','view'=>'success'));


                }
				
                
         	}
			
		}
		
    }

	
		// sirin
	
	public function actionRequestPayment()
	{
      $e=new ExpressCheckout;

	  $id = $_GET['JID'];
	  Yii::app()->session['ID'] = $id;
      $products=array(

            '0'=>array(
                  'NAME'=>'Featured Job -'.$id.' ',
                  'AMOUNT'=>'2.49',
                  'QTY'=>'1'
                  ),

            );
                     /*Optional */
               $shipping_address=array(

        'FIRST_NAME'=>'Sirin',
        'LAST_NAME'=>'K',
        'EMAIL'=>'sirinibin2006@gmail.com',
        'MOB'=>'0918606770278',
        'ADDRESS'=>'mannarkkad', 
        'SHIPTOSTREET'=>'mannarkkad',
        'SHIPTOCITY'=>'palakkad',
        'SHIPTOSTATE'=>'kerala',
        'SHIPTOCOUNTRYCODE'=>'IN',
        'SHIPTOZIP'=>'678761'
                                      ); 

        //$e->setShippingInfo($shipping_address); // set Shipping info Optional

        $e->setCurrencyCode("SGD");//set Currency (USD,HKD,GBP,EUR,JPY,CAD,AUD)

        $e->setProducts($products); /* Set array of products*/

        //$e->setShippingCost(5.5);/* Set Shipping cost(Optional) */


        $e->returnURL=Yii::app()->createAbsoluteUrl("pay/PaypalReturn");

                $e->cancelURL=Yii::app()->createAbsoluteUrl("pay/PaypalCancel");

        $result=$e->requestPayment(); 

        /*
          The response format from paypal for a payment request
        Array
    (
        [TOKEN] => EC-9G810112EL503081W
        [TIMESTAMP] => 2013-12-12T10:29:35Z
        [CORRELATIONID] => 67da94aea08c3
        [ACK] => Success
        [VERSION] => 65.1
        [BUILD] => 8725992
    )
            */


		if(strtoupper($result["ACK"])=="SUCCESS")
		{
			/*redirect to the paypal gateway with the given token */
			header("location:".$e->PAYPAL_URL.$result["TOKEN"]);
		} 



    }
    public function actionPaypalReturn()
    {

          /*
            here paypal will send you the following 2 parameters
          $_REQUEST[token] => EC-59C81234SW941750C
      $_REQUEST[PayerID] => ZW3KSL2H557XC

           */   
           /* You need to do 2 more final steps to complete the user payment. ie 
              1.get the payment details from payment &
              2.make doPayment api call to paypal to complete the payment 
           */
             $e=new ExpressCheckout;
     $paymentDetails=$e->getPaymentDetails($_REQUEST['token']); //1.get payment details by using the given token

     /*
       Below you can see a sample format of a successfull payment details response from paypal
          Array
            (
            [TOKEN] => EC-73B51491U8895353R
            [CHECKOUTSTATUS] => PaymentActionNotInitiated
            [TIMESTAMP] => 2013-12-12T11:03:09Z
            [CORRELATIONID] => b812d7a367878
            [ACK] => Success
            [VERSION] => 65.1
            [BUILD] => 8725992
            [EMAIL] => sirini_1313434856_per@gmail.com
            [PAYERID] => ZW3KSL2H557XC
            [PAYERSTATUS] => verified
            [FIRSTNAME] => Test
            [LASTNAME] => User
            [COUNTRYCODE] => US
            [SHIPTONAME] => Test User
            [SHIPTOSTREET] => 1 Main St
            [SHIPTOCITY] => San Jose
            [SHIPTOSTATE] => CA
            [SHIPTOZIP] => 95131
            [SHIPTOCOUNTRYCODE] => US
            [SHIPTOCOUNTRYNAME] => United States
            [ADDRESSSTATUS] => Confirmed
            [CURRENCYCODE] => USD
            [AMT] => 1800.00
            [ITEMAMT] => 1800.00
            [SHIPPINGAMT] => 0.00
            [HANDLINGAMT] => 0.00
            [TAXAMT] => 0.00
            [INSURANCEAMT] => 0.00
            [SHIPDISCAMT] => 0.00
            [L_NAME0] => p1
            [L_NAME1] => p2
            [L_NAME2] => p3
            [L_QTY0] => 2
            [L_QTY1] => 2
            [L_QTY2] => 2
            [L_TAXAMT0] => 0.00
            [L_TAXAMT1] => 0.00
            [L_TAXAMT2] => 0.00
            [L_AMT0] => 250.00
            [L_AMT1] => 300.00
            [L_AMT2] => 350.00
            [L_ITEMWEIGHTVALUE0] =>    0.00000
            [L_ITEMWEIGHTVALUE1] =>    0.00000
            [L_ITEMWEIGHTVALUE2] =>    0.00000
            [L_ITEMLENGTHVALUE0] =>    0.00000
            [L_ITEMLENGTHVALUE1] =>    0.00000
            [L_ITEMLENGTHVALUE2] =>    0.00000
            [L_ITEMWIDTHVALUE0] =>    0.00000
            [L_ITEMWIDTHVALUE1] =>    0.00000
            [L_ITEMWIDTHVALUE2] =>    0.00000
            [L_ITEMHEIGHTVALUE0] =>    0.00000
            [L_ITEMHEIGHTVALUE1] =>    0.00000
            [L_ITEMHEIGHTVALUE2] =>    0.00000
            [PAYMENTREQUEST_0_CURRENCYCODE] => USD
            [PAYMENTREQUEST_0_AMT] => 1800.00
            [PAYMENTREQUEST_0_ITEMAMT] => 1800.00
            [PAYMENTREQUEST_0_SHIPPINGAMT] => 0.00
            [PAYMENTREQUEST_0_HANDLINGAMT] => 0.00
            [PAYMENTREQUEST_0_TAXAMT] => 0.00
            [PAYMENTREQUEST_0_INSURANCEAMT] => 0.00
            [PAYMENTREQUEST_0_SHIPDISCAMT] => 0.00
            [PAYMENTREQUEST_0_INSURANCEOPTIONOFFERED] => false
            [PAYMENTREQUEST_0_SHIPTONAME] => Test User
            [PAYMENTREQUEST_0_SHIPTOSTREET] => 1 Main St
            [PAYMENTREQUEST_0_SHIPTOCITY] => San Jose
            [PAYMENTREQUEST_0_SHIPTOSTATE] => CA
            [PAYMENTREQUEST_0_SHIPTOZIP] => 95131
            [PAYMENTREQUEST_0_SHIPTOCOUNTRYCODE] => US
            [PAYMENTREQUEST_0_SHIPTOCOUNTRYNAME] => United States
            [PAYMENTREQUEST_0_ADDRESSSTATUS] => Confirmed
            [L_PAYMENTREQUEST_0_NAME0] => p1
            [L_PAYMENTREQUEST_0_NAME1] => p2
            [L_PAYMENTREQUEST_0_NAME2] => p3
            [L_PAYMENTREQUEST_0_QTY0] => 2
            [L_PAYMENTREQUEST_0_QTY1] => 2
            [L_PAYMENTREQUEST_0_QTY2] => 2
            [L_PAYMENTREQUEST_0_TAXAMT0] => 0.00
            [L_PAYMENTREQUEST_0_TAXAMT1] => 0.00
            [L_PAYMENTREQUEST_0_TAXAMT2] => 0.00
            [L_PAYMENTREQUEST_0_AMT0] => 250.00
            [L_PAYMENTREQUEST_0_AMT1] => 300.00
            [L_PAYMENTREQUEST_0_AMT2] => 350.00
            [L_PAYMENTREQUEST_0_ITEMWEIGHTVALUE0] =>    0.00000
            [L_PAYMENTREQUEST_0_ITEMWEIGHTVALUE1] =>    0.00000
            [L_PAYMENTREQUEST_0_ITEMWEIGHTVALUE2] =>    0.00000
            [L_PAYMENTREQUEST_0_ITEMLENGTHVALUE0] =>    0.00000
            [L_PAYMENTREQUEST_0_ITEMLENGTHVALUE1] =>    0.00000
            [L_PAYMENTREQUEST_0_ITEMLENGTHVALUE2] =>    0.00000
            [L_PAYMENTREQUEST_0_ITEMWIDTHVALUE0] =>    0.00000
            [L_PAYMENTREQUEST_0_ITEMWIDTHVALUE1] =>    0.00000
            [L_PAYMENTREQUEST_0_ITEMWIDTHVALUE2] =>    0.00000
            [L_PAYMENTREQUEST_0_ITEMHEIGHTVALUE0] =>    0.00000
            [L_PAYMENTREQUEST_0_ITEMHEIGHTVALUE1] =>    0.00000
            [L_PAYMENTREQUEST_0_ITEMHEIGHTVALUE2] =>    0.00000
            [PAYMENTREQUESTINFO_0_ERRORCODE] => 0
            )
        */
        if($paymentDetails['ACK']=="Success")
        {
			$ack=$e->doPayment($paymentDetails);  //2.Do payment

			//echo "<pre>";
			//print_r($ack);
			//echo "</pre>";
			
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
				
				$end_datee = strtotime("$date +1 months");
				$end_date = date('Y-m-d H:i:s',$end_datee);
				$job->pre_end_date = $end_date;
				
                if($job->save()){

					$data = array(
						
						'job' => $job->title,
						'job_url' => Yii::app()->getBaseUrl(true).'/job/job?JID='.$job->JID,
						'url' => Yii::app()->getBaseUrl(true).'/company/view/CID/'.$company->CID,
						'company' =>  $company->cname,
						'username' => $user->username,
						'to' => $company->cemail,
					);
					
					$sendEmail =  Yii::app()->user->sendEmail('startup_premium',$data);
					$senAdmindEmail =  Yii::app()->user->sendEmail('startup_premium_admin',$data);
					
					Yii::app()->session['JID'] = null;
					Yii::app()->user->setFlash('success', '<div class="alert in alert-block fade alert-success"><a class="close" data-dismiss="alert">×</a><strong>Success!</strong> Your jobs is added featured job.</div>');
					$this->redirect(array('job/manageJobs'));
				}else{
					Yii::app()->user->setFlash('error', '<div class="alert in alert-block fade alert-error"><a class="close" data-dismiss="alert">×</a><strong>Sorry!</strong> Failed to add as featured job.</div>');
					
					$this->redirect(array('job/manageJobs'));	
				}
				
        }else{
					Yii::app()->user->setFlash('error', '<div class="alert in alert-block fade alert-error"><a class="close" data-dismiss="alert">×</a><strong>Sorry!</strong> Failed to add as featured job.</div>');
					
					$this->redirect(array('job/manageJobs'));	
				}

        /*
          Below you can see a sample successfull response of a payment process from paypal
         Array
          (
              [TOKEN] => EC-1AG000796M3683304
              [SUCCESSPAGEREDIRECTREQUESTED] => false
              [TIMESTAMP] => 2013-12-12T11:57:17Z
              [CORRELATIONID] => 89a33a155e512
              [ACK] => Success
              [VERSION] => 65.1
              [BUILD] => 8725992
              [TRANSACTIONID] => 7S255873FM437633X
              [TRANSACTIONTYPE] => expresscheckout
              [PAYMENTTYPE] => instant
              [ORDERTIME] => 2013-12-12T11:57:17Z
              [AMT] => 1800.00
              [FEEAMT] => 52.50
              [TAXAMT] => 0.00
              [CURRENCYCODE] => USD
              [PAYMENTSTATUS] => Completed
              [PENDINGREASON] => None
              [REASONCODE] => None
              [PROTECTIONELIGIBILITY] => Eligible
              [INSURANCEOPTIONSELECTED] => false
              [SHIPPINGOPTIONISDEFAULT] => false
              [PAYMENTINFO_0_TRANSACTIONID] => 7S255873FM437633X
              [PAYMENTINFO_0_TRANSACTIONTYPE] => expresscheckout
              [PAYMENTINFO_0_PAYMENTTYPE] => instant
              [PAYMENTINFO_0_ORDERTIME] => 2013-12-12T11:57:17Z
              [PAYMENTINFO_0_AMT] => 1800.00
              [PAYMENTINFO_0_FEEAMT] => 52.50
              [PAYMENTINFO_0_TAXAMT] => 0.00
              [PAYMENTINFO_0_CURRENCYCODE] => USD
              [PAYMENTINFO_0_PAYMENTSTATUS] => Completed
              [PAYMENTINFO_0_PENDINGREASON] => None
              [PAYMENTINFO_0_REASONCODE] => None
              [PAYMENTINFO_0_PROTECTIONELIGIBILITY] => Eligible
              [PAYMENTINFO_0_PROTECTIONELIGIBILITYTYPE] => ItemNotReceivedEligible,UnauthorizedPaymentEligible
              [PAYMENTINFO_0_ERRORCODE] => 0
              [PAYMENTINFO_0_ACK] => Success
          )

        */
		

    }
    public function actionPaypalCancel()
    {  
       /*The user flow  wil come here when a user cancels the payment */
       /*Do what you want*/  


					Yii::app()->user->setFlash('error', '<div class="alert in alert-block fade alert-error"><a class="close" data-dismiss="alert">×</a><strong>Sorry!</strong> Featured job process is canceled.</div>');
	
                $this->redirect(array('job/manageJobs'));	   
    }	
	
}
?>