<?php
$this->breadcrumbs = array(
	'Job' => array('/job/manageJobs'),
    'Manage Jobs',);
$this->pageTitle = 'Manage Jobs | '.Yii::app()->params['pageTitle'];
?>

<h1>Manage Jobs</h1><br />

   <div class ="row-fluid">
   
   
         <div class="span3">
			<?php include(Yii::app()->basePath . '/views/job/manageJobsSidebar.php'); ?>
<?php
        $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                    'with'=>array('company'),
                                                                    'condition'=>'ID=:ID',
                                                                    'params'=>array(':ID'=>Yii::app()->user->getID()),
                                                                    //'order'=>'t.created DESC',
                                                                    
                                                                    ),
																	'sort'=>array(
																		'defaultOrder'=>'t.created DESC',
																	),
                                                                    'pagination'=>array(
                                                                                        'pageSize'=>6,
                                                                    ),
                                                )); ?>	
		<div class="alert in alert-block fade alert-info">
		<a class="close" data-dismiss="alert">x</a>
		<strong>Total <?php echo $dataProvider->totalItemCount; ?> Jobs Found</strong>
		</div>
	
	
		 </div>
         <div class="span9">
		 
		<?php if(Yii::app()->user->hasFlash('success')): ?>

				<?php echo Yii::app()->user->getFlash('success'); ?>
		 
		<?php endif; ?>
		
		<?php if(Yii::app()->user->hasFlash('error')): ?>

				<?php echo Yii::app()->user->getFlash('error'); ?>
		 
		<?php endif; ?>		

 <?php       $this->widget('bootstrap.widgets.TbListView', array(
			//'type'=>'striped bordered condensed',
            'dataProvider'=>$dataProvider,
			'id'=>'ManageJob',
			'template'=>'{summary}{sorter}{items}{pager}',
			'summaryText' => 'Showing {start} - {end} of {count} Jobs',
            //'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_manageJobView',   // refers to the partial view named '_post'
            //'ajaxUpdate'=>false,
			'emptyText'=>'<i> Sorry, there are no jobs to display</i>',
            //'htmlOptions' => array('style'=>'margin-top:-20px;'),   
            'sortableAttributes'=>array(
              'JID'=>'Job',
			  'created'=>'Date Posted',
			  'status'=>'Job Status',
			  //'applied >= today'=>'Last Month',
		),
));

/*
Different Color for each row
http://stackoverflow.com/questions/17816066/php-yii-gridview-how-to-highlight-a-row

http://www.yiiframework.com/wiki/501/cgridview-add-custom-class-to-table-rows-preserving-original-odd-and-even/

 $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'filter' => $model,
    'dataProvider'=>$model->search(),
    'columns'=>$columns,
    'afterAjaxUpdate'=>'js:function(id, data) {$(".filters").hide();}', 
    'rowCssClassExpression'=>'(($data->myproperty=="predefined_value")?"selected ":"") . ($row%2?"even":"odd")',
));
*/


 ?>
		</div> 
		 
   </div> 