<?php
$this->pageTitle = Yii::app()->name . ' - Internship';
$this->breadcrumbs = array(
    'Internship',
);
        $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                    'order'=>'created DESC',
                                                                    'condition'=>'type=:type OR internship=:type2 AND status=1',
                                                                    'params'=>array(':type'=>'Internship',':type2'=>'Internship'),
                                                                    ),
                                                                    'pagination'=>array(
                                                                                        'pageSize'=>20,
                                                                    ),
                                                ));
    $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$dataProvider,
           // 'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_jobView',   // refers to the partial view named '_post'
            'sortableAttributes'=>array(
            //'title',
           // 'type' => 'Type',    
           // 'created'=>'Created',
    ),
));
