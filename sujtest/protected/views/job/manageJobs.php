<?php
$this->breadcrumbs = array(
    'Manage Jobs',
);
$this->pageTitle = 'Manage Jobs | '.Yii::app()->params['pageTitle'];
?>

   <div class ="span12">
         <div class ="span3">
                    <strong>Title</strong>
         </div>
      <!--   <div class ="span4">
                    <strong>Description</strong>
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
                    <strong>Created</strong>
         </div>
         <div class="btn-toolbar">

        </div>
   </div> 
<?php
        $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(
                                                                    'with'=>array('company'),
                                                                    'condition'=>'ID=:ID',
                                                                    'params'=>array(':ID'=>Yii::app()->user->getID()),
                                                                    'order'=>'t.created DESC',
                                                                    
                                                                    ),
                                                                    'pagination'=>array(
                                                                                        'pageSize'=>10,
                                                                    ),
                                                )); ?>

 <?php       $this->widget('bootstrap.widgets.TbListView', array(
			//'type'=>'striped bordered condensed',
            'dataProvider'=>$dataProvider,
			
            //'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
            'itemView'=>'_manageJobView',   // refers to the partial view named '_post'
            //'ajaxUpdate'=>false,
			
            //'htmlOptions' => array("class"=>"table table-striped"),   
            'sortableAttributes'=>array(
            //'title',
            //'type' => 'Type',    
            
           // 'created'=>'Created',
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
 
