<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>   

          <div class ="span2 ">
                    <?php echo CHtml::link($data->job->title, array('job/job', 'JID' => $data->JID)) ; ?>
         </div>
         <div class ="span2">
                    <?php echo $data->user->name; ?>
         </div>
         <div class ="span5">
                    <?php echo $data->applied; ?>
  <?php        echo   CHtml::link(CHtml::encode('Resume'),Yii::app()->baseUrl . '/resume/'.$data->user->resume,
    array('target'=>'_blank') 
);?>
         </div>
         <div class="clear"></div>
         
