<?php


class forgetPassword extends CFormModel    {
    public $email;
    public $username;

    public function rules() {
        return array(
            // name, email, subject and body are required
            array('email, username', 'safe'),
            // email has to be a valid email address
            array('email', 'email'),
                 
           // array('email','compare','className'=>'member')
            );
    }        
        
}
?>
