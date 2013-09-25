<?php
$this->breadcrumbs = array(
    'Company' => array('/Premium-Features'),
    'Premium-Features',);
$this->pageTitle = 'Premium-Features | '.Yii::app()->params['pageTitle'];
?>

<h1>Premium-Feature</h1>
<h2>Make Your startup Premium</h2>
<?php  $normal  = 'normal';
	$enterprise  = 'eneterprise';
	
?>
<div>
<?php echo CHtml::link('Normal',array('Pay/Buy?type='.$normal)); echo ':-&nbsp;&nbsp;&nbsp;&nbsp; SGD 9.99' ?><br /><br />
</div>
<div>
<?php echo CHtml::link('Enterprise',array('Pay/Buy?type='.$enterprise)); echo ':-&nbsp;&nbsp;&nbsp;&nbsp;SGD 30.00' ?><br /><br />
</div>
<br>


            