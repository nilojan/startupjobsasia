<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>   
<title>StartUp Jobs Asia | Startup Hire | Startup Hiring | Startup Recruiting | Startup Jobs | VC Hire | VC Jobs | Work In Startups</title>

          <table class ="table">
         <div class ="span2 ">
                    <?php $image='<img src='.Yii::app()->request->baseUrl.'/images/company/'. $data->company->image.' height="80" width="80" >'?>
                    <?php echo CHtml::link($image, array('company/view', 'CID'=>$data->CID)); ?>
         </div>
         <div class ="span2">
                    <?php echo $data->company->cname; ?>
         </div>
          <div class ="span2">
                    <?php echo $data->company->started; ?>
         </div>
         <div class ="span2">
                    <?php echo $data->company->location;?>
         </div>
         <div class="btn-toolbar">
                <?php $this->widget('bootstrap.widgets.TbButton', array(
                                                                      'label'=>'Approve',
                                                                      'type'=>'success', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                                                      //array('job/update'),    
                                                                      'url'=>Yii::app()->createUrl("admin/approve", array("CID"=>$data->CID )))); ?>
     
                <?php $this->widget('bootstrap.widgets.TbButton', array(
                                                                      'label'=>'Reject',
                                                                      'type'=>'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                                                       //array('job/update'),    
                                                                       'url'=>'',)); ?>
     
</div>
   </table>