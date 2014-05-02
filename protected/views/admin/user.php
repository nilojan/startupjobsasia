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
        $dataProvider=new CActiveDataProvider('Employee', array( 'criteria'=>array(
                                                                    'order'=>'t.EID DESC',
                                                                    /*'condition'=>'ID=:ID',
                                                                    'params'=>array(':ID'=>Yii::app()->user->getID()),*/
                                                                    
                                                                    
                                                                    ),
                                                                    'pagination'=>array(
                                                                                        'pageSize'=>9,
                                                                    ),
                                                )); ?>
												
		<div class="alert in alert-block fade alert-info">
		<a class="close" data-dismiss="alert">x</a>
		<strong>Total <?php echo $dataProvider->totalItemCount; ?> Users Found</strong>
		</div>
	
	
		 </div>
         <div class="span9">												

 <?php       $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'_user',   // refers to the partial view named '_post'
			'template'=>'{summary}{sorter}{items}{pager}',
			'summaryText' => 'Showing {start} - {end} of {count} Users',
			'emptyText'=>'<i> Sorry, there are no users to display</i>',
            'sortableAttributes'=>array(
              'EID'=>'User',
			  
			  'last_modified'=>'Date Registred',
			  'registered'=>'Activated',
			  //'applied >= today'=>'Last Month',
		),			
            
));
 ?>
 	</div>		 
</div>