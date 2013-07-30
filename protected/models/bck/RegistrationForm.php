<?php

/**
 * RegistrationForm class.
 * RegistrationForm is the data structure for keeping
 * registration form data. It is used by the 'register' action of 'SiteController'.
 */
class RegistrationForm extends CFormModel {

    public $name;
    public $username;
    public $password;
    public $email;
    public $verifyCode;
    public $birthDate;
    public $gender;
    public $password2;
 
  //   public $mailingAddress;
 
    
    /**
     * Declares the validation rules.
     */
    //to be changed

    public function rules() {
        return array(
            // name, email, subject and body are required
            array('name, email, username, password, ', 'required'),
            // email has to be a valid email address
       //     array('mailingAddress','safe'),
            array('email', 'email'),
            // username must be at lenght minimal of 6 characters
            array('name', 'length', 'max'=>45),
            array('username', 'length', 'min'=>6, 'max'=>15),
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
            array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements()),
            array('password2', 'compare', 'compareAttribute' => 'password','message'=> 'Password does not match')
        );
    }
    

    /*
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */

    public function attributeLabels() {
        return array(
            'verifyCode' => 'Verification Code',
        );
    }

}