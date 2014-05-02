<?php
$this->breadcrumbs = array(
	'Startups' => array('/admin/startup'),
    'Manage Startups',);
$this->pageTitle = 'Manage Startups | '.Yii::app()->params['pageTitle'];
?>

<h1>Manage Startups</h1><br />

   <div class ="row-fluid">
   
   
         <div class="span3">
	<?php include(Yii::app()->basePath . '/views/admin/manageStartupSidebar.php'); ?>
<?php
        $dataProvider=new CActiveDataProvider('company', array( 'criteria'=>array(
                                                                    //'with'=>array('company'),
                                                                    'condition'=>'cname LIKE \'%'.$query.'%\' AND t.registered = 1',
                                                                    //'params'=>array('today'=>date('Y-m-d H:i:s')),
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
		<strong>Total <?php echo $dataProvider->totalItemCount; ?> Startups Found</strong>
	</div>
	
	
		 </div>
         <div class="span9">
		 


 <?php       $this->widget('bootstrap.widgets.TbListView', array(
			//'type'=>'striped bordered condensed',
            'dataProvider'=>$dataProvider,
			'id'=>'ManageJob',
			'template'=>'{summary}{sorter}{items}{pager}',
			'summaryText' => 'Showing {start} - {end} of {count} Startups',
            //'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_cmpny',   // refers to the partial view named '_post'
            //'ajaxUpdate'=>false,
			'emptyText'=>'<i> Sorry, there are no Startups to display</i>',
            //'htmlOptions' => array('style'=>'margin-top:-20px;'),   
            'sortableAttributes'=>array(
              'CID'=>'Startup',
			  'created'=>'Date Posted',
			  'status'=>'Startup Status',
			  //'applied >= today'=>'Last Month',
		),
));

 ?>
		</div> 
		 
   </div> 