<?php
 
// this file must be stored in:
// protected/components/WebUser.php
 
class WebUser extends CWebUser {
 
  // Store model to not repeat query.
  private $_model;
  
  public function checkAccess($operation, $params=array())
    {
        if (empty($this->id)) {
            // Not identified => no rights
            return false;
        }
        $role = $this->getState("roles");
        if ($role === '1') {
            return true; // admin role has access to everything
        }
      
        // allow access if the operation request is the current user's role
        return ($operation === $role);
    }
  // Return first name.
  // access it by Yii::app()->user->first_name
  function getFirst_Name(){
    $user = $this->loadUser(Yii::app()->user->id);
    return $user->first_name;
  }
 
  // This is a function that checks the field 'role'
  // in the User model to be equal to 1, that means it's admin
  // access it by Yii::app()->user->isAdmin()
   function isAdmin(){
        $user = $this->loadUser(Yii::app()->user->getID());
        if ($user)
           return $user->role==1;
        return false;
    }
     function isMember(){
        $user = $this->loadUser(Yii::app()->user->getID());
        if ($user)
           return $user->role==0;
        return false;
    }
  function isCompany(){
        $user = $this->loadUser(Yii::app()->user->getID());
        //$user = user::model()->find('ID=:ID', array(':ID'=>Yii::app()->user->getID()));        
        if ($user)
           return $user->role==2;
        return false;
    }
  // Load user model.
  protected function loadUser($id=null)
    {
        if($this->_model===null)
        {
            if($id!==null)
                $this->_model=user::model()->find('ID=:ID', array(':ID'=>$id));
        }   
        return $this->_model;
    }
     
}
?>
