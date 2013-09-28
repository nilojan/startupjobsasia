<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//var_dump($data->Employee); die;

?>
<!-- <table class ="table">
  <div class ="span2">Job Title</div>
  <div class ="span2">Bidder Name</div>
  <div class ="span2">Resume</div>
  <div class ="span2">Status</div>
  <div class ="span2">Applied On</div>
  <div class ="btn-toolbar">Edit</div>
  <div class ="btn-toolbar">Delete</div> -->
<table class ="table">
   
         <div class ="span2">          
                    <?php echo CHtml::link($data->job->title, array('job/job', 'JID' => $data->JID)) ; ?>
         </div>
         <div class ="span2">

                    <?php echo CHtml::link($data->Employee->fname, array('user/profile/'.$data->EID)) ; ?>                    
         </div>
         <div class ="span2">

                    <?php 

                      if($data->Employee->resume!=NULL)
                      {
                        echo CHtml::link(CHtml::encode('Resume'),array('company/downloadResume?filename='.$data->Employee->resume));    
                      }else{
                        echo CHtml::encode('No resume Available');
                      }
                     

                     ?>
         </div>
         
         
        <div class ="span2">
                  
                  
      <?php  
            //$model = application1::        
          echo CHtml::dropDownList($data->AID,"", 
                               array('Pending' => 'Request is pending', 'Offered' => 'Offer Job', 'Shortlisted' => 'Add to shortlist', 'Onhold' => 'Put on hold', 'Rejected' => 'Reject Request'),
 
                                      array(
                                        'prompt'=>'select Jobstatus ',
                                        'ajax' => array(
                                        'type'=>'POST', 
                                        'url'=>CController::createUrl('application1/updateJob'),
                                       // 'update'=>'#city_name', 
                                      'data'=>array('jobstatus'=>'js:this.value','AID'=>$data->AID),
                                      ))); 


                  ?>
        </div>
         
   
         <div class ="span2">
                    <?php echo $data->applied; ?>
  <?php  // echo CHtml::link(CHtml::encode('Resume'),Yii::app()->baseUrl . '/resume/'.$data->user->resume,array('target'=>'_blank'));
  ?>
         </div>
         <div class="btn-toolbar">t</div>        
</div>