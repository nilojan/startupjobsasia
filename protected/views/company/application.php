<?php
$this->breadcrumbs = array(
    'Main');
$this->pageTitle = 'Application | '.Yii::app()->params['pageTitle'];
?>

<h1>Applications</h1>

     
       <?php 
        $dataProvider=new CActiveDataProvider('Application1', array( 'criteria'=>array(
                                                                    'order'=>'applied DESC',
                                                                  //  'with' =>array('JID','CID'),
                                                                   'condition'=>'CID=:CID',
                                                                    'params'=>array(':CID'=>$company->CID),    
                                                                    
                                                                    ),
                                                                    'pagination'=>array(
                                                                                        'pageSize'=>15,
                                                                    ),
                                                )); ?>

            <?php //var_dump($dataProvider); die; ?>
<!--   <table class ="table">
  <div class ="span2">Job Title</div>
  <div class ="span2">Bidder Name</div>
  <div class ="span2">Resume</div>
  <div class ="span2">Status</div>
  <div class ="span2">Applied On</div>
  <div class ="btn-toolbar">Edit</div>
  <div class ="btn-toolbar">Delete</div>
</table> -->
        
 <?php       $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$dataProvider,
           // 'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'cssFile' => false,
            'itemView'=>'_applicationView',   // refers to the partial view named '_post'
           // 'ajaxUpdate'=>true,
            //'htmlOptions' => array("class"=>"table table-striped"),   
            'sortableAttributes'=>array(
              'job.title'=>'Title',

            
           // 'created'=>'Created',
    ),
));
 ?>
 