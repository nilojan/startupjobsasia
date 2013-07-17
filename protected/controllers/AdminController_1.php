<?php



class AdminController extends Controller
{
     public function filters()  {
        return array( 'accessControl' ); // perform access control for CRUD operations
    }
 
    public function accessRules()   {
        return array(
            array('allow', // allow authenticated users to access all actions
                  'roles'=>array('1'),
            ),
            array('deny'),
                'users'=>array('*'),
        );
    }
    
    
    public function actionManage() {
          
          $this->render('approve');
          
    }



    public function actionApprove($CID)   {
                $company = company::model()->find('CID=:CID',array(':CID'=>$CID));
                $company->status = 1;
                $company->save();
                $approve = approve::model()->find('CID=:CID',array(':CID'=>$CID));
                $approve -> approved = new CDbExpression('NOW()');
               // $approve ->status = 1;
                if ($approve->save())
                      $message = new YiiMailMessage;
                      $serverPath = 'localhost/yii/uStyle';
                      $body = "Hi <font type=\"bold\">" . $company->cname . "</font><br>
                              <br>
                              Welcome to StartUp Jobs Asia! Your coporate account <font type=\"bold\">" . $company->cname . "</font> has been approved.<br>
                              <br>
                              You may start posting jobs
                              <br>
                              If you have NOT attempted to create an account at uStyle please ignore this email - it might have been sent because someone mistyped his/her own email address.<br>
                              THIS IS AN AUTO-GENERATED MESSAGE - PLEASE DO NOT REPLY TO THIS MESSAGE!<br>
                              <br>
                              -------------<br>
                              StartUp Jobs Asia Team";
                      $message->setBody($body, 'text/html');
                      $message->subject = "StartUp Jobs Asia Coporate Accounts";

                     $message->addTo($company->email);
                     $message->from = 'admin@StartUpJobsAsia.com';
                     Yii::app()->mail->send($message);
                     $this->redirect(array('admin/manage'));
              
    }

    public function actionModify($id) {
                $this->redirect(array('admin/setAdmin','id'=>$id));
    }
    
    public function actionSetAdmin($id) {
                $model= new setAdmin;
                $record = member::model()->find('profileID=:profileID', array('profileID' => $id));
                $model->attributes=$record->attributes;
                
                if (isset($_POST['setAdmin']))   {
                $model->attributes =$_POST['setAdmin'];
                $record->role=$model->role;
                
                if($record->save()) {
                    $this->redirect(array('admin/manage'));
                }    
                }
                $this->render('setAdmin',array('model'=>$model));
                        
    }

    public function actiontransaction() {
        $this->render("transaction");
    }
    
}
?>
<div class="google map">
                <div id="main">
                    <div id="registration">
                        <!--<form name="CompanyForm" method="post" action="site/registration">-->
                        <table border="0" cellspacing="0" cellpadding="0" id="optional2" style="display:compact" class="excludeCalendar">
                                   
				    <?php echo $form->textAreaRow($CForm, 'address', array('class'=> 'span8', 
                                                                                           'rows' => 3,
                                                                                           'id' => 'addressId',
                                                                                           'name' => 'addressId'));?>
				    
				   

                            <span class="errorMessage"></span>
                            <input type="hidden" name="userType" value="1"/>
                            <input type="hidden" name="userStatus" value="0"/>
                                    <!-- All user register from this page is customer! -->
                         </table>
                         <span id="finalErrorMessage" class="errorMessage" onload="focusUserField.setFocus('usernameId')"></span>
                   </div>
                   <link href="css/jquery-ui-1.8.11.custom.css" rel="stylesheet" type="text/css"/>
                   <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
                   <script type="text/javascript">
                           var geocoder;
                           var map;
                           function initialize() {
                                    geocoder = new google.maps.Geocoder();
                                    var latlng = new google.maps.LatLng(1.351, 103.682);
                                    var myOptions = {
                                        zoom: 15,
                                        center: latlng,
                                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                                        region: 'SG',
                                        panControl: false,
                                        zoomControl: false,
                                        mapTypeControl: false,
                                        scaleControl: false,
                                        streetViewControl: true,
                                        streetViewControlOptions: {
                                            position: google.maps.ControlPosition.LEFT_BOTTOM
                                        },
                                        overviewMapControl: false
                                    }
                                    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                                }

                                function codeAddress() {
                                    var address = filter(document.getElementById("addressId").value);
                                    //alert(address);
                                    geocoder.geocode( { 'address': address, 'region' : 'sg'}, function(results, status) {
                                        if (status == google.maps.GeocoderStatus.OK) {
                                            map.setCenter(results[0].geometry.location);
                                            var marker = new google.maps.Marker({
                                                map: map,
                                                position: results[0].geometry.location
                                            });
                                        } else {
                                            //alert("Geocode was not successful for the following reason: " + status);
                                        }
                                    });

                                    function filter(address){
                                        while(address.indexOf(',')>=0){
                                            address=address.replace(',',' ');
                                        }
                                        address+=" singapore";

                                        var start=address.indexOf('#');
                                        if(start>=0){
                                            var end=address.indexOf(' ',start);
                                            return address.substring(end).trim();
                                        }else{
                                            return address;
                                        }
                                    }
                                }
                            </script>
                            <script type="text/javascript">
                                $().ready(function(){

                                    var width=$(window).width()/6;        
                                    var height=$(window).width()/6;       
                                    var leftShow=$(window).width()/2.2;     // size
                                    var leftHide=0-$(window).width()/6;

                                    $('#map-container').css({'left':leftHide+'px','bottom':'180px'});
                                    $('#map_canvas').css({'width':width+'px','height':height+'px'});

                                    initialize();
                                    codeAddress();

                                    $('#addressId').keyup(function(){
                                        codeAddress();
                                    });

                                    $('#addressId').focus(function(){
                                        $('#map-container').animate({'left':leftShow,'opacity':'1.0'},800);
                                    });

                                    $('#addressId').focusout(function(){
                                        $('#map-container').animate({'left':leftHide,'opacity':'0'},800);
                                        codeAddress();
                                    });
                                });

                            </script>
                            <style type = "text/css">
                                #map-container{
                                    position: absolute;
                                    z-index: 100;
                                    opacity:0.1;
                                    border: 2px solid #FF8C00;
                                    -moz-border-radius: 8px;
                                    -webkit-border-radius: 8px;
                                    -border-radius: 8px;
                                    background: #ffffff;
                                }
                                #map_canvas{
                                    margin:5px;
                                }
                            </style>
                            <div id="map-container">
                                <div id="map_canvas"></div>
                            </div>

                        </div>
                    </div>          
            
    