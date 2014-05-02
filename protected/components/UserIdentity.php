<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{       
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	
        private $_id;
        private $CID = null;
        
        public function authenticate()	{        

            $user_available = 'false';
            $use1 = $this->username;
			$user = NULL;
			$use1 = trim($use1);

			if($user = user::model()->find('email=:email', array(':email'=>$use1)))
            {
                $user_available = 'true';            
            }
            $users = array(
                    'demo' => 'demo',
                    'admin' => 'admin',
                    $user['email'] => $user['password'],
                    //$employee['username'] => $employee['password'],
                );
           
            $user_active = '';  
            $startup_active = '';  
            
            if(($user_available == 'true') && ($user->role == 0))
            {
                $user_active = 'false';
                $emp = Employee::model()->find('UID=:user_id', array(':user_id'=>$user->ID));
                if($emp->registered == 1)
                {
                    $user_active =  'true';
                }

            } 
            if(($user_available == 'true') && ($user->role == 2))
            {
                $startup_active = 'false';
                $startup = company::model()->find('ID=:user_id', array(':user_id'=>$user->ID));
                if($startup->registered == 1)
                {
                    $startup_active =  'true';   
                } 
            }   
            
            if(!isset($users[$this->username]) || ($user_available == 'false'))
    			$this->errorCode=self::ERROR_USERNAME_INVALID;
    		else if($users[$this->username]!==$this->password)
    			$this->errorCode=self::ERROR_PASSWORD_INVALID;        
            else if(($users[$this->username]==$this->password) && ($user_active == 'false'))
            { ?>
                <script type="text/javascript">
                 //  $('#err_msg').html('Your account is not activated yet! <br> Please check your email and activate your account ');
                  alert("Your account is not activated yet! Please check your email and activate your account ");
                </script>

            <?php }
            else if(($users[$this->username]==$this->password) && ($startup_active == 'false'))
            { ?>
                <script type="text/javascript">
                 //  $('#err_msg').html('Your account is not activated yet! <br> Please check your email and activate your account ');
                  alert("Your startup account is not activated yet! Please check your email and activate your account ");
                </script>
            <?php 
                $this->setState('roles', $user->role);
                $this->_id = $user['ID']; 
                $this->errorCode=self::ERROR_NONE;

            }            
    		else                                        // successful
    		{	                     
                    
                    $this->setState('roles', $user->role);
                    $this->_id = $user['ID']; 
                    $this->errorCode=self::ERROR_NONE;
                            
                            
            }
            
            return !$this->errorCode;        
        }

        public function getID()    {
        
            return $this->_id;
        }
        public function getCID()    {
            return $this->CID;
            
        }

        public function isAdmin()    {
            if ($this->role == '1')
                return True;
            else
                return False;
        }
        
        public function isUser()    {
            if ($this->role == '0')
                return True;
            else
                return False;
            
            
        }
        
        
         public function isCompany()    {
            if ($this->role == '2')
                return True;
            else
                return False;
                
            
        }

        
        
        
        
}