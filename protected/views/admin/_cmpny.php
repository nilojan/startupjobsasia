<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>   

    <table class ="table">
         <div class ="span3">

                    <?php echo CHtml::link($data->cname, array('company/company/'.$data->ID)); ?>
         </div> 
        
         <div class="btn-toolbar">
                    <?php $this->widget('bootstrap.widgets.TbButton', array(
                                                                            'label'=>'Modify',
                                                                            'type'=>'inverse', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                                                            //array('job/update'),    
                                                                            'url'=>Yii::app()->createUrl("company/update/".$data->ID),)); ?>
         <?php 
                    if($data->registered == 1)
                    {
                        $this->widget('bootstrap.widgets.TbButton', array(
                                                                            'label'=>'Disable',
                                                                            'type'=>'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                                                            //array('job/update'),    
                                                                            'url'=>Yii::app()->createUrl("admin/EditCompanyStatus/".$data->ID),)); 
                    }
                    else
                    {
                        $this->widget('bootstrap.widgets.TbButton', array(
                                                                            'label'=>'Approve',
                                                                            'type'=>'success', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                                                            //array('job/update'),    
                                                                            'url'=>Yii::app()->createUrl("admin/EditCompanyStatus/".$data->ID),)); 

                    }

                    ?>                      
                                                                           



                   
        </div> 
   </table> 

