<?php
$this->pageTitle = Yii::app()->name . ' - Search Jobs';
$this->breadcrumbs = array(
    'Search Jobs',
);


$query = str_replace(" "," +",$query);
$query = '+'.$query;


        $dataProvider=new CActiveDataProvider('job', array( 
                                                'criteria'=>array(
                                                        'order'=>'created DESC',
                                                         'condition'=>'JID in(SELECT JID FROM job WHERE MATCH (title,description) 
                                                             AGAINST ("'.$query.'" IN BOOLEAN MODE))',  
                                                           ),
                                                        'pagination'=>array(
                                                                            'pageSize'=>20,
                                                        ),
                                                ));
        $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            //'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_jobView',   // refers to the partial view named '_post'
            'sortableAttributes'=>array(
           // 'title',
           // 'type' => 'Type',    
           // 'created'=>'Created',
    ),
));

?>