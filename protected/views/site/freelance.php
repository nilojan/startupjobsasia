<?php
$this->pageTitle = Yii::app()->name . ' - Freelance jobs';
$this->breadcrumbs = array(
    'Freelance Jobs',
);
?>
<div class="row-fluid">
<div class="span9">
<div class="clear">
	<h1 class="HomeLatestJobs">Featured Jobs</h1>
</div>
    <div class="clear">

      <?php $premium=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                    'limit'=>50,
                                                                    'order'=>new CDbExpression('RAND()'),
                                                                    //'order'=>'created DESC',
                                                                    'condition'=>'pre_end_date >= :today AND premium = 1 AND status = 1',                                                                    
                                                                    'params'=>array('today'=>date('Y-m-d H:i:s')),
                                                                    //'with'=>array('company'),
                                                                    ),
                                                                    'pagination' => false,
                                                )); ?>
       
      <?php $this->widget('bootstrap.widgets.TbListView', array(
                'dataProvider'=>$premium,
                //'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
                'itemView'=>'_jobViewPremium',   // refers to the partial view named '_post'
                //'itemsTagName'=>'table',
                //'itemsCssClass'=>'table',
               // 'summaryText'=>''
                //'ajaxUpdate'=>false,
                //'htmlOptions' => array("class"=>"table table-striped"),
            ));
      ?>
</div>

<div class="clear">
	<h1 class="HomeLatestJobs">Freelance Jobs</h1>
</div>
<?php
        $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                    'order'=>'created DESC',
                                                                    
                                                                    'condition'=>'expire >= :today AND status=1 AND freelance=:type2',
                                                                    'params'=>array('today'=>date('Y-m-d H:i:s'),':type2'=>'Freelance'),
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
           // 'title',
           // 'type' => 'Type',    
           // 'created'=>'Created',
    ),
));

?>
</div>
<div class="span3" id="Sidebar"><?php include(Yii::app()->basePath . '/views/sidebar.php'); ?></div>
</div>