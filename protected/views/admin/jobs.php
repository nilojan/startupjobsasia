<?php
$this->breadcrumbs = array(
    'Manage Jobs',
);
$this->pageTitle = 'Manage Jobs | '.Yii::app()->params['pageTitle'];
?>

<?php
        $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                    'with'=>array('company'),
                                                                    /*'condition'=>'ID=:ID',
                                                                    'params'=>array(':ID'=>Yii::app()->user->getID()),*/
                                                                    'order'=>'t.created DESC',
                                                                    
                                                                    ),
                                                                    'pagination'=>array(
                                                                                        'pageSize'=>10,
                                                                    ),
                                                )); ?>

 <?php       $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$dataProvider,
            'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_job',   // refers to the partial view named '_post'
            //'ajaxUpdate'=>false,
            //'htmlOptions' => array("class"=>"table table-striped"),   
            'sortableAttributes'=>array(
            //'title',
            //'type' => 'Type',    
            
           // 'created'=>'Created',
    ),
));
 ?>