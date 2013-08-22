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

    function dateDiff($d1, $d2) {
    // Return the number of days between the two dates:

      return round(abs(strtotime($d1)-strtotime($d2))/86400);

    }

    function CountVisitors($job_id) {
    // Return the number of days between the two dates:
        $ip= $_SERVER["REMOTE_ADDR"];
        $datetime =date("Y/m/d") . ' ' . date('H:i:s');
        if($stats = Stats::model()->find('JID=:jid AND IP=:ip',array(':jid'=>$job_id,':ip'=>$ip)))
        {
            $stats->visits = $stats->visits+1;
            $stats->last_visit = $datetime;
            $stats->save();
            $job = job::model()->find('JID=:jid',array(':jid'=>$job_id));
            $job->views = $job->views+1;
            $job->save();
        }
        else
        {
            $stats = new Stats();                
            $stats->JID = $job_id;
            $stats->IP = $ip;
            $stats->visits = 1;
            $stats->last_visit = $datetime;
            $stats->save();
            $job = job::model()->find('JID=:jid',array(':jid'=>$job_id));
            $job->unique_views = $job->unique_views+1;
            $job->views = $job->views+1;
            $job->save();

        }
    }
    


     function sendEmail($event,$data)   {
            
             // events
             //    - registration
             //    - forget Password
             //    - apply Job guest
             //    - apply Job member
             //    - job response by company



              Yii::import('ext.yii-mail.YiiMailMessage');                                     
              $message = new YiiMailMessage;
              $baseUrl = Yii::app()->request->baseUrl;
              $serverPath = 'localhost/yii/uStyle';
              $body = '';
              $flag = false;
              switch($event)
              {
                case 'registration' : 
                                                                  
                                  $body = "Hi <font type=\"bold\">" . $data['name'] . "</font><br>
                                          <br>
                                          Welcome to StartUp Jobs Asia! Your account <font type=\"bold\">" . $data['username'] . "</font> has been registered.<br>
                                          <br>
                                          In order to ensure that you have received this confirmation, we ask that you follow the link below and confirm that this is in fact the correct email address.<br>
                                          <br>
                                          <a href='".$data['verify_link']."'>Verify Your Email Here</a><br>
                                          <br>
                                          You can use follwing username and passsword to login into your account.
                                          <br>
                                          Username : " . $data['username'] . "
                                          <br>" . "
                                          Password : " . $data['password'] . "
                                          <br>
                                          <br>
                                          Accounts that have not been confirmed will be deactivated and removed from our system within 7 days, including all email addresses.<br> 
                                          <br>
                                          If you have NOT attempted to create an account at startupjobs please ignore this email - it might have been sent because someone mistyped his/her own email address.<br>
                                          THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!<br>
                                          <br>
                                          -------------<br>
                                          StartUp Jobs Asia Team";
                                          $message->setBody($body, 'text/html');
                                          $message->subject = "StartUp Jobs Asia Account Verification";
                                          $message->addTo($data['to']);
                                          $message->from = 'noreply@StartUpJobsAsia.com';
                                          Yii::app()->mail->send($message); 
                                          $flag = true;                                            

                                  break;

                case 'applyjob' : 
                                    $body = "Hi <font type=\"bold\">" . $data['username'] . "</font><br>
                                          <br>
                                          You have applied for a job <br>
                                          <br>
                                          <br>
                                          Title : ".$data['job']."<br>
                                          Company : ".$data['company']."<br><br><br>
                                          
                                          THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!<br>
                                          <br>
                                          -------------<br>
                                          StartUp Jobs Asia Team";
                                          $message->setBody($body, 'text/html');
                                          $message->subject = "StartUp Jobs Asia - Apply Job";
                                          $message->addTo($data['to']);
                                          $message->from = 'noreply@StartUpJobsAsia.com';
                                          Yii::app()->mail->send($message); 
                                          $flag = true;                                            

                                  break;
              }
              
             if($flag == true)
             {
                return true;
             }
             else
             {
                return false; 
             }

            

        }
     
}
?>
