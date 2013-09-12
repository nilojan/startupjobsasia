<?php
$this->breadcrumbs = array(
    'feeds',
);
$this->pageTitle = 'feeds | '.Yii::app()->params['pageTitle'];
?>

<?php
        $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                    
                                                                    'condition'=>'type = :type',
                                                                    'params'=>array(':type'=>'Full-time'),
                                                                    
                                                                    'order'=>'t.created DESC',
                                                                    
                                                                    ),
                                                                    'pagination'=>array(
                                                                                        'pageSize'=>10,
                                                                    ),
                                                )); ?>

 <?php       $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'_fulltime',  // refers to the partial view named '_post'
           
            
));
 ?>