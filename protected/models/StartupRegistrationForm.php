<?php

/**
 * RegistrationForm class.
 * RegistrationForm is the data structure for keeping
 * registration form data. It is used by the 'register' action of 'SiteController'.
 */
class StartupRegistrationForm extends CFormModel {

    public $cname;
	public $website;
	public $name;
    //public $username;
    public $password;
    public $password2;
    public $cemail;
    public $image;    
    public $contact;
    public $address;
    public $mission;	
	public $incorporated;
	//public $verifyCode;
 
  //   public $mailingAddress;
 
    
    /**
     * Declares the validation rules.
     */
    //to be changed

    public function rules() {
        return array(
            // name, email, subject and body are required
            array('cname, cemail, password,password2,contact,name,incorporated', 'required'),
			array('cname,name','nameWithSpace'),
			//array('contact','NumberONly'),
			
			//array('username', 'length', 'min'=>6, 'max'=>25),
			
			//array('username', 'unique', 'className' => 'user', 'attributeName' => 'username', 'message'=>'This username is already taken'),
			//array('password','checkStrength','score'=>20),
			
		//	array('verifyCode', 'captcha'),
			
            // email has to be a valid email address
       //     array('mailingAddress','safe'),
	   array('website','safe'),
	   array('website', 'weburl'),
            array('cemail', 'validateEmail'),
			array('cemail', 'unique', 'className' => 'user', 'attributeName' => 'email', 'message'=>'This Email is already in use'),
			//array('cemail', 'unique', 'className' => 'user', 'attributeName' => 'email', 'message'=>'This Email is already in use'),
			//array('cemail', 'unique', 'message' => 'This email is already exists.'),
           //array('username','unique','on' => 'checkout', 'message'=> Yii::t('validation', 'username already taken')),
		   //array('cemail', 'unique', 'message' => 'Email is already used'),
           // array('username', 'unique', 'message' => 'Username is already taken'),
           // array('username', 'match', 'pattern' => "/^[A-Za-z0-9_]+$/",'message'=> 'username must be Alphanumerical'),

            // username must be at lenght minimal of 6 characters
            //array('cname', 'length', 'max'=>65),
			//array('cemail, username', 'unique'),
           // array('username', 'length', 'min'=>6, 'max'=>15, 'message'=>'{attribute} is too short (minimum is 6 characters).' ),
		  // array('image', 'required','on'=>'insert,update'),
		   array('image', 'safe'),
            array('image', 'file', 'types'=>'jpg, jpeg, gif, png', 'safe'=>true,'allowEmpty'=>true, 'maxSize'=>1024*1024*2,'wrongType'=>'Only jpg/jpeg/gif/png allowed.', 'tooLarge'=>'{attribute} is too large to be uploaded. Maximum size is 100kB.'),

           // password must be at lenght minimal of 6 characters
            array('password', 'length', 'min'=>6, 'max'=>25),
              array('last_login','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'update'),
             array('registered,last_login','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'insert'),
            
      /*      array('name','ext.alpha',
                  'allowSpaces'=>'true', 
                  'allowNumbers'=>'false',
                  'extra' => array('-'), 
                  'message'=>'Name contains invalid characters. Name can only contain alphabets, spaces and dashes.'),
            
            array('username', 'ext.alpha',
                  'allowNumbers'=>'true', 
                  'extra' => array('-', '_'),
                  'message'=>'Username contains invalid characters. Username can only contain alphanumeric characters, dashes, and underscores.'),
            
            array('password, password2', 'ext.alpha',
                  'allowNumbers'=>'true', 
                  'message'=>'Password contains invalid characters. Password can only contain alphanumeric characters.'),
        */    
            // verifyCode needs to be entered correctly
           //       array('email, username','unique','className'=>'member'),
          //  array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements()),
            array('password2', 'compare', 'compareAttribute' => 'password','message'=> 'Password does not match')
        );
    }
    /*public function tableName()
    {
      return 'user1';
    }*/
    

    /*
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */

    public function attributeLabels() {
        return array(
            //'username' => 'Desired Login ID',
			'verifyCode' => 'Verification Code',
            'cname' => 'Startup Name',
            'cemail' => 'Email Address',
			'image' => 'Logo',
			'password2' => 'Confirm Password',
			'contact' => 'Contact Number',
			'incorporated' => 'Startup Founded on',
        );
    }
	
	//http://www.yiiframework.com/extension/smartcaptcha/
	
	// 2. attach the behavior to LoginForm
	/*
	public function behaviors()
	{
		return array(
			'smartCaptcha' => array(
				'class' => 'SmartCaptchaBehavior',
				'numErrorBefore' => 2, // the number of errors allowed before first to show captcha.
				'numErrorAfter' => 5, // the number of errors allowed once pass captcha validation.
				'attributes' => null, // list of attributes whose error affects to show captcha. Defaults to null for all attributes.
			),
		);
	}
	*/

		public function validateEmail($attribute)
        {
            if(!filter_var($this->$attribute, FILTER_VALIDATE_EMAIL))
             {                
			  $this->addError($attribute, 'Sorry, this is not validate email address');
             } else {
                return true;
            }
            
        }
		
		public function weburl($attribute)
        {
		
			$this->$attribute = trim($this->$attribute);
		
			if (preg_match("#https?://#", $this->$attribute) === 0){
				$this->$attribute = 'http://'.$this->$attribute;
				}
			
			
			// http://geektnt.com/validating-url-in-php-without-regular-expressions.html
            if(!filter_var($this->$attribute, FILTER_VALIDATE_URL))
             {                
			  $this->addError($attribute, 'Sorry, this is not validate Web url');
             } else {
                return true;
            }
            
        }		
		
		
		public function NumberONly($attribute)
        {
            if (!preg_match("/^[0-9+-]*$/",$this->$attribute))
             {                
			  $this->addError($attribute, 'Sorry, this is not validate number');
             } else {
                return true;
            }
            
        }


		public function validate_url($attribute)
		{
			$attribute = trim($attribute);
			//http://www.d-mueller.de/blog/why-url-validation-with-filter_var-might-not-be-a-good-idea/
			
			if((strpos($attribute, "http://") === 0 || strpos($attribute, "https://") === 0) &&
					!filter_var($attribute, FILTER_VALIDATE_URL, FILTER_FLAG_SCHEME_REQUIRED | FILTER_FLAG_HOST_REQUIRED)){
					
				$this->addError($attribute, 'Sorry, this is not validate Web url');
            }else{
                return true;
            }

		}


		public function nameWithSpace($attribute,$params)
        {
            if (!preg_match("/^[a-zA-Z0-9 ]*$/",$this->$attribute))
             {                
			  $this->addError($attribute, 'Sorry, this is not validate name');
             } else {
                return true;
            }
            
        }		

}