<?php
$this->pageTitle = Yii::app()->name . ' - All Latest jobs';
$this->breadcrumbs = array(
    'Latest Jobs',
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
	<h1 class="HomeLatestJobs">Latest Jobs</h1>
</div>
<?php
												
		$dataProvider=new CActiveDataProvider('job', array('criteria'=>array(
                                                                   'order'=>'t.created DESC',
                                                                   // show all jobs that are not expired
																   'condition'=>'expire >= :today and t.status=1',
                                                                   //'condition'=>'t.status = 1',
                                                                   'params'=>array('today'=>date('Y-m-d H:i:s')),
                                                                    'with'=>array('company'),
                                                                    ),
                                                                    'pagination'=>array('pageSize'=>30,),
																)); 
        $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$dataProvider,

           // 'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_jobView',   // refers to the partial view named '_post'
			//'ajaxUpdate'=>true,
			'pager' => array(
				'maxButtonCount'=>4,
				'hiddenPageCssClass' => 'disabled',
			    'selectedPageCssClass' => 'active',  
				'firstPageLabel' => '&laquo;',
				'lastPageLabel' => '&raquo;',
				'nextPageLabel' => '&rsaquo;',
				'prevPageLabel' => '&lsaquo;',
				'header' => '',
				'htmlOptions' => array(
					'class' => 'pagination',
					),		
                ),
));
?>
</div>
<div class="span3" id="Sidebar"><?php include(Yii::app()->basePath . '/views/sidebar.php'); ?></div>
</div>