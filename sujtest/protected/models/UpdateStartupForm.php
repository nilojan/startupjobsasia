<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class UpdateStartupForm extends CFormModel
{       public $password1;
		public $password2;
		public $password3;
		public $name;
		public $cemail;
		public $contact;
		
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
	     array('name,cemail,contact,password1,password2,password3','safe'),
		 array('cemail', 'email'),
		 array('contact', 'length', 'min'=>8, 'max'=>15),
		 array('password2', 'length', 'min'=>6, 'max'=>25),
		 array('password3', 'compare', 'compareAttribute' => 'password2', 'on'=>'register','message'=> 'Password does not match')
          
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
                        'cemail'    => 'Email Address',
                        'name'     => 'Contact Person Name',
                        'contact'     => 'Contact Person Phone',
						'password1'     => 'Current Password',
						'password2'     => 'New Password',
						'password3'     => 'Confirm New Password',
		);
	}
}