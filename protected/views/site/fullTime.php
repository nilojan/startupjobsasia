<?php
$this->pageTitle = Yii::app()->name . ' - Full Time jobs';
$this->breadcrumbs = array(
    'Full Time Jobs',
);
?>

<?php
        $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                    'order'=>'created DESC',
                                                             //       'scope'=>'Full-time', 
                                                                   'condition'=>'type=:type',
                                                                    'params'=>array(':type'=>'Full-time'),
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
          //  'title',
          //  'type' => 'Type',    
           // 'created'=>'Created',
    ),
));
