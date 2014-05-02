<?php

$this->pageTitle = Yii::app()->name . ' - Main';
$this->breadcrumbs = array(
    'Main');
?>

 <div class="span6">
<h1>Applications</h1>
<div class="row-fluid">
	<div class ="span6">
	<strong>Job </strong>
	</div>
          <div class ="span3">
               <strong>Applied On</strong>
         </div>
         <div class ="span3" style="display:none;">
           <strong> Reviewed On</strong>
         </div>

  </div><br />    
       <?php
        $dataProvider=new CActiveDataProvider('Application', array( 'criteria'=>array(
                                                                    'order'=>'applied DESC',
                                                                   // 'with' =>array('job','Employee'),
                                                                    'condition'=>'EID=:ID',
                                                                    'params'=>array(':ID'=>$user->EID),    
                                                                    
                                                                    ),
                                                                    'pagination'=>array(
                                                                                        'pageSize'=>15,
                                                                    ),
                                                )); ?>
        
 <?php       $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$dataProvider,
            //'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_applicationView',   // refers to the partial view named '_post'
            //'ajaxUpdate'=>false,
            //'htmlOptions' => array("class"=>"table table-striped"),   
            /*'sortableAttributes'=>array(
              'last_reviewed'=>'last_reviewed',*/            
           // 'created'=>'Created',    ),
));

 ?>
 </div>
 <div class="span6">

	 <div class="span12" id="clear" style="text-align:right;border:3px solid #F97C30;float:left;">
	 <div style="text-align:left;background:#F97C30;color:#fff;padding:10px;"><h2>Recommended Jobs</h2></div>
	 
	<?php
	//echo $user->tags;
$query = $user->tags;
$query = str_replace(","," +",$query);
$query = '+'.$query;
 $dataProvider=new CActiveDataProvider('job', array( 
                                                'criteria'=>array(
                                                'order'=>'created DESC',
                                                'condition'=>'JID in(SELECT JID FROM job WHERE status = 1 && MATCH (title,description,responsibility,requirement,tags) 
                                                             AGAINST ("'.$query.'" IN BOOLEAN MODE))'),
                                                        'pagination'=>array(
                                                                            'pageSize'=>20,
                                                        ),
                                                ));
        $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            //'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_jobView',   // refers to the partial view named '_post'
            'sortableAttributes'=>array(
           // 'title',
           // 'type' => 'Type',    
           // 'created'=>'Created',
    ),
));
	?>

	</div>
	
	
	

	</div>