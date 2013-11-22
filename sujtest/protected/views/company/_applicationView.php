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
<div class ="row">
   
         <div class ="span2">          
                    <?php echo CHtml::link($data->job->title, array('job/job/JID/'.$data->JID), array('target'=>'_blank')) ; ?>
         </div>
         <div class ="span2">

                    <?php echo CHtml::link($data->Employee->fname, array('user/profile/'.$data->EID)) ; ?>                    
         </div>
         <div class ="span1">

                    <?php 

                      if($data->Employee->resume!=NULL)
                      {
                        echo CHtml::link(CHtml::encode('Resume'),array('company/downloadResume?filename='.$data->Employee->resume));    
                      }else{
                        echo CHtml::encode('No resume Available');
                      }
                     

                     ?>
         </div>
         
         
        <div class ="span3">
                  
                  
      <?php  
            //$model = application1::        
          echo CHtml::dropDownList($data->AID,$data->jobstatus, 
                               array('Pending' => 'Pending', 'Offered' => 'Offer', 'Shortlisted' => 'Shortlist', 'Onhold' => 'On hold', 'Rejected' => 'Reject'),
 
                                      array(
                                        'prompt'=>'Select Job Status ',
                                        'ajax' => array(
                                        'type'=>'POST', 
                                        'url'=>CController::createUrl('application1/updateJob'),
                                       // 'update'=>'#city_name', 
                                      'data'=>array('jobstatus'=>'js:this.value','AID'=>$data->AID),
                                      'success'=>"js:function(event, ui) {
                                        $('#suc_msg').fadeIn(1500);
             $('#suc_msg').removeClass('out');
  $('#suc_msg').addClass('in');
  $('#suc_msg').delay(2000).fadeOut('1000');
            return true;
}",
                                      ))); 


                  ?>
        </div>
<script>
$(document).ready(function(){
function addremove(){
 alert('hi');
  $("#suc_msg").removeClass("out");
  $("#suc_msg").addClass("in");
}

});
</script>
   
         <div class ="span3">
                    <?php echo $data->applied; ?>
  <?php  // echo CHtml::link(CHtml::encode('Resume'),Yii::app()->baseUrl . '/resume/'.$data->user->resume,array('target'=>'_blank'));
  ?>
         </div>
         <div class="btn-toolbar">t</div>        
</div>