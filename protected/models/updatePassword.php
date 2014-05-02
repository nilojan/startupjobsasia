<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class updatePassword extends CFormModel{

		public $password1;
		public $password2;
		public $password3;

		
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
		array('password1,password2,password3', 'required'),
	    array('password1,password2,password3','safe'),
		 //array('password2','checkStrength','score'=>20),

		 array('password2', 'length', 'min'=>6, 'max'=>25),
		 array('password3', 'compare', 'compareAttribute' => 'password2','message'=> 'Password does not match')
          
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(

						'password1'     => 'Current Password',
						'password2'     => 'New Password',
						'password3'     => 'Confirm New Password',
		);
	}
}