<?php
$this->pageTitle = Yii::app()->name . ' - Co-Founder Role';
$this->breadcrumbs = array(
    'Co-Founder Role',
);
$condition = 'type = :type OR co_founder=:type2';
$params = array(':type'=>'Co-Founder',':type2'=>'Co-Founder');

if($location != '')
{
  $condition = $condition.' AND location = :location';
  $params = array(':type'=>'Co-Founder',':location'=>$location);
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
            //'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_jobView',   // refers to the partial view named '_post'
            'sortableAttributes'=>array(
          //  'title',
          //  'type' => 'Type',    
           // 'created'=>'Created',
    ),
));

?>