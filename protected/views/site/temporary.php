<?php

$this->pageTitle = Yii::app()->name . ' - Temporary jobs';
$this->breadcrumbs = array(
    'Temporary Jobs',
);
        $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                    'order'=>'created DESC',
                                                                    'condition'=>'type=:type OR temporary=:type2',
                                                                    'params'=>array(':type'=>'Temporary',':type2'=>'Temporary'),
                                                                    ),
                                                                    'pagination'=>array(
                                                                                        'pageSize'=>20,
                                                                    ),
                                                ));
        $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$dataProvider,
            'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_jobView',   // refers to the partial view named '_post'
            'sortableAttributes'=>array(
            //'title',
           // 'type' => 'Type',    
           // 'created'=>'Created',
    ),
));