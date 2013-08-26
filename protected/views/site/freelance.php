<?php
$this->pageTitle = Yii::app()->name . ' - Freelance jobs';
$this->breadcrumbs = array(
    'Freelance Jobs',
);

        $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                    'order'=>'created DESC',
                                                                    'condition'=>'type=:type OR freelance=:type2',
                                                                    'params'=>array(':type'=>'Freelance',':type2'=>'Freelance'),
                                                                    ),
                                                                    'pagination'=>array(
                                                                                        'pageSize'=>20,
                                                                    ),
                                                ));
        $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_jobView',   // refers to the partial view named '_post'
            'sortableAttributes'=>array(
           // 'title',
           // 'type' => 'Type',    
           // 'created'=>'Created',
    ),
));