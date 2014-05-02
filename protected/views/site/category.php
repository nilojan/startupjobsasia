<?php

$Loc = Yii::app()->getRequest()->getQuery('category');

$this->pageTitle = Yii::app()->name . $Loc. ' - Singapore jobs';
$loc = 'Jobs';
if($category != ''){
    $loc =   $category.' Jobs';  
}
$this->breadcrumbs = array(
    $loc,
);

?>
<div class="row-fluid">
<div class="span9">
<div class="clear">
	<h1 class="HomeLatestJobs"><?php echo $category; ?> Jobs</h1>
</div>
<?php
        $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                    'order'=>'created DESC',
                                                                    'condition'=>'expire >= :today AND status=1 AND category=:category',
                                                                    'params'=>array('today'=>date('Y-m-d H:i:s'),':category'=>$category),
                                                                    ),
                                                                    'pagination'=>array('pageSize'=>20),
                                                ));
        $this->widget('bootstrap.widgets.TbListView', array(
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
</div>
<div class="span3" id="Sidebar"><?php include(Yii::app()->basePath . '/views/sidebar.php'); ?></div>
</div>