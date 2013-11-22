<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>   

    <div class ="row clear <?php echo $data->JID%2 ? "bgone":"bgtwo"; ?>">
         <div class ="span3">
                    <?php echo CHtml::link($data->title, array('job/job/JID/'.$data->JID), array('target'=>'_blank')) ; ?>
         </div>
      <!--   <div class ="span3">
                    <?php  $JobDes = substr($data->description,0,60); ?>
                    <?php echo $JobDes; ?>...
         </div>-->
           <div class ="span1">
                    <?php echo $data->type; ?>
					<?php if ($data->full_time != '' && $data->full_time != '0'){ echo $data->full_time."<br />"; } ?>
					<?php if ($data->part_time != '' && $data->part_time != '0'){ echo $data->part_time."<br />"; } ?>
					<?php if ($data->freelance != '' && $data->freelance != '0'){ echo $data->freelance."<br />"; }  ?>
					<?php if ($data->internship != '' && $data->internship != '0'){ echo $data->internship."<br />"; }  ?>
					<?php if ($data->temporary != '' && $data->temporary != '0'){ echo $data->temporary."<br />"; }  ?>
					<?php if ($data->co_founder != '' && $data->co_founder != '0'){ echo $data->co_founder."<br />"; }  ?>
         </div>
           <div class ="span1">
                    <?php  $salary = $data->min_salary."-".$data->max_salary; ?>
                    <?php echo $salary; ?>
         </div>
         <div class ="span1">
                    <?php echo $data->location; ?>
         </div>
         <div class ="span1">
                    <?php echo substr($data->expire,0,10); ?>
         </div>
         <div class ="span1">
                    <?php 
                    date_default_timezone_set('Asia/Singapore');
					$date = date('Y-m-d H:i:s');
                    $days = Yii::app()->user->dateDiff($date,$data->created);
                    echo $days." days ago";
                    ?>
         </div>
         <div class="btn-toolbar">
                    <?php $this->widget('bootstrap.widgets.TbButton', array(
                                                                            'label'=>'Edit',
                                                                            'type'=>'inverse', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                                                            //array('job/update'),    
                                                                            'url'=>Yii::app()->createUrl("job/update", array("JID"=>$data->JID )),)); ?>
                            <?php 
                    if($data->status == 1)
                    {
                        $this->widget('bootstrap.widgets.TbButton', array(
                                                                            'label'=>'De-Activate',
                                                                            'type'=>'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                                                            //array('job/update'),    
                                                                            'url'=>Yii::app()->createUrl("admin/EditJobStatus", array("JID"=>$data->JID )),)); 
                    }
                    else
                    {
                        $this->widget('bootstrap.widgets.TbButton', array(
                                                                            'label'=>'Activate',
                                                                            'type'=>'success', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                                                                            //array('job/update'),    
                                                                            'url'=>Yii::app()->createUrl("admin/EditJobStatus", array("JID"=>$data->JID )),)); 

                    }

                    ?>                                                     

                   
        </div>
   </div> 
