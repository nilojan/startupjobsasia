<?php
$this->breadcrumbs = array(
    'All Jobs',
);
$this->pageTitle = 'Go Premium | '.Yii::app()->params['pageTitle'];
?>


      <h1>Premium</h1>
      <?php echo $abc ?>
      Your job has been succesfully posted
      
      Go premium at $10 for a premium post.
      
     
 <div class="form-actions">
       <?php $this->widget('bootstrap.widgets.TbButton', array(
                                        'label'=>'Go premium',
                                        'type'=>'primary', 
                                        'size'=>'large', 
                                        'url'=>Yii::app()->createUrl("job/buy", array('JID'=>$JID)),    
)); ?>  
 </div>