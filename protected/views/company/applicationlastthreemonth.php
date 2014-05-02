<?php
$this->breadcrumbs = array(
    'Applications');
$this->pageTitle = 'Application | '.Yii::app()->params['pageTitle'];
?>
<h1>Job Applications</h1><br />
<div id='suc_msg'  style="display:none;" class="alert out alert-block fade alert-success"><strong>Success!!</strong> Job Status Updated Successfully.</div>
  
 <div class ="row-fluid">         
         
    <div class="span3">
	<?php include(Yii::app()->basePath . '/views/company/applicationSidebar.php'); ?>
	
	<?php
	$dataProvider=new CActiveDataProvider('Application', array( 'criteria'=>array(
                                                                    //'order'=>'applied DESC',
                                                                    //'with' =>array('JID','CID'),
                                                                   'condition'=>'applied >= :today AND CID=:CID',  
                                                                    'params'=>array('today'=>date('Y-m-d H:i:s', strtotime("-3 months")),':CID'=>$company->CID),
                                                                    ),
																	'sort'=>array(
																		'defaultOrder'=>'applied DESC',
																	),
                                                                    'pagination'=>array('pageSize'=>9),
                                                ));
												?>

	<div class="alert in alert-block fade alert-info">
		<a class="close" data-dismiss="alert">x</a>
		<strong>Total <?php echo $dataProvider->totalItemCount; ?> Records Found</strong>
	</div>
        </div>
         <div class="span9">
		 <div class="span5" style="display: none;"></div>
	<?php 
             //var_dump($dataProvider); die; 
        
     $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$dataProvider,
		   'id'=>'PRofile',
		   'template'=>'{summary}{sorter}{items}{pager}',
		   'summaryText' => 'Showing {start} - {end} of {count} Records',
            'itemView'=>'_applicationView',   // refers to the partial view named '_post'
			'itemsTagName'=>'ul',
			//'value'=>'++$idd',
           // 'ajaxUpdate'=>true,
			'emptyText'=>'<b> Sorry, there are no applications to display</b>',
            //'htmlOptions' => array('style'=>'margin-top:-20px;padding:0;'), 
			//'viewData'=>array('page'=>$page),			
            'sortableAttributes'=>array(
              'JID'=>'Job Applied',
			  'applied'=>'Date Applied',
			  //'applied >= today'=>'Last Month',
		),
		));
		?>
         </div>   
</div>

 