<?php
$this->pageTitle = Yii::app()->name . ' - All Latest jobs';
$this->breadcrumbs = array(
    'Latest Jobs',
);
?>

<?php
												
	 $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                   'order'=>'t.created DESC',
                                                                   // show all jobs that are not expired
                                                                   'condition'=>'t.status = 1',
                                                                   //'params'=>array('today'=>date('Y-m-d H:i:s')),
                                                                    'with'=>array('company'),
                                                                    ),
                                                                    'pagination'=>array(
                                                                                        'pageSize'=>15,),
                                                )); 
        $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$dataProvider,
           // 'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_jobView',   // refers to the partial view named '_post'
			//'ajaxUpdate'=>true,
            'sortableAttributes'=>array(
           // 'title',
           // 'type' => 'Type',    
           // 'created'=>'Created',
    ),
));
?>


