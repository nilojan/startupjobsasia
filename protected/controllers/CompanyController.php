<?php

class CompanyController extends Controller  {   
    public function filters(){
        return array( 'accessControl' ); 
    }
 
    public function accessRules()
	{
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
 
  
           
    public function actionCompany($id)
	{
		if(!(Yii::app()->user->isAdmin()))
		{
			$id = Yii::app()->user->getID();
		}        

        $company = company::model()->find('ID=:ID', array('ID' => $id));
        
        $this->actionView($company->CID);
    }

    public function actionView($CID)
	{
        $company = company::model()->find('CID=:CID', array('CID' => $CID));
		
        $job=job::model()->findAll('CID=:CID',array('CID'=>$CID,));

        $this->render('view', array('company' => $company,'job'=>$job));
    }
	
    public function actionColor()
    {
      $id=Yii::app()->user->getID();
	  
      $cname=$_POST['cname'];
	  
      file_put_contents('colr.txt',$id);

        $company = company::model()->find('ID=:ID', array('ID' => $id));
        $company->themecolor=$cname;
        $company->save();


    }
	
    public function actionUpdate($id)
	{
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
		$CForm->twitter = $company->twitter;
		$CForm->gplus = $company->gplus;
		$CForm->linkedin = $company->linkedin;
        $CForm->summary = $company->summary;
        $CForm->awards = $company->awards;
        
        if (isset($_POST['UpdateForm'])) {
                   $CForm->attributes = $_POST['UpdateForm'];
                   $CForm->website = $_POST['UpdateForm']['website'];
                   $CForm->facebook = $_POST['UpdateForm']['facebook'];
				   $CForm->twitter = $_POST['UpdateForm']['twitter'];
				   $CForm->gplus = $_POST['UpdateForm']['gplus'];
				   $CForm->linkedin = $_POST['UpdateForm']['linkedin'];
                   $CForm->summary = $_POST['UpdateForm']['summary'];
                   $CForm->awards = $_POST['UpdateForm']['awards'];
                   if ($CForm->validate()) {
                    $company->cname = $CForm->cname;
                   $company->website = $CForm->website;
                   $company->facebook = $CForm->facebook;
				   $company->twitter = $CForm->twitter;
				   $company->gplus = $CForm->gplus;
				   $company->linkedin = $CForm->linkedin;
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
                            $fileName = cleanup("{$company->CID}-{$uploadedFile}");  // random number + file name
                            $company->image = $fileName;
                         }
                    if (!empty($uploadedFile2)) {      
                            $fileName2 = cleanup("{$company->CID}-{$uploadedFile2}");  // random number + file name
                            $company->coverpicture = $fileName2;
                         }          
                         
                     if ($company->save())   {
                         if (!empty($uploadedFile)) {      
                            $uploadedFile->saveAs(Yii::app()->basepath.'/../images/company/'.$fileName);
                            $image = Yii::app()->image->load(Yii::app()->basepath.'/../images/company/'.$fileName);
							$image->resize(400, 0);								
							$image->save(Yii::app()->basepath.'/../images/company/400/'.$fileName);
							$croped_logo = Yii::app()->user->crop_logo(Yii::app()->basepath.'/../images/company/400/'.$fileName);
                                
                                if ($oldfilename != $fileName && $oldfilename !=null) {
                                    //    unlink(Yii::app()->basePath . '/../images/company/' . $oldfilename);// image will uplode to rootDirectory/banner    
                                }    
                         }       
                         if (!empty($uploadedFile2)) {      
                                $uploadedFile2->saveAs(Yii::app()->basepath.'/../images/cover/'.$fileName2);
								
								$image = Yii::app()->image->load(Yii::app()->basepath.'/../images/cover/'.$fileName2);
                                $image->resize(1200,0);
                                $image->save(Yii::app()->basepath.'/../images/cover/'.$fileName2);
								
							 if (!empty($oldfilename2)) { 	
                                if ($oldfilename2 != $fileName2 && $oldfilename !=null) {
                                    //    unlink(Yii::app()->basePath . '/../images/cover/' . $oldfilename2);// image will uplode to rootDirectory/banner    
                                } 
							}              
                                        
                         }   
                     }    
                         if(!(yii::app()->user->isAdmin()))
                         {
                           $this->redirect(array('company/company/12'));
                         }else{
                           $this->redirect(array('admin/startup/'.$company->ID));
                         }
                    
                   }      
                    
                    
                    }             
       
           $this->render('update', array('CForm' => $CForm, 
                                         'company' => $company, ));
    }
	
    public function actionUpdateStartup($id)
	{
		if(!(yii::app()->user->isAdmin()))
		{
			$id = Yii::app()->user->getID();
		}
        
        $CForm = new UpdateStartupForm;
        $company = company::model()->find('ID=:ID', array('ID' => $id));
		$user = user::model()->find('ID=:ID', array('ID' => $id));
        //CActiveRecord for old one

        $CForm->attributes = $company->attributes;
        $CForm->attributes = $user->attributes;
        
        if (isset($_POST['UpdateStartupForm'])) {
					$CForm->attributes = $_POST['UpdateStartupForm'];
					$CForm->name = $_POST['UpdateStartupForm']['name'];
					$CForm->cemail = $_POST['UpdateStartupForm']['cemail'];
					$CForm->contact = $_POST['UpdateStartupForm']['contact'];
					
					if ($CForm->validate()){
					$company->cemail = trim(strtolower($CForm->cemail)); 
					$company->contact = trim(strtolower($CForm->contact));				   

						if ($company->save())
						{
							$user = new user;  
							$user = user::model()->find('ID=:ID', array('ID' => $id));					   
						   
							$user->name = trim(strtolower($CForm->name));
							$user->email = trim(strtolower($CForm->cemail));

							if ($user->save()) {
								if(!(yii::app()->user->isAdmin()))
								{
								Yii::app()->user->setFlash('warning', 'Your Contact Details has been updated <strong>successfully</strong>.');
									$this->redirect(array('company/updateStartup/12'));
								}else{
									$this->redirect(array('admin/startup/'.$company->ID));
								}
						 
							}
						}    
                         
                    
					}      
                    
                    
				}             
       
           $this->render('updateStartup', array('CForm' => $CForm, 
                                         'company' => $company,'user' => $user ));
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
				Yii::app()->user->setFlash('warning', 'Your password has been changed <strong>successfully</strong>.');
						 
                           //$this->redirect(array('company/updatePassword/12'));
                         }else{
						 
						 
                           $this->redirect(array('admin/startup/'.$company->ID));
                         }
						 
						 }

                         }else{ Yii::app()->user->setFlash('warning', 'New password did not matched the <strong>confirm new password</strong>');
						 }
                    
                   }else{
				  // Yii::app()->user->setFlash('warning', 'Your password was not changed because it did not matched the <strong>old password</strong>.');
				   
				   Yii::app()->user->setFlash('warning', 'Your password was not changed because it did not matched the <strong>old password</strong>');
				   
				   }
				   }
                    
                    
                    }             
       
           $this->render('updatePassword', array('CForm' => $CForm, 
                                         'company' => $company,'user' => $user ));
    }


    //upgrade company account TBD    
    public function actionUpgrade()
	{
            $this->render('upgrade');
    }
    
    public function actionPremium()
	{
            $this->render('premium');
    }
	
    public function actionDownloadResume() 
    {
            if(isset($_GET['filename']))
            {

            $filename=$_GET['filename'];
            $path=''. dirname(Yii::app()->request->scriptFile).'/jobApplication/'.$filename.'';
			$company = company::model()->find('ID=:ID', array('ID' => Yii::app()->user->getID()));
			date_default_timezone_set('Asia/Singapore');
			$date = date('Y-m-d H:i:s');
           
			/* var_dump($path);
			die;*/
          
			Yii::app()->user->download_file($path,$filename);
        
            }
            
    }
	
    public function actionDownloadUserResume() 
    {
            if(isset($_GET['filename']))
            {

            $filename=$_GET['filename'];
            $path=''. dirname(Yii::app()->request->scriptFile).'\jobApplication\\'.$filename.'';
			$company = company::model()->find('ID=:ID', array('ID' => Yii::app()->user->getID()));
			date_default_timezone_set('Asia/Singapore');
			$date = date('Y-m-d H:i:s');

			if($company->premium == 1)
			{
				if($company->download_count<100)
				{
                          $company->download_count++;
                          $company->save();
                          Yii::app()->user->download_file($path,$filename);
				}else{
					$this->redirect('../site/page/view/notAuthorized'); 
				}

			}
			else if($company->premium == 2)
				{
					Yii::app()->user->download_file($path,$filename);
				}
			else{

              $this->redirect('../site/page/view/notAuthorized');
                }
            }
    }
	
    public function actionDashboard()
	{
            $this->render('dashboard');
    }
       
	public function actionApplication()
	{
            $company = company::model()->find('ID=:ID', array('ID' => Yii::app()->user->getID()));
        
            $this->render('application',array('company' => $company));
	}


	public function actionApplicationLastOneMonth()
	{
            $company = company::model()->find('ID=:ID', array('ID' => Yii::app()->user->getID()));
        
            $this->render('applicationlastonemonth',array('company' => $company));
	}
	
	public function actionApplicationLastThreeMonth()
	{
            $company = company::model()->find('ID=:ID', array('ID' => Yii::app()->user->getID()));
        
            $this->render('applicationlastthreemonth',array('company' => $company));
	}
	
	
	public function actionApplicationLastSixMonth()
	{
            $company = company::model()->find('ID=:ID', array('ID' => Yii::app()->user->getID()));
        
            $this->render('applicationlastsixmonth',array('company' => $company));
	}

	
	public function actionApplicationLastOneYear()
	{
            $company = company::model()->find('ID=:ID', array('ID' => Yii::app()->user->getID()));
        
            $this->render('applicationlastoneyear',array('company' => $company));
	}

   	public function actionApplicationSearch()
    {
        $company = company::model()->find('ID=:ID', array('ID' => Yii::app()->user->getID()));

                $query = $_GET['q'];
				
				$query = str_replace(" and ","+",$query);
				$query = str_replace(" or "," ",$query);
				$query = str_replace(" not ","-",$query);
				$query = str_replace("/","",$query);
				$query = str_replace(" ","+",$query);
        
               // $this->redirect(array('site/page','view'=>'success'));
         
                $this->render('applicationsearch', array('query'=>$query,'company' => $company));

    }
  
	public function actionRegistration()
	{
            
          $model  = new StartupRegistrationForm;
		  
		  	if(isset($_POST['ajax']) && $_POST['ajax']==='horizontal-Form')
			{
			  $model->attributes=$_POST['StartupRegistrationForm'];
			  echo CActiveForm::validate($model);
			  Yii::app()->end();
			}
			

          if (isset($_POST['StartupRegistrationForm'])) {
            //var_dump($_POST['StartupRegistrationForm']);
            
              $model->attributes = $_POST['StartupRegistrationForm'];

              if ($model->validate()) {  
                    //generate activation key
				$activationKey = mt_rand() . mt_rand() . mt_rand() . mt_rand();
                // $model->activationKey= mt_rand() . mt_rand() . mt_rand() . mt_rand() . mt_rand();
                        $key = 'AG*@#(129)!@K.><>]{[|sd`rjenfla0847&($#)!$Masdc$#@';
                        $pwd = hash('sha512', $key . ($model->password));
                        $pwd = substr($pwd, 0, 100);

						$verification_link = Yii::app()->getBaseUrl(true).'/user/verify/code/'.$activationKey;
						
                     //generate activation ke
                        $record = new user;  // Save into user

                        $record->username = trim(strtolower($model->name)).rand(100, 999);
                        $record->password = $pwd;
                        $record->name = $model->name;
                        $record->email = trim(strtolower($model->cemail));
                        $record->activation_key = $activationKey;
                        $record->role = 2;
                        if($record->save()) {
                          
                          $uid = Yii::app()->db->getLastInsertID();
                          $company = new company;                 
                          $company->ID = $uid;
                          $company->address = $model->address;
                          $company->contact = $model->contact;
                          $company->cname = $model->cname;
                          $company->website = $model->website;
                          $company->cemail = trim(strtolower($model->cemail));
						  $company->incorporated = $model->incorporated;
                          $company->status = 0;
						  $company->job_post_balance = 100;
						  $company->ip = $_SERVER['REMOTE_ADDR'];
                          $uploadedFile=CUploadedFile::getInstance($model,'image');
                          if (!empty($uploadedFile)) {
                                    $fileName = "{$company->ID}-{$uploadedFile}";  // random number + file name
									$fileName = cleanup($fileName);
                                    $company->image = $fileName;
                                      // image will uplode to rootDirectory/banner    
                          }              
                          if ($company->save()) {
           
                            //$adminData = user::model()->findAll('role=:role',array('role'=>1));
                           /* $datastartup=  array(
                               'name'=> $model->name,
                               'company' =>$company->cname,
                               'to'=>$company->cemail,
                              );
							  */
                            $data=  array(
                               'name'=> $model->name,
                               'company' =>$company->cname,
							   'email' =>$company->cemail,
							   'contactno' =>$company->contact,
							   'incorporated' =>$company->incorporated,
                               //'to'=>$adminData[0]['email'],
							   //'verify_link'=>$verification_link,
                              );

                            $sendEmail= yii::app()->user->sendEmail('welcome_startup',$data);
                            $sendEmailStart= yii::app()->user->sendEmail('startup_registration',$data);


                            if (!empty($uploadedFile)) {
								$uploadedFile->saveAs(Yii::app()->basepath.'/../images/company/'.$fileName);
								$image = Yii::app()->image->load(Yii::app()->basepath.'/../images/company/'.$fileName);
								$image->resize(400, 0);								
								$image->save(Yii::app()->basepath.'/../images/company/400/'.$fileName);
								$croped_logo = Yii::app()->user->crop_logo(Yii::app()->basepath.'/../images/company/400/'.$fileName);
								                                    
                                }
								$this->redirect(array('site/page/view/success'));							
                          }else{ 

                          	Yii::app()->user->setFlash('warning', '<div class="alert in alert-block fade alert-error">
															<a class="close" data-dismiss="alert">×</a>
															<strong>Oh !</strong>
															There is a error on updating your Startup!<br />
															please contact admin.
															
															</div>');
							$this->redirect(array('registration'));
						}
            
                  }else{
						Yii::app()->user->setFlash('warning', '<div class="alert in alert-block fade alert-error">
															<a class="close" data-dismiss="alert">×</a>
															<strong>Oh !</strong>
															look like your username or email is already registered!<br />
															please try wgain with different username and email.
															
															</div>');
						$this->redirect(array('registration'));
				  
				  }
                } 
            }
        $this->render('registration', array('model' => $model));
    }
	


	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='company-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


	public function addhttp($url)
	{
		if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
			$url = "http://" . $url;
		}
		return $url;
	}   


	public function actionUploadCoverimage(){

		
		$CID = Yii::app()->user->getID();

		//echo'<pre>';print_r($_POST);echo'</pre>';
		if(isset($_POST['cover_image'])){
		
		//echo var_dump($_POST);
			// populate input data to $model and $gallery
		$ImageName 		= str_replace(' ','-',strtolower($_FILES['cover_image']['name'])); //get image name
		$ImageSize 		= $_FILES['cover_image']['size']; // get original image size
		$TempSrc	 	= $_FILES['cover_image']['tmp_name']; // Temp name of image file stored in PHP tmp folder
		$ImageType	 	= $_FILES['cover_image']['type']; //get file type, returns "image/png", image/jpeg, text/plain etc.
			
			//echo'<pre>';print_r($_FILES['cover_image']);echo'</pre>';
			
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
			
			// check $_FILES['cover_image'] not empty
			if(!isset($_FILES['cover_image']) || !is_uploaded_file($_FILES['cover_image']['tmp_name']))
			{
					die('Something wrong with uploaded file, something missing!'); // output error when above checks fail.
			}
			
			// Random number will be added after image name
			$RandomNumber 	= rand(0, 9999999999); 


			//Get file extension from Image name, this will be added after random name
			$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
			$ImageExt = str_replace('.','',$ImageExt);

			//remove extension from filename
			$ImageName 		= preg_replace("/\\.[^.\\s]{3,4}$/", "", $ImageName); 

			//Construct a new name with random number and extension.
			$NewImageName = $ImageName.'_'.$RandomNumber.'.'.$ImageExt;

			$NewImageName = $CID.'_cover_pic_'.$NewImageName;
			
			move_uploaded_file($TempSrc, "images/cover/".$NewImageName);
			
			
						$image = Yii::app()->image->load(Yii::app()->basepath.'/../images/cover/'.$NewImageName);
						$image->resize(1170, 0);								
						$image->save(Yii::app()->basepath.'/../images/cover/'.$NewImageName);
						//$croped_logo = Yii::app()->user->crop_logo(Yii::app()->basepath.'/../images/cover/'.$NewImageName);
						
	
	//echo'<pre>';print_r(Yii::app()->db);echo'</pre>';
	//exit;			
			
			$company = company::model()->find('ID=:ID', array('ID' => $CID));
			$company->coverpicture = $NewImageName;		 
			if($company->save(false)){
			

			echo '<style type="text/css">.getoutCoverimg,#imgUpldCover{display:none;}</style>
				<img src="/images/cover/'.$NewImageName.'"  style= "z-index: -999;width:1170px; height:auto; float:left; border:0px;" id="cropbox">				
				<form id="CropImg" action="/company/cropedcoverimage" method="post">
				<input type="hidden" id="x" name="x" />
				<input type="hidden" id="y" name="y" />
				<input type="hidden" id="w" name="w" />
				<input type="hidden" id="h" name="h" />
				<input type="hidden" name="justimg" value="'.$NewImageName.'"/>
				<input type="submit" value="Save" name="crop_cover_image" class="btn btn-success pull-right saveButton" />
				</form>
				
				<script type="text/javascript">
					$(function(){
						$(\'#cropbox\').Jcrop({
							aspectRatio: 4.8,
							onSelect: updateCoords,
							bgFade:   true,
							bgColor:  "black",
							bgOpacity:.3,
							setSelect:[ 0, 70, 1170, 243.75 ]
						});
					});

					function updateCoords(c)
					{
						$(\'#x\').val(c.x);
						$(\'#y\').val(c.y);
						$(\'#w\').val(c.w);
						$(\'#h\').val(c.h);
					};

					function checkCoords()
					{
						if (parseInt($(\'#w\').val())) return true;
						alert(\'Please select a crop region then press submit.\');
						return false;
					};
					</script>';


				exit;
			}	

			exit;

		}
		
	}
	
	public function actionCropedCoverimage(){

		$CID = Yii::app()->user->getID();
		//echo'<pre>';print_r($_POST);echo'</pre>';
		//exit;
		if(isset($_POST['crop_cover_image'])){
				
				$imgname = $_POST['justimg'];
						
				$image = '/home/startupjobsasia/public_html/images/cover/'.$imgname;
				
				//echo'<pre>';print_r($image);echo'</pre>';
				//exit;
		
				//remove extension from filename
				$imgname_noext		= preg_replace("/\\.[^.\\s]{3,4}$/", "", $image); 

				$targ_w = 1170;
				$targ_h = 243.75;
				$jpeg_quality = 100;

				$ImageExt = pathinfo($image, PATHINFO_EXTENSION);

				$src = $image;
				if ($ImageExt == "gif" || $ImageExt == "GIF")
				{
				   
					$img_r = imagecreatefromgif($src);
					$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

					imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
					$targ_w,$targ_h,$_POST['w'],$_POST['h']);

					header('Content-type: image/jpeg');
					imagejpeg($dst_r,$imgname_noext."_croped.jpg",$jpeg_quality);
					
					
				}
				elseif ($ImageExt == "jpg" || $ImageExt == "jpeg" || $ImageExt == "JPG" || $ImageExt == "JPEG")
				{
					$img_r = imagecreatefromjpeg($src);
					$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

					imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
					$targ_w,$targ_h,$_POST['w'],$_POST['h']);

					header('Content-type: image/jpeg');
					imagejpeg($dst_r,$imgname_noext."_croped.jpg",$jpeg_quality);
					
				}
				elseif ($ImageExt == "png" || $ImageExt == "PNG")
				{    
					$img_r = imagecreatefrompng($src);
					$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

					imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
					$targ_w,$targ_h,$_POST['w'],$_POST['h']);

					header('Content-type: image/jpeg');
					imagejpeg($dst_r,$imgname_noext."_croped.jpg",$jpeg_quality);
							
				}
				else
				{
					$img_r = imagecreatefromwbmp($src);
					$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

					imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
					$targ_w,$targ_h,$_POST['w'],$_POST['h']);

					header('Content-type: image/jpeg');
					imagejpeg($dst_r,$imgname_noext."_croped.jpg",$jpeg_quality);
							
				}
	
	
			$Cover_picture = substr($imgname_noext."_croped.jpg", 47);
			
			$company = company::model()->find('ID=:ID', array('ID' => $CID));
			$company->coverpicture = $Cover_picture; 
			if($company->save(false)){
			

				//echo "<style type='text/css'>.getoutCoverimg{display:none;}</style>";
				//echo '<a href="" onclick="return uploadCoverImage();"><img src="/sujtest/images/cover/'.$NewImageName.'"  style= "z-index: -999;width:1170px; height:250px;float:left; border:0px;" alt="Resized Image"></a>';
			
				$this->redirect(array('company/company/12'));
				
				
				exit;
			}	

			$this->redirect('../company/company/12');	
			exit;


		}
		
	}	

}