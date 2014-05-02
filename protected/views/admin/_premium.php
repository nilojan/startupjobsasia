<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>   

   <div class ="row">
         <div class ="span3">
                    <?php echo CHtml::link($data->title, array('job/job', 'JID' => $data->JID)) ; ?>
         </div>
         <div class ="span4">
          <?php  $JobDes = substr($data->description,0,60); ?>
                    <?php echo $JobDes; ?>
         </div>
         <div class="btn-toolbar">
                    <?php $this->widget('bootstrap.widgets.TbButton', array(
                                                                            'label'=>'Edit',
                                                                            'type'=>'inverse', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                                                            //array('job/update'),    
                                                                            'url'=>Yii::app()->createUrl("job/update", array("JID"=>$data->JID )),)); ?>
                            <?php 
                    if($data->premium == 1)
                    {
                        $this->widget('bootstrap.widgets.TbButton', array(
                                                                            'label'=>'Remove Premium',
                                                                            'type'=>'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                                                            //array('job/update'),    
                                                                            'url'=>Yii::app()->createUrl("admin/EditJobPremium", array("JID"=>$data->JID )),)); 
                    }
                    else
                    {
                        $this->widget('bootstrap.widgets.TbButton', array(
                                                                            'label'=>'Make Premium',
                                                                            'type'=>'success', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                                                            //array('job/update'),    
                                                                            'url'=>Yii::app()->createUrl("admin/EditJobPremium", array("JID"=>$data->JID )),)); 

                    }

                    ?>                                                     

                   
        </div>
   </div> 
