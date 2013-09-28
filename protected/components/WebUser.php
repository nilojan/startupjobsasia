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

       
    function read_file_doc($userDoc) 
    {
        if(file_exists($userDoc))
        {
            if(($fh = fopen($userDoc, 'r')) !== false ) 
            {
               $headers = fread($fh, 0xA00);

               // 1 = (ord(n)*1) ; Document has from 0 to 255 characters
               $n1 = ( ord($headers[0x21C]) - 1 );

               // 1 = ((ord(n)-8)*256) ; Document has from 256 to 63743 characters
               $n2 = ( ( ord($headers[0x21D]) - 8 ) * 256 );

               // 1 = ((ord(n)*256)*256) ; Document has from 63744 to 16775423 characters
               $n3 = ( ( ord($headers[0x21E]) * 256 ) * 256 );

               // 1 = (((ord(n)*256)*256)*256) ; Document has from 16775424 to 4294965504 characters
               $n4 = ( ( ( ord($headers[0x21F]) * 256 ) * 256 ) * 256 );

               // Total length of text in the document
               $textLength = ($n1 + $n2 + $n3 + $n4);

               $extracted_plaintext = fread($fh, $textLength);

               // simple print character stream without new lines
               //echo $extracted_plaintext;

               // if you want to see your paragraphs in a new line, do this
               return nl2br($extracted_plaintext);

               // need more spacing after each paragraph use another nl2br
            }
        }

    } 


    function read_file_docx($filename)
    {

        $striped_content = '';
        $content = '';

        if(!$filename || !file_exists($filename)) return false;

        $zip = zip_open($filename);

        if (!$zip || is_numeric($zip)) return false;

        while ($zip_entry = zip_read($zip)) {

          if (zip_entry_open($zip, $zip_entry) == FALSE) continue;

          if (zip_entry_name($zip_entry) != "word/document.xml") continue;

          $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

          zip_entry_close($zip_entry);
        }// end while

        zip_close($zip);

        //echo $content;
        //echo "<hr>";
        //file_put_contents('1.xml', $content);   

        $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
        $content = str_replace('</w:r></w:p>', "\r\n", $content);
        $striped_content = strip_tags($content);

        return $striped_content;
    }
    function download_file($file, $name, $mime_type='')
{
  $file_extension = strtolower(substr(strrchr($file,"."),1));
 
  $name ='StartupResumes.'.$file_extension;
 //Check the file premission
 if(!is_readable($file)) die('File not found or inaccessible!');
 
 $size = filesize($file);
 $name = rawurldecode($name);
 
 /* Figure out the MIME type | Check in array */
 $known_mime_types=array(
  "pdf" => "application/pdf",
  "txt" => "text/plain",
  "html" => "text/html",
  "htm" => "text/html",
  "exe" => "application/octet-stream",
  "zip" => "application/zip",
  "doc" => "application/msword",
  "xls" => "application/vnd.ms-excel",
  "ppt" => "application/vnd.ms-powerpoint",
  "gif" => "image/gif",
  "png" => "image/png",
  "jpeg"=> "image/jpg",
  "jpg" =>  "image/jpg",
  "php" => "text/plain"
 );
 
 if($mime_type==''){
   $file_extension = strtolower(substr(strrchr($file,"."),1));
   if(array_key_exists($file_extension, $known_mime_types)){
    $mime_type=$known_mime_types[$file_extension];
   } else {
    $mime_type="application/force-download";
   };
 };
 
 //turn off output buffering to decrease cpu usage
 @ob_end_clean(); 
 
 // required for IE, otherwise Content-Disposition may be ignored
 if(ini_get('zlib.output_compression'))
  ini_set('zlib.output_compression', 'Off');
 
 header('Content-Type: ' . $mime_type);
 header('Content-Disposition: attachment; filename="'.$name.'"');
 header("Content-Transfer-Encoding: binary");
 header('Accept-Ranges: bytes');
 
 /* The three lines below basically make the 
    download non-cacheable */
 header("Cache-control: private");
 header('Pragma: private');
 header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
 
 // multipart-download and download resuming support
 if(isset($_SERVER['HTTP_RANGE']))
 {
  list($a, $range) = explode("=",$_SERVER['HTTP_RANGE'],2);
  list($range) = explode(",",$range,2);
  list($range, $range_end) = explode("-", $range);
  $range=intval($range);
  if(!$range_end) {
    $range_end=$size-1;
  } else {
    $range_end=intval($range_end);
  }
  
  $new_length = $range_end-$range+1;
  header("HTTP/1.1 206 Partial Content");
  header("Content-Length: $new_length");
  header("Content-Range: bytes $range-$range_end/$size");
 } else {
  $new_length=$size;
  header("Content-Length: ".$size);
 }
 
 /* Will output the file itself */
 $chunksize = 1*(1024*1024); //you may want to change this
 $bytes_send = 0;
 if ($file = fopen($file, 'r'))
 {
  if(isset($_SERVER['HTTP_RANGE']))
  fseek($file, $range);
 
  while(!feof($file) && 
    (!connection_aborted()) && 
    ($bytes_send<$new_length)
        )
  {
    $buffer = fread($file, $chunksize);
    print($buffer); //echo($buffer); // can also possible
    flush();
    $bytes_send += strlen($buffer);
  }
 fclose($file);
 } else
 //If no permissiion
 die('Error - can not open file.');
 //die
die();
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

                  case 'applyjob_existing_user' :

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

                  case 'submit_job' :
                  
                                    $body = "Hello<br>
                                          <br>
                                          A new job has been posted by startup : <br>
                                          <br>
                                          <br>
                                          Title : ".$data['job']."<br>
                                          Company : ".$data['company']."<br><br><br>
                                          URL : <a href='".$data['job_url']."'>".$data['job_url']."</a><br><br><br>
                                          
                                          THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!<br>
                                          <br>
                                          -------------<br>
                                          StartUp Jobs Asia Team";
                                          $message->setBody($body, 'text/html');
                                          $message->subject = "StartUp Jobs Asia - New Job";
                                          $message->addTo($data['to']);
                                          $message->from = 'noreply@StartUpJobsAsia.com';
                                          Yii::app()->mail->send($message); 
                                          $flag = true;                                            

                                  break; 

                  case 'forgot_password' :
                  
                                    $body = "Hi <font type=\"bold\">" . $data['name'] . "</font><br>
                                            <br>
                                            Your account <font type=\"bold\">" . $data['account'] . "</font>'s password has been reset.<br>
                                            <br>
                                            This is your new password : ".$data['pwd']."<br>
                                            <br>
                                            THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!<br>
                                            <br>
                                            -------------<br>
                                            StartUp Jobs Asia Team";
                                          $message->setBody($body, 'text/html');
                                          $message->subject = "StartUp Jobs Asia - New Password";
                                          $message->addTo($data['to']);
                                          $message->from = 'noreply@StartUpJobsAsia.com';
                                          Yii::app()->mail->send($message); 
                                          $flag = true;                                            

                                  break;  
                  case 'deposit_resume':
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

                  case 'premium_job' :
                  
                                    $body = "Hi <font type=\"bold\">" . $data['name'] . "</font><br>
                                            <br>                                           
                                            <br>
                                            You have added a job in premium listings: <br><br>
                                            Job Title : ".$data['job']."<br>
                                            Company Name : ".$data['company']."<br>
                                            Job URL : <a href='".$data['job_url']."'>".$data['job_url']."</a><br><br><br>

                                            <br>
                                            THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!<br>
                                            <br>
                                            -------------<br>
                                            StartUp Jobs Asia Team";
                                          $message->setBody($body, 'text/html');
                                          $message->subject = "StartUp Jobs Asia - Premium Job";
                                          $message->addTo($data['to']);
                                          $message->from = 'noreply@StartUpJobsAsia.com';
                                          Yii::app()->mail->send($message); 
                                          $flag = true;                                            

                                  break;
                case 'startup_premium':  
                                  $body = "Hi <font type=\"bold\">" . $data['name'] . "</font><br>
                                            <br>                                           
                                            <br>
                                            @@@$$$$  Welcome to startup jobs$$$$@@@@
                                            
                                            approve this Startup:

                                            You have added a startup in Normal premium listings: <br><br>
                                          
                                            Startup Name : ".$data['company']."<br>
                                            Startup URL : <a href='".$data['url']."'>".$data['url']."</a><br><br><br>
                                            

                                            <br>
                                            THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!<br>
                                            <br>
                                            -------------<br>
                                            StartUp Jobs Asia Team";
                                          $message->setBody($body, 'text/html');
                                          $message->subject = "StartUp Jobs Asia - Premium Job";
                                          $message->addTo($data['to']);
                                          $message->from = 'noreply@StartUpJobsAsia.com';
                                          Yii::app()->mail->send($message); 
                                          $flag = true; 


                                  break;
                case 'startup_registration':
                                   $body = "Hi <font type=\"bold\">" . $data['name'] . "</font><br>
                                            <br>                                           
                                            <br>
                                            @@@$$$$  Welcome to startup jobs$$$$@@@@
                                            
                                            approve this Startup:

                                            You have added a job in premium listings: <br><br>
                                          
                                            Company Name : ".$data['company']."<br>
                                            

                                            <br>
                                            THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!<br>
                                            <br>
                                            -------------<br>
                                            StartUp Jobs Asia Team";
                                          $message->setBody($body, 'text/html');
                                          $message->subject = "StartUp Jobs Asia - Premium Job";
                                          $message->addTo($data['to']);
                                          $message->from = 'noreply@StartUpJobsAsia.com';
                                          Yii::app()->mail->send($message); 
                                          $flag = true;              

                                  break;
                case 'welcome_startups':
                                   $body = "Hi <font type=\"bold\">" . $data['company'] . "</font><br>
                                            <br>                                           
                                            <br>
                                            @@@$$$$  Welcome to startup jobs$$$$@@@@
                                            
                                            
                                            

                                            <br>
                                            THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!<br>
                                            <br>
                                            -------------<br>
                                            StartUp Jobs Asia Team";
                                          $message->setBody($body, 'text/html');
                                          $message->subject = "StartUp Jobs Asia - Premium Job";
                                          $message->addTo($data['to']);
                                          $message->from = 'noreply@StartUpJobsAsia.com';
                                          Yii::app()->mail->send($message); 
                                          $flag = true;             

                                  break;
                case 'update_application':
                                   $body = "Hi <font type=\"bold\">" . $data['event'] . "</font><br>
                                            <br>                                           
                                            <br>
                                            @@@$$$$  Job updated by $$$$@@@@
                                            
                                            
                                            

                                            <br>
                                            THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!<br>
                                            <br>
                                            -------------<br>
                                            StartUp Jobs Asia Team";
                                          $message->setBody($body, 'text/html');
                                          $message->subject = "StartUp Jobs Asia -Job Status Updated";
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
