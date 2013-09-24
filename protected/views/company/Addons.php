<?php
$this->breadcrumbs = array(
    'Company' => array('/Add-ons'),
    'Add-ons',);
$this->pageTitle = 'Add-ons | '.Yii::app()->params['pageTitle'];
?>

<h1>Add-ons</h1>
<h2>Make Your startup Premium</h2>
<?php  $normal  = '10';
	$enterprise  = '30';
	$browse_data = '100';
?>
<?php echo CHtml::link('Normal',array('company/Buy/'.$normal)); echo ':-&nbsp;&nbsp;&nbsp;&nbsp; SGD 9.99' ?><br /><br />
<?php echo CHtml::link('Enterprise',array('company/buy/'.$enterprise)); echo ':-&nbsp;&nbsp;&nbsp;&nbsp;SGD 30.00' ?><br /><br />
<?php echo CHtml::link('Elite',array('company/buy/'.$browse_data)); echo ':-&nbsp;&nbsp;&nbsp;&nbsp;SGD 100.00' ?>
<br>


            