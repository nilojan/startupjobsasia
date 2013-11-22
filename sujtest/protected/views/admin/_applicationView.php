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
                    <?php echo CHtml::link($data->job->title, array('job/job', 'JID' => $data->JID)) ; ?>
         </div>
         <div class ="span2">
                    <?php echo CHtml::link($data->Employee->fname, array('user/profile/'.$data->Employee->EID)) ; ?>                    
         </div>
         <div class ="span2">
                    <?php echo CHtml::link(CHtml::encode('Resume'),Yii::app()->baseUrl . '/resume/'.$data->Employee->resume,array('target'=>'_blank')); ?>
         </div>
        <div class ="span2">
                  
                   <?php
                      $this->widget('editable.EditableField', array(
                          'type'      => 'select',
                          'text'      => $data->jobstatus,
                          'model'     => $data,
                          'attribute' => 'jobstatus',                         
                          'url'       => $this->createUrl('application1/updateJob/'.$data->AID), 
                          'title'     => 'Select Action',
                          'placement' => 'right',
                          'showbuttons' => false,
                          'source'    => Editable::source(array('Pending' => 'Request is pending', 'Offered' => 'Offer Job', 'Shortlisted' => 'Add to shortlist', 'Onhold' => 'Put on hold', 'Rejected' => 'Reject Request')),
                          
                      ));
                  ?>
        </div>
         
   
         <div class ="span2">
                    <?php echo $data->applied; ?>
  <?php  // echo CHtml::link(CHtml::encode('Resume'),Yii::app()->baseUrl . '/resume/'.$data->user->resume,array('target'=>'_blank'));
  ?>
         </div>
         <div class="btn-toolbar">t</div>        
</div>