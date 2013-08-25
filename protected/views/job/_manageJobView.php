<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>   

    <table class ="table">
         <div class ="span3">
                    <?php echo CHtml::link($data->title, array('job/job', 'JID' => $data->JID)) ; ?>
         </div>
         <div class ="span4">
					<?php  $JobDes = substr($data->description,0,60); ?>
                    <?php echo $JobDes; ?>...
         </div>
         <div class="btn-toolbar">
                    <?php $this->widget('bootstrap.widgets.TbButton', array(
                                                                            'label'=>'Modify',
                                                                            'type'=>'inverse', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                                                            //array('job/update'),    
                                                                            'url'=>Yii::app()->createUrl("job/update", array("JID"=>$data->JID )),)); ?>
                    <?php $this->widget('bootstrap.widgets.TbButton', array(
                                                                            'label'=>'Delete',
                                                                            'type'=>'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                                                            //array('job/update'),    
                                                                            'url'=>Yii::app()->createUrl("job/delete", array("JID"=>$data->JID )),)); ?>

                    <?php 
                    if($data->premium == 0)
                    {
                        $this->widget('bootstrap.widgets.TbButton', array(
                                                            'label'=>'Add to Premium',
                                                            'type'=>'warning', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                                            //array('job/update'),    
                                                            'url'=>Yii::app()->createUrl("job/buy", array("JID"=>$data->JID )),));
                    }
                    else if($data->premium == 1)
                    {
                        $this->widget('bootstrap.widgets.TbButton', array(
                                                            'label'=>'Premium Job',
                                                            'type'=>'success', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                                            'disabled' => true, 
                                                            'url'=>'#',));
                    }
                                                             ?>

        </div>
   </table> 

