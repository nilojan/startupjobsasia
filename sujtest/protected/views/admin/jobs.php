<?php
$this->breadcrumbs = array(
    'Manage Jobs',
);
$this->pageTitle = 'Manage Jobs | '.Yii::app()->params['pageTitle'];
?>

    <div class ="clear">
         <div class ="span3">
                    <strong>Title</strong>
         </div>
      <!--   <div class ="span3">
                    <?php  $JobDes = substr($data->description,0,60); ?>
                    <?php echo $JobDes; ?>...
         </div>-->
           <div class ="span1">
                    <strong>Type</strong>
         </div>
           <div class ="span1">
                    <strong>Salary</strong>
         </div>
         <div class ="span1">
                    <strong>Location</strong>
         </div>
         <div class ="span1">
                    <strong>Expire on</strong>
         </div>
         <div class ="span1">
                    <strong>Posted </strong>
         </div>
         <div class="btn-toolbar">
                                                     

                   
        </div>
   </div> 
   
<?php
        $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                    'with'=>array('company'),
                                                                    /*'condition'=>'ID=:ID',
                                                                    'params'=>array(':ID'=>Yii::app()->user->getID()),*/
                                                                    'order'=>'t.created DESC',
                                                                    
                                                                    ),
                                                                    'pagination'=>array(
                                                                                        'pageSize'=>10,
                                                                    ),
                                                )); ?>

 <?php       $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider'=>$dataProvider,
            //'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_job',   // refers to the partial view named '_post'
            //'ajaxUpdate'=>false,
            //'htmlOptions' => array("class"=>"table table-striped"),   
            'sortableAttributes'=>array(
            //'title',
            //'type' => 'Type',    
            
           // 'created'=>'Created',
    ),
));
 ?>