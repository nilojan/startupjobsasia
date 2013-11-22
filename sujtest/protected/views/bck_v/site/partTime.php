<?php
$this->pageTitle = Yii::app()->name . ' - Part Time jobs';
$this->breadcrumbs = array(
    'Part Time Jobs',
);

        $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                    'order'=>'created DESC',
                                                                    'condition'=>'type=:type',
                                                                    'params'=>array(':type'=>'Part-time'),
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
