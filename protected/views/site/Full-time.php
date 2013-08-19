<?php
$this->pageTitle = Yii::app()->name . ' - Full Time jobs';
$this->breadcrumbs = array(
    'Full Time Jobs',
);
$condition = 'type = :type';
$params = array(':type'=>'Full-time');

if($location != '')
{
  $condition = $condition.' AND location = :location';
  $params = array(':type'=>'Full-time',':location'=>$location);
}

// var_dump($condition);
// var_dump($params);
// var_dump($location);

?>
<?php
       
        $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                    'order'=>'created DESC',
                                                             //       'scope'=>'Full-time',    
                                                                    //'condition'=>'JID in(SELECT JID FROM job WHERE type="Internship")', 
                                                                    'condition'=>$condition,
                                                                   'params'=>$params,
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

?>