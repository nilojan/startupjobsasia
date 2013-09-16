<?php
$this->breadcrumbs = array(
    'Manage Jobs',
);
$this->pageTitle = 'Manage Jobs | '.Yii::app()->params['pageTitle'];
?>

<?php
        $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                    'with'=>array('company'),
                                                                    'order'=>'t.created DESC',
                                                                    
                                                                    ),
                                                                    'pagination'=>array(
                                                                                        'pageSize'=>10,
                                                                    ),
                                                ));
                                                /*echo '<pre>';
                                                var_dump($dataProvider);
                                                die; */?>

 <?php       $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$dataProvider,
            'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_premium',   // refers to the partial view named '_post'
            'sortableAttributes'=>array(
           
    ),
));
 ?>