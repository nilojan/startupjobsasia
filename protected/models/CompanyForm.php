<?php


class CompanyForm extends CFormModel
{
    public $cname;
    public $mission;
    public $culture;
    public $benefits;
    public $cemail;
    public $password2;
    public $image;
    public $address;
    public $contact;
    public $website;
    public $facebook;
    public $awards;
    public $started;
    public $summary;
    public $cover_letter;
    public $coverpicture;
  //   public $mailingAddress;
 
    
    /**
     * Declares the validation rules.
     */
    //to be changed

    public function rules() {
        return array(
            // name, email, subject and body are required
            array('cname, cemail, ', 'required'),
            // email has to be a valid email address
            array('cemail', 'email'),
            // username must be at lenght minimal of 6 characters
            array('cname', 'length', 'max'=>45),
           // password must be at lenght minimal of 6 charaycters
            array('address,contact,mission,culture,benefits,image,coverpicture','safe'),
            array('contact', 'length', 'min' => 8, 'max' => 8),
            array('contact', 'numerical'),
            
            // verifyCode needs to be entered correctly
             array('image', 'file',
                   'types'=>'jpg, jpeg, png, gif',
                   'maxSize' => 1024 * 1024 * 1,   
                   'allowEmpty'=>true, ),
             array('coverpicture', 'file',
                   'types'=>'jpg, jpeg, png, gif',
                   'maxSize' => 1024 * 1024 * 1,   
                   'allowEmpty'=>true, ),
           
           
// array('title', 'length', 'max'=>255, 'on'=>'insert,update'),
     //       array('email, username','unique','className'=>'member'),
            //array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements()),
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
            'password2' =>'Re Enter Password',
            'cemail'    => 'Email Address',
            'cname'     => 'Company Name',
            'image'     => 'Company logo',
            'cover'     => 'Cover Photo',
        );
    }

}
?>