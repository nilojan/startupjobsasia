<?php

$this->pageTitle = Yii::app()->name . ' - Main';
$this->breadcrumbs = array(
    'Main');
?>

 <div class="span6">
<h1>Applications</h1>

     
       <?php
        $dataProvider=new CActiveDataProvider('Application1', array( 'criteria'=>array(
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

	 <div class="span11" id="clear" style="text-align:right;border:3px solid #F97C30;float:left;">
	 <div style="text-align:left;background:#F97C30;color:#fff;padding:10px;"><h2>Recommended Jobs</h2></div>
	 
	<?php
$query=$model->tags;
$query = str_replace(","," +",$query);
$query = '+'.$query;
 $dataProvider=new CActiveDataProvider('job', array( 
                                                'criteria'=>array(
                                                        'order'=>'created DESC',
                                                         'condition'=>'JID in(SELECT JID FROM job WHERE status = 1 && MATCH (title,description) 
                                                             AGAINST ("'.$query.'" IN BOOLEAN MODE))',  
                                                           ),
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