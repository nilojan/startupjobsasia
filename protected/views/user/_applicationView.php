<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/*var_dump($data->attributes);
var_dump($data->company->cname); */

//var_dump($data->JID); 
?>   
<div class ="span11">
         <div class ="span2">          
                    <?php echo CHtml::link($data->job->title, array('job/job', 'JID' => $data->JID)) ; ?>
         </div>
         <div class ="span2">
                    <?php echo CHtml::link($data->company->cname, array('user/profile/'.$data->Employee->EID)) ; ?>                    
         </div>
        <!--  <div class ="span2">
                    <?php  //echo CHtml::link(CHtml::encode('Resume'),Yii::app()->baseUrl . '/resume/'.$data->Employee->resume,array('target'=>'_blank')); ?>
         </div> -->
        <div class ="span2">                  
                   <?php echo $data->jobstatus; ?>                     
        </div>  
         <div class ="span2">
                    <?php echo $data->applied; ?>
         </div>
         <div class ="span2">
                    <?php if($data->last_reviewed == '0000-00-00 00:00:00')
                          {
                              echo "Not Reviewed Yet";
                          }
                          else
                          {
                              echo $data->last_reviewed;         
                          }
                    ?>
         </div>
         <div class="btn-toolbar"></div>
        
         
</div>