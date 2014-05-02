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

    function CountVisitors($job_id){
    // Return the number of days between the two dates:
        $ip= $_SERVER["REMOTE_ADDR"];
        $datetime =date("Y/m/d") . ' ' . date('H:i:s');
        if($stats = Stats::model()->find('JID=:jid AND IP=:ip',array(':jid'=>$job_id,':ip'=>$ip)))
        {
            $stats->visits = $stats->visits+1;
            $stats->last_visit = $datetime;
			$stats->last_visit_date = date('Y-m-d');
            if($stats->save(false)){
				$job = job::model()->find('JID=:JID',array(':JID'=>$job_id));
				$current_job_views = $job->views;
				$job->views = $current_job_views+1;
				$job->save(false);
			}

        }else{

            $stats = new Stats();
            $stats->JID = $job_id;
            $stats->IP = $ip;
            $stats->visits = 1;
            $stats->last_visit = $datetime;
			$stats->last_visit_date = date('Y-m-d');
            if($stats->save(false)){
				$job = job::model()->find('JID=:JID',array(':JID'=>$job_id));
				$current_job_views = $job->views;
				$current_unique_job_views = $job->views;
				$job->unique_views = $current_unique_job_views+1;
				$job->views = $current_job_views+1;
				$job->save(false);
			}

        }
    }


    function read_file_docc($userDoc) 
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


	function read_file_doc($file){
		$data_array = explode(chr(0x0D),fread(fopen($file, "r"), filesize($file)));
		$data_text = "";
		foreach($data_array as $data_line){
		if (strpos($data_line, chr(0x00) !== false)||(strlen($data_line)==0))
		{} else {if(chr(0)) {
							  //$data_text .= stripslashes(trim(preg_replace("/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/","",$data_line))); 
							  $data_text .= preg_replace("/[^A-Za-z0-9?![:space:]]/"," ",$data_line);
							 // $data_text = preg_replace("/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/","",$data_line);
			   } 
		   }        
		}
		return $data_text;
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
	
    function download_file($file, $name, $mime_type=''){
	
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

 function crop_logo($logoimage){
//http://stackoverflow.com/questions/10589704/php-gd-add-padding-to-image

$orig_filename = $logoimage;
$new_filename = $logoimage;

$ext = pathinfo($orig_filename, PATHINFO_EXTENSION);

list($orig_w, $orig_h) = getimagesize($orig_filename);

$orig_img = imagecreatefromstring(file_get_contents($orig_filename));

$output_w = 400;
$output_h = 400;

// determine scale based on the longest edge
if ($orig_h > $orig_w) {
    $scale = $output_h/$orig_h;
} else {
    $scale = $output_w/$orig_w;
}

    // calc new image dimensions
$new_w =  $orig_w * $scale;
$new_h =  $orig_h * $scale;

//echo "Scale: $scale<br />";
//echo "New W: $new_w<br />";
//echo "New H: $new_h<br />";
//echo "$ext";

// determine offset coords so that new image is centered
$offest_x = ($output_w - $new_w) / 2;
$offest_y = ($output_h - $new_h) / 2;

    // create new image and fill with background colour
$new_img = imagecreatetruecolor($output_w, $output_h);
$bgcolor = imagecolorallocate($new_img, 255, 255, 255); // red
imagefill($new_img, 0, 0, $bgcolor); // fill background colour

    // copy and resize original image into center of new image
imagecopyresampled($new_img, $orig_img, $offest_x, $offest_y, 0, 0, $new_w, $new_h, $orig_w, $orig_h);

    //save it
imagejpeg($new_img, $new_filename, 80);



}

     function sendEmail($event,$data)   {
            
             // events
             //    - registration
             //    - forget Password
             //    - apply Job guest
             //    - apply Job member
             //    - job response by company

              $logo = "<img src='https://farm8.staticflickr.com/7082/13302390425_a9172c3855_o_d.png'><br><br>";
			  $adminemail = "tamilnilo@gmail.com,benchew1975@gmail.com";
			  /*
			    $headers='From: noreply@startupjobs.com'. "\r\n";
				$headers='Reply-To:noreply@startupjobs.asia'. "\r\n";
                $headers.='MIME-Version: 1.0'. "\r\n"; 
                $headers.='Content-type: text/html; charset=iso-8859-1' . "\r\n";
				*/
				$headers = "From: StartUp Jobs Asia <noreply@startupjobs.asia> \r\n";
				$headers.= "Reply-To:noreply@startupjobs.asia \r\n";
				$headers.= "MIME-Version: 1.0 \r\n";
				$headers.= "Content-Type: text/html; charset=ISO-8859-1 \r\n";
										  
              $body = '';
              $flag = false;
              switch($event)
              {
                case 'registration' : 
                                                                  
                                  $body = "".$logo." Hi <font type=\"bold\">" . $data['name'] . "</font><br>
                                          <br>
                                          Welcome to StartUp Jobs Asia! Your temporary account has been registered.<br>
                                          <br>
                                          In order to ensure that you have received this confirmation, we ask that you follow the link below and confirm that this is in fact the correct email address.<br>
                                          <br>
                                          <a href='".$data['verify_link']."'>Verify Your Email Here</a><br>
                                          <br>
                                          Once your account is verified , you are able to login with your email and password 
                                          <br>
                                          <br>

                                          <br>
                                          If you have NOT attempted to create an account at startupjobs please ignore this email - it might have been sent because someone mistyped his/her own email address.<br>
                                          <small>THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!</small><br>
                                          <br>
                                          -------------<br>".$logo."StartUp Jobs Asia Team";

                                          $to=$data['to'];
                                          $subject ='StartUp Jobs Asia Account Verification';
                                          $headerss = $headers;
                                          $message= $body;
                                          mail($to, $subject,$message,$headerss);
                                          $flag = true;                                            

                                  break;

                case 'applyjob' : 
                                    $body = "".$logo." Hi <font type=\"bold\">" . $data['name'] . "</font><br>
                                          <br>
                                          You have applied for a job <br>
                                          <br>
                                          <br>
                                          Job Title : ".$data['job']."<br>
                                          Startup : ".$data['company']."<br>
										   Job Link : <a href='".$data['job_url']."'>".$data['job']."</a><br><br>
                                          
                                          <small>THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!</small><br>
                                          <br>
                                          -------------<br>".$logo."
                                            StartUp Jobs Asia Team";

                                          $to=$data['to'];
                                          $subject ="StartUp Jobs Asia - Apply Job";
                                          $headerss = $headers;
                                          $message= $body;
                                          mail($to, $subject,$message,$headerss);
                                          $flag = true;                                            

                                  break;

                case 'applyjob_startup' : 
                                    $body = "".$logo." Hi <font type=\"bold\">" . $data['company'] . "</font><br><br>
                                          " . $data['name'] . " applied for your job post ".$data['job']."<br><br>
										  
										   Job URL : <a href='".$data['job_url']."'>".$data['job']."</a><br><br>
										   Applicant Resume : <a href='".$data['file']."'>Download</a><br><br>
										  
                                          
										  You may also login to Startup Jobs Asia and check the applicant information.<br><br><br><br>
                                          <small>THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!</small><br>
                                          <br>-------------<br>".$logo."
                                            StartUp Jobs Asia Team";

                                          $to=$data['company_email'].",".$data['howtoapply'];
                                          $subject ="New Applicant for Job Post - StartUp Jobs Asia";
                                          $headerss = $headers;
                                          $message= $body;
                                          mail($to, $subject,$message,$headerss);
                                          $flag = true;                                            

                                  break;	

			case 'applyjob_admin' : 
                                    $body = "".$logo." Hi <font type=\"bold\">Admin</font><br><br>
                                          " . $data['name'] . " applied for a job post ".$data['job']." , which is posted by " . $data['company'] . " <br><br>
										  
										   Job URL : <a href='".$data['job_url']."'>".$data['job']."</a><br><br>
										   Applicant Resume : <a href='".$data['file']."'>Download</a><br><br>
                                          
										  You may also login to Startup Jobs Asia and check the user information.<br><br><br>
                                          <small>THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!</small><br>
                                          <br>-------------<br>".$logo."
                                            StartUp Jobs Asia Team";

                                          $to=$adminemail;
                                          $subject ="New Applicant for Job Post - StartUp Jobs Asia";
                                          $headerss = $headers;
                                          $message= $body;
                                          mail($to, $subject,$message,$headerss);
                                          $flag = true;                                            

                                  break;
								  
								  

                  case 'applyjob_existing_user' :

                                    $body = "".$logo." Hi <font type=\"bold\">" . $data['name'] . "</font><br>
                                          <br>
                                          You have applied for a job <br>
                                          <br>
                                          <br>
                                          Job Title : ".$data['job']."<br>
                                          Startup : ".$data['company']."<br><br><br>
										  Job Link : <a href='".$data['job_url']."'>".$data['job']."</a><br><br><br><br>
                                          
                                          <small>THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!</small><br>
                                          <br>
                                          -------------<br>".$logo."
                                            StartUp Jobs Asia Team";

                                          $to=$data['to'];
                                          $subject ="StartUp Jobs Asia - Apply Job";
                                          $headerss = $headers;
                                          $message= $body;
                                          mail($to, $subject,$message,$headerss);
                                          $flag = true;                                            

                                  break;

                  case 'submit_job' :
                  
                                    $body = "".$logo." Hello<br>
                                          <br>
                                          A new job has been posted by startup :".$data['company']." <br>
                                          <br>
                                          <br>
                                          Job Title : ".$data['job']."<br>
                                          Job Link : <a href='".$data['job_url']."'>".$data['job']."</a><br><br><br>
                                          
                                          <small>THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!</small><br>
                                          <br>
                                          -------------<br>".$logo."
                                            StartUp Jobs Asia Team";

                                          $to= $adminemail;
                                          $subject ="StartUp Jobs Asia - New Job";
                                          $headerss = $headers;
                                          $message= $body;
                                          mail($to, $subject,$message,$headerss);
                                          $flag = true;                                            

                                  break; 

                  case 'forgot_password' :
                  
                                    $body = "".$logo." Hi <font type=\"bold\">" . $data['name'] . "</font><br>
                                            <br>
                                            Your Startup Jobs Asia's account password has been reset.<br>
                                            <br>
                                            This is your new password : ".$data['pwd']."<br>
                                            <br>
											<b>Please Don't forget to change your password once you login</b>
											<br>
                                            <small>THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!</small><br>
                                            <br>
                                            -------------<br>".$logo."
                                            StartUp Jobs Asia Team";

                                          $to=$data['to'];
                                          $subject ="StartUp Jobs Asia - Password Re-Set";
                                          $headerss = $headers;
                                          $message= $body;
                                          mail($to, $subject,$message,$headerss);
                                          $flag = true;                                            

                                  break;  
                  case 'deposit_resume':
                            $body = " ".$logo." Hi <font type=\"bold\">" . $data['name'] . "</font><br>
                                          <br>
                                          Welcome to StartUp Jobs Asia! Your temporary account has been registered.<br>
                                          <br>
                                          In order to ensure that you have received this confirmation, we ask that you follow the link below and confirm that this is in fact the correct email address.<br>
                                          <br>
                                          <a href='".$data['verify_link']."'>Verify Your Email Here</a><br>
                                          <br>
                                          Once your account is verified , you are able login with your email and password 
                                          <br>
    
                                          <br>
                                          <br>
                                          Accounts that have not been confirmed will be deactivated and removed from our system within 7 days, including all email addresses.<br> 
                                          <br>
                                          If you have NOT attempted to create an account at startupjobs please ignore this email - it might have been sent because someone mistyped his/her own email address.<br>
                                          <small>THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!</small><br>
                                          <br>
                                          -------------<br>".$logo."
                                            StartUp Jobs Asia Team";

                                          $to=$data['to'];
                                          $subject ="StartUp Jobs Asia Account Verification";
                                          $headerss = $headers;
                                          $message= $body;
                                          mail($to, $subject,$message,$headerss); 
                                          $flag = true;                                            

                                  break; 
             case 'deposit_resume_admin':
                            $body = " ".$logo." Hi <font type=\"bold\"> Admin </font><br>
                                          <br>
                                          A new user <font type=\"bold\">" . $data['name'] . "</font> has been registered.<br>
                                          <br>
                                          
                                          and its from deposit resume!
    
                                          <br>
                                          <br>
                                          
                                          <br>
                                          <br>
                                          <small>THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!</small><br>
                                          <br>
                                          -------------<br>".$logo."
                                            StartUp Jobs Asia Team";

                                          $to=$adminemail;
                                          $subject ="Deposit Resume - StartUp Jobs Asia";
                                          $headerss = $headers;
                                          $message= $body;
                                          mail($to, $subject,$message,$headerss); 
                                          $flag = true;                                            

                                  break;								  

                  case 'premium_job' :
                  
                                    $body = "".$logo."Hi <font type=\"bold\">" . $data['name'] . "</font><br>
                                            <br>                                           
                                            <br>
                                            You have added a job in premium listings: <br><br>
                                            Premium Job Title : ".$data['job']."<br>
                                            Startup Name : ".$data['company']."<br>
                                            Premium Job URL : <a href='".$data['job_url']."'>".$data['job_url']."</a><br><br><br>

                                            <br>
                                            <small>THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!</small><br>
                                            <br>
                                            -------------<br>".$logo."
                                            StartUp Jobs Asia Team";

                                           $to=$data['to'];
                                          $subject ="StartUp Jobs Asia - Premium Job";
                                          $headerss = $headers;
                                          $message= $body;
                                          mail($to, $subject,$message,$headerss); 
                                          $flag = true;                                            

                                  break;
                case 'startup_premium':  
                                  $body = "".$logo." Hi <font type=\"bold\">" . $data['company'] . "</font><br>
                                            <br>                                           
                                            <br>

                                            You have added a job in Featured listings: <br><br>
                                          
                                            Premium Job : ".$data['job']."<br>
                                            Job URL : <a href='".$data['job_url']."'>".$data['job']."</a><br><br><br>
                                            
											<b>Thank you for choosing Startup Jobs Asia Featured Listings</b><br><br><br>
                                            <br>
                                            <small>THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!</small><br>
                                            <br>
                                            -------------<br>".$logo."
                                            StartUp Jobs Asia Team";

                                          $to=$data['to'];
                                          $subject ="StartUp Jobs Asia - Premium Job Listings";
                                          $headerss = $headers;
                                          $message= $body;
                                          mail($to, $subject,$message,$headerss); 
                                          $flag = true;                            
                                          


                                  break;
                case 'startup_premium_admin':  
                                  $body = "".$logo." Hi <font type=\"bold\">Admin</font><br>
                                            <br>                                           
                                            <br>
                                            There is a Premium Job is coming in<br><br>
                                          
                                            Startup Name : ".$data['company']."<br>
                                            Startup URL : <a href='".$data['url']."'>".$data['url']."</a><br><br><br>
											Featured Job : ".$data['job']."<br>
                                            Job URL : <a href='".$data['job_url']."'>".$data['job_url']."</a><br><br><br>
                                            

                                            <br>
                                            <small>THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!</small><br>
                                            <br>
                                            -------------<br>".$logo."
                                            StartUp Jobs Asia Team";

                                          $to=$adminemail;
                                          $subject ="StartUp Jobs Asia - Premium Job";
                                          $headerss = $headers;
                                          $message= $body;
                                          mail($to, $subject,$message,$headerss); 
                                          $flag = true;                            
                                          


                                  break;								  
                case 'startup_registration':
                                   $body = "".$logo." <font type=\"bold\">Hi Admin</font><br>
                                            <br>                                           
                                            <br>
                                            There is a new Startup User registered,<br>
                                            
                                            please verify them and approve the Startup:<br><br>
                                   
                                            Startup Name : ".$data['company']."<br>
                                            Contact Person : ".$data['name']."<br>
											Contact Number : ".$data['contactno']."<br>
											Incorporated on : ".$data['incorporated']."<br>
											Email : ".$data['email']."<br><br><br>
											Please login and activate the new account<br><br><br><br><br>
											

                                            <br>
                                            <small>THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!</small><br>
                                            <br>
                                            -------------<br>".$logo."
                                            StartUp Jobs Asia Team";
										  
                                          //$to=$data['to']; this sending to the startup user
										  $to=$adminemail;
                                          $subject ="New Startup Registration";
                                          $headerss = $headers;
                                          $message= $body;
                                          mail($to, $subject,$message,$headerss); 
                                          $flag = true;

                                  break;
                case 'welcome_startup':
                                   $body = "".$logo." <font type=\"bold\">Hi ".$data['name']."</font><br>
                                            <br>                                           
                                            <br>
                                            Thank you for register your start up ".$data['company']." with us, our admin will verify your startup and will send you another email.<br>                                   
   
											Please login and start to post jobs once you receive another successfully activation email<br>
											

                                            <br><br><br><br>
                                            <small>THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!</small><br>
                                            <br>
                                            -------------<br>".$logo."
                                            StartUp Jobs Asia Team";
										  
                                          //$to=$data['to']; this sending to the startup user
										  $to= $data['email'];
                                          $subject ="Welcome to Startup Jobs Asia";
                                          $headerss = $headers;
                                          $message= $body;
                                          mail($to, $subject,$message,$headerss); 
                                          $flag = true; 

                                  break;								  
                case 'welcome_startups':
                                   $body = "".$logo."
								   Hi <font type=\"bold\">" . $data['company'] . "</font><br>
                                            <br>                                           
                                            <br>
                                            Welcome back to startup jobs,<br><br>
											
											
											Your registration is approved and you can use your email and password to login and start to post job now.<br><br><br><br>
                                            
                                            
                                            

                                            <br>
                                            <small>THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!</small><br>
                                            <br>
                                            -------------<br>".$logo."
                                            StartUp Jobs Asia Team";
											

                                          $to=$data['to'];
                                          $subject ="StartUp Jobs Asia - Account Activated";
                                          $headerss = $headers;
                                          $message= $body;
                                          mail($to, $subject,$message,$headerss); 
                                          $flag = true;
                                  break;
                case 'update_application':
                                   $body = "".$logo." Hi <font type=\"bold\">" . $data['event'] . "</font><br>
                                            <br>                                           
                                            <br>Job updated by<br><br>

                                            <br>
                                            <small>THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!</small><br>
                                            <br>
                                            -------------<br>".$logo."StartUp Jobs Asia Team";
        
                                          $to=$data['to'];
                                          $subject ="StartUp Jobs Asia -Job Status Updated";
                                          $headerss = $headers;
                                          $message= $body;
                                          mail($to, $subject,$message,$headerss);
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
