<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>   

 <?php $data=application1::model(); ?>
 <?php $mymodel=application1::model()->findbySql("Select * from application1 where CID='14'");
   // var_dump($mymodel);
    //$model->attributes=$_POST['Category'];
   // die;
    //echo "here".$mymodel->EID; ?>
          <div class ="span2 ">
                    <?php echo CHtml::link("hello".$mymodel[0]['attributes']['EID'], array('job/job', 'JID' => $data->JID)) ; ?>
         </div>
         <div class ="span2">
                    <?php echo $data->CID; ?>
         </div>
         <div class ="span5">
                    <?php echo "hiiiiiiiiiiii".$data->applied; ?>
  <?php  // echo CHtml::link(CHtml::encode('Resume'),Yii::app()->baseUrl . '/resume/'.$data->user->resume,array('target'=>'_blank'));
  ?>
         </div>
         <div class="clear"></div>
         
