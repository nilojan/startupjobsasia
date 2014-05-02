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
                                                                    //'with'=>array('company'),
                                                                   'condition'=>'t.created >= :today AND CID=:CID',  
                                                                    'params'=>array('today'=>date('Y-m-d H:i:s', strtotime("-3 months")),':CID'=>$company->CID),
                                                                    ),
																	'sort'=>array(
																		'defaultOrder'=>'t.created DESC',
																	),
                                                                    'pagination'=>array('pageSize'=>6),
                                                ));
		?>
		<div class="alert in alert-block fade alert-info">
		<a class="close" data-dismiss="alert">x</a>
		<strong>Total <?php echo $dataProvider->totalItemCount; ?> Jobs Found</strong>
	</div>
	
	
		 </div>
         <div class="span9">
		 <?php       $this->widget('bootstrap.widgets.TbListView', array(
				//'type'=>'striped bordered condensed',
				'dataProvider'=>$dataProvider,
				'id'=>'ManageJob',
				'template'=>'{summary}{sorter}{items}{pager}',
				'summaryText' => 'Showing {start} - {end} of {count} Jobs',
				//'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
				'itemView'=>'_manageJobView',   // refers to the partial view named '_post'
				//'ajaxUpdate'=>false,
				'emptyText'=>'<b> Sorry, there are no jobs to display</b>',
				//'htmlOptions' => array('style'=>'margin-top:-20px;'),   
				'sortableAttributes'=>array(
				  'JID'=>'Job',
				  'created'=>'Date Posted',
				  //'applied >= today'=>'Last Month',
					),
				));

			?>
		</div> 
		 
   </div> 