<?php
$this->breadcrumbs = array(
    'Applications');
$this->pageTitle = 'Application | '.Yii::app()->params['pageTitle'];
?>


<div id='suc_msg'  class="alert out alert-block fade alert-success"><strong>Success!!</strong> Job Status Updated Successfully.</div>
  
 <div class ="span12">
   
         <div class ="span2">          
					<strong>Job Title</strong>
         </div>
         <div class ="span2">

                    <strong>Candidate</strong>                   
         </div>
         <div class ="span1">

                  <strong>Resume</strong>  
         </div>
         
         
        <div class ="span3">
                  
                  
			<strong>Status</strong>
        </div>
         
   
         <div class ="span3">
                    <strong>Applied on</strong>
         </div>
         <div class="btn-toolbar">t</div>        
</div>


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
              //'job.title'=>'Title',

            
           // 'created'=>'Created',
    ),
));
 ?>
 