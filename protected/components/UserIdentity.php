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
        
       public function authenticate()
	{        

        
        $use1 = $this->username;
        $user=user::model()->find('username=:username', array(':username'=>$use1));
        $users = array(
                'demo' => 'demo',
                'admin' => 'admin',
                $user['username'] => $user['password'],
                //$employee['username'] => $employee['password'],
            );
  
        
        
            if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
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