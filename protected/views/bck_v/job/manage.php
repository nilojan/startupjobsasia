<?php
$this->pageTitle = Yii::app()->name . ' - Manage Accounts';
$this->breadcrumbs = array(
    'Manage Accounts',
);
?>


               <h1>Manage Accounts</h1>

<script type="text/javascript" src="jquery.ias.min.js"></script>

        


  <?php
 $dataProvider = new CActiveDataProvider('approve', array(
                                        
                                                       
                                        'criteria' => array(
                                                        //'condition'=>'ID=:ID',
                                                        //'params'=>array(':ID'=>Yii::app()->user->getID()),
                                         )));
       
         $this->widget('zii.widgets.grid.CGridView', array(
  
                    'dataProvider' => $dataProvider,
                    'pager' => array('cssFile' => Yii::app()->baseUrl . '/css/gridView.css'),
                    'cssFile' => Yii::app()->baseUrl . '/css/gridView.css',
                    'htmlOptions' => array('class' => 'grid-view rounded'),
                    'columns' => array(
                        'title', // display the 'title' attribute
                        'description', // display the 'name' attribute of the 'category' relation
                        //'email', // display the 'content' attribute as purified HTML
                        //'role',
                        array(// display a column with "view", "update" and "delete" buttons
                            'class' => 'CButtonColumn',
                            'deleteConfirmation' => "js:'Are you sure you want to remove this job?'",
                            'buttons' => array
                                (
                                'update' => array
                                    (
                                    'label' => 'Update',
                                    'url' => 'Yii::app()->createUrl("job/update", array("JID"=>$data->JID ))',
                                   ),
                                'view' => array
                                    (
                                    'label' => 'View',
                                    'url' => 'Yii::app()->createUrl("job/job", array("JID"=>$data->JID ))',
                                   
                                 //   'imageUrl' => Yii::app()->request->baseUrl . '/images/view.png',
                                 ),
                                'delete' => array
                                    (
                                    'label' => 'Delete',
                                    'url' => 'Yii::app()->createUrl("job/delete", array("JID"=>$data->JID ))',
                                   // 'imageUrl' => Yii::app()->request->baseUrl . '/images/remove.png',
                                  )
                            )
                        )
                    )
                        )
                );
                ?>



