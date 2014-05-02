<?php

/**
 * RegistrationForm class.
 * RegistrationForm is the data structure for keeping
 * registration form data. It is used by the 'register' action of 'SiteController'.
 */
class ActiveUserRegister extends CFormModel {


    //public $username;
    public $password;
    public $password2;
 
  //   public $mailingAddress;
 
    
    /**
     * Declares the validation rules.
     */
    //to be changed
  

    public function rules() {
        return array(
            // name, email, subject and body are required
            array('password, password2', 'required'),
			//array('username', 'unique', 'className' => 'user', 'attributeName' => 'username', 'message'=>'This username is already taken'),


            //array('username', 'length', 'min'=>6, 'max'=>15),
           // password must be at lenght minimal of 6 characters
            array('password', 'length', 'min'=>6, 'max'=>25),
              array('last_login','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'update'),
             array('registered,last_login','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'insert'),

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
			'password2' => 'Confirm Password',
        );
    }

}