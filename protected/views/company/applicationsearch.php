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

	$dataProvider=new CActiveDataProvider('Application', array('criteria'=>array(
                                                        //'order'=>'applied DESC',
														//'with' =>array('CID'),
        'condition'=>'EID in(SELECT EID FROM employee WHERE MATCH (content,tags,country,location) AGAINST ("'.$query.'" IN BOOLEAN MODE)) AND EID in(SELECT EID FROM application WHERE CID=:CID)',
		'params'=>array(':CID'=>$company->CID),
		'group'     => 'EID',
		),
		'sort'=>array(
				'defaultOrder'=>'applied DESC',
				
		),
		'pagination'=>array('pageSize'=>9,),
        ));
		?>


<div class="alert in alert-block fade alert-info">
<a class="close" data-dismiss="alert">x</a>
<strong>Total <?php echo $dataProvider->totalItemCount; ?> Records Found</strong> with your search query
</div>

        </div>
        <div class="span9">
	<?php 
             //var_dump($dataProvider); die;
        
		$this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$dataProvider,
           // 'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
           // 'cssFile' => false,
		   'id'=>'PRofile',
		   'template'=>'{summary}{sorter}{items}{pager}',
            'itemView'=>'_applicationView',   // refers to the partial view named '_post'
			'itemsTagName'=>'ul',
			//'value'=>'++$idd',
           // 'ajaxUpdate'=>true,
			'emptyText'=>'<b>Sorry, there are no applications to display with in your search</b>',
           // 'htmlOptions' => array('style'=>'margin-top:-20px;'),  
            'sortableAttributes'=>array(
              'JID'=>'Job Applied',
			  'applied'=>'Date Applied',            
           //'created'=>'Created',
		),
		));
		?>
        </div>   
</div>

 