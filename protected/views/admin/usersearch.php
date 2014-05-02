<?php
$this->breadcrumbs = array(
    'Manage Users',
);
$this->pageTitle = 'Manage User | '.Yii::app()->params['pageTitle'];
?>

<h1>Manage User</h1><br />

   <div class ="row-fluid">
   
   
         <div class="span3">
<?php include(Yii::app()->basePath . '/views/admin/manageUserSidebar.php'); ?>
<?php
												
		$dataProvider=new CActiveDataProvider('Employee', array('criteria'=>array(
			'condition'=>'EID in(SELECT EID FROM employee WHERE MATCH (coverLetter,country,content) AGAINST ("'.$query.'" IN BOOLEAN MODE))',),
			'sort'=>array('defaultOrder'=>'t.EID DESC',),
			'pagination'=>array('pageSize'=>6,),
        ));
		/*
        $dataProvider=new CActiveDataProvider('Employee', array( 
												'criteria'=>array(
                                                'order'=>'EID DESC',
												'condition'=>'EID in(SELECT EID FROM employee WHERE MATCH (coverLetter,country,content) AGAINST ("'.$query.'" IN BOOLEAN MODE))',
													),
                                                'pagination'=>array('pageSize'=>20),
											));
											
		
        $dataProvider=new CActiveDataProvider('Employee', array( 'criteria'=>array(
                                                                    //'with'=>array('company'),
                                                                    'condition'=>'content LIKE \'%'.$query.'%\' OR country LIKE \'%'.$query.'%\' AND t.agree = 1',
                                                                    //'params'=>array('today'=>date('Y-m-d H:i:s')),
                                                                    //'order'=>'t.created DESC',
                                                                    
                                                                    ),
																	'sort'=>array(
																		'defaultOrder'=>'t.EID DESC',
																	),
                                                                    'pagination'=>array(
                                                                                        'pageSize'=>9,
                                                                    ),
                                                )); 
		*/
												
		?>	
												
		<div class="alert in alert-block fade alert-info">
		<a class="close" data-dismiss="alert">x</a>
		<strong>Total <?php echo $dataProvider->totalItemCount; ?> Users Found</strong>
	</div>
	
	
		 </div>
         <div class="span9">
		 


 <?php       $this->widget('bootstrap.widgets.TbListView', array(
				//'type'=>'striped bordered condensed',
				'dataProvider'=>$dataProvider,

				'template'=>'{summary}{sorter}{items}{pager}',
				'summaryText' => 'Showing {start} - {end} of {count} Users',
				//'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
				'itemView'=>'_user',   // refers to the partial view named '_post'
				//'ajaxUpdate'=>false,
				'emptyText'=>'<i> Sorry, there are no users to display</i>',
				//'htmlOptions' => array('style'=>'margin-top:-20px;'),   
				'sortableAttributes'=>array(
				  'EID'=>'User',
				  'last_modified'=>'Date Registred',
				  //'applied >= today'=>'Last Month',
					),
				));

 ?>
		</div> 
		 
   </div> 