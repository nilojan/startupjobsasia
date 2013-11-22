<?php
$this->breadcrumbs = array(
    'Manage Users',
);
$this->pageTitle = 'Manage User | '.Yii::app()->params['pageTitle'];
?>

<?php
        $dataProvider=new CActiveDataProvider('Employee', array( 'criteria'=>array(
                                                                    
                                                                    /*'condition'=>'ID=:ID',
                                                                    'params'=>array(':ID'=>Yii::app()->user->getID()),*/
                                                                    
                                                                    
                                                                    ),
                                                                    'pagination'=>array(
                                                                                        'pageSize'=>10,
                                                                    ),
                                                )); ?>

 <?php       $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$dataProvider,
            'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_user',   // refers to the partial view named '_post'
            
));
 ?>