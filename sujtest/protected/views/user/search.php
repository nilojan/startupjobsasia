<?php
$this->pageTitle = Yii::app()->name . ' - Search Candidate';
$this->breadcrumbs = array(
    'Search Candidate',
);

//$query = str_replace(" "," +",$query);
//$query = '+'.$query;
//echo $query;
        $dataProvider=new CActiveDataProvider('Employee', array( 
                                                'criteria'=>array(
                                                        'order'=>'EID DESC',
                                    'condition'=>'EID in(SELECT EID FROM employee1 WHERE MATCH (content,tags) 
                                    AGAINST ("'.$query.'" IN BOOLEAN MODE))',  
                                                           ),
                                                        'pagination'=>array(
                                                                            'pageSize'=>5,
                                                        ),
                                                ));
        $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_userView',   // refers to the partial view named '_post'
            'sortableAttributes'=>array(
           // 'title',
           // 'type' => 'Type',    
           // 'created'=>'Created',
    ),
));

?>