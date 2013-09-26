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
	$addons='addons';
	
?>
<div>
<h4> Normal Plan type </h4>
<?php 

$company = company::model()->find('ID=:CID',array(':CID'=>Yii::app()->user->getID()));

if($company->premium == 1)
{
	echo 'you already register with this Premium Plan';
}else{

	echo CHtml::link('Normal',array('Pay/Buy?type='.$normal)); echo ':-&nbsp;&nbsp;&nbsp;&nbsp; SGD 9.99' ;
}
?>
<h4> Enterprise Plan type </h4>
<?php
if($company->premium == 2)
{
	echo 'you already register with this Premium Plan';
}else{

	echo CHtml::link('Enterprise',array('Pay/Buy?type='.$enterprise)); echo ':-&nbsp;&nbsp;&nbsp;&nbsp;SGD 30.00';
}


?>
<h4> Add-ons For premium Features </h4>
<?php


	echo CHtml::link('Add-ons',array('Pay/Buy?type='.$addons)); echo ':-&nbsp;&nbsp;&nbsp;&nbsp;SGD 30.00';


?><br /><br />
</div>
<div>

<?php 

 ?>

 <br /><br />
</div>
<br>


            