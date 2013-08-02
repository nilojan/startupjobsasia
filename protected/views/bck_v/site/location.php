<?php

$Loc = Yii::app()->getRequest()->getQuery('location');

$this->pageTitle = Yii::app()->name . $Loc. ' - Singapore jobs';
$this->breadcrumbs = array(
    'Singapore Jobs',
);


        $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                    'order'=>'created DESC',
                                                                    'condition'=>'location=:location',
                                                                    'params'=>array(':location'=>'Singapore'),
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
           // 'title',
           // 'type' => 'Type',    
           // 'created'=>'Created',
    ),
));