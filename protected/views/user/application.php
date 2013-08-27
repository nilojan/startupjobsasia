<?php
$this->pageTitle = Yii::app()->name . ' - Main';
$this->breadcrumbs = array(
    'Main');
?>
<<<<<<< HEAD
=======

>>>>>>> viv_changes
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