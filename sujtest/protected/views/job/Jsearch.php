<?php /** @var BootActiveForm $form */
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array('id'=>'verticalForm',
                                                                                'type'=>'horizontal',
                                                                                'action'=>Yii::app()->createUrl("job/Jsearch"),
                                                                                'method'=>'get',
                                                                                'enableClientValidation'=>true,
                                                                                'clientOptions'=>array('validateOnSubmit'=>true,),
                                                                                )); ?>
<?php
 echo CHtml::textField('key', $key, array('class' => 'span6', 'placeholder'=>'Enter job title,company name,skill etc...'));
 ?>
 <div>
  Search within :<?php echo CHtml::radioButtonList('type',$type,array('entireJob'=>'Entire Job Advertise','jobTitle'=>'Job Title','companyName'=>'Company Name'),array(
    'labelOptions'=>array('style'=>'display:inline'), // add this code
    'separator'=>'',
)); ?></div><br /><div>
   <?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Search Job',
     'buttonType'=>'submit',
    //'url'=>Yii::app()->createUrl("job/Jsearch", array('key'=>'$job','type'=>"$type")), //'job/Jsearch?key=job&type=entireJob'
    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'normal', // null, 'large', 'small' or 'mini'
)); ?>
  <?php $this->endWidget(); ?>
</div>
<?php
$dataProvider ='';
if($type == 'entireJob')
{ 
	$dataProvider=new CActiveDataProvider('job', array('criteria'=>array(
                                                     'order'=>'created DESC',
                                                     'condition'=>'JID in(SELECT JID FROM job WHERE status = 1 && MATCH (title,description) 
                                                     AGAINST ("'.$key.'" IN BOOLEAN MODE))',),
                                                     'pagination'=>array(
                                                     'pageSize'=>20,),
                                                         ));
}else if($type == 'jobTitle'){
	$dataProvider=new CActiveDataProvider('job', array('criteria'=>array(
                                                     'order'=>'created DESC',
                                                     'condition'=>'JID in(SELECT JID FROM job WHERE status = 1 && MATCH (title) 
                                                      AGAINST ("'.$key.'" IN BOOLEAN MODE))',  
                                                      ),'pagination'=>array(
                                                        'pageSize'=>20,),
                                                         ));
}else if($type == 'companyName'){
$company= company::model()->find('CID in(SELECT CID FROM company WHERE MATCH (cname) 
                                                      AGAINST ("'.$key.'" IN BOOLEAN MODE))');
/*var_dump($company);
die;*/
    if($company == NULL){
      echo "No Result found";

    }else{
      $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(                                                                
                                                  'with'=>array('company'),
                                                    'condition'=>'company.CID=:CID',
                                                    'params'=>array(':CID'=>$company->CID),    
                                                    ),
                                                'pagination'=>array(
                                                          'pageSize'=>20,),
                                                    ));



    }


}


  if($dataProvider != NULL && isset($dataProvider)){

$this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'_jobView',   // refers to the partial view named '_post'
            'sortableAttributes'=>array(
           
    ),
));

  }
?>