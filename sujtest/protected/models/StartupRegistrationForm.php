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
    public $username;
    public $password;
    public $password2;
    public $cemail;
    public $image;    
    public $contact;
    public $address;
    public $mission;
	
	public $incorporated;
 
  //   public $mailingAddress;
 
    
    /**
     * Declares the validation rules.
     */
    //to be changed

    public function rules() {
        return array(
            // name, email, subject and body are required
            array('cname, cemail, username, password,password2,contact,name,incorporated', 'required'),
            // email has to be a valid email address
       //     array('mailingAddress','safe'),
	   array('website','safe'),
            array('cemail', 'email'),
           //array('username','unique','on' => 'checkout', 'message'=> Yii::t('validation', 'username already taken')),
		   //array('cemail', 'unique', 'message' => 'Email is already used'),
           // array('username', 'unique', 'message' => 'Username is already taken'),
            array('username', 'match', 'pattern' => "/^[A-Za-z0-9_]+$/",'message'=> 'username must be Alphanumerical'),

            // username must be at lenght minimal of 6 characters
            array('cname', 'length', 'max'=>65),
           // array('username', 'length', 'min'=>6, 'max'=>15, 'message'=>'{attribute} is too short (minimum is 6 characters).' ),
            array('image', 'file', 'types'=>'jpg, jpeg, gif, png', 'safe'=>true, 'maxSize'=>1024*1024, 'allowEmpty'=>false,'wrongType'=>'Only jpg/jpeg/gif/png allowed.', 'tooLarge'=>'{attribute} is too large to be uploaded. Maximum size is 100kB.'),

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
            'username' => 'Desired Login ID',
			'verifyCode' => 'Verification Code',
            'cname' => 'Startup Name',
            'cemail' => 'Email Address',
			'image' => 'Logo',
			'password2' => 'Confirm Password',
			'contact' => 'Contact Number',
			'incorporated' => 'Startup Founded on',
        );
    }

}