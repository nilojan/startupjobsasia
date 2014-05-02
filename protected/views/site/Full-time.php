<?php
$this->pageTitle = Yii::app()->name . ' - Full Time jobs';
$this->breadcrumbs = array(
    'Full Time Jobs',
);
/*$condition = 'type = :type OR full_time=:type2  and t.status=1';
$params = array(':type'=>'Full-time',':type2'=>'Full-time');

$condition = ' full_time=:type2  and t.status=1';
$params = array(':type2'=>'Full-time');
if($location != '')
{
  $condition = $condition.' AND location = :location  and t.status=1';
  $params = array(':location'=>$location);
}
*/
// var_dump($condition);
// var_dump($params);
// var_dump($location);

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
	<h1 class="HomeLatestJobs">Full time Jobs</h1>
</div>
<?php
       
        $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                    'order'=>'t.created DESC',
                                                                    'condition'=>'expire >= :today AND t.status=1 AND full_time=:type2',
                                                                    'params'=>array('today'=>date('Y-m-d H:i:s'),':type2'=>'Full-time'),
                                                                    ),
                                                                    'pagination'=>array(
                                                                                        'pageSize'=>20,
                                                                    ),
                                                ));
        $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$dataProvider,
            //'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_jobView',   // refers to the partial view named '_post'
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