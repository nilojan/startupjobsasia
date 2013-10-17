<?php

if($job == NULL)
{

	echo 'No Results Found';

}
else
{
 $dataProvider=new CActiveDataProvider('job', array( 'criteria'=>array(                                                                
                                                    'condition'=>'JID=:JID',
                                                    'params'=>array(':JID'=>$job->JID),    
                                                    ),
                                                'pagination'=>array(
                                                          'pageSize'=>20,),
                                                    ));

 $this->widget('zii.widgets.CListView', array(
			            'dataProvider'=>$dataProvider,
			            'itemView'=>'_jobView',   // refers to the partial view named '_post'
			            'sortableAttributes'=>array(
			           
			    ),
			));

/* var_dump($dataProvider);
die;*/

}
 

 
 			/*var_dump('hi');
 			die;*/
			


?>