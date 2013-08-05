<?php


class DepositResume extends CFormModel{

	public $fullname;
    public $photo;	
    public $coverletter;	
	public $dob;
	public $gender;
	public $email;
	public $location;
	public $contact;
	public $edu;
	public $national;
	public $lastjob;
	public $resume;
	public $content;
	public $source;
	public $IP;
	public $datee;
	public $viewed;
	public $verifyCode;
    
    /**
     * Declares the validation rules.
     */
    //to be changed

	
    public function rules() {
        return array(
            // name, email, subject and body are required
            //array('resume, photo, coverLetter', 'safe'),
            // email has to be a valid email address
           // array('address,contact, image, about','safe'),
		   
		   array('fullname, dob, gender, email, location, contact, edu, national', 'required'),
		   
            array('email', 'email'),
			array('email','unique', 'className' => 'resume'),
            // verifyCode needs to be entered correctly
            array('coverletter', 'safe'),
            array('resume', 'file',
                  'types'=>'pdf,doc,docx',
                  'maxSize' => 1024 * 1024 * 2, 
                  'allowEmpty'=>false,),
            array('photo', 'file',
                  'types'=>'jpg, png,jpeg, gif',
                  'maxSize' => 1024 * 1024 * 2,   
                  'allowEmpty'=>true, ),
           
            // password must be at lenght minimal of 6 charaycters
           
			// array('title', 'length', 'max'=>255, 'on'=>'insert,update'),
			// array('email, username','unique','className'=>'member'),
            array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements()),
           );
    }
    

    /*
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */

    public function attributeLabels(){
        return array(
            'coverletter'=>'Cover Letter',
			'fullname'=>'Fullname',
			'dob'=>'Date of Birth',
			'edu'=>'Education',
			'national'=>'Nationality',
			'verifyCode'=>'',
        );
    }

}
?>