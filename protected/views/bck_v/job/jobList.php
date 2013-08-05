<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<title>StartUp Jobs Asia | Startup Hire | Startup Hiring | Startup Recruiting | Startup Jobs | VC Hire | VC Jobs | Work In Startups</title>


<div class="view">  
<?php  $CID = Yii::app()->user->getID(); ?>

<?php $job = new job(); ?>       
  
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$job->findAll('CID=:CID',array('CID'=>$CID)),
    'columns'=>array(
        'title',          // display the 'title' attribute
        //'category.name',  // display the 'name' attribute of the 'category' relation
        //'content:html',   // display the 'content' attribute as purified HTML
        array(            // display 'create_time' using an expression
            'name'=>'create_time',
            'value'=>'date("M j, Y", $data->create_time)',
        ),
        array(            // display 'author.username' using an expression
            'name'=>'authorName',
            'value'=>'$data->author->username',
        ),
        array(            // display a column with "view", "update" and "delete" buttons
            'class'=>'CButtonColumn',
        ),
    ),
));

?>
</div>